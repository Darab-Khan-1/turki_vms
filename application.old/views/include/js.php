<div class="modal fade text-left" id="profileModal" tabindex="" role="dialog"
     aria-labelledby="profileModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title"
                    id="profileModalLabel"><?= lang('editProfile') ?></h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" style="overflow-x: hidden;">
                <form id="profileForm">
                    <div class="row mb-1">
                        <div class="col-md-4">
                            <label class="label-control"
                                   for="profile_name"><?= lang('name') ?></label>
                        </div>
                        <div class="col-md-8">
                            <input type="text" class="form-control"
                                   id="profile_name" name="profile_name" value="<?=$user->name;?>">
                        </div>
                    </div>
                    <div class="row mb-1">
                        <div class="col-md-4">
                            <label class="label-control"
                                   for="profile_email"><?= lang('email') ?></label>
                        </div>
                        <div class="col-md-8">
                            <input type="text" class="form-control"
                                   id="profile_email" name="profile_email" value="<?=$user->email;?>">
                        </div>
                    </div>
                    <div class="row mb-1">
                        <div class="col-md-4">
                            <label class="label-control" for="profile_password"><?= lang('password') ?></label>
                        </div>
                        <div class="col-md-8">
                            <input type="password" class="form-control"
                                   id="profile_password" name="profile_password">
                            <input type="hidden" id="profile_id" name="profile_id" value="<?=$user->id;?>">
                            <small class="badge badge-warning" id="passwordHint"><?=lang('passwordHint')?></small>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn grey btn-blue" id="profile_save"
                        name="profile_save">
                    <i class="fad fa-save"></i> <?= lang('save') ?>
                </button>
                <button type="button" class="btn grey btn-outline-secondary" data-dismiss="modal">
                    <?= lang('close') ?>
                </button>
            </div>
        </div>
    </div>
</div>
<!--<script src="<?/*= base_url('upup.js'); */?>"></script>
<script>
    UpUp.start({
        'cache-version': 'v2',
        'content-url': '<?/*=site_url($this->uri->segment(1));*/?>',
        'content': 'Offline',
        'service-worker-url': '<?/*=base_url('upup.sw.js');*/?>'
    });
</script>-->
<!-- BEGIN: Vendor JS-->
<script src="<?= base_url() ?>app-assets/vendors/js/vendors.min.js"></script>
<!-- BEGIN Vendor JS-->

<!-- BEGIN: Page Vendor JS-->
<script src="<?= base_url() ?>app-assets/vendors/js/forms/select/select2.full.min.js"></script>
<script src="<?= base_url() ?>app-assets/vendors/formvalidation/js/FormValidation.full.js"></script>
<script src="<?= base_url() ?>app-assets/vendors/formvalidation/js/plugins/Bootstrap.js"></script>
<script src="<?= base_url() ?>app-assets/vendors/formvalidation/js/plugins/AutoFocus.js"></script>
<script src="<?= base_url() ?>app-assets/vendors/js/forms/icheck/icheck.min.js"></script>
<script src="<?= base_url() ?>app-assets/vendors/js/extensions/sweetalert2.all.min.js"></script>
<script src="<?= base_url() ?>app-assets/vendors/AnyPicker/src/anypicker.js"></script>
<script src="<?= base_url() ?>app-assets/vendors/AnyPicker/src/i18n/anypicker-i18n-en.js"></script>
<script src="<?= base_url() ?>app-assets/vendors/AnyPicker/src/i18n/anypicker-i18n-tr.js"></script>
<script src="<?= base_url() ?>app-assets/vendors/leaflet/leaflet.min.js"></script>
<script src="<?= base_url() ?>app-assets/vendors/leaflet/map-leaflet.js"></script>
<script src="<?= base_url() ?>app-assets/vendors/terraformer/terraformer-1.0.12.min.js"></script>
<script src="<?= base_url() ?>app-assets/vendors/terraformer/terraformer-wkt-parser-1.2.1.min.js"></script>
<script src="<?= base_url() ?>app-assets/vendors/leaflet/plugins/leaflet-realtime/leaflet-realtime.min.js"></script>
<script src="<?= base_url() ?>app-assets/vendors/leaflet/plugins/Leaflet.PolylineDecorator/dist/leaflet.polylineDecorator.js"></script>
<script type="text/javascript"
        src="<?= base_url() ?>app-assets/vendors/leaflet/plugins/Leaflet.FullScreen/Control.FullScreen.min.js"></script>
<script type="text/javascript" src="<?= base_url() ?>app-assets/vendors/iso8601.min.js"></script>
<script type="text/javascript"
        src="<?= base_url() ?>app-assets/vendors/leaflet/plugins/Leaflet.TimeDimension/src/leaflet.timedimension.js"></script>
<script type="text/javascript"
        src="<?= base_url() ?>app-assets/vendors/leaflet/plugins/Leaflet.TimeDimension/src/leaflet.timedimension.util.js"></script>
<script type="text/javascript"
        src="<?= base_url() ?>app-assets/vendors/leaflet/plugins/Leaflet.TimeDimension/src/leaflet.timedimension.layer.js"></script>
<script type="text/javascript"
        src="<?= base_url() ?>app-assets/vendors/leaflet/plugins/Leaflet.TimeDimension/src/leaflet.timedimension.layer.wms.js"></script>
<script type="text/javascript"
        src="<?= base_url() ?>app-assets/vendors/leaflet/plugins/Leaflet.TimeDimension/src/leaflet.timedimension.layer.geojson.js"></script>
<script type="text/javascript"
        src="<?= base_url() ?>app-assets/vendors/leaflet/plugins/Leaflet.TimeDimension/src/leaflet.timedimension.player.js"></script>
<script type="text/javascript"
        src="<?= base_url() ?>app-assets/vendors/leaflet/plugins/Leaflet.TimeDimension/src/leaflet.timedimension.control.js"></script>
<script src="<?= base_url() ?>app-assets/vendors/leaflet/plugins/leaflet-draw/src/Leaflet.draw.js"></script>
<script src="<?= base_url() ?>app-assets/vendors/leaflet/plugins/leaflet-draw/src/Leaflet.Draw.Event.js"></script>
<script src="<?= base_url() ?>app-assets/vendors/leaflet/plugins/leaflet-draw/src/Toolbar.js"></script>
<script src="<?= base_url() ?>app-assets/vendors/leaflet/plugins/leaflet-draw/src/Tooltip.js"></script>
<script src="<?= base_url() ?>app-assets/vendors/leaflet/plugins/leaflet-draw/src/ext/GeometryUtil.js"></script>
<script src="<?= base_url() ?>app-assets/vendors/leaflet/plugins/leaflet-draw/src/ext/LatLngUtil.js"></script>
<script src="<?= base_url() ?>app-assets/vendors/leaflet/plugins/leaflet-draw/src/ext/LineUtil.Intersect.js"></script>
<script src="<?= base_url() ?>app-assets/vendors/leaflet/plugins/leaflet-draw/src/ext/Polygon.Intersect.js"></script>
<script src="<?= base_url() ?>app-assets/vendors/leaflet/plugins/leaflet-draw/src/ext/Polyline.Intersect.js"></script>
<script src="<?= base_url() ?>app-assets/vendors/leaflet/plugins/leaflet-draw/src/ext/TouchEvents.js"></script>
<script src="<?= base_url() ?>app-assets/vendors/leaflet/plugins/leaflet-draw/src/draw/DrawToolbar.js"></script>
<script src="<?= base_url() ?>app-assets/vendors/leaflet/plugins/leaflet-draw/src/draw/handler/Draw.Feature.js"></script>
<script src="<?= base_url() ?>app-assets/vendors/leaflet/plugins/leaflet-draw/src/draw/handler/Draw.SimpleShape.js"></script>
<script src="<?= base_url() ?>app-assets/vendors/leaflet/plugins/leaflet-draw/src/draw/handler/Draw.Polyline.js"></script>
<script src="<?= base_url() ?>app-assets/vendors/leaflet/plugins/leaflet-draw/src/draw/handler/Draw.Marker.js"></script>
<script src="<?= base_url() ?>app-assets/vendors/leaflet/plugins/leaflet-draw/src/draw/handler/Draw.Circle.js"></script>
<script src="<?= base_url() ?>app-assets/vendors/leaflet/plugins/leaflet-draw/src/draw/handler/Draw.CircleMarker.js"></script>
<script src="<?= base_url() ?>app-assets/vendors/leaflet/plugins/leaflet-draw/src/draw/handler/Draw.Polygon.js"></script>
<script src="<?= base_url() ?>app-assets/vendors/leaflet/plugins/leaflet-draw/src/draw/handler/Draw.Rectangle.js"></script>


<script src="<?= base_url() ?>app-assets/vendors/leaflet/plugins/leaflet-draw/src/edit/EditToolbar.js"></script>
<script src="<?= base_url() ?>app-assets/vendors/leaflet/plugins/leaflet-draw/src/edit/handler/EditToolbar.Edit.js"></script>
<script src="<?= base_url() ?>app-assets/vendors/leaflet/plugins/leaflet-draw/src/edit/handler/EditToolbar.Delete.js"></script>

<script src="<?= base_url() ?>app-assets/vendors/leaflet/plugins/leaflet-draw/src/Control.Draw.js"></script>

