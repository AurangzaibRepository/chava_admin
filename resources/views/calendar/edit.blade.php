@extends('layouts.main')
@section('contents')

@push('styles')
<link rel="stylesheet" href="{{asset('css/daterangepicker.css')}}" />
<link rel="stylesheet" href="{{asset('css/select2.min.css')}}" />
<link rel="stylesheet" href="{{asset('css/calendar-add.css')}}" />
<link rel="stylesheet" href="{{asset('css/calendar-edit.css')}}" />
@endpush

{{Form::label('lbl-page-header', $pageTitle, ['id' => 'lbl-page-header'])}}

@include('calendar.messages')

<div class="dv-base">
    <div class="page-layout">
        {{Form::open(['route' => 'saveCalendar'])}}
        {{Form::hidden('id', $data->id)}}
        {{Form::hidden('hdn_date', $data->date)}}
        {{Form::hidden('hdn_time', old('time', $data->time))}}
        {{Form::hidden('hdn_userid', $data->user_id)}}

        <div class="row mb-3">
            <div class="col-2 d-flex flex-wrap align-content-center">{{Form::label('reminder', 'Reminder')}}</div>
            <div class="col-4">{{Form::select('reminder', $reminder, old('reminder', $data->reminder), ['class' =>
                'form-select'])}}
            </div>
            <div class="col-2 d-flex flex-wrap align-content-center">{{Form::label('place', 'Place')}}</div>
            <div class="col-4">{{Form::text('place', old('place', $data->place), ['class' => 'form-control'])}}</div>
        </div>
        <div class="row mb-3">
            <div class="col-2 d-flex flex-wrap align-content-center">{{Form::label('grades', 'Grades')}}</div>
            <div class="col-4">{{Form::text('grades', old('grades', $data->grades), ['class' => 'form-control'])}}</div>
            <div class="col-2 d-flex flex-wrap align-content-center">{{Form::label('priorities', 'Priorities')}}</div>
            <div class="col-4">{{Form::select('priorities', $priorities, old('priorities', $data->priorities), ['class'
                =>
                'form-select'])}}
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-2 d-flex flex-wrap align-content-center">{{Form::label('date', 'Date')}}</div>
            <div class="col-4">
                {{Form::text('date', '', ['class' => 'form-control', 'readonly' =>'readonly'])}}
            </div>
            <div class="col-2 d-flex flex-wrap align-content-center">{{Form::label('time', 'Time')}}</div>
            <div class="col-4">{{Form::text('time', null, ['class' => 'form-control', 'readonly' =>
                'readonly'])}}
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-2 d-flex flex-wrap align-content-center">{{Form::label('repeat', 'Repeat')}}</div>
            <div class="col-4">{{Form::select('repeat', $repeat, old('repeat', $data->repeat), ['class' =>
                'form-select'])}}
            </div>
            <div class="col-2 d-flex flex-wrap align-content-center">{{Form::label('user_id', 'User')}}</div>
            <div class="col-4">{{Form::select('user_id', ['' => '-- Select --'], '', ['class' =>'form-select'])}}</div>
        </div>
        <div class="row">
            <div class="col-12 d-flex flex-wrap justify-content-end">
                {{Form::submit('Save', ['class' => 'btn btn-primary'])}}
                {{link_to_route('calendar', 'Back', null, ['class' => 'btn btn-secondary'])}}
            </div>
        </div>
        {{Form::close()}}
    </div>
</div>

@endsection

@push('scripts')
<script src="{{asset('js/moment.js')}}"></script>
<script src="{{asset('js/daterangepicker.min.js')}}"></script>
<script src="{{asset('js/select2.min.js')}}"></script>
<script src="{{asset('js/calendar-add.js')}}"></script>
<script src="{{asset('js/calendar-edit.js')}}"></script>
<script src="{{asset('js/calendar-validate.js')}}"></script>
@endpush