<h2 class="page-header text-center">Registrasi, Login & Lupa Kata Sandi</h2>
<div class="row wow animated bounceInLeft">
    <div class="col-lg-8" id="register">
        <!-- small box -->
        <div class="box box-solid">
            <div class="box-header with-border">
                <h3 class="box-title">Registrasi</h3>
            </div>
            <form role="form" id="form-registration">
                <div class="box-body">
                    <div class="form-group hide">
                        <label>Token</label>
                        <input type="text" name="_token" value="{{csrf_token()}}" class="form-control" placeholder="Ketik nama">
                    </div>
                    <div class="form-group">
                        <label>Nama</label>
                        <input type="text" name="name" class="form-control" placeholder="Ketik nama">
                    </div>
                    <div class="form-group">
                        <label>Telepon</label>
                        <input type="text" name="phone" class="form-control" placeholder="Ketik nomor telepon/ponsel">
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" name="email" class="form-control" placeholder="Ketik alamat email">
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" name="password" class="form-control" placeholder="Ketik password">
                    </div>
                    <div class="form-group">
                        <label>Konfirmasi Password</label>
                        <input type="password" name="confirm_password" class="form-control" placeholder="Ulangi ketik password">
                    </div>
                </div><!-- /.box-body -->

                <div class="box-footer">
                    <button type="submit" class="btn btn-primary">Daftar</button>
                </div>
            </form>
        </div>
    </div>
    <div class="col-lg-4" id="login">
        <div class="row">
            <div class="box box-solid">
                <div class="box-header with-border">
                    <h3 class="box-title">Masuk</h3>
                </div>
                <form role="form" id="form-login">
                    <input type="hide" name="_token" value="{{csrf_token()}}" class="form-control" placeholder="Ketik nama">
                    <div class="form-group hide">
                        <label>Token</label>
                        <input type="text" name="_token" value="{{csrf_token()}}" class="form-control" placeholder="Ketik nama">
                    </div>
                    <div class="box-body">
                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" name="email" class="form-control" placeholder="Ketik email">
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" name="password" class="form-control" placeholder="Ketik password">
                        </div>
                    </div><!-- /.box-body -->

                    <div class="box-footer">
                        <button type="submit" class="btn btn-primary">Masuk</button>
                    </div>
                </form>
            </div>
        </div>
        <div class="row wow animated bounceInRight" id="forgetPassword" style="margin-top: 4%;">
            <div class="box box-solid">
                <div class="box-header with-border">
                    <h3 class="box-title">Lupa Password</h3>
                </div>
                <form role="form" id="form-password">
                    <div class="box-body">
                        <div class="form-group hide">
                            <label>Token</label>
                            <input type="text" name="_token" value="{{csrf_token()}}" class="form-control" placeholder="Ketik nama">
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" name="email" class="form-control" placeholder="Ketik email">
                        </div>
                    </div><!-- /.box-body -->

                    <div class="box-footer">
                        <button type="submit" class="btn btn-primary">Kirim</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>