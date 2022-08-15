<!DOCTYPE html>
<html class="loading" lang="<?= lang('Text.lang') ?>" data-textdirection="ltr">
<!-- BEGIN: Head-->
<?= view('include/head'); ?>
<!-- END: Head-->

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
                <h3 class="content-header-title"><?= lang('Text.updateUser') ?></h3>
            </div>
            <div class="content-header-right breadcrumbs-right col-md-6 col-12 d-none d-md-block">
                <div class="breadcrumb-wrapper">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item pl-0"><a href="<?= base_url('panel/map') ?>"><?= lang('Text.map') ?></a></li>
                        <li class="breadcrumb-item pl-0"><a href="#"><?= lang('Text.settings') ?></a></li>
                        <li class="breadcrumb-item pl-0"><a href="<?= base_url('panel/users') ?>"><?= lang('Text.users') ?></a></li>
                        <li class="breadcrumb-item pl-0 active"><?= lang('Text.updateUser') ?></li>
                    </ol>
                </div>
            </div>
        </div>
        <div class="content-body">
            <!-- Description -->
            <section id="userCard" class="card">
                <div class="card-content collapse show">
                    <div class="card-header">
                        <h4 class="card-title" id="updateUserCardTitle"><?=lang('Text.updateUser')?></h4>
                        <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                        <div class="heading-elements">
                            <button type="button" class="btn btn-icon btn-light cancel" id="cancelUpdateButton">
                                <?=lang('Text.back')?>
                            </button>
                        </div>
                    </div>
                    <div class="card-body py-0">
                        <form class="form updateUserForm" id="updateUserForm" name="updateUserForm" novalidate="">
                            <div class="form-body">
                                <div class="row">
                                    <div class="col-md-2">
                                        <ul class="nav nav-tabs nav-top-border no-hover-bg" role="tablist">
                                            <li class="nav-item">
                                                <a class="nav-link active" id="required-tab" data-toggle="tab" href="#required" aria-controls="required" role="tab" aria-selected="true"><?=lang('Text.required')?></a>
                                            </li>
                                        </ul>
                                        <div class="tab-content pt-1">
                                            <div class="tab-pane active" id="required" aria-labelledby="required-tab" role="tabpanel">
                                                <div class="form-group">
                                                    <label class="" for="name"><?=lang('Text.name')?></label>
                                                    <input type="text" id="name" class="form-control" placeholder="<?=lang('Text.name')?>" name="name">
                                                    <input type="hidden" id="id" name="id">
                                                </div>
                                                <div class="form-group">
                                                    <label class="" for="email"><?=lang('Text.email')?></label>
                                                    <input type="text" id="email" class="form-control" placeholder="<?=lang('Text.email')?>" name="email">
                                                </div>
                                                <div class="form-group">
                                                    <label class="" for="password"><?=lang('Text.password')?></label>
                                                    <input type="password" id="password" class="form-control" placeholder="<?=lang('Text.password')?>" name="password">
                                                    <small class="badge badge-warning" id="passwordHint"><?=lang('Text.passwordHint')?></small>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-10">
                                        <ul class="nav nav-tabs nav-top-border no-hover-bg flex-nowrap">
                                            <li class="nav-item">
                                                <a class="nav-link active" id="base-preferenceTab" data-toggle="tab" aria-controls="preferenceTab" href="#preferenceTab" aria-expanded="true"><?=lang('Text.preference')?></a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" id="base-authorityTab" data-toggle="tab" aria-controls="authorityTab" href="#authorityTab" aria-expanded="false" ><?=lang('Text.authority')?></a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" id="base-attributesTab" data-toggle="tab" aria-controls="attributesTab" href="#attributesTab" aria-expanded="false"><?=lang('Text.attributes')?></a>
                                            </li>
                                        </ul>
                                        <div class="tab-content pt-1">
                                            <div class="tab-pane active" id="preferenceTab" aria-expanded="true" aria-labelledby="base-preferenceTab">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label for="phone"><?=lang('Text.phone')?></label>
                                                                    <input type="text" id="phone" class="form-control" placeholder="<?=lang('Text.phone')?>" name="phone">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6" id="mapColSelect">
                                                                <div class="form-group">
                                                                    <label for="map">Map</label>
                                                                    <select id="map" name="map" class="select2 form-control" data-placeholder="<?=lang('Text.map')?>"
                                                                            data-allow-clear="true">
                                                                        <option></option>
                                                                        <option value="osm">Open Street Map</option>
                                                                        <option value="carto">Carto Map</option>
                                                                        <option value="googleStreets">Google Streets Map</option>
                                                                        <option value="googleHybrid">Google Hybrid Map</option>
                                                                        <option value="googleSat">Google Satellite Map</option>
                                                                        <option value="googleTerrain">Google Terrain Map</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label for="latitude"><?=lang('Text.latitude')?></label>
                                                                    <input type="text" id="latitude" class="form-control" placeholder="<?=lang('Text.latitude')?>" name="latitude">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label for="longitude"><?=lang('Text.longitude')?></label>
                                                                    <input type="text" id="longitude" class="form-control" placeholder="<?=lang('Text.longitude')?>" name="longitude">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label for="zoom"><?=lang('Text.zoom')?></label>
                                                                    <input type="text" id="zoom" class="form-control" placeholder="<?=lang('Text.zoom')?>" name="zoom">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label for="twelveHourFormat">&nbsp;</label>
                                                                    <div class="custom-control custom-checkbox">
                                                                        <input type="checkbox" class="custom-control-input" name="twelveHourFormat" id="twelveHourFormat" value="0">
                                                                        <label class="custom-control-label" for="twelveHourFormat"><?=lang('Text.twelveHourFormat')?></label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div id="mapDiv" class="maps-leaflet-container"></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="tab-pane" id="authorityTab" aria-labelledby="base-authorityTab">
                                                <div class="row">
                                                    <div class="col-md-8">
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label for="expirationTime"><?=lang('Text.expirationTime')?></label>
                                                                    <input type="text" id="expirationTime" name="expirationTime" class="form-control"
                                                                           readonly="readonly" placeholder="<?=lang('Text.expirationTime')?>">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label for="deviceLimit"><?=lang('Text.deviceLimit')?></label>
                                                                    <input type="number" id="deviceLimit" class="form-control" placeholder="Device Limit" name="deviceLimit" value="-1">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label for="userLimit"><?=lang('Text.userLimit')?></label>
                                                                    <input type="number" id="userLimit" class="form-control" placeholder="<?=lang('Text.userLimit')?>" name="userLimit">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label for="token"><?=lang('Text.token')?></label>
                                                                    <div class="input-group">
                                                                        <input type="text" id="token" name="token" class="form-control" placeholder="<?=lang('Text.token')?>">
                                                                        <div class="input-group-append">
                                                                            <button class="btn btn-warning" type="button" id="tokenize" name="tokenize"><i class="fad fa-sync"></i></button>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <div class="d-inline-block custom-control custom-checkbox mr-1">
                                                                <input type="checkbox" class="custom-control-input" name="disabled" id="disabled" value="0">
                                                                <label class="custom-control-label" for="disabled" ><?=lang('Text.disabled')?></label>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <div class="d-inline-block custom-control custom-checkbox mr-1">
                                                                <input type="checkbox" class="custom-control-input" name="administrator" id="administrator" value="0">
                                                                <label class="custom-control-label" for="administrator"><?=lang('Text.administrator')?></label>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <div class="d-inline-block custom-control custom-checkbox mr-1">
                                                                <input type="checkbox" class="custom-control-input" name="readonly" id="readonly" value="0">
                                                                <label class="custom-control-label" for="readonly" ><?=lang('Text.readOnly')?></label>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <div class="d-inline-block custom-control custom-checkbox mr-1">
                                                                <input type="checkbox" class="custom-control-input" name="deviceReadonly" id="deviceReadonly" value="0">
                                                                <label class="custom-control-label" for="deviceReadonly" ><?=lang('Text.deviceReadOnly')?></label>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <div class="d-inline-block custom-control custom-checkbox mr-1">
                                                                <input type="checkbox" class="custom-control-input" name="limitCommands" id="limitCommands" value="0">
                                                                <label class="custom-control-label" for="limitCommands" ><?=lang('Text.limitCommands')?></label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="tab-pane" id="attributesTab" aria-labelledby="base-attributesTab">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <h6 class="i18n border-bottom pb-0-5"><?=lang('Text.mail')?></h6>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="row">
                                                            <div class="col-md-4">
                                                                <div class="form-group">
                                                                    <label for="mailSmtpHost"><?=lang('Text.SMTPHost')?></label>
                                                                    <input type="text" id="mailSmtpHost" class="form-control" placeholder="<?=lang('Text.SMTPHost')?>" name="attributes.mailSmtpHost">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <div class="form-group">
                                                                    <label for="mailSmtpPort"><?=lang('Text.SMTPPort')?></label>
                                                                    <input type="text" id="mailSmtpPort" class="form-control" placeholder="<?=lang('Text.SMTPPort')?>" name="attributes.mailSmtpPort">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <div class="form-group">
                                                                    <label for="mailSmtpFrom"><?=lang('Text.SMTPFrom')?></label>
                                                                    <input type="text" id="mailSmtpFrom" class="form-control" placeholder="<?=lang('Text.SMTPFrom')?>" name="attributes.mailSmtpFrom">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label for="mailSmtpUsername"><?=lang('Text.SMTPUsername')?></label>
                                                                    <input type="text" id="mailSmtpUsername" class="form-control" placeholder="<?=lang('Text.SMTPUsername')?>" name="attributes.mailSmtpUsername">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label for="mailSmtpPassword"><?=lang('Text.SMTPPassword')?></label>
                                                                    <input type="text" id="mailSmtpPassword" class="form-control" placeholder="<?=lang('Text.SMTPPassword')?>" name="attributes.mailSmtpPassword">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="form-group">
                                                            <div class="custom-control custom-checkbox custom-control-inline">
                                                                <input type="checkbox" class="custom-control-input" id="mailSmtpAuth" name="attributes.mailSmtpAuth" value="0">
                                                                <label class="custom-control-label" for="mailSmtpAuth"><?=lang('Text.SMTPAuthEnable')?></label>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <div class="custom-control custom-checkbox custom-control-inline">
                                                                <input type="checkbox" class="custom-control-input" id="mailSmtpStarttlsEnable" name="attributes.mailSmtpStarttlsEnable" value="0">
                                                                <label class="custom-control-label" for="mailSmtpStarttlsEnable"><?=lang('Text.SMTPSTARTTLSActive')?></label>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <div class="custom-control custom-checkbox custom-control-inline">
                                                                <input type="checkbox" class="custom-control-input" id="mailSmtpStarttlsRequired" name="attributes.mailSmtpStarttlsRequired" value="0">
                                                                <label class="custom-control-label" for="mailSmtpStarttlsRequired"><?=lang('Text.SMTPSTARTTLSRequired')?></label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="form-group">
                                                            <div class="custom-control custom-checkbox custom-control-inline">
                                                                <input type="checkbox" class="custom-control-input" id="mailSmtpSslEnable" name="attributes.mailSmtpSslEnable" value="0">
                                                                <label class="custom-control-label" for="mailSmtpSslEnable"><?=lang('Text.SMTPSSLActive')?></label>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <div class="custom-control custom-checkbox custom-control-inline">
                                                                <input type="checkbox" class="custom-control-input" id="mailSmtpSslTrust" name="attributes.mailSmtpSslTrust" value="0">
                                                                <label class="custom-control-label" for="mailSmtpSslTrust">SMTP SSL Trusted</label>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <div class="custom-control custom-checkbox custom-control-inline">
                                                                <input type="checkbox" class="custom-control-input" id="mailSmtpSslProtocols" name="attributes.mailSmtpSslProtocols" value="0">
                                                                <label class="custom-control-label" for="mailSmtpSslProtocols"><?=lang('Text.SMTPSSLTrusted')?></label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <h6 class="i18n border-bottom pb-0-5"><?=lang('Text.web')?></h6>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-4">
                                                                <div class="form-group">
                                                                    <label for="webLiveRouteLength"><?=lang('Text.LiveRouteLength')?></label>
                                                                    <input type="text" id="webLiveRouteLength" class="form-control" placeholder="<?=lang('Text.LiveRouteLength')?>" name="attributes.webLiveRouteLength">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <div class="form-group">
                                                                    <label for="webSelectZoom"><?=lang('Text.ZoomOnSelect')?></label>
                                                                    <input type="text" id="webSelectZoom" class="form-control" placeholder="<?=lang('Text.ZoomOnSelect')?>" name="attributes.webSelectZoom">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <div class="form-group">
                                                                    <label for="webMaxZoom"><?=lang('Text.MaximumZoom')?></label>
                                                                    <input type="text" id="webMaxZoom" class="form-control" placeholder="<?=lang('Text.MaximumZoom')?>" name="attributes.webMaxZoom">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <h6 class="i18n border-bottom pb-0-5"><?=lang('Text.general')?></h6>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-6" id="distanceUnitColSelect">
                                                                <div class="form-group">
                                                                    <label for="distanceUnit"><?=lang('Text.distanceUnit')?></label>
                                                                    <select id="distanceUnit" name="attributes.distanceUnit" class="select2 form-control"
                                                                            data-placeholder="<?=lang('Text.select')?>"
                                                                            data-allow-clear="true">
                                                                        <option></option>
                                                                        <option value="km">km</option>
                                                                        <option value="mi">mi</option>
                                                                        <option value="nmi">nmi</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6" id="speedUnitColSelect">
                                                                <div class="form-group">
                                                                    <label for="speedUnit"><?=lang('Text.speedUnit')?></label>
                                                                    <select id="speedUnit" name="attributes.speedUnit" class="select2 form-control"
                                                                            data-placeholder="<?=lang('Text.select')?>"
                                                                            data-allow-clear="true">
                                                                        <option></option>
                                                                        <option value="kn">kn</option>
                                                                        <option value="kmh">km/h</option>
                                                                        <option value="mph">mp/h</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6" id="volumeUnitColSelect">
                                                                <div class="form-group">
                                                                    <label for="volumeUnit" ><?=lang('Text.volumeUnit')?></label>
                                                                    <select id="volumeUnit" name="attributes.volumeUnit" class="select2 form-control"
                                                                            data-placeholder="<?=lang('Text.select')?>"
                                                                            data-allow-clear="true">
                                                                        <option></option>
                                                                        <option value="liter">Liter</option>
                                                                        <option value="impgal">Imp. Gallon</option>
                                                                        <option value="gal">US. Gallon</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6" id="timezoneColSelect">
                                                                <div class="form-group">
                                                                    <label for="timezone"><?=lang('Text.timeZone')?></label>
                                                                    <select id="timezone" name="attributes.timezone" class="select2 form-control"
                                                                            data-placeholder="<?=lang('Text.select')?>"
                                                                            data-allow-clear="true">
                                                                        <option></option>
                                                                        <optgroup label="US (Common)">
                                                                            <option value="America/Puerto_Rico">Puerto Rico (Atlantic)</option>
                                                                            <option value="America/New_York">New York (Eastern)</option>
                                                                            <option value="America/Chicago">Chicago (Central)</option>
                                                                            <option value="America/Denver">Denver (Mountain)</option>
                                                                            <option value="America/Phoenix">Phoenix (MST)</option>
                                                                            <option value="America/Los_Angeles">Los Angeles (Pacific)</option>
                                                                            <option value="America/Anchorage">Anchorage (Alaska)</option>
                                                                            <option value="Pacific/Honolulu">Honolulu (Hawaii)</option>
                                                                        </optgroup>
                                                                        <optgroup label="America">
                                                                            <option value="America/Adak">Adak</option>
                                                                            <option value="America/Anchorage">Anchorage</option>
                                                                            <option value="America/Anguilla">Anguilla</option>
                                                                            <option value="America/Antigua">Antigua</option>
                                                                            <option value="America/Araguaina">Araguaina</option>
                                                                            <option value="America/Argentina/Buenos_Aires">Argentina - Buenos Aires</option>
                                                                            <option value="America/Argentina/Catamarca">Argentina - Catamarca</option>
                                                                            <option value="America/Argentina/Comodo_Rivadavia">Argentina - Comodo Rivadavia</option>
                                                                            <option value="America/Argentina/Cordoba">Argentina - Cordoba</option>
                                                                            <option value="America/Argentina/Jujuy">Argentina - Jujuy</option>
                                                                            <option value="America/Argentina/La_Rioja">Argentina - La Rioja</option>
                                                                            <option value="America/Argentina/Mendoza">Argentina - Mendoza</option>
                                                                            <option value="America/Argentina/Rio_Gallegos">Argentina - Rio Gallegos</option>
                                                                            <option value="America/Argentina/Salta">Argentina - Salta</option>
                                                                            <option value="America/Argentina/San_Juan">Argentina - San Juan</option>
                                                                            <option value="America/Argentina/San_Luis">Argentina - San Luis</option>
                                                                            <option value="America/Argentina/Tucuman">Argentina - Tucuman</option>
                                                                            <option value="America/Argentina/Ushuaia">Argentina - Ushuaia</option>
                                                                            <option value="America/Aruba">Aruba</option>
                                                                            <option value="America/Asuncion">Asuncion</option>
                                                                            <option value="America/Atikokan">Atikokan</option>
                                                                            <option value="America/Atka">Atka</option>
                                                                            <option value="America/Bahia">Bahia</option>
                                                                            <option value="America/Barbados">Barbados</option>
                                                                            <option value="America/Belem">Belem</option>
                                                                            <option value="America/Belize">Belize</option>
                                                                            <option value="America/Blanc-Sablon">Blanc-Sablon</option>
                                                                            <option value="America/Boa_Vista">Boa Vista</option>
                                                                            <option value="America/Bogota">Bogota</option>
                                                                            <option value="America/Boise">Boise</option>
                                                                            <option value="America/Buenos_Aires">Buenos Aires</option>
                                                                            <option value="America/Cambridge_Bay">Cambridge Bay</option>
                                                                            <option value="America/Campo_Grande">Campo Grande</option>
                                                                            <option value="America/Cancun">Cancun</option>
                                                                            <option value="America/Caracas">Caracas</option>
                                                                            <option value="America/Catamarca">Catamarca</option>
                                                                            <option value="America/Cayenne">Cayenne</option>
                                                                            <option value="America/Cayman">Cayman</option>
                                                                            <option value="America/Chicago">Chicago</option>
                                                                            <option value="America/Chihuahua">Chihuahua</option>
                                                                            <option value="America/Coral_Harbour">Coral Harbour</option>
                                                                            <option value="America/Cordoba">Cordoba</option>
                                                                            <option value="America/Costa_Rica">Costa Rica</option>
                                                                            <option value="America/Cuiaba">Cuiaba</option>
                                                                            <option value="America/Curacao">Curacao</option>
                                                                            <option value="America/Danmarkshavn">Danmarkshavn</option>
                                                                            <option value="America/Dawson">Dawson</option>
                                                                            <option value="America/Dawson_Creek">Dawson Creek</option>
                                                                            <option value="America/Denver">Denver</option>
                                                                            <option value="America/Detroit">Detroit</option>
                                                                            <option value="America/Dominica">Dominica</option>
                                                                            <option value="America/Edmonton">Edmonton</option>
                                                                            <option value="America/Eirunepe">Eirunepe</option>
                                                                            <option value="America/El_Salvador">El Salvador</option>
                                                                            <option value="America/Ensenada">Ensenada</option>
                                                                            <option value="America/Fortaleza">Fortaleza</option>
                                                                            <option value="America/Fort_Wayne">Fort Wayne</option>
                                                                            <option value="America/Glace_Bay">Glace Bay</option>
                                                                            <option value="America/Godthab">Godthab</option>
                                                                            <option value="America/Goose_Bay">Goose Bay</option>
                                                                            <option value="America/Grand_Turk">Grand Turk</option>
                                                                            <option value="America/Grenada">Grenada</option>
                                                                            <option value="America/Guadeloupe">Guadeloupe</option>
                                                                            <option value="America/Guatemala">Guatemala</option>
                                                                            <option value="America/Guayaquil">Guayaquil</option>
                                                                            <option value="America/Guyana">Guyana</option>
                                                                            <option value="America/Halifax">Halifax</option>
                                                                            <option value="America/Havana">Havana</option>
                                                                            <option value="America/Hermosillo">Hermosillo</option>
                                                                            <option value="America/Indiana/Indianapolis">Indiana - Indianapolis</option>
                                                                            <option value="America/Indiana/Knox">Indiana - Knox</option>
                                                                            <option value="America/Indiana/Marengo">Indiana - Marengo</option>
                                                                            <option value="America/Indiana/Petersburg">Indiana - Petersburg</option>
                                                                            <option value="America/Indiana/Tell_City">Indiana - Tell City</option>
                                                                            <option value="America/Indiana/Vevay">Indiana - Vevay</option>
                                                                            <option value="America/Indiana/Vincennes">Indiana - Vincennes</option>
                                                                            <option value="America/Indiana/Winamac">Indiana - Winamac</option>
                                                                            <option value="America/Indianapolis">Indianapolis</option>
                                                                            <option value="America/Inuvik">Inuvik</option>
                                                                            <option value="America/Iqaluit">Iqaluit</option>
                                                                            <option value="America/Jamaica">Jamaica</option>
                                                                            <option value="America/Jujuy">Jujuy</option>
                                                                            <option value="America/Juneau">Juneau</option>
                                                                            <option value="America/Kentucky/Louisville">Kentucky - Louisville</option>
                                                                            <option value="America/Kentucky/Monticello">Kentucky - Monticello</option>
                                                                            <option value="America/Knox_IN">Knox IN</option>
                                                                            <option value="America/La_Paz">La Paz</option>
                                                                            <option value="America/Lima">Lima</option>
                                                                            <option value="America/Los_Angeles">Los Angeles</option>
                                                                            <option value="America/Louisville">Louisville</option>
                                                                            <option value="America/Maceio">Maceio</option>
                                                                            <option value="America/Managua">Managua</option>
                                                                            <option value="America/Manaus">Manaus</option>
                                                                            <option value="America/Marigot">Marigot</option>
                                                                            <option value="America/Martinique">Martinique</option>
                                                                            <option value="America/Matamoros">Matamoros</option>
                                                                            <option value="America/Mazatlan">Mazatlan</option>
                                                                            <option value="America/Mendoza">Mendoza</option>
                                                                            <option value="America/Menominee">Menominee</option>
                                                                            <option value="America/Merida">Merida</option>
                                                                            <option value="America/Mexico_City">Mexico City</option>
                                                                            <option value="America/Miquelon">Miquelon</option>
                                                                            <option value="America/Moncton">Moncton</option>
                                                                            <option value="America/Monterrey">Monterrey</option>
                                                                            <option value="America/Montevideo">Montevideo</option>
                                                                            <option value="America/Montreal">Montreal</option>
                                                                            <option value="America/Montserrat">Montserrat</option>
                                                                            <option value="America/Nassau">Nassau</option>
                                                                            <option value="America/New_York">New York</option>
                                                                            <option value="America/Nipigon">Nipigon</option>
                                                                            <option value="America/Nome">Nome</option>
                                                                            <option value="America/Noronha">Noronha</option>
                                                                            <option value="America/North_Dakota/Center">North Dakota - Center</option>
                                                                            <option value="America/North_Dakota/New_Salem">North Dakota - New Salem</option>
                                                                            <option value="America/Ojinaga">Ojinaga</option>
                                                                            <option value="America/Panama">Panama</option>
                                                                            <option value="America/Pangnirtung">Pangnirtung</option>
                                                                            <option value="America/Paramaribo">Paramaribo</option>
                                                                            <option value="America/Phoenix">Phoenix</option>
                                                                            <option value="America/Port-au-Prince">Port-au-Prince</option>
                                                                            <option value="America/Porto_Acre">Porto Acre</option>
                                                                            <option value="America/Port_of_Spain">Port of Spain</option>
                                                                            <option value="America/Porto_Velho">Porto Velho</option>
                                                                            <option value="America/Puerto_Rico">Puerto Rico</option>
                                                                            <option value="America/Rainy_River">Rainy River</option>
                                                                            <option value="America/Rankin_Inlet">Rankin Inlet</option>
                                                                            <option value="America/Recife">Recife</option>
                                                                            <option value="America/Regina">Regina</option>
                                                                            <option value="America/Resolute">Resolute</option>
                                                                            <option value="America/Rio_Branco">Rio Branco</option>
                                                                            <option value="America/Rosario">Rosario</option>
                                                                            <option value="America/Santa_Isabel">Santa Isabel</option>
                                                                            <option value="America/Santarem">Santarem</option>
                                                                            <option value="America/Santiago">Santiago</option>
                                                                            <option value="America/Santo_Domingo">Santo Domingo</option>
                                                                            <option value="America/Sao_Paulo">Sao Paulo</option>
                                                                            <option value="America/Scoresbysund">Scoresbysund</option>
                                                                            <option value="America/Shiprock">Shiprock</option>
                                                                            <option value="America/St_Barthelemy">St Barthelemy</option>
                                                                            <option value="America/St_Johns">St Johns</option>
                                                                            <option value="America/St_Kitts">St Kitts</option>
                                                                            <option value="America/St_Lucia">St Lucia</option>
                                                                            <option value="America/St_Thomas">St Thomas</option>
                                                                            <option value="America/St_Vincent">St Vincent</option>
                                                                            <option value="America/Swift_Current">Swift Current</option>
                                                                            <option value="America/Tegucigalpa">Tegucigalpa</option>
                                                                            <option value="America/Thule">Thule</option>
                                                                            <option value="America/Thunder_Bay">Thunder Bay</option>
                                                                            <option value="America/Tijuana">Tijuana</option>
                                                                            <option value="America/Toronto">Toronto</option>
                                                                            <option value="America/Tortola">Tortola</option>
                                                                            <option value="America/Vancouver">Vancouver</option>
                                                                            <option value="America/Virgin">Virgin</option>
                                                                            <option value="America/Whitehorse">Whitehorse</option>
                                                                            <option value="America/Winnipeg">Winnipeg</option>
                                                                            <option value="America/Yakutat">Yakutat</option>
                                                                            <option value="America/Yellowknife">Yellowknife</option>
                                                                        </optgroup>
                                                                        <optgroup label="Europe">
                                                                            <option value="Europe/Amsterdam">Amsterdam</option>
                                                                            <option value="Europe/Andorra">Andorra</option>
                                                                            <option value="Europe/Athens">Athens</option>
                                                                            <option value="Europe/Belfast">Belfast</option>
                                                                            <option value="Europe/Belgrade">Belgrade</option>
                                                                            <option value="Europe/Berlin">Berlin</option>
                                                                            <option value="Europe/Bratislava">Bratislava</option>
                                                                            <option value="Europe/Brussels">Brussels</option>
                                                                            <option value="Europe/Bucharest">Bucharest</option>
                                                                            <option value="Europe/Budapest">Budapest</option>
                                                                            <option value="Europe/Chisinau">Chisinau</option>
                                                                            <option value="Europe/Copenhagen">Copenhagen</option>
                                                                            <option value="Europe/Dublin">Dublin</option>
                                                                            <option value="Europe/Gibraltar">Gibraltar</option>
                                                                            <option value="Europe/Guernsey">Guernsey</option>
                                                                            <option value="Europe/Helsinki">Helsinki</option>
                                                                            <option value="Europe/Isle_of_Man">Isle of Man</option>
                                                                            <option value="Europe/Istanbul">Istanbul</option>
                                                                            <option value="Europe/Jersey">Jersey</option>
                                                                            <option value="Europe/Kaliningrad">Kaliningrad</option>
                                                                            <option value="Europe/Kiev">Kiev</option>
                                                                            <option value="Europe/Lisbon">Lisbon</option>
                                                                            <option value="Europe/Ljubljana">Ljubljana</option>
                                                                            <option value="Europe/London">London</option>
                                                                            <option value="Europe/Luxembourg">Luxembourg</option>
                                                                            <option value="Europe/Madrid">Madrid</option>
                                                                            <option value="Europe/Malta">Malta</option>
                                                                            <option value="Europe/Mariehamn">Mariehamn</option>
                                                                            <option value="Europe/Minsk">Minsk</option>
                                                                            <option value="Europe/Monaco">Monaco</option>
                                                                            <option value="Europe/Moscow">Moscow</option>
                                                                            <option value="Europe/Nicosia">Nicosia</option>
                                                                            <option value="Europe/Oslo">Oslo</option>
                                                                            <option value="Europe/Paris">Paris</option>
                                                                            <option value="Europe/Podgorica">Podgorica</option>
                                                                            <option value="Europe/Prague">Prague</option>
                                                                            <option value="Europe/Riga">Riga</option>
                                                                            <option value="Europe/Rome">Rome</option>
                                                                            <option value="Europe/Samara">Samara</option>
                                                                            <option value="Europe/San_Marino">San Marino</option>
                                                                            <option value="Europe/Sarajevo">Sarajevo</option>
                                                                            <option value="Europe/Simferopol">Simferopol</option>
                                                                            <option value="Europe/Skopje">Skopje</option>
                                                                            <option value="Europe/Sofia">Sofia</option>
                                                                            <option value="Europe/Stockholm">Stockholm</option>
                                                                            <option value="Europe/Tallinn">Tallinn</option>
                                                                            <option value="Europe/Tirane">Tirane</option>
                                                                            <option value="Europe/Tiraspol">Tiraspol</option>
                                                                            <option value="Europe/Uzhgorod">Uzhgorod</option>
                                                                            <option value="Europe/Vaduz">Vaduz</option>
                                                                            <option value="Europe/Vatican">Vatican</option>
                                                                            <option value="Europe/Vienna">Vienna</option>
                                                                            <option value="Europe/Vilnius">Vilnius</option>
                                                                            <option value="Europe/Volgograd">Volgograd</option>
                                                                            <option value="Europe/Warsaw">Warsaw</option>
                                                                            <option value="Europe/Zagreb">Zagreb</option>
                                                                            <option value="Europe/Zaporozhye">Zaporozhye</option>
                                                                            <option value="Europe/Zurich">Zurich</option>
                                                                        </optgroup>
                                                                        <optgroup label="Asia">
                                                                            <option value="Asia/Aden">Aden</option>
                                                                            <option value="Asia/Almaty">Almaty</option>
                                                                            <option value="Asia/Amman">Amman</option>
                                                                            <option value="Asia/Anadyr">Anadyr</option>
                                                                            <option value="Asia/Aqtau">Aqtau</option>
                                                                            <option value="Asia/Aqtobe">Aqtobe</option>
                                                                            <option value="Asia/Ashgabat">Ashgabat</option>
                                                                            <option value="Asia/Ashkhabad">Ashkhabad</option>
                                                                            <option value="Asia/Baghdad">Baghdad</option>
                                                                            <option value="Asia/Bahrain">Bahrain</option>
                                                                            <option value="Asia/Baku">Baku</option>
                                                                            <option value="Asia/Bangkok">Bangkok</option>
                                                                            <option value="Asia/Beirut">Beirut</option>
                                                                            <option value="Asia/Bishkek">Bishkek</option>
                                                                            <option value="Asia/Brunei">Brunei</option>
                                                                            <option value="Asia/Calcutta">Calcutta</option>
                                                                            <option value="Asia/Choibalsan">Choibalsan</option>
                                                                            <option value="Asia/Chongqing">Chongqing</option>
                                                                            <option value="Asia/Chungking">Chungking</option>
                                                                            <option value="Asia/Colombo">Colombo</option>
                                                                            <option value="Asia/Dacca">Dacca</option>
                                                                            <option value="Asia/Damascus">Damascus</option>
                                                                            <option value="Asia/Dhaka">Dhaka</option>
                                                                            <option value="Asia/Dili">Dili</option>
                                                                            <option value="Asia/Dubai">Dubai</option>
                                                                            <option value="Asia/Dushanbe">Dushanbe</option>
                                                                            <option value="Asia/Gaza">Gaza</option>
                                                                            <option value="Asia/Harbin">Harbin</option>
                                                                            <option value="Asia/Ho_Chi_Minh">Ho Chi Minh</option>
                                                                            <option value="Asia/Hong_Kong">Hong Kong</option>
                                                                            <option value="Asia/Hovd">Hovd</option>
                                                                            <option value="Asia/Irkutsk">Irkutsk</option>
                                                                            <option value="Asia/Istanbul">Istanbul</option>
                                                                            <option value="Asia/Jakarta">Jakarta</option>
                                                                            <option value="Asia/Jayapura">Jayapura</option>
                                                                            <option value="Asia/Jerusalem">Jerusalem</option>
                                                                            <option value="Asia/Kabul">Kabul</option>
                                                                            <option value="Asia/Kamchatka">Kamchatka</option>
                                                                            <option value="Asia/Karachi">Karachi</option>
                                                                            <option value="Asia/Kashgar">Kashgar</option>
                                                                            <option value="Asia/Kathmandu">Kathmandu</option>
                                                                            <option value="Asia/Katmandu">Katmandu</option>
                                                                            <option value="Asia/Kolkata">Kolkata</option>
                                                                            <option value="Asia/Krasnoyarsk">Krasnoyarsk</option>
                                                                            <option value="Asia/Kuala_Lumpur">Kuala Lumpur</option>
                                                                            <option value="Asia/Kuching">Kuching</option>
                                                                            <option value="Asia/Kuwait">Kuwait</option>
                                                                            <option value="Asia/Macao">Macao</option>
                                                                            <option value="Asia/Macau">Macau</option>
                                                                            <option value="Asia/Magadan">Magadan</option>
                                                                            <option value="Asia/Makassar">Makassar</option>
                                                                            <option value="Asia/Manila">Manila</option>
                                                                            <option value="Asia/Muscat">Muscat</option>
                                                                            <option value="Asia/Nicosia">Nicosia</option>
                                                                            <option value="Asia/Novokuznetsk">Novokuznetsk</option>
                                                                            <option value="Asia/Novosibirsk">Novosibirsk</option>
                                                                            <option value="Asia/Omsk">Omsk</option>
                                                                            <option value="Asia/Oral">Oral</option>
                                                                            <option value="Asia/Phnom_Penh">Phnom Penh</option>
                                                                            <option value="Asia/Pontianak">Pontianak</option>
                                                                            <option value="Asia/Pyongyang">Pyongyang</option>
                                                                            <option value="Asia/Qatar">Qatar</option>
                                                                            <option value="Asia/Qyzylorda">Qyzylorda</option>
                                                                            <option value="Asia/Rangoon">Rangoon</option>
                                                                            <option value="Asia/Riyadh">Riyadh</option>
                                                                            <option value="Asia/Saigon">Saigon</option>
                                                                            <option value="Asia/Sakhalin">Sakhalin</option>
                                                                            <option value="Asia/Samarkand">Samarkand</option>
                                                                            <option value="Asia/Seoul">Seoul</option>
                                                                            <option value="Asia/Shanghai">Shanghai</option>
                                                                            <option value="Asia/Singapore">Singapore</option>
                                                                            <option value="Asia/Taipei">Taipei</option>
                                                                            <option value="Asia/Tashkent">Tashkent</option>
                                                                            <option value="Asia/Tbilisi">Tbilisi</option>
                                                                            <option value="Asia/Tehran">Tehran</option>
                                                                            <option value="Asia/Tel_Aviv">Tel Aviv</option>
                                                                            <option value="Asia/Thimbu">Thimbu</option>
                                                                            <option value="Asia/Thimphu">Thimphu</option>
                                                                            <option value="Asia/Tokyo">Tokyo</option>
                                                                            <option value="Asia/Ujung_Pandang">Ujung Pandang</option>
                                                                            <option value="Asia/Ulaanbaatar">Ulaanbaatar</option>
                                                                            <option value="Asia/Ulan_Bator">Ulan Bator</option>
                                                                            <option value="Asia/Urumqi">Urumqi</option>
                                                                            <option value="Asia/Vientiane">Vientiane</option>
                                                                            <option value="Asia/Vladivostok">Vladivostok</option>
                                                                            <option value="Asia/Yakutsk">Yakutsk</option>
                                                                            <option value="Asia/Yekaterinburg">Yekaterinburg</option>
                                                                            <option value="Asia/Yerevan">Yerevan</option>
                                                                        </optgroup>
                                                                        <optgroup label="Africa">
                                                                            <option value="Africa/Abidjan">Abidjan</option>
                                                                            <option value="Africa/Accra">Accra</option>
                                                                            <option value="Africa/Addis_Ababa">Addis Ababa</option>
                                                                            <option value="Africa/Algiers">Algiers</option>
                                                                            <option value="Africa/Asmara">Asmara</option>
                                                                            <option value="Africa/Asmera">Asmera</option>
                                                                            <option value="Africa/Bamako">Bamako</option>
                                                                            <option value="Africa/Bangui">Bangui</option>
                                                                            <option value="Africa/Banjul">Banjul</option>
                                                                            <option value="Africa/Bissau">Bissau</option>
                                                                            <option value="Africa/Blantyre">Blantyre</option>
                                                                            <option value="Africa/Brazzaville">Brazzaville</option>
                                                                            <option value="Africa/Bujumbura">Bujumbura</option>
                                                                            <option value="Africa/Cairo">Cairo</option>
                                                                            <option value="Africa/Casablanca">Casablanca</option>
                                                                            <option value="Africa/Ceuta">Ceuta</option>
                                                                            <option value="Africa/Conakry">Conakry</option>
                                                                            <option value="Africa/Dakar">Dakar</option>
                                                                            <option value="Africa/Dar_es_Salaam">Dar es Salaam</option>
                                                                            <option value="Africa/Djibouti">Djibouti</option>
                                                                            <option value="Africa/Douala">Douala</option>
                                                                            <option value="Africa/El_Aaiun">El Aaiun</option>
                                                                            <option value="Africa/Freetown">Freetown</option>
                                                                            <option value="Africa/Gaborone">Gaborone</option>
                                                                            <option value="Africa/Harare">Harare</option>
                                                                            <option value="Africa/Johannesburg">Johannesburg</option>
                                                                            <option value="Africa/Kampala">Kampala</option>
                                                                            <option value="Africa/Khartoum">Khartoum</option>
                                                                            <option value="Africa/Kigali">Kigali</option>
                                                                            <option value="Africa/Kinshasa">Kinshasa</option>
                                                                            <option value="Africa/Lagos">Lagos</option>
                                                                            <option value="Africa/Libreville">Libreville</option>
                                                                            <option value="Africa/Lome">Lome</option>
                                                                            <option value="Africa/Luanda">Luanda</option>
                                                                            <option value="Africa/Lubumbashi">Lubumbashi</option>
                                                                            <option value="Africa/Lusaka">Lusaka</option>
                                                                            <option value="Africa/Malabo">Malabo</option>
                                                                            <option value="Africa/Maputo">Maputo</option>
                                                                            <option value="Africa/Maseru">Maseru</option>
                                                                            <option value="Africa/Mbabane">Mbabane</option>
                                                                            <option value="Africa/Mogadishu">Mogadishu</option>
                                                                            <option value="Africa/Monrovia">Monrovia</option>
                                                                            <option value="Africa/Nairobi">Nairobi</option>
                                                                            <option value="Africa/Ndjamena">Ndjamena</option>
                                                                            <option value="Africa/Niamey">Niamey</option>
                                                                            <option value="Africa/Nouakchott">Nouakchott</option>
                                                                            <option value="Africa/Ouagadougou">Ouagadougou</option>
                                                                            <option value="Africa/Porto-Novo">Porto-Novo</option>
                                                                            <option value="Africa/Sao_Tome">Sao Tome</option>
                                                                            <option value="Africa/Timbuktu">Timbuktu</option>
                                                                            <option value="Africa/Tripoli">Tripoli</option>
                                                                            <option value="Africa/Tunis">Tunis</option>
                                                                            <option value="Africa/Windhoek">Windhoek</option>
                                                                        </optgroup>
                                                                        <optgroup label="Australia">
                                                                            <option value="Australia/ACT">ACT</option>
                                                                            <option value="Australia/Adelaide">Adelaide</option>
                                                                            <option value="Australia/Brisbane">Brisbane</option>
                                                                            <option value="Australia/Broken_Hill">Broken Hill</option>
                                                                            <option value="Australia/Canberra">Canberra</option>
                                                                            <option value="Australia/Currie">Currie</option>
                                                                            <option value="Australia/Darwin">Darwin</option>
                                                                            <option value="Australia/Eucla">Eucla</option>
                                                                            <option value="Australia/Hobart">Hobart</option>
                                                                            <option value="Australia/LHI">LHI</option>
                                                                            <option value="Australia/Lindeman">Lindeman</option>
                                                                            <option value="Australia/Lord_Howe">Lord Howe</option>
                                                                            <option value="Australia/Melbourne">Melbourne</option>
                                                                            <option value="Australia/North">North</option>
                                                                            <option value="Australia/NSW">NSW</option>
                                                                            <option value="Australia/Perth">Perth</option>
                                                                            <option value="Australia/Queensland">Queensland</option>
                                                                            <option value="Australia/South">South</option>
                                                                            <option value="Australia/Sydney">Sydney</option>
                                                                            <option value="Australia/Tasmania">Tasmania</option>
                                                                            <option value="Australia/Victoria">Victoria</option>
                                                                            <option value="Australia/West">West</option>
                                                                            <option value="Australia/Yancowinna">Yancowinna</option>
                                                                        </optgroup>
                                                                        <optgroup label="Indian">
                                                                            <option value="Indian/Antananarivo">Antananarivo</option>
                                                                            <option value="Indian/Chagos">Chagos</option>
                                                                            <option value="Indian/Christmas">Christmas</option>
                                                                            <option value="Indian/Cocos">Cocos</option>
                                                                            <option value="Indian/Comoro">Comoro</option>
                                                                            <option value="Indian/Kerguelen">Kerguelen</option>
                                                                            <option value="Indian/Mahe">Mahe</option>
                                                                            <option value="Indian/Maldives">Maldives</option>
                                                                            <option value="Indian/Mauritius">Mauritius</option>
                                                                            <option value="Indian/Mayotte">Mayotte</option>
                                                                            <option value="Indian/Reunion">Reunion</option>
                                                                        </optgroup>
                                                                        <optgroup label="Atlantic">
                                                                            <option value="Atlantic/Azores">Azores</option>
                                                                            <option value="Atlantic/Bermuda">Bermuda</option>
                                                                            <option value="Atlantic/Canary">Canary</option>
                                                                            <option value="Atlantic/Cape_Verde">Cape Verde</option>
                                                                            <option value="Atlantic/Faeroe">Faeroe</option>
                                                                            <option value="Atlantic/Faroe">Faroe</option>
                                                                            <option value="Atlantic/Jan_Mayen">Jan Mayen</option>
                                                                            <option value="Atlantic/Madeira">Madeira</option>
                                                                            <option value="Atlantic/Reykjavik">Reykjavik</option>
                                                                            <option value="Atlantic/South_Georgia">South Georgia</option>
                                                                            <option value="Atlantic/Stanley">Stanley</option>
                                                                            <option value="Atlantic/St_Helena">St Helena</option>
                                                                        </optgroup>
                                                                        <optgroup label="Pacific">
                                                                            <option value="Pacific/Apia">Apia</option>
                                                                            <option value="Pacific/Auckland">Auckland</option>
                                                                            <option value="Pacific/Chatham">Chatham</option>
                                                                            <option value="Pacific/Easter">Easter</option>
                                                                            <option value="Pacific/Efate">Efate</option>
                                                                            <option value="Pacific/Enderbury">Enderbury</option>
                                                                            <option value="Pacific/Fakaofo">Fakaofo</option>
                                                                            <option value="Pacific/Fiji">Fiji</option>
                                                                            <option value="Pacific/Funafuti">Funafuti</option>
                                                                            <option value="Pacific/Galapagos">Galapagos</option>
                                                                            <option value="Pacific/Gambier">Gambier</option>
                                                                            <option value="Pacific/Guadalcanal">Guadalcanal</option>
                                                                            <option value="Pacific/Guam">Guam</option>
                                                                            <option value="Pacific/Honolulu">Honolulu</option>
                                                                            <option value="Pacific/Johnston">Johnston</option>
                                                                            <option value="Pacific/Kiritimati">Kiritimati</option>
                                                                            <option value="Pacific/Kosrae">Kosrae</option>
                                                                            <option value="Pacific/Kwajalein">Kwajalein</option>
                                                                            <option value="Pacific/Majuro">Majuro</option>
                                                                            <option value="Pacific/Marquesas">Marquesas</option>
                                                                            <option value="Pacific/Midway">Midway</option>
                                                                            <option value="Pacific/Nauru">Nauru</option>
                                                                            <option value="Pacific/Niue">Niue</option>
                                                                            <option value="Pacific/Norfolk">Norfolk</option>
                                                                            <option value="Pacific/Noumea">Noumea</option>
                                                                            <option value="Pacific/Pago_Pago">Pago Pago</option>
                                                                            <option value="Pacific/Palau">Palau</option>
                                                                            <option value="Pacific/Pitcairn">Pitcairn</option>
                                                                            <option value="Pacific/Ponape">Ponape</option>
                                                                            <option value="Pacific/Port_Moresby">Port Moresby</option>
                                                                            <option value="Pacific/Rarotonga">Rarotonga</option>
                                                                            <option value="Pacific/Saipan">Saipan</option>
                                                                            <option value="Pacific/Samoa">Samoa</option>
                                                                            <option value="Pacific/Tahiti">Tahiti</option>
                                                                            <option value="Pacific/Tarawa">Tarawa</option>
                                                                            <option value="Pacific/Tongatapu">Tongatapu</option>
                                                                            <option value="Pacific/Truk">Truk</option>
                                                                            <option value="Pacific/Wake">Wake</option>
                                                                            <option value="Pacific/Wallis">Wallis</option>
                                                                            <option value="Pacific/Yap">Yap</option>
                                                                        </optgroup>
                                                                        <optgroup label="Antarctica">
                                                                            <option value="Antarctica/Casey">Casey</option>
                                                                            <option value="Antarctica/Davis">Davis</option>
                                                                            <option value="Antarctica/DumontDUrville">DumontDUrville</option>
                                                                            <option value="Antarctica/Macquarie">Macquarie</option>
                                                                            <option value="Antarctica/Mawson">Mawson</option>
                                                                            <option value="Antarctica/McMurdo">McMurdo</option>
                                                                            <option value="Antarctica/Palmer">Palmer</option>
                                                                            <option value="Antarctica/Rothera">Rothera</option>
                                                                            <option value="Antarctica/South_Pole">South Pole</option>
                                                                            <option value="Antarctica/Syowa">Syowa</option>
                                                                            <option value="Antarctica/Vostok">Vostok</option>
                                                                        </optgroup>
                                                                        <optgroup label="Arctic">
                                                                            <option value="Arctic/Longyearbyen">Longyearbyen</option>
                                                                        </optgroup>
                                                                        <optgroup label="UTC">
                                                                            <option value="UTC">UTC</option>
                                                                        </optgroup>
                                                                        <optgroup label="Manual Offsets">
                                                                            <option value="UTC-12">UTC-12</option>
                                                                            <option value="UTC-11">UTC-11</option>
                                                                            <option value="UTC-10">UTC-10</option>
                                                                            <option value="UTC-9">UTC-9</option>
                                                                            <option value="UTC-8">UTC-8</option>
                                                                            <option value="UTC-7">UTC-7</option>
                                                                            <option value="UTC-6">UTC-6</option>
                                                                            <option value="UTC-5">UTC-5</option>
                                                                            <option value="UTC-4">UTC-4</option>
                                                                            <option value="UTC-3">UTC-3</option>
                                                                            <option value="UTC-2">UTC-2</option>
                                                                            <option value="UTC-1">UTC-1</option>
                                                                            <option value="UTC+0">UTC+0</option>
                                                                            <option value="UTC+1">UTC+1</option>
                                                                            <option value="UTC+2">UTC+2</option>
                                                                            <option value="UTC+3">UTC+3</option>
                                                                            <option value="UTC+4">UTC+4</option>
                                                                            <option value="UTC+5">UTC+5</option>
                                                                            <option value="UTC+6">UTC+6</option>
                                                                            <option value="UTC+7">UTC+7</option>
                                                                            <option value="UTC+8">UTC+8</option>
                                                                            <option value="UTC+9">UTC+9</option>
                                                                            <option value="UTC+10">UTC+10</option>
                                                                            <option value="UTC+11">UTC+11</option>
                                                                            <option value="UTC+12">UTC+12</option>
                                                                            <option value="UTC+13">UTC+13</option>
                                                                            <option value="UTC+14">UTC+14</option>
                                                                        </optgroup>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <h6 class="i18n border-bottom pb-0-5" ><?=lang('Text.ui')?></h6>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <div class="custom-control custom-checkbox custom-control-inline">
                                                                        <input type="checkbox" class="custom-control-input" id="uiDisableReport" name="attributes.uiDisableReport" value="0">
                                                                        <label class="custom-control-label" for="uiDisableReport"><?=lang('Text.DisableReport')?></label>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <div class="custom-control custom-checkbox custom-control-inline">
                                                                        <input type="checkbox" class="custom-control-input" id="uiDisableEvents" name="attributes.uiDisableEvents" value="0">
                                                                        <label class="custom-control-label" for="uiDisableEvents" ><?=lang('Text.DisableEvents')?></label>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <div class="custom-control custom-checkbox custom-control-inline">
                                                                        <input type="checkbox" class="custom-control-input" id="uiDisableVehicleFeatures" name="attributes.uiDisableVehicleFeatures" value="0">
                                                                        <label class="custom-control-label" for="uiDisableVehicleFeatures" ><?=lang('Text.DisableVehicleFeatures')?></label>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <div class="custom-control custom-checkbox custom-control-inline">
                                                                        <input type="checkbox" class="custom-control-input" id="uiDisableDrivers" name="attributes.uiDisableDrivers" value="0">
                                                                        <label class="custom-control-label" for="uiDisableDrivers"><?=lang('Text.DisableDrivers')?></label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <div class="custom-control custom-checkbox custom-control-inline">
                                                                        <input type="checkbox" class="custom-control-input" id="uiDisableComputedAttributes" name="attributes.uiDisableComputedAttributes" value="0">
                                                                        <label class="custom-control-label" for="uiDisableComputedAttributes"><?=lang('Text.DisableComputedAttributes')?></label>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <div class="custom-control custom-checkbox custom-control-inline">
                                                                        <input type="checkbox" class="custom-control-input" id="uiDisableCalendars" name="attributes.uiDisableCalendars" value="0">
                                                                        <label class="custom-control-label" for="uiDisableCalendars"><?=lang('Text.DisableCalendars')?></label>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <div class="custom-control custom-checkbox custom-control-inline">
                                                                        <input type="checkbox" class="custom-control-input" id="uiDisableMaintenance" name="attributes.uiDisableMaintenance" value="0">
                                                                        <label class="custom-control-label" for="uiDisableMaintenance"><?=lang('Text.DisableMaintenance')?></label>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <div class="custom-control custom-checkbox custom-control-inline">
                                                                        <input type="checkbox" class="custom-control-input" id="uiHidePositionAttributes" name="attributes.uiHidePositionAttributes" value="0">
                                                                        <label class="custom-control-label" for="uiHidePositionAttributes"><?=lang('Text.HidePositionAttributes')?></label>
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
                            </div>
                            <div class="form-actions text-right">
                                <button type="button" class="btn btn-dark mr-1 cancel">
                                    <?=lang('Text.cancel')?>
                                </button>
                                <button type="button" class="btn btn-info" id="saveAddUserButton">
                                    <?=lang('Text.save')?>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </section>
            <!--/ Description -->

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
        let user = JSON.parse('<?=$userUpdate;?>');
        $('.cancel').on('click', function () {
            document.location.href = '<?=base_url('panel/users');?>';
        });
        $('#updateUserForm #id').val(user.id);
        $('#updateUserForm #name').val(user.name);
        $('#updateUserForm #email').val(user.email);
        $('#updateUserForm #phone').val(user.phone);
        $('#updateUserForm #map').val(user.map).trigger('change');
        $('#updateUserForm #latitude').val(user.latitude);
        $('#updateUserForm #longitude').val(user.longitude);
        $('#updateUserForm #zoom').val(user.zoom);
        if (user.twelveHourFormat) {
            $('#updateUserForm #twelveHourFormat').prop("checked", true);
        }
        if (user.disable) {
            $('#updateUserForm #disabled').prop("checked", true);
        }
        if (user.administrator) {
            $('#updateUserForm #administrator').prop("checked", true);
        }
        if (user.readonly) {
            $('#updateUserForm #readOnly').prop("checked", true);
        }
        if (user.deviceReadonly) {
            $('#updateUserForm #deviceReadOnly').prop("checked", true);
        }
        if (user.limitCommands) {
            $('#updateUserForm #limitCommands').prop("checked", true);
        }
        if (user.expirationTime) {
            $('#updateUserForm #expirationTime').val(moment.utc(user.expirationTime).format('DD/MM/YYYY HH:mm'));
        }

        $('#updateUserForm #deviceLimit').val(user.deviceLimit);
        $('#updateUserForm #userLimit').val(user.userLimit);
        $('#updateUserForm #token').val(user.token);
        $('#updateUserForm #mailSmtpHost').val(user.attributes.mailSmtpHost);
        $('#updateUserForm #mailSmtpPort').val(user.attributes.mailSmtpPort);
        $('#updateUserForm #mailSmtpFrom').val(user.attributes.mailSmtpFrom);
        if (user.attributes.mailSmtpAuth) {
            $('#updateUserForm #mailSmtpAuth').prop("checked", true);
        }
        if (user.attributes.mailSmtpStarttlsEnable) {
            $('#updateUserForm #mailSmtpStarttlsEnable').prop("checked", true);
        }
        if (user.attributes.mailSmtpStarttlsRequired) {
            $('#updateUserForm #mailSmtpStarttlsRequired').prop("checked", true);
        }
        if (user.attributes.mailSmtpSslEnable) {
            $('#updateUserForm #mailSmtpSslEnable').prop("checked", true);
        }
        if (user.attributes.mailSmtpSslTrust) {
            $('#updateUserForm #mailSmtpSslTrust').prop("checked", true);
        }
        if (user.attributes.mailSmtpSslProtocols) {
            $('#updateUserForm #mailSmtpSslProtocols').prop("checked", true);
        }
        $('#updateUserForm #mailSmtpUsername').val(user.attributes.mailSmtpUsername);
        $('#updateUserForm #mailSmtpPassword').val(user.attributes.mailSmtpPassword);
        $('#updateUserForm #webLiveRouteLength').val(user.attributes.webLiveRouteLength);
        $('#updateUserForm #webSelectZoom').val(user.attributes.webSelectZoom);
        $('#updateUserForm #webMaxZoom').val(user.attributes.webMaxZoom);
        if (user.attributes.uiDisableReport) {
            $('#updateUserForm #uiDisableReport').prop("checked", true);
        }
        if (user.attributes.uiDisableEvents) {
            $('#updateUserForm #uiDisableEvents').prop("checked", true);
        }
        if (user.attributes.uiDisableVehicleFeatures) {
            $('#updateUserForm #uiDisableVehicleFeatures').prop("checked", true);
        }
        if (user.attributes.uiDisableDrivers) {
            $('#updateUserForm #uiDisableDrivers').prop("checked", true);
        }
        if (user.attributes.uiDisableComputedAttributes) {
            $('#updateUserForm #uiDisableComputedAttributes').prop("checked", true);
        }
        if (user.attributes.uiDisableCalendars) {
            $('#updateUserForm #uiDisableCalendars').prop("checked", true);
        }
        if (user.attributes.uiDisableMaintenance) {
            $('#updateUserForm #uiDisableMaintenance').prop("checked", true);
        }
        if (user.attributes.uiHidePositionAttributes) {
            $('#updateUserForm #uiHidePositionAttributes').prop("checked", true);
        }
        $('#updateUserForm #distanceUnit').val(user.attributes.distanceUnit).trigger('change');
        $('#updateUserForm #speedUnit').val(user.attributes.speedUnit).trigger('change');
        $('#updateUserForm #volumeUnit').val(user.attributes.volumeUnit).trigger('change');
        $('#updateUserForm #timezone').val(user.attributes.timezone).trigger('change');
        $(".maps-leaflet-container").css("height", "20rem");

        $('.cancel').on('click', function () {
            document.location.href = '<?=base_url('panel/users');?>';
        });

        $(".select2").select2({
            allowClear: true,
            placeholder: "<?=lang('Text.select')?>",
            dropdownAutoWidth: true,
            width: '100%'
        });

        $('#tokenize').on('click', function () {
            $('#token').val($.tokenize());
        });

        let latlng = new L.LatLng(38.9573, 35.2407);
        if (user.latitude !== 0 && user.longitude !== 0) {
            latlng = new L.LatLng(user.latitude, user.longitude);
        }
        let mymap = L.map('mapDiv',{attributionControl: false}).setView(latlng, 10);

        L.tileLayer('https://{s}.google.com/vt/lyrs=m&x={x}&y={y}&z={z}',{
            maxZoom: 24,
            subdomains:['mt0','mt1','mt2','mt3']
        }).addTo(mymap);

        let marker = L.marker(latlng,{draggable: 'true'}).addTo(mymap);
        marker.bindPopup("<b>Hi!</b><br><?=lang('Text.dragMe')?>").openPopup();
        let ll = marker.getLatLng();
        //console.log(ll);
        $('#updateUserForm #latitude').val(ll.lat);
        $('#updateUserForm #longitude').val(ll.lng);
        $('#updateUserForm #zoom').val(mymap.getZoom());
        marker.on('drag', function(e) {
            //console.log('marker drag event');
        });
        marker.on('dragstart', function(e) {
        });
        marker.on('dragend', function(e) {
            let ll = marker.getLatLng();
            //console.log(ll);
            $('#updateUserForm #latitude').val(ll.lat);
            $('#updateUserForm #longitude').val(ll.lng);
            $('#updateUserForm #zoom').val(mymap.getZoom());
        });
        mymap.on('zoomend',function(e){
            //var currZoom = mymap.getZoom();
            $('#updateUserForm #zoom').val(mymap.getZoom());
        });

        $("#expirationTime").AnyPicker({
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

        let userCard = $('#userCard');
        let updateUserForm = $('#updateUserForm');
        let saveAddUserButton = $('#saveAddUserButton');

        var userValidation = FormValidation.formValidation(updateUserForm[0], {
            fields: {
                name: {
                    validators: {
                        notEmpty: {
                            message: '<?=lang('Text.nameRequired')?>'
                        }
                    }
                },
                email: {
                    validators: {
                        notEmpty: {
                            message: '<?=lang('Text.emailRequired')?>'
                        }
                    }
                }
            },
            plugins: {
                bootstrap: new FormValidation.plugins.Bootstrap(),
                submitButton: new FormValidation.plugins.SubmitButton(),
                trigger: new FormValidation.plugins.Trigger(),
                autoFocus: new FormValidation.plugins.AutoFocus()
            }
        });
        updateUserForm.on('keypress', function (e) {
            if (e.which === 13) {
                saveAddUserButton.trigger('click');
            }
        });
        let headers = {
            'Authorization': 'Basic ' + '<?=$btoa?>'
        };
        saveAddUserButton.on('click', function (e) {
            e.preventDefault();
            userValidation.validate().then(function (status) {
                if (status === 'Valid') {
                    let callback = (data) => {
                        document.location.href = data.url;
                    };
                    $.axiosPost("<?=base_url('rest/setting/update-user')?>", headers, updateUserForm.serializeToJSON({}), userCard, callback);
                }
            });
        });
    });
</script>
</body>
<!-- END: Body-->

</html>
