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
                    <div class="col-md-4">
                        <div class="card mb-2">
                            <a class="text-decoration-none text-muted" href="<?php echo base_url('berita/detail/' . $berita->berita_slug); ?>">
                                <div class="img-frame">
                                    <img src="<?php echo base_url('assets/img/artikel/' . $berita->berita_gambar); ?>" class="card-img-top" alt="...">
                                </div>
                                <div class="card-body">
                                    <h5 class="card-title lh-lg"><?php echo substr($berita->berita_title, 0, 35); ?>..</h5>
                                </div>
                            </a>
                            <div class="card-footer bg-white">
                                <div class="badge badge-danger badge-pill">
                                    <a class="text-decoration-none text-white" href="<?php echo base_url('category/item/' . $berita->category_slug); ?>">
                                        <i class="ri-price-tag-3-line"></i> <?php echo $berita->category_name; ?>
                                    </a>
                                </div>
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






<section class="dark">
    <div class="container py-4">
        <h1 class="h1 text-center" id="pageHeaderTitle">My Cards Dark</h1>

        <article class="postcard dark blue">
            <a class="postcard__img_link" href="#">
                <img class="postcard__img" src="https://picsum.photos/1000/1000" alt="Image Title" />
            </a>
            <div class="postcard__text">
                <h1 class="postcard__title blue"><a href="#">Podcast Title</a></h1>
                <div class="postcard__subtitle small">
                    <time datetime="2020-05-25 12:00:00">
                        <i class="fas fa-calendar-alt mr-2"></i>Mon, May 25th 2020
                    </time>
                </div>
                <div class="postcard__bar"></div>
                <div class="postcard__preview-txt">Lorem ipsum dolor sit amet consectetur adipisicing elit. Eligendi, fugiat asperiores inventore beatae accusamus odit minima enim, commodi quia, doloribus eius! Ducimus nemo accusantium maiores velit corrupti tempora reiciendis molestiae repellat vero. Eveniet ipsam adipisci illo iusto quibusdam, sunt neque nulla unde ipsum dolores nobis enim quidem excepturi, illum quos!</div>
                <ul class="postcard__tagbox">
                    <li class="tag__item"><i class="fas fa-tag mr-2"></i>Podcast</li>
                    <li class="tag__item"><i class="fas fa-clock mr-2"></i>55 mins.</li>
                    <li class="tag__item play blue">
                        <a href="#"><i class="fas fa-play mr-2"></i>Play Episode</a>
                    </li>
                </ul>
            </div>
        </article>
        <article class="postcard dark red">
            <a class="postcard__img_link" href="#">
                <img class="postcard__img" src="https://picsum.photos/501/500" alt="Image Title" />
            </a>
            <div class="postcard__text">
                <h1 class="postcard__title red"><a href="#">Podcast Title</a></h1>
                <div class="postcard__subtitle small">
                    <time datetime="2020-05-25 12:00:00">
                        <i class="fas fa-calendar-alt mr-2"></i>Mon, May 25th 2020
                    </time>
                </div>
                <div class="postcard__bar"></div>
                <div class="postcard__preview-txt">Lorem ipsum dolor sit amet consectetur adipisicing elit. Eligendi, fugiat asperiores inventore beatae accusamus odit minima enim, commodi quia, doloribus eius! Ducimus nemo accusantium maiores velit corrupti tempora reiciendis molestiae repellat vero. Eveniet ipsam adipisci illo iusto quibusdam, sunt neque nulla unde ipsum dolores nobis enim quidem excepturi, illum quos!</div>
                <ul class="postcard__tagbox">
                    <li class="tag__item"><i class="fas fa-tag mr-2"></i>Podcast</li>
                    <li class="tag__item"><i class="fas fa-clock mr-2"></i>55 mins.</li>
                    <li class="tag__item play red">
                        <a href="#"><i class="fas fa-play mr-2"></i>Play Episode</a>
                    </li>
                </ul>
            </div>
        </article>
        <article class="postcard dark green">
            <a class="postcard__img_link" href="#">
                <img class="postcard__img" src="https://picsum.photos/500/501" alt="Image Title" />
            </a>
            <div class="postcard__text">
                <h1 class="postcard__title green"><a href="#">Podcast Title</a></h1>
                <div class="postcard__subtitle small">
                    <time datetime="2020-05-25 12:00:00">
                        <i class="fas fa-calendar-alt mr-2"></i>Mon, May 25th 2020
                    </time>
                </div>
                <div class="postcard__bar"></div>
                <div class="postcard__preview-txt">Lorem ipsum dolor sit amet consectetur adipisicing elit. Eligendi, fugiat asperiores inventore beatae accusamus odit minima enim, commodi quia, doloribus eius! Ducimus nemo accusantium maiores velit corrupti tempora reiciendis molestiae repellat vero. Eveniet ipsam adipisci illo iusto quibusdam, sunt neque nulla unde ipsum dolores nobis enim quidem excepturi, illum quos!</div>
                <ul class="postcard__tagbox">
                    <li class="tag__item"><i class="fas fa-tag mr-2"></i>Podcast</li>
                    <li class="tag__item"><i class="fas fa-clock mr-2"></i>55 mins.</li>
                    <li class="tag__item play green">
                        <a href="#"><i class="fas fa-play mr-2"></i>Play Episode</a>
                    </li>
                </ul>
            </div>
        </article>
        <article class="postcard dark yellow">
            <a class="postcard__img_link" href="#">
                <img class="postcard__img" src="https://picsum.photos/501/501" alt="Image Title" />
            </a>
            <div class="postcard__text">
                <h1 class="postcard__title yellow"><a href="#">Podcast Title</a></h1>
                <div class="postcard__subtitle small">
                    <time datetime="2020-05-25 12:00:00">
                        <i class="fas fa-calendar-alt mr-2"></i>Mon, May 25th 2020
                    </time>
                </div>
                <div class="postcard__bar"></div>
                <div class="postcard__preview-txt">Lorem ipsum dolor sit amet consectetur adipisicing elit. Eligendi, fugiat asperiores inventore beatae accusamus odit minima enim, commodi quia, doloribus eius! Ducimus nemo accusantium maiores velit corrupti tempora reiciendis molestiae repellat vero. Eveniet ipsam adipisci illo iusto quibusdam, sunt neque nulla unde ipsum dolores nobis enim quidem excepturi, illum quos!</div>
                <ul class="postcard__tagbox">
                    <li class="tag__item"><i class="fas fa-tag mr-2"></i>Podcast</li>
                    <li class="tag__item"><i class="fas fa-clock mr-2"></i>55 mins.</li>
                    <li class="tag__item play yellow">
                        <a href="#"><i class="fas fa-play mr-2"></i>Play Episode</a>
                    </li>
                </ul>
            </div>
        </article>
    </div>
