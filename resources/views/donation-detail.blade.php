@extends('layout.master')

@section('content')
    <div class="container">
        <!-- Main content -->
        <section class="content">
            <div class="row wow animated fadeInRight">
                <div class="col-md-8 wow animated bounceInUp">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="box box-solid">
                                <div class="box-body">

                                </div><!-- /.box-body -->
                            </div><!-- /.box -->
                        </div>
                    </div>
                </div>
            </div>
            @if(!Session::has('member'))
                @include('layout.login')
            @endif
        </section><!-- /.content -->
    </div><!-- /.container -->
    <script src="../adminLTE/plugins/jQuery/jQuery-2.1.4.min.js"></script>
    <script src="../adminLTE/dist/js/home.js"></script>
    <script src="../adminLTE/dist/js/scholarship_detail.js"></script>
    @include('layout.script')
@endsection