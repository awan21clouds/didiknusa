@extends('layout.master')

@section('content')
    <div class="container">
        <!-- Main content -->
        <section class="content">
            <div class="lockscreen-wrapper animated rubberBand animsition">
                <div class="lockscreen-logo">
                    <a href="javascript:;"><b>Terjadi Kesalahan!</b></a>
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

        </section><!-- /.content -->
    </div><!-- /.container -->
    <script src="../adminLTE/plugins/jQuery/jQuery-2.1.4.min.js"></script>
    <script src="../adminLTE/dist/js/home.js"></script>
    @include('layout.script')
@endsection