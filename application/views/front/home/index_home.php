<?php
$meta = $this->meta_model->get_meta(); ?>

<div class="container mt-4">
    <div id="myCarousel" class="carousel slide" data-ride="carousel">
        <!-- <ol class="carousel-indicators">
        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
        <li data-target="#myCarousel" data-slide-to="1"></li>
        <li data-target="#myCarousel" data-slide-to="2"></li>
        <li data-target="#myCarousel" data-slide-to="3"></li>
    </ol> -->
        <div class="carousel-inner">
            <?php $i = 1;
            foreach ($slider as $slider) { ?>
                <div class="carousel-item <?php if ($i == 1) {
                                                echo 'active';
                                            } ?> ">
                    <a href="<?php echo base_url() . $slider->galery_url; ?>"><img class="img-fluid" style="border-radius: 7px;" width="100%" src="<?php echo base_url('assets/img/galery/' . $slider->galery_img) ?>" alt="<?php echo $slider->galery_title ?>"></a>
                    <div class="container">
                        <div class="carousel-caption text-left">
                        </div>
                    </div>
                </div>
            <?php $i++;
            } ?>
        </div>
        <a class="carousel-control-prev" href="#myCarousel" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#myCarousel" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
</div>

<section class="bg-success my-5 p-3">
    <?php foreach ($galery_featured as $data) : ?>
        <div class="container">
            <div class="col-md-9 mx-auto">
                <div class="row flex-lg-row align-items-center">
                    <div class="col-md-3 col-8">
                        <img src="<?php echo base_url('assets/img/galery/' . $data->galery_img); ?>" class="d-block mx-lg-auto img-fluid rounded" alt="Bootstrap Themes" width="700" height="500" loading="lazy">
                    </div>
                    <div class="col-md-9 col-12 text-white">
                        <h5>Ketua Umum</h5>
                        <h2 class="display-5 fw-bold lh-1 mb-3"><?php echo $data->galery_title; ?></h2>

                        <p class="lead"><?php echo $data->galery_desc; ?></p>

                    </div>
                </div>
            </div>
        </div>
    <?php endforeach; ?>

</section>


<!-- <div class="container mb-5">
    <div class="row">
        <?php foreach ($category as $category) : ?>
            <div class="col-md-3 col-6">
                <a class="text-muted text-decoration-none" href="<?php echo base_url('category/item/' . $category->category_slug); ?>">
                    <div class="card my-3 shadow border-0">
                        <div class="card-body text-center">
                            <img class="img-fluid" style="max-width: 30%;" src="<?php echo base_url('assets/img/category/' . $category->category_image); ?>"><br>
                            <b><?php echo $category->category_name; ?></b>
                        </div>
                    </div>
                </a>
            </div>
        <?php endforeach; ?>
    </div>
</div> -->



<!-- <section class="bg-white py-3">
    <div class="container pb-5">
        <div class="header-title my-5">
            <h2 class="text-center"><span style="font-weight:400;">Layanan</span><span style="font-weight:700;"> Donasi</span></h2>
        </div>
        <div class="row">


            <?php foreach ($layanan as $layanan) : ?>

                <div class="col-md-4">
                    <div class="card mb-2 shadow-sm">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-3">
                                    <div style="font-size:50px;color: <?php echo $layanan->layanan_color; ?>;">
                                        <?php echo $layanan->layanan_icon; ?>
                                    </div>
                                </div>
                                <div class="col-9">
                                    <h4><?php echo $layanan->layanan_name; ?></h4>
                                    <?php echo $layanan->layanan_desc; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            <?php endforeach; ?>


        </div>
    </div>
</section> -->

<!-- <section class="bg-info">
    <?php foreach ($galery_featured as $data) : ?>
        <div class="container col-xxl-8 px-4 py-2">
            <div class="row flex-lg-row-reverse align-items-center g-5 py-5">
                <div class="col-10 col-sm-8 col-lg-6">
                    <img src="<?php echo base_url('assets/img/galery/' . $data->galery_img); ?>" class="d-block mx-lg-auto img-fluid rounded" alt="Bootstrap Themes" width="700" height="500" loading="lazy">
                </div>
                <div class="col-lg-6 text-white">
                    <h1 class="display-5 fw-bold lh-1 mb-3"><?php echo $data->galery_title; ?></h1>
                    <p class="lead"><?php echo $data->galery_desc; ?></p>

                </div>
            </div>
        </div>
    <?php endforeach; ?>

</section> -->


