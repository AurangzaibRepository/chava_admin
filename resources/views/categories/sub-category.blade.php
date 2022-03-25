@extends('layouts.main')
@section('contents')

@push('styles')
<link rel="stylesheet" href="{{asset('css/subcategory-edit.css')}}" />
@endpush

{{Form::label('lbl-page-header', $pageTitle , ['id' => 'lbl-page-header'])}}

<div class="page-layout">
    <div id="dv-subcategory">
        {{Form::open(['route' => 'updateSubCategory'])}}
        <div class="row">
            <div class="col-4">
                <div class="mb-3">
                    {{Form::label('sub_category', 'Subcategory')}}
                    {{Form::text('sub_category', $data->sub_category, ['class' => 'form-control'])}}
                    {{Form::hidden('subcategory_id', $data->id)}}
                </div>
            </div>
            <div class="col-8" id="col-buttons">
                <div>
                    {{Form::submit('Save', ['class' => 'btn btn-primary'])}}
                    {{link_to_route('editCategory', 'Back', $data->category_id, ['class' => 'btn btn-secondary'])}}
                </div>
            </div>
        </div>
        {{Form::close()}}
    </div>
</div>

@endsection