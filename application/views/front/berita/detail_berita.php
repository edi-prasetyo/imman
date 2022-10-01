<?php
$meta = $this->meta_model->get_meta();

// error_reporting(0);
// ini_set('display_errors', 0);
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title><?php echo $meta->title ?> | <?php echo $meta->tagline ?></title>
    <link rel="shortcut icon" href="<?php echo base_url('assets/img/logo/' . $meta->favicon); ?>">
    <meta name="description" content="<?php echo $deskripsi ?>">
    <meta name="keywords" content="<?php echo $meta->title . ',' . $keywords ?>">
    <meta name="author" content="<?php echo $meta->title ?>">
    <meta name="google-site-verification" content="<?php echo $meta->google_meta ?>" />
    <meta name="msvalidate.01" content="<?php echo $meta->bing_meta ?>" />

    <link rel="canonical" href="<?php echo base_url(); ?>" />
    <meta property="og:locale" content="en_US" />
    <meta property="og:type" content="website" />
    <meta property="og:title" content="<?php echo $meta->title . ',' . $keywords ?>" />
    <meta property="og:description" content="<?php echo $deskripsi ?>" />
    <meta property="og:url" content="<?php echo base_url(); ?>" />
    <meta property="og:image" content="<?php echo base_url('assets/img/artikel/' . $berita->berita_gambar); ?>" />
    <meta property="og:site_name" content="<?php echo $meta->title ?>" />
    <meta name="twitter:description" content="<?php echo $deskripsi ?>" />
    <meta name="twitter:title" content="<?php echo $meta->title ?>" />

    <!-- Vendor CSS Files -->
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/template/front/vendor/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/template/front/css/style.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/template/front/css/card-slider.css">
    <!-- <link rel="stylesheet" href="<?php echo base_url() ?>assets/template/front/css/theme.css"> -->
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/template/front/vendor/offcanvas/offcanvas.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/template/front/icon/remixicon/remixicon.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/template/front/icon/tabler-icons/tabler-icons.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/template/front/icon/bootstrap-icons/font/bootstrap-icons.css">
    <link rel="stylesheet" href="<?php echo base_url(''); ?>assets/template/css/component-chosen.css">
    <link rel="stylesheet" href="<?php echo base_url(''); ?>assets/template/front/vendor/date-time-picker-bootstrap-4/css/bootstrap-datetimepicker.min.css" />
    <!-- Font CSS File -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/template/front/fonts/open-sans/styles.css">




</head>

