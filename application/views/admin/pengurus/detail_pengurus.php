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
                        <div class="col-md-12 col-12">
                            <div class="img-foto">
                                <img src="<?php echo base_url('assets/img/avatars/' . $pengurus_dpd->user_image); ?>" alt="Admin" class="img-fluid">
                            </div>
                        </div>


                    </div>
                </div>
            </div>

        </div>

        <div class="col-md-8">

            <div class="card mb-3">
                <div class="card-body">
                    <label>

                        <label>ID</label>

                        <div class="text-secondary">
                            <b><?php echo str_pad($pengurus_dpd->id, 5, '0', STR_PAD_LEFT); ?></b>
                        </div>
                    </label>
                    <hr>
                    <label>

                        <label>Full Name</label>

                        <div class="text-secondary">
                            <b><?php echo $pengurus_dpd->user_name; ?></b>
                        </div>
                    </label>
                    <hr>
                    <label>

                        <label>Email</label>

                    </label>
                    <div class="text-secondary">
                        <b> <?php echo $pengurus_dpd->email; ?></b>
                    </div>

                    <hr>
                    <div>
                        <label>
                            <label>Phone</label>
                        </label>
                        <div class="text-secondary">
                            <b><?php echo $pengurus_dpd->user_whatsapp; ?></b>
                        </div>
                    </div>
                    <hr>

                    <div class="row">
                        <div class="col-sm-3">
                            <label>Address</label>
                        </div>
                        <div class="text-secondary">
                            <b> <?php echo $pengurus_dpd->user_address; ?></b>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>



</div>