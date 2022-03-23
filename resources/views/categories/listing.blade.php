@extends('layouts.main')

<!-- Style -->
@push('styles')
<link rel="stylesheet" href="{{asset('css/topics-listing.css')}}" />
<link rel="stylesheet" type="text/css" href="{{asset('css/slick.min.css')}}" />
@endpush

@section('contents')
<div>
    {{Form::label('lbl-page-header', 'Topics', ['id' => 'lbl-page-header'])}}
    <a id="btn-add-topic"><i class="fa fa-plus"></i> Add new topic</a>
</div>

<br />
<!-- Active topics -->
<label class="lbl-topic">Active Topics:</label>

<div class="page-layout dv-topics">
    <section class="logo-topics slider" data-arrows="true">

        @foreach ($activeCategories as $category)
        <div class="slide">
            <a class="lnk-topic">
                <div>
                    <img src="{{url('images/leaf-icon.png')}}"></img>
                </div>
                <span>{{$category->category}}</span>
            </a>
        </div>
        @endforeach
    </section>
</div>

<br />
<!-- Inactive topics -->
<label class="lbl-topic">Inactive Topics:</label>

<div class="page-layout dv-topics" id="dv-inactive-topics">
    <section class="logo-topics slider" data-arrows="true">

        @foreach ($inactiveCategories as $category)
        <div class="slide">
            <a class="lnk-topic">
                <div>
                    <img src="{{url('images/leaf-icon.png')}}"></img>
                </div>
                <span>{{$category->category}}</span>
            </a>
        </div>
        @endforeach
    </section>
</div>

<br />
<!-- Drafts topics -->
<label class="lbl-topic">Drafts Topics:</label>

<div class="page-layout dv-topics" id="dv-drafts-topics">
    <section class="logo-topics slider" data-arrows="true">
        <div class="slide"><a class="lnk-topic">
                <div>
                    <img src="{{url('images/leaf-icon.png')}}"></img>
                </div>
                <span>Mentruation</span>


            </a></div>
        <div class="slide"><a class="lnk-topic">
                <div>
                    <img src="{{url('images/leaf-icon.png')}}"></img>
                </div>
                <span>Anatomy</span>
            </a></div>
        <div class="slide"><a class="lnk-topic">
                <div>
                    <img src="{{url('images/leaf-icon.png')}}"></img>
                </div>
                <span>Anatomy</span>
            </a></div>
        <div class="slide"><a class="lnk-topic">
                <div>
                    <img src="{{url('images/leaf-icon.png')}}"></img>
                </div>
                <span>Anatomy</span>
            </a></div>
        <div class="slide"><a class="lnk-topic">
                <div>
                    <img src="{{url('images/leaf-icon.png')}}"></img>
                </div>
                <span>Anatomy</span>
            </a></div>
    </section>
</div>


@endsection

<!-- Scripts -->
@push('scripts')
<script src="{{asset('js/slick.min.js')}}"></script>
<script src="{{asset('js/topics-listing.js')}}"></script>
@endpush