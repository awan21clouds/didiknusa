@extends('layout.master')

@section('content')
    <div class="container">
        <!-- Main content -->
        <section class="content">
            <div class="lockscreen-wrapper animated rubberBand animsition" style="margin-top: -100px;">
                <div class="lockscreen-logo">
                    <a href="javascript:;"><b>Donasi Berhasil!</b></a>
                </div>
                <!-- User name -->
                <div class="lockscreen-name text-center">Segera lakukan pengiriman dan konfirmasi donasi anda.</div>
                <div class="lockscreen-name text-center">Donasi yang perlu anda kirimkan sebesar : </div>
                <br>
                <div class="lockscreen-logo">
                    <a href="javascript:;"><b class="scholarship-currency">100000000</b></a>
                </div>
                <div class="help-block text-center">
                    Pastikan anda telah mengirimkan dan melakukan konfirmasi sebelum batas waktu pengumpulan dana.
                </div>
                <div class="text-center">
                    <a href="{{ url('/') }}/home" class="animsition-link">Kembali ke beranda</a> /
                    <a href="{{ url('/') }}/profil/{{md5('my-donation')}}" class="animsition-link">Konfirmasi Sekarang</a>
                </div>
                <div class="lockscreen-footer text-center">
                    <h3><b>DidikBangsa</b>.com</h3>
                    Copyright &copy; 2016<br>
                </div>
            </div><!-- /.center -->
        </section><!-- /.content -->
    </div><!-- /.container -->
    <script src="../adminLTE/plugins/jQuery/jQuery-2.1.4.min.js"></script>
    <script src="../adminLTE/dist/js/donation_detail.js"></script>
    @include('layout.script')
@endsection