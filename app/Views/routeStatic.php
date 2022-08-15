<!DOCTYPE html>
<html class="loading" lang="<?= lang('Text.lang') ?>" data-textdirection="ltr">
<!-- BEGIN: Head-->
<?= view('include/head'); ?>
<!-- END: Head-->

<!-- BEGIN: Body-->

<body class="vertical-layout vertical-menu 2-columns   fixed-navbar" data-open="click" data-menu="vertical-menu" data-col="2-columns">

<!-- BEGIN: Header-->
<?= view('include/header'); ?>
<!-- END: Header-->


<!-- BEGIN: Main Menu-->

<?= view('include/main_menu'); ?>

<!-- END: Main Menu-->
<!-- BEGIN: Content-->
<div class="app-content content">
    <div class="content-overlay"></div>
    <div class="content-wrapper">
        <div class="content-header row">
            <div class="content-header-left col-md-6 col-12">
                <h3 class="content-header-title"><?=lang('Text.route_history')?> (<?=lang('Text.static')?>)</h3>
            </div>
            <div class="content-header-right breadcrumbs-right col-md-6 col-12 d-none d-md-block">
                <div class="breadcrumb-wrapper">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item pl-0"><a href="<?=base_url('panel/map')?>"><?=lang('Text.map')?></a></li>
                        <li class="breadcrumb-item pl-0"><a href="#"><?=lang('Text.route_history')?></a></li>
                        <li class="breadcrumb-item pl-0 active"><?=lang('Text.static')?></li>
                    </ol>
                </div>
            </div>
        </div>
        <div class="content-body">
            <!-- Description -->
            <section id="filterCard" class="card">
                <div class="card-content collapse show">
                    <div class="card-body pb-0">
                        <form id="filterForm" name="filterForm">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <select class="select2 form-control" id="device_id"
                                                name="device_id" data-allow-clear="true" data-placeholder="<?=lang('Text.selectVehicle')?>"><option></option>>
                                            <?php
                                            foreach ($devices as $index => $device) {
                                                echo '<option value="' . $device->id . '">' . $device->name . '</option>';
                                            }
                                            ?>
                                        </select>
                                        <input
                                                type="hidden" class="form-control" id="timezone" name="timezone" value="<?=$user->attributes->timezone??"";?>">
                                        <input
                                                type="hidden" class="form-control" id="device_name" name="device_name">
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <input type="text" id="start_date" name="start_date" class="form-control"
                                               readonly="readonly" data-translate="start_date" placeholder="<?=lang('Text.startDate')?>">
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <input type="text" id="end_date" name="end_date" class="form-control"
                                               readonly="readonly" data-translate="end_date" placeholder="<?=lang('Text.endDate')?>">
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <button type="button"
                                                class="btn btn-block btn-blue"
                                                id="displayReportButton" name="displayReportButton"><?=lang('Text.displayRoute')?>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </section>
            <!--/ Description -->

            <!-- HTML Markup -->
            <section id="mapCard" class="card d-none">
                <div class="card-header">
                    <h4 class="card-title"><?=lang('Text.route_history')?> (<?=lang('Text.static')?>)</h4>
                </div>
                <div class="card-content collapse show">
                    <div class="card-body pt-0" id="reportRouteMapHolder">
                    </div>
                </div>
            </section>
            <!--/ HTML Markup -->
        </div>
    </div>
</div>
<!-- END: Content-->

<div class="sidenav-overlay"></div>
<div class="drag-target"></div>

<!-- BEGIN: Footer-->
<?= view('include/footer'); ?>
<!-- END: Footer-->

<?= view('include/script'); ?>

<!-- BEGIN: Page JS-->
<!-- END: Page JS-->
<script>
    $(document).ready(function () {
        'use strict';
        const pageId = $('#<?= $pageId ?>');
        pageId.addClass('active');
        $("#device_id").select2({
            placeholder: "<?=lang('Text.selectVehicle')?>",
            dropdownAutoWidth: true,
            width: '100%'
        });
        $("#start_date").AnyPicker({
            mode: "datetime",
            dateTimeFormat: "dd MMM yyyy HH:mm",
            inputDateTimeFormat: "dd/MM/yyyy HH:mm",
            rowsNavigation: "scroller+buttons",
            lang: $('html')[0].lang,
            headerTitle:
                {
                    markup: "<span class='ap-header__title'><?=lang('Text.startDate')?></span>",
                    type: "Text",
                    contentBehaviour: "Dynamic", // Static or Dynamic
                    format: "dd MMM yyyy HH:mm" // DateTime Format
                },
        });
        $("#end_date").AnyPicker({
            mode: "datetime",
            dateTimeFormat: "dd MMM yyyy HH:mm",
            inputDateTimeFormat: "dd/MM/yyyy HH:mm",
            rowsNavigation: "scroller+buttons",
            lang: $('html')[0].lang,
            headerTitle:
                {
                    markup: "<span class='ap-header__title'><?=lang('Text.endDate')?></span>",
                    type: "Text",
                    contentBehaviour: "Dynamic", // Static or Dynamic
                    format: "dd MMM yyyy HH:mm" // DateTime Format
                },
        });
        let headers = {
            'Authorization': 'Basic ' + '<?=$btoa?>',
            'content-type': 'application/x-www-form-urlencoded'
        };
        let mapCard = $('#mapCard');
        let filterForm = $('#filterForm');
        let filterCard = $('#filterCard');
        let reportRouteMapHolder = $('#reportRouteMapHolder');
        let displayReportButton = $('#displayReportButton');
        displayReportButton.on('click', (e) => {
            e.preventDefault();
            mapCard.addClass('d-none');
            if ($('#device_id').select2('data') && !!$('#device_id').select2('data')[0]) {
                $('#device_name').val($('#device_id').select2('data')[0].text);    //do work
            }
            let callback = (data) => {
                if (data.success) {
                    if (data.positions.length > 0) {
                        mapCard.removeClass('d-none');
                        filterCard.unblock();
                        let routes = [];
                        let counter = 0;
                        let baseLocation;
                        $.each(data.positions, function (index, position) {
                            if (counter === 0) {
                                baseLocation = [parseFloat(position.latitude).toPrecision(8), parseFloat(position.longitude).toPrecision(8)];
                            }
                            counter++;
                            routes.push([parseFloat(position.latitude).toPrecision(8), parseFloat(position.longitude).toPrecision(8)]);
                        });
                        reportRouteMapHolder.empty();
                        reportRouteMapHolder.html('<div id="reportRouteMap" class="maps-leaflet-container"></div>');
                        $("#reportRouteMap").css("height", "calc(100vh - 408px)");
                        let reportRouteMap = L.map('reportRouteMap',{ fullscreenControl: true, attributionControl: false}).setView(baseLocation, 10);
                        L.tileLayer('https://{s}.tile.osm.org/{z}/{x}/{y}.png', {
                            attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a>',
                            maxZoom: 18
                        }).addTo(reportRouteMap);
                        let polyline = L.polyline(routes, { className: 'route-line' }).addTo(reportRouteMap);
                        let pathPattern = L.polylineDecorator(
                            polyline,
                            {
                                patterns: [
                                    { offset: 12, repeat: 25, symbol: L.Symbol.dash({pixelSize: 10, pathOptions: {color: '#f00', weight: 2}}) },
                                    { offset: 0, repeat: 25, symbol: L.Symbol.dash({pixelSize: 0}) }
                                ]
                            }
                        ).addTo(reportRouteMap);
                        reportRouteMap.fitBounds(routes);
                        reportRouteMap.invalidateSize();
                    } else {
                        filterCard.unblock();
                        Swal.fire({
                            title: "<?=lang('Text.info')?>",
                            html: '<h4><?=lang('Text.no_route_available')?></h4>',
                            type: "info",
                            confirmButtonClass: 'btn btn-danger',
                            buttonsStyling: false,
                        });
                    }
                } else {
                    filterCard.unblock();
                    Swal.fire({
                        title: "<?=lang('Text.error')?>",
                        html: '<h4>' + data.message + '</h4>',
                        type: "error",
                        confirmButtonClass: 'btn btn-danger',
                        buttonsStyling: false,
                    });
                }
            };
            $.axiosPost("<?=base_url('rest/report/route')?>", headers, filterForm.serialize(), filterCard, callback);
        });
    });
</script>
</body>
<!-- END: Body-->

</html>
