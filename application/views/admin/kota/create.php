<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#Tambah">
    <i class="fa fa-plus"></i> Tambah Baru
</button>

<div class="modal modal-default fade" id="Tambah">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Tambah Kota</h4>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>

            </div>
            <div class="modal-body">
                <?php
                //Form Open
                echo form_open('admin/kota',  array('class' => 'needs-validation', 'novalidate' => 'novalidate'));
                ?>

                <div class="form-group mb-3">
                    <label>Nama Kota</label>
                    <input type="text" class="form-control" name="kota_name" placeholder="Nama Kota" required>
                    <div class="invalid-feedback">Silahkan masukan nama Kota</div>
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