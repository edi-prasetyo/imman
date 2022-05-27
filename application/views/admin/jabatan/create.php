<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#Tambah">
    <i class="fa fa-plus"></i> Tambah Baru
</button>

<div class="modal modal-default fade" id="Tambah">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Tambah Jabatan</h4>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>

            </div>
            <div class="modal-body">
                <?php
                //Form Open
                echo form_open('admin/jabatan',  array('class' => 'needs-validation', 'novalidate' => 'novalidate'));
                ?>

                <div class="form-group mb-3">
                    <label>Nama Jabatan</label>
                    <input type="text" class="form-control" name="jabatan_name" placeholder="Nama Jabatan" required>
                    <div class="invalid-feedback">Silahkan masukan nama Jabatan</div>
                </div>
                <div class="form-group mb-3">
                    <label>Nomor Urut</label>
                    <input type="text" class="form-control" name="jabatan_urutan" placeholder="Nomor Urut" required>
                    <div class="invalid-feedback">Silahkan masukan Nomor Urut</div>
                </div>

                <div class="form-group mb-3">
                    <input type="submit" class="btn btn-primary" name="submit" value="Simpan Data">
                </div>


                <?php
                //Form Close
                echo form_close();
                ?>


            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-secondary pull-right" data-bs-dismiss="modal"><i class="fa fa-close"></i> Tutup</button>

            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->