<div class="col-md-6 mx-auto">
    <div class="card">
        <div class="card-header">
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
            echo form_open_multipart('admin/pengurus/update/' . $pengurus->id,  array('class' => 'needs-validation', 'novalidate' => 'novalidate'))
            ?>
            <div class="form-group row mb-3">
                <label class="col-md-4 col-form-label text-md-right">Ganti Foto</label>
                <div class="col-md-8">
                    <input type="file" class="form-control" name="user_image">
                    <img width="50%" class="img-fluid" src="<?php echo base_url('assets/img/avatars/' . $pengurus->user_image); ?>">
                </div>
            </div>
            <!-- Provinsi -->
            <div class="form-group row mb-3">
                <label class="col-md-4 text-md-right">Provinsi</label>
                <div class="col-md-8">
                    <select class="form-control select2bs4" id='sel_provinsi' name="provinsi_id" required>
                        <option value="">-- Pilih Provinsi --</option>
                        <?php
                        foreach ($provinsi as $provinsi) {
                            echo "<option value='" . $provinsi['id'] . "'>" . $provinsi['provinsi_name'] . "</option>";
                        }
                        ?>
                    </select>
                    <div class="invalid-feedback">Silahkan Pilih Provinsi.</div>
                </div>
            </div>

            <!-- Kota -->
            <div class="form-group row mb-3">
                <label class="col-md-4 text-md-right">Kota</label>
                <div class="col-md-8">
                    <select class="form-control select2bs4" id='sel_kota' name="kota_id" required>
                        <option value="">-- Pilih Kota --</option>
                    </select>
                    <div class="invalid-feedback">Silahkan Pilih Kota.</div>
                </div>
            </div>
            <!-- Kota -->
            <div class="form-group row mb-3">
                <label class="col-md-4 text-md-right">Tipe Pengurus</label>
                <div class="col-md-8">
                    <select class="form-control select2bs4" name="user_type" required>
                        <option value="">-- Pilih tipe --</option>
                        <option value="DPP">DPP</option>
                        <option value="DPD">DPD</option>
                        <option value="DPC">DPC</option>
                    </select>
                    <div class="invalid-feedback">Silahkan Pilih Tipe User.</div>
                </div>
            </div>

            <div class="form-group row mb-3">
                <label class="col-md-4 col-form-label text-md-right">Jabatan</label>
                <div class="col-md-8">
                    <select class="form-control select2bs4" name="jabatan_id" value="" required>

                        <?php foreach ($jabatan as $data) : ?>
                            <option value='<?php echo $data->id; ?>' <?php if ($pengurus->jabatan_id == $data->id) {
                                                                            echo "selected";
                                                                        } ?>><?php echo $data->jabatan_name; ?></option>
                        <?php endforeach; ?>
                    </select>
                    <div class="invalid-feedback">Silahkan Pilih Jabatan.</div>
                </div>
            </div>
            <div class="form-group row mb-3">
                <label class="col-md-4 text-md-right">Hak Akses</label>
                <div class="col-md-8">
                    <select class="form-control select2bs4" name="role_id" required>
                        <option value="">-- Pilih tipe --</option>
                        <option value="1" <?php if ($pengurus->role_id == 1) {
                                                echo "selected";
                                            } ?>>Superadmin</option>
                        <option value="2" <?php if ($pengurus->role_id == 2) {
                                                echo "selected";
                                            } ?>>Admin</option>
                        <option value="3" <?php if ($pengurus->role_id == 3) {
                                                echo "selected";
                                            } ?>>Pengurus</option>
                        <option value="4" <?php if ($pengurus->role_id == 4) {
                                                echo "selected";
                                            } ?>>Anggota</option>
                    </select>
                    <div class="invalid-feedback">Silahkan Pilih Tipe User.</div>
                </div>
            </div>


            <div class="form-group row mb-3">
                <label class="col-md-4 col-form-label text-md-right">Nama Lengkap</label>
                <div class="col-md-8">
                    <input type="text" class="form-control" name="name" placeholder="Nama Lengkap" value="<?php echo $pengurus->user_name; ?>" required>
                    <div class="invalid-feedback">Silahkan Masukan Nama Lengkap.</div>
                </div>
            </div>

            <div class="form-group row mb-3">
                <label class="col-md-4 text-md-right">Jenis Kelamin</label>
                <div class="col-md-8">
                    <select class="form-control select2bs4" name="gender" required>
                        <option value="Pria" <?php if ($pengurus->gender == "Pria") {
                                                    echo "selected";
                                                } ?>>Pria</option>
                        <option value="Wanita" <?php if ($pengurus->gender == "Wanita") {
                                                    echo "selected";
                                                } ?>>Wanita</option>
                    </select>
                    <div class="invalid-feedback">Silahkan Pilih Tipe User.</div>
                </div>
            </div>

            <div class="form-group row mb-3">
                <label class="col-md-4 col-form-label text-md-right">Allamat Lengkap</label>
                <div class="col-md-8">
                    <textarea class="form-control" name="user_address" placeholder="Alamat Lengkap" value="<?php echo $pengurus->user_address; ?>" required><?php echo $pengurus->user_address; ?></textarea>
                    <div class="invalid-feedback">Silahkan Masukan Alamat Lengkap.</div>
                </div>
            </div>
            <div class="form-group row mb-3">
                <label class="col-md-4 col-form-label text-md-right">Nomor Hp</label>
                <div class="col-md-8">
                    <input type="text" class="form-control" name="user_whatsapp" placeholder="Nomor Handphone" value="<?php echo $pengurus->user_whatsapp; ?>" required>
                    <div class="invalid-feedback">Silahkan Masukan Nomor Handphone.</div>
                </div>
            </div>
            <div class="form-group row mb-3">
                <label class="col-md-4 col-form-label text-md-right">Email</label>
                <div class="col-md-8">
                    <input type="email" class="form-control" name="email" placeholder="Email Address" value="<?php echo $pengurus->email; ?>" style="text-transform: lowercase" required>
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





<!-- Script -->
<script src="<?php echo base_url(); ?>assets/template/admin/vendor/jquery/jquery.min.js"></script>

<script type='text/javascript'>
    // baseURL variable
    var baseURL = "<?php echo base_url(); ?>";

    $(document).ready(function() {

        // Provinsi change
        $('#sel_provinsi').change(function() {
            var provinsi = $(this).val();

            // AJAX request
            $.ajax({
                url: '<?= base_url() ?>admin/wilayah/getKota',
                method: 'post',
                data: {
                    <?= $this->security->get_csrf_token_name(); ?>: "<?= $this->security->get_csrf_hash(); ?>",
                    provinsi: provinsi
                },
                dataType: 'json',
                success: function(response) {

                    // Remove options 
                    // $('#sel_kecamatan').find('option').not(':first').remove();
                    $('#sel_kota').find('option').not(':first').remove();

                    // Add options
                    $.each(response, function(index, data) {
                        $('#sel_kota').append('<option value="' + data['id'] + '">' + data['kota_name'] + '</option>');
                    });
                }
            });
        });

        // Kota change


    });
</script>