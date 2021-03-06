<div class="breadcrumb">
    <div class="container">
        <ul class="breadcrumb my-3">
            <li class="breadcrumb-item"><a href="<?php echo base_url('') ?>"><i class="ti ti-home"></i> Home</a></li>
            <li class="breadcrumb-item"><a href="<?php echo base_url('user') ?>"> User</a></li>

            <li class="breadcrumb-item active"><?php echo $title ?></li>
        </ul>
    </div>
</div>

<div class="container">
    <div class="row flex-lg-nowrap">


        <div class="col">
            <div class="row">
                <div class="col mb-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="e-profile">
                                <div class="row">
                                    <div class="col-12 col-sm-auto mb-3">
                                        <!-- <div class="mx-auto" style="width: 140px;"> -->
                                        <div class="img-foto mx-auto">
                                            <img class="img-fluid" src="<?php echo base_url('assets/img/avatars/' . $user->user_image); ?>">
                                        </div>
                                        <!-- </div> -->
                                    </div>
                                    <div class="col d-flex flex-column flex-sm-row justify-content-between mb-3">
                                        <div class="text-center text-sm-left mb-2 mb-sm-0">
                                            <h4 class="pt-sm-2 pb-1 mb-0 text-nowrap"><?php echo $user->user_name; ?></h4>
                                            <p class="mb-0"><?php echo $user->email; ?></p>

                                            <div class="mt-2">
                                                <?php if ($this->session->userdata('id')) : ?>
                                                    <a class="btn btn-primary" href="<?php echo base_url('admin/profile/update'); ?>">
                                                        <span>Ubah Profile</span>
                                                    </a>
                                                <?php else : ?>
                                                <?php endif; ?>

                                            </div>
                                        </div>
                                        <div class="text-center text-sm-right">
                                            <span class="badge badge-secondary"><?php echo $user->user_type; ?></span>
                                            <div class="text-muted"><small>Joined <?php echo $user->created_at; ?></small></div>
                                            <h4>ID : <?php echo str_pad($user->id, 5, '0', STR_PAD_LEFT); ?></h4>
                                        </div>
                                    </div>
                                </div>
                                <ul class="nav nav-tabs">
                                    <li class="nav-item"><a href="" class="active nav-link">Tentang</a></li>
                                </ul>
                                <div class="tab-content pt-3">
                                    <div class="tab-pane active">
                                        <form class="form" novalidate="">
                                            <div class="row">
                                                <div class="col">
                                                    <div class="row">
                                                        <div class="col">
                                                            <div class="form-group">
                                                                <label>Full Name</label><br>
                                                                <b><?php echo $user->user_name; ?></b>
                                                            </div>
                                                        </div>
                                                        <div class="col">
                                                            <div class="form-group">
                                                                <label>Regional</label><br>
                                                                <b><?php echo $user->user_type; ?></b>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col">
                                                            <div class="form-group">
                                                                <label>Email</label><br>
                                                                <b><?php echo $user->email; ?></b>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col mb-3">
                                                            <div class="form-group">
                                                                <label>Biografi</label><br>
                                                                <?php echo $user->user_bio; ?>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col d-flex justify-content-end">

                                                </div>
                                            </div>
                                        </form>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-md-3 mb-3">


                </div>
            </div>

        </div>
    </div>
</div>