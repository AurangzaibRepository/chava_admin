@extends('layouts.main')
@section('contents')

@push('styles')
<link rel="stylesheet" href="{{asset('css/daterangepicker.css')}}" />
<style>
    .ul-left-menu a.calendar {
        background: #f2f2f2;
        border-left: 3px solid #0b5ed7
    }

    .ul-left-menu a.calendar span,
    .ul-left-menu a.calendar svg {
        color: #0b5ed7
    }
</style>
@endpush

{{Form::label('lbl-page-header', $pageTitle, ['id' => 'lbl-page-header'])}}

<div class="dv-base">
    <div class="page-layout">
        {{Form::open()}}
        <div class="row mb-3">
            <div class="col-2 d-flex flex-wrap align-content-center">{{Form::label('reminder', 'Reminder')}}</div>
            <div class="col-4">{{Form::select('reminder', $reminder, null, ['class' => 'form-select'])}}</div>
            <div class="col-2 d-flex flex-wrap align-content-center">{{Form::label('place', 'Place')}}</div>
            <div class="col-4">{{Form::text('place', '', ['class' => 'form-control'])}}</div>
        </div>
        <div class="row mb-3">
            <div class="col-2 d-flex flex-wrap align-content-center">{{Form::label('grades', 'Grades')}}</div>
            <div class="col-4">{{Form::text('grades', null, ['class' => 'form-control'])}}</div>
            <div class="col-2 d-flex flex-wrap align-content-center">{{Form::label('priorities', 'Priorities')}}</div>
            <div class="col-4">{{Form::select('priorities', $priorities, null, ['class' => 'form-select'])}}</div>
        </div>
        <div class="row mb-3">
            <div class="col-2 d-flex flex-wrap align-content-center">{{Form::label('date', 'Date')}}</div>
            <div class="col-4">{{Form::text('date', null, ['class' => 'form-control', 'readonly' => 'readonly'])}}</div>
            <div class="col-2 d-flex flex-wrap align-content-center">{{Form::label('time', 'Time')}}</div>
            <div class="col-4">{{Form::text('time', null, ['class' => 'form-control'])}}</div>
        </div>
        <div class="row mb-3">
            <div class="col-2 d-flex flex-wrap align-content-center">{{Form::label('repeat', 'Repeat')}}</div>
            <div class="col-4">{{Form::select('repeat', $repeat, null, ['class' => 'form-select'])}}</div>
            <div class="col-2 d-flex flex-wrap align-content-center">{{Form::label('userid', 'User')}}</div>
            <div class="col-4">{{Form::select('userid', [], null, ['class' => 'form-select'])}}</div>
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
<script src="{{asset('js/calendar-add.js')}}"></script>
@endpush