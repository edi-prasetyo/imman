<section class="container my-5">
    <div class="row">

        <?php foreach ($agenda as $agenda) : ?>

            <div class="col-md-6 col-12">
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
            </div>

        <?php endforeach; ?>



    </div>
</section>