@extends('admin.app')
@section('content')
<div class="page-title">
    <div class="title-env">
        <h1 class="title">
            <i class="fa fa-calendar"></i>
            Calendar
        </h1>
        <p class="description">Events management calendar</p>
    </div>
    <div class="breadcrumb-env">
        <ol class="breadcrumb bc-1">
            <li>
                <a href="{{ cms_url('/') }}"><i class="fa fa-dashboard"></i>Dashboard</a>
            </li>
            <li class="active">
                <i class="fa fa-calendar"></i>
                <strong>Calendar</strong>
            </li>
        </ol>
    </div>
</div>
<section class="calendar-env">
    <div class="col-sm-9 calendar-right">
        <div class="calendar-main">
            <div id="calendar"></div>
        </div>
    </div>
    <div class="col-sm-3 calendar-left">
        <div class="calendar-sidebar">
            <form method="post" id="add-calendar-event">
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Add new event..." />
                    <div class="input-group-btn">
                        <button type="submit" class="btn btn-secondary">{{trans('general.create')}}</button>
                    </div>
                </div>
            </form>
            <ul class="list-unstyled calendar-list" id="events-list">
                <li class="list-header">Drago to the calendar</li>
            @foreach ($items as $item)
                <li id="event{{$item->id}}">
                    <a href="#" data-event-class="event-color-{{$item->color}}" data-color="{{$item->color}}" data-id="{{$item->id}}">
                        <span class="title badge badge-{{$item->color}} badge-roundless">{{$item->title}}</span>
                        <span class="description hidden">{{$item->description}}</span>
                    </a>
                </li>
            @endforeach
            </ul>
        </div>
    </div>
</section>
<div id="event-modal" class="modal fade" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <form action="{{cms_route('calendar.save')}}" method="post" id="event-form" class="{{$cmsSettings->get('ajax_form')}}">
                <input type="hidden" name="_method" value="put">
                <input type="hidden" name="_token" value="{{$csrfToken = csrf_token()}}">
                <input type="hidden" name="active" id="event-active" value="0">
                <input type="hidden" name="id" id="event-id" value="">
                <input type="hidden" name="color" id="color" value="">
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label class="control-label">Title:</label>
                            <input type="text" name="title" id="title" class="form-control" value="">
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label class="control-label">Description:</label>
                            <textarea name="description" id="description" rows="8" class="form-control"></textarea>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <button type="button" class="btn btn-white" data-dismiss="modal">{{trans('general.close')}}</button>
                        <button type="submit" class="btn btn-secondary">{{trans('general.save')}}</button>
                        <a href="#" id="event-delete" class="btn btn-black pull-right">{{trans('general.delete')}}</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@push('head')