<!-- End Card Profile Slider -->
<div class="container">
    <div class="row">
        <div class="col-md-3">
            <span class="h2 d-block">DPP IMMAN</span>
            <!-- <a href="#" class="lead">Meet our people</a> -->
            <p>Dewan pengurus Pusat Ikatan Muballigh muballighoh Nusantara</p>
        </div>
        <div class="col-md-9">
            <section class="customer-logos slider">

                <?php foreach ($home_dpp as $data) : ?>
                    <div class="slide">
                        <a href="<?php echo base_url('user?id=' . md5($data->id)); ?>" class="text-muted text-decoration-none">
                            <div class="card shadow-sm border-0 mb-3 text-center" style="height: 220px;overflow:hidden">
                                <div class="card-body py-3">
                                    <div class="img-foto mx-auto">
                                        <img class="" src="<?php echo base_url('assets/img/avatars/' . $data->user_image); ?>">
                                    </div>
                                    <h6 class="mt-2"> <?php echo $data->user_name; ?></h6>
                                    <!-- <span><?php echo $data->jabatan_name; ?></span> -->
                                </div>
                                <!-- <div class="card-footer pt-0 border-top-0">
                               
                            </div> -->
                            </div>
                        </a>
                    </div>
                <?php endforeach; ?>

            </section>

        </div>
    </div>
</div>






<section class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="header-title mb-5">
                    <h4 class="text-left"><span style="font-weight:400;">Artikel</span><span style="font-weight:700;"> Terbaru</span></h4>
                </div>
                <div class="row">
                    <?php foreach ($berita as $berita) : ?>

                        <div class="col-md-6 col-6">

                            <a href="<?php echo base_url('berita/detail/' . $berita->berita_slug); ?>" class="text-muted text-decoration-none">
                                <div class="card shadow">
                                    <div class="img-frame">
                                        <img src="<?php echo base_url('assets/img/artikel/' . $berita->berita_gambar); ?>" class="card-img-top" alt="<?php echo $berita->berita_title; ?>">
                                    </div>
                                    <div class="card-body">
                                        <h5 class="card-title"><?php echo substr($berita->berita_title, 0, 35); ?></h5>

                                    </div>
                                    <div class="card-footer">
                                        <div class="row">
                                            <div class="col-6">
                                                <?php echo date('F j, Y', strtotime($berita->date_created)); ?>
                                            </div>
                                            <div class="col-6 text-right">
                                                <span class="badge badge-danger font-weight-normal mr-2"><?php echo $berita->category_name; ?></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    <?php endforeach; ?>

                </div>
            </div>
            <div class="col-md-4">
                <h4 class="text-left mb-5"><span style="font-weight:700;"> Agenda</span></h4>

                <?php foreach ($agenda_home as $agenda) : ?>
                    <article class="card-agenda shadow-sm">
                        <section class="date">
                            <time datetime="23th feb year">
                                <span>
                                    <?php echo  date("j", strtotime($agenda->agenda_date));; ?>
                                </span>
                                <span>
                                    <?php echo  date("M", strtotime($agenda->agenda_date));; ?>
                                </span>

                            </time>
                        </section>
                        <section class="card-cont">
                            <h5><?php echo $agenda->agenda_title; ?></h5>
                            <div class="even-date">
                                <i class="ti ti-calendar-event"></i> <?php echo  date("j M Y", strtotime($agenda->agenda_date)); ?>
                                <i class="ti ti-clock mr-2"></i> <?php echo $agenda->agenda_jam; ?> WIB
                            </div>
                            <div class="even-info">
                                <i class="ti ti-map-2 mr-2"></i> <?php echo $agenda->agenda_location; ?>
                            </div>


                            <?php

                            //A: RECORDS TODAY'S Date And Time
                            $today = time();

                            //B: RECORDS Date And Time OF YOUR EVENT
                            $bln = date("m", strtotime($agenda->agenda_date));
                            $tgl = date("j", strtotime($agenda->agenda_date));
                            $thn = date("Y", strtotime($agenda->agenda_date));
                            $event = mktime(0, 0, 0, $bln, $tgl, $thn);

                            //C: COMPUTES THE DAYS UNTIL THE EVENT.
                            $countdown = round(($event - $today) / 86400 + 1);

                            ?>


                            <?php if ($countdown == 0) : ?>
                                <a href="<?php echo base_url('agenda/detail/' . $agenda->agenda_slug); ?>" class="btn btn-primary btn-block mt-2">
                                    Sedang Berlangsung
                                </a>

                            <?php elseif ($countdown < 0) : ?>
                                <a href="#" class="btn btn-danger btn-block mt-2 disabled">
                                    Sudah Berakhir
                                </a>
                            <?php else : ?>
                                <a href="<?php echo base_url('agenda/detail/' . $agenda->agenda_slug); ?>" class="btn btn-success btn-block mt-2">
                                    <?php echo "$countdown Hari Lagi"; ?>
                                </a>
                            <?php endif; ?>
                            </a>
                        </section>
                    </article>
                <?php endforeach; ?>







            </div>
        </div>
    </div>

</section>