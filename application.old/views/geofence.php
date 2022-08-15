<!DOCTYPE html>
<html class="loading" lang="<?= $html_lang ?>" data-textdirection="ltr">
<!-- BEGIN: Head-->

<head>
    <?php $this->load->view('include/css'); ?>
</head>
<!-- END: Head-->

<!-- BEGIN: Body-->

<body class="vertical-layout vertical-menu 2-columns   fixed-navbar" data-open="click" data-menu="vertical-menu"
      data-col="2-columns">

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
                <h3 class="content-header-title"><?= lang('geofence') ?></h3>
            </div>
            <div class="content-header-right breadcrumbs-right col-md-6 col-12 d-none d-md-block">
                <div class="breadcrumb-wrapper">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item pl-0"><a href="<?= base_url('panel/map') ?>"><?= lang('map') ?></a>
                        </li>
                        <li class="breadcrumb-item pl-0"><a href="#"><?= lang('settings') ?></a></li>
                        <li class="breadcrumb-item pl-0 active"><?= lang('geofence') ?></li>
                    </ol>
                </div>
            </div>
        </div>
        <div class="content-body">
            <!-- Description -->
            <section id="geofenceTableCard" class="card mb-5">
                <div class="card-content collapse show">
                    <div class="card-header">
                        <h4 class="card-title" id=""><?= lang('geofenceList') ?></h4>
                        <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                        <div class="heading-elements">
                            <button type="button" class="btn btn-icon btn-info" data-toggle="tooltip" data-placement="top" title="<?=lang('addGeofence')?>" id="addGeofenceButton">
                                <i class="fad fa-drafting-compass white"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body pb-0">
                        <table class="table table-bordered" id="geofenceTable"
                               style="width:100% !important;">
                            <thead>
                            <tr>
                                <th class="text-center">#</th>
                                <th class="text-center"><?=lang('geofenceType')?></th>
                                <th class="text-center"><?=lang('geofenceName')?></th>
                                <th class="text-center"><?=lang('attributes')?></th>
                                <th class="text-center"><?=lang('description')?></th>
                            </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </section>
            <!--/ Description -->
            <div class="modal fade text-left" id="assignDeviceModal" tabindex="-1" role="dialog"
                 aria-labelledby="assignDeviceModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg modal-dialog-scrollable" role="document">
                    <div class="modal-content">
                        <form class="form" id="assignDeviceForm" name="assignDeviceForm">
                            <input type="hidden" name="userId" id="userId">
                            <div class="modal-header">
                                <h4 class="modal-title" id="assignDeviceModalLabel"><?=lang('assignDeviceForGeofence')?></h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body form-body p-0" style="height:calc(100vh - 175px); overflow-y: scroll; ">
                            <!--<div class="modal-body form-body table-responsive">-->
                                <table id="assignDeviceTable" class="table table-bordered table-striped">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th><?=lang('deviceName')?></th>
                                        <th><?=lang('deviceUniqueId')?></th>
                                        <th><?=lang('deviceCategory')?></th>
                                    </tr>
                                    </thead>
                                    <tbody></tbody>
                                </table>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn grey btn-outline-secondary" data-dismiss="modal">
                                    <?=lang('close')?>
                                </button>
                            </div>
                        </form>
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
        $('#addGeofenceButton').on('click', function () {
            document.location.href = '<?=base_url('panel/create-geofence')?>';
            //initAdd();
        })
        let speedUnit = '<?php echo $user->attributes->speedUnit;?>';
        let timezone = '<?php echo $user->attributes->timezone;?>';
        let distanceUnit = '<?php echo $user->attributes->distanceUnit;?>';
        let numberFormat = CommonUtils.numberFormat;
        let convert = CommonUtils.convert;
        let geofenceTable = $('#geofenceTable').DataTable({
            language: {
                "emptyTable": "<?=lang('emptyTable')?>",
                "info": "<?=lang('showing')?> _START_ <?=lang('to')?> _END_ <?=lang('of')?> _TOTAL_ <?=lang('entries')?>",
                "infoEmpty": "<?=lang('showing')?> 0 <?=lang('to')?> 0 <?=lang('of')?> 0 <?=lang('entries')?>",
                "infoFiltered": "(<?=lang('filteredFrom')?> _MAX_ <?=lang('totalEntries')?>)",
                "lengthMenu": "<?=lang('show')?> _MENU_ <?=lang('entries')?>",
                "loadingRecords": "<?=lang('loadingRecords')?>",
                "processing": "<?=lang('processing')?>",
                "search": "<?=lang('search')?>",
                "zeroRecords": "<?=lang('zeroRecords')?>",
                paginate: {
                    previous: '<i class="fas fa-chevron-left"></i>',
                    next: '<i class="fas fa-chevron-right"></i>'
                },
                aria: {
                    paginate: {
                        previous: 'Previous',
                        next: 'Next'
                    }
                }
            },
            "scrollX": false,
            "bFilter": true,
            "bProcessing": true,
            "bStateSave": false,
            "bServerSide": false,
            "cache": false,
            "bDestroy": true,
            "ordering": false,
            "bLengthChange": true,
            "info": false,
            "ajax": {
                "url": '<?=base_url('rest/setting/geofence-list')?>',
                "type": "POST",
                "data": function (d) {
                    d.all = '<?=$user->administrator?"1":"0"?>';
                },
                "dataSrc": function (json) {
                    return json.data;
                }
            },
            "fnInitComplete": function (oSettings) {
                //CommonUtils.getActiveLanguage($, document, localStorage, $('html')[0].lang);
                $('[data-toggle="tooltip"]').tooltip();
                //$('#okbTable thead').hide();
                /*$('.dataTables_scrollHead thead').hide();
                $('.description').curtail({
                    limit: 200,
                    ellipsis: '...',
                    toggle: true
                });*/
            },
            "sAjaxDataProp": "data",
            "columns": [
                {data: null, className: "text-right"},
                {data: "area", className: "text-center"},
                {data: "name", className: ""},
                {data: "attributes", className: ""},
                {data: "description", className: ""}
            ],
            "columnDefs": [
                {
                    targets: [0],
                    render: function (data, type, row, meta) {
                        return meta.row + meta.settings._iDisplayStart + 1;
                    },
                },
                {
                    targets: 1,
                    render: function (area, type, row) {
                        let geofenceType = '';
                        if (area.includes("CIRCLE")) {
                            geofenceType = '<i class="fad fa-circle fa-5x text-info pb-1"></i>';
                        }
                        if (area.includes("POLYGON")) {
                            geofenceType = '<i class="fad fa-hexagon fa-5x text-info pb-1"></i>';
                        }
                        if (area.includes("LINESTRING")) {
                            geofenceType = '<i class="fad fa-wave-sine fa-5x text-info pb-1"></i>';
                        }
                        let $data = geofenceType + '<br/><div class="btn-group btn-group-sm" role="group" aria-label="Basic example">\n' +
                            '                                        <button type="button" data-toggle="tooltip" data-placement="top" title="<?=lang('assignDevice')?>" data-geofence="' + encodeURIComponent(JSON.stringify(row)) + '" class="btn btn-sm btn-icon btn-info assign-device"><i class="fad fa-tasks"></i></button>\n' +
                            '                                        <button type="button" data-toggle="tooltip" data-placement="top" title="<?=lang('updateGeofence')?>" data-geofence="' + encodeURIComponent(JSON.stringify(row)) + '" class="btn btn-sm btn-icon btn-warning update-geofence"><i class="fad fa-pen-square"></i></button>\n' +
                            '                                        <button type="button" data-toggle="tooltip" data-placement="top" title="<?=lang('deleteGeofence')?>" data-geofence="' + encodeURIComponent(JSON.stringify(row)) + '" class="btn btn-sm btn-icon btn-danger delete-geofence"><i class="fad fa-trash"></i></button>\n' +
                            '                                    </div>';
                        return $data;
                    }
                },
                {
                    targets: 2,
                    render: function (name, type, row) {
                        if(!$.isEmptyObject(name)) {
                            return name;
                        } else {
                            return "-";
                        }
                    }
                },
                {
                    targets: 3,
                    render: function (data, type, row) {
                        if(!$.isEmptyObject(data)) {
                            let attributes = '';
                            $.each(data, function(key,val){
                                if (key === 'speedLimit') {
                                    if (speedUnit === 'kmh') {
                                        var speed = numberFormat.format(convert(val).from('knot').to('km/h'), {
                                            symbol: 'Km/h',
                                            decimal: '.',
                                            thousand: ',',
                                            precision: 2,
                                            format: '%v %s' // %s is the symbol and %v is the value
                                        });
                                        attributes += key + ": " + speed + '<br/>';
                                    } else {
                                        var speed = numberFormat.format(val, {
                                            symbol: 'Kn',
                                            decimal: '.',
                                            thousand: ',',
                                            precision: 2,
                                            format: '%v %s' // %s is the symbol and %v is the value
                                        });
                                        attributes += key + ": " + speed + '<br/>';
                                    }
                                } else if (key === 'polylineDistance') {
                                    if (distanceUnit === 'km') {
                                        var distance = numberFormat.format(convert(val).from('m').to('km'), {
                                            symbol: 'Km',
                                            decimal: '.',
                                            thousand: ',',
                                            precision: 2,
                                            format: '%v %s' // %s is the symbol and %v is the value
                                        });
                                        attributes += key + ": " + distance + '<br/>';
                                        //$('#deviceInfoSpeed').val(device["position"]["speed"] + ' Kn');
                                    } else {
                                        var distance = numberFormat.format(val, {
                                            symbol: 'm',
                                            decimal: '.',
                                            thousand: ',',
                                            precision: 2,
                                            format: '%v %s' // %s is the symbol and %v is the value
                                        });
                                        attributes += key + ": " + distance + '<br/>';
                                    }
                                } else {
                                    if (val) {
                                        attributes += key + ": " + val + '<br/>';
                                    }
                                }
                            });
                            return attributes;
                        } else {
                            return "-";
                        }
                    }
                }
            ]
        });

        let checkDeviceAssign = (deviceId, devices) => {
            let checked = false;
            if (devices.length > 0) {
                $.each(devices, (index, device) => {
                    if (parseInt(deviceId) === parseInt(device.deviceid)) {
                        checked = true;
                        return false;
                    }
                });
            }
            //console.log(checked);
            return checked;
        }

        let assignDeviceModal = $('#assignDeviceModal');
        assignDeviceModal.on('hidden.bs.modal', function () {
            $('#assignDeviceForm .deviceCheckBox').prop("checked", false);
        })
        $('#geofenceTable tbody').on('click', '.assign-device', function () {
            $('#assignDeviceTable tbody').empty();
            let geofence = JSON.parse(decodeURIComponent($(this).attr('data-geofence')));
            $('#assignDeviceModalLabel').text('<?=lang("assignDeviceForGeofence")?> ' + geofence.name);
            $('#assignDeviceForm #geofenceId').val(geofence.id);
            $('#assignDeviceForm .deviceCheckBox').val(geofence.id);
            let formData = new FormData;
            formData.append("geofenceId", geofence.id);
            $.ajax({
                url: '<?=base_url('rest/geofence/get-geofence-permission')?>',
                type: "post",
                data: formData,
                contentType: false,
                cache: false,
                processData: false,
                beforeSend: function () {
                    $('#geofenceTableCard').block({
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
                }
            }).done((res) => {
                $('#geofenceTableCard').unblock();
                if (res.success) {
                    let deviceAll = res.deviceAll;
                    let deviceGeofence = res.deviceGeofence;
                    let counter = 0;
                    let tableRow;
                    if (deviceAll.length > 0) {
                        $.each(deviceAll, (index, device) => {
                            counter++;
                            if (checkDeviceAssign(device.id, deviceGeofence)) {
                                tableRow += '<tr>' +
                                    '<td class="text-right">' + counter + '</td>' +
                                    '<td>' +
                                    '<input type="hidden" id="hidden_device_' + device.id + '" name="hidden_device[' + device.id + ']" value="0">' +
                                    '<div class="custom-control custom-checkbox">\n' +
                                    '                                                                        <input type="checkbox" class="custom-control-input deviceCheckBox" data-geofenceId="' + geofence.id + '" data-deviceId="' + device.id + '" name="device[' + device.id + ']" id="device_' + device.id + '" value="1" checked>\n' +
                                    '                                                                        <label class="custom-control-label" for="device_' + device.id + '">' + device.name + '</label>\n' +
                                    '                                                                    </div></td>' +
                                    '<td>' + device.uniqueId + '</td>' +
                                    '<td>' + device.category + '</td>' +
                                    '</tr>';
                            } else {
                                tableRow += '<tr>' +
                                    '<td class="text-right">' + counter + '</td>' +
                                    '<td>' +
                                    '<input type="hidden" id="hidden_device_' + device.id + '" name="hidden_device[' + device.id + ']" value="0">' +
                                    '<div class="custom-control custom-checkbox">\n' +
                                    '                                                                        <input type="checkbox" class="custom-control-input deviceCheckBox" data-geofenceId="' + geofence.id + '" data-deviceId="' + device.id + '" name="device[' + device.id + ']" id="device_' + device.id + '" value="1">\n' +
                                    '                                                                        <label class="custom-control-label" for="device_' + device.id + '">' + device.name + '</label>\n' +
                                    '                                                                    </div></td>' +
                                    '<td>' + device.uniqueId + '</td>' +
                                    '<td>' + device.category + '</td>' +
                                    '</tr>';
                            }
                        });
                    }
                    $('#assignDeviceTable tbody').append(tableRow);
                    assignDeviceModal.modal('show');
                }
            }).fail((e) => {
                //console.log(e);
                $('#geofenceTableCard').unblock();
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
        $('#assignDeviceTable tbody').on('click', '.deviceCheckBox', function () {
            let value = 0;
            let deviceId = $(this).attr('data-deviceId');
            let geofenceId = $(this).attr('data-geofenceId');
            if ($(this).prop('checked')) {
                value = 1;
            }
            //alert(geofenceId);
            let formData = {
                geofenceId: geofenceId,
                deviceId: deviceId,
                value: value
            };
            $.ajax({
                url: '<?=base_url('rest/geofence/assign-geofence-device')?>',
                method: "POST",
                data: formData,
                dataType: 'json',
                beforeSend: function () {
                    $('#assignDeviceModal').block({
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
                }
            }).done((res) => {
                $('#assignDeviceModal').unblock();
                if (res.success) {

                }
            }).fail((e) => {
                //console.log(e);
                $('#assignDeviceModal').unblock();
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
                });;
        });

        $('#geofenceTable tbody').on('click', '.update-geofence', function () {
            let geofence = JSON.parse(decodeURIComponent($(this).attr('data-geofence')));
            //console.log(user);
            document.location.href = '<?=base_url('panel/update-geofence/')?>' + geofence.id;
        });
        $('#geofenceTable tbody').on('click', '.delete-geofence', function () {
            let geofence = JSON.parse(decodeURIComponent($(this).attr('data-geofence')));
            //console.log(user);
            let formData = new FormData;
            formData.append("id", geofence.id);
            Swal.fire({
                title: "<?=lang("deleteGeofenceTitle")?> " + geofence.name + "?",
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
                        url: '<?=base_url('rest/setting/delete-geofence')?>',
                        type: "post",
                        data: formData,
                        contentType: false,
                        cache: false,
                        processData: false,
                        success: function (res) {
                            if (res.success) {
                                geofenceTable.ajax.reload();
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
                } else if (result.dismiss === Swal.DismissReason.cancel) {
                    /*Swal.fire({
                        title: 'Cancelled',
                        text: 'Your imaginary file is safe :)',
                        type: 'error',
                        confirmButtonClass: 'btn btn-success',
                    })*/
                }
            })

        });
    });
</script>
</body>
<!-- END: Body-->

</html>
