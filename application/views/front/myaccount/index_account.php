<?php if ($this->session->userdata('id')) : ?>
    <?php $id = $this->session->userdata('id');
    $user = $this->user_model->detail($id); ?>


    <div class="container mb-3 my-5">


        <?php
        //Notifikasi
        if ($this->session->flashdata('message')) {
            echo $this->session->flashdata('message');
            unset($_SESSION['message']);
        }


        ?>

        <div class="row">
            <div class="col-md-4 mb-3">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4 col-4">
                                <img src="<?php echo base_url('assets/img/avatars/' . $user->user_image); ?>" alt="Admin" class="rounded-circle img-fluid" width="150">
                            </div>
                            <div class="col-md-8 col-8">
                                <h6><?php echo $user->user_name; ?></h6>
                                <p class="text-secondary mb-1"><i class="bi-telephone-plus"></i> <?php echo $user->user_whatsapp; ?></p>
                                <p class="text-muted font-size-sm"><?php echo $user->user_address; ?></p>
                                <!-- <a href="<?php echo base_url('myaccount/update'); ?>" class="btn btn-outline-primary">Edit Profile</a> -->
                            </div>

                        </div>
                    </div>
                </div>

            </div>

            <div class="col-md-8">
                <?php $kota_id = $user->kota_id;
                ?>

                <div class="card mb-3">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-3">
                                <h6 class="mb-0">Full Name</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                                <?php echo $user->user_name; ?>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <h6 class="mb-0">Email</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                                <?php echo $user->email; ?>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <h6 class="mb-0">Phone</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                                <?php echo $user->user_whatsapp; ?>
                            </div>
                        </div>
                        <hr>

                        <div class="row">
                            <div class="col-sm-3">
                                <h6 class="mb-0">Address</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                                <?php echo $user->user_address; ?>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>



























    </div>


<?php else : ?>

    <?php redirect('auth'); ?>


<?php endif; ?>