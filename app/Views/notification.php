<!DOCTYPE html>
<html class="loading" lang="<?= lang('Text.lang') ?>" data-textdirection="ltr">
<!-- BEGIN: Head-->
<?= view('include/head'); ?>
<!-- END: Head-->
<style>
    .nav-vertical .nav-left.nav-tabs li.nav-item a.nav-link.active {
        border: 1px solid transparent;
        border-right: 0;
        border-radius: 0.25rem 0 0 0.25rem;
    }
    .nav-vertical .nav-left.nav-tabs li.nav-item a.nav-link {
        min-width: 6.5rem;
        border-right: 1px solid transparent;
    }
</style>
<!-- BEGIN: Body-->

<body class="vertical-layout vertical-menu 2-columns   fixed-navbar" data-open="click" data-menu="vertical-menu"
      data-col="2-columns">

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
                <h3 class="content-header-title"><?= lang('Text.notification') ?></h3>
            </div>
            <div class="content-header-right breadcrumbs-right col-md-6 col-12 d-none d-md-block">
                <div class="breadcrumb-wrapper">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item pl-0"><a href="<?= base_url('panel/map') ?>"><?= lang('Text.map') ?></a>
                        </li>
                        <li class="breadcrumb-item pl-0"><a href="#"><?= lang('Text.settings') ?></a></li>
                        <li class="breadcrumb-item pl-0 active"><?= lang('Text.notification') ?></li>
                    </ol>
                </div>
            </div>
        </div>
        <div class="content-body">
            <div class="row">
                <div class="col-md-2">
                    <div class="card">
                        <div class="card-content">
                            <div class="card-body nav-vertical">
                                <ul class="nav nav-tabs nav-left flex-column">
                                    <li class="nav-item">
                                        <a class="nav-link active" id="geofenceEnter-tab" data-toggle="tab" aria-controls="geofenceEnter" href="#geofenceEnter" aria-expanded="true"><?=lang('Text.geofenceEnter')?></a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="geofenceExit-tab" data-toggle="tab" aria-controls="geofenceExit" href="#geofenceExit" aria-expanded="true"><?=lang('Text.geofenceExit')?></a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="deviceOverspeed-tab" data-toggle="tab" aria-controls="deviceOverspeed" href="#deviceOverspeed" aria-expanded="true"><?=lang('Text.deviceOverspeed')?></a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="deviceOnline-tab" data-toggle="tab" aria-controls="deviceOnline" href="#deviceOnline" aria-expanded="true"><?=lang('Text.deviceOnline')?></a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="deviceOffline-tab" data-toggle="tab" aria-controls="deviceOffline" href="#deviceOffline" aria-expanded="true"><?=lang('Text.deviceOffline')?></a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-10">
                    <div class="card">
                        <div class="card-content">
                            <div class="card-body">
                                <div class="tab-content px-1 pt-1">
                                    <div role="tabpanel" class="tab-pane active" id="geofenceEnter" aria-expanded="true" aria-labelledby="geofenceEnter-tab">
                                        Loading..
                                    </div>
                                    <div class="tab-pane" id="geofenceExit" aria-labelledby="geofenceExit-tab">
                                        Loading..
                                    </div>
                                    <div class="tab-pane" id="deviceOverspeed" aria-labelledby="deviceOverspeed-tab">
                                        Loading..
                                    </div>
                                    <div class="tab-pane" id="deviceOnline" aria-labelledby="deviceOnline-tab">
                                        Loading..
                                    </div>
                                    <div class="tab-pane" id="deviceOffline" aria-labelledby="deviceOffline-tab">
                                        Loading..
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
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
    });
</script>
</body>
<!-- END: Body-->

</html>
