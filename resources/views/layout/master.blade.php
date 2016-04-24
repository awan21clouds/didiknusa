<html>
    <head>
        <title>DidikNusa.com</title>
        <meta name="token" content="{{csrf_token()}}">
        @include('layout.style')
    </head>
    <body class="hold-transition skin-white layout-top-nav">
        <div class="wrapper animsition">
            @if(Session::has('member'))
                @include('layout.header-loggedin')
            @else
                @include('layout.header')
            @endif
            <div class="content-wrapper" style="min-height: 339px;">
                @yield('content')
                @include('modal')
            </div>
            @include('layout.footer')
        </div>
    </body>
</html>