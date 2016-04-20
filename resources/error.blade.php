<html>
    <head>
        <title>DidikBangsa.com</title>
        @include('layout.style')
    </head>
    <body class="hold-transition lockscreen">
        <div class="lockscreen-wrapper animated rubberBand animsition">
            <div class="lockscreen-logo">
                <a href="login"><b>Terjadi Kesalahan!</b></a>
            </div>
            <!-- User name -->
            <div class="lockscreen-name">Email dan password tidak valid!</div>

            <div class="help-block text-center">
                Pastikan anda memasukan email dan password yang valid!
            </div>
            <div class="text-center">
                <a href="{{ url('/') }}/home" class="animsition-link">Masuk Lagi</a>
            </div>
            <div class="lockscreen-footer text-center">
                Copyright &copy; 2016<br>
            </div>
        </div><!-- /.center -->
        {!!Html::script('public/adminLTE/plugins/jQuery/jQuery-2.1.4.min.js')!!}
        @include('layout.script')
    </body>
</html>
