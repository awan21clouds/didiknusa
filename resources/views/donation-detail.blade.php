@extends('layout.master')

@section('content')
    <div class="container">
        <!-- Main content -->
        <section class="content">
            <div class="row wow animated bounceIn">
                <div class="col-md-12">
                    <div class="box box-solid">
                        <div class="box-body">
                            <div class="callout callout-info">
                                <h1>Donasi Berhasil!</h1>
                                <p>Silahkan ke menu donasi untuk melihat detail dan konfirmasi pengiriman dana donasi</p>
                            </div>
                        </div><!-- /.box-body -->
                    </div><!-- /.box -->
                </div>
            </div>

        </section><!-- /.content -->
    </div><!-- /.container -->
    <script src="../adminLTE/plugins/jQuery/jQuery-2.1.4.min.js"></script>
    <script src="../adminLTE/dist/js/home.js"></script>
    @include('layout.script')
@endsection