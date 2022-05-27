<div class="card">
    <div class="card-header d-flex flex-row align-items-center justify-content-between">
        <?php echo $title; ?>
        <a href="<?php echo base_url('admin/pengurus_dpd/create'); ?>" class="btn btn-primary waves-effect waves-light text-white">Tambah Pengurus</a>
    </div>

    <?php
    if ($this->session->flashdata('message')) {
        echo $this->session->flashdata('message');
        unset($_SESSION['message']);
    }
    ?>


    <div class="table-responsive">
        <table class="table table-flush">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>ID</th>
                    <th>pengurus</th>
                    <th>Jabatan</th>
                    <th width="25%">Action</th>
                </tr>
            </thead>
            <?php $no = 1;
            foreach ($pengurus_dpd as $data) { ?>
                <tr>
                    <td><?php echo $no; ?></td>
                    <td><?php echo $data->user_name; ?></td>
                    <td><?php echo str_pad($data->id, 5, '0', STR_PAD_LEFT); ?></td>
                    <td><?php echo $data->user_type; ?></td>
                    <td><?php echo $data->jabatan_name;
                        ?></td>
                    <td>
                        <a href="<?php echo base_url('admin/pengurus_dpd/detail/' . $data->id); ?>" class="btn btn-primary btn-sm"><i class="ti-eye"></i> Lihat</a>
                        <a href="<?php echo base_url('admin/pengurus_dpd/update/' . $data->id); ?>" class="btn btn-info btn-sm"><i class="ti-pencil-alt"></i> Edit</a>
                        <?php include "delete.php"; ?>
                    </td>
                </tr>

            <?php $no++;
            }; ?>
        </table>

        <div class="pagination col-md-12 text-center">
            <?php if (isset($pagination)) {
                echo $pagination;
            } ?>
        </div>

    </div>

</div>