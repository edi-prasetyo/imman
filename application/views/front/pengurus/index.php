<div class="breadcrumb">
    <div class="container">
        <ul class="breadcrumb my-3">
            <li class="breadcrumb-item"><a href="<?php echo base_url('') ?>"><i class="ti ti-home"></i> Home</a></li>
            <li class="breadcrumb-item active"><?php echo $title ?></li>
        </ul>
    </div>
</div>

<div class="container mb-3">
    <?php echo form_open('pengurus', array('method' => 'get')); ?>
    <div class="row">

        <div class="col-md-8">
            <div class="form-group">
                <label class="form-label">Pilih Kota</label>
                <select class="form-control form-control-chosen" name="kota_id">
                    <option value="">--Pilih Kota--</option>
                    <?php foreach ($kota as $data) : ?>
                        <option value="<?php echo md5($data->id); ?>"><?php echo $data->kota_name; ?></option>
                    <?php endforeach; ?>
                </select>
                <span class="select-arrow"></span>
            </div>
        </div>
        <div class="col-md-3">
            <label class="form-label" style="visibility: hidden;">A</label>
            <button type="submit" class="btn btn-warning btn-block">Cari</button>
        </div>

    </div>
    <?php echo form_close(); ?>

    <div class="row">
        <?php foreach ($pengurus as $data) : ?>
            <div class="col-md-6 mb-3">
                <div class="card">
                    <div class="card-body">
                        <div class="e-profile">
                            <div class="row">
                                <div class="col-12 col-sm-auto mb-3">
                                    <!-- <div class="mx-auto" style="width: 140px;"> -->
                                    <div class="img-foto mx-auto">
                                        <img class="img-fluid" src="<?php echo base_url('assets/img/avatars/' . $data['user_image']); ?>">
                                    </div>
                                    <!-- </div> -->
                                </div>
                                <div class="col d-flex flex-column flex-sm-row justify-content-between mb-3">
                                    <div class="text-center text-sm-left mb-2 mb-sm-0">
                                        <h4 class="pt-sm-2 pb-1 mb-0 text-nowrap"><?php echo substr($data['user_name'], 0, 20); ?></h4>
                                        <p class="mb-0"><?php echo $data['email']; ?></p>
                                        <div class="text-muted"><small>Last seen 2 hours ago</small></div>
                                        <div class="mt-2">
                                            <button class="btn btn-primary" type="button">
                                                <i class="fa fa-fw fa-camera"></i>
                                                <a class="text-white text-decoration-none" href="<?php echo base_url('user?id=' . md5($data['id'])); ?>"> <span>Detail</span></a>
                                            </button>
                                        </div>
                                    </div>
                                    <div class="text-center text-sm-right">
                                        <span class="badge badge-secondary"><?php echo $data['user_type']; ?></span>
                                        <div class="text-muted"><small>Joined <?php echo $data['created_at']; ?></small></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        <?php endforeach; ?>
    </div>


</div>