<div id="scholarship-modal" class="modal fade" role="dialog" >
    <form role="form" id="form-scholarship" enctype="multipart/form-data">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div id="simple-clone" class="demo-wrap">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Form Usulan Beasiswa</h4>
                    </div>
                    <div class="modal-body">
                        <div class="form-group hide">
                            <label>Token</label>
                            <input type="text" name="_token" value="{{csrf_token()}}" class="form-control" placeholder="Ketik nama">
                        </div>
                        <div class="form-group">
                            <label>Nama</label>
                            <input type="text" name="student_name" class="form-control" placeholder="Masukkan nama siswa"/>
                        </div>
                        <div class="form-group">
                            <label>Foto</label>
                            <input type="file" name="picture" class="form-control" placeholder="Masukkan foto profil siswa"/>
                        </div>
                        {{--<div class="form-group">--}}
                            {{--<label>Video</label>--}}
                            {{--<input type="text" name="video" class="form-control" placeholder="Masukkan link video profil siswa. i.e https://www.youtube.com/"/>--}}
                        {{--</div>--}}
                        <div class="form-group">
                            <label>Alamat</label>
                            <select name="location_id" class="form-control"></select>
                        </div>
                        <div class="form-group">
                            <label>Batas Waktu</label>
                            <input type="text" name="deadline" class="form-control" readonly/>
                        </div>
                        <div class="form-group">
                            <label>Deskripsi</label>
                            <textarea name="description" class="form-control" style="resize: none;" placeholder="Deskripsikan profil siswa"></textarea>
                        </div>
                    </div>
                    <div class="modal-header">
                        <h4 class="modal-title">Detail Dana Yang Dibutuhkan</h4>
                    </div>
                    <div class="modal-body toclone">
                        <div class="form-group">
                            <label>Peruntukan Dana</label>
                            <input type="text" name="label[]" class="form-control" placeholder="Ketik peruntukan dana; contoh: spp, uang saku, dll"/>
                        </div>
                        <div class="form-group">
                            <label></label>
                            <div class="input-group">
                                <span class="input-group-addon"><strong>Rp.</strong></span>
                                <input type="text" name="total[]" class="form-control currency" placeholder="Contoh: 100.000, 500.000, dll" data-a-sep="." data-a-dec="," data-d-group="3" data-v-max="99999999999" data-v-min="0"/>
                            </div>
                        </div>
                        <a href="javascript:;" class="clone btn btn-default">Tambah Dana</a>
                        {{--<a href="javascript:;" class="delete">delete</a>--}}
                        {{--<div class="col-lg-12 dashed-underline"></div>--}}
                    </div>

                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>

<div id="donation-modal" class="modal fade" role="dialog" >
    <form role="form" id="form-donation" enctype="multipart/form-data">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Form Donasi</h4>
                </div>
                <div class="modal-body">
                    <div class="form-group hide">
                        <label>Token</label>
                        <input type="text" name="_token" value="{{csrf_token()}}" class="form-control" placeholder="Ketik nama">
                    </div>
                    <div class="form-group hide">
                        <label>Scholarship ID</label>
                        <input type="text" name="scholarship_id" class="form-control" placeholder="Masukan total donasi"/>
                    </div>
                    <div class="form-group">
                        <label>Total Donasi</label>
                        <div class="input-group">
                            <span class="input-group-addon"><strong>Rp.</strong></span>
                            <input type="text" name="total" class="form-control currency" placeholder="Masukan total donasi" data-a-sep="." data-a-dec="," data-d-group="3" data-v-max="99999999999" data-v-min="0"/>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </div>
        </div>
    </form>
</div>
