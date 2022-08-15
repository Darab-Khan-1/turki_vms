<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
<!-- BEGIN: Head-->

<head>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i%7CQuicksand:300,400,500,700" rel="stylesheet">

    <!-- BEGIN: Vendor CSS-->
    <link rel="stylesheet" type="text/css" href="<?=base_url('app-assets/vendors/css/calendars/fullcalendar.min.css');?>">
    <link rel="stylesheet" type="text/css" href="<?=base_url('app-assets/vendors/css/calendars/daygrid.min.css');?>">
    <link rel="stylesheet" type="text/css" href="<?=base_url('app-assets/vendors/css/calendars/timegrid.min.css');?>">
    <link rel="stylesheet" type="text/css" href="<?=base_url('app-assets/css/plugins/calendars/fullcalendar.css');?>">
    <link rel="stylesheet" type="text/css" href="<?=base_url('app-assets/vendors/css/vendors.min.css')?>">
    <link rel="stylesheet" type="text/css" href="<?=base_url('app-assets/vendors/css/forms/selects/select2.min.css')?>">
    <link rel="stylesheet" type="text/css" href="<?=base_url('app-assets/vendors/css/forms/icheck/icheck.css')?>">
    <link rel="stylesheet" type="text/css" href="<?=base_url('app-assets/vendors/css/forms/icheck/custom.css')?>">
    <link rel="stylesheet" type="text/css" href="<?=base_url('app-assets/vendors/formvalidation/css/formValidation.min.css')?>">
    <!-- END: Vendor CSS-->

    <!-- BEGIN: Theme CSS-->
    <link rel="stylesheet" type="text/css" href="<?=base_url('app-assets/css/fontawesome.css')?>">
    <link rel="stylesheet" type="text/css" href="<?=base_url('app-assets/css/bootstrap.css')?>">
    <link rel="stylesheet" type="text/css" href="<?=base_url('app-assets/css/bootstrap-extended.css')?>">
    <link rel="stylesheet" type="text/css" href="<?=base_url('app-assets/css/colors.css')?>">
    <link rel="stylesheet" type="text/css" href="<?=base_url('app-assets/css/components.css')?>">
    <!-- END: Theme CSS-->

    <!-- BEGIN: Page CSS-->
    <link rel="stylesheet" type="text/css" href="<?=base_url('app-assets/css/core/menu/menu-types/vertical-menu.css')?>">
    <link rel="stylesheet" type="text/css" href="<?=base_url('app-assets/css/core/colors/palette-gradient.css')?>">
    <link rel="stylesheet" type="text/css" href="<?=base_url('app-assets/css/pages/login-register.css')?>">
    <link rel="stylesheet" type="text/css" href="<?=base_url('app-assets/vendors/AnyPicker/src/anypicker-font.css')?>">
    <link rel="stylesheet" type="text/css" href="<?=base_url('app-assets/vendors/AnyPicker/src/anypicker.css')?>">
    <link rel="stylesheet" type="text/css" href="<?=base_url('app-assets/vendors/AnyPicker/src/anypicker-ios.css')?>">
    <link rel="stylesheet" type="text/css" href="<?=base_url('app-assets/vendors/AnyPicker/src/anypicker-android.css')?>">
    <link rel="stylesheet" type="text/css" href="<?=base_url('app-assets/vendors/AnyPicker/src/anypicker-windows.css')?>">
    <link rel="stylesheet" type="text/css" href="<?=base_url('app-assets/vendors/leaflet/leaflet.min.css')?>">
    <link rel="stylesheet" type="text/css" href="<?=base_url('app-assets/vendors/leaflet/map-leaflet.css')?>">
    <link rel="stylesheet" type="text/css" href="<?=base_url('app-assets/vendors/leaflet/plugins/Leaflet.FullScreen/Control.FullScreen.min.css')?>" />
    <link rel="stylesheet" type="text/css" href="<?=base_url('app-assets/vendors/leaflet/plugins/Leaflet.TimeDimension/src/leaflet.timedimension.control.css')?>" />
    <link rel="stylesheet" type="text/css" href="<?=base_url('app-assets/vendors/leaflet/plugins/leaflet-draw/src/leaflet.draw.css')?>" />
    <link rel="stylesheet" type="text/css" href="<?=base_url('app-assets/vendors/css/tables/datatable/datatables.min.css')?>">
    <link rel="stylesheet" type="text/css" href="<?=base_url('app-assets/vendors/css/tables/extensions/responsive.dataTables.min.css')?>">
    <link rel="stylesheet" type="text/css" href="<?=base_url('app-assets/vendors/css/tables/extensions/colReorder.dataTables.min.css')?>">
    <link rel="stylesheet" type="text/css" href="<?=base_url('app-assets/vendors/css/tables/extensions/buttons.dataTables.min.css')?>">
    <link rel="stylesheet" type="text/css" href="<?=base_url('app-assets/vendors/css/tables/datatable/buttons.bootstrap4.min.css')?>">
    <link rel="stylesheet" type="text/css" href="<?=base_url('app-assets/vendors/css/tables/extensions/fixedHeader.dataTables.min.css')?>">
    <link rel="stylesheet" type="text/css" href="<?=base_url('app-assets/vendors/css/pickers/miniColors/jquery.minicolors.css')?>">
    <link rel="stylesheet" type="text/css" href="<?=base_url('app-assets/vendors/css/pickers/spectrum/spectrum.css')?>">
    <link id="" rel="stylesheet" href="<?= base_url('app-assets/vendors/sweetalert2/dist/sweetalert2.min.css'); ?>">
    <!-- END: Page CSS-->

    <!-- BEGIN: Custom CSS-->
    <link rel="stylesheet" type="text/css" href="<?=base_url('assets/css/style.css')?>">
    <!-- END: Custom CSS-->
    <link rel="stylesheet" type="text/css" href="<?=base_url('app-assets/vendors/css/ui/jquery-ui.min.css');?>">
    <link rel="stylesheet" type="text/css" href="<?=base_url('app-assets/css/plugins/ui/jqueryui.css');?>">
    <link rel="stylesheet" href="<?=base_url('app-assets/vendors/leaflet-track-playback/dist/control.playback.css');?>">
    <style>
        html, body, #map { width: 100%; height: 100%; margin: 0px; padding: 0px;}
        .leaflet-div-icon {
            background: transparent!important;
            border: none!important;
            color: white;
        }
    </style>
