@extends('layouts.main')
@section('contents')

@push('styles')
<link rel="stylesheet" href="{{asset('css/subcategory-edit.css')}}" />
@endpush

{{Form::label('lbl-page-header', $pageTitle , ['id' => 'lbl-page-header'])}}

<div class="page-layout">
    <div id="dv-subcategory">
        {{Form::open()}}
        <div class="row">
            <div class="col-4">
                <div class="mb-3">
                    {{Form::label('subcategory', 'Subcategory')}}
                    {{Form::text('subcategory', null, ['class' => 'form-control'])}}
                </div>
            </div>
        </div>
        {{Form::close()}}
    </div>
</div>

@endsection