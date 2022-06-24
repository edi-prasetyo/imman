<div class="col-md-7 mx-auto">
    <div class="row">
        <div class="col mb-3">
            <div class="card">
                <div class="card-body">
                    <div class="e-profile">
                        <div class="row">
                            <div class="col-12 col-sm-auto mb-3">

                                <div class="img-frame">
                                    <img src="<?php echo base_url('assets/img/avatars/' . $user->user_image); ?>" class="d-flex justify-content-center align-items-center rounded">
                                </div>

                            </div>
                            <div class=" col d-flex flex-column flex-sm-row justify-content-between mb-3">
                                <div class="text-sm-left mb-2 mb-sm-0">
                                    <h4 class="pt-sm-2 pb-1 mb-0 text-nowrap"><?php echo $user->user_name; ?></h4>
                                    <p class="mb-0"><?php echo $user->jabatan_name; ?></p>
                                    <div class="text-muted"><small><?php echo $user->email; ?></small></div>
                                    <span class="badge bg-secondary"><?php echo $user->user_type; ?></span>
                                    <div class="text-muted"><small>ID : <?php echo str_pad($user->id, 5, '0', STR_PAD_LEFT); ?></small></div>

                                </div>

                            </div>
                        </div>

                        <div class="tab-content pt-3">
                            <div class="tab-pane active">
                                <?php
                                echo form_open_multipart('admin/profile/update');
                                ?>
                                <div class="row">
                                    <div class="col">
                                        <div class="form-group mb-3">
                                            <label>Ganti Foto</label>
                                            <input class="form-control" type="file" name="user_image" />
                                        </div>
                                        <div class="row">
                                            <div class="col">
                                                <div class="form-group mb-3">
                                                    <label>Nama</label>
                                                    <input class="form-control" type="text" name="user_name" value="<?php echo $user->user_name; ?>">
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="form-group mb-3">
                                                    <label>Email</label>
                                                    <input class="form-control" type="text" name="email" value="<?php echo $user->email; ?>">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col">
                                                <div class="form-group mb-3">
                                                    <label>Nomor Whatsapp</label>
                                                    <?php $hp = $user->user_whatsapp;
                                                    $hp0 = substr_replace($hp, '0', 0, 2);
                                                    ?>
                                                    <input class="form-control" type="text" name="user_whatsapp" value="<?php echo $hp0; ?>">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col">
                                                <div class="form-group mb-3">
                                                    <div class="form-check mt-3">
                                                        <input name="default-radio-1" class="form-check-input" type="radio" name="whatsapp_option" value="1" id="defaultRadio1" <?php if ($user->whatsapp_option == 1) {
                                                                                                                                                                                    echo "checked";
                                                                                                                                                                                } ?> />
                                                        <label class="form-check-label" for="defaultRadio1"> Tampilkan Nomor </label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input name="default-radio-1" class="form-check-input" type="radio" name="whatsapp_option" value="0" id="defaultRadio2" <?php if ($user->whatsapp_option == 0) {
                                                                                                                                                                                    echo "checked";
                                                                                                                                                                                } ?> />
                                                        <label class="form-check-label" for="defaultRadio2"> Sembunyikan Nomor </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>



                                        <div class="row">
                                            <div class="col mb-3">
                                                <div class="form-group mb-3">
                                                    <label>Alamat</label>
                                                    <textarea class="form-control" name="user_address" rows="5"><?php echo $user->user_address; ?></textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col mb-3">
                                                <div class="form-group mb-3">
                                                    <label>Biografi</label>
                                                    <textarea class="form-control" name="user_bio" rows="5" id="my-editor"><?php echo $user->user_bio; ?></textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col">
                                        <button class="btn btn-primary" type="submit">Simpan</button>
                                    </div>
                                </div>
                                <?php echo form_close(); ?>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>