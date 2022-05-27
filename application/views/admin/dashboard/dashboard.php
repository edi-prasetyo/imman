<?php
$id = $this->session->userdata('id');
$user = $this->user_model->user_detail($id);
?>

<?php if ($user->role_id == 1) : ?>
    <div class="row">
        <div class="col-md-3">
            <div class="card mb-4 mb-xl-0 border-0 shadow-sm">
                <div class="card-body d-flex w-100 justify-content-between">
                    <div class="col">
                        <h5 class="card-title text-muted mb-0">Total Penjualan</h5>
                        <span class="h4 font-weight-bold mb-0">5</span>
                    </div>
                    <div class="icon icon-shape bg-success text-white rounded-circle">
                        <i class="feather-shopping-cart"></i>
                    </div>

                </div>
                <div class="card-footer">
                    <a href="<?php echo base_url('admin/transaction'); ?>" class="mb-0 text-muted text-sm">
                        <span class="text-nowrap">Lihat Data</span>
                    </a>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card mb-4 mb-xl-0 border-0 shadow-sm">
                <div class="card-body d-flex w-100 justify-content-between">
                    <div class="col">
                        <h5 class="card-title text-muted mb-0">Pembelian</h5>
                        <span class="h4 font-weight-bold mb-0">5</span>
                    </div>
                    <div class="icon icon-shape bg-danger text-white rounded-circle">
                        <i class="feather-download"></i>
                    </div>
                </div>
                <div class="card-footer">
                    <a href="" class="mb-0 text-muted text-sm">
                        <span class="text-nowrap">Lihat Data</span>
                    </a>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card  mb-4 mb-xl-0 border-0 shadow-sm">
                <div class="card-body d-flex w-100 justify-content-between">

                    <div class="col">
                        <h5 class="card-title text-muted mb-0">Penjualan</h5>
                        <span class="h4 font-weight-bold mb-0">5</span>
                    </div>

                    <div class="icon icon-shape bg-warning text-white rounded-circle">
                        <i class="feather-upload"></i>
                    </div>

                </div>
                <div class="card-footer">
                    <a href="" class="mb-0 text-muted text-sm">
                        <span class="text-nowrap">Lihat Data</span>
                    </a>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card mb-4 mb-xl-0 border-0 shadow-sm">
                <div class="card-body d-flex w-100 justify-content-between">

                    <div class="col">
                        <h5 class="card-title text-muted mb-0">Profit</h5>
                        <span class="h4 font-weight-bold mb-0">5</span>
                    </div>

                    <div class="icon icon-shape bg-info text-white rounded-circle">
                        <i class="feather-pie-chart"></i>
                    </div>


                </div>
                <div class="card-footer">
                    <a href="" class="mb-0 text-muted text-sm">
                        <span class="text-nowrap">Lihat Data</span>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <div class="card my-3 shadow-sm">
        <div class="card-header bg-white">
            Data Penjualan Per Bulan
        </div>
        <div class="card-body">
            <canvas id="myChart" width="400" height="100"></canvas>
        </div>
    </div>

<?php elseif ($user->role_id == 2) : ?>
    <div class="row">

        <div class="col-md-3">
            <a href="<?php echo base_url('admin/pengurus_dpd/create'); ?>" class="mb-0 text-muted text-sm">
                <div class="card mb-4 mb-xl-0 border-0 shadow-sm bg-primary">
                    <div class="card-body d-flex w-100 justify-content-between">
                        <div class="col">
                            <h5 class="card-title text-primary mb-0">Total Pengurus</h5>
                            <span class="h4 font-weight-bold mb-0 text-white">Add Pengurus</span>
                        </div>
                        <div class="icon icon-shape bg-white text-primary rounded-circle">
                            <i class="feather-plus"></i>
                        </div>

                    </div>
                    <div class="card-footer">
                        <span class="text-nowrap text-primary">A</span>

                    </div>
                </div>
            </a>
        </div>


        <div class="col-md-8">
            <div class="card mb-4 mb-xl-0 border-0 shadow-sm">
                <div class="card-body d-flex w-100 justify-content-between">
                    <div class="col">
                        <h5 class="card-title text-muted mb-0">Total Pengurus</h5>
                        <span class="h4 font-weight-bold mb-0"><?php echo count($pengurus_dpd); ?></span>
                    </div>
                    <div class="icon icon-shape bg-success text-white rounded-circle">
                        <i class="feather-user"></i>
                    </div>

                </div>
                <div class="card-footer">
                    <a href="<?php echo base_url('admin/pengurus_dpd'); ?>" class="mb-0 text-muted text-sm">
                        <span class="text-nowrap">Lihat Data</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
<?php elseif ($user->role_id == 3) : ?>
<?php endif; ?>