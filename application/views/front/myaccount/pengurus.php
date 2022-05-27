<?php if ($this->session->userdata('id')) : ?>
    <div class="container my-5">
        <?php
        if ($this->session->flashdata('message')) {
            echo $this->session->flashdata('message');
            unset($_SESSION['message']);
        }
        ?>

        <a class="btn btn-primary mb-3" href="<?php echo base_url('myaccount/add_pengurus'); ?>">Tambah Pengurus</a>
        <div class="row">
            <?php foreach ($pengurus as $data) : ?>

                <div class="col-md-4">
                    <div class="card shadow-sm ">
                        <div class="card-body text-center">
                            <div class="img-foto mx-auto">
                                <img class="img-fluid" src="<?php echo base_url('assets/img/avatars/' . $data->user_image);
                                                            ?>">
                            </div>
                            <h4><?php echo $data->user_name; ?></h4>
                            <?php echo $data->jabatan_name; ?> <?php echo $data->user_type; ?> - <?php echo $data->kota_name; ?><br>

                            ID : <b> <?php echo str_pad($data->id, 5, '0', STR_PAD_LEFT); ?></b>

                        </div>
                        <div class="card-footer">
                            <div class="row">
                                <div class="col-md-6 col-6">
                                    <a href="" class="btn btn-primary btn-block">Edit</a>
                                </div>
                                <div class="col-md-6 col-6">
                                    <a href="<?php echo base_url('myaccount/detail_pengurus/' . $data->id); ?>" class="btn btn-success btn-block">Detail</a>
                                </div>

                            </div>

                        </div>
                    </div>
                </div>

            <?php endforeach; ?>

            <div class="pagination col-md-12 text-center">
                <?php if (isset($pagination)) {
                    echo $pagination;
                } ?>
            </div>
        </div>


    </div>

<?php else : ?>

    <?php redirect('auth'); ?>


<?php endif; ?>