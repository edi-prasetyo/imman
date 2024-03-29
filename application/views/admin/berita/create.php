<div class="card mb-4">
    <div class="card-header py-3">
        <?php echo $title; ?>
    </div>
    <div class="card-body">


        <div class="text-center">
            <?php
            echo $this->session->flashdata('message');
            if (isset($errors_upload)) {
                echo '<div class="alert alert-warning">' . $error_upload . '</div>';
            }
            ?>
        </div>
        <?php
        echo form_open_multipart('admin/berita/create',  array('class' => 'needs-validation', 'novalidate' => 'novalidate'));
        ?>

        <div class="form-group row mb-3">
            <label class="col-lg-3 form-label">Judul Berita <span class="text-danger">*</span>
            </label>
            <div class="col-lg-9">
                <input type="text" class="form-control" name="berita_title" placeholder="Judul Berita" value="<?php echo set_value('berita_title'); ?>" required>
                <div class="invalid-feedback">Judul Harus Di isi</div>
            </div>
        </div>
        <div class="form-group row mb-3">
            <label class="col-lg-3 form-label">Kategori <span class="text-danger">*</span>
            </label>
            <div class="col-lg-9">
                <select name="category_id" class="form-control form-select" required>
                    <option value="">Pilih Kategori</option>
                    <?php foreach ($category as $category) { ?>
                        <option value="<?php echo $category->id ?>">
                            <?php echo $category->category_name ?>
                        </option>
                    <?php } ?>
                </select>
                <div class="invalid-feedback">Anda harus memilih Kategori</div>
            </div>
        </div>
        <div class="form-group row mb-3">
            <label class="col-lg-3 form-label">Status Berita <span class="text-danger">*</span>
            </label>
            <div class="col-lg-9">
                <select name="berita_status" class="form-control form-select" required>
                    <option value="">Pilih Status</option>
                    <option value="Publish">Publish</option>
                    <option value="Draft">Draft</option>
                </select>
                <div class="invalid-feedback">Silahkan pilih status berita</div>
            </div>
        </div>
        <div class="form-group row mb-3">
            <label class="col-lg-3 form-label">Upload Gambar <span class="text-danger">*</span>
            </label>
            <div class="col-lg-6">
                <div class="input-group mb-3">
                    <input type="file" name="berita_gambar" required>
                    <div class="invalid-feedback">Silahkan pilih gambar</div>
                </div>
            </div>
        </div>
        <div class="form-group row mb-3">
            <label class="col-lg-3 form-label">Deskripsi Berita <span class="text-danger">*</span>
            </label>
            <div class="col-lg-9">

                <textarea class="form-control" id="summernote" name="berita_desc" placeholder="Deskripsi Berita" required></textarea>
                <div class="invalid-feedback">Silahkan Isi Deskripsi Berita</div>
            </div>
        </div>
        <div class="form-group row mb-3">
            <label class="col-lg-3 form-label">Keywords
            </label>
            <div class="col-lg-9">
                <input type="text" class="form-control" name="berita_keywords" placeholder="Pisahkan dengan koma" value="<?php echo set_value('berita_keywords'); ?>">
            </div>
        </div>

        <div class="form-group row mb-3">
            <div class="col-lg-3"></div>
            <div class="col-lg-9">
                <button type="submit" class="btn btn-primary btn-lg btn-block">
                    Publish Berita
                </button>
            </div>
        </div>
        <?php echo form_close() ?>
    </div>
</div>