<script src="<?= base_url() ?>app-assets/vendors/leaflet/plugins/leaflet-draw/src/edit/handler/Edit.Poly.js"></script>
<script src="<?= base_url() ?>app-assets/vendors/leaflet/plugins/leaflet-draw/src/edit/handler/Edit.SimpleShape.js"></script>
<script src="<?= base_url() ?>app-assets/vendors/leaflet/plugins/leaflet-draw/src/edit/handler/Edit.Rectangle.js"></script>
<script src="<?= base_url() ?>app-assets/vendors/leaflet/plugins/leaflet-draw/src/edit/handler/Edit.Marker.js"></script>
<script src="<?= base_url() ?>app-assets/vendors/leaflet/plugins/leaflet-draw/src/edit/handler/Edit.CircleMarker.js"></script>
<script src="<?= base_url() ?>app-assets/vendors/leaflet/plugins/leaflet-draw/src/edit/handler/Edit.Circle.js"></script>
<script src="<?= base_url(); ?>app-assets/vendors/js/pickers/dateTime/moment-with-locales.min.js"></script>
<script src="<?= base_url(); ?>app-assets/vendors/moment/moment-timezone-with-data.min.js"></script>
<script src="<?= base_url(); ?>app-assets/vendors/js/tables/datatable/datatables.min.js"></script>
<script src="<?= base_url(); ?>app-assets/vendors/js/tables/datatable/dataTables.responsive.min.js"></script>
<script src="<?= base_url(); ?>app-assets/vendors/js/tables/buttons.colVis.min.js"></script>
<script src="<?= base_url(); ?>app-assets/vendors/js/tables/datatable/dataTables.colReorder.min.js"></script>
<script src="<?= base_url(); ?>app-assets/vendors/js/tables/datatable/dataTables.buttons.min.js"></script>
<script src="<?= base_url(); ?>app-assets/vendors/js/tables/datatable/buttons.bootstrap4.min.js"></script>
<script src="<?= base_url(); ?>app-assets/vendors/js/tables/datatable/dataTables.fixedHeader.min.js"></script>
<script src="<?= base_url(); ?>app-assets/vendors/CommonUtils.js"></script>
<script src="<?= base_url(); ?>app-assets/vendors/jquery.serializeToJSON.js"></script>
<script src="<?=base_url()?>app-assets/vendors/js/pickers/miniColors/jquery.minicolors.min.js"></script>
<script src="<?=base_url()?>app-assets/vendors/js/pickers/spectrum/spectrum.js"></script>
<script src="<?= base_url(); ?>app-assets/vendors/js/extensions/fullcalendar.min.js"></script>
<script src="<?= base_url(); ?>app-assets/vendors/js/extensions/locales/tr.js"></script>
<script src="<?= base_url(); ?>app-assets/vendors/js/extensions/interactions.min.js"></script>
<script src="<?= base_url(); ?>app-assets/vendors/js/extensions/daygrid.min.js"></script>
<script src="<?= base_url(); ?>app-assets/vendors/js/extensions/timegrid.min.js"></script>
<script src="<?= base_url(); ?>app-assets/vendors/js/extensions/gcal.js"></script>
<script src="<?= base_url(); ?>app-assets/vendors/js/extensions/ical.js"></script>
<!-- END: Page Vendor JS-->

