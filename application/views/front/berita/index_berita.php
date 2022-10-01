<div class="breadcrumb">
    <div class="container">
        <ul class="breadcrumb my-3">
            <li class="breadcrumb-item"><a href="<?php echo base_url('') ?>"><i class="ti ti-home"></i> Home</a></li>
            <li class="breadcrumb-item active"><?php echo $title ?></li>
        </ul>
    </div>
</div>

<div class="container mb-3">
    <div class="row">
        <div class="col-md-9">
            <div class="row">
                <?php foreach ($berita as $berita) : ?>
                    <div class="col-md-6">
                        <div class="card mb-2">
                            <a class="text-decoration-none text-muted" href="<?php echo base_url('berita/detail/' . $berita->berita_slug); ?>">
                                <div class="img-frame">
                                    <img src="<?php echo base_url('assets/img/artikel/' . $berita->berita_gambar); ?>" class="card-img-top" alt="...">
                                </div>
                                <div class="card-body">
                                    <h5 class="card-title lh-lg"><?php echo substr($berita->berita_title, 0, 35); ?>..</h5>
                                    <?php echo substr($berita->berita_desc, 0, 100); ?>..
                                </div>
                            </a>
                            <div class="card-footer bg-white d-flex justify-content-between align-items-center">

                                <span><a class="text-decoration-none text-muted" href="<?php echo base_url('category/item/' . $berita->category_slug); ?>">
                                        <i class="ri-price-tag-3-line"></i> <?php echo $berita->category_name; ?>
                                    </a></span>

                                <span><i class="bi-eye"></i> <?php echo $berita->berita_views; ?></span>
                                <span><i class="bi-calendar"></i><?php echo date('d/m/Y', strtotime($berita->date_created)); ?>

                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
            <div class="pagination col-md-12 text-center">
                <?php if (isset($pagination)) {
                    echo $pagination;
                } ?>
            </div>
        </div>
        <div class="col-md-3">
            <?php include "sidebar.php"; ?>
        </div>
    </div>

    <div class="pagination col-md-12 text-center">
        <?php if (isset($paginasi)) {
            echo $paginasi;
        } ?>
    </div>
</div>