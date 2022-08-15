<!DOCTYPE html>
<html class="loading" lang="<?= $html_lang ?>" data-textdirection="ltr">
<!-- BEGIN: Head-->

<head>
    <?php $this->load->view('include/css'); ?>
    <link id="" rel="stylesheet" href="<?= base_url('app-assets/vendors/sweetalert2/dist/sweetalert2.min.css'); ?>">
    <style>
        .dataTables_wrapper.no-footer .dataTables_scrollBody {
            border-bottom: none !important;
        }
        .table th, .table td {
            border-top: none;
        }
        .customizer {
            width: 360px;
            right: -360px;
            padding: 0;
            background-color: #FFF;
            z-index: 1051;
            position: fixed;
            top: 0;
            bottom: 0;
            height: 100vh;
            transition: right 0.4s cubic-bezier(0.05, 0.74, 0.2, 0.99);
            backface-visibility: hidden;
            border-left: 1px solid rgba(0, 0, 0, 0.05);
            box-shadow: 0 0 8px rgba(0, 0, 0, 0.1);
        }
        .leaflet-marker-icon, .leaflet-marker-shadow {
            transition: transform 0.25s ease;
            -webkit-transition: transform 0.25s ease;
            -o-transition: transform 0.25s ease;
            -moz-transition: transform 0.25s ease;
        }
    </style>
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
    <div class="content-wrapper p-0">
        <div class="content-body">
            <div id="devicePositionMap" style="height: calc(100vh - 8.1rem); min-height: calc(100vh - 8.1rem); max-height: calc(100vh - 8.1rem); position: relative; outline: none;"></div>
        </div>
        <div class="modal fade text-left" id="newDeviceModal" tabindex="-1" role="dialog"
             aria-labelledby="newDeviceModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable" role="document">
                <div class="modal-content">
                    <form class="form" id="newDeviceForm" name="newDeviceForm">
                        <input type="hidden" id="speedUnit" name="speedUnit">
                        <div class="modal-header">
                            <h4 class="modal-title"
                                id="newDeviceModalLabel"><?= lang('newDeviceModalTitle') ?></h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="form-body">
                                <ul class="nav nav-tabs">
                                    <li class="nav-item">
                                        <a class="nav-link active" id="base-tab1" data-toggle="tab" aria-controls="tab1" href="#tabAdd1" aria-expanded="true">
                                            <?= lang('basicInformation') ?>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="base-tab2" data-toggle="tab" aria-controls="tab2" href="#tabAdd2" aria-expanded="false">
                                            <?= lang('additionalInformation') ?>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="base-tab3" data-toggle="tab" aria-controls="tab3" href="#tabAdd3" aria-expanded="false">
                                            <?= lang('attributes') ?>
                                        </a>
                                    </li>
                                </ul>
                                <div class="tab-content px-1 pt-1">
                                    <div role="tabpanel" class="tab-pane active" id="tabAdd1" aria-expanded="true" aria-labelledby="base-tab1">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="deviceName"><?= lang('deviceName') ?></label>
                                                    <input type="text" id="deviceName" class="form-control"
                                                           placeholder="<?= lang('deviceName') ?>"
                                                           name="deviceName">
                                                    <input type="hidden" id="deviceId" class="form-control"
                                                           placeholder="Device Id" name="deviceId">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="deviceIdentifier"><?= lang('deviceIdentifier') ?></label>
                                                    <input type="text" id="deviceIdentifier" class="form-control"
                                                           placeholder="<?= lang('deviceIdentifier') ?>"
                                                           name="deviceIdentifier">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane" id="tabAdd2" aria-labelledby="base-tab2">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="group"><?= lang('group') ?></label>
                                                    <select class="select2 form-control" id="group"
                                                            name="group" multiple="multiple">
                                                        <?php
                                                        if (!empty($groups)) {
                                                            foreach ($groups as $index => $group) {
                                                                echo '<option value="' . $group->id . '">' . $group->name . '</option>';
                                                            }
                                                        }
                                                        ?>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="phone"><?= lang('phone') ?></label>
                                                    <input type="text" id="phone" class="form-control"
                                                           placeholder="<?= lang('phone') ?>" name="phone">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="model"><?= lang('model') ?></label>
                                                    <input type="text" id="model" class="form-control"
                                                           placeholder="<?= lang('model') ?>" name="model">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="contact"><?= lang('contact') ?></label>
                                                    <input type="text" id="contact" class="form-control"
                                                           placeholder="<?= lang('contact') ?>" name="contact">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="category"><?= lang('category') ?></label>
                                                    <select class="select2 form-control" id="category"
                                                            name="category">
                                                        <option value="animal"><?= lang('animal') ?></option>
                                                        <option value="bicycle"><?= lang('bicycle') ?></option>
                                                        <option value="boat"><?= lang('boat') ?></option>
                                                        <option value="bus"><?= lang('bus') ?></option>
                                                        <option value="car"><?= lang('car') ?></option>
                                                        <option value="crane"><?= lang('crane') ?></option>
                                                        <option value="helicopter"><?= lang('helicopter') ?></option>
                                                        <option value="motorcycle"><?= lang('motorCycle') ?></option>
                                                        <option value="offroad"><?= lang('offRoad') ?></option>
                                                        <option value="person"><?= lang('person') ?></option>
                                                        <option value="pickup"><?= lang('pickup') ?></option>
                                                        <option value="plane"><?= lang('plane') ?></option>
                                                        <option value="ship"><?= lang('ship') ?></option>
                                                        <option value="tractor"><?= lang('tractor') ?></option>
                                                        <option value="train"><?= lang('train') ?></option>
                                                        <option value="tram"><?= lang('tram') ?></option>
                                                        <option value="trolleybus"><?= lang('trolleybus') ?></option>
                                                        <option value="truck"><?= lang('truck') ?></option>
                                                        <option value="van"><?= lang('van') ?></option>
                                                        <option value="scooter"><?= lang('scooter') ?></option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane" id="tabAdd3" aria-labelledby="base-tab3">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="speedLimit"><?= lang('speedLimit') ?></label>
                                                    <div class="input-group">
                                                        <input type="text" id="speedLimit" name="attributes[speedLimit]" class="form-control" placeholder="<?= lang('speedLimit') ?>" aria-describedby="speedLimitText">
                                                        <div class="input-group-append">
                                                            <span class="input-group-text" id="speedLimitText">Km/h</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input"
                                                       value="1" name="disabled" id="disabled">
                                                <label class="custom-control-label"
                                                       for="disabled"><?= lang('disabled') ?></label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-outline-info" id="confirmDevice"
                                    name="confirmDevice"><?= lang('save') ?>
                            </button>
                            <button type="button" class="btn grey btn-outline-secondary" data-dismiss="modal">
                                <?= lang('close') ?>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="modal fade text-left" id="changeDeviceModal" tabindex="-1" role="dialog"
             aria-labelledby="changeDeviceModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable" role="document">
                <div class="modal-content">
                    <form class="form" id="updateDeviceForm" name="updateDeviceForm">
                        <input type="hidden" id="speedUnitUpdate" name="speedUnitUpdate">
                        <div class="modal-header">
                            <h4 class="modal-title"
                                id="changeDeviceModalLabel"><?= lang('changeDeviceModalTitle') ?></h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="form-body">
                                <ul class="nav nav-tabs">
                                    <li class="nav-item">
                                        <a class="nav-link active" id="base-tab1" data-toggle="tab" aria-controls="tab1" href="#tab1" aria-expanded="true">
                                            <?= lang('basicInformation') ?>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="base-tab2" data-toggle="tab" aria-controls="tab2" href="#tab2" aria-expanded="false">
                                            <?= lang('additionalInformation') ?>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="base-tab3" data-toggle="tab" aria-controls="tab3" href="#tab3" aria-expanded="false">
                                            <?= lang('attributes') ?>
                                        </a>
                                    </li>
                                </ul>
                                <div class="tab-content px-1 pt-1">
                                    <div role="tabpanel" class="tab-pane active" id="tab1" aria-expanded="true" aria-labelledby="base-tab1">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="deviceNameUpdate"><?= lang('deviceName') ?></label>
                                                    <input type="text" id="deviceNameUpdate" class="form-control"
                                                           placeholder="<?= lang('deviceName') ?>"
                                                           name="deviceNameUpdate">
                                                    <input type="hidden" id="deviceIdUpdate" class="form-control"
                                                           placeholder="Device Id" name="deviceIdUpdate">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="deviceIdentifierUpdate"><?= lang('deviceIdentifier') ?></label>
                                                    <input type="text" id="deviceIdentifierUpdate" class="form-control"
                                                           placeholder="<?= lang('deviceIdentifier') ?>"
                                                           name="deviceIdentifierUpdate">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane" id="tab2" aria-labelledby="base-tab2">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="groupUpdate"><?= lang('group') ?></label>
                                                    <select class="select2 form-control" id="groupUpdate"
                                                            name="groupUpdate" multiple="multiple">
                                                        <?php
                                                        if (!empty($groups)) {
                                                            foreach ($groups as $index => $group) {
                                                                echo '<option value="' . $group->id . '">' . $group->name . '</option>';
                                                            }
                                                        }
                                                        ?>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="phoneUpdate"><?= lang('phone') ?></label>
                                                    <input type="text" id="phoneUpdate" class="form-control"
                                                           placeholder="<?= lang('phone') ?>" name="phoneUpdate">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="modelUpdate"><?= lang('model') ?></label>
                                                    <input type="text" id="modelUpdate" class="form-control"
                                                           placeholder="<?= lang('model') ?>" name="modelUpdate">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="contactUpdate"><?= lang('contact') ?></label>
                                                    <input type="text" id="contactUpdate" class="form-control"
                                                           placeholder="<?= lang('contact') ?>" name="contactUpdate">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="categoryUpdate"><?= lang('category') ?></label>
                                                    <select class="select2 form-control" id="categoryUpdate"
                                                            name="categoryUpdate">
                                                        <option value="animal"><?= lang('animal') ?></option>
                                                        <option value="bicycle"><?= lang('bicycle') ?></option>
                                                        <option value="boat"><?= lang('boat') ?></option>
                                                        <option value="bus"><?= lang('bus') ?></option>
                                                        <option value="car"><?= lang('car') ?></option>
                                                        <option value="crane"><?= lang('crane') ?></option>
                                                        <option value="helicopter"><?= lang('helicopter') ?></option>
                                                        <option value="motorcycle"><?= lang('motorCycle') ?></option>
                                                        <option value="offroad"><?= lang('offRoad') ?></option>
                                                        <option value="person"><?= lang('person') ?></option>
                                                        <option value="pickup"><?= lang('pickup') ?></option>
                                                        <option value="plane"><?= lang('plane') ?></option>
                                                        <option value="ship"><?= lang('ship') ?></option>
                                                        <option value="tractor"><?= lang('tractor') ?></option>
                                                        <option value="train"><?= lang('train') ?></option>
                                                        <option value="tram"><?= lang('tram') ?></option>
                                                        <option value="trolleybus"><?= lang('trolleybus') ?></option>
                                                        <option value="truck"><?= lang('truck') ?></option>
                                                        <option value="van"><?= lang('van') ?></option>
                                                        <option value="scooter"><?= lang('scooter') ?></option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane" id="tab3" aria-labelledby="base-tab3">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="speedLimitUpdate"><?= lang('speedLimit') ?></label>
                                                    <div class="input-group">
                                                        <input type="text" id="speedLimitUpdate" name="attributes[speedLimit]" class="form-control" placeholder="<?= lang('speedLimit') ?>" aria-describedby="speedLimitUpdateText">
                                                        <div class="input-group-append">
                                                            <span class="input-group-text" id="speedLimitUpdateText">Km/h</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input"
                                                       value="1" name="disabledUpdate" id="disabledUpdate">
                                                <label class="custom-control-label"
                                                       for="disabledUpdate"><?= lang('disabled') ?></label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-outline-info" id="confirmUpdateDevice"
                                    name="confirmUpdateDevice"><?= lang('save') ?>
                            </button>
                            <button type="button" class="btn grey btn-outline-secondary" data-dismiss="modal">
                                <?= lang('close') ?>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="modal fade text-left" id="deviceInfoModal" tabindex="-1" role="dialog"
             aria-labelledby="deviceInfoModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-scrollable" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title"
                            id="deviceInfoModalLabel"><?= lang('deviceInfoModalTitle') ?></h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-md-4 label-control"
                                           for="deviceInfoTime"><?= lang('lastUpdate') ?></label>
                                    <div class="col-md-8 mx-auto">
                                        <input type="text" readonly class="form-control form-control-plaintext"
                                               id="deviceInfoTime" name="deviceInfoTime">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-md-4 label-control"
                                           for="deviceInfoLatitude"><?= lang('latitude') ?></label>
                                    <div class="col-md-8 mx-auto">
                                        <input type="text" readonly class="form-control form-control-plaintext"
                                               id="deviceInfoLatitude" name="deviceInfoLatitude">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-md-4 label-control"
                                           for="deviceInfoLongitude"><?= lang('longitude') ?></label>
                                    <div class="col-md-8 mx-auto">
                                        <input type="text" readonly class="form-control form-control-plaintext"
                                               id="deviceInfoLongitude" name="deviceInfoLongitude">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-md-4 label-control"
                                           for="deviceInfoValidity"><?= lang('validity') ?></label>
                                    <div class="col-md-8 mx-auto">
                                        <input type="text" readonly class="form-control form-control-plaintext"
                                               id="deviceInfoValidity" name="deviceInfoValidity">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-md-4 label-control"
                                           for="deviceInfoAccuracy"><?= lang('accuracy') ?></label>
                                    <div class="col-md-8 mx-auto">
                                        <input type="text" readonly class="form-control form-control-plaintext"
                                               id="deviceInfoAccuracy" name="deviceInfoAccuracy">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-md-4 label-control"
                                           for="deviceInfoAltitude"><?= lang('altitude') ?></label>
                                    <div class="col-md-8 mx-auto">
                                        <input type="text" readonly class="form-control form-control-plaintext"
                                               id="deviceInfoAltitude" name="deviceInfoAltitude">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-md-4 label-control"
                                           for="deviceInfoSpeed"><?= lang('speed') ?></label>
                                    <div class="col-md-8 mx-auto">
                                        <input type="text" readonly class="form-control form-control-plaintext"
                                               id="deviceInfoSpeed" name="deviceInfoSpeed">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-md-4 label-control"
                                           for="deviceInfoCourse"><?= lang('course') ?></label>
                                    <div class="col-md-8 mx-auto">
                                        <input type="text" readonly class="form-control form-control-plaintext"
                                               id="deviceInfoCourse" name="deviceInfoCourse">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-md-4 label-control"
                                           for="deviceInfoProtocol"><?= lang('protocol') ?></label>
                                    <div class="col-md-8 mx-auto">
                                        <input type="text" readonly class="form-control form-control-plaintext"
                                               id="deviceInfoProtocol" name="deviceInfoProtocol">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--<div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group row">
                                            <label class="col-md-2 label-control" for="deviceInfoAddress"
                                                   id="deviceInfoAddressLabel"><? /*=lang('address')*/ ?><br/><a href="#"><? /*=lang('showAddress')*/ ?></a>
                                            </label>
                                            <div class="col-md-10 mx-auto">
                                                <textarea readonly class="form-control form-control-plaintext"
                                                          id="deviceInfoAddress" name="deviceInfoAddress"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>-->
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-md-4 label-control"
                                           for="deviceInfoIgnition"><?= lang('ignition') ?></label>
                                    <div class="col-md-8 mx-auto">
                                        <input type="text" readonly class="form-control form-control-plaintext"
                                               id="deviceInfoIgnition" name="deviceInfoIgnition">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-md-4 label-control"
                                           for="deviceInfoStatus"><?= lang('status') ?></label>
                                    <div class="col-md-8 mx-auto">
                                        <input type="text" readonly class="form-control form-control-plaintext"
                                               id="deviceInfoStatus" name="deviceInfoStatus">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-md-4 label-control" for="deviceInfoIo1">Io1</label>
                                    <div class="col-md-8 mx-auto">
                                        <input type="text" readonly class="form-control form-control-plaintext"
                                               id="deviceInfoIo1" name="deviceInfoIo1">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-md-4 label-control" for="deviceInfoIo2">Io2</label>
                                    <div class="col-md-8 mx-auto">
                                        <input type="text" readonly class="form-control form-control-plaintext"
                                               id="deviceInfoIo2" name="deviceInfoIo2">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-md-4 label-control" for="deviceInfoIo3">Io3</label>
                                    <div class="col-md-8 mx-auto">
                                        <input type="text" readonly class="form-control form-control-plaintext"
                                               id="deviceInfoIo3" name="deviceInfoIo3">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-md-4 label-control" for="deviceInfoIo4">Io4</label>
                                    <div class="col-md-8 mx-auto">
                                        <input type="text" readonly class="form-control form-control-plaintext"
                                               id="deviceInfoIo4" name="deviceInfoIo4">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-md-4 label-control"
                                           for="deviceInfoDistance"><?= lang('distance') ?></label>
                                    <div class="col-md-8 mx-auto">
                                        <input type="text" readonly class="form-control form-control-plaintext"
                                               id="deviceInfoDistance" name="deviceInfoDistance">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-md-4 label-control"
                                           for="deviceInfoTotalDistance"><?= lang('totalDistance') ?></label>
                                    <div class="col-md-8 mx-auto">
                                        <input type="text" readonly class="form-control form-control-plaintext"
                                               id="deviceInfoTotalDistance" name="deviceInfoTotalDistance">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-md-4 label-control"
                                           for="deviceInfoMotion"><?= lang('motion') ?></label>
                                    <div class="col-md-8 mx-auto">
                                        <input type="text" readonly class="form-control form-control-plaintext"
                                               id="deviceInfoMotion" name="deviceInfoMotion">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-md-4 label-control"
                                           for="deviceInfoPositionHours"><?= lang('positionHours') ?></label>
                                    <div class="col-md-8 mx-auto">
                                        <input type="text" readonly class="form-control form-control-plaintext"
                                               id="deviceInfoPositionHours" name="deviceInfoPositionHours">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn grey btn-outline-secondary" data-dismiss="modal">
                            <?= lang('close') ?>
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade text-left" id="deviceCommandModal" tabindex="" role="dialog"
             aria-labelledby="deviceCommandModalLabel" aria-hidden="true">
            <div class="modal-dialog " role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title"
                            id="deviceCommandModalLabel"><?= lang('deviceInfoModalTitle') ?></h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body" style="overflow-x: hidden;">
                        <div class="row mb-1">
                            <div class="col-md-4">
                                <label class="label-control"
                                       for="deviceInfoTime"><?= lang('lastUpdate') ?></label>
                            </div>
                            <div class="col-md-8">
                                <input type="text" readonly class="form-control form-control-plaintext"
                                       id="deviceInfoTime" name="deviceInfoTime">
                            </div>
                        </div>
                        <div class="row mb-1">
                            <div class="col-md-4">
                                <label class="label-control"
                                       for="deviceInfoStatus"><?= lang('status') ?></label>
                            </div>
                            <div class="col-md-8">
                                <input type="text" readonly class="form-control form-control-plaintext"
                                       id="deviceInfoStatus" name="deviceInfoStatus">
                            </div>
                        </div>
                        <div class="row mb-1">
                            <div class="col-md-4">
                                <label class="label-control" for="deviceInfoSpeed"><?= lang('speed') ?></label>
                            </div>
                            <div class="col-md-8">
                                <input type="text" readonly class="form-control form-control-plaintext"
                                       id="deviceInfoSpeed" name="deviceInfoSpeed">
                                <input type="hidden" id="deviceId" name="deviceId">
                            </div>
                        </div>
                        <div class="row mb-1">
                            <label class="col-md-4 label-control" for="deviceInfoAddress"
                                   id="deviceInfoAddressLabel"><?= lang('address') ?><br/><a
                                        href="#"><?= lang('showAddress') ?></a>
                            </label>
                            <div class="col-md-8">
                                                <textarea readonly class="form-control form-control-plaintext"
                                                          id="deviceInfoAddress" name="deviceInfoAddress"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn grey btn-danger" id="engineStop" name="engineStop">
                            <i class="fad fa-lock"></i> <?= lang('engineStop') ?>
                        </button>
                        <button type="button" class="btn grey btn-success" id="engineResume"
                                name="engineResume">
                            <i class="fad fa-unlock"></i> <?= lang('engineResume') ?>
                        </button>
                        <button type="button" class="btn grey btn-outline-secondary" data-dismiss="modal">
                            <?= lang('close') ?>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- END: Content-->
