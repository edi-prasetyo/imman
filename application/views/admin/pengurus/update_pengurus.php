<div class="col-md-6 mx-auto my-5">
    <div class="card">
        <div class="card-header">
            <?php echo $title; ?>
        </div>
        <div class="card-body">

            <?php
            echo form_open_multipart('admin/pengurus_dpd/update/' . $pengurus_dpd->id,  array('class' => 'needs-validation', 'novalidate' => 'novalidate'))
            ?>
            <div class="form-group row mb-3">
                <label class="col-md-4 col-form-label text-md-right">Ganti Foto</label>
                <div class="col-md-8">
                    <input type="file" class="form-control" name="user_image" required>
                    <div class="invalid-feedback">Tidak Ada Gambar Yang di pilih</div>
                    <img class="img-fluid mt-3" src="<?php echo base_url('assets/img/avatars/' . $pengurus_dpd->user_image); ?>">
                </div>
            </div>


            <div class="form-group row mb-3">
                <label class="col-md-4 col-form-label text-md-right">Jabatan</label>
                <div class="col-md-8">
                    <select class="form-control select2bs4" name="jabatan_id" value="" required>
                        <option value=''>-- Pilih Jabatan --</option>
                        <?php foreach ($jabatan as $data) : ?>
                            <option value='<?php echo $data->id; ?>' <?php if ($pengurus_dpd->jabatan_id == $data->id) {
                                                                            echo "selected";
                                                                        } ?>><?php echo $data->jabatan_name; ?></option>
                        <?php endforeach; ?>
                    </select>
                    <div class="invalid-feedback">Silahkan Pilih Jabatan.</div>
                </div>
            </div>

            <div class="form-group row mb-3">
                <label class="col-md-4 text-md-right">Dai</label>
                <div class="col-md-8">
                    <select class="form-control select2bs4" name="user_dai" required>
                        <option value="">-- Pilih Dai --</option>
                        <option value="Muballigh" <?php if ($pengurus_dpd->user_dai == "Muballigh") {
                                                        echo "selected";
                                                    } ?>>Muballigh</option>
                        <option value="Muballighoh" <?php if ($pengurus_dpd->user_dai == "Muballighoh") {
                                                        echo "selected";
                                                    } ?>>Muballighoh</option>
                    </select>
                    <div class="invalid-feedback">Silahkan Pilih Tipe User.</div>
                </div>
            </div>




            <div class="form-group row mb-3">
                <label class="col-md-4 col-form-label text-md-right">Nama Lengkap</label>
                <div class="col-md-8">
                    <input type="text" class="form-control" name="name" placeholder="Nama Lengkap" value="<?php echo $pengurus_dpd->user_name; ?>" required>
                    <div class="invalid-feedback">Silahkan Masukan Nama Lengkap.</div>
                </div>
            </div>

            <?php if ($pengurus_dpd->role_id == 2) : ?>
            <?php else : ?>

                <div class="form-group row mb-3">
                    <label class="col-md-4 text-md-right">Hak Akses</label>
                    <div class="col-md-8">
                        <select class="form-control select2bs4" name="role_id" required>
                            <option value="">-- Pilih tipe --</option>
                            <option value="3" <?php if ($pengurus_dpd->role_id == "3") {
                                                    echo "selected";
                                                } ?>>Pengurus</option>
                            <option value="4" <?php if ($pengurus_dpd->role_id == "4") {
                                                    echo "selected";
                                                } ?>>Anggota</option>
                        </select>
                        <div class="invalid-feedback">Silahkan Pilih Tipe User.</div>
                    </div>
                </div>
                <div class="form-group row mb-3">
                    <label class="col-md-4 text-md-right">Jenis Kelamin</label>
                    <div class="col-md-8">
                        <select class="form-control select2bs4" name="gender" required>
                            <option value="">-- Jenis Kelamin --</option>
                            <option value="Pria" <?php if ($pengurus_dpd->gender == "Pria") {
                                                        echo "selected";
                                                    } ?>>Pria</option>
                            <option value="Wanita">Wanita</option>
                        </select>
                        <div class="invalid-feedback">Silahkan Pilih Tipe User.</div>
                    </div>
                </div>
            <?php endif; ?>




            <div class="form-group row mb-3">
                <label class="col-md-4 col-form-label text-md-right">Nomor Hp</label>
                <div class="col-md-8">
                    <input type="text" class="form-control" name="user_whatsapp" placeholder="Nomor Handphone" value="<?php echo $pengurus_dpd->user_whatsapp; ?>" required>
                    <div class="invalid-feedback">Silahkan Masukan Nomor Handphone.</div>
                </div>
            </div>
            <div class="form-group row mb-3">
                <label class="col-md-4 col-form-label text-md-right">Email</label>
                <div class="col-md-8">
                    <input type="email" class="form-control" name="email" placeholder="Email Address" value="<?php echo $pengurus_dpd->email; ?>" style="text-transform: lowercase" required>
                    <div class="invalid-feedback">Silahkan Masukan Alamat Email.</div>
                </div>
            </div>
            <div class="form-group row mb-3">
                <label class="col-md-4 col-form-label text-md-right">Password</label>
                <div class="col-md-8">
                    <input type="password" class="form-control" name="password1" placeholder="Password">
                    <?php echo form_error('password1', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
            </div>
            <div class="form-group row mb-3">
                <label class="col-md-4 col-form-label text-md-right">Ulangi Password</label>
                <div class="col-md-8">
                    <input type="password" class="form-control" name="password2" placeholder="Repeat Password">

                </div>
            </div>
            <div class="form-group row mb-3">
                <label class="col-md-4 col-form-label text-md-right"></label>
                <div class="col-md-8">
                    <button type="submit" class="btn btn-primary btn-block">
                        Update Account
                    </button>
                </div>

                <?php echo form_close() ?>

            </div>
        </div>
    </div>
</div>