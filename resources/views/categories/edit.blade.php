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
                    {{Form::text('category', $data->category, ['class' => 'form-control'])}}
                </div>
            </div>
            <div class="col-4">
                <div class="mb-3">
                    {{Form::label('status', 'Status')}}
                    {{Form::select('status', $statusArray, $data->status, ['class' => 'form-select'])}}
                </div>
            </div>
            <div class="col-4 dv-checkbox">
                {{Form::checkbox('publish', '', $data->published)}}
                {{Form::label('publish', 'Publish')}}
            </div>
            <div class="col-12 text-end">
                {{Form::submit('Save', ['class' => 'btn btn-primary'])}}
                {{link_to('topics', 'Back', ['class' => 'btn btn-secondary'] )}}
            </div>
        </div>
        {{Form::close()}}
    </div>
</div>
@endsection