@extends('layout.master')

@section('content')
    <div class="container">
        <!-- Main content -->
        <section class="content">
            <div class="row wow animated bounceIn">
                <div class="col-md-12">
                    <div class="box box-solid">
                        <div class="box-body">
                            <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                                <ol class="carousel-indicators">
                                    <li data-target="#carousel-example-generic" data-slide-to="0" class=""></li>
                                    <li data-target="#carousel-example-generic" data-slide-to="1" class=""></li>
                                    <li data-target="#carousel-example-generic" data-slide-to="2" class="active"></li>
                                </ol>
                                <div class="carousel-inner">
                                    <div class="item">
                                        <img src="http://placehold.it/1100x500/39CCCC/ffffff&amp;text=Comming+Soon" alt="First slide">
                                        <div class="carousel-caption">
                                            First Slide
                                        </div>
                                    </div>
                                    <div class="item">
                                        <img src="http://placehold.it/1100x500/3c8dbc/ffffff&amp;text=Comming+Soon" alt="Second slide">
                                        <div class="carousel-caption">
                                            Second Slide
                                        </div>
                                    </div>
                                    <div class="item active">
                                        <img src="http://placehold.it/1100x500/f39c12/ffffff&amp;text=Comming+Soon" alt="Third slide">
                                        <div class="carousel-caption">
                                            Third Slide
                                        </div>
                                    </div>
                                </div>
                                <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
                                    <span class="fa fa-angle-left"></span>
                                </a>
                                <a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
                                    <span class="fa fa-angle-right"></span>
                                </a>
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