@extends('layout.master')

@section('content')
    <div class="container">
        <!-- Main content -->
        <section class="content">
            <div class="row wow animated fadeInRight">
                <div class="col-md-12">
                    <div class="box box-solid">
                        <div class="box-body">
                            <img src="http://placehold.it/1100x500/f39c12/ffffff&amp;text=Comming+Soon" alt="Third slide">
                            {{--<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">--}}
                                {{--<ol class="carousel-indicators">--}}
                                    {{--<li data-target="#carousel-example-generic" data-slide-to="0" class=""></li>--}}
                                    {{--<li data-target="#carousel-example-generic" data-slide-to="1" class=""></li>--}}
                                    {{--<li data-target="#carousel-example-generic" data-slide-to="2" class="active"></li>--}}
                                {{--</ol>--}}
                                {{--<div class="carousel-inner">--}}
                                    {{--<div class="item">--}}
                                        {{--<img src="http://placehold.it/1100x500/39CCCC/ffffff&amp;text=Comming+Soon" alt="First slide">--}}
                                        {{--<div class="carousel-caption">--}}
                                            {{--First Slide--}}
                                        {{--</div>--}}
                                    {{--</div>--}}
                                    {{--<div class="item">--}}
                                        {{--<img src="http://placehold.it/1100x500/3c8dbc/ffffff&amp;text=Comming+Soon" alt="Second slide">--}}
                                        {{--<div class="carousel-caption">--}}
                                            {{--Second Slide--}}
                                        {{--</div>--}}
                                    {{--</div>--}}
                                    {{--<div class="item active">--}}
                                        {{--<img src="http://placehold.it/1100x500/f39c12/ffffff&amp;text=Comming+Soon" alt="Third slide">--}}
                                        {{--<div class="carousel-caption">--}}
                                            {{--Third Slide--}}
                                        {{--</div>--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                                {{--<a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">--}}
                                    {{--<span class="fa fa-angle-left"></span>--}}
                                {{--</a>--}}
                                {{--<a class="right carousel-control" href="#carousel-example-generic" data-slide="next">--}}
                                    {{--<span class="fa fa-angle-right"></span>--}}
                                {{--</a>--}}
                            {{--</div>--}}
                        </div><!-- /.box-body -->
                    </div><!-- /.box -->
                </div>
            </div>
            <div id="home-scholarship"></div>
            {{--<h2 class="page-header text-center">Testimonial</h2>--}}
            {{--<div class="row wow animated rollIn" id="testimonials">--}}
                {{--@for ($i = 0; $i < 10; $i++)--}}
                    {{--<div class="col-sm-3">--}}
                        {{--<div class="box box-widget">--}}
                            {{--<div class="box-header with-border">--}}
                                {{--<div class="user-block">--}}
                                    {{--<img class="img-circle" src="{{ url('/') }}/public/adminLTE/dist/img/avatar.png" alt="user image">--}}
                                    {{--<span class="username users-list-name"><a href="#">Jonathan Burke Jr.</a></span>--}}
                                    {{--<span class="description users-list-name">Xbox One Console Bundle with Halo Master Chief Collection.</span>--}}
                                    {{--<a href="{{ url('/') }}/scholarship/detail/xxxx" class="description"><span class="dashed-underline">Detail</span></a>--}}
                                {{--</div><!-- /.user-block -->--}}
                            {{--</div><!-- /.box-header -->--}}
                        {{--</div>--}}
                    {{--</div>--}}
                    {{--<div class="col-sm-3">--}}
                        {{--<div class="box box-widget">--}}
                            {{--<div class="box-header with-border">--}}
                                {{--<div class="user-block">--}}
                                    {{--<img class="img-circle" src="{{ url('/') }}/public/adminLTE/dist/img/avatar2.png" alt="user image">--}}
                                    {{--<span class="username users-list-name"><a href="#">Jonathan Burke Jr.</a></span>--}}
                                    {{--<span class="description users-list-name">Xbox One Console Bundle with Halo Master Chief Collection.</span>--}}
                                    {{--<a href="{{ url('/') }}/scholarship/detail/xxxx" class="description"><span class="dashed-underline">Detail</span></a>--}}
                                {{--</div><!-- /.user-block -->--}}
                            {{--</div><!-- /.box-header -->--}}
                        {{--</div>--}}
                    {{--</div>--}}
                    {{--<div class="col-sm-3">--}}
                        {{--<div class="box box-widget">--}}
                            {{--<div class="box-header with-border">--}}
                                {{--<div class="user-block">--}}
                                    {{--<img class="img-circle" src="{{ url('/') }}/public/adminLTE/dist/img/avatar3.png" alt="user image">--}}
                                    {{--<span class="username users-list-name"><a href="#">Jonathan Burke Jr.</a></span>--}}
                                    {{--<span class="description users-list-name">Xbox One Console Bundle with Halo Master Chief Collection.</span>--}}
                                    {{--<a href="{{ url('/') }}/scholarship/detail/xxxx" class="description"><span class="dashed-underline">Detail</span></a>--}}
                                {{--</div><!-- /.user-block -->--}}
                            {{--</div><!-- /.box-header -->--}}
                        {{--</div>--}}
                    {{--</div>--}}
                    {{--<div class="col-sm-3">--}}
                        {{--<div class="box box-widget">--}}
                            {{--<div class="box-header with-border">--}}
                                {{--<div class="user-block">--}}
                                    {{--<img class="img-circle" src="{{ url('/') }}/public/adminLTE/dist/img/avatar04.png" alt="user image">--}}
                                    {{--<span class="username users-list-name"><a href="#">Jonathan Burke Jr.</a></span>--}}
                                    {{--<span class="description users-list-name">Xbox One Console Bundle with Halo Master Chief Collection.</span>--}}
                                    {{--<a href="{{ url('/') }}/scholarship/detail/xxxx" class="description"><span class="dashed-underline">Detail</span></a>--}}
                                {{--</div><!-- /.user-block -->--}}
                            {{--</div><!-- /.box-header -->--}}
                        {{--</div>--}}
                    {{--</div>--}}
                    {{--<div class="col-sm-3">--}}
                        {{--<div class="box box-widget">--}}
                            {{--<div class="box-header with-border">--}}
                                {{--<div class="user-block">--}}
                                    {{--<img class="img-circle" src="{{ url('/') }}/public/adminLTE/dist/img/avatar5.png" alt="user image">--}}
                                    {{--<span class="username users-list-name"><a href="#">Jonathan Burke Jr.</a></span>--}}
                                    {{--<span class="description users-list-name">Xbox One Console Bundle with Halo Master Chief Collection.</span>--}}
                                    {{--<a href="{{ url('/') }}/scholarship/detail/xxxx" class="description"><span class="dashed-underline">Detail</span></a>--}}
                                {{--</div><!-- /.user-block -->--}}
                            {{--</div><!-- /.box-header -->--}}
                        {{--</div>--}}
                    {{--</div>--}}
                {{--@endfor--}}
            {{--</div>--}}

            @if(!Session::has('member'))
                @include('layout.login')
            @endif

            <h2 class="page-header text-center">Tentang Kami, Mari Berdonasi & Kontak</h2>
            <div class="row wow animated rubberBand">
                <div class="col-lg-12">
                    <!-- small box -->
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <div class="col-md-4">
                                <h3 class="box-title">Tentang Kami</h3>
                            </div>
                            <div class="col-md-4">
                                <h3 class="box-title">Mari Berdonasi</h3>
                            </div>
                            <div class="col-md-4">
                                <h3 class="box-title">Kontak</h3>
                            </div>
                        </div>
                        <div class="box-body">
                            <div class="col-lg-4">
                                <ul class="list-unstyled">
                                    <li><a href="javascript:;" class="link-black dashed-underline">Apa itu DidikBangsa.com</a></li>
                                    <li><a href="javascript:;" class="link-black dashed-underline">Our Team</a></li>
                                    <li><a href="javascript:;" class="link-black dashed-underline">Acara</a></li>
                                </ul>
                            </div>
                            <div class="col-lg-4">
                                <ul class="list-unstyled">
                                    <li><a href="javascript:;" class="link-black dashed-underline">Usulkan beasiswa</a></li>
                                    <li><a href="javascript:;" class="link-black dashed-underline">Syarat dan ketentuan</a></li>
                                    <li><a href="javascript:;" class="link-black dashed-underline">Kebijakan privasi</a></li>
                                    <li><a href="javascript:;" class="link-black dashed-underline">Live support</a></li>
                                </ul>
                            </div>
                            <div class="col-lg-4">
                                <ul class="list-unstyled">
                                    <li>DidikBangsa.com</li>
                                    <li>Jalan Adiyaksa 6 No. 9</li>
                                    <li>Sukapura, Bandung</li>
                                    <li>Jawa Barat 40288</li>
                                    <li>Indonesia</li>
                                    <li>Telepon : xxxxxxxxxx</li>
                                    <li>Email : didikbangsa@mail.com</li>
                                    <li>Google Maps : <a href="javascript:;" class="link-black dashed-underline">DidikBangsa.com</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="box-footer"></div>
                    </div>
                </div>
            </div>
        </section><!-- /.content -->
    </div><!-- /.container -->
    <script src="../adminLTE/plugins/jQuery/jQuery-2.1.4.min.js"></script>
	<script src="../adminLTE/dist/js/home.js"></script>
    @include('layout.script')
@endsection