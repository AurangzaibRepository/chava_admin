@extends('layouts.main')
@push('styles')
<link rel="stylesheet" href="{{asset('/css/community-feeds.css')}}">
</link>
@endpush

@section('contents')
{{Form::label('lbl-page-header', 'Community Feeds', ['id' => 'lbl-page-header'])}}

@if (session()->has('success'))
<div class="alert alert-success">{{session()->get('success')}}</div>
@endif

<div class="dv-base">
    <div class="page-layout">

        <table id="table-feeds" class="table table-bordered table-striped" style="width:100%">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Question</th>
                    <th>User</th>
                    <th>Posted Date</th>
                    <th>Status</th>
                    <th></th>
                </tr>
            </thead>
        </table>

    </div>
</div>

@endsection

@push('scripts')
<script src="{{asset('/js/community-feeds.js')}}"></script>
@endpush