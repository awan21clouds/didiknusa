@extends('layout.master')

@section('content')
    <div class="container">
        <!-- Main content -->
        <section class="content">
            <ul class="hide" id="default-content">
                <li alt="my-profil">00fb9a11afb139bec093f26de55f6a48</li>
                <li alt="my-donation">6bd5e42dc5f6f7e1dc1abd02e4e1c1c3</li>
                <li alt="my-scholarship">959e7488950a8be627a60e1e5cf5a966</li>
                <li alt="my-kredit">6114c81635b4a886802041a766ceafd1</li>
                <li alt="locate">0fb06b8668bc945364ab878956addceb</li>
                <li alt="bank">bd5af1f610a12434c9128e4a399cef8a</li>
            </ul>
            <div class="row wow animated fadeInRight">
                <div class="col-md-4">
                    <div class="box box-widget">
                        <div class="box-header with-border">
                            <div id="kv-avatar-errors" class="center-block" style="width:800px;display:none"></div>
                            <form id="form-photo" class="text-center" action="{{ url('/') }}/member/updatePhoto" method="post" enctype="multipart/form-data">
                                <div class="col-md-12">
                                    <div class="kv-avatar" style="display: block; margin: 0 50px;">
                                        <input id="avatar" name="photo" type="file" class="file-loading">
                                    </div>
                                </div>
                                <div class="form-group hide">
                                    <label>Token</label>
                                    <input type="text" name="_token" value="{{csrf_token()}}" class="form-control" placeholder="Ketik nama">
                                </div>
                                <!-- include other inputs if needed and include a form submit (save) button -->
                            </form>
                            {{--<img class="img-thumbnail img-circle" src="{{ url('/') }}/public/adminLTE/dist/img/avatar5.png" alt="user image" style="display: block; margin: 0 auto;">--}}
                            <div class="box-tools">
                                <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                            </div><!-- /.box-tools -->
                        </div><!-- /.box-header -->
                        <div class="box-body no-padding" id="profil">
                            <div class="col-sm-6 border-right">
                                <dl>
                                    <dt>ID</dt>
                                    <dd alt="member_id">1242016040907543682</dd>
                                    <dt>Nama</dt>
                                    <dd alt="name">John</dd>
                                    <dt>Telepon</dt>
                                    <dd alt="phone">-</dd>
                                </dl>
                            </div>
                            <div class="col-sm-6">
                                <dl>
                                    <dt>Email</dt>
                                    <dd alt="email">-</dd>
                                    <dt>Biografi</dt>
                                    <dd alt="biography">-</dd>
                                    <dt>Terdaftar</dt>
                                    <dd alt="register_date">dd-mm-YYYY</dd>
                                </dl>
                            </div>
                        </div>

                        <div class="box-body no-padding" style="display: block; border-bottom: 1px solid #f3f3f3;">
                        </div>
                        <div class="box-footer no-padding" style="display: block;">
                            <ul class="nav nav-pills nav-stacked" id="profil-navigation">
                                <li><a href="javascript:;" class="profil-content-loader" alt="my-profil"><i class="fa fa-user"></i> Profil</a></li>
                                @if(Session::get('member')->status == 1)
                                    <li><a href="javascript:;" class="profil-content-loader" alt="locate"><i class="fa fa-map"></i> Lokasi</a></li>
                                    <li><a href="javascript:;" class="profil-content-loader" alt="bank"><i class="fa fa-bank"></i> Bank</a></li>
                                @else
                                    <li><a href="javascript:;" class="profil-content-loader" alt="my-donation"><i class="fa fa-heart"></i> Donasi</a></li>
                                    <li><a href="javascript:;" class="profil-content-loader" alt="my-scholarship"><i class="fa fa-graduation-cap"></i> Beasiswa</a></li>
                                    <li><a href="javascript:;" class="profil-content-loader" alt="my-kredit"><i class="fa fa-credit-card"></i> Kredit </a></li>
                                @endif

                            </ul>
                        </div><!-- /.box-body -->
                    </div>
                </div>
                <div class="col-md-8 wow animated bounceInUp">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="box box-solid">
                                @if(Session::get('member')->status == 1)
                                    <div class="box-header with-border">
                                        <h3 class="box-title">Peta Lokasi</h3>
                                    </div>
                                    <div class="box-body">
                                        <div id="map" style="height: 300px;"></div>
                                    </div><!-- /.box-body -->
                                @else
                                    <div class="box-body no-padding">
                                        <div class="col-sm-4 border-right">
                                            <div class="description-block">
                                                <span class="description-percentage"><i class="fa fa-heart" style="font-size: 100px;"></i> </span>
                                                <h5 class="description-header" id="donation_count"></h5>
                                                <span class="description-text">Donasi</span>
                                            </div><!-- /.description-block -->
                                        </div><!-- /.col -->
                                        <div class="col-sm-4 border-right">
                                            <div class="description-block">
                                                <span class="description-percentage"><i class="fa fa-graduation-cap" style="font-size: 100px;"></i></span>
                                                <h5 class="description-header" id="scholarship_count"></h5>
                                                <span class="description-text">Beasiswa</span>
                                            </div><!-- /.description-block -->
                                        </div><!-- /.col -->
                                        <div class="col-sm-4">
                                            <div class="description-block">
                                                <span class="description-percentage"><i class="fa fa-credit-card" style="font-size: 100px;"></i></span>
                                                <h5 class="description-header" id="credit_count"></h5>
                                                <span class="description-text">Kredit</span>
                                            </div><!-- /.description-block -->
                                        </div><!-- /.col -->
                                    </div><!-- /.box-footer -->
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="row" id="profil-content"></div>
                </div>
            </div>
        </section><!-- /.content -->
    </div><!-- /.container -->
    <script src="../adminLTE/plugins/jQuery/jQuery-2.1.4.min.js"></script>
    <script src="../adminLTE/dist/js/profil.js"></script>
    <script src="../adminLTE/dist/js/myprofil.js"></script>
    <script src="../adminLTE/dist/js/bank.js"></script>
    <script src="../adminLTE/dist/js/donation.js"></script>
    @include('layout.script')
@endsection