<!-- BEGIN: Customizer-->
<div class="customizer border-left-blue-grey border-left-lighten-4"><a class="customizer-close" href="#"><i
                class="ft-x font-medium-3"></i></a>
    <a class="customizer-toggle bg-info box-shadow-3" href="#"><i class="fad fa-cars font-medium-3 white"></i></a>
    <div class="customizer-content">
        <div class="customizer-header px-2 pt-1 pb-0 position-relative">
            <h4 class="text-uppercase mb-0"><?= lang('deviceList') ?><span id="totalDevice" class="ml-1 badge badge-primary">0</span></h4>
        </div>
        <hr>
        <div class="customizer-menu px-1">
            <div class="input-group">
                <input type="text" class="form-control" id="filter" name="filter"
                       placeholder="<?= lang('filter') ?>">
                <div class="input-group-append">
                    <button type="button" class="btn btn-info" id="addNewDeviceButton"
                            name="addNewDeviceButton" data-sidebar="menu-light"><?= lang('newDevice') ?></button>
                </div>
            </div>
        </div>
        <div class="customizer-menu mt-1" style="padding-left: 0.5rem!important; padding-right: 0.5rem!important;">
            <table id="deviceTable" class="table table-scroll table-sm">
                <thead>
                <tr class="">
                    <th class="text-center text-nowrap">#</th>
                    <th class="text-center text-nowrap"><?=lang('deviceName')?></th>
                    <th class="text-center"><?=lang('option')?></th>
                </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
        </div>
    </div>
