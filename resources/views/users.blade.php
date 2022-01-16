@extends('layouts.main')
<!-- Style -->
@push('styles')
<link rel="stylesheet" href="{{asset('css/users.css')}}">
</link>
@endpush

@section('contents')
{{Form::label('lbl-page-header', 'Manage Users', ['id' => 'lbl-page-header'])}}

<div class="dv-base">
    <div class="page-layout">
        <table id="table-users" class="tbl-users table table-striped table-bordered" style="width: 100%">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>UserID</th>
                    <th>Android Version</th>
                    <th>Last Activity</th>
                    <th></th>
                </tr>
            </thead>
            <!--<tbody>
            <tr>
                <td>Lindsey</td>
                <td>9876</td>
                <td>4.3.1</td>
                <td>7 hours ago</td>
                <td><i class="far fa-question-circle" style="color: red"></i> <i class="far fa-trash-alt"
                        style="color: #0b5ed7"></i></td>
            </tr>
            <tr>
                <td>Lindsey</td>
                <td>9876</td>
                <td>4.3.1</td>
                <td>7 hours ago</td>
                <td><i class="far fa-question-circle" style="color: red"></i> <i class="far fa-trash-alt"
                        style="color: #0b5ed7"></i></td>
            </tr>
            <tr>
                <td>Lindsey</td>
                <td>9876</td>
                <td>4.3.1</td>
                <td>7 hours ago</td>
                <td><i class="far fa-question-circle" style="color: red"></i> <i class="far fa-trash-alt"
                        style="color: #0b5ed7"></i></td>
            </tr>
            <tr>
                <td>Lindsey</td>
                <td>9876</td>
                <td>4.3.1</td>
                <td>7 hours ago</td>
                <td><i class="far fa-question-circle" style="color: red"></i> <i class="far fa-trash-alt"
                        style="color: #0b5ed7"></i></td>
            </tr>
            <tr>
                <td>Lindsey</td>
                <td>9876</td>
                <td>4.3.1</td>
                <td>7 hours ago</td>
                <td><i class="far fa-question-circle" style="color: red"></i> <i class="far fa-trash-alt"
                        style="color: #0b5ed7"></i></td>
            </tr>
        </tbody> -->
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
                    <div class="col-5"><img class="img-user" src="{{asset('/images/female-prof.jpeg')}}"></img></div>
                    <div class="col-7 dv-user-info">
                        <label>Annie Maddel</label><br />
                        <span>Country - Nicaragua</span>
                    </div>
                </div>
                <br />
                <table id="tbl-user-info">
                    <tbody>
                        <tr>
                            <td>Email</td>
                            <td>annie@gmail.com</td>
                        </tr>
                        <tr>
                            <td>Date of Joining</td>
                            <td>09/03/2010</td>
                        </tr>
                        <tr>
                            <td>Last Active</td>
                            <td>9 hours ago</td>
                        </tr>
                        <tr>
                            <td>Phone number</td>
                            <td>*****</td>
                        </tr>
                        <tr>
                            <td>Password</td>
                            <td>******</td>
                        </tr>
                        <tr>
                            <td>Registered</td>
                            <td>10/02/2005</td>
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
<script src="{{asset('js/users.js')}}"></script>
@endpush