@extends('layouts.main')
@section('contents')

{{Form::label('lbl-page-header', $pageTitle, ['id' => 'lbl-page-header'])}}

<div class="dv-base">
    <div class="page-layout">
        {{Form::open()}}
        <div class="row mb-3">
            <div class="col-2">{{Form::label('reminder', 'Reminder')}}</div>
            <div class="col-4">{{Form::select('reminder', [], null, ['class' => 'form-control'])}}</div>
            <div class="col-2">{{Form::label('place', 'Place')}}</div>
            <div class="col-4">{{Form::text('place', '', ['class' => 'form-control'])}}</div>
        </div>
        <div class="row">
            <div class="col-2">{{Form::label('grades', 'Grades')}}</div>
            <div class="col-4">{{Form::text('grades', null, ['class' => 'form-control'])}}</div>
            <div class="col-2">{{Form::label('priorities', 'Priorities')}}</div>
            <div class="col-4">{{Form::select('priorities', [], null, ['class' => 'form-control'])}}</div>
        </div>
        {{Form::close()}}
    </div>
</div>

@endsection