</head>
<!-- END: Head-->

<!-- BEGIN: Body-->

<body class="vertical-layout vertical-menu 1-column" data-open="click" data-menu="vertical-menu" data-col="1-column">
<div id="map"></div>


<!-- BEGIN: Footer-->
<footer class="navbar navbar-expand footer fixed-bottom footer-light navbar-border navbar-shadow row justify-content-center text-center">
    <div class="row justify-content-center text-center">
        <form class="form-inline">
            <div class="btn-group mx-1" role="group" aria-label="First Group">
                <button type="button" class="btn btn-icon btn-info btn-start" id="playStopButton"><i class="fad fa-play"></i></button>
                <button type="button" class="btn btn-icon btn-info btn-restart" id="restartButton"><i class="fad fa-sync-alt"></i></button>
            </div>
            <div class="input-group my-0" style="max-width: 11rem !important;"><span class="input-group-prepend">
              <button id="decSpeed" class="btn btn-warning" type="button"><i class="fad fa-angle-double-left"></i></button></span>
                <input id="speed" class="form-control border-warning" type="text" value="5" placeholder="Speed..." aria-label="Speed"><span class="input-group-append">
              <button id="incSpeed" class="btn btn-warning" type="button"><i class="fad fa-angle-double-right"></i></button></span>
            </div>
        </form>
    </div>
</footer>
<!-- END: Footer-->


