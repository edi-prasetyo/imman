<div class="row">


    <div class="col-md-6 mx-auto">
        <div class="card">

            <?php
            echo form_open('admin/profile/update_password');
            ?>
            <div class="card-header bg-white">Ubah Password, <?php echo $user->user_name; ?></div>
            <div class="card-body">



                <div class="row">

                    <div class="col-md-3 ">Password Baru</div>
                    <div class="col-md-9">
                        <div class="form-group mb-3">
                            <input type="password" class="form-control" name="password1" placeholder="Password">
                            <?php echo form_error('password1', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                    </div>

                    <div class="col-md-3 mb-3">Ulangi Password</div>
                    <div class="col-md-9">
                        <div class="form-group mb-3">
                            <input type="password" class="form-control" name="password2" placeholder="Repeat Password">
                        </div>
                    </div>

                    <div class="col-md-3 mb-3"></div>
                    <div class="col-md-9 mb-3">
                        <button type="submit" class="btn btn-primary">
                            Update Password
                        </button>
                    </div>
                </div>
            </div>
            <?php echo form_close(); ?>
        </div>
    </div>
</div>