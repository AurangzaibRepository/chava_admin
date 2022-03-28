@extends('layouts.main')
@section('contents')

@push('styles')
<link rel="stylesheet" href="{{asset('css/subcategory-edit.css')}}" />
@endpush

{{Form::label('lbl-page-header', $pageTitle , ['id' => 'lbl-page-header'])}}

@if (session()->has('success'))
<div class="alert alert-success">{{session()->get('success')}}</div>
@endif

<div class="page-layout">
    <div id="dv-subcategory">
        {{Form::open(['route' => 'updateSubCategory'])}}
        <div class="row">
            <div class="col-4">
                <div class="mb-3">
                    {{Form::label('sub_category', 'Subcategory')}}
                    {{Form::text('sub_category', $data->sub_category, ['class' => 'form-control'])}}
                    <span class="spn-error" id="error-subcategory">Subcategory required</span>
                    {{Form::hidden('subcategory_id', $data->id)}}
                </div>
            </div>
            <div class="col-8" id="col-buttons">
                <div>
                    {{Form::submit('Save', ['class' => 'btn btn-primary', 'onClick' => 'return validateForm()' ])}}
                    {{link_to_route('editCategory', 'Back', $data->category_id, ['class' => 'btn btn-secondary'])}}
                </div>
            </div>
        </div>
        {{Form::close()}}
    </div>

    <br />
    <div id="dv-header-label">
        <label>Topics</label>
    </div>

    <table id="" class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>No</th>
                <th>Topic</th>
                <th></th>
            </tr>
        </thead>
    </table>

</div>

@endsection

@push('scripts')
<script src="{{asset('js/subcategory-edit.js')}}"></script>
@endpush