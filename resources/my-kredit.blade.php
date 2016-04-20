<div class="col-sm-12 wow animated bounceInUp" >
    <div class="row hide">
        <div class="col-sm-6">
            <div class="box box-widget">
                <a href="#tab-kredit" data-toggle="tab">
                    <div class="box-header with-border">
                        <span class="username users-list-name text-blue">Kredit</span>
                        <span class="description users-list-name">Kredit lebih mempermudah donasi</span>
                    </div><!-- /.box-header -->
                </a>
            </div>
        </div>
        <div class="col-sm-6">
            <div class="box box-widget">
                <a href="#tab-mutasi" data-toggle="tab">
                    <div class="box-header with-border">
                        <span class="username users-list-name text-blue">Mutasi</span>
                        <span class="description users-list-name">Status kredit anda ada disini</span>
                    </div><!-- /.box-header -->
                </a>
            </div>
        </div>
    </div>
    <div class="row wow animated bounceInUp">
        <div class="col-sm-12">
            <div class="tab-content">
                <div class="tab-pane fade active in" id="tab-kredit">
                    <div class="box box-solid">
                        <div class="box-header with-border">
                            <h3 class="box-title">Kredit</h3>
                        </div>
                        <div class="box-body">
                            <table id="dt-kredit" class="table table-bordered table-striped"></table>
                        </div><!-- /.box-body -->
                    </div>
                </div>
                <div class="tab-pane fade" id="tab-mutasi">
                    <div class="box box-solid">
                        <div class="box-header with-border">
                            <h3 class="box-title">Mutasi</h3>
                        </div>
                        <form role="form" id="form-password">
                            <div class="box-body">
                                <div class="form-group hide">
                                    <label>Token</label>
                                    <input type="text" name="_token" value="{{csrf_token()}}" class="form-control" placeholder="Ketik nama">
                                </div>
                                <div class="form-group">
                                    <label>Password Lama</label>
                                    <input type="password" class="form-control" name="old_password" value="" placeholder="Ketik password lama">
                                </div>
                                <div class="form-group">
                                    <label>Password Baru</label>
                                    <input type="password" class="form-control" name="new_password" value="" placeholder="Ketik password baru">
                                </div>
                                <div class="form-group">
                                    <label>Konfirmasi Password Baru</label>
                                    <input type="password" class="form-control" name="re_new_password" value="" placeholder="Ketik konfirmasi password baru">
                                </div>
                            </div><!-- /.box-body -->

                            <div class="box-footer">
                                <button type="submit" class="btn btn-primary">Daftar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>