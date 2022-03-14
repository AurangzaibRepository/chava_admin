@extends('layouts.main')
<!-- Style -->
@push('styles')
<link rel="stylesheet" href="{{asset('css/users.css')}}">
</link>
<link rel="stylesheet" href="{{asset('css/daterangepicker.css')}}" />
@endpush

@section('contents')
{{Form::label('lbl-page-header', 'Manage Users', ['id' => 'lbl-page-header'])}}

@if (session()->has('success'))
<div class="alert alert-success">{{session()->get('success')}}</div>
@endif

<div class="dv-base">
    <div class="page-layout">

        {{-- Filter --}}
        <div class="dv-filter">
            {{Form::open(['id' => 'form-filter'])}}
            <div class="row">
                <div class="col-md-4">
                    <div class="mb-3">
                        {{Form::text('username', '', ['class' => 'form-control', 'placeholder' => 'Username'])}}
                    </div>
                </div>
                <div class="col-md-4">
                    {{Form::select('status', $userStatus, $status, ['class' => 'form-select'])}}
                </div>
                <div class="col-md-4">
                    {{Form::text('joining_date', '', ['class' => 'form-control', 'placeholder' => 'Joining Date',
                    'id' => 'joining_date', 'readonly' => 'readonly'])}}
                </div>
                <div class="col-md-8">
                    <label id="lbl-new" class="checkbox"><input type="checkbox" id="new" {{($status=='New' ? 'checked'
                            : '' )}}> New
                        Visitor</label>

                    <label id="" class="checkbox">
                        <input type="checkbox" id="whatsapp" {{$status=='Whatsapp' ? 'checked' : '' }} />
                        WhatsApp Session
                    </label>
                </div>
                <div class="col-md-4 dv-buttons">
                    {{Form::submit('Search', ['class' => 'btn btn-primary', 'id' => 'search'])}}
                    {{Form::submit('Reset', ['class' => 'btn btn-secondary', 'id' => 'btn-reset'])}}
                </div>
            </div>
            {{Form::close()}}
        </div>

        <table id="table-users" class="tbl-users table table-striped table-bordered" style="width: 100%">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>UserID</th>
                    <th>Android Version</th>
                    <th>Last Activity</th>
                    <th>Status</th>
                    <th></th>
                </tr>
            </thead>
        </table>
    </div>
</div>

{{-- User detail modal --}}
<div class="modal" id="modal-user">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header">
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-5"><img class="img-user" src="{{asset('/images/leaf-icon.png')}}"></img></div>
                    <div class="col-7 dv-user-info">
                        <span id="name"></span><br />
                        <span>Country - <span id="country">Nicaragua</span></span>
                    </div>
                </div>
                <br />
                <table id="tbl-user-info">
                    <tbody>
                        <tr>
                            <td>Date of Joining</td>
                            <td><span id="registered-date"></span></td>
                        </tr>
                        <tr>
                            <td>Last Active</td>
                            <td><span id="last-active"></span></td>
                        </tr>
                        <tr>
                            <td>Phone number</td>
                            <td><span id="phone-no"></span></td>
                        </tr>
                    </tbody>

                </table>
            </div> <!-- modal body -->
        </div> <!-- modal-content -->
    </div>
</div>

@endsection

<!-- Script -->
@push('scripts')
<script src="{{URL::asset('js/moment.js')}}"></script>
<script src="{{URL::asset('js/daterangepicker.min.js')}}"></script>

<script src="{{asset('js/users.js')}}"></script>
@endpush