<!DOCTYPE html>
<html class="loading" lang="<?= lang('Text.lang') ?>" data-textdirection="ltr">
<!-- BEGIN: Head-->

<head>
    <?= view('include/head'); ?>
</head>
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
                <h3 class="content-header-title"><?= lang('Text.users') ?></h3>
            </div>
            <div class="content-header-right breadcrumbs-right col-md-6 col-12 d-none d-md-block">
                <div class="breadcrumb-wrapper">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item pl-0"><a href="<?= base_url('panel/map') ?>"><?= lang('Text.map') ?></a>
                        </li>
                        <li class="breadcrumb-item pl-0"><a href="#"><?= lang('Text.settings') ?></a></li>
                        <li class="breadcrumb-item pl-0 active"><?= lang('Text.users') ?></li>
                    </ol>
                </div>
            </div>
        </div>
        <div class="content-body">
            <!-- Description -->
            <section id="userTableCard" class="card mb-5">
                <div class="card-content collapse show">
                    <div class="card-header">
                        <h4 class="card-title" id=""><?= lang('Text.userList') ?></h4>
                        <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                        <div class="heading-elements">
                            <button type="button" class="btn btn-icon btn-info" id="addUserButton">
                                <i class="fad fa-user-plus white"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body pb-0">
                        <table class="table table-bordered" id="userTable"
                               style="width:100% !important;">
                            <thead>
                            <tr>
                                <th class="text-center">#</th>
                                <th class="text-center"><?=lang('Text.email')?></th>
                                <th class="text-center"><?=lang('Text.name')?></th>
                                <th class="text-center"><?=lang('Text.phone')?></th>
                                <th class="text-center"><?=lang('Text.latitude')?></th>
                                <th class="text-center"><?=lang('Text.longitude')?></th>
                                <th class="text-center"><?=lang('Text.administrator')?></th>
                                <th class="text-center"><?=lang('Text.disabled')?></th>
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
                                <h4 class="modal-title" id="assignDeviceModalLabel"><?=lang('Text.assignDevice')?></h4>
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
                                        <th><?=lang('Text.deviceName')?></th>
                                        <th><?=lang('Text.deviceUniqueId')?></th>
                                        <th><?=lang('Text.deviceCategory')?></th>
                                    </tr>
                                    </thead>
                                    <tbody></tbody>
                                </table>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn grey btn-outline-secondary" data-dismiss="modal">
                                    <?=lang('Text.close')?>
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
        $('#addUserButton').on('click', function () {
            document.location.href = '<?=base_url('panel/create-user')?>';
            //initAdd();
        })
        let headers = {
            'Authorization': 'Basic ' + '<?=$btoa?>',
            'content-type': 'application/x-www-form-urlencoded'
        };
        let userTable = $('#userTable').DataTable({
            language: {
                "emptyTable": "<?=lang('Text.emptyTable')?>",
                "info": "<?=lang('Text.showing')?> _START_ <?=lang('Text.to')?> _END_ <?=lang('Text.of')?> _TOTAL_ <?=lang('Text.entries')?>",
                "infoEmpty": "<?=lang('Text.showing')?> 0 <?=lang('Text.to')?> 0 <?=lang('Text.of')?> 0 <?=lang('Text.entries')?>",
                "infoFiltered": "(<?=lang('Text.filteredFrom')?> _MAX_ <?=lang('Text.totalEntries')?>)",
                "lengthMenu": "<?=lang('Text.show')?> _MENU_ <?=lang('Text.entries')?>",
                "loadingRecords": "<?=lang('Text.loadingRecords')?>",
                "processing": "<?=lang('Text.processing')?>",
                "search": "<?=lang('Text.search')?>",
                "zeroRecords": "<?=lang('Text.zeroRecords')?>",
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
                "url": '<?=base_url('rest/setting/user-list')?>',
                "type": "POST",
                "headers": headers,
                "dataSrc": function (json) {
                    return json.data;
                }
            },
            "fnInitComplete": function (oSettings) {
                $('[data-toggle="tooltip"]').tooltip();
            },
            "sAjaxDataProp": "data",
            "columns": [
                {data: null, className: "text-right"},
                {data: "email", className: ""},
                {data: "name", className: ""},
                {data: "phone", className: ""},
                {data: "latitude", className: "text-right"},
                {data: "longitude", className: "text-right"},
                {data: "administrator", className: ""},
                {data: "disabled", className: ""},
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
                    render: function (data, type, row) {
                        let $data = data + '<br/><div class="btn-group btn-group-sm" role="group" aria-label="Basic example">\n' +
                            '                                        <button type="button" data-toggle="tooltip" data-placement="top" title="<?=lang('Text.assignDevice')?>" data-user="' + encodeURIComponent(JSON.stringify(row)) + '" class="btn btn-sm btn-icon btn-info assign-device"><i class="fad fa-tasks"></i></button>\n' +
                            '                                        <button type="button" data-toggle="tooltip" data-placement="top" title="<?=lang('Text.updateUser')?>" data-user="' + encodeURIComponent(JSON.stringify(row)) + '" class="btn btn-sm btn-icon btn-warning update-user"><i class="fad fa-pen-square"></i></button>\n' +
                            '                                        <button type="button" data-toggle="tooltip" data-placement="top" title="<?=lang('Text.deleteUser')?>" data-user="' + encodeURIComponent(JSON.stringify(row)) + '" class="btn btn-sm btn-icon btn-danger delete-user"><i class="fad fa-trash"></i></button>\n' +
                            '                                    </div>';
                        return $data;
                    }
                }, {
                    targets: 6,
                    render: function (data, type, row) {
                        if (data) {
                            return "<?=lang('Text.yes')?>";
                        } else {
                            return "<?=lang('Text.no')?>";
                        }
                    }
                }, {
                    targets: 7,
                    render: function (data, type, row) {
                        if (data) {
                            return "<?=lang('Text.yes')?>";
                        } else {
                            return "<?=lang('Text.no')?>";
                        }
                    }
                }
            ]
        });

        let checkDeviceAssign = (deviceId, devices) => {
            let checked = false;
            if (devices.length > 0) {
                $.each(devices, (index, device) => {
                    if (deviceId === device.id) {
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
        $('#userTable tbody').on('click', '.assign-device', function () {
            $('#assignDeviceTable tbody').empty();
            let user = JSON.parse(decodeURIComponent($(this).attr('data-user')));
            $('#assignDeviceModalLabel').text('<?=lang("Text.assignDeviceForUser")?> ' + user.name);
            $('#assignDeviceForm #userId').val(user.id);
            $('#assignDeviceForm .deviceCheckBox').val(user.id);
            const params = new URLSearchParams();
            params.append("id", user.id);
            let callback = (data) => {
                if (data.success) {
                    let deviceAll = data.deviceAll;
                    let deviceUser = data.deviceUser;
                    let counter = 0;
                    let tableRow;
                    if (deviceAll.length > 0) {
                        $.each(deviceAll, (index, device) => {
                            counter++;
                            if (checkDeviceAssign(device.id, deviceUser)) {
                                tableRow += '<tr>' +
                                    '<td class="text-right">' + counter + '</td>' +
                                    '<td>' +
                                    '<input type="hidden" id="hidden_device_' + device.id + '" name="hidden_device[' + device.id + ']" value="0">' +
                                    '<div class="custom-control custom-checkbox">\n' +
                                    '                                                                        <input type="checkbox" class="custom-control-input deviceCheckBox" data-userId="' + user.id + '" data-deviceId="' + device.id + '" name="device[' + device.id + ']" id="device_' + device.id + '" value="1" checked>\n' +
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
                                    '                                                                        <input type="checkbox" class="custom-control-input deviceCheckBox" data-userId="' + user.id + '" data-deviceId="' + device.id + '" name="device[' + device.id + ']" id="device_' + device.id + '" value="1">\n' +
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
            };
            $.axiosPost("<?=base_url('rest/device/get-device-permission')?>", headers, params, $('#userTableCard'), callback);
        });
        $('#assignDeviceTable tbody').on('click', '.deviceCheckBox', function () {
            let value = "0";
            let deviceId = $(this).attr('data-deviceId');
            let userId = $(this).attr('data-userId');
            if ($(this).prop('checked')) {
                value = "1";
            }
            const params = new URLSearchParams();
            params.append("userId", userId);
            params.append("deviceId", deviceId);
            params.append("value", value);

            let callback = (data) => {

            };
            $.axiosPost("<?=base_url('rest/device/assign-user-device')?>", headers, params, $('#assignDeviceModal'), callback);
        });

        $('#userTable tbody').on('click', '.update-user', function () {
            let user = JSON.parse(decodeURIComponent($(this).attr('data-user')));
            //console.log(user);
            document.location.href = '<?=base_url('panel/update-user')?>/' + user.id;
        });
        $('#userTable tbody').on('click', '.delete-user', function () {
            let user = JSON.parse(decodeURIComponent($(this).attr('data-user')));
            const params = new URLSearchParams();
            params.append("id", user.id);
            Swal.fire({
                title: '<?=lang("Text.deleteUserTitle")?> ' + user.name + '?',
                text: "<?=lang('Text.deleteText')?>",
                type: 'warning',
                showCancelButton: true,
                confirmButtonText: "<?=lang('Text.deleteConfirm')?>",
                confirmButtonClass: 'btn btn-danger',
                cancelButtonClass: 'btn btn-secondary ml-1',
                buttonsStyling: false,
            }).then(function (result) {
                if (result.value) {
                    let callback = (data) => {
                        userTable.ajax.reload();
                    };
                    $.axiosPost("<?=base_url('rest/setting/delete-user')?>", headers, params, $('#userTableCard'), callback);
                }
            })

        });
    });
</script>
</body>
<!-- END: Body-->

</html>
