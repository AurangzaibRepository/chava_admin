@extends('layouts.main')
<!-- Style -->
@push('styles')
<link rel="stylesheet" href="{{asset('css/community.css')}}">
</link>
@endpush

@section('contents')
{{Form::label('lbl-page-header', 'Community', ['id' => 'lbl-page-header'])}}

<div class="dv-base row">
    <div class="col-7">

        <!-- Community Feeds -->
        <div class="page-layout">
            <div id="dv-header-label">
                <label class="dv-box-header">Community Feeds</label>
            </div>

            <label id="lbl-date">{{$date}}</label>

            <!-- Dates section -->
            <div id="dv-dates" class="row">
                <div class="col">
                    <span>Sun</span><br /><span>23</span>
                </div>
                <div class="col">
                    <span>Mon</span><br /><span>24</span>
                </div>
                <div class="col">
                    <span>Tue</span><br /><span>25</span>
                </div>
                <div class="col">
                    <span>Wed</span><br /><span>26</span>
                </div>
                <div class="col">
                    <span>Thu</span><br /><span>27</span>
                </div>
                <div class="col">
                    <span>Fri</span><br /><span>28</span>
                </div>
                <div class="col">
                    <span>Sat</span><br /><span>29</span>
                </div>
            </div>

            <!-- Questions -->
            <div id="dv-questions">

                @foreach ($data as $row)
                <div class="dv-question">
                    <div class="row question">
                        <div class="col-9">{{$row->question}} - <span
                                class="{{$row->status}}">{{ucfirst($row->status)}}</span>
                        </div>
                    </div>


                    <div class="user-info row">
                        <div class="col-8 dv-user-info">
                            <div>
                                <label class="lbl-posted">Posted</label>
                            </div>
                            <div>
                                <img class="img-user" src="{{url('images/leaf-icon.png')}}"></img>
                                <span class="spn-username">{{$row->user_name}}</span>
                                <span class="lbl-posted">{{$row->createdAt}} </span>
                            </div>
                        </div>
                        @if ($row->status === 'pending')
                        <div class="col-4 col-btns">
                            <a class="btn-approve">Approve</a>
                            <a class="btn-reject" onClick="changeStatus({{$row->id}}, 'rejected')">Reject</a>
                        </div>
                        @endif
                    </div>
                </div>
                @endforeach
            </div> <!-- questions div -->

            <div id="dv-show-more">
                <a>show more</a>
            </div>

        </div> <!-- dv layout -->

        <br />
        <!-- Community Users -->
        <div class="page-layout" id="dv-community">

            <label class="dv-box-header">Community Users</label>
            <table id="tbl-community-users">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>User Status</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>
                            <div>
                                <img src="{{url('images/female-prof.jpeg')}}"></img>
                                <span class="username">Nicci Troiani</span>
                            </div>
                        </td>
                        <td>Active</td>
                    </tr>
                    <tr>
                        <td>
                            <div>
                                <img src="{{url('images/female-prof.jpeg')}}"></img>
                                <span class="username">Lindsey Stroud</span>
                            </div>
                        </td>
                        <td style="color: red">Inactive</td>
                    </tr>
                    <tr>
                        <td>
                            <div>
                                <img src="{{url('images/male-prof.jpeg')}}"></img>
                                <span class="username">George Fields</span>
                            </div>
                        </td>
                        <td>Active</td>
                    </tr>
                </tbody>
            </table>

        </div> <!-- dv layout -->
    </div>
</div>

@endsection

@push('scripts')
<script src="{{asset('js/community.js')}}"></script>
@endpush