</section>

<section class="light">
    <div class="container py-2">
        <div class="h1 text-center text-dark" id="pageHeaderTitle">My Cards Light</div>

        <article class="postcard light blue">
            <a class="postcard__img_link" href="#">
                <img class="postcard__img" src="https://picsum.photos/1000/1000" alt="Image Title" />
            </a>
            <div class="postcard__text t-dark">
                <h1 class="postcard__title blue"><a href="#">Podcast Title</a></h1>
                <div class="postcard__subtitle small">
                    <time datetime="2020-05-25 12:00:00">
                        <i class="fas fa-calendar-alt mr-2"></i>Mon, May 25th 2020
                    </time>
                </div>
                <div class="postcard__bar"></div>
                <div class="postcard__preview-txt">Lorem ipsum dolor sit amet consectetur adipisicing elit. Eligendi, fugiat asperiores inventore beatae accusamus odit minima enim, commodi quia, doloribus eius! Ducimus nemo accusantium maiores velit corrupti tempora reiciendis molestiae repellat vero. Eveniet ipsam adipisci illo iusto quibusdam, sunt neque nulla unde ipsum dolores nobis enim quidem excepturi, illum quos!</div>
                <ul class="postcard__tagbox">
                    <li class="tag__item"><i class="fas fa-tag mr-2"></i>Podcast</li>
                    <li class="tag__item"><i class="fas fa-clock mr-2"></i>55 mins.</li>
                    <li class="tag__item play blue">
                        <a href="#"><i class="fas fa-play mr-2"></i>Play Episode</a>
                    </li>
                </ul>
            </div>
        </article>
        <article class="postcard light red">
            <a class="postcard__img_link" href="#">
                <img class="postcard__img" src="https://picsum.photos/501/500" alt="Image Title" />
            </a>
            <div class="postcard__text t-dark">
                <h1 class="postcard__title red"><a href="#">Podcast Title</a></h1>
                <div class="postcard__subtitle small">
                    <time datetime="2020-05-25 12:00:00">
                        <i class="fas fa-calendar-alt mr-2"></i>Mon, May 25th 2020
                    </time>
                </div>
                <div class="postcard__bar"></div>
                <div class="postcard__preview-txt">Lorem ipsum dolor sit amet consectetur adipisicing elit. Eligendi, fugiat asperiores inventore beatae accusamus odit minima enim, commodi quia, doloribus eius! Ducimus nemo accusantium maiores velit corrupti tempora reiciendis molestiae repellat vero. Eveniet ipsam adipisci illo iusto quibusdam, sunt neque nulla unde ipsum dolores nobis enim quidem excepturi, illum quos!</div>
                <ul class="postcard__tagbox">
                    <li class="tag__item"><i class="fas fa-tag mr-2"></i>Podcast</li>
                    <li class="tag__item"><i class="fas fa-clock mr-2"></i>55 mins.</li>
                    <li class="tag__item play red">
                        <a href="#"><i class="fas fa-play mr-2"></i>Play Episode</a>
                    </li>
                </ul>
            </div>
        </article>
        <article class="postcard light green">
            <a class="postcard__img_link" href="#">
                <img class="postcard__img" src="https://picsum.photos/500/501" alt="Image Title" />
            </a>
            <div class="postcard__text t-dark">
                <h1 class="postcard__title green"><a href="#">Podcast Title</a></h1>
                <div class="postcard__subtitle small">
                    <time datetime="2020-05-25 12:00:00">
                        <i class="fas fa-calendar-alt mr-2"></i>Mon, May 25th 2020
                    </time>
                </div>
                <div class="postcard__bar"></div>
                <div class="postcard__preview-txt">Lorem ipsum dolor sit amet consectetur adipisicing elit. Eligendi, fugiat asperiores inventore beatae accusamus odit minima enim, commodi quia, doloribus eius! Ducimus nemo accusantium maiores velit corrupti tempora reiciendis molestiae repellat vero. Eveniet ipsam adipisci illo iusto quibusdam, sunt neque nulla unde ipsum dolores nobis enim quidem excepturi, illum quos!</div>
                <ul class="postcard__tagbox">
                    <li class="tag__item"><i class="fas fa-tag mr-2"></i>Podcast</li>
                    <li class="tag__item"><i class="fas fa-clock mr-2"></i>55 mins.</li>
                    <li class="tag__item play green">
                        <a href="#"><i class="fas fa-play mr-2"></i>Play Episode</a>
                    </li>
                </ul>
            </div>
        </article>
        <article class="postcard light yellow">
            <a class="postcard__img_link" href="#">
                <img class="postcard__img" src="https://picsum.photos/501/501" alt="Image Title" />
            </a>
            <div class="postcard__text t-dark">
                <h1 class="postcard__title yellow"><a href="#">Podcast Title</a></h1>
                <div class="postcard__subtitle small">
                    <time datetime="2020-05-25 12:00:00">
                        <i class="fas fa-calendar-alt mr-2"></i>Mon, May 25th 2020
                    </time>
                </div>
                <div class="postcard__bar"></div>
                <div class="postcard__preview-txt">Lorem ipsum dolor sit amet consectetur adipisicing elit. Eligendi, fugiat asperiores inventore beatae accusamus odit minima enim, commodi quia, doloribus eius! Ducimus nemo accusantium maiores velit corrupti tempora reiciendis molestiae repellat vero. Eveniet ipsam adipisci illo iusto quibusdam, sunt neque nulla unde ipsum dolores nobis enim quidem excepturi, illum quos!</div>
                <ul class="postcard__tagbox">
                    <li class="tag__item"><i class="fas fa-tag mr-2"></i>Podcast</li>
                    <li class="tag__item"><i class="fas fa-clock mr-2"></i>55 mins.</li>
                    <li class="tag__item play yellow">
                        <a href="#"><i class="fas fa-play mr-2"></i>Play Episode</a>
                    </li>
                </ul>
            </div>
        </article>
    </div>
</section>