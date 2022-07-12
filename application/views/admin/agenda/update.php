<div class="card mb-4">
    <div class="card-header py-3">
        <?php echo $title; ?>
    </div>
    <div class="card-body">


        <div class="text-center">
            <?php
            echo $this->session->flashdata('message');
            if (isset($error_upload)) {
                echo '<div class="alert alert-warning">' . $error_upload . '</div>';
            }
            ?>
        </div>
        <?php
        echo form_open_multipart('admin/agenda/update/' . $agenda->id,  array('class' => 'needs-validation', 'novalidate' => 'novalidate'));
        ?>

        <div class="form-group row mb-3">
            <label class="col-lg-3 col-form-label">Judul Agenda <span class="text-danger">*</span>
            </label>
            <div class="col-lg-9">
                <input type="text" class="form-control" name="agenda_title" placeholder="Judul Agenda" value="<?php echo $agenda->agenda_title; ?>" required>
                <div class="invalid-feedback">Judul Harus Di isi</div>
            </div>
        </div>

        <div class="form-group row mb-3">
            <label class="col-lg-3 col-form-label">Tanggal<span class="text-danger">*</span>
            </label>
            <div class="col-lg-9">
                <input type="date" class="form-control" name="agenda_date" id="agenda_time">
                <div class="invalid-feedback">Judul Harus Di isi</div>
            </div>
        </div>

        <div class="form-group row mb-3">
            <label class="col-lg-3 col-form-label">Judul Jam <span class="text-danger">*</span>
            </label>
            <div class="col-lg-9">
                <input type="text" class="form-control" name="agenda_jam" placeholder="Jam" value="<?php echo $agenda->agenda_jam; ?>" required>
                <div class="invalid-feedback">Judul Harus Di isi</div>
            </div>
        </div>
        <div class="form-group row mb-3">
            <label class="col-lg-3 col-form-label">Lokasi <span class="text-danger">*</span>
            </label>
            <div class="col-lg-9">
                <input type="text" class="form-control" name="agenda_location" placeholder="Lokasi" value="<?php echo $agenda->agenda_location; ?>" required>
                <div class="invalid-feedback">Judul Harus Di isi</div>
            </div>
        </div>

        <div class="form-group row mb-3">
            <label class="col-lg-3 col-form-label">Gogle Map <span class="text-danger">*</span>
            </label>
            <div class="col-lg-9">

                <textarea class="form-control" name="agenda_map" placeholder="Maps" required><?php echo $agenda->agenda_map; ?></textarea>
                <div class="invalid-feedback">Silahkan Isi Deskripsi Berita</div>
            </div>
        </div>



        <div class="form-group row mb-3">
            <label class="col-lg-3 col-form-label">Ubah Gambar <span class="text-danger">*</span>
            </label>
            <div class="col-lg-6">
                <div class="input-group mb-3">
                    <div class="row">
                        <div class="col-6">
                            <input type="file" name="agenda_image" required>
                        </div>
                        <div class="col-6">
                            <img class="img-fluid" src="<?php echo base_url('assets/img/artikel/' . $agenda->agenda_image); ?>">
                        </div>
                    </div>
                    <div class="invalid-feedback">Silahkan pilih gambar</div>
                </div>
            </div>
        </div>

        <div class="form-group row mb-3">
            <label class="col-lg-3 col-form-label">Deskripsi Agenda <span class="text-danger">*</span>
            </label>
            <div class="col-lg-9">

                <textarea class="form-control" id="my-editor" name="agenda_desc" placeholder="Deskripsi Agenda" required><?php echo $agenda->agenda_desc; ?></textarea>
                <div class="invalid-feedback">Silahkan Isi Deskripsi Berita</div>
            </div>
        </div>


        <div class="form-group row mb-3">
            <div class="col-lg-3"></div>
            <div class="col-lg-9">
                <button type="submit" class="btn btn-primary btn-lg btn-block">
                    Update Agenda
                </button>
            </div>
        </div>
        <?php echo form_close() ?>
    </div>
</div>