<body class="d-flex flex-column min-vh-100">

    <?php
    $id             = $this->session->userdata('id');
    $user           = $this->user_model->user_detail($id);
    $meta           = $this->meta_model->get_meta();
    $menu           = $this->menu_model->get_menu();

    ?>


    <nav class="navbar navbar-expand-lg fixed-top navbar-light bg-white shadow-sm" id="top">
        <div class="container">
            <a class="navbar-brand" href="<?php echo base_url() ?>"><img class="img-fluid" src="<?php echo base_url('assets/img/logo/' . $meta->logo) ?>"></a>
            <button class="navbar-toggler p-0 border-0" type="button" data-toggle="offcanvas">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="navbar-collapse offcanvas-collapse" id="navbarsExampleDefault">
                <ul class="navbar-nav">
                    <?php foreach ($menu as $data) : ?>
                        <li class="nav-item"><a class="nav-link" href="<?php echo base_url($data->url); ?>"> <?php echo $data->nama_menu_ind; ?> </a></li>
                    <?php endforeach; ?>
                </ul>
                <ul class="navbar-nav ml-auto">
                    <!-- <a class="btn btn-success text-white my-auto" href="<?php echo base_url('donasi'); ?>"> Donasi Online</a> -->
                    <!-- <span class="border-left ml-3"></span> -->
                    <?php if ($this->session->userdata('email')) { ?>

                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="ti ti-user-circle"></i> <?php echo $user->user_name; ?>
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <!-- <a class="dropdown-item" href="<?php echo base_url('myaccount') ?>"> <i class="ri-user-line"></i> Profile</a>
              <a class="dropdown-item" href="<?php echo base_url('myaccount/update') ?>"> <i class="ri-draft-line"></i> Ubah Profile</a>
              <a class="dropdown-item" href="<?php echo base_url('myaccount/ubah_password') ?>"> <i class="ri-lock-password-line"></i> Ubah Password</a> -->

                                <div class="dropdown-divider"></div>
                                <?php if ($user->role_id == 1 || $user->role_id == 2 || $user->role_id == 3) : ?>
                                    <a class="dropdown-item" href="<?php echo base_url('admin/dashboard'); ?>"> <i class="ri-dashboard-3-line"></i> Dashboard</a>
                                <?php endif; ?>
                                <a class="dropdown-item" href="<?php echo base_url('auth/logout'); ?>"> <i class="ri-shut-down-line"></i> Logout</a>
                            </div>
                        </li>
                    <?php } else { ?>
                        <li class="nav-item"><a class="nav-link" href="<?php echo base_url('auth') ?>"><i class="bi-box-arrow-in-right" style="font-size: 1.5rem;"></i> Login</a></li>

                        <!-- <li class="nav-item"><a class="nav-link" href="<?php echo base_url('auth/register') ?>"> Daftar</a></li> -->

                    <?php } ?>
                </ul>
            </div>
        </div>
    </nav>


    <div class="breadcrumb">
        <div class="container">
            <ul class="breadcrumb my-3">
                <li class="breadcrumb-item"><a href="<?php echo base_url('') ?>"><i class="ti ti-home"></i> Home</a></li>
                <li class="breadcrumb-item"><a href="<?php echo base_url('berita') ?>"> Berita</a></li>

                <li class="breadcrumb-item active"><?php echo $title ?></li>
            </ul>
        </div>
    </div>
    <div class="container mb-3">
        <div class="row">
            <div class="col-md-9">
                <div class="card mb-3">
                    <img class="img-fluid" src="<?php echo base_url('assets/img/artikel/' . $berita->berita_gambar); ?>">
                    <div class="card-body">
                    </div>

                    <div class="card-body">
                        <h2><?php echo $berita->berita_title; ?></h2>
                        <?php echo $berita->berita_desc; ?>
                    </div>
                    <div class="card-footer bg-white d-flex justify-content-between align-items-center">
                        <span><i class="bi-person"></i> <?php echo $berita->user_name; ?></span>
                        <span><i class="bi-eye"></i> <?php echo $berita->berita_views; ?></span>
                        <span><i class="bi-calendar"></i><?php echo date('d/m/Y', strtotime($berita->date_created)); ?>
                    </div>
                </div>
            </div>

            <div class="col-md-3">
                <?php include "sidebar.php"; ?>
            </div>

        </div>
    </div>

    <?php
    $meta      = $this->meta_model->get_meta();
    $link      = $this->link_model->get_link();
    $page      = $this->page_model->get_page();

    ?>

    <footer class="bg-white mt-auto">

        <div class="credit border-top py-3">
            <div class="container">
                <div class="credit bg-white text-muted py-md-3">Copyright &copy; <?php echo date('Y') ?> - <?php echo $meta->title ?> - <?php echo $meta->tagline ?></div>
            </div>
        </div>
    </footer>

    <!-- Load javascript Jquery -->
    <script src="<?php echo base_url() ?>assets/template/front/vendor/jquery/jquery-3.2.1.slim.min.js"></script>

    <script src="<?php echo base_url() ?>assets/template/front/vendor/popper/popper.min.js"></script>
    <script src="<?php echo base_url() ?>assets/template/front/vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url() ?>assets/template/front/vendor/date-time-picker-bootstrap-4/js/moment.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url() ?>assets/template/front/vendor/offcanvas/offcanvas.js" type="text/javascript"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.6.0/slick.js"></script>
    <script>
        $(document).ready(function() {
            $('.customer-logos').slick({
                slidesToShow: 3,
                slidesToScroll: 1,
                autoplay: true,
                autoplaySpeed: 1500,
                arrows: false,
                dots: false,
                pauseOnHover: false,
                responsive: [{
                    breakpoint: 768,
                    settings: {
                        slidesToShow: 4
                    }
                }, {
                    breakpoint: 520,
                    settings: {
                        slidesToShow: 2
                    }
                }]
            });
        });
    </script>


    <!-- Color Picker JS -->


    <script src="<?php echo base_url() ?>assets/template/front/vendor/date-time-picker-bootstrap-4/js/bootstrap-datetimepicker.min.js" type="text/javascript"></script>

    <script>
        $(function() {
            var minDate = new Date();
            minDate.setDate(minDate.getDate() + 1);

            $('#id_tanggal').datetimepicker({
                locale: 'id',
                format: 'D MMMM YYYY',
                minDate: minDate
            });
        });
        $("#id_tanggal").keydown(false);
        $('.form-control-chosen').chosen({});
        $('#timepicker').timepicker();
    </script>

    <script>
        $(function() {
            $('#id_tanggal_bayar').datetimepicker({
                locale: 'id',
                format: 'D MMMM YYYY'
            });
        });
    </script>

    <!-- Google Analitycs -->
    <?php echo $meta->google_analytics; ?>
    <!-- End Google Analitycs -->


    <!-- Gambar -->
    <script>
        $('input[type="file"]').each(function() {
            // Refs
            var $file = $(this),
                $label = $file.next('label'),
                $labelText = $label.find('span'),
                labelDefault = $labelText.text();

            // When a new file is selected
            $file.on('change', function(event) {
                var fileName = $file.val().split('\\').pop(),
                    tmppath = URL.createObjectURL(event.target.files[0]);
                //Check successfully selection
                if (fileName) {
                    $label
                        .addClass('file-ok')
                        .css('background-image', 'url(' + tmppath + ')');
                    $labelText.text(fileName);
                } else {
                    $label.removeClass('file-ok');
                    $labelText.text(labelDefault);
                }
            });

            // End loop of file input elements
        });
    </script>


    <script>
        // Example starter JavaScript for disabling form submissions if there are invalid fields
        (function() {
            'use strict';
            window.addEventListener('load', function() {
                // Fetch all the forms we want to apply custom Bootstrap validation styles to
                var forms = document.getElementsByClassName('needs-validation');
                // Loop over them and prevent submission
                var validation = Array.prototype.filter.call(forms, function(form) {
                    form.addEventListener('submit', function(event) {
                        if (form.checkValidity() === false) {
                            event.preventDefault();
                            event.stopPropagation();
                        }
                        form.classList.add('was-validated');
                    }, false);
                });
            }, false);
        })();
    </script>


    <script>
        $(document).ready(function() {
            $('.radio-group .radio').click(function() {
                $('.selected .fa').removeClass('fa-check');
                $('.radio').removeClass('selected');
                $(this).addClass('selected');
            });
        });
    </script>

</body>

</html>