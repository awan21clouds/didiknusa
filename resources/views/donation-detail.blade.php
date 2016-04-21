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
                                <h4>Tip!</h4>
                                <p>Add the layout-top-nav class to the body tag to get this layout. This feature can also be used with a sidebar! So use this class if you want to remove the custom dropdown menus from the navbar and use regular links instead.</p>
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