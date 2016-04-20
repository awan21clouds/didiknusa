<div class="col-sm-12 wow animated bounceInUp">
    <div class="row hide">
        <div class="col-sm-6">
            <div class="box box-widget">
                <a href="#tab-data" data-toggle="tab" id="tab-data-trigger">
                    <div class="box-header with-border">
                        <span class="username users-list-name text-blue">Data</span>
                        <span class="description users-list-name">Menampilkan seluruh bank pembayaran</span>
                    </div><!-- /.box-header -->
                </a>
            </div>
        </div>
        <div class="col-sm-6">
            <div class="box box-widget">
                <a href="#tab-new" data-toggle="tab" id="tab-new-trigger">
                    <div class="box-header with-border">
                        <span class="username users-list-name text-blue">Baru</span>
                        <span class="description users-list-name">Tambah bank</span>
                    </div><!-- /.box-header -->
                </a>
            </div>
        </div>
    </div>
    <div class="row wow animated bounceInUp">
        <div class="col-sm-12">
            <div class="tab-content">
                <div class="tab-pane fade active in" id="tab-data">
                    <div class="box box-solid">
                        <div class="box-header with-border">
                            <h3 class="box-title">Donasi Saya</h3>
                        </div>
                        <div class="box-body">
                            <table id="dt-admin-donation" class="table table-bordered table-striped"></table>
                        </div><!-- /.box-body -->
                    </div>
                </div>
                <div class="tab-pane fade" id="tab-new">
                    <div class="box box-solid">
                        <div class="box-header with-border">
                            <h3 class="box-title">Form Konfirmasi Pembayaran</h3>
                        </div>
                        <form role="form" id="form-confirmation">
                            <div class="box-body">
                                <div class="form-group hide">
                                    <label>Token</label>
                                    <input type="text" name="_token" value="{{csrf_token()}}" class="form-control" placeholder="Ketik nama">
                                </div>
                                <div class="form-group hide">
                                    <label>Transaction Id</label>
                                    <input type="text" name="transaction_id" class="form-control" placeholder="Enter ..."/>
                                </div>
                                <div class="form-group">
                                    <label>Nomor Rekening Pengirim</label>
                                    <input type="text" name="account" class="form-control" placeholder="Ketik nomor rekening pengirim"/>
                                </div>
                                <div class="form-group">
                                    <label>Nama Rekening Pengirim</label>
                                    <input type="text" name="name" class="form-control" placeholder="Ketik nama rekening pengirim"/>
                                </div>
                                <div class="form-group">
                                    <label>Nama Bank Pengirim</label>
                                    <input type="text" name="bank" class="form-control" placeholder="Ketik nama bank pengirim"/>
                                </div>
                                <div class="form-group">
                                    <label>Nama Bank Tujuan</label>
                                    <select name="bank_id" class="form-control"></select>
                                </div>
                                <div class="form-group">
                                    <label>Tanggal Pembayaran</label>
                                    <input type="text" name="payment_date" class="form-control" placeholder="Ketik tanggal pembayaran" readonly/>
                                </div>
                                <div class="form-group">
                                    <label>Jumlah</label>
                                    <div class="input-group">
                                        <span class="input-group-addon"><strong>Rp.</strong></span>
                                        <input type="text" name="total" class="form-control currency" data-a-sep="." data-a-dec="," data-d-group="3" data-v-max="99999999999" data-v-min="0" placeholder="Ketik jumlah pembayaran"/>
                                    </div>
                                </div>
                            </div><!-- /.box-body -->
                            <div class="box-footer">
                                <button type="submit" class="btn btn-primary">Simpan</button>
                                <a href="#tab-data" data-toggle="tab" class="btn btn-default">Batal</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>




</div>