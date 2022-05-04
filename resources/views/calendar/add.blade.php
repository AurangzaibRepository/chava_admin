@extends('layouts.main')
@section('contents')

{{Form::label('lbl-page-header', $pageTitle, ['id' => 'lbl-page-header'])}}

<div class="dv-base">
    <div class="page-layout">
        {{Form::open()}}
        <div class="row mb-3">
            <div class="col-2 d-flex flex-wrap align-content-center">{{Form::label('reminder', 'Reminder')}}</div>
            <div class="col-4">{{Form::select('reminder', [], null, ['class' => 'form-control'])}}</div>
            <div class="col-2 d-flex flex-wrap align-content-center">{{Form::label('place', 'Place')}}</div>
            <div class="col-4">{{Form::text('place', '', ['class' => 'form-control'])}}</div>
        </div>
        <div class="row mb-3">
            <div class="col-2 d-flex flex-wrap align-content-center">{{Form::label('grades', 'Grades')}}</div>
            <div class="col-4">{{Form::text('grades', null, ['class' => 'form-control'])}}</div>
            <div class="col-2 d-flex flex-wrap align-content-center">{{Form::label('priorities', 'Priorities')}}</div>
            <div class="col-4">{{Form::select('priorities', [], null, ['class' => 'form-control'])}}</div>
        </div>
        <div class="row mb-3">
            <div class="col-2 d-flex flex-wrap align-content-center">{{Form::label('date', 'Date')}}</div>
            <div class="col-4">{{Form::text('date', null, ['class' => 'form-control'])}}</div>
            <div class="col-2 d-flex flex-wrap align-content-center">{{Form::label('time', 'Time')}}</div>
            <div class="col-4">{{Form::text('time', null, ['class' => 'form-control'])}}</div>
        </div>
        {{Form::close()}}
    </div>
</div>

@endsection