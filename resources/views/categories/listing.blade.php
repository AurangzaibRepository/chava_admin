@extends('layouts.main')

<!-- Style -->
@push('styles')
<link rel="stylesheet" href="{{asset('css/categories-listing.css')}}" />
<link rel="stylesheet" type="text/css" href="{{asset('css/slick.min.css')}}" />
@endpush

@section('contents')
<div>
    {{Form::label('lbl-page-header', 'Topics', ['id' => 'lbl-page-header'])}}
    <a id="btn-add-topic" data-bs-toggle="modal" data-bs-target="#modal-category">
        <i class="fa fa-plus"></i>
        Add new topic
    </a>
</div>
<br />

@include('layouts.messages')

<div class="dv-base">
    <div class="page-layout">

        <table class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Category</th>
                    <th>Status</th>
                    <th></th>
                </tr>
            </thead>
        </table>
    </div>
</div>

@include('categories.add-category')

@endsection

<!-- Scripts -->
@push('scripts')
<script src="{{asset('js/categories-listing.js')}}"></script>
@endpush