<!-- BEGIN: Theme JS-->
<script src="<?= base_url() ?>app-assets/js/core/app-menu.js"></script>
<script src="<?= base_url() ?>app-assets/js/core/app.js"></script>
<!-- END: Theme JS-->
<script>
    $.rememberMe = (account) => {
        if (localStorage) {
            localStorage.setItem('account', JSON.stringify(account));
        }
    };
    $.tokenize = () => {
        let stringLength = 32;
        let stringArray = ['0', '1', '2', '3', '4', '5', '6', '7', '8', '9', 'a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'i', 'j', 'k', 'l', 'm', 'n', 'o', 'p', 'q', 'r', 's', 't', 'u', 'v', 'w', 'x', 'y', 'z', 'A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L', 'M', 'N', 'O', 'P', 'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z'];
        let rndString = "";

        // build a string with random characters
        for (let i = 1; i < stringLength; i++) {
            let rndNum = Math.ceil(Math.random() * stringArray.length) - 1;
            rndString = rndString + stringArray[rndNum];
        }
        return rndString;
    }
    $.number_format = function (number, decimals, dec_point, thousands_sep) {
        // *     example 1: number_format(1234.56);
        // *     returns 1: '1,235'
        // *     example 2: number_format(1234.56, 2, ',', ' ');
        // *     returns 2: '1 234,56'
        // *     example 3: number_format(1234.5678, 2, '.', '');
        // *     returns 3: '1234.57'
        // *     example 4: number_format(67, 2, ',', '.');
        // *     returns 4: '67,00'
        // *     example 5: number_format(1000);
        // *     returns 5: '1,000'
        // *     example 6: number_format(67.311, 2);
        // *     returns 6: '67.31'
        // *     example 7: number_format(1000.55, 1);
        // *     returns 7: '1,000.6'
        // *     example 8: number_format(67000, 5, ',', '.');
        // *     returns 8: '67.000,00000'
        // *     example 9: number_format(0.9, 0);
        // *     returns 9: '1'
        // *    example 10: number_format('1.20', 2);
        // *    returns 10: '1.20'
        // *    example 11: number_format('1.20', 4);
        // *    returns 11: '1.2000'
        // *    example 12: number_format('1.2000', 3);
        // *    returns 12: '1.200'
        var n = !isFinite(+number) ? 0 : +number,
            prec = !isFinite(+decimals) ? 0 : Math.abs(decimals),
            sep = (typeof thousands_sep === 'undefined') ? ',' : thousands_sep,
            dec = (typeof dec_point === 'undefined') ? '.' : dec_point,
            toFixedFix = function (n, prec) {
                // Fix for IE parseFloat(0.55).toFixed(0) = 0;
                var k = Math.pow(10, prec);
                return Math.round(n * k) / k;
            },
            s = (prec ? toFixedFix(n, prec) : Math.round(n)).toString().split('.');
        if (s[0].length > 3) {
            s[0] = s[0].replace(/\B(?=(?:\d{3})+(?!\d))/g, sep);
        }
        if ((s[1] || '').length < prec) {
            s[1] = s[1] || '';
            s[1] += new Array(prec - s[1].length + 1).join('0');
        }
        return s.join(dec);
    };
    const _createSvgData = function (path, name) {
        return '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 149 178">\n' +
            ' <defs>\n' +
            '  <radialGradient spreadMethod="pad" id="svg_4">\n' +
            '   <stop offset="0" stop-color="#FFF"/>\n' +
            '   <stop offset="1" stop-color="#000000"/>\n' +
            '  </radialGradient>\n' +
            ' </defs>\n' +
            ' <g>\n' +
            '  <title>background</title>\n' +
            '  <rect fill="none" id="canvas_background" height="602" width="802" y="-1" x="-1"/>\n' +
            ' </g>\n' +
            ' <g>\n' +
            '  <title>' + name + '</title>\n' +
            '  <path stroke-opacity="0" fill="{mapIconStrokeColor}" stroke="url(#svg_4)" stroke-width="6" stroke-miterlimit="10" d="m126,23.5l-6,-6a69,69 0 0 0 -46,-16a69,69 0 0 0 -51,22a70,70 0 0 0 -22,51c0,21 7,38 22,52l43,47c6,6 11,6 16,0l48,-51c12,-13 18,-29 18,-48c0,-20 -8,-37 -22,-51z" id="svg_1"/>\n' +
            '  <circle fill="#fff" cx="74" cy="75" r="61" id="svg_2"/>\n' +
            '  <circle fill="#FFF" cx="74" cy="75" r="48" id="svg_3"/>\n' + path + '</g></svg>';
    }
    $.getLeafletMarker = function (color, type, name) {
        var path = '<path style="fill:{mapIconColor};stroke-width:6.32723" d="m 71.493072,45.715743 q 0,3.710927 -1.099168,7.051075 -1.099166,3.278016 -3.644615,5.690084 -2.545448,2.412071 -6.074401,2.412071 -4.396735,0 -7.98371,-3.525411 -3.586786,-3.587227 -5.322346,-8.411429 -1.735561,-4.824203 -1.735561,-9.339003 0,-3.710927 1.099168,-6.989069 1.099168,-3.339833 3.644615,-5.751966 2.545449,-2.412069 6.074403,-2.412069 4.454564,0 7.983707,3.587227 3.586786,3.525411 5.322346,8.349424 1.735562,4.762386 1.735562,9.339004 z M 51.707798,75.588532 q 0,4.9479 -2.429785,8.596819 -2.429786,3.649044 -6.884036,3.649044 -4.396734,0 -8.214652,-3.401712 -3.760343,-3.463531 -5.78512,-8.28805 -2.02478,-4.824202 -2.02478,-9.40101 0,-4.947898 2.429786,-8.596818 2.429786,-3.710925 6.884034,-3.710925 4.396671,0 8.157077,3.463531 3.818171,3.401713 5.843015,8.288047 2.024777,4.824204 2.024777,9.40101 z m 22.790712,-1.67039 q 6.826459,0 14.751956,6.061178 7.925499,5.99936 13.247974,14.65831 5.32235,8.59682 5.32235,15.7099 0,2.84504 -0.98352,4.70051 -0.98351,1.91728 -2.83473,2.78322 -1.79339,0.9277 -3.70251,1.23698 -1.909105,0.37109 -4.396725,0.37109 -3.933897,0 -10.87589,-2.78323 -6.884035,-2.78399 -10.528525,-2.78399 -3.818171,0 -11.165044,2.72135 -7.288979,2.78323 -11.569988,2.78323 -10.586734,0 -10.586734,-9.03024 0,-5.31899 3.239672,-11.81295 3.239673,-6.556281 8.041287,-11.936964 4.859508,-5.380874 10.87589,-9.030235 6.017202,-3.650816 11.167573,-3.650816 z M 88.324792,60.868214 q -3.528954,0 -6.074401,-2.41207 -2.545449,-2.41207 -3.644618,-5.690086 -1.099168,-3.339831 -1.099168,-7.051074 0,-4.576807 1.735563,-9.339003 1.735561,-4.824203 5.264515,-8.349422 3.586784,-3.587229 8.041292,-3.587229 3.52895,0 6.0744,2.41207 2.545445,2.412069 3.644615,5.751966 1.09917,3.278014 1.09917,6.989067 0,4.51499 -1.73556,9.339003 -1.735565,4.824203 -5.322355,8.41143 -3.58678,3.525409 -7.983706,3.525409 z m 24.991968,-6.432271 q 4.45456,0 6.88402,3.710926 2.4298,3.649107 2.4298,8.596818 0,4.576807 -2.02479,9.40101 -2.02478,4.824203 -5.84302,8.288049 -3.76032,3.401713 -8.15707,3.401713 -4.45456,0 -6.884035,-3.649045 -2.42978,-3.649108 -2.42978,-8.596818 0,-4.576808 2.02477,-9.401012 2.024785,-4.886017 5.785135,-8.288047 3.81817,-3.463531 8.21466,-3.463531 z" id="icon" />';
        var mapIconUrl = _createSvgData(path, name);
        if (type === 'animal') {
            path = '  <path\n' +
                '       style="fill:{mapIconColor};stroke-width:6.32723"\n' +
                '       d="m 71.493072,45.715743 q 0,3.710927 -1.099168,7.051075 -1.099166,3.278016 -3.644615,5.690084 -2.545448,2.412071 -6.074401,2.412071 -4.396735,0 -7.98371,-3.525411 -3.586786,-3.587227 -5.322346,-8.411429 -1.735561,-4.824203 -1.735561,-9.339003 0,-3.710927 1.099168,-6.989069 1.099168,-3.339833 3.644615,-5.751966 2.545449,-2.412069 6.074403,-2.412069 4.454564,0 7.983707,3.587227 3.586786,3.525411 5.322346,8.349424 1.735562,4.762386 1.735562,9.339004 z M 51.707798,75.588532 q 0,4.9479 -2.429785,8.596819 -2.429786,3.649044 -6.884036,3.649044 -4.396734,0 -8.214652,-3.401712 -3.760343,-3.463531 -5.78512,-8.28805 -2.02478,-4.824202 -2.02478,-9.40101 0,-4.947898 2.429786,-8.596818 2.429786,-3.710925 6.884034,-3.710925 4.396671,0 8.157077,3.463531 3.818171,3.401713 5.843015,8.288047 2.024777,4.824204 2.024777,9.40101 z m 22.790712,-1.67039 q 6.826459,0 14.751956,6.061178 7.925499,5.99936 13.247974,14.65831 5.32235,8.59682 5.32235,15.7099 0,2.84504 -0.98352,4.70051 -0.98351,1.91728 -2.83473,2.78322 -1.79339,0.9277 -3.70251,1.23698 -1.909105,0.37109 -4.396725,0.37109 -3.933897,0 -10.87589,-2.78323 -6.884035,-2.78399 -10.528525,-2.78399 -3.818171,0 -11.165044,2.72135 -7.288979,2.78323 -11.569988,2.78323 -10.586734,0 -10.586734,-9.03024 0,-5.31899 3.239672,-11.81295 3.239673,-6.556281 8.041287,-11.936964 4.859508,-5.380874 10.87589,-9.030235 6.017202,-3.650816 11.167573,-3.650816 z M 88.324792,60.868214 q -3.528954,0 -6.074401,-2.41207 -2.545449,-2.41207 -3.644618,-5.690086 -1.099168,-3.339831 -1.099168,-7.051074 0,-4.576807 1.735563,-9.339003 1.735561,-4.824203 5.264515,-8.349422 3.586784,-3.587229 8.041292,-3.587229 3.52895,0 6.0744,2.41207 2.545445,2.412069 3.644615,5.751966 1.09917,3.278014 1.09917,6.989067 0,4.51499 -1.73556,9.339003 -1.735565,4.824203 -5.322355,8.41143 -3.58678,3.525409 -7.983706,3.525409 z m 24.991968,-6.432271 q 4.45456,0 6.88402,3.710926 2.4298,3.649107 2.4298,8.596818 0,4.576807 -2.02479,9.40101 -2.02478,4.824203 -5.84302,8.288049 -3.76032,3.401713 -8.15707,3.401713 -4.45456,0 -6.884035,-3.649045 -2.42978,-3.649108 -2.42978,-8.596818 0,-4.576808 2.02477,-9.401012 2.024785,-4.886017 5.785135,-8.288047 3.81817,-3.463531 8.21466,-3.463531 z"\n' +
                '       id="icon" />';
            mapIconUrl = _createSvgData(path, name);
        }
        if (type === 'bicycle') {
            path = '  <path\n' +
                '       style="fill:{mapIconColor};troke-width:5.27804"\n' +
                '       d="M 57.572403,85.62602 H 43.943978 q -1.736105,0 -2.51736,-1.519073 -0.73787,-1.519125 0.303856,-2.907988 l 8.159848,-10.893874 q -2.821165,-1.345476 -5.946238,-1.345476 -5.729312,0 -9.809235,4.07987 -4.079872,4.079872 -4.079872,9.809237 0,5.729364 4.079872,9.809235 4.07987,4.07987 9.809235,4.07987 4.991336,0 8.81063,-3.125021 3.819454,-3.168406 4.817689,-7.9862 z m -8.07276,-5.555664 h 8.07276 q -0.781255,-3.689245 -3.255178,-6.423374 l -4.817688,6.423374 z m 20.833477,0 12.499979,-16.666464 H 61.999624 l -4.296854,5.72931 q 4.557275,4.4705 5.46858,10.937681 h 7.161242 z m 44.53134,12.587067 q 4.07987,-4.079872 4.07987,-9.809236 0,-5.729364 -4.07987,-9.809235 -4.07988,-4.079872 -9.80924,-4.079872 -2.60418,0 -5.251745,1.041674 l 7.551805,11.284975 q 0.65105,0.998289 0.43407,2.126733 -0.21703,1.128445 -1.17188,1.736106 -0.65105,0.477452 -1.56251,0.477452 -1.51908,0 -2.30033,-1.258655 L 95.202811,73.08239 q -4.036429,4.123257 -4.036429,9.765428 0,5.729311 4.079874,9.809235 4.079874,4.079871 9.809234,4.079871 5.72936,0 9.80923,-4.079871 z m 3.90622,-23.524221 Q 124.5,74.818706 124.5,82.848716 q 0,8.029479 -5.72932,13.758791 -5.6855,5.685503 -13.71551,5.685503 -8.029473,0 -13.758786,-5.685503 -5.685508,-5.729312 -5.685508,-13.758791 0,-4.210081 1.692718,-7.942922 1.736101,-3.776015 4.774305,-6.510461 L 89.256738,64.141867 73.935646,84.497679 q -0.781253,1.128446 -2.213557,1.128446 h -8.550422 q -0.998294,7.117963 -6.467184,11.892477 -5.468577,4.774308 -12.760187,4.774308 -8.029481,0 -13.758792,-5.685509 -5.685505,-5.729311 -5.685505,-13.758792 0,-8.029481 5.685505,-13.715512 5.729311,-5.729311 13.758792,-5.729311 4.947897,0 9.331573,2.387151 l 5.946237,-7.94292 h -9.722148 q -1.128497,0 -1.953138,-0.824641 -0.824641,-0.824641 -0.824641,-1.953139 0,-1.128445 0.824641,-1.953139 0.824642,-0.824639 1.953138,-0.824639 h 16.666466 v 5.555662 h 18.880072 l -3.689239,-5.555662 h -9.63559 q -1.128496,0 -1.953137,-0.824642 -0.824642,-0.82464 -0.824642,-1.953138 0,-1.128497 0.824642,-1.953138 0.824641,-0.824641 1.953137,-0.824641 h 11.111327 q 1.432306,0 2.300322,1.215268 l 11.588462,17.361054 q 3.949662,-1.909699 8.333492,-1.909699 8.02948,0 13.71552,5.729311 z"\n' +
                '       id="icon" />';
            mapIconUrl = _createSvgData(path, name);
        }
        if (type === 'boat') {
            path = '  <path\n' +
                '       style="fill:{mapIconColor}"\n' +
                '       d="M 74.499135,21.146 C 62.349548,52.645341 38.500055,59.817002 38.500055,59.817002 L 74.497999,70.646023 V 21.146 Z m 0,49.498882 H 36.249898 v 3.656162 c 0,5.302972 4.434655,10.049902 10.265342,13.499797 -2.064068,0.705998 -4.159998,0.843755 -5.765599,0.843755 -3.149933,0 -8.100107,-0.90001 -11.249642,-4.499915 v 9.000057 c 3.149935,3.599902 8.100108,4.499912 11.249642,4.499912 3.149935,0 8.100108,-0.90001 11.249643,-4.499912 3.149934,3.599902 8.100108,4.499912 11.249643,4.499912 3.149935,0 8.100105,-0.90001 11.249646,-4.499912 3.149934,3.599902 8.100107,4.499912 11.249637,4.499912 3.149935,0 8.100106,-0.90001 11.249652,-4.499912 3.149928,3.599902 8.100098,4.499912 11.249628,4.499912 3.14993,0 8.1001,-0.90001 11.24964,-4.499912 v -9.000057 c -3.14993,3.599905 -8.10011,4.499915 -11.24964,4.499915 -2.2562,0 -5.37586,-0.524407 -8.15596,-2.109325 6.15202,-3.375632 12.27896,-8.351453 16.73424,-15.89016 H 101.49816 74.498572 Z m 26.999605,0 c 0,0 0.0565,-22.893118 -18.843643,-41.34292 3.599916,24.749441 -3.656153,33.749498 -3.656153,33.749498 l 22.499276,7.593422 z M 29.502849,97.64448 v 9.00006 c 3.149934,3.5999 8.100107,4.49991 11.249641,4.49991 3.149935,0 8.100109,-0.89995 11.249644,-4.49991 3.149934,3.5999 8.100106,4.49991 11.249642,4.49991 3.149936,0 8.100113,-0.89995 11.249643,-4.49991 3.149934,3.5999 8.100106,4.49991 11.249636,4.49991 3.149936,0 8.100112,-0.89995 11.249648,-4.49991 3.149927,3.5999 8.100097,4.49991 11.249627,4.49991 3.14995,0 8.10011,-0.89995 11.24967,-4.49991 v -9.00006 c -3.14996,3.59991 -8.10012,4.49991 -11.24967,4.49991 -3.14993,0 -8.10009,-0.89995 -11.249627,-4.49991 -3.149934,3.59991 -8.100106,4.49991 -11.249649,4.49991 -3.149922,0 -8.100095,-0.89995 -11.249636,-4.49991 -3.149935,3.59991 -8.100107,4.49991 -11.249643,4.49991 -3.149932,0 -8.100106,-0.89995 -11.249642,-4.49991 -3.149935,3.59991 -8.100108,4.49991 -11.249643,4.49991 -3.149932,0 -8.100107,-0.89995 -11.249641,-4.49991 z"\n' +
                '       stroke-width="4.49991"\n' +
                '       id="icon" />';
            mapIconUrl = _createSvgData(path, name);
        }
        if (type === 'bus') {
            path = '  <path\n' +
                '       style="fill:{mapIconColor};stroke-width:5.80154"\n' +
                '       d="m 52.127644,93.103293 q 2.014528,-2.014526 2.014528,-4.824215 0,-2.809687 -2.014528,-4.771191 -1.961501,-2.014527 -4.77119,-2.014527 -2.809744,0 -4.824216,2.014527 -1.961502,1.961504 -1.961502,4.771191 0,2.809747 1.961502,4.824215 2.014529,1.961502 4.824216,1.961502 2.809689,0 4.77119,-1.961502 z m 54.285636,0 q 2.01453,-2.014526 2.01453,-4.824215 0,-2.809687 -2.01453,-4.771191 -1.9615,-2.014527 -4.77119,-2.014527 -2.809749,0 -4.82421,2.014527 -1.961512,1.961504 -1.961512,4.771191 0,2.809747 1.961512,4.824215 2.014522,1.961502 4.82421,1.961502 2.80969,0 4.77119,-1.961502 z m -0.42409,-25.817452 -3.81701,-20.357038 q -0.26508,-1.219312 -1.21932,-1.961502 -0.9012,-0.795219 -2.120519,-0.795219 H 50.166086 q -1.219312,0 -2.173548,0.795219 -0.901213,0.74219 -1.166286,1.961502 l -3.816951,20.357038 q -0.266871,1.589624 0.742597,2.807948 1.009468,1.218323 2.599093,1.218323 H 102.6515 q 1.59044,0 2.59764,-1.219309 1.00726,-1.21931 0.74224,-2.809746 z M 93.266397,36.642084 q 0.742246,-0.74225 0.742246,-1.802482 0,-1.06029 -0.742246,-1.802482 -0.742188,-0.74225 -1.802484,-0.74225 h -33.92859 q -1.060289,0 -1.802481,0.74225 -0.742192,0.742192 -0.742192,1.802482 0,1.06029 0.742192,1.802482 0.74225,0.742249 1.802481,0.742249 h 33.928592 q 1.060295,0 1.802482,-0.742249 z m 21.947823,36.632112 v 31.967094 h -6.78549 v 6.78548 q 0,2.80975 -2.01452,4.7712 -1.9615,2.01452 -4.7712,2.01452 -2.809742,0 -4.824204,-2.01452 -1.961502,-1.96151 -1.961502,-4.7712 v -6.78548 H 54.142639 v 6.78548 q 0,2.80975 -2.014529,4.7712 -1.961502,2.01452 -4.77119,2.01452 -2.809746,0 -4.824217,-2.01452 -1.961502,-1.96151 -1.961502,-4.7712 v -6.78548 H 33.785714 V 73.274196 q 0,-5.937301 1.325305,-11.821808 l 5.460413,-24.068287 q 0.47712,-4.135051 5.142316,-7.262953 4.718221,-3.127787 12.193105,-4.718223 7.528085,-1.590435 16.592993,-1.590435 9.065494,0 16.540213,1.590435 7.528087,1.590378 12.193101,4.718223 4.71822,3.127786 5.19535,7.262953 l 5.56646,24.068287 q 1.21932,5.407389 1.21932,11.821808 z"\n' +
                '       id="icon" />';
            mapIconUrl = _createSvgData(path, name);
        }
        if (type === 'car') {
            path = '<path style="fill:{mapIconColor};fill-opacity:1" id="icon" d="m 44.947372,80.92042 q 2.349992,-2.349992 2.349992,-5.650026 0,-3.300034 -2.349992,-5.650026 -2.353856,-2.347911 -5.652819,-2.347911 -3.300034,0 -5.650026,2.349992 -2.349992,2.349992 -2.349992,5.650026 0,3.300033 2.349992,5.650025 2.349991,2.349992 5.650026,2.349992 3.300034,0 5.650027,-2.349992 z M 49.097409,59.2703 H 99.897291 L 95.447264,41.420229 Q 95.34732,41.020252 94.747224,40.570226 94.147228,40.07021 93.697209,40.07021 H 55.297263 q -0.450086,0 -1.050022,0.500016 -0.600054,0.450026 -0.700034,0.850003 L 49.097173,59.2703 Z m 66.252711,21.65012 q 2.34999,-2.349992 2.34999,-5.650026 0,-3.300034 -2.34999,-5.650026 -2.35386,-2.347911 -5.65283,-2.347911 -3.30003,0 -5.65002,2.349992 -2.35,2.349992 -2.35,5.650026 0,3.300033 2.35,5.650025 2.34999,2.349992 5.65002,2.349992 3.30004,0 5.65003,-2.349992 z m 10.34982,-10.450286 v 19.199971 q 0,0.70003 -0.45002,1.149998 -0.45009,0.45003 -1.15,0.45003 h -4.80002 v 6.39999 q 0,4.000007 -2.80002,6.800027 -2.80002,2.80002 -6.80003,2.80002 -4.00001,0 -6.80003,-2.80002 -2.80001,-2.80002 -2.80001,-6.800027 v -6.39999 H 48.899888 v 6.39999 q 0,4.000007 -2.800019,6.800027 -2.800018,2.80002 -6.800027,2.80002 -4.000008,0 -6.800027,-2.80002 -2.800017,-2.80002 -2.800017,-6.800027 v -6.39999 h -4.800023 q -0.700034,0 -1.15,-0.45003 -0.450027,-0.45008 -0.450027,-1.149998 V 70.470134 q 0,-4.649994 3.249985,-7.900276 3.300034,-3.300034 7.950206,-3.300034 h 1.400009 l 5.250049,-20.949908 q 1.150001,-4.699983 5.2,-7.849751 4.049998,-3.199995 8.950001,-3.199995 h 38.399946 q 4.899997,0 8.949996,3.199995 4.05,3.150005 5.2,7.849751 l 5.24999,20.949908 h 1.40001 q 4.64998,0 7.90027,3.300034 3.30004,3.249985 3.30004,7.900276 z" stroke-width="0.594408" />';
            mapIconUrl = _createSvgData(path, name);
        }
        if (type === 'crane') {
            path = '  <path\n' +
                '       style="fill:{mapIconColor}"\n' +
                '       d="M 97.506678,32.464 75.131587,48.464107 c 0.551987,0.616001 1.080032,1.267991 1.500007,2.000027 l 2.750004,4.875035 10.749901,-7.750309 -8.375072,11.875208 2.624998,4.625025 c 0.744032,0.987991 1.341986,2.089999 1.750017,3.250023 L 110.5066,32.464052 H 97.506625 Z m 12.999992,7.000279 -7.99979,11.375189 v 21.625065 c 0,2.207997 1.792,3.999999 4.00004,3.999999 2.20402,0 4,1.796039 4,4.000054 0,2.204017 -1.79603,4.000001 -4,4.000001 -2.204,0 -4.00004,-1.795984 -4.00004,-4.000001 h -7.99979 c 0,7.355921 6.64623,13.145956 14.25003,11.749938 4.71203,-0.863991 8.57996,-4.671046 9.49986,-9.375108 1.21602,-6.219993 -2.40605,-11.717028 -7.75031,-13.625277 V 39.464014 Z m -63.999366,8.999828 c -4.420028,0 -7.999788,3.580026 -7.999788,7.999788 v 20.000268 c 0,2.207996 1.792004,4.000053 4.000053,4.000053 h 4 v 3.999999 h 28.000056 v -3.999999 h 4.000053 c 2.207996,0 4.000053,-1.792004 4.000053,-4.000053 v -7.99979 L 72.757873,52.464267 c -1.42787,-2.484176 -4.012899,-3.996975 -6.879256,-3.996975 H 46.503641 Z m 7.999788,7.999788 H 65.88228 l 6.875009,11.999949 H 54.507092 Z M 42.507145,88.464108 c -6.628184,0 -11.999948,5.372292 -11.999948,11.999942 0,6.62819 5.371764,11.99995 11.999948,11.99995 h 36.000373 c 6.628184,0 11.999946,-5.37229 11.999946,-11.99995 0,-6.628174 -5.372293,-11.999942 -11.999946,-11.999942 z m 0,7.999785 c 2.207996,0 4,1.792007 4,4.000007 0,2.20799 -1.792004,4.00006 -4,4.00006 -2.207997,0 -4.000054,-1.79201 -4.000054,-4.00006 0,-2.208 1.792003,-4.000007 4.000054,-4.000007 z m 11.999947,0 c 2.207997,0 4.000053,1.792007 4.000053,4.000007 0,2.20799 -1.792003,4.00006 -4.000053,4.00006 -2.207996,0 -4,-1.79201 -4,-4.00006 0,-2.208 1.792004,-4.000007 4,-4.000007 z m 11.999949,0 c 2.207996,0 4.000053,1.792007 4.000053,4.000007 0,2.20799 -1.792005,4.00006 -4.000053,4.00006 -2.207999,0 -4.000001,-1.79201 -4.000001,-4.00006 0,-2.208 1.792002,-4.000007 4.000001,-4.000007 z m 11.999946,0 c 2.207998,0 4.000054,1.792007 4.000054,4.000007 0,2.20799 -1.792004,4.00006 -4.000054,4.00006 -2.207996,0 -4.000053,-1.79201 -4.000053,-4.00006 0,-2.208 1.792003,-4.000007 4.000053,-4.000007 z"\n' +
                '       stroke-width="4"\n' +
                '       id="icon" />';
            mapIconUrl = _createSvgData(path, name);
        }
        if (type === 'helicopter') {
            path = '  <path\n' +
                '       style="fill:{mapIconColor}"\n' +
                '       d="m 50.749679,43.910349 v 9.499829 h 33.24994 v 4.750021 c -14.250282,0 -18.82885,9.25299 -19.000192,9.499829 H 45.999231 v 4.750023 4.75002 l 19.000196,4.750021 c 0,7.087124 7.163154,14.250281 14.250275,14.250281 h 14.250286 c 14.250272,0 23.750092,-4.07076 23.750092,-14.250281 0,-8.687562 -11.93181,-21.353465 -28.500011,-23.453471 V 53.409749 H 122 V 43.90992 l -33.249931,4.750021 v -2.37501 c 0,-1.311032 -1.064035,-2.375011 -2.375015,-2.375011 -1.310979,0 -2.375007,1.063979 -2.375007,2.375011 v 2.37501 L 50.75011,43.90992 Z m -4.75002,28.500023 c 0,-5.246753 -4.253344,-9.499829 -9.499829,-9.499829 -5.246699,0 -9.49983,4.25329 -9.49983,9.499829 0,5.246698 4.253344,9.499829 9.49983,9.499829 5.246752,0 9.499829,-4.253347 9.499829,-9.499829 z M 88.74996,67.66035 c 1.510484,-0.213749 15.43735,4.232247 19.00019,14.250279 H 88.74996 Z m 23.75011,28.500023 v 4.750017 H 64.999855 v 9.49983 h 47.500215 c 5.24879,0 9.49983,-4.25125 9.49983,-9.49983 v -4.750017 z"\n' +
                '       stroke-width="4.75002"\n' +
                '       id="icon" />';
            mapIconUrl = _createSvgData(path, name);
        }
        if (type === 'motorcycle') {
            path = '  <path\n' +
                '       style="fill:{mapIconColor};stroke-width:5.04717"\n' +
                '       d="m 121.87093,80.875309 q 0.49477,4.24669 -0.90708,8.204682 -1.4018,3.916857 -4.0818,6.720309 -2.67994,2.80365 -6.55577,4.3704 -3.83438,1.56674 -8.08103,1.27814 -6.638029,-0.45353 -11.544389,-5.153665 -4.865171,-4.700229 -5.52463,-11.297084 -0.494781,-4.576523 1.1132,-8.658423 1.64921,-4.123035 4.906359,-7.050395 l -2.927361,-4.411632 q -3.958091,3.298428 -6.225689,7.998758 -2.267639,4.700229 -2.267639,10.060023 0,1.113204 -0.783381,1.937811 -0.742129,0.783372 -1.855339,0.783372 H 66.581237 63.736345 q -0.948313,6.761696 -6.143418,11.297085 -5.195054,4.53528 -12.121792,4.53528 -7.627791,0 -13.070157,-5.400972 Q 27,90.646633 27,83.018842 q 0,-7.627791 5.400978,-13.028769 5.442366,-5.442365 13.070157,-5.442365 3.133486,0 6.267073,1.113203 l 0.989548,-1.85534 Q 47.656359,59.270283 40.19361,59.270283 h -2.638712 q -1.071969,0 -1.85534,-0.783371 -0.783372,-0.783372 -0.783372,-1.85534 0,-1.071969 0.783372,-1.855341 0.783371,-0.783371 1.85534,-0.783371 h 5.277323 q 3.215956,0 5.978375,0.577245 2.762419,0.536009 4.7827,1.566743 2.061517,1.030734 2.968545,1.649213 0.907077,0.577246 2.102753,1.484273 h 21.1098 4.74146 l -3.50455,-5.277323 h -9.153049 q -1.236911,0 -2.020281,-0.907077 -0.78337,-0.948313 -0.577252,-2.185224 0.164899,-0.948313 0.948269,-1.566743 0.78337,-0.61843 1.772869,-0.61843 h 10.43099 q 1.360611,0 2.185222,1.15444 l 2.886121,4.329161 4.700231,-4.70023 q 0.78337,-0.783371 1.89658,-0.783371 h 4.164215 q 1.07197,0 1.855341,0.783371 0.78337,0.783372 0.78337,1.855341 v 5.277323 q 0,1.071968 -0.78337,1.85534 -0.783371,0.783371 -1.855341,0.783371 h -7.379976 l 4.741471,7.091781 q 5.400976,-2.597526 11.338466,-1.484271 5.89611,1.071968 10.06002,5.56602 4.16422,4.452868 4.86517,10.43099 z M 45.471892,96.213663 q 4.741465,0 8.369725,-2.968544 3.62826,-3.00983 4.576523,-7.586404 H 45.471639 q -1.443036,0 -2.267643,-1.278146 -0.742136,-1.319381 -0.04139,-2.597476 l 6.060646,-11.420741 q -1.937811,-0.536009 -3.751967,-0.536009 -5.442365,0 -9.318088,3.875622 -3.875623,3.875622 -3.875623,9.318088 0,5.442467 3.875623,9.318089 3.875622,3.875623 9.318088,3.875623 z m 48.733973,-3.875622 q 3.875634,3.875622 9.318095,3.875622 5.44247,0 9.31809,-3.875622 3.87562,-3.875622 3.87562,-9.318088 0,-5.442467 -3.87562,-9.318089 -3.87562,-3.875622 -9.31809,-3.875622 -2.47382,0 -4.988831,0.989548 l 7.174051,10.719689 q 0.61848,0.948313 0.41235,2.020281 -0.20618,1.071969 -1.11321,1.649214 -0.61842,0.453539 -1.48427,0.453539 -1.44303,0 -2.18522,-1.195675 L 94.164783,73.74315 q -3.83439,3.916857 -3.83439,9.276702 0,5.442365 3.875631,9.318089 z"\n' +
                '       id="icon" />';
            mapIconUrl = _createSvgData(path, name);
        }
        if (type === 'offroad') {
            path = '  <path\n' +
                '       d="m 38.041676,41.323946 c -2.695858,0 -4.093797,0.568773 -5.468863,2.864603 -1.375015,2.295883 -8.072814,22.834588 -8.072814,26.17205 v 14.453502 c 0,3.379207 3.133367,6.510651 6.250204,6.510651 h 2.083367 c 0,6.904182 5.595709,12.499888 12.49989,12.499888 6.904182,0 12.499891,-5.595706 12.499891,-12.499888 h 37.500188 c 0,6.904182 5.595711,12.499888 12.499891,12.499888 6.90418,0 12.4999,-5.595706 12.4999,-12.499888 0,-0.364158 -0.0997,-0.685479 -0.13023,-1.041683 1.95221,-1.483611 4.2969,-4.175519 4.2969,-5.468865 V 73.225618 c 0,-4.516699 -8.03538,-6.164427 -22.13538,-9.635493 0,0 -12.977112,-15.255116 -16.40659,-19.400952 -2.22919,-2.695859 -5.137568,-2.864604 -7.291478,-2.864604 H 38.041 Z m 13.802126,6.640616 H 62.000189 V 66.324245 H 47.286762 c -1.900016,0 -3.359402,-0.554165 -2.734382,-3.64584 0.650026,-3.225019 2.684423,-11.205454 3.255223,-12.630374 0.650025,-1.616692 1.982306,-2.083366 4.036509,-2.083366 z m 18.489649,0 h 8.984633 c 1.604168,0 3.414611,0.513563 4.427133,1.692747 L 95.59425,63.719881 c 1.320841,1.750036 0.742711,2.604209 -0.911466,2.604209 H 70.333862 V 47.964405 Z M 45.333149,85.07434 c 3.445853,0 6.250206,2.804196 6.250206,6.250204 0,3.445853 -2.804197,6.250205 -6.250206,6.250205 -3.445852,0 -6.250204,-2.804197 -6.250204,-6.250205 0,-3.445852 2.804196,-6.250204 6.250204,-6.250204 z m 62.502051,0 c 3.44585,0 6.25021,2.804196 6.25021,6.250204 0,3.445853 -2.8042,6.250205 -6.25021,6.250205 -3.44585,0 -6.2502,-2.804197 -6.2502,-6.250205 0,-3.445852 2.80419,-6.250204 6.2502,-6.250204 z"\n' +
                '       overflow="visible"\n' +
                '       stroke-width="4.16667"\n' +
                '       style="fill:{mapIconColor};text-indent:0;text-transform:none"\n' +
                '       id="icon" />';
            mapIconUrl = _createSvgData(path, name);
        }
        if (type === 'person') {
            path = '  <path\n' +
                '       style="fill:{mapIconColor};stroke-width:5.96479"\n' +
                '       d="m 112.00202,102.92787 q 0,6.38709 -3.6916,10.95731 -3.63298,4.57052 -8.789718,4.57052 H 49.479119 q -5.1565,0 -8.848167,-4.57052 -3.632973,-4.57052 -3.632973,-10.95731 0,-4.980721 0.468773,-9.375458 0.527347,-4.45331 1.875091,-8.90662 1.347743,-4.511945 3.398617,-7.676086 2.109506,-3.222835 5.508063,-5.215134 3.457191,-2.050873 7.910501,-2.050873 7.676086,7.500125 18.340528,7.500125 10.664442,0 18.340533,-7.500125 4.453308,0 7.852045,2.050873 3.45719,1.992299 5.50806,5.215134 2.10951,3.1642 3.45719,7.676086 1.34774,4.45331 1.81652,8.90662 0.52741,4.394737 0.52741,9.375458 z M 90.379666,35.072439 q 6.621516,6.563056 6.621516,15.879458 0,9.316999 -6.621516,15.93851 -6.561261,6.567232 -15.878259,6.567232 -9.317003,0 -15.938513,-6.563057 -6.563057,-6.621511 -6.563057,-15.938509 0,-9.316999 6.563056,-15.879458 6.620915,-6.620915 15.93791,-6.620915 9.316998,0 15.879465,6.621511 z"\n' +
                '       id="icon" />';
            mapIconUrl = _createSvgData(path, name);
        }
        if (type === 'pickup') {
            path = '  <path\n' +
                '       style="fill:{mapIconColor};"\n' +
                '       d="m 58.563711,44.113631 a 5.0000288,5.0000288 0 0 0 -3.905873,3.749681 L 50.595712,64.111705 H 32.00384 c -5.499522,0 -9.998924,4.499572 -9.998924,9.998923 v 12.029901 c 0,1.999842 0.968642,3.530931 2.968484,4.530823 l 7.186974,2.655981 c 0.833943,6.138874 5.942071,10.780467 12.342403,10.780467 6.124695,0 11.03795,-4.257402 12.186436,-9.998928 H 97.31048 c 1.148304,5.741866 6.06173,9.998928 12.18642,9.998928 6.56197,0 11.71286,-4.877472 12.34241,-11.248935 l 2.65598,-1.71859 c 1.49989,-0.999892 2.49979,-2.999734 2.49979,-4.999576 v -8.592948 c 0,-1.999842 -1.4374,-3.874682 -3.43718,-4.374629 L 101.06004,65.517679 88.717643,50.050259 88.40514,49.581562 88.248894,49.737813 C 85.718074,45.988756 81.409582,44.113291 77.468429,44.113291 H 59.501556 a 5.0000288,5.0000288 0 0 0 -0.468749,0 5.0000288,5.0000288 0 0 0 -0.468697,0 z m 4.843322,9.998924 h 14.061449 c 1.888742,0 2.270664,0.191017 2.812235,1.093643 a 5.0000288,5.0000288 0 0 0 0.312503,0.468696 l 6.717933,8.436981 H 60.907301 l 2.499795,-9.998923 z m -18.904369,32.96582 c 2.499787,0 4.530821,2.031092 4.530821,4.530822 0,2.499788 -2.031091,4.530823 -4.530821,4.530823 -2.499788,0 -4.530822,-2.031092 -4.530822,-4.530823 0,-2.499787 2.031091,-4.530822 4.530822,-4.530822 z m 64.995836,0 c 2.49978,0 4.53082,2.031092 4.53082,4.530822 0,2.499788 -2.0311,4.530823 -4.53082,4.530823 -2.4998,0 -4.53083,-2.031092 -4.53083,-4.530823 0,-2.499787 2.0311,-4.530822 4.53083,-4.530822 z"\n' +
                '       stroke-width="4.99958"\n' +
                '       id="icon" />';
            mapIconUrl = _createSvgData(path, name);
        }
        if (type === 'plane') {
            path = '  <path\n' +
                '       style="fill:{mapIconColor};stroke-width:6.1697"\n' +
                '       d="m 115.45514,34.858519 q 2.66838,3.153575 0.72777,8.975663 -1.94068,5.821966 -6.54974,10.431094 l -9.764145,9.764151 9.703065,42.209313 q 0.30325,1.15225 -0.72778,2.00132 l -7.76269,5.82197 q -0.42454,0.36382 -1.152254,0.36382 -0.242534,0 -0.424537,-0.0611 -0.909661,-0.18202 -1.273546,-0.97032 L 81.310906,82.586742 65.603494,98.294154 68.817717,110.05914 q 0.303241,1.03095 -0.485184,1.88003 l -5.821966,5.82196 q -0.545832,0.54582 -1.394843,0.54582 h -0.121297 q -0.909658,-0.12129 -1.45549,-0.78835 L 48.076887,102.23628 32.79395,90.774229 q -0.667129,-0.424536 -0.788364,-1.394844 -0.06109,-0.788363 0.545834,-1.51614 l 5.821965,-5.882367 q 0.545832,-0.545831 1.394843,-0.545831 0.363888,0 0.485184,0.06109 L 52.018394,84.710352 67.725806,69.002941 36.918079,52.082567 q -0.849073,-0.485122 -1.030955,-1.455491 -0.121296,-0.970369 0.545831,-1.637434 l 7.762705,-7.762704 q 0.849072,-0.788363 1.819378,-0.485184 l 40.329409,9.642603 9.703073,-9.703071 q 4.60907,-4.609066 10.43109,-6.549742 5.82197,-1.940677 8.97567,0.727777 z"\n' +
                '       id="icon" />';
            mapIconUrl = _createSvgData(path, name);
        }
        if (type === 'ship') {
            path = '<path\n' +
                '       style="fill:{mapIconColor};stroke-width:5.46138"\n' +
                '       d="m 107.78167,102.71667 q 0.80343,-0.80343 1.90286,-0.80343 1.09943,0 1.90286,0.80343 l 5.41261,5.41261 -3.80576,3.80576 -3.50976,-3.50976 -3.50977,3.50976 q -0.76114,0.80343 -1.90285,0.80343 -1.1417,0 -1.90285,-0.80343 l -3.509757,-3.50976 -3.509765,3.50976 q -0.803419,0.80343 -1.902852,0.80343 -1.099433,0 -1.902861,-0.80343 l -3.509752,-3.50976 -3.50976,3.50976 q -0.803429,0.80343 -1.902853,0.80343 -1.099433,0 -1.902861,-0.80343 l -3.50976,-3.50976 -3.509752,3.50976 q -0.803429,0.80343 -1.902861,0.80343 -1.099433,0 -1.902853,-0.80343 l -3.50976,-3.50976 -3.509761,3.50976 q -0.80342,0.80343 -1.902852,0.80343 -1.099431,0 -1.902856,-0.80343 l -3.509758,-3.50976 -3.509758,3.50976 q -0.803425,0.80343 -1.902856,0.80343 -1.099431,0 -1.902856,-0.80343 l -3.509758,-3.50976 -3.509759,3.50976 q -0.803424,0.80343 -1.902855,0.80343 -1.099432,0 -1.902856,-0.80343 l -5.412614,-5.41261 3.805766,-3.80576 3.509758,3.50976 3.509759,-3.50976 q 0.803425,-0.80343 1.902855,-0.80343 1.099432,0 1.902856,0.80343 l 3.509758,3.50976 3.509759,-3.50976 q 0.803424,-0.80343 1.902856,-0.80343 1.099431,0 1.902855,0.80343 l 3.509755,3.50976 3.50976,-3.50976 q 0.803429,-0.80343 1.902861,-0.80343 1.099424,0 1.902852,0.80343 l 3.509761,3.50976 3.509752,-3.50976 q 0.803428,-0.80343 1.902861,-0.80343 1.099432,0 1.902852,0.80343 l 3.509761,3.50976 3.50976,-3.50976 q 0.80342,-0.80343 1.902853,-0.80343 1.099432,0 1.902852,0.80343 l 3.509761,3.50976 3.50976,-3.50976 q 0.80342,-0.80343 1.902853,-0.80343 1.099437,0 1.90286,0.80343 l 3.50975,3.50976 z m -66.563345,-1.60566 q -0.803424,0.80343 -1.902856,0.80343 -1.099431,0 -1.902855,-0.80343 L 32,95.698402 l 3.805765,-3.805767 3.509759,3.467434 3.509759,-3.467434 q 0.803424,-0.803424 1.902855,-0.803424 1.099432,0 1.902856,0.803424 l 3.509758,3.467434 2.706335,-2.706335 V 80.264038 L 43.966875,66.986321 q -0.718881,-1.099432 -0.296006,-2.368002 0.422875,-1.310896 1.691445,-1.733716 l 7.484827,-2.452598 V 47.788354 h 5.412614 V 42.37574 H 69.08476 v -5.412614 h 10.825014 v 5.412614 h 10.825013 v 5.412614 H 96.1474 v 12.643651 l 7.48483,2.452598 q 1.26857,0.42282 1.69144,1.733716 0.42288,1.26857 -0.296,2.368002 l -8.880218,13.277717 v 12.389696 l 0.803428,-0.761153 q 0.80342,-0.803424 1.902857,-0.803424 1.099428,0 1.902853,0.803424 l 3.50976,3.467433 3.50975,-3.467433 q 0.80342,-0.803424 1.90286,-0.803424 1.09943,0 1.90286,0.803424 l 5.41262,5.412614 -3.80577,3.805765 -3.50976,-3.509758 -3.50976,3.509758 q -0.76115,0.80343 -1.90286,0.80343 -1.1417,0 -1.90286,-0.80343 l -3.509749,-3.509758 -3.50976,3.509758 q -0.803429,0.80343 -1.902861,0.80343 -1.099424,0 -1.902853,-0.80343 l -3.50976,-3.509758 -3.509752,3.509758 q -0.803429,0.80343 -1.902861,0.80343 -1.099433,0 -1.902853,-0.80343 l -3.50976,-3.509758 -3.509761,3.509758 q -0.80342,0.80343 -1.902852,0.80343 -1.099433,0 -1.902853,-0.80343 l -3.50976,-3.509758 -3.509761,3.509758 q -0.80342,0.80343 -1.902852,0.80343 -1.099434,0 -1.902858,-0.80343 l -3.509704,-3.509758 -3.509759,3.509758 q -0.803424,0.80343 -1.902855,0.80343 -1.099432,0 -1.902855,-0.80343 l -3.509759,-3.509758 -3.509759,3.509758 z M 58.259482,53.201023 v 5.412614 L 74.50164,53.201405 90.739428,58.614019 V 53.201405 H 85.326815 V 47.78879 H 63.676244 v 5.412615 h -5.412612 z"\n' +
                '       id="icon" />';
            mapIconUrl = _createSvgData(path, name);
        }
        if (type === 'tractor') {
            path = '<path style="fill:{mapIconColor}"' +
                '   d="m 37.653014,35.524256 a 4.4974974,4.4974974 0 0 0 -3.653863,4.497016 v 26.982206 a 4.4974974,4.4974974 0 0 0 0,0.421577 v 9.978051 c 4.497016,-3.597645 9.893618,-5.90229 15.739798,-5.90229 13.491103,0 24.73351,11.242407 24.73351,24.73351 v 2.248535 h 20.236656 c -1.383793,1.868269 -2.248536,4.195729 -2.248536,6.745549 0,6.2956 4.946756,11.24241 11.242411,11.24241 6.29565,0 11.2424,-4.94676 11.2424,-11.24241 0,-2.95905 -1.1392,-5.599291 -2.95119,-7.58881 2.65686,-1.208781 4.57012,-3.597645 5.19968,-6.745552 l 2.24854,-14.474906 c 0.44968,-2.248535 -1.7988,-4.918647 -4.49703,-4.918647 L 76.861325,67.284512 69.834686,38.896871 A 4.4974974,4.4974974 0 0 0 65.478159,35.524096 H 38.495954 a 4.4974974,4.4974974 0 0 0 -0.421577,0 4.4974974,4.4974974 0 0 0 -0.421577,0 z m 5.340224,8.994247 H 61.965 L 67.445661,66.160592 42.993238,63.49048 V 44.518716 Z m 53.962274,0 v 19.393393 l 8.994248,1.264784 V 44.518396 H 96.955512 Z M 49.736651,75.997565 c -11.242407,0 -20.236654,8.994247 -20.236654,20.236654 0,11.242411 8.994247,20.236651 20.236654,20.236651 11.242408,0 20.236655,-8.99424 20.236655,-20.236651 0,-11.242407 -8.994247,-20.236654 -20.236655,-20.236654 z m 0,6.745551 c 7.644923,0 13.491103,5.84618 13.491103,13.491103 0,7.644921 -5.84618,13.491101 -13.491103,13.491101 -7.644923,0 -13.491103,-5.84618 -13.491103,-13.491101 0,-7.644923 5.84618,-13.491103 13.491103,-13.491103 z m 53.962279,17.987964 c 2.69822,0 4.49707,1.79879 4.49707,4.49706 0,2.69823 -1.7988,4.49702 -4.49707,4.49702 -2.69823,0 -4.49702,-1.79879 -4.49702,-4.49702 0,-2.69822 1.79879,-4.49706 4.49702,-4.49706 z"\n' +
                '   stroke-width="4.49702"\n' +
                '   id="icon" />';
            mapIconUrl = _createSvgData(path, name);
        }
        if (type === 'train') {
            path = '<path\n' +
                '       style="fill:{mapIconColor};stroke-width:5.5779"\n' +
                '       d="m 64.053421,25.75244 c -3.339158,0 -6.062626,2.485794 -6.530055,5.698945 h -2.0192 c -7.331041,0 -13.297167,5.728508 -13.297167,12.762805 v 54.2574 c 0,4.89741 2.886509,9.14163 7.123541,11.27907 l -9.141628,7.59823 c -0.816215,0.67526 -0.942387,1.88478 -0.267126,2.70099 0.675261,0.81622 1.884774,0.94239 2.70099,0.26713 l 10.981778,-9.20131 c 0.62333,0.0891 1.254024,0.11875 1.899612,0.11875 h 37.991659 c 0.645599,0 1.276294,-0.0302 1.89962,-0.11875 l 10.981785,9.20131 c 0.81621,0.67526 2.02573,0.54909 2.70099,-0.26713 0.67526,-0.81621 0.54908,-2.02573 -0.26713,-2.70099 l -9.141623,-7.59823 C 103.90644,107.61361 106.793,103.369 106.793,98.47159 V 44.215306 c 0,-7.034296 -5.96613,-12.762804 -13.297175,-12.762804 h -2.018248 c -0.467483,-3.212985 -3.190729,-5.698947 -6.530051,-5.698947 -3.339154,0 -6.062626,2.485794 -6.53005,5.698947 H 70.581633 C 70.114148,28.239517 67.390904,25.753555 64.05158,25.753555 Z m 0,3.799166 c 1.57308,0 2.849416,1.276282 2.849416,2.849418 0,1.573081 -1.27628,2.849417 -2.849416,2.849417 -1.573082,0 -2.849417,-1.276281 -2.849417,-2.849417 0,-1.573081 1.276279,-2.849418 2.849417,-2.849418 z m 20.895388,0 c 1.573081,0 2.849418,1.276282 2.849418,2.849418 0,1.573081 -1.276277,2.849417 -2.849418,2.849417 -1.573082,0 -2.849418,-1.276281 -2.849418,-2.849417 0,-1.573081 1.276277,-2.849418 2.849418,-2.849418 z M 63.103502,44.748608 h 22.795224 c 1.053669,0 1.899608,0.853308 1.899608,1.899612 v 3.799167 H 61.204004 V 46.64822 c 0,-1.046248 0.853308,-1.899612 1.89961,-1.899612 z m -7.598222,9.498057 h 37.991664 c 2.099975,0 3.799166,1.580555 3.799166,3.502366 v 13.890658 c 0,1.921866 -1.699254,3.502365 -3.799166,3.502365 H 55.50528 c -2.099968,0 -3.799165,-1.580499 -3.799165,-3.502365 V 57.749031 c 0,-1.921867 1.699253,-3.502366 3.799165,-3.502366 z m 1.899612,34.192558 c 3.146217,0 5.698946,2.55256 5.698946,5.698945 0,3.146216 -2.552561,5.698952 -5.698946,5.698952 -3.146216,0 -5.698945,-2.552567 -5.698945,-5.698952 0,-3.146218 2.552561,-5.698945 5.698945,-5.698945 z m 34.192563,0 c 3.146206,0 5.69894,2.55256 5.69894,5.698945 0,3.146216 -2.552565,5.698952 -5.69894,5.698952 -3.146222,0 -5.698955,-2.552567 -5.698955,-5.698952 0,-3.146218 2.552567,-5.698945 5.698955,-5.698945 z"\n' +
                '       id="icon" />';
            mapIconUrl = _createSvgData(path, name);
        }
        if (type === 'tram') {
            path = '<path\n' +
                '       style="fill:{mapIconColor};stroke-width:5.45919"\n' +
                '       d="m 74.498911,26.580741 c -14.063948,0 -20.899393,2.486222 -20.899393,7.599729 0,1.046416 0.85349,1.899905 1.899905,1.899905 1.046416,0 1.899904,-0.853489 1.899904,-1.899905 0,-0.935103 1.892482,-2.463948 7.777699,-3.26552 l 1.605001,9.384337 c -15.362689,1.721826 -24.58052,8.468285 -24.58052,14.784015 V 99.31579 c 0,5.85552 4.118954,10.79826 9.737,12.29026 l -7.956214,6.64983 c -0.794093,0.66793 -0.90546,1.81829 -0.237475,2.61238 0.37106,0.44531 0.890611,0.71248 1.424957,0.71248 0.423031,0 0.890611,-0.17819 1.246822,-0.47495 l 10.805908,-9.02457 h 34.554993 l 10.805912,9.02457 c 0.35621,0.29687 0.82379,0.47495 1.24682,0.47495 0.53435,0 1.05383,-0.26717 1.42495,-0.71248 0.66793,-0.79409 0.55662,-1.94445 -0.23747,-2.61238 l -7.956214,-6.64983 c 5.618044,-1.49172 9.736994,-6.43474 9.736994,-12.29026 V 55.083302 c 0,-6.31573 -9.217825,-13.062189 -24.580512,-14.784015 l 1.603035,-9.381061 c 5.885545,0.801517 7.777698,2.330361 7.777698,3.26552 0,1.046416 0.846064,1.899905 1.899905,1.899905 1.053841,0 1.899905,-0.853489 1.899905,-1.899905 0,-5.113454 -6.835443,-7.59973 -20.899392,-7.59973 z m 0,3.799865 c 2.06319,0 3.836987,0.07418 5.462459,0.178187 l -1.60309,9.44002 c -1.261671,-0.06676 -2.530768,-0.118737 -3.859206,-0.118737 -1.328491,0 -2.597533,0.05186 -3.859205,0.118737 l -1.605001,-9.438927 c 1.625309,-0.103888 3.399107,-0.178189 5.462458,-0.178189 z M 63.09959,51.279998 h 22.799188 c 1.05384,0 1.899905,0.853489 1.899905,1.899905 v 3.799864 h -26.59878 v -3.799864 c 0,-1.046416 0.853489,-1.899905 1.89996,-1.899905 z m -7.59973,9.499525 h 37.998648 c 2.100309,0 3.799864,1.580816 3.799864,3.502994 v 13.893076 c 0,1.922178 -1.699555,3.502994 -3.799864,3.502994 H 55.49986 c -2.100311,0 -3.799865,-1.580816 -3.799865,-3.502994 V 64.282517 c 0,-1.922178 1.699554,-3.502994 3.799865,-3.502994 z m 1.899905,30.398918 c 3.146729,0 5.699934,2.553041 5.699934,5.699932 0,3.146787 -2.553042,5.699937 -5.699934,5.699937 -3.146782,0 -5.699933,-2.55304 -5.699933,-5.699937 0,-3.146782 2.553041,-5.699932 5.699933,-5.699932 z m 34.198509,0 c 3.146728,0 5.699934,2.553041 5.699934,5.699932 0,3.146787 -2.553043,5.699937 -5.699934,5.699937 -3.146782,0 -5.699933,-2.55304 -5.699933,-5.699937 0,-3.146782 2.55304,-5.699932 5.699933,-5.699932 z"\n' +
                '       id="icon" />';
            mapIconUrl = _createSvgData(path, name);
        }
        if (type === 'trolleybus') {
            path = '<path\n' +
                '       style="fill:{mapIconColor};stroke-width:5.33023"\n' +
                '       d="m 58.020761,25.411363 c -0.5835,0.09839 -1.082623,0.485051 -1.328665,1.026388 -0.245989,0.534301 -0.210864,1.166998 0.09142,1.673103 l 3.768041,6.298726 h -9.44836 c -6.945814,0 -12.59745,5.65217 -12.59745,12.597452 v 55.791448 c 0,1.58879 0.703002,3.00177 1.799644,3.99298 v 3.20565 c 0,2.97362 2.425305,5.399 5.398983,5.399 h 7.198468 c 2.973679,0 5.398984,-2.42538 5.398984,-5.399 v -1.79964 h 32.393897 v 1.79964 c 0,2.97362 2.425311,5.399 5.39899,5.399 h 7.198477 c 2.97366,0 5.39897,-2.42538 5.39897,-5.399 v -3.20346 c 1.08737,-0.99143 1.79097,-2.40393 1.79097,-3.99233 V 47.009857 c 0,-6.945815 -5.65217,-12.597452 -12.597467,-12.597452 h -9.448351 l 3.768042,-6.298725 c 0.351471,-0.597518 0.33047,-1.342736 -0.049,-1.912165 -0.386649,-0.576464 -1.06855,-0.885777 -1.750439,-0.787327 -0.52727,0.09839 -0.977142,0.428816 -1.237258,0.899848 l -4.836591,8.098209 H 64.647509 L 59.807666,26.320966 C 59.449153,25.681233 58.732079,25.329757 58.008021,25.421117 Z M 52.903,43.407798 h 43.191873 c 3.058004,0 5.398977,2.340982 5.398977,5.398985 v 25.195433 c 0,3.058003 -2.340973,5.398985 -5.398977,5.398985 H 52.903 c -3.058002,0 -5.398984,-2.340982 -5.398984,-5.398985 V 48.806783 c 0,-3.058003 2.340982,-5.398985 5.398984,-5.398985 z M 36.706048,54.205766 c -2.087901,0 -3.59934,1.511438 -3.59934,3.599285 V 68.60302 c 0,2.087902 1.511439,3.59934 3.59934,3.59934 z m 75.587902,0 V 72.2022 c 2.0879,0 3.59934,-1.511437 3.59934,-3.599339 V 57.804892 c 0,-2.087901 -1.51144,-3.599286 -3.59934,-3.599286 z M 52.904598,88.399151 c 2.980662,0 5.398984,2.418323 5.398984,5.398982 0,2.980657 -2.418322,5.398987 -5.398984,5.398987 -2.980713,0 -5.398983,-2.418264 -5.398983,-5.398987 0,-2.980659 2.41827,-5.398982 5.398983,-5.398982 z m 43.191875,0 c 2.980662,0 5.398977,2.418323 5.398977,5.398982 0,2.980657 -2.418315,5.398987 -5.398977,5.398987 -2.98072,0 -5.398989,-2.418264 -5.398989,-5.398987 0,-2.980659 2.418269,-5.398982 5.398989,-5.398982 z"\n' +
                '       id="icon" />';
            mapIconUrl = _createSvgData(path, name);
        }
        if (type === 'truck') {
            path = '<path\n' +
                '       style="fill:{mapIconColor};stroke-width:5.71957"\n' +
                '       d="m 57.519596,105.73718 q 1.979143,-1.97914 1.979143,-4.68747 0,-2.708331 -1.979143,-4.687474 -1.979143,-1.979142 -4.687473,-1.979142 -2.708331,0 -4.687473,1.979142 -1.979143,1.979143 -1.979143,4.687474 0,2.70833 1.979143,4.68747 1.979142,1.97915 4.687473,1.97915 2.70833,0 4.687473,-1.97915 z M 39.498948,74.383075 H 59.499139 V 61.049614 h -8.229317 q -0.677082,0 -1.145858,0.468776 l -10.15624,10.15624 q -0.468776,0.468775 -0.468776,1.145801 v 1.562472 z m 64.688332,31.354105 q 1.97914,-1.97914 1.97914,-4.68747 0,-2.708331 -1.97914,-4.687474 -1.97914,-1.979142 -4.687474,-1.979142 -2.70833,0 -4.687473,1.979142 -1.979142,1.979143 -1.979142,4.687474 0,2.70833 1.979142,4.68747 1.979143,1.97915 4.687473,1.97915 2.708334,0 4.687474,-1.97915 z M 119.49971,44.383361 V 97.71663 q 0,0.781236 -0.2083,1.406271 -0.20831,0.572929 -0.72919,0.937499 -0.46878,0.36462 -0.83334,0.62497 -0.36457,0.20831 -1.25002,0.31246 -0.83334,0.0521 -1.14586,0.10416 -0.31246,0 -1.35416,0 -0.9896,-0.052 -1.14586,-0.052 0,5.52081 -3.90624,9.42699 -3.90624,3.90624 -9.426991,3.90624 -5.520814,0 -9.426994,-3.90624 -3.906238,-3.90601 -3.906238,-9.42699 h -20.00019 q 0,5.52081 -3.906237,9.42699 -3.906238,3.90624 -9.426995,3.90624 -5.520814,0 -9.426994,-3.90624 -3.906237,-3.90623 -3.906237,-9.42699 h -3.333308 q -0.156259,0 -1.197907,0.052 -0.989599,0 -1.30206,0 -0.31246,-0.052 -1.197907,-0.10415 -0.833341,-0.10416 -1.197906,-0.31246 -0.364623,-0.26042 -0.88539,-0.62498 -0.468776,-0.364627 -0.677082,-0.937499 -0.208307,-0.624978 -0.208307,-1.406214 0,-1.354165 0.9896,-2.343765 0.9896,-0.9896 2.343765,-0.9896 V 77.716497 q 0,-0.416671 -0.05205,-1.822884 0,-1.406271 0,-1.979143 0.05205,-0.572929 0.156259,-1.770836 0.104153,-1.250012 0.31246,-1.927094 0.260469,-0.729188 0.729188,-1.614578 0.520824,-0.885389 1.197906,-1.562472 L 45.489511,56.727107 q 0.9896,-0.9896 2.604177,-1.666683 1.666683,-0.677083 3.072896,-0.677083 h 8.333413 V 44.383246 q 0,-1.354165 0.9896,-2.343765 0.9896,-0.9896 2.343765,-0.9896 h 53.333268 q 1.35417,0 2.34377,0.9896 0.9896,0.9896 0.9896,2.343765 z"\n' +
                '       id="icon" />';
            mapIconUrl = _createSvgData(path, name);
        }
        if (type === 'van') {
            path = '<path style="fill:{mapIconColor};"' +
                '       d="m 31.750039,41.182157 c -2.622021,0 -4.750038,2.128018 -4.750038,4.750039 V 64.932348 88.68254 c 0,5.248793 4.251284,9.50008 9.500076,9.50008 h 0.296906 c 1.107032,5.41193 5.838178,9.50007 11.578081,9.50007 5.739903,0 10.471378,-4.08814 11.57808,-9.50007 h 29.093714 c 1.107084,5.41193 5.838177,9.50007 11.578082,9.50007 5.7399,0 10.47137,-4.08814 11.57808,-9.50007 h 0.29691 c 5.24879,0 9.50007,-4.251287 9.50007,-9.50008 V 71.16691 69.682496 c 0,0 -6.39835,-19.288431 -17.81264,-27.75824 -0.71726,-0.536756 -1.63046,-0.742208 -2.52347,-0.742208 H 31.750968 Z m 57.00046,9.500077 H 99.7351 c 4.05179,3.595778 7.52745,9.32427 9.9456,14.250114 H 88.751045 V 50.682234 Z M 48.375173,91.057559 c 2.617271,0 4.750038,2.132767 4.750038,4.750038 0,2.617273 -2.132767,4.750043 -4.750038,4.750043 -2.617271,0 -4.750038,-2.13277 -4.750038,-4.750043 0,-2.617271 2.132767,-4.750038 4.750038,-4.750038 z m 52.250417,0 c 2.61727,0 4.75004,2.132767 4.75004,4.750038 0,2.617273 -2.13277,4.750043 -4.75004,4.750043 -2.617271,0 -4.750034,-2.13277 -4.750034,-4.750043 0,-2.617271 2.132763,-4.750038 4.750034,-4.750038 z"\n' +
                '       stroke-width="4.75004"\n' +
                '       id="icon" />';
            mapIconUrl = _createSvgData(path, name);
        }
        if (type === 'scooter') {
            path = '<path\n' +
                '       font-weight="400"\n' +
                '       overflow="visible"\n' +
                '       white-space="normal"\n' +
                '       d="m 77.960945,31.669595 a 3.4619102,3.4619102 0 1 0 0,6.922911 h 7.842782 L 97.30382,75.222476 82.998063,97.43867 H 49.620048 c -1.444732,-4.006159 -5.259241,-6.922912 -9.735397,-6.922912 -5.694332,0 -10.38465,4.690376 -10.38465,10.384652 0,5.69427 4.690376,10.38465 10.38465,10.38465 4.476327,0 8.290778,-2.91692 9.735397,-6.92291 h 35.264376 a 3.4619102,3.4619102 0 0 0 2.907145,-1.5888 l 12.210181,-18.957413 2.79895,8.924112 c -2.45113,1.907226 -4.07,4.845981 -4.07,8.160591 0,5.69433 4.69038,10.38464 10.38465,10.38464 5.69427,0 10.38465,-4.69037 10.38465,-10.38464 0,-5.608715 -4.55632,-10.219782 -10.1345,-10.357365 L 91.652014,34.09685 a 3.4619102,3.4619102 0 0 0 -3.306021,-2.42714 h -10.38465 z m -38.076862,65.7668 c 1.882495,0 3.317619,1.415115 3.420977,3.265485 a 3.4619102,3.4619102 0 0 0 0,0.39893 c -0.106542,1.84697 -1.540813,3.25872 -3.420977,3.25872 -1.952765,0 -3.461569,-1.5088 -3.461569,-3.46157 0,-1.95276 1.508804,-3.461565 3.461569,-3.461565 z m 69.229107,0 c 1.95277,0 3.46157,1.508805 3.46157,3.461515 0,1.95276 -1.5088,3.46157 -3.46157,3.46157 -1.95276,0 -3.46151,-1.50881 -3.46151,-3.46157 0,-1.95277 1.5088,-3.461515 3.46151,-3.461515 z"\n' +
                '       stroke-width="3.46157"\n' +
                '       style="fill:{mapIconColor};text-indent:0;text-decoration:none;text-decoration-line:none;text-decoration-style:solid;text-decoration-color:#000000;text-transform:none;white-space:normal;isolation:auto;mix-blend-mode:normal"\n' +
                '       id="icon" />';
            mapIconUrl = _createSvgData(path, name);
        }
        return L.divIcon({
            className: "leaflet-data-marker",
            html: L.Util.template(mapIconUrl, {
                mapIconUrl: mapIconUrl,
                mapIconStrokeColor: color,
                mapIconBgColor: color,
                mapIconColor: color,
                pinInnerCircleRadius: 48
            }), //.replace('#','%23'),
            iconAnchor: [12, 32],
            iconSize: [25, 30],
            popupAnchor: [0, -28]
        })
    }
    function _pad(number, width, padding) {
        // Convert number to string.
        var string = number.toString();

        // Return either the original number as string,
        // or the number with leading padding characters.
        if (!width || string.length >= width) {
            return string;
        }

        var leadingCharacters = new Array(width - string.length + 1).join(padding || '0');
        return leadingCharacters + string;
    }
    $.secondToTimeFormatted = function (s, showMilliSecond, humanReadOptions) {
        let ms = s % 1000;
        s = (s - ms) / 1000;
        let secs = s % 60;
        s = (s - secs) / 60;
        let mins = s % 60;
        let hrs = (s - mins) / 60;

        if (showMilliSecond) {
            if (humanReadOptions) {
                return _pad(hrs) + ' ' + humanReadOptions.short_hour + ' ' + _pad(mins) + ' ' + humanReadOptions.short_minute + ' ' + _pad(secs) + ' ' + humanReadOptions.short_second + ' ' + _pad(ms, 3) + humanReadOptions.short_millisecond;
            } else {
                return _pad(hrs) + ':' + _pad(mins) + ':' + _pad(secs) + '.' + _pad(ms, 3);
            }
        } else {
            if (humanReadOptions) {
                return _pad(hrs) + ' ' + humanReadOptions.short_hour + ' ' + _pad(mins) + ' ' + humanReadOptions.short_minute + ' ' + _pad(secs) + ' ' + humanReadOptions.short_second;
            } else {
                return _pad(hrs) + ':' + _pad(mins) + ':' + _pad(secs);
            }
        }
    }
    $.deviceStatus = {
        "online": "<?=lang('online')?>",
        "offline": "<?=lang('offline')?>",
        "unknown": "<?=lang('offline')?>"
    }
</script>
<script>
    $(document).ready(function () {
        'use strict';
        $('#profile_save').on('click', function (e) {
            e.preventDefault();
            $.ajax({
                url: '<?=base_url('rest/setting/update-profile')?>',
                method: "POST",
                data: $('#profileForm').serializeToJSON({}),
                beforeSend: function () {
                    $('#profileModal').block({
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
                    if (res.success) {
                        $('#profileModal').modal('hide');
                    } else {
                        $('#profileModal').unblock();
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
                    $('#profileModal').unblock();
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