<?= view('include/script'); ?>
<script src="<?=base_url('app-assets/js/core/libraries/jquery_ui/jquery-ui.min.js');?>"></script>
<script src="<?=base_url('app-assets/vendors/leaflet-track-playback/examples/lib/leaflet/leaflet.js');?>"></script>
<script src="<?=base_url('app-assets/vendors/leaflet-track-playback/dist/control.trackplayback.js');?>"></script>
<script src="<?=base_url('app-assets/vendors/leaflet-track-playback/dist/leaflet.trackplayback.js');?>"></script>
<script>
    let getParameterByName =  function (name, url) {
        if (!url) url = window.location.href;
        name = name.replace(/[\[\]]/g, '\\$&');
        var regex = new RegExp('[?&]' + name + '(=([^&#]*)|&|#|$)'),
            results = regex.exec(url);
        if (!results) return null;
        if (!results[2]) return '';
        return decodeURIComponent(results[2].replace(/\+/g, ' '));
    }
    $(function () {
        "use strict";
        //let map = L.map("map").setView([41.015137, 28.979530], 13);

        let osm = L.tileLayer('https://{s}.tile.osm.org/{z}/{x}/{y}.png', {
            attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a>',
            maxZoom: 24,
        });
        let carto = L.tileLayer('https://{s}.basemaps.cartocdn.com/light_all/{z}/{x}/{y}.png', {
            attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a>',
            maxZoom: 24,
        });
        /*let googleTraffic = L.gridLayer.googleMutant({
            maxZoom: 24,
            type: 'roadmap'
        }).addGoogleLayer('TrafficLayer');
        let googleRoadMap = L.gridLayer.googleMutant({
            maxZoom: 24,
            type: 'roadmap'
        });*/
        let googleStreets = L.tileLayer('https://{s}.google.com/vt/lyrs=m&x={x}&y={y}&z={z}',{
            maxZoom: 24,
            subdomains:['mt0','mt1','mt2','mt3']
        });
        let googleHybrid = L.tileLayer('https://{s}.google.com/vt/lyrs=s,h&x={x}&y={y}&z={z}',{
            maxZoom: 24,
            subdomains:['mt0','mt1','mt2','mt3']
        });
        let googleSat = L.tileLayer('https://{s}.google.com/vt/lyrs=s&x={x}&y={y}&z={z}',{
            maxZoom: 24,
            subdomains:['mt0','mt1','mt2','mt3']
        });
        let googleTerrain = L.tileLayer('https://{s}.google.com/vt/lyrs=p&x={x}&y={y}&z={z}',{
            maxZoom: 24,
            subdomains:['mt0','mt1','mt2','mt3']
        });
        let baseMaps = {
            "OpenStreet": osm,
            "Carto": carto,
            //'Yandex': L.yandex(),
            'Google Streets': googleStreets,
            'Google Hybrid': googleHybrid,
            'Google Satellite': googleSat,
            'Google Terrain': googleTerrain
        };
        let map = L.map('map', {
            zoom: 13,
            layers: [googleStreets]
        }).setView([41.015137, 28.979530], 10);
        L.control.layers(baseMaps).addTo(map);
        $('#map').block({
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
        let deviceId = getParameterByName('device_id');
        let dateStart = getParameterByName('start_date');
        let dateEnd = getParameterByName('end_date');
        const params = new URLSearchParams();
        params.append("device_id", deviceId);
        params.append("start_date", dateStart);
        params.append("end_date", dateEnd);
        let pathCoords = [];
        let sumLat = 0;
        let sumLng = 0;
        let avgLat = 0;
        let avgLng = 0;
        let startLat = 0;
        let startLng = 0;
        let counter = 0;
        let trackPlayBack;
        let headers = {
            'Authorization': 'Basic ' + '<?=$btoa?>',
            'content-type': 'application/x-www-form-urlencoded'
        };
        let callback = (data) => {
            if (data.success) {
                if (data.positions.length > 0) {
                    let positionTrack = [];
                    $.each(data.positions, function (index, position) {
                        if (counter === 0) {
                            startLat = parseFloat(position.latitude);
                            startLng = parseFloat(position.longitude);
                        }
                        counter++;
                        sumLat = sumLat + parseFloat(position.latitude);
                        sumLng = sumLng + parseFloat(position.longitude);
                        let item = {}
                        item ["lat"] = position.latitude;
                        item ["lng"] = position.longitude;
                        item['time'] = moment(position.fixTime).unix();
                        let speed = $.number(position.speed * 1.852,2,'.',',') + ' Km/h';
                        item['info'] = [
                            {"key": "<?=lang('deviceName')?>", "value" : position.deviceName},
                            {"key": "<?=lang('time')?>", "value" : moment(position.fixTime).format('YYYY-MM-DD HH:mm:ss')},
                            {"key": "<?=lang('speed')?>", "value" : speed},
                            {"key": "<?=lang('latitude')?>", "value" : position.latitude},
                            {"key": "<?=lang('longitude')?>", "value" : position.longitude}
                        ];
                        positionTrack.push(
                            item
                        );
                    });
                    pathCoords.push(positionTrack);
                }
                avgLat = sumLat/counter;
                avgLng = sumLng/counter;
                map.setView([startLat, startLng], 10);
                trackPlayBack = L.trackplayback(pathCoords, map, {
                    // the play options
                    clockOptions: {
                        // the default speed
                        // caculate method: fpstime * Math.pow(2, speed - 1)
                        // fpstime is the two frame time difference
                        speed: parseInt($('#speed').val()),
                        // the max speed
                        maxSpeed: 100
                    },
                    trackPointOptions: {
                        // whether draw track point
                        isDraw: true,
                        // whether use canvas to draw it, if false, use leaflet api `L.circleMarker`
                        useCanvas: true,
                        stroke: false,
                        color: '#1e9ff2',
                        fill: true,
                        fillColor: '#1e9ff2',
                        opacity: 0.5,
                        radius: 4
                    },
                    targetOptions: {
                        useImg: true,
                        width: 13,
                        height: 25,
                        imgUrl: '<?=base_url('app-assets/vendors/leaflet-track-playback/examples/car-50x99.png');?>'
                    }
                });
            } else {
                Swal.fire({
                    title: data.reason,
                    text: data.message,
                    type: "error",
                    confirmButtonClass: 'btn btn-info',
                    buttonsStyling: false,
                });
            }
            $('#map').unblock();
        };
        $.axiosPost("<?=base_url('rest/report/route')?>", headers, params, $('#map'), callback);
        
        $('#playStopButton').click(function () {
            //trackPlayBack.showTrackPoint();
            //trackPlayBack.showTrackLine();
            if ($(this).hasClass('btn-stop')) {
                $(this).addClass('btn-start');
                $(this).removeClass('btn-stop');
                $(this).html('<i class="fad fa-play"></i>');
                trackPlayBack.stop();
            } else {
                $(this).removeClass('btn-start');
                $(this).addClass('btn-stop');
                $(this).html('<i class="fad fa-stop"></i>');
                trackPlayBack.start();
            }

        });
        $('#restartButton').click(function () {
            //trackPlayBack.showTrackPoint();
            //trackPlayBack.showTrackLine();
            $('#playStopButton').removeClass('btn-start');
            $('#playStopButton').addClass('btn-stop');
            $('#playStopButton').html('<i class="fad fa-stop"></i>');
            trackPlayBack.rePlaying();

        });
        $('#speed').on('input',function(e){
            let newSpeed = parseInt($(this).val());
            $(this).val(newSpeed);
            trackPlayBack.setSpeed(newSpeed);
        });
        $('#decSpeed').on('click',function(e){
            let speed = parseInt($('#speed').val());
            let newSpeed = speed-1;
            $('#speed').val(newSpeed);
            trackPlayBack.setSpeed(newSpeed);
        });
        $('#incSpeed').on('click',function(e){
            let speed = parseInt($('#speed').val());
            let newSpeed = speed+1;
            $('#speed').val(newSpeed);
            trackPlayBack.setSpeed(newSpeed);
        });
    });
</script>

</body>
<!-- END: Body-->

</html>
