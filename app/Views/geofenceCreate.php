<!DOCTYPE html>
<html class="loading" lang="<?= lang('Text.lang') ?>" data-textdirection="ltr">
<!-- BEGIN: Head-->
<?= view('include/head'); ?>
<style>
    .table th, .table td {
        border-top: none !important;
    }
</style>
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
                <h3 class="content-header-title"><?= lang('Text.addGeofence') ?></h3>
            </div>
            <div class="content-header-right breadcrumbs-right col-md-6 col-12 d-none d-md-block">
                <div class="breadcrumb-wrapper">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item pl-0"><a
                                    href="<?= base_url('panel/map') ?>"><?= lang('Text.map') ?></a></li>
                        <li class="breadcrumb-item pl-0"><a href="#"><?= lang('Text.settings') ?></a></li>
                        <li class="breadcrumb-item pl-0"><a
                                    href="<?= base_url('panel/geofence') ?>"><?= lang('Text.geofence') ?></a></li>
                        <li class="breadcrumb-item pl-0 active"><?= lang('Text.addGeofence') ?></li>
                    </ol>
                </div>
            </div>
        </div>
        <div class="content-body">
            <!-- Description -->
            <section id="geofenceCard" class="card">
                <div class="card-content collapse show">
                    <div class="card-header">
                        <h4 class="card-title" id="updateUserCardTitle"><?= lang('Text.addGeofence') ?></h4>
                        <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                        <div class="heading-elements">
                            <button type="button" class="btn btn-icon btn-light cancel" id="cancelUpdateButton">
                                <?= lang('Text.back') ?>
                            </button>
                        </div>
                    </div>
                    <div class="card-body py-0">
                        <form class="form createGeofenceForm" id="createGeofenceForm" name="createGeofenceForm"
                              novalidate>
                            <div class="form-body">
                                <div class="row">
                                    <div class="col-md-3">
                                        <h4 class="form-section"
                                            style="margin-bottom: 12px;"><?= lang('Text.basicInformation') ?></h4>
                                        <div class="form-group">
                                            <div class="controls">
                                                <label for="name"><?= lang('Text.name') ?></label>
                                                <input type="text" id="name" class="form-control"
                                                       placeholder="<?= lang('Text.name') ?>"
                                                       name="name" required
                                                       data-validation-required-message="<?= lang('Text.nameRequired') ?>">
                                                <input type="hidden" id="id" name="id">
                                                <input type="hidden" id="wktData" name="wktData">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="controls">
                                                <label for="description"><?= lang('Text.description') ?></label>
                                                <input type="text" id="description" class="form-control"
                                                       placeholder="<?= lang('Text.description') ?>" name="description">
                                            </div>
                                        </div>
                                        <input type="hidden" id="calendarData" name="calendarData">
                                        <!--<div class="form-group">
                                                <label for="calendarData"><? /*=lang('Text.calendar')*/ ?></label>
                                                <select class="form-control select2" id="calendarData"
                                                        name="calendarData"></select>
                                            </div>-->
                                    </div>
                                    <div class="col-md-9">
                                        <ul class="nav nav-tabs">
                                            <li class="nav-item">
                                                <a class="nav-link active" id="base-areaTab" data-toggle="tab"
                                                   aria-controls="areaTab" href="#areaTab"
                                                   aria-expanded="true"><?= lang('Text.area') ?></a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" id="base-attributesTab" data-toggle="tab"
                                                   aria-controls="attributesTab" href="#attributesTab"
                                                   aria-expanded="false"><?= lang('Text.attributes') ?></a>
                                            </li>
                                        </ul>
                                        <div class="tab-content px-1 pt-1">
                                            <div role="tabpanel" class="tab-pane active" id="areaTab"
                                                 aria-expanded="true" aria-labelledby="base-areaTab">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div id="mapDiv" class="maps-leaflet-container"></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="tab-pane" id="attributesTab"
                                                 aria-labelledby="base-attributesTab">
                                                <div class="table-responsive" style="padding-top: 1rem; height: 230px;">
                                                    <table id="attributesTable"
                                                           class="table table-striped scroll-vertical"
                                                           style="width: 100%;">
                                                        <thead style="display: none !important;">
                                                        <tr>
                                                            <th>Attribute Name</th>
                                                            <th>Attribute Value</th>
                                                        </tr>
                                                        </thead>
                                                        <tbody>
                                                        <tr>
                                                            <td><?= lang('Text.color') ?></td>
                                                            <td>
                                                                <input type="text" id="color"
                                                                       name="attributes.color"
                                                                       class="form-control"
                                                                       data-control="hue" autocomplete="off">
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td><?= lang('Text.speedLimit') ?></td>
                                                            <td>
                                                                <div class="input-group">
                                                                    <input type="text" id="speedLimit"
                                                                           name="attributes.speedLimit"
                                                                           class="form-control" autocomplete="off"
                                                                           aria-describedby="speedUnit">
                                                                    <div class="input-group-append">
                                                                            <span class="input-group-text"
                                                                                  id="speedUnit"></span>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td><?= lang('Text.polylineDistance') ?></td>
                                                            <td>
                                                                <div class="input-group">
                                                                    <input type="text" id="polylineDistance"
                                                                           name="attributes.polylineDistance"
                                                                           class="form-control" autocomplete="off"
                                                                           aria-describedby="distanceUnit">
                                                                    <div class="input-group-append">
                                                                            <span class="input-group-text"
                                                                                  id="distanceUnit"></span>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-actions text-right">
                                <button type="button" class="btn btn-dark mr-1 cancel">
                                    <?= lang('Text.cancel') ?>
                                </button>
                                <button type="button" class="btn btn-info" id="saveCreateGeofenceButton">
                                    <?= lang('Text.save') ?>
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
        $(".maps-leaflet-container").css("height", "calc(100vh - 430px)");
        let speedUnit = '<?php echo $account->attributes->speedUnit??"";?>';
        let timezone = '<?php echo $account->attributes->timezone??"";?>';
        let distanceUnit = '<?php echo $account->attributes->distanceUnit??"";?>';
        $('.cancel').on('click', function () {
            document.location.href = '<?=base_url('panel/geofence');?>';
        });
        $('#createGeofenceForm #color').minicolors({
            control: $(this).attr('data-control') || 'hue',
            defaultValue: $(this).attr('data-defaultValue') || geofence.attributes.color,
            format: $(this).attr('data-format') || 'hex',
            keywords: $(this).attr('data-keywords') || '',
            inline: $(this).attr('data-inline') === 'true',
            letterCase: $(this).attr('data-letterCase') || 'lowercase',
            opacity: $(this).attr('data-opacity'),
            position: $(this).attr('data-position') || 'bottom left',
            swatches: $(this).attr('data-swatches') ? $(this).attr('data-swatches').split('|') : [],
            change: function (value, opacity) {
                if (!value) return;
                if (opacity) value += ', ' + opacity;
            },
            theme: 'bootstrap'
        });
        if (speedUnit === 'kmh') {
            $('#createGeofenceForm #speedUnit').text('Km/h');
            //$('#deviceInfoSpeed').val(device["position"]["speed"] + ' Kn');
        } else {
            $('#createGeofenceForm #speedUnit').text('Kn');
        }
        if (distanceUnit === 'km') {
            $('#createGeofenceForm #distanceUnit').text('Km');
            //$('#deviceInfoSpeed').val(device["position"]["speed"] + ' Kn');
        } else {
            $('#createGeofenceForm #distanceUnit').text('m');
        }

        let getShapeType = function (layer) {

            if (layer instanceof L.Circle) {
                return 'circle';
            }

            if (layer instanceof L.Marker) {
                return 'marker';
            }

            if ((layer instanceof L.Polyline) && !(layer instanceof L.Polygon)) {
                return 'polyline';
            }

            if ((layer instanceof L.Polygon) && !(layer instanceof L.Rectangle)) {
                return 'polygon';
            }

            if (layer instanceof L.Rectangle) {
                return 'rectangle';
            }

        };

        let toWKT = function (layer) {
            var lng, lat, coords = [];
            if (layer instanceof L.Polygon || layer instanceof L.Polyline) {
                var latlngs = layer.getLatLngs();
                for (var i = 0; i < latlngs.length; i++) {
                    var latlngs1 = latlngs[i];
                    if (latlngs1.length) {
                        for (var j = 0; j < latlngs1.length; j++) {
                            coords.push(latlngs1[j].lat + " " + latlngs1[j].lng);
                            if (j === 0) {
                                lng = latlngs1[j].lng;
                                lat = latlngs1[j].lat;
                            }
                        }
                    } else {
                        coords.push(latlngs[i].lat + " " + latlngs[i].lng);
                        if (i === 0) {
                            lng = latlngs[i].lng;
                            lat = latlngs[i].lat;
                        }
                    }
                }
                if (layer instanceof L.Polygon) {
                    return "POLYGON((" + coords.join(",") + "," + lat + " " + lng + "))";
                } else if (layer instanceof L.Polyline) {
                    return "LINESTRING(" + coords.join(",") + ")";
                }
            } else if (layer instanceof L.Marker) {
                return "POINT(" + layer.getLatLng().lat + " " + layer.getLatLng().lng + ")";
            } else {
                return "CIRCLE(" + layer.getLatLng().lat + " " + layer.getLatLng().lng + ", " + layer.getRadius() + ")";
            }
        };

        let map = L.map('mapDiv').setView([38.9573, 35.2407], 10);

        /*navigator.geolocation.getCurrentPosition(function(location) {
            let latlng = new L.LatLng(location.coords.latitude, location.coords.longitude);
            map.setView(latlng, 13);
        });*/

        let googleStreets = L.tileLayer('https://{s}.google.com/vt/lyrs=m&x={x}&y={y}&z={z}', {
            maxZoom: 24,
            subdomains: ['mt0', 'mt1', 'mt2', 'mt3']
        });

        let osmUrl = 'https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png',
            osmAttrib = '&copy; <a href="https://openstreetmap.org/copyright">OpenStreetMap</a> contributors',
            osm = L.tileLayer(osmUrl, {maxZoom: 18, attribution: osmAttrib}),
            drawnItems = L.featureGroup().addTo(map);

        L.control.layers({
            'Google Streets': googleStreets.addTo(map)
        }, {}, {}).addTo(map);
        map.addControl(new L.Control.Draw({
            position: 'topleft',
            draw: {
                rectangle: false,
                polyline: true,
                polygon: true,
                circle: true,
                marker: false,
                circlemarker: false
            },
            edit: {
                featureGroup: drawnItems,
                remove: true
            }
        }));

        map.on(L.Draw.Event.CREATED, function (e) {
            let layer = e.layer;
            /*var type = e.layerType,
                layer = e.layer;
            var shape = layer.toGeoJSON();
            console.log(type);
            console.log(shape);*/
            drawnItems.addLayer(layer);
            let wkt = toWKT(layer);
            $('#wktData').val(wkt);
        });

        map.on(L.Draw.Event.EDITED, function (e) {
            var type = e.layerType,
                layer = e.layer;
            //var shape = layer.toGeoJSON();
            //console.log(e);
            var layers = e.layers;
            layers.eachLayer(function (layer) {
                /*let type = getShapeType(layer);
                console.log(type);
                console.log(layer.toGeoJSON());*/
                let wkt = toWKT(layer);
                //console.log(wkt);
                $('#wktData').val(wkt);
            });
            //console.log(layer);
            //drawnItems.addLayer(layer);
        });

        let geofenceCard = $('#geofenceCard');
        let createGeofenceForm = $('#createGeofenceForm');
        let saveCreateGeofenceButton = $('#saveCreateGeofenceButton');

        let userValidation = FormValidation.formValidation(createGeofenceForm[0], {
            fields: {
                name: {
                    validators: {
                        notEmpty: {
                            message: '<?=lang('Text.nameRequired')?>'
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
        createGeofenceForm.on('keypress', function (e) {
            if (e.which === 13) {
                saveCreateGeofenceButton.trigger('click');
            }
        });
        let headers = {
            'Authorization': 'Basic ' + '<?=$btoa?>'
        };
        saveCreateGeofenceButton.on('click', function (e) {
            e.preventDefault();
            userValidation.validate().then(function (status) {
                if (status === 'Valid') {
                    let callback = (data) => {
                        document.location.href = data.url;
                    };
                    $.axiosPost("<?=base_url('rest/setting/create-geofence')?>", headers, createGeofenceForm.serializeToJSON({}), geofenceCard, callback);
                }
            });
        });
    });
</script>
</body>
<!-- END: Body-->

</html>
