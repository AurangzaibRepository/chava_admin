@extends('layouts.main')
<!-- Style -->
@push('styles')
<link rel="stylesheet" href="{{asset('css/users.css')}}">
</link>
@endpush

@section('contents')
{{Form::label('lbl-page-header', 'Manage Users', ['id' => 'lbl-page-header'])}}

<div class="dv-base">

    <table class="tbl-users">
        <thead>
            <tr>
                <th>Name</th>
                <th>UserID</th>
                <th>Android Version</th>
                <th>Last Activity</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
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
        </tbody>
    </table>
</div>
@endsection