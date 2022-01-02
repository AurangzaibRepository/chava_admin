<!DOCTYPE html>
<html>

<head>
    <title>{{$pageTitle}}</title>
    <link rel="stylesheet" href={{asset('css/app.css')}}>
    </link>
    <link rel="stylesheet" href="{{asset('css/main.css')}}">
    </link>
    @stack('styles')
</head>

<body>
    <div class="base-container">
        <div class="dv-top-menu">
            @include('layouts.menu')
        </div>
        <div class="base-contents">
            <div class="dv-left-menu">
                @include('layouts.left_menu')
            </div>
            <div class="dv-contents">
                @yield('contents')
            </div>
        </div>
    </div>
</body>

<script src="{{asset('js/app.js')}}"></script>
@stack('scripts')

</html>