@extends('layouts.main')
@section('contents')

@push('styles')
<link rel="stylesheet" href="{{asset('css/category-edit.css')}}" />
@endpush

{{Form::label('lbl-page-header', $pageTitle, ['id' => 'lbl-page-header'])}}

<div class="page-layout">
    <div id="dv-category">
        {{Form::open()}}
        <div class="row">
            <div class="col-4">
                <div class="mb-3">
                    {{Form::label('category', 'Category')}}
                    {{Form::text('category', '', ['class' => 'form-control'])}}
                </div>
            </div>
            <div class="col-4">
                <div class="mb-3">
                    {{Form::label('status', 'Status')}}
                    {{Form::select('status', [], '', ['class' => 'form-select'])}}
                </div>
            </div>
            <div class="col-4 dv-checkbox">

                {{Form::checkbox('publish', '', false)}}
                {{Form::label('publish', 'Publish')}}
            </div>
        </div>
        {{Form::close()}}
    </div>
</div>
@endsection