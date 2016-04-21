@extends('layout.master')

@section('content')
    <div class="container">
        <!-- Main content -->
        <section class="content">
            <div class="lockscreen-wrapper animated rubberBand animsition">
                <div class="lockscreen-logo">
                    <a href="javascript:;"><b>Donasi Berhasil!</b></a>
                </div>
                <!-- User name -->
                <div class="lockscreen-name text-center">Segera lakukan konfirmasi pengiriman dana donasi anda.</div>
                <div class="lockscreen-name text-center">Donasi yang perlu anda kirimkan sebesar : </div>
                <div class="lockscreen-logo">
                    <a href="javascript:;"><b class="scholarship-currency">100000000</b></a>
                </div>
                <div class="help-block text-center">
                    Pastikan anda telah mengirimkan dan melakukan konfirmasi sebelum batas waktu pengumpulan dana
                </div>
                <div class="text-center">
                    <a href="{{ url('/') }}/home" class="animsition-link">Masuk Lagi</a>
                </div>
                <div class="lockscreen-footer text-center">
                    Copyright &copy; 2016<br>
                </div>
                <div class="navbar-header">
                    <a href="{{ url('/') }}/home" class="navbar-brand">
                        {{--<img src="../adminLTE/dist/img/logo.png" class="user-image img-sm" id="brand-logo"  alt="User Image">--}}
                        <b>DidikBangsa</b>.com
                    </a>
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse">
                        <i class="fa fa-bars"></i>
                    </button>
                </div>
            </div><!-- /.center -->

        </section><!-- /.content -->
    </div><!-- /.container -->
    <script src="../adminLTE/plugins/jQuery/jQuery-2.1.4.min.js"></script>
    <script src="../adminLTE/dist/js/home.js"></script>
    @include('layout.script')
@endsection