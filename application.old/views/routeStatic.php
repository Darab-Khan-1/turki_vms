<!DOCTYPE html>
<html class="loading" lang="<?= $html_lang ?>" data-textdirection="ltr">
<!-- BEGIN: Head-->

<head>
    <?php $this->load->view('include/css'); ?>
</head>
<!-- END: Head-->

<!-- BEGIN: Body-->

<body class="vertical-layout vertical-menu 2-columns   fixed-navbar" data-open="click" data-menu="vertical-menu" data-col="2-columns">

<!-- BEGIN: Header-->
<?php $this->load->view('include/header'); ?>
<!-- END: Header-->


<!-- BEGIN: Main Menu-->

<?php $this->load->view('include/main_menu'); ?>

<!-- END: Main Menu-->
<!-- BEGIN: Content-->
<div class="app-content content">
    <div class="content-overlay"></div>
    <div class="content-wrapper">
        <div class="content-header row">
            <div class="content-header-left col-md-6 col-12">
                <h3 class="content-header-title"><?=lang('route_history')?> (<?=lang('static')?>)</h3>
            </div>
            <div class="content-header-right breadcrumbs-right col-md-6 col-12 d-none d-md-block">
                <div class="breadcrumb-wrapper">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item pl-0"><a href="<?=base_url('panel/map')?>"><?=lang('map')?></a></li>
                        <li class="breadcrumb-item pl-0"><a href="#"><?=lang('route_history')?></a></li>
                        <li class="breadcrumb-item pl-0 active"><?=lang('static')?></li>
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
                                                name="device_id" data-allow-clear="true" data-placeholder="<?=lang('selectVehicle')?>"><option></option>>
                                            <?php
                                            foreach ($devices as $index => $device) {
                                                echo '<option value="' . $device->id . '">' . $device->name . '</option>';
                                            }
                                            ?>
                                        </select>
                                        <input
                                                type="hidden" class="form-control" id="timezone" name="timezone" value="<?=$user->attributes->timezone;?>">
                                        <input
                                                type="hidden" class="form-control" id="device_name" name="device_name">
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <input type="text" id="start_date" name="start_date" class="form-control"
                                               readonly="readonly" data-translate="start_date" placeholder="<?=lang('startDate')?>">
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <input type="text" id="end_date" name="end_date" class="form-control"
                                               readonly="readonly" data-translate="end_date" placeholder="<?=lang('endDate')?>">
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <button type="button"
                                                class="btn btn-block btn-blue"
                                                id="displayReportButton" name="displayReportButton"><?=lang('displayRoute')?>
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
                    <h4 class="card-title"><?=lang('route_history')?> (<?=lang('static')?>)</h4>
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
<?php $this->load->view('include/footer'); ?>
<!-- END: Footer-->

<?php $this->load->view('include/js'); ?>

<!-- BEGIN: Page JS-->
<!-- END: Page JS-->
<script>
    $(document).ready(function () {
        'use strict';
        const pageId = $('#<?= $pageId ?>');
        pageId.addClass('active');
        $("#device_id").select2({
            placeholder: "<?=lang('selectVehicle')?>",
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
                    markup: "<span class='ap-header__title'><?=lang('startDate')?></span>",
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
                    markup: "<span class='ap-header__title'><?=lang('endDate')?></span>",
                    type: "Text",
                    contentBehaviour: "Dynamic", // Static or Dynamic
                    format: "dd MMM yyyy HH:mm" // DateTime Format
                },
        });

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
            $.ajax({
                url: '<?=base_url('rest/report/route')?>',
                method: "POST",
                data: filterForm.serialize(),
                beforeSend: function () {
                    filterCard.block({
                        message: '<i class="fad fa-spinner fa-spin fa-3x text-warning"></i>',
                        overlayCSS: {
                            backgroundColor: '#fff',
                            opacity: 0.8,
                            cursor: 'wait'
                        },
                        css: {
                            border: 0,
                            padding: 0,
                            backgroundColor: 'transparent'
                        }
                    });
                }
            })
                .done((res) => {
                    //console.log(res);
                    if (res.success) {
                        if (res.positions.length > 0) {
                            mapCard.removeClass('d-none');
                            filterCard.unblock();
                            let routes = [];
                            let counter = 0;
                            let baseLocation;
                            $.each(res.positions, function (index, position) {
                                if (counter === 0) {
                                    baseLocation = [position.latitude.toPrecision(8), position.longitude.toPrecision(8)];
                                }
                                counter++;
                                routes.push([position.latitude.toPrecision(8), position.longitude.toPrecision(8)]);
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
                                title: "<?=lang('info')?>",
                                html: '<h4><?=lang('no_route_available')?></h4>',
                                type: "info",
                                confirmButtonClass: 'btn btn-danger',
                                buttonsStyling: false,
                            });
                        }
                    } else {
                        filterCard.unblock();
                        Swal.fire({
                            title: "<?=lang('error')?>",
                            html: '<h4>' + res.message + '</h4>',
                            type: "error",
                            confirmButtonClass: 'btn btn-danger',
                            buttonsStyling: false,
                        });
                    }
                })
                .fail((e) => {
                    //console.log(e);
                    filterCard.unblock();
                    if (e.status === 404) {
                        Swal.fire({
                            title: "<?=lang('error')?>",
                            html: '<h4>' + '<?=lang('not_found')?>' + '</h4>',
                            type: "error",
                            confirmButtonClass: 'btn btn-danger',
                            buttonsStyling: false,
                        });
                    } else {
                        Swal.fire({
                            title: "<?=lang('error')?>",
                            html: '<h4>' + e.responseJSON.message + '</h4>',
                            type: "error",
                            confirmButtonClass: 'btn btn-danger',
                            buttonsStyling: false,
                        });
                    }
                })
                .always(function () {
                    //alert("complete");
                });
        });
    });
</script>
</body>
<!-- END: Body-->

</html>
