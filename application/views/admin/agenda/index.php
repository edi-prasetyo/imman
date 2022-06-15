<div class="card">
    <div class="card-header d-flex flex-row align-items-center justify-content-between">
        <?php echo $title; ?>
        <a href="<?php echo base_url('admin/agenda/create'); ?>" class="btn btn-info waves-effect waves-light">Buat Agenda</a>
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
                    <th>Judul Agenda</th>
                    <th>Post by</th>
                    <th>Tanggal</th>

                    <th width="25%">Action</th>
                </tr>
            </thead>
            <?php $no = 1;
            foreach ($agenda as $data) { ?>
                <tr>
                    <td><?php echo $no; ?></td>
                    <td><?php echo $data->agenda_title; ?></td>
                    <td><?php echo $data->user_name; ?></td>
                    <td><?php echo date('d/m/Y', strtotime($data->agenda_date)); ?> <?php echo $data->agenda_jam; ?> WIB</td>
                    <td>
                        <a href="<?php echo base_url('agenda/detail/' . $data->agenda_slug); ?>" class="btn btn-primary btn-sm"><i class="ti-eye"></i> Lihat</a>
                        <a href="<?php echo base_url('admin/agenda/update/' . $data->id); ?>" class="btn btn-info btn-sm"><i class="ti-pencil-alt"></i> Edit</a>
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