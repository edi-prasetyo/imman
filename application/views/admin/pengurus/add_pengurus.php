<div class="col-md-6 mx-auto my-5">
    <div class="card">
        <div class="card-header">
            <?php echo $title; ?>
        </div>
        <div class="card-body">

            <?php
            echo form_open_multipart('admin/pengurus_dpd/create')
            ?>
            <div class="form-group row mb-3">
                <label class="col-md-4 col-form-label text-md-right">Upload Foto</label>
                <div class="col-md-8">
                    <input type="file" class="form-control" name="user_image" required>

                </div>
            </div>


            <div class="form-group row mb-3">
                <label class="col-md-4 col-form-label text-md-right">Jabatan</label>
                <div class="col-md-8">
                    <select class="form-control select2bs4" name="jabatan_id" value="">
                        <option value=''>-- Pilih Jabatan --</option>
                        <?php foreach ($jabatan as $data) : ?>
                            <option value='<?php echo $data->id; ?>'><?php echo $data->jabatan_name; ?></option>
                        <?php endforeach; ?>
                    </select>
                    <?php echo form_error('jabatan_id', '<small class="text-danger">', '</small>'); ?>
                </div>
            </div>

            <div class="form-group row mb-3">
                <label class="col-md-4 text-md-right">Dai</label>
                <div class="col-md-8">
                    <select class="form-control select2bs4" name="user_dai">
                        <option value="">-- Pilih Dai --</option>
                        <option value="Muballigh">Muballigh</option>
                        <option value="Muballighoh">Muballighoh</option>
                    </select>
                    <?php echo form_error('user_dai', '<small class="text-danger">', '</small>'); ?>
                </div>
            </div>

            <div class="form-group row mb-3">
                <label class="col-md-4 text-md-right">Hak Akses</label>
                <div class="col-md-8">
                    <select class="form-control select2bs4" name="role_id">
                        <option value="">-- Pilih tipe --</option>
                        <option value="3">Pengurus</option>
                        <option value="4">Anggota</option>
                    </select>
                    <?php echo form_error('role_id', '<small class="text-danger">', '</small>'); ?>
                </div>
            </div>


            <div class="form-group row mb-3">
                <label class="col-md-4 col-form-label text-md-right">Nama Lengkap</label>
                <div class="col-md-8">
                    <input type="text" class="form-control" name="name" placeholder="Nama Lengkap" value="<?php echo set_value('user_name'); ?>">
                    <?php echo form_error('user_name', '<small class="text-danger">', '</small>'); ?>
                </div>
            </div>

            <div class="form-group row mb-3">
                <label class="col-md-4 text-md-right">Jenis Kelamin</label>
                <div class="col-md-8">
                    <select class="form-control select2bs4" name="gender">
                        <option value="">-- Jenis Kelamin --</option>
                        <option value="Pria">Pria</option>
                        <option value="Wanita">Wanita</option>
                    </select>
                    <?php echo form_error('gender', '<small class="text-danger">', '</small>'); ?>
                </div>
            </div>


            <div class="form-group row mb-3">
                <label class="col-md-4 col-form-label text-md-right">Nomor Hp</label>
                <div class="col-md-8">
                    <input type="text" class="form-control" name="user_whatsapp" placeholder="Nomor Handphone" value="<?php echo set_value('user_whatsapp'); ?>">
                    <?php echo form_error('user_whatsapp', '<small class="text-danger">', '</small>'); ?>
                </div>
            </div>
            <div class="form-group row mb-3">
                <label class="col-md-4 col-form-label text-md-right">Email</label>
                <div class="col-md-8">
                    <input type="email" class="form-control" name="email" placeholder="Email Address" value="<?php echo set_value('email'); ?>" style="text-transform: lowercase">
                    <?php echo form_error('email', '<small class="text-danger">', '</small>'); ?>
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
                        Register Account
                    </button>
                </div>

                <?php echo form_close() ?>



            </div>
        </div>
    </div>
</div>