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
                <h3 class="content-header-title"><?=lang('route_history')?> (<?=lang('animation')?>)</h3>
            </div>
            <div class="content-header-right breadcrumbs-right col-md-6 col-12 d-none d-md-block">
                <div class="breadcrumb-wrapper">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item pl-0"><a href="<?=base_url('panel/map')?>"><?=lang('map')?></a></li>
                        <li class="breadcrumb-item pl-0"><a href="#"><?=lang('route_history')?></a></li>
                        <li class="breadcrumb-item pl-0 active"><?=lang('animation')?></li>
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
                    <h4 class="card-title"><?=lang('route_history')?> (<?=lang('animation')?>)</h4>
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
            let formData = 'device_id=' + $('#device_id').val() + '&start_date=' + $('#start_date').val() + '&end_date=' + $('#end_date').val();
            mapCard.addClass('d-none');
            reportRouteMapHolder.empty();
            $("#reportRouteMapHolder").css("height", "calc(100vh - 380px)");
            reportRouteMapHolder.html('<iframe id="reportRouteMap" class="embed-responsive-item" src="<?=base_url("panel/route-animation-history")?>?' + formData + '" allowfullscreen></iframe>');
            $("#reportRouteMap").css({"height": "calc(100vh - 400px)", "width": "100%"});
            mapCard.removeClass('d-none');
        });
    });
</script>
</body>
<!-- END: Body-->

</html>