</div>
<!-- End: Customizer-->

<div class="sidenav-overlay"></div>
<div class="drag-target"></div>

<!-- BEGIN: Footer-->
<footer class="footer footer-static footer-light navbar-border navbar-shadow">
    <p class="clearfix blue-grey lighten-2 text-sm-center mb-0 px-2"><span class="float-md-left d-block d-md-inline-block"><?= lang('copyright'); ?> &copy; 2021 <a class="text-bold-800 grey darken-2" href="https://netaractakip.com" target="_blank">NET Arac Takip</a></span><span id="scroll-top"></span></p>
</footer>
<!-- END: Footer-->

<?php $this->load->view('include/js'); ?>
<script src="<?= base_url('app-assets/vendors/sweetalert2/dist/sweetalert2.all.min.js'); ?>"></script>
<script src="<?= base_url('app-assets/js/scripts/customizer.js'); ?>"></script>

<!-- BEGIN: Page JS-->
<!-- END: Page JS-->
<script>
    $(document).ready(function () {
        'use strict';
        const pageId = $('#<?= $pageId ?>');
        pageId.addClass('active');
        let speedUnit = '<?php
            if (isset($user->attributes->speedUnit)) {
                echo $user->attributes->speedUnit;
            } else {
                echo "";
            }
            ?>';
        let timezone = '<?php
            if (isset($user->attributes->timezone)) {
                echo $user->attributes->timezone;
            } else {
                echo "";
            }
            ?>';
        let distanceUnit = '<?php
            if (isset($user->attributes->distanceUnit)) {
                echo $user->attributes->distanceUnit;
            } else {
                echo "";
            }
            ?>';
        let changeDeviceModal = new PerfectScrollbar('#changeDeviceModal .modal-body', {
            theme: "dark",
            wheelPropagation: false
        });
        let newDeviceModal = new PerfectScrollbar('#newDeviceModal .modal-body', {
            theme: "dark",
            wheelPropagation: false
        });
        let deviceInfoModal = new PerfectScrollbar('#deviceInfoModal .modal-body', {
            theme: "dark",
            wheelPropagation: false
        });
        let osm = L.tileLayer('https://{s}.tile.osm.org/{z}/{x}/{y}.png', {
            attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a>',
            maxZoom: 24,
        });
        let carto = L.tileLayer('https://{s}.basemaps.cartocdn.com/light_all/{z}/{x}/{y}.png', {
            attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a>',
            maxZoom: 24,
        });
        let googleStreets = L.tileLayer('https://{s}.google.com/vt/lyrs=m&x={x}&y={y}&z={z}', {
            maxZoom: 24,
            subdomains: ['mt0', 'mt1', 'mt2', 'mt3']
        });
        let googleHybrid = L.tileLayer('https://{s}.google.com/vt/lyrs=s,h&x={x}&y={y}&z={z}', {
            maxZoom: 24,
            subdomains: ['mt0', 'mt1', 'mt2', 'mt3']
        });
        let googleSat = L.tileLayer('https://{s}.google.com/vt/lyrs=s&x={x}&y={y}&z={z}', {
            maxZoom: 24,
            subdomains: ['mt0', 'mt1', 'mt2', 'mt3']
        });
        let googleTerrain = L.tileLayer('https://{s}.google.com/vt/lyrs=p&x={x}&y={y}&z={z}', {
            maxZoom: 24,
            subdomains: ['mt0', 'mt1', 'mt2', 'mt3']
        });
        let baseMaps = {
            "OpenStreet": osm,
            "Carto": carto,
            'Google Streets': googleStreets,
            'Google Hybrid': googleHybrid,
            'Google Satellite': googleSat,
            'Google Terrain': googleTerrain
        };
        let latitude = '<?=$user->latitude?>';
        let longitude = '<?=$user->longitude?>';
        let devicePositionMap = L.map('devicePositionMap', {
            attributionControl: false,
            fullscreenControl: true,
            zoom: 10,
            layers: [osm]
        }).setView([37.066666, 37.383331]);
        if (parseFloat(latitude) > 0 && parseFloat(longitude) > 0) {
            devicePositionMap.setView([latitude, longitude]);
        }
        L.control.layers(baseMaps).addTo(devicePositionMap);

        let traccarMarker = L.Marker.extend({
            options: {
                device: ''
            }
        });
        let markers = new L.FeatureGroup();
        let deviceTable = $('#deviceTable').dataTable({
            "scrollY":        "calc(100vh - 200px)",
            "scrollCollapse": true,
            "searching": false,
            "lengthChange": false,
            "info": false,
            "paging":   false,
            "ordering": false
        });
        var humanReadOptions = {
            short_hour: '<?=lang('short_hour')?>',
            short_minute: '<?=lang('short_minute')?>',
            short_second: '<?=lang('short_second')?>',
            short_millisecond: '<?=lang('short_millisecond')?>'
        }
        let realtime = L.realtime(function (success, error) {
            fetch('<?=base_url('rest/device/position')?>', {
                method: 'POST',
                xhrFields: {},
                headers: {
                    //'Authorization': 'Basic ' + btoa,
                    'Accept': 'application/json',
                    'Content-type': 'application/json',
                },
                body: JSON.stringify({
                    filter: $('#filter').val()
                    //filter: '27TD418'
                })
            }).then(response => response.json())
                .then((responseJson) => {
                    $('#totalDevice').text(responseJson.total);
                    let tableRow = "";
                    $('#deviceTable tbody').empty();
                    //status = online
                    let counter = 0;
                    $.each(responseJson.devices, function (index, device) {
                        let latitude = 0;
                        let longitude = 0;
                        let lastUpdate = 0;
                        if ('undefined' != typeof device.position) {
                            latitude = device.position.latitude;
                            longitude = device.position.longitude;
                            lastUpdate = device.lastUpdate;
                        }
                        let diffInSeconds = 0;
                        if (moment(lastUpdate) > 0) {
                            diffInSeconds = moment().diff(moment(lastUpdate), 'seconds');
                        }
                        let deviceEncoded = encodeURIComponent(JSON.stringify(device));
                        if (device.status === 'online') {
                            counter = counter +1;
                            tableRow += '<tr>' +
                                '<td class="text-right p-0 pr-1">' + counter + '</td>' +
                                '<td class="p-0"><a href="#" class="device-item text-success text-nowrap" data-device="' + deviceEncoded + '" data-lat="' + latitude + '" data-lng="' + longitude + '">' + device.name + '</a><br/><span class="">' + $.secondToTimeFormatted(diffInSeconds * 1000, false, humanReadOptions) + ' ' + '<?=lang('ago')?>' + '</span></td>' +
                                '<td class="text-center text-nowrap p-0"><a href="#" class="btn btn-icon btn-sm btn-warning mr-1 change-device" data-device="' + deviceEncoded + '" data-lat="' + latitude + '" data-lng="' + longitude + '"><em class="icon fad fa-edit"></em></a><a href="#" class="btn btn-icon btn-sm btn-danger delete-device" data-device="' + deviceEncoded + '" data-lat="' + latitude + '" data-lng="' + longitude + '"><em class="icon fad fa-trash"></em></a></td>' +
                                '</tr>';
                        }
                    });
                    //status = offline/unknown
                    $.each(responseJson.devices, function (index, device) {
                        let latitude = 0;
                        let longitude = 0;
                        let lastUpdate = 0;
                        if ('undefined' != typeof device.position) {
                            latitude = device.position.latitude;
                            longitude = device.position.longitude;
                            lastUpdate = device.lastUpdate;
                        }
                        let diffInSeconds = 0;
                        if (moment(lastUpdate) > 0) {
                            diffInSeconds = moment().diff(moment(lastUpdate), 'seconds');
                        }
                        let deviceEncoded = encodeURIComponent(JSON.stringify(device));
                        if (device.status !== 'online') {
                            counter = counter +1;
                            tableRow += '<tr>' +
                                '<td class="text-right p-0 pr-1">' + counter + '</td>' +
                                '<td class="p-0"><a href="#" class="device-item text-danger text-nowrap" data-device="' + deviceEncoded + '" data-lat="' + latitude + '" data-lng="' + longitude + '">' + device.name + '</a><br/><span class="">' + $.secondToTimeFormatted(diffInSeconds * 1000, false, humanReadOptions) + ' ' + '<?=lang('ago')?>' + '</span></td>' +
                                '<td class="text-center text-nowrap p-0"><a href="#" class="btn btn-icon btn-sm btn-warning mr-1 change-device" data-device="' + deviceEncoded + '" data-lat="' + latitude + '" data-lng="' + longitude + '"><em class="icon fad fa-edit"></em></a><a href="#" class="btn btn-icon btn-sm btn-danger delete-device" data-device="' + deviceEncoded + '" data-lat="' + latitude + '" data-lng="' + longitude + '"><em class="icon fad fa-trash"></em></a></td>' +
                                '</tr>';
                        }
                    });
                    $('#deviceTable tbody').append(tableRow);
                    success(responseJson.geoJson);
                })
                .catch(error => console.log(error))
        }, {
            interval: 5 * 1000,
            getFeatureId: function (featureData) {
                //console.log(featureData);
                return featureData.id;
            },
            pointToLayer: function (feature, latlng) {
                let color = '#ff4961';
                if (feature.properties.status === "online") {
                    color = '#28d094';
                }
                let marker = new traccarMarker(latlng, {
                    icon: $.getLeafletMarker(color, feature.properties.category, feature.properties.name),
                    device: feature.properties
                }).addTo(devicePositionMap).bindTooltip(feature.properties.name, {
                    permanent: true,
                    className: "badge badge-info",
                    offset: [0, 0]
                }).on('click', markerOnClick);
                markers.addLayer(marker);
                return marker;
            },
            updateFeature: function (feature, marker) {}
        }).addTo(devicePositionMap);

        let markerOnClick = function (e) {
            let device = this.options.device;
            devicePositionMap.setView(e.target.getLatLng());
            $('#deviceInfoAddress').val('');
            $('#deviceCommandModalLabel').text(device["name"] + ' <?=lang("deviceInfoModalTitle")?>');
            if ('undefined' != typeof device["position"]) {
                $('#deviceCommandModal #deviceInfoTime').val(moment(device["lastUpdate"]).format('YYYY-MM-DD HH:mm:ss'));
                if (speedUnit === 'kmh') {
                    let speed = $.number_format(parseFloat(device["position"]["speed"]) * 1.852, '2', '.', ',');
                    $('#deviceCommandModal #deviceInfoSpeed').val(speed + ' Km/h');
                    //$('#deviceInfoSpeed').val(device["position"]["speed"] + ' Kn');
                } else {
                    $('#deviceCommandModal #deviceInfoSpeed').val(device["position"]["speed"] + ' Kn');
                }
                $('#deviceCommandModal #deviceInfoStatus').val($.deviceStatus[device["status"]]);
                $('#deviceCommandModal #deviceId').val(device["id"]);
            } else {
                $('#deviceCommandModal #deviceInfoTime').val('-');
                $('#deviceCommandModal #deviceInfoSpeed').val('0 Kn');
                $('#deviceCommandModal #deviceInfoStatus').val('-');
            }
            $('#deviceInfoAddressLabel').html('<?=lang("address")?><br/><a href="#" class="get-address" lat="' + device["position"]["latitude"] + '" lng="' + device["position"]["longitude"] + '"><?=lang("showAddress")?></a>');
            $('#deviceCommandModal').modal('show');
        };
        $('#deviceCommandModal').on('click', '.get-address', function () {
            const lat = $(this).attr('lat');
            const lng = $(this).attr('lng');
            let url = 'https://us1.locationiq.com/v1/reverse.php?key=20331ac72f21a6&lat=' + lat + '&lon=' + lng + '&format=json';
            let settings = {
                "async": true,
                "crossDomain": true,
                "url": url,
                "method": "GET"
            }

            let addressInfo = '';
            $.ajax(settings).done(function (response) {
                let road = '';
                if ('undefined' != typeof response.address.road) {
                    road = response.address.road;
                }
                let village = '';
                if ('undefined' != typeof response.address.village) {
                    village = response.address.village;
                }
                let town = '';
                if ('undefined' != typeof response.address.town) {
                    town = response.address.town;
                }
                let suburb = '';
                if ('undefined' != typeof response.address.suburb) {
                    suburb = response.address.suburb;
                }
                let state = '';
                if ('undefined' != typeof response.address.state) {
                    state = response.address.state;
                }
                let country = '';
                if ('undefined' != typeof response.address.country) {
                    country = response.address.country;
                }
                let postcode = '';
                if ('undefined' != typeof response.address.postcode) {
                    postcode = response.address.postcode;
                }

                if (town != suburb) {
                    addressInfo = road + ' ' + village + ' ' + town + ' ' + suburb + ' ' + state + ' ' + country + ' ' + postcode;
                } else {
                    addressInfo = road + ' ' + village + ' ' + town + ' ' + state + ' ' + country + ' ' + postcode;
                }
                $('#deviceInfoAddress').val(addressInfo);
                //console.log(response);
            });
        });

        $('#addNewDeviceButton').click(function () {
            if (speedUnit === "kmh") {
                $('#newDeviceForm #speedLimitText').html("Km/h");
            } else {
                $('#newDeviceForm #speedLimitText').html("M/h");
            }
            $('#newDeviceModal').modal('show');
            newDeviceModal.update();
        });
        $('#newDeviceModal').on('show.bs.modal', function () {
            $('.customizer').removeClass('open');
        })
        $('#changeDeviceModal').on('show.bs.modal', function () {
            $('.customizer').removeClass('open');
        });
        $('#deviceInfoModal').on('show.bs.modal', function () {
            $('.customizer').removeClass('open');
        });

        deviceTable.on('click', '.device-item', function (e) {
            e.preventDefault();
            let deviceEncoded = $(this).attr("data-device");
            let latitude = $(this).attr("data-lat");
            let longitude = $(this).attr("data-lng");
            let device = JSON.parse(decodeURIComponent(deviceEncoded));
            devicePositionMap.setView([latitude, longitude]);
            $('#deviceInfoAddress').val('');
            $('#deviceCommandModalLabel').text(device["name"] + ' <?=lang("deviceInfoModalTitle")?>');
            if ('undefined' != typeof device["position"]) {
                $('#deviceCommandModal #deviceInfoTime').val(moment(device["lastUpdate"]).format('YYYY-MM-DD HH:mm:ss'));
                if (speedUnit === 'kmh') {
                    let speed = $.number_format(parseFloat(device["position"]["speed"]) * 1.852, '2', '.', ',');
                    $('#deviceCommandModal #deviceInfoSpeed').val(speed + ' Km/h');
                    //$('#deviceInfoSpeed').val(device["position"]["speed"] + ' Kn');
                } else {
                    $('#deviceCommandModal #deviceInfoSpeed').val(device["position"]["speed"] + ' Kn');
                }
                $('#deviceCommandModal #deviceInfoStatus').val($.deviceStatus[device["status"]]);
                $('#deviceCommandModal #deviceId').val(device["id"]);
            } else {
                $('#deviceCommandModal #deviceInfoTime').val('-');
                $('#deviceCommandModal #deviceInfoSpeed').val('0 Kn');
                $('#deviceCommandModal #deviceInfoStatus').val('-');
            }
            $('#deviceInfoAddressLabel').html('<?=lang("address")?><br/><a href="#" class="get-address" lat="' + device["position"]["latitude"] + '" lng="' + device["position"]["longitude"] + '"><?=lang("showAddress")?></a>');
            $('#deviceCommandModal').modal('show');
        });
        deviceTable.on('click', '.change-device', function (e) {
            e.preventDefault();
            let deviceEncoded = $(this).attr("data-device");
            let latitude = $(this).attr("data-lat");
            let longitude = $(this).attr("data-lng");
            let device = JSON.parse(decodeURIComponent(deviceEncoded));
            //console.log(device);
            $('#updateDeviceForm #deviceIdUpdate').val(device.id);
            $('#updateDeviceForm #speedUnitUpdate').val(speedUnit);
            $('#updateDeviceForm #deviceNameUpdate').val(device.name);
            $('#updateDeviceForm #deviceIdentifierUpdate').val(device.uniqueId);
            $('#updateDeviceForm #phoneUpdate').val(device.phone);
            $('#updateDeviceForm #modelUpdate').val(device.model);
            $('#updateDeviceForm #contactUpdate').val(device.contact);
            if (device.disabled) {
                $('#updateDeviceForm #disabledUpdate').prop('checked', true);
            }
            $('#updateDeviceForm #categoryUpdate').val(device.category).trigger('change');
            if (speedUnit === "kmh") {
                $('#updateDeviceForm #speedLimitUpdateText').html("Km/h");
            } else {
                $('#updateDeviceForm #speedLimitUpdateText').html("M/h");
            }
            if (Object.keys(device.attributes).length !== 0) {
                let speedLimit = device.attributes.speedLimit;
                if (speedUnit === 'kmh') {
                    speedLimit = $.number_format(speedLimit*1.852,2,'.','');
                    $('#updateDeviceForm #speedLimitUpdate').val(speedLimit);
                } else {
                    $('#updateDeviceForm #speedLimitUpdate').val(speedLimit);
                }

            }
            $('#changeDeviceModal').modal('show');
        });
        deviceTable.on('click', '.delete-device', function (e) {
            const deviceEncoded = $(this).attr("data-device");
            const device = JSON.parse(decodeURIComponent(deviceEncoded));
            let formData = new FormData;
            formData.append("id", device.id);
            Swal.fire({
                title: '<?=lang("deleteTitle")?> ' + device.name + '?',
                text: "<?=lang('deleteText')?>",
                type: 'warning',
                showCancelButton: true,
                confirmButtonText: "<?=lang('deleteConfirm')?>",
                confirmButtonClass: 'btn btn-danger',
                cancelButtonClass: 'btn btn-secondary ml-1',
                buttonsStyling: false,
            }).then(function (result) {
                if (result.value) {
                    $.ajax({
                        url: '<?=base_url('rest/device/delete')?>',
                        type: "post",
                        data: formData,
                        contentType: false,
                        cache: false,
                        processData: false,
                        success: function (res) {
                            if (res.success) {
                                //getDevicePosition();
                            } else {
                                Swal.fire({
                                    title: res.reason,
                                    text: res.message,
                                    type: "error",
                                    confirmButtonClass: 'btn btn-info',
                                    buttonsStyling: false,
                                });
                            }
                        },
                        error: function (ajaxResponse) {
                            Swal.fire({
                                icon: 'error',
                                title: ajaxResponse.statusText,
                                html: ajaxResponse.responseJSON.reason
                            });
                        }
                    });
                }
            });
        });
        $('#confirmDevice').click(function () {
            $('#speedUnit').val(speedUnit);
            $.ajax({
                url: '<?=base_url('rest/device/create')?>',
                method: "POST",
                data: $('#newDeviceForm').serialize(),
                beforeSend: function () {
                    $('#newDeviceModal').block({
                        message: '<i class="fad fa-spinner fa-spin fa-3x text-warning"></i>',
                        //timeout: 2000, //unblock after 2 seconds
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
                },
                complete: function () {

                },
                success: function (res) {
                    $('#newDeviceModal').unblock();
                    //res = $.parseJSON(res);
                    if (res.success) {
                        $('#newDeviceModal').modal('hide');
                        //getDevicePosition();
                    } else {
                        Swal.fire({
                            title: res.reason,
                            text: res.message,
                            type: "error",
                            confirmButtonClass: 'btn btn-info',
                            buttonsStyling: false,
                        });
                    }
                    $('#newDeviceModal').unblock();
                },
                error: function (ajaxResponse) {
                    $('#newDeviceModal').unblock();
                    Swal.fire({
                        title: "Error!",
                        text: ajaxResponse.responseJSON.reason,
                        type: "error",
                        confirmButtonClass: 'btn btn-info',
                        buttonsStyling: false,
                    });
                }
            });
        });
        $('#confirmUpdateDevice').click(function () {
            $('#speedUnitUpdate').val(speedUnit);
            $.ajax({
                url: '<?=base_url('rest/device/update')?>',
                method: "POST",
                data: $('#updateDeviceForm').serialize(),
                beforeSend: function () {
                    $('#changeDeviceModal').block({
                        message: '<i class="fad fa-spinner fa-spin fa-3x text-warning"></i>',
                        //timeout: 2000, //unblock after 2 seconds
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
                },
                complete: function () {

                },
                success: function (res) {
                    $('#changeDeviceModal').unblock();
                    //res = $.parseJSON(res);
                    if (res.success) {
                        $('#changeDeviceModal').modal('hide');
                        //getDevicePosition();
                    } else {
                        Swal.fire({
                            title: res.reason,
                            text: res.message,
                            type: "error",
                            confirmButtonClass: 'btn btn-info',
                            buttonsStyling: false,
                        });
                    }
                    $('#changeDeviceModal').unblock();
                },
                error: function (ajaxResponse) {
                    $('#changeDeviceModal').unblock();
                    Swal.fire({
                        title: "Error!",
                        text: ajaxResponse.responseJSON.reason,
                        type: "error",
                        confirmButtonClass: 'btn btn-info',
                        buttonsStyling: false,
                    });
                }
            });
        });
        let geofences = '<?=$geofences?>';
        if (!$.isEmptyObject(geofences)) {
            $.each(JSON.parse(geofences), function (index, geofence) {
                //console.log(geofence);
                let style = {};
                if (geofence.area.includes("CIRCLE")) {
                    let areaCircle = $.trim(geofence.area.replace("CIRCLE", "").replace("(", "").replace(")", "")).split(", ");
                    let radius = areaCircle[1];
                    let latlngArr = areaCircle[0].split(" ");
                    let latLng = [latlngArr[0], latlngArr[1]];
                    //console.log(radius);
                    /*let geoData = {
                        "radius": radius,
                        "latLng": latLng
                    }
                    geofenceToCheck.push(geoData);*/
                    if (typeof geofence.attributes.color != "undefined") {
                        style = {
                            color: geofence.attributes.color,
                            opacity: 1,
                            fillColor: geofence.attributes.color,
                            fillOpacity: 0.25,
                            radius: radius
                        }
                    } else {
                        style = {
                            radius: radius
                        }
                    }
                    let circle = L.circle(latLng, style).bindTooltip(geofence.name, {
                        sticky: true // If true, the tooltip will follow the mouse instead of being fixed at the feature center.
                    }).addTo(devicePositionMap);
                } else {
                    if (typeof geofence.attributes.color != "undefined") {
                        style = {
                            color: geofence.attributes.color,
                            opacity: 1,
                            fillColor: geofence.attributes.color,
                            fillOpacity: 0.25
                        }
                    }
                    let geojson = Terraformer.WKT.parse(geofence.area);
                    if (geojson.type === "Polygon") {
                        L.polygon(geojson.coordinates[0], style).bindTooltip(geofence.name, {
                            sticky: true // If true, the tooltip will follow the mouse instead of being fixed at the feature center.
                        }).addTo(devicePositionMap);
                    }
                    if (geojson.type === "LineString") {
                        L.polyline(geojson.coordinates, style).bindTooltip(geofence.name, {
                            sticky: true // If true, the tooltip will follow the mouse instead of being fixed at the feature center.
                        }).addTo(devicePositionMap);
                    }
                }
            });
        }

        $('#deviceCommandModal #engineStop').click(function () {
            let deviceId = $('#deviceCommandModal #deviceId').val();
            Swal.fire({
                title: '<?=lang("password")?>',
                input: 'password',
                inputAttributes: {
                    autocapitalize: 'off'
                },
                buttonsStyling: false,
                showCancelButton: true,
                confirmButtonText: '<?=lang("confirm")?>',
                cancelButtonText: '<?=lang("cancel")?>',
                customClass: {
                    confirmButton: "btn btn-danger mr-1",
                    cancelButton: "btn btn-dark ml-1"
                },
                //showLoaderOnConfirm: true,
                allowOutsideClick: () => !Swal.isLoading()
            }).then((result) => {
                if (result.value) {
                    let formData = new FormData;
                    formData.append("deviceId", deviceId);
                    formData.append("password", result.value);
                    $.ajax({
                        url: '<?=base_url('/rest/device/engine-stop')?>',
                        type: "post",
                        data: formData,
                        contentType: false,
                        cache: false,
                        processData: false,
                        beforeSend: function () {
                            $('#deviceCommandModal').block({
                                message: '<i class="fad fa-spinner fa-spin fa-3x text-danger"></i>',
                                //timeout: 2000, //unblock after 2 seconds
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
                        },
                        success: function (res) {
                            if (res.success) {
                                swal.fire({
                                    title: '',
                                    html: res.reason,
                                    type: "info",
                                    buttonsStyling: false,
                                    confirmButtonText: '<?=lang("ok")?>',
                                    customClass: {
                                        confirmButton: "btn btn-danger"
                                    }
                                }).then(function() {
                                    $('#deviceCommandModal').unblock();
                                    $('#deviceCommandModal').modal('hide');
                                });
                            } else {
                                swal.fire({
                                    title: '',
                                    html: res.reason,
                                    type: "error",
                                    buttonsStyling: false,
                                    confirmButtonText: '<?=lang("ok")?>',
                                    customClass: {
                                        confirmButton: "btn btn-danger"
                                    }
                                }).then(function() {
                                    $('#deviceCommandModal').unblock();
                                    $('#deviceCommandModal').modal('hide');
                                });
                            }
                        },
                        error: function (ajaxResponse) {
                            swal.fire({
                                text: ajaxResponse.statusText,
                                icon: "error",
                                buttonsStyling: false,
                                confirmButtonText: '<?=lang("ok")?>',
                                customClass: {
                                    confirmButton: "btn btn-danger"
                                }
                            }).then(function() {
                                $('#deviceCommandModal').unblock();
                                $('#deviceCommandModal').modal('hide');
                            });
                        }
                    });
                }
            });
            /*$.ajax({
                type: 'get',
                url: 'http://takip.netaractakip.com:8082/api/commands/types',
                headers: {
                    "Authorization": "Basic " + '<?=$btoa?>'
                },
                contentType: "application/json",
                data: JSON.stringify({
                    "deviceId": 170,
                    "protocol": "net",
                }),
                success: function (response) {
                    console.log(response);
                }
            });*/
            /*$.ajax({
                type: 'post',
                url: '<?=rtrim(base_url(), "/")?>:8082/api/commands/send',
                headers: {
                    "Authorization": "Basic " + '<?=$btoa?>'
                },
                contentType: "application/json",
                data: JSON.stringify({
                    "id": 4,
                    "deviceId": deviceId,
                    "description": "string",
                    "type": "string",
                    "attributes": {}
                }),
                success: function (response) {
                    console.log(response);
                }
            });*/
        });
        $('#deviceCommandModal #engineResume').click(function () {
            let deviceId = $('#deviceCommandModal #deviceId').val();
            Swal.fire({
                title: '<?=lang("password")?>',
                input: 'password',
                inputAttributes: {
                    autocapitalize: 'off'
                },
                buttonsStyling: false,
                showCancelButton: true,
                confirmButtonText: '<?=lang("confirm")?>',
                cancelButtonText: '<?=lang("cancel")?>',
                customClass: {
                    confirmButton: "btn btn-danger mr-1",
                    cancelButton: "btn btn-dark ml-1"
                },
                //showLoaderOnConfirm: true,
                allowOutsideClick: () => !Swal.isLoading()
            }).then((result) => {
                if (result.value) {
                    let formData = new FormData;
                    formData.append("deviceId", deviceId);
                    formData.append("password", result.value);
                    $.ajax({
                        url: '<?=base_url('/rest/device/engine-start')?>',
                        type: "post",
                        data: formData,
                        contentType: false,
                        cache: false,
                        processData: false,
                        beforeSend: function () {
                            $('#deviceCommandModal').block({
                                message: '<i class="fad fa-spinner fa-spin fa-3x text-danger"></i>',
                                //timeout: 2000, //unblock after 2 seconds
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
                        },
                        success: function (res) {
                            if (res.success) {
                                swal.fire({
                                    title: '',
                                    html: res.reason,
                                    type: "info",
                                    buttonsStyling: false,
                                    confirmButtonText: '<?=lang("ok")?>',
                                    customClass: {
                                        confirmButton: "btn btn-danger"
                                    }
                                }).then(function() {
                                    $('#deviceCommandModal').unblock();
                                    $('#deviceCommandModal').modal('hide');
                                });
                            } else {
                                swal.fire({
                                    title: '',
                                    html: res.reason,
                                    type: "error",
                                    buttonsStyling: false,
                                    confirmButtonText: '<?=lang("ok")?>',
                                    customClass: {
                                        confirmButton: "btn btn-danger"
                                    }
                                }).then(function() {
                                    $('#deviceCommandModal').unblock();
                                    $('#deviceCommandModal').modal('hide');
                                });
                            }
                        },
                        error: function (ajaxResponse) {
                            swal.fire({
                                text: ajaxResponse.statusText,
                                icon: "error",
                                buttonsStyling: false,
                                confirmButtonText: '<?=lang("ok")?>',
                                customClass: {
                                    confirmButton: "btn btn-danger"
                                }
                            }).then(function() {
                                $('#deviceCommandModal').unblock();
                                $('#deviceCommandModal').modal('hide');
                            });
                        }
                    });
                }
            });
            /*$.ajax({
                type: 'post',
                url: '<?=rtrim(base_url(), "/")?>:8082/api/commands/send',
                // please replace IP to your orginal IP
                headers: {
                    "Authorization": "Basic " + '<?=$btoa?>'
                    // above line please replace username and password to orginal username , password.
                },
                contentType: "application/json",
                data: JSON.stringify({
                    /!*deviceId: 139,
                    // type: "engineStop"
                    type: "engineStop"*!/
                    "id": 3,
                    "deviceId": deviceId,
                    "description": "string",
                    "type": "string",
                    "attributes": {}
                }),
                success: function (response) {
                    console.log(response);
                }
            });*/
            /*let formData = new FormData;
            formData.append("id", deviceId);
            formData.append("type", "engineResume");
            $.ajax({
                url: '<?=base_url('api/send-command')?>',
                type: "post",
                data: formData,
                contentType: false,
                cache: false,
                processData: false,
                success: function (res) {
                    if (res.success) {
                        getDevicePosition();
                    } else {
                        Swal.fire({
                            title: res.reason,
                            text: res.message,
                            type: "error",
                            confirmButtonClass: 'btn btn-info',
                            buttonsStyling: false,
                        });
                    }
                },
                error: function (ajaxResponse) {
                    Swal.fire({
                        icon: 'error',
                        title: ajaxResponse.statusText,
                        html: ajaxResponse.responseJSON.reason
                    });
                }
            });*/
        });
    });
</script>
</body>
<!-- END: Body-->

</html>
