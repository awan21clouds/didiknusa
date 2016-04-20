<div class="col-sm-12 wow animated bounceInUp" >
    <div class="row">
        <div class="col-sm-6">
            <div class="box box-widget">
                <a href="#tab-personal" data-toggle="tab">
                    <div class="box-header with-border">
                        <span class="username users-list-name text-blue">Personal</span>
                        <span class="description users-list-name">Berisi informasi profil anda</span>
                    </div><!-- /.box-header -->
                </a>
            </div>
        </div>
        <div class="col-sm-6">
            <div class="box box-widget">
                <a href="#tab-password" data-toggle="tab">
                    <div class="box-header with-border">
                        <span class="username users-list-name text-blue">Ganti Password</span>
                        <span class="description users-list-name">Perbarui password anda</span>
                    </div><!-- /.box-header -->
                </a>
            </div>
        </div>
    </div>
    <div class="row wow animated bounceInUp">
        <div class="col-sm-12">
            <div class="tab-content">
                <div class="tab-pane fade active in" id="tab-personal">
                    <div class="box box-solid">
                        <div class="box-header with-border">
                            <h3 class="box-title">Personal</h3>
                        </div>
                        <form role="form" id="form-personal">
                            <div class="box-body">
                                <div class="form-group hide">
                                    <label>Token</label>
                                    <input type="text" name="_token" value="{{csrf_token()}}" class="form-control" placeholder="Ketik nama">
                                </div>
                                <div class="form-group hide">
                                    <label>Member ID</label>
                                    <input type="text" name="member_id" class="form-control" placeholder="Ketik nama">
                                </div>
                                <div class="form-group">
                                    <label>Nama</label>
                                    <input type="text" name="name" class="form-control" placeholder="Ketik nama">
                                </div>
                                <div class="form-group">
                                    <label>Telepon</label>
                                    <input type="number" name="phone" class="form-control" placeholder="Ketik nomor telepon/ponsel">
                                </div>
                                <div class="form-group">
                                    <label>Email</label>
                                    <input type="email" name="email" class="form-control" placeholder="Ketik alamat email">
                                </div>
                                <div class="form-group">
                                    <label>Alamat</label>
                                    <select name="location_id" class="form-control"></select>
                                </div>
                                <div class="form-group">
                                    <label>Biografi</label>
                                    <textarea name="biography" class="form-control" style="resize: none;"></textarea>
                                </div>
                            </div><!-- /.box-body -->
                            <div class="box-footer">
                                <button type="submit" class="btn btn-primary">Simpan</button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="tab-pane fade" id="tab-password">
                    <div class="box box-solid">
                        <div class="box-header with-border">
                            <h3 class="box-title">Ganti Password</h3>
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
                                    <input type="password" class="form-control" name="password" value="" placeholder="Ketik password baru">
                                </div>
                                <div class="form-group">
                                    <label>Konfirmasi Password Baru</label>
                                    <input type="password" class="form-control" name="confirm_password" value="" placeholder="Ketik konfirmasi password baru">
                                </div>
                            </div><!-- /.box-body -->

                            <div class="box-footer">
                                <button type="submit" class="btn btn-primary">Simpan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>