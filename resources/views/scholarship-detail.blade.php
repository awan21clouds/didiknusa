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
                                    @if(isset($scholarship->picture))
                                        <img class="img-responsive pad" src="{{ url('/') }}/{{ $scholarship->picture }}" alt="Photo" style="margin: 0 auto; height:200px; width:auto;">
                                    @else
                                        <img class="img-responsive pad" src="http://placehold.it/1100x500/f3f3f3/ffffff&amp;text=Tidak+ada+gambar" alt="Photo" style="margin: 0 auto; height:200px; width:auto;">
                                    @endif
                                </div><!-- /.box-body -->
                            </div><!-- /.box -->
                        </div>
                    </div>
                    <div class="row" id="profil-content">
                        <div class="col-md-12">
                            <div class="box box-solid">
                                <div class="box-footer">
                                    <div class="row">
                                        <a href="#tab-short-description" class="small-box-footer" data-toggle="tab">
                                            <div class="col-sm-3 col-xs-6 border-right">
                                                <div class="description-block">
                                                    <h5 class="description-header"><i class="fa fa-th-list" style="font-size: 30px;"></i></h5>
                                                    <span class="description-text">DESKRIPSI SINGKAT</span>
                                                </div><!-- /.description-block -->
                                            </div><!-- /.col -->
                                        </a>
                                        <a href="#tab-long-description" class="small-box-footer" data-toggle="tab">
                                            <div class="col-sm-3 col-xs-6 border-right">
                                                <div class="description-block">
                                                    <h5 class="description-header"><i class="fa fa-list" style="font-size: 30px;"></i></h5>
                                                    <span class="description-text">DESKRIPSI LENGKAP</span>
                                                </div><!-- /.description-block -->
                                            </div><!-- /.col -->
                                        </a>
                                        <a href="#tab-scholarship-detail" class="small-box-footer" data-toggle="tab">
                                            <div class="col-sm-3 col-xs-6 border-right">
                                                <div class="description-block">
                                                    <h1 class="description-header"><i class="fa fa-th-large" style="font-size: 30px;"></i></h1>
                                                    <span class="description-text">DETAIL BEASISWA</span>
                                                </div><!-- /.description-block -->
                                            </div><!-- /.col -->
                                        </a>
                                        <a href="#tab-video-profil" class="small-box-footer" data-toggle="tab">
                                            <div class="col-sm-3 col-xs-6">
                                                <div class="description-block">
                                                    <h5 class="description-header"><i class="fa fa-video-camera" style="font-size: 30px;"></i></h5>
                                                    <span class="description-text">VIDEO PROFIL</span>
                                                </div><!-- /.description-block -->
                                            </div>
                                        </a>
                                    </div><!-- /.row -->
                                </div><!-- /.box-footer -->
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="tab-content">
                                <div class="tab-pane fade active in" id="tab-short-description">
                                    <div class="box box-solid">
                                        <div class="box-header with-border">
                                            <h3 class="box-title">Deskripsi Singkat</h3>
                                        </div>
                                        <div class="box-body">
                                            {{$scholarship->short_description}}
                                        </div><!-- /.box-body -->
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="tab-long-description">
                                    <div class="box box-solid">
                                        <div class="box-header with-border">
                                            <h3 class="box-title">Deskripsi Lengkap</h3>
                                        </div>
                                        <div class="box-body">
                                            {{$scholarship->long_description}}
                                        </div><!-- /.box-body -->
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="tab-scholarship-detail">
                                    <div class="box box-solid">
                                        <div class="box-header with-border">
                                            <h3 class="box-title">Detail Beasiswa</h3>
                                        </div>
                                        <div class="box-body no-padding">
                                            <table class="table table-bordered table-responsive">
                                                @if(count($variables))
                                                    <div class="box-body no-padding">
                                                        <?php $temp = 0;?>
                                                        @foreach ($variables as $variable)
                                                            <tr>
                                                                <th style="width:50%">{{$variable->label}}</th>
                                                                <td class="scholarship-currency">{{$variable->total}}</td>
                                                            </tr>
                                                            <?php $temp += $variable->total;?>
                                                        @endforeach
                                                        <tr>
                                                            <th style="width:50%">Total</th>
                                                            <td class="scholarship-currency">{{$temp}}</td>
                                                        </tr>
                                                    </div><!-- /.box-body -->
                                                @endif
                                            </table>
                                        </div><!-- /.box-body -->
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="tab-video-profil">
                                    <div class="box box-solid">
                                        <div class="box-header with-border">
                                            <h3 class="box-title">Profil Video</h3>
                                        </div>
                                        <div class="box-body">
                                            <div class="embed-responsive embed-responsive-16by9">
                                                {{--{{$scholarship->video}}--}}
                                                <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/fRh_vgS2dFE" frameborder="0" allowfullscreen></iframe>
                                            </div>
                                        </div><!-- /.box-body -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="box box-solid">
                                <div class="box-header with-border">
                                    <h3 class="box-title">Lokasi</h3>
                                </div>
                                <div class="box-body">
                                    <span id="lat" class="hide">{{$scholarship->lat}}</span>
                                    <span id="lng" class="hide">{{$scholarship->lng}}</span>
                                    <div id="map" style="height: 300px;"></div>
                                </div><!-- /.box-body -->
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="box box-widget">
                        <div class="box-header with-border">
                            <div class="col-sm-12 text-center">
                                <h1 class="scholarship-currency">{{$scholarship->donation_total}}</h1>
                                <h4>
                                    Terkumpul <br>
                                    dari target <span class="scholarship-currency">{{$scholarship->scholarship_target}}</span>
                                </h4>
                            </div>

                            {{--<img class="img-thumbnail img-circle" src="{{ url('/') }}/public/adminLTE/dist/img/avatar5.png" alt="user image" style="display: block; margin: 0 auto;">--}}
                            <div class="box-tools">
                                <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                            </div><!-- /.box-tools -->
                        </div><!-- /.box-header -->
                        <div class="box-body" style="display: block; border-bottom: 1px solid #f3f3f3;">
                            <div class="row">
                                <div class="col-sm-12">
                                    <!-- Progress bars -->
                                    <div class="clearfix">
                                        <span class="pull-left">Terkumpul</span>
                                        <small class="pull-right scholarship-currency">{{ $scholarship->donation_total }}</small>
                                    </div>
                                    <div class="progress">
                                        <div class="progress-bar progress-bar-green" style="width: {{ round((($scholarship->donation_total/$scholarship->scholarship_target)*100),2).'%' }};">{{ round((($scholarship->donation_total/$scholarship->scholarship_target)*100),2) }}%</div>
                                    </div>
                                    <div class="clearfix">
                                        <small class="pull-left">@if(Session::has('member'))<a href="javascript:;" onclick="scholarshipDonation(this);" class="btn btn-success btn-sm" alt="{{$scholarship->scholarship_id}}" @if(round((($scholarship->donation_total/$scholarship->scholarship_target)*100),2)>=100) disabled @endif>Berikan Beasiswa</a>@endif</small>
                                        <small class="pull-right"><i class="fa fa-clock-o"></i> <span data-livestamp="{{ $scholarship->created }}"></span></small>
                                    </div>
                                </div><!-- /.col -->
                            </div><!-- /.row -->
                        </div>
                        <div class="box-body no-padding" style="display: block; border-bottom: 1px solid #f3f3f3;">
                            <div class="col-sm-12 border-right">
                                <dl>
                                    <dt class="text-center">Nama siswa</dt>
                                    <dd class="text-center"><h1 class="dashed-underline">{{$scholarship->student_name}}</h1></dd>
                                </dl>
                            </div>
                        </div>
                        <div class="box-body no-padding bg-black">
                            <div class="col-md-12">
                                <div id="DateCountdown" class="col-sm-11" data-date="{{$scholarship->deadline}} 00:00:00" style="height: 100px; margin: 0px auto; margin-top:25px;"></div><!-- /.col -->
                            </div>
                        </div><!-- /.box-body -->
                        <div class="box-body no-padding bg-green">
                            <!--The calendar -->
                            <div id="calendar" alt="{{$scholarship->scholarship_deadline}}" style="width: 100%"></div>
                        </div><!-- /.box-body -->

                        @if(count($funders))
                            <div class="box-footer text-black">

                                <ul class="users-list clearfix">
                                    @foreach ($funders as $funder)
                                        <li>
                                            <img src="{{ url('/') }}/{{$funder->photo}}" alt="User Image">
                                            <a class="users-list-name" href="#">{{$funder->name}}</a>
                                            <span class="users-list-date">Donatur</span>
                                        </li>
                                    @endforeach
                                </ul><!-- /.users-list -->
                            </div><!-- /.box-body -->
                        @endif
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