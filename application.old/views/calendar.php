<!DOCTYPE html>
<html class="loading" lang="<?= $html_lang ?>" data-textdirection="ltr">
<!-- BEGIN: Head-->

<head>
    <?php $this->load->view('include/css'); ?>
    <style>
        .box{
            display: none;
        }
    </style>
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
                <h3 class="content-header-title"><?= lang('calendar') ?></h3>
            </div>
            <div class="content-header-right breadcrumbs-right col-md-6 col-12 d-none d-md-block">
                <div class="breadcrumb-wrapper">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item pl-0"><a href="<?= base_url('panel/map') ?>"><?= lang('map') ?></a>
                        </li>
                        <li class="breadcrumb-item pl-0"><a href="#"><?= lang('settings') ?></a></li>
                        <li class="breadcrumb-item pl-0 active"><?= lang('calendar') ?></li>
                    </ol>
                </div>
            </div>
        </div>
        <div class="content-body">
            <!-- Description -->
            <section id="geofenceTableCard" class="card mb-5">
                <div class="card-content collapse show">
                    <div class="card-header">
                        <h4 class="card-title" id=""><?= lang('calendar') ?></h4>
                        <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                        <div class="heading-elements">
                            <button type="button" class="btn btn-icon btn-info" id="addCalendarButton" data-toggle="modal" data-target="#addeventmodal">
                                <i class="fad fa-calendar-plus white"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        <div id='calendarDiv'></div>
                    </div>
                </div>
            </section>
            <!--/ Description -->
            <div class="modal fade" id="addeventmodal" tabindex="-1" role="dialog">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">

                        <div class="modal-header">
                            <h5 class="modal-title"><?=lang('addCalendar')?></h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>

                        <div class="modal-body">

                            <div class="container-fluid">

                                <form id="createEvent" class="form-horizontal">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div id="title-group" class="form-group">
                                                <label class="control-label" for="title"><?=lang('title')?></label>
                                                <input type="text" class="form-control" id="title" name="title" placeholder="<?=lang('title')?>">
                                                <!-- errors will go here -->
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="dateStart"><?=lang('dateStart')?></label>
                                                <input type="text" id="dateStart" name="dateStart" class="form-control"
                                                       readonly="readonly" data-translate="start_date" placeholder="<?=lang('dateStart')?>">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="dateEnd"><?=lang('dateEnd')?></label>
                                                <input type="text" id="dateEnd" name="dateEnd" class="form-control"
                                                       readonly="readonly" data-translate="start_date" placeholder="<?=lang('dateEnd')?>">
                                            </div>
                                        </div>
                                    </div>
                                    <h4 class="form-section"><i class="fad fa-repeat"></i> <?=lang('repeat_options')?></h4>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <fieldset class="radio">
                                                <label>
                                                    <input type="radio" name="repeat_options" id="one_time" value="one_time" checked>
                                                    <?=lang('one_time')?>
                                                </label>
                                            </fieldset>
                                            <fieldset class="radio">
                                                <label>
                                                    <input type="radio" name="repeat_options" id="n_days" value="n_days">
                                                    <?=lang('n_days')?>
                                                </label>
                                            </fieldset>
                                            <fieldset class="radio">
                                                <label>
                                                    <input type="radio" name="repeat_options" id="until_date" value="until_date">
                                                    <?=lang('until_date')?>
                                                </label>
                                            </fieldset>
                                            <fieldset class="radio">
                                                <label>
                                                    <input type="radio" name="repeat_options" id="daily" value="daily">
                                                    <?=lang('daily')?>
                                                </label>
                                            </fieldset>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group box n_days">
                                                <label class="control-label" for="n_days_value"><?=lang('number_of_days')?></label>
                                                <input type="text" class="form-control" id="n_days_value" name="n_days_value" placeholder="<?=lang('number_of_days')?>">
                                                <!-- errors will go here -->
                                            </div>
                                            <div class="form-group box until_date">
                                                <label for="untilDate"><?=lang('untilDate')?></label>
                                                <input type="text" id="untilDate" name="untilDate" class="form-control"
                                                       readonly="readonly" data-translate="start_date" placeholder="<?=lang('untilDate')?>">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div id="backgroundColorGroup" class="form-group">
                                                <label class="control-label" for="backgroundColor"><?=lang('backgroundColor')?></label>
                                                <input type="text" id="backgroundColor" name="backgroundColor" class="form-control minicolors" data-control="hue" autocomplete="off">
                                                <!-- errors will go here -->
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div id="title-group" class="form-group">
                                                <label class="control-label" for="textColor"><?=lang('textColor')?></label>
                                                <input type="text" id="textColor" name="textColor" class="form-control minicolors" data-control="hue" autocomplete="off">
                                            </div>
                                        </div>
                                    </div>
                            </div>

                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-outline-secondary" data-dismiss="modal"><?=lang('close')?></button>
                            <button type="submit" class="btn btn-outline-info"><?=lang('save')?></button>
                        </div>
                        </form>

                    </div><!-- /.modal-content -->
                </div><!-- /.modal-dialog -->
            </div>
            <div class="modal fade" id="updateeventmodal" tabindex="-1" role="dialog">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">

                        <div class="modal-header">
                            <h5 class="modal-title"><?=lang('updateCalendar')?></h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>

                        <div class="modal-body">

                            <div class="container-fluid">

                                <form id="updateEvent" class="form-horizontal">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div id="title-group" class="form-group">
                                                <label class="control-label" for="titleUpdate"><?=lang('title')?></label>
                                                <input type="hidden" class="form-control" id="id" name="id">
                                                <input type="text" class="form-control" id="titleUpdate" name="titleUpdate">
                                                <!-- errors will go here -->
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="dateStartUpdate"><?=lang('dateStart')?></label>
                                                <input type="text" id="dateStartUpdate" name="dateStartUpdate" class="form-control"
                                                       readonly="readonly" data-translate="start_date" placeholder="<?=lang('dateStart')?>">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="dateEndUpdate"><?=lang('dateEnd')?></label>
                                                <input type="text" id="dateEndUpdate" name="dateEndUpdate" class="form-control"
                                                       readonly="readonly" data-translate="start_date" placeholder="<?=lang('dateEnd')?>">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div id="backgroundColorGroup" class="form-group">
                                                <label class="control-label" for="backgroundColorUpdate"><?=lang('backgroundColor')?></label>
                                                <input type="text" id="backgroundColorUpdate" name="backgroundColorUpdate" class="form-control" data-control="hue" autocomplete="off">
                                                <!-- errors will go here -->
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div id="title-group" class="form-group">
                                                <label class="control-label" for="textColorUpdate"><?=lang('textColor')?></label>
                                                <input type="text" id="textColorUpdate" name="textColorUpdate" class="form-control" data-control="hue" autocomplete="off">
                                            </div>
                                        </div>
                                    </div>
                            </div>

                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-outline-secondary" data-dismiss="modal"><?=lang('close')?></button>
                            <button type="submit" class="btn btn-outline-info"><?=lang('save')?></button>
                            <button type="button" class="btn btn-danger" id="deleteEvent" data-id><?=lang('delete')?></button>
                        </div>
                        </form>

                    </div><!-- /.modal-content -->
                </div><!-- /.modal-dialog -->
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
        $('input[name="repeat_options"]').click(function(){
            var inputValue = $(this).attr("value");
            var targetBox = $("." + inputValue);
            $(".box").not(targetBox).hide();
            $(targetBox).show();
        });
        $('.minicolors').minicolors({
            control: $(this).attr('data-control') || 'hue',
            defaultValue: $(this).attr('data-defaultValue') || geofence.attributes.color,
            format: $(this).attr('data-format') || 'hex',
            keywords: $(this).attr('data-keywords') || '',
            inline: $(this).attr('data-inline') === 'true',
            letterCase: $(this).attr('data-letterCase') || 'lowercase',
            opacity: $(this).attr('data-opacity'),
            position: $(this).attr('data-position') || 'bottom left',
            swatches: $(this).attr('data-swatches') ? $(this).attr('data-swatches').split('|') : [],
            change: function(value, opacity) {
                if( !value ) return;
                if( opacity ) value += ', ' + opacity;
            },
            theme: 'bootstrap'
        });
        let calendarE8 = document.getElementById('calendarDiv');
        let fcJson = new FullCalendar.Calendar(calendarE8, {
            header: {
                left: 'prev,next today',
                center: 'title',
                right: "dayGridMonth,timeGridWeek,timeGridDay",
            },
            //defaultDate: '2016-06-12',
            editable: true,
            plugins: ["dayGrid", "timeGrid", "interaction"],
            eventLimit: true, // allow "more" link when too many events
            events: function(info, successCallback, failureCallback) {
                $.ajax({
                    url: '<?=base_url('rest/calendar/get-calendar')?>',
                    method: "POST",
                    data: null,
                    beforeSend: function () {
                        $('#calendarDiv').block({
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
                        let events = [];
                        $.each(res.calendars, function (index, calendars) {
                            //let jcalData = ICAL.parse(calData.icsData);
                            //console.log(atob(calData.data));
                            let jcalData = ICAL.parse(atob(calendars.data));
                            //console.log(jcalData);
                            let vcalendar = new ICAL.Component(jcalData);
                            let vevent = vcalendar.getFirstSubcomponent('vevent');
                            let event = new ICAL.Event(vevent);
                            //console.log(event);
                            //console.log(event.getRecurrenceTypes());
                            if (event.isRecurring()) {
                                let recur = new ICAL.Recur(vevent);
                                let recurJSON = recur.toJSON();
                                let rrule = recurJSON[1][6];
                                console.log(rrule);
                                if (rrule[3].count) {
                                    console.log(rrule[3]);
                                    for(let i = 1; i<=rrule[3].count;i++) {
                                        events.push({
                                            "id":  calendars.id+i,
                                            "rid": calendars.id,
                                            "title":  event.description,
                                            "start":  event.startDate.toJSDate() +1,
                                            "end":  event.endDate.toJSDate() + 1,
                                            "backgroundColor": calendars.attributes.backgroundColor,
                                            "borderColor": calendars.attributes.backgroundColor,
                                            "textColor": calendars.attributes.textColor,
                                        });
                                    }
                                }
                                //console.log(recur.toJSON());
                            } else {
                                events.push({
                                    "id":  calendars.id,
                                    "rid": calendars.id,
                                    "title":  event.description,
                                    "start":  event.startDate.toJSDate(),
                                    "end":  event.endDate.toJSDate(),
                                    "backgroundColor": calendars.attributes.backgroundColor,
                                    "borderColor": calendars.attributes.backgroundColor,
                                    "textColor": calendars.attributes.textColor,
                                });
                            }
                            console.log(events);
                        });
                        $('#calendarDiv').unblock();
                        successCallback(events)
                    },
                    error: function (ajaxResponse) {
                        $('#calendarDiv').unblock();
                        Swal.fire({
                            title: "Error!",
                            text: ajaxResponse.responseJSON.reason,
                            type: "error",
                            confirmButtonClass: 'btn btn-info',
                            buttonsStyling: false,
                        });
                        failureCallback(ajaxResponse)
                    }
                });
            },
            eventDrop: function(arg) {
                let calendarEvent = [
                    'BEGIN:VCALENDAR',
                    'PRODID:Calendar',
                    'VERSION:2.0',
                    'BEGIN:VEVENT',
                    'UID:0@default',
                    'CLASS:PUBLIC',
                    'DESCRIPTION:' + arg.event.title,
                    'DTSTAMP;VALUE=DATE-TIME:' + moment(arg.event.stamp).format('YYYYMMDDTHHmmss'),
                    'DTSTART;VALUE=DATE-TIME:' + moment(arg.event.start).format('YYYYMMDDTHHmmss'),
                    'DTEND;VALUE=DATE-TIME:' + moment(arg.event.end).format('YYYYMMDDTHHmmss'),
                    'SUMMARY;LANGUAGE=en-us:' + arg.event.title,
                    'TRANSP:TRANSPARENT',
                    'END:VEVENT',
                    'END:VCALENDAR'
                ].join("\r\n");
                let formData = {
                    id: arg.event.id,
                    name: arg.event.title,
                    data: btoa(calendarEvent),
                    attributes: {backgroundColor:arg.event.backgroundColor, textColor:arg.event.textColor}
                };
                $.ajax({
                    url         : "<?=base_url('api/update-calendar')?>",
                    type:"POST",
                    data:formData,
                });
            },
            eventResize: function(arg) {
                let calendarEvent = [
                    'BEGIN:VCALENDAR',
                    'PRODID:Calendar',
                    'VERSION:2.0',
                    'BEGIN:VEVENT',
                    'UID:0@default',
                    'CLASS:PUBLIC',
                    'DESCRIPTION:' + arg.event.title,
                    'DTSTAMP;VALUE=DATE-TIME:' + moment(arg.event.stamp).format('YYYYMMDDTHHmmss'),
                    'DTSTART;VALUE=DATE-TIME:' + moment(arg.event.start).format('YYYYMMDDTHHmmss'),
                    'DTEND;VALUE=DATE-TIME:' + moment(arg.event.end).format('YYYYMMDDTHHmmss'),
                    'SUMMARY;LANGUAGE=en-us:' + arg.event.title,
                    'TRANSP:TRANSPARENT',
                    'END:VEVENT',
                    'END:VCALENDAR'
                ].join("\r\n");
                let formData = {
                    id: arg.event.id,
                    name: arg.event.title,
                    data: btoa(calendarEvent),
                    attributes: {backgroundColor:arg.event.backgroundColor, textColor:arg.event.textColor}
                };
                $.ajax({
                    url         : "<?=base_url('api/update-calendar')?>",
                    type:"POST",
                    data:formData,
                });
            },
            eventClick: function(arg) {
                var id = arg.event.id;

                $('#id').val(id);
                $('#deleteEvent').attr('data-id', id);
                $('#titleUpdate').val(arg.event.title);
                $('#dateStartUpdate').val(moment(arg.event.start).format('DD/MM/YYYY HH:mm:ss'));
                $('#dateEndUpdate').val(moment(arg.event.end).format('DD/MM/YYYY HH:mm:ss'));
                $('#backgroundColorUpdate').val(arg.event.backgroundColor);
                $('#backgroundColorUpdate').minicolors({
                    control: $(this).attr('data-control') || 'hue',
                    defaultValue: $(this).attr('data-defaultValue') || arg.event.backgroundColor,
                    format: $(this).attr('data-format') || 'hex',
                    keywords: $(this).attr('data-keywords') || '',
                    inline: $(this).attr('data-inline') === 'true',
                    letterCase: $(this).attr('data-letterCase') || 'lowercase',
                    opacity: $(this).attr('data-opacity'),
                    position: $(this).attr('data-position') || 'bottom left',
                    swatches: $(this).attr('data-swatches') ? $(this).attr('data-swatches').split('|') : [],
                    change: function(value, opacity) {
                        if( !value ) return;
                        if( opacity ) value += ', ' + opacity;
                    },
                    theme: 'bootstrap'
                });
                $('#textColorUpdate').val(arg.event.textColor);
                $('#textColorUpdate').minicolors({
                    control: $(this).attr('data-control') || 'hue',
                    defaultValue: $(this).attr('data-defaultValue') || arg.event.textColor,
                    format: $(this).attr('data-format') || 'hex',
                    keywords: $(this).attr('data-keywords') || '',
                    inline: $(this).attr('data-inline') === 'true',
                    letterCase: $(this).attr('data-letterCase') || 'lowercase',
                    opacity: $(this).attr('data-opacity'),
                    position: $(this).attr('data-position') || 'bottom left',
                    swatches: $(this).attr('data-swatches') ? $(this).attr('data-swatches').split('|') : [],
                    change: function(value, opacity) {
                        if( !value ) return;
                        if( opacity ) value += ', ' + opacity;
                    },
                    theme: 'bootstrap'
                });
                /*let formData = {
                    id: arg.event.id,
                    name: arg.event.title,
                    data: btoa(calendarEvent),
                    attributes: {backgroundColor:arg.event.backgroundColor, textColor:arg.event.backgroundColor}
                };*/
                $('#updateeventmodal').modal('show');
                fcJson.refetchEvents();
            }
            //events: getEvents()
            /*events: [
                {
                    title: 'Meeting',
                    start: '2020-09-01T10:30:00',
                    end: '2020-09-20T12:30:00'
                }
            ]*/
        });
        fcJson.setOption('locale', '<?=lang("locale")?>');
        fcJson.render();

        $("#untilDate").AnyPicker({
            mode: "datetime",
            dateTimeFormat: "dd MMM yyyy HH:mm",
            inputDateTimeFormat: "dd/MM/yyyy HH:mm",
            rowsNavigation: "scroller+buttons",
            lang: $('html')[0].lang,
            headerTitle:
                {
                    markup: "<span class='ap-header__title'><?=lang('until_date')?></span>",
                    type: "Text",
                    contentBehaviour: "Dynamic", // Static or Dynamic
                    format: "dd MMM yyyy HH:mm" // DateTime Format
                },
        });
        $("#dateStart").AnyPicker({
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

        $("#dateEnd").AnyPicker({
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

        $("#dateStartUpdate").AnyPicker({
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

        $("#dateEndUpdate").AnyPicker({
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

        $('#createEvent').submit(function(event) {

            // stop the form refreshing the page
            event.preventDefault();

            $('.form-group').removeClass('has-error'); // remove the error class
            $('.help-block').remove(); // remove the error text

            const startDate = moment($('#dateStart').val(), 'DD/MM/YYYY HH:mm:ss').toDate();
            const endDate = moment($('#dateEnd').val(), 'DD/MM/YYYY HH:mm:ss').toDate();
            let calendarEvent;
            if($('#one_time').is(':checked')) {
                calendarEvent = [
                    'BEGIN:VCALENDAR',
                    'PRODID:Calendar',
                    'VERSION:2.0',
                    'BEGIN:VEVENT',
                    'UID:0@default',
                    'CLASS:PUBLIC',
                    'DESCRIPTION:' + $('#createEvent #title').val(),
                    'DTSTAMP;VALUE=DATE-TIME:' + moment(new Date()).format('YYYYMMDDTHHmmss'),
                    'DTSTART;VALUE=DATE-TIME:' + moment(startDate).format('YYYYMMDDTHHmmss'),
                    'DTEND;VALUE=DATE-TIME:' + moment(endDate).format('YYYYMMDDTHHmmss'),
                    'SUMMARY;LANGUAGE=en-us:' + $('#createEvent #title').val(),
                    'TRANSP:TRANSPARENT',
                    'END:VEVENT',
                    'END:VCALENDAR'
                ].join("\r\n");
            } else if($('#n_days').is(':checked')) {
                calendarEvent = [
                    'BEGIN:VCALENDAR',
                    'PRODID:Calendar',
                    'VERSION:2.0',
                    'BEGIN:VEVENT',
                    'UID:0@default',
                    'CLASS:PUBLIC',
                    'DESCRIPTION:' + $('#createEvent #title').val(),
                    'DTSTAMP;VALUE=DATE-TIME:' + moment(new Date()).format('YYYYMMDDTHHmmss'),
                    'DTSTART;VALUE=DATE-TIME:' + moment(startDate).format('YYYYMMDDTHHmmss'),
                    'DTEND;VALUE=DATE-TIME:' + moment(endDate).format('YYYYMMDDTHHmmss'),
                    'RRULE:FREQ=DAILY;COUNT=' + $('#n_days_value').val(),
                    'SUMMARY;LANGUAGE=en-us:' + $('#createEvent #title').val(),
                    'TRANSP:TRANSPARENT',
                    'END:VEVENT',
                    'END:VCALENDAR'
                ].join("\r\n");
            } else if($('#until_date').is(':checked')) {
                const untilDate = moment($('#untilDate').val(), 'DD/MM/YYYY HH:mm:ss').toDate();
                calendarEvent = [
                    'BEGIN:VCALENDAR',
                    'PRODID:Calendar',
                    'VERSION:2.0',
                    'BEGIN:VEVENT',
                    'UID:0@default',
                    'CLASS:PUBLIC',
                    'DESCRIPTION:' + $('#createEvent #title').val(),
                    'DTSTAMP;VALUE=DATE-TIME:' + moment(new Date()).format('YYYYMMDDTHHmmss'),
                    'DTSTART;VALUE=DATE-TIME:' + moment(startDate).format('YYYYMMDDTHHmmss'),
                    'DTEND;VALUE=DATE-TIME:' + moment(endDate).format('YYYYMMDDTHHmmss'),
                    'RRULE:FREQ=DAILY;UNTIL=' + moment(untilDate).format('YYYYMMDDTHHmmss'),
                    'SUMMARY;LANGUAGE=en-us:' + $('#createEvent #title').val(),
                    'TRANSP:TRANSPARENT',
                    'END:VEVENT',
                    'END:VCALENDAR'
                ].join("\r\n");
            } else {
                calendarEvent = [
                    'BEGIN:VCALENDAR',
                    'PRODID:Calendar',
                    'VERSION:2.0',
                    'BEGIN:VEVENT',
                    'UID:0@default',
                    'CLASS:PUBLIC',
                    'DESCRIPTION:' + $('#createEvent #title').val(),
                    'DTSTAMP;VALUE=DATE-TIME:' + moment(new Date()).format('YYYYMMDDTHHmmss'),
                    'DTSTART;VALUE=DATE-TIME:' + moment(startDate).format('YYYYMMDDTHHmmss'),
                    'DTEND;VALUE=DATE-TIME:' + moment(endDate).format('YYYYMMDDTHHmmss'),
                    'RRULE:FREQ=DAILY;INTERVAL=1',
                    'SUMMARY;LANGUAGE=en-us:' + $('#createEvent #title').val(),
                    'TRANSP:TRANSPARENT',
                    'END:VEVENT',
                    'END:VCALENDAR'
                ].join("\r\n");
            }

            let formData = {
                name: $('#createEvent #title').val(),
                data: btoa(calendarEvent),
                attributes: {backgroundColor:$('#createEvent #backgroundColor').val(), textColor:$('#createEvent #textColor').val()}
            };

            // process the form
            $.ajax({
                type        : "POST",
                url         : "<?=base_url('rest/calendar/create-calendar')?>",
                data        : formData,
                dataType    : 'json',
                encode      : true
            }).done(function(data) {

                // insert worked
                if (data.success) {

                    //remove any form data
                    $('#createEvent').trigger("reset");

                    //close model
                    $('#addeventmodal').modal('hide');

                    //refresh calendar
                    fcJson.refetchEvents();

                } else {

                    //if error exists update html
                    if (data.errors.date) {
                        $('#date-group').addClass('has-error');
                        $('#date-group').append('<div class="help-block">' + data.errors.date + '</div>');
                    }

                    if (data.errors.title) {
                        $('#title-group').addClass('has-error');
                        $('#title-group').append('<div class="help-block">' + data.errors.title + '</div>');
                    }

                }

            });
        });
        $('#updateEvent').submit(function(event) {

            // stop the form refreshing the page
            event.preventDefault();

            $('.form-group').removeClass('has-error'); // remove the error class
            $('.help-block').remove(); // remove the error text

            const startDate = moment($('#dateStartUpdate').val(), 'DD/MM/YYYY HH:mm:ss').toDate();
            const endDate = moment($('#dateEndUpdate').val(), 'DD/MM/YYYY HH:mm:ss').toDate();
            let calendarEvent = [
                'BEGIN:VCALENDAR',
                'PRODID:Calendar',
                'VERSION:2.0',
                'BEGIN:VEVENT',
                'UID:0@default',
                'CLASS:PUBLIC',
                'DESCRIPTION:' + $('#updateEvent #titleUpdate').val(),
                'DTSTAMP;VALUE=DATE-TIME:' + moment(new Date()).format('YYYYMMDDTHHmmss'),
                'DTSTART;VALUE=DATE-TIME:' + moment(startDate).format('YYYYMMDDTHHmmss'),
                'DTEND;VALUE=DATE-TIME:' + moment(endDate).format('YYYYMMDDTHHmmss'),
                'SUMMARY;LANGUAGE=en-us:' + $('#updateEvent #titleUpdate').val(),
                'TRANSP:TRANSPARENT',
                'END:VEVENT',
                'END:VCALENDAR'
            ].join("\r\n");
            let formData = {
                id: $('#updateEvent #id').val(),
                name: $('#updateEvent #titleUpdate').val(),
                data: btoa(calendarEvent),
                attributes: {backgroundColor:$('#updateEvent #backgroundColorUpdate').val(), textColor:$('#updateEvent #textColorUpdate').val()}
            };

            // process the form
            $.ajax({
                type        : "POST",
                url         : "<?=base_url('rest/calendar/update-calendar')?>",
                data        : formData,
                dataType    : 'json',
                encode      : true
            }).done(function(data) {

                // insert worked
                if (data.success) {

                    //remove any form data
                    $('#updateEvent').trigger("reset");

                    //close model
                    $('#updateeventmodal').modal('hide');

                    //refresh calendar
                    fcJson.refetchEvents();

                } else {

                    //if error exists update html
                    if (data.errors.date) {
                        $('#date-group').addClass('has-error');
                        $('#date-group').append('<div class="help-block">' + data.errors.date + '</div>');
                    }

                    if (data.errors.title) {
                        $('#title-group').addClass('has-error');
                        $('#title-group').append('<div class="help-block">' + data.errors.title + '</div>');
                    }

                }

            });
        });
        $('body').on('click', '#deleteEvent', function() {
            let id = $(this).attr('data-id');
            if(confirm("<?=lang('deleteEventConfirm')?>")) {
                $.ajax({
                    url         : "<?=base_url('rest/calendar/delete-calendar')?>",
                    type:"POST",
                    data:{id:id},
                });

                //close model
                $('#updateeventmodal').modal('hide');

                //refresh calendar
                fcJson.refetchEvents();
                document.location.reload();
            }
        });
    });
</script>
</body>
<!-- END: Body-->

</html>