<link rel="stylesheet" href="{{asset('assets/js/fullcalendar/fullcalendar.min.css')}}">
@endpush
@push('body.bottom')
<script src="{{asset('assets/js/moment.min.js')}}"></script>
<script src="{{asset('assets/js/fullcalendar/fullcalendar.min.js')}}"></script>
<script src="{{asset('assets/js/jquery-ui/jquery-ui.min.js')}}"></script>
<script type="text/javascript">
// Calendar Initialization
$(document).ready(function($) {
    var eventsList = $("#events-list");

    // Form to add new event
    $("#add-calendar-event").on('submit', function(e) {
        e.preventDefault();

        var $event = $(this).find('.form-control'),
            title = $event.val().trim();

        if (title.length >= 3) {
            var input = {'title':title, '_method':'put', '_token':"{{$csrfToken}}"};

            $.post("{{cms_route('calendar.save')}}", input, function(data) {
                // Create Event Entry
                eventsList.append(
                    '<li id="event' + data.input.id + '">\
                        <a href="#" data-event-class="event-color-' + data.input.color + '" data-color="' + data.input.color + '" data-id="' + data.input.id + '">\
                            <span class="title badge badge-' + data.input.color + ' badge-roundless">' + title + '</span>\
                            <span class="description hidden"></span>\
                        </a>\
                    </li>'
                );

                // Reset draggable
                eventsList.find("li").draggable({
                    cancel: '.list-header',
                    revert: true,
                    revertDuration: 50,
                    zIndex: 999
                });

                // Reset input
                $event.val('').focus();
            }, 'json').fail(function(xhr) {
                alert(xhr.responseText);
            });
        } else {
            $event.focus();

            alert('Title must contain at least 3 characters');
        }
    });

    // Calendar Initialization
    var calendar = $('#calendar'),
        updatedEvent;
    calendar.fullCalendar({
        header: {
            left: 'title',
            center: 'today',
            right: 'month,agendaWeek,agendaDay,prev,next'
        },
        buttonIcons: {
            prev: 'prev fa-angle-left',
            next: 'next fa-angle-right'
        },
        defaultView: 'month',
        // lazyFetching: false,
        defaultDate: '{{date("Y-m-d")}}',
        defaultTimedEventDuration: '01:00:00',
        droppable: true,
        editable: true,
        eventLimit: true,
        events: function(start, end, timezone, callback) {
            $.ajax({
                url: '{{cms_route('calendar.events')}}',
                type: 'POST',
                dataType: 'json',
                data: {'start':start.format(), 'end':end.format(), '_token':"{{$csrfToken}}"},
                success: function(data) {
                    var events = [];
                    $(data).each(function(index, element) {
                        events.push({
                            id: element.id,
                            title: element.title,
                            description: element.description,
                            color: element.color,
                            start: element.start,
                            end: element.end
                        });
                    });
                    callback(events);
                },
                error: function(xhr) {
                    alert(xhr.responseText);
                }
            });
        },
        eventResize: function(event) {
            calendarChanges(event);
        },
        eventDrop: function(event) {
            calendarChanges(event);
        },
        eventClick: function(event, jsEvent, view) {
            if (view.name != 'agendaDay') {
                calendar.fullCalendar('gotoDate', event.start);
                calendar.fullCalendar('changeView', 'agendaDay');
            } else {
                modal = $('#event-modal');
                $('#event-active', modal).val(1);
                $('#event-id', modal).val(event.id);
                $('#title', modal).val(event.title);
                $('#description', modal).val(event.description);
                $('#color', modal).val(event.color);
                modal.modal();

                updatedEvent = event;
            }
        },
        drop: function(date) {
            var target = $(this),
                $event = target.find('a'),
                eventObject = {
                    id: $event.data('id'),
                    title: $event.find('.title').text(),
                    description: $event.find('.description').text(),
                    color: $event.data('color'),
                    start: date.format(),
                    className: $event.data('event-class'),
                    '_method':'put',
                    '_token':"{{$csrfToken}}"
                };

            $.post("{{cms_route('calendar.save')}}", eventObject, function() {
                calendar.fullCalendar('renderEvent', eventObject);

                // Remove event from list
                $(target).remove();
            }, 'json').fail(function(xhr) {
                alert(xhr.responseText);
            });
        }
    });

@if (request()->has('gotoDate'))
    // go to specified date
    calendar.fullCalendar('gotoDate', '{{request('gotoDate')}}');
    calendar.fullCalendar('changeView', 'agendaDay');
@endif

    // Draggable Events
    eventsList.find("li").draggable({
        cancel: '.list-header',
        revert: true,
        revertDuration: 50,
        zIndex: 999
    });

    var modal = $('#event-modal');

    // Load event edit modal
    eventsList.on('click', 'a', function(e) {
        e.preventDefault();

        $('#event-active', modal).val(0);
        $('#event-id', modal).val($(this).data('id'));
        $('#title', modal).val($('.title', this).text());
        $('#description', modal).val($('.description', this).text());
        $('#color', modal).val($(this).data('color'));
        modal.modal();
    });

    // Update event
    $('#event-form.ajax-form').on('ajaxFormSuccess', function() {
        if ($('#event-active', this).val() == 0) {
            var id = $('#event-id', this).val();
            var title = $('#title', this).val();
            var description = $('#description', this).val();

            var listEvent = $('#event' + id);
            $('.title', listEvent).text(title);
            $('.description', listEvent).text(description);
        } else {
            if (updatedEvent) {
                updatedEvent.title = $('#title', this).val();
                updatedEvent.description = $('#description', this).val();

                calendar.fullCalendar('updateEvent', updatedEvent);
            }
        }
    });

    // Delete event
    $('#event-delete').on('click', function(e) {
        e.preventDefault();

        var form   = $(this).closest('form');
        var active = form.find('#event-active').val();
        var id     = form.find('#event-id').val();

        var input = {'id':id, '_token':"{{$csrfToken}}"};
        $.post("{{cms_route('calendar.destroy')}}", input, function() {
            modal.modal('hide');

            if (active == 1) {
                calendar.fullCalendar('removeEvents', id);
            } else {
                $('#events-list').find('#event' + id).remove();
            }
        }, 'json').fail(function(xhr) {
            alert(xhr.responseText);
        })
    });

    function calendarChanges(event) {
        var eventObject = {
            id: event.id,
            title: event.title,
            description: event.description,
            color: event.color,
            start: event.start.format(),
            '_method':'put',
            '_token':"{{$csrfToken}}"
        };

        if (event.end) {
            $.extend(eventObject, {end: event.end.format()});
        }

        $.post("{{cms_route('calendar.save')}}", eventObject, function() {}, 'json')
        .fail(function(xhr) {
            alert(xhr.responseText);
        });
    }
});
</script>
@endpush
@endsection
