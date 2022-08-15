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
                <h3 class="content-header-title"><?=lang('Text.summaryReport')?></h3>
            </div>
            <div class="content-header-right breadcrumbs-right col-md-6 col-12 d-none d-md-block">
                <div class="breadcrumb-wrapper">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item pl-0"><a href="<?=base_url('panel/map')?>"><?=lang('Text.map')?></a></li>
                        <li class="breadcrumb-item pl-0"><a href="#"><?=lang('Text.reports')?></a></li>
                        <li class="breadcrumb-item pl-0 active"><?=lang('Text.summaryReport')?></li>
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
                                        <select class="select2 form-control" id="device_id" multiple="multiple"
                                                name="device_id[]" data-allow-clear="true" data-placeholder="<?=lang('Text.selectVehicle')?>"><option></option>>
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
                                                id="displayReportButton" name="displayReportButton"><?=lang('Text.displayReport')?>
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
            <section id="reportCard" class="card d-none">
                <div class="card-header">
                    <h4 class="card-title"><?=lang('Text.summaryReport')?></h4>
                </div>
                <div class="card-content collapse show">
                    <div class="card-body pt-0">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered" id="reportSummaryTable">
                                <thead class="bg-blue-grey bg-lighten-4">
                                <tr>
                                    <th class="text-center"><?=lang('Text.deviceName')?></th>
                                    <th class="text-center"><?=lang('Text.distance')?></th>
                                    <th class="text-center"><?=lang('Text.odometerStart')?></th>
                                    <th class="text-center"><?=lang('Text.odometerEnd')?></th>
                                    <th class="text-center"><?=lang('Text.averageSpeed')?></th>
                                    <th class="text-center"><?=lang('Text.maxSpeed')?></th>
                                </tr>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
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
            multiple: true,
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

        let reportCard = $('#reportCard');
        let filterForm = $('#filterForm');
        let filterCard = $('#filterCard');
        let displayReportButton = $('#displayReportButton');
        var numberFormat = CommonUtils.numberFormat;
        var convert = CommonUtils.convert;
        let timezone = '<?= $account->attributes->timezone??"" ?>';
        let speedUnit = '<?= $account->attributes->speedUnit??"" ?>';
        let distanceUnit = '<?= $account->attributes->distanceUnit??""?>';
        let headers = {
            'Authorization': 'Basic ' + '<?=$btoa?>',
            'content-type': 'application/x-www-form-urlencoded'
        };
        displayReportButton.on('click', (e) => {
            e.preventDefault();
            reportCard.addClass('d-none');
            $('#reportSummaryTable tbody').empty();
            if ($('#device_id').select2('data') && !!$('#device_id').select2('data')[0]) {
                $('#device_name').val($('#device_id').select2('data')[0].text);    //do work
            }
            let callback = (data) => {
                if (data.success) {
                    filterCard.unblock();
                    if (data.data.length > 0) {
                        $.each( data.data, function( key, report ) {
                            let tableRow = '';
                            if (distanceUnit === 'km') {
                                var distance = numberFormat.format(report.distance/1000, {
                                    symbol: 'Km',
                                    decimal: '.',
                                    thousand: ',',
                                    precision: 2,
                                    format: '%v %s' // %s is the symbol and %v is the value
                                });
                                var startOdometer = numberFormat.format(report.startOdometer/1000, {
                                    symbol: 'Km',
                                    decimal: '.',
                                    thousand: ',',
                                    precision: 2,
                                    format: '%v %s' // %s is the symbol and %v is the value
                                });
                                var endOdometer = numberFormat.format(report.endOdometer/1000, {
                                    symbol: 'Km',
                                    decimal: '.',
                                    thousand: ',',
                                    precision: 2,
                                    format: '%v %s' // %s is the symbol and %v is the value
                                });
                                var averageSpeed = numberFormat.format(convert(report.averageSpeed).from('knot').to('km/h'), {
                                    symbol: 'Km/h',
                                    decimal: '.',
                                    thousand: ',',
                                    precision: 2,
                                    format: '%v %s' // %s is the symbol and %v is the value
                                });
                                var maxSpeed = numberFormat.format(convert(report.maxSpeed).from('knot').to('km/h'), {
                                    symbol: 'Km/h',
                                    decimal: '.',
                                    thousand: ',',
                                    precision: 2,
                                    format: '%v %s' // %s is the symbol and %v is the value
                                });
                                tableRow = '<tr>' +
                                    '<td>' + report.deviceName + '</td>' +
                                    '<td class="text-right">' + distance + '</td>' +
                                    '<td class="text-right">' + startOdometer + '</td>' +
                                    '<td class="text-right">' + endOdometer + '</td>' +
                                    '<td class="text-right">' + averageSpeed + '</td>' +
                                    '<td class="text-right">' + maxSpeed + '</td>' +
                                    '</tr>';
                            } else {
                                var distance = numberFormat.format(report.distance, {
                                    symbol: 'm',
                                    decimal: '.',
                                    thousand: ',',
                                    precision: 2,
                                    format: '%v %s' // %s is the symbol and %v is the value
                                });
                                var startOdometer = numberFormat.format(report.startOdometer/1000, {
                                    symbol: 'Km',
                                    decimal: '.',
                                    thousand: ',',
                                    precision: 2,
                                    format: '%v %s' // %s is the symbol and %v is the value
                                });
                                var endOdometer = numberFormat.format(report.endOdometer/1000, {
                                    symbol: 'Km',
                                    decimal: '.',
                                    thousand: ',',
                                    precision: 2,
                                    format: '%v %s' // %s is the symbol and %v is the value
                                });
                                var averageSpeed = numberFormat.format(report.averageSpeed, {
                                    symbol: 'Kn',
                                    decimal: '.',
                                    thousand: ',',
                                    precision: 2,
                                    format: '%v %s' // %s is the symbol and %v is the value
                                });
                                var maxSpeed = numberFormat.format(report.maxSpeed, {
                                    symbol: 'Kn',
                                    decimal: '.',
                                    thousand: ',',
                                    precision: 2,
                                    format: '%v %s' // %s is the symbol and %v is the value
                                });
                                tableRow = '<tr>' +
                                    '<td>' + report.deviceName + '</td>' +
                                    '<td class="text-right">' + distance + '</td>' +
                                    '<td class="text-right">' + startOdometer + '</td>' +
                                    '<td class="text-right">' + endOdometer + '</td>' +
                                    '<td class="text-right">' + averageSpeed + '</td>' +
                                    '<td class="text-right">' + maxSpeed + '</td>' +
                                    '</tr>';
                            }
                            $('#reportSummaryTable tbody').append(tableRow);
                        });
                        reportCard.removeClass('d-none');
                    } else {
                        Swal.fire({
                            title: "<?=lang('Text.info')?>",
                            html: '<h4><?=lang('Text.no_report_available')?></h4>',
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
            $.axiosPost("<?=base_url('rest/report/summary')?>", headers, filterForm.serialize(), filterCard, callback);
        });
    });
</script>
</body>
<!-- END: Body-->

</html>
