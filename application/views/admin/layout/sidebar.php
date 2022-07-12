<?php
$id = $this->session->userdata('id');
$user = $this->user_model->user_detail($id);
$meta = $this->meta_model->get_meta();
?>

<!-- Menu -->

<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
    <div class="app-brand demo">
        <a href="<?php echo base_url('admin/dashboard'); ?>" class="app-brand-link">
            <span class="app-brand-logo demo my-3">
                <img width="60px" class="img-fluid" src="<?php echo base_url('assets/img/logo/' . $meta->favicon); ?>">
            </span>
            <span class="app-brand-text demo menu-text fw-bolder ms-2">Admin</span>
        </a>

        <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
            <i class="bx bx-chevron-left bx-sm align-middle"></i>
        </a>
    </div>

    <div class="menu-inner-shadow"></div>

    <ul class="menu-inner py-1">
        <li class="menu-header small text-uppercase">
            <span class="menu-header-text">Main</span>
        </li>
        <?php if ($user->role_id == 1) : ?>
            <!-- Dashboard -->
            <li class="menu-item <?php if ($this->uri->segment(2) == "dashboard") {
                                        echo 'active';
                                    } ?>">
                <a href="<?php echo base_url('admin/dashboard'); ?>" class="menu-link">
                    <i class="menu-icon tf-icons bx bx-home-circle"></i>
                    <div data-i18n="Analytics">Dashboard</div>
                </a>
            </li>

            <!-- Layouts -->
            <li class="menu-item <?php if ($this->uri->segment(2) == "pengurus" || $this->uri->segment(2) == "anggota" || $this->uri->segment(2) == "admin") {
                                        echo 'active open';
                                    } ?>">
                <a href="javascript:void(0);" class="menu-link menu-toggle">
                    <i class="menu-icon tf-icons bx bx-layout"></i>
                    <div data-i18n="Layouts">Users</div>
                </a>

                <ul class="menu-sub">
                    <li class="menu-item <?php if ($this->uri->segment(2) == "pengurus") {
                                                echo 'active';
                                            } ?>">
                        <a href="<?php echo base_url('admin/pengurus'); ?>" class="menu-link">
                            <div data-i18n="Without menu">Pengurus</div>
                        </a>
                    </li>
                    <li class="menu-item <?php if ($this->uri->segment(2) == "anggota") {
                                                echo 'active';
                                            } ?>">
                        <a href="<?php echo base_url('admin/anggota'); ?>" class="menu-link">
                            <div data-i18n="Without navbar">Anggota</div>
                        </a>
                    </li>
                    <li class="menu-item <?php if ($this->uri->segment(2) == "admin") {
                                                echo 'active';
                                            } ?>">
                        <a href="<?php echo base_url('admin/admin'); ?>" class="menu-link">
                            <div data-i18n="Container">Admin</div>
                        </a>
                    </li>

                </ul>
            </li>

            <li class="menu-header small text-uppercase">
                <span class="menu-header-text">Pages</span>
            </li>
            <li class="menu-item <?php if ($this->uri->segment(2) == "berita" || $this->uri->segment(2) == "category" || $this->uri->segment(2) == "page" || $this->uri->segment(2) == "galery" || $this->uri->segment(2) == "agenda") {
                                        echo 'active open';
                                    } ?>">
                <a href="javascript:void(0);" class="menu-link menu-toggle">
                    <i class="menu-icon tf-icons bx bx-dock-top"></i>
                    <div data-i18n="Account Settings">Web</div>
                </a>
                <ul class="menu-sub">
                    <li class="menu-item <?php if ($this->uri->segment(2) == "berita") {
                                                echo 'active';
                                            } ?>">
                        <a href="<?php echo base_url('admin/berita'); ?>" class="menu-link">
                            <div data-i18n="Account">Berita</div>
                        </a>
                    </li>
                    <li class="menu-item <?php if ($this->uri->segment(2) == "category") {
                                                echo 'active';
                                            } ?>">
                        <a href="<?php echo base_url('admin/category'); ?>" class="menu-link">
                            <div data-i18n="Notifications">Category</div>
                        </a>
                    </li>
                    <li class="menu-item <?php if ($this->uri->segment(2) == "page") {
                                                echo 'active';
                                            } ?>">
                        <a href="<?php echo base_url('admin/page'); ?>" class="menu-link">
                            <div data-i18n="Connections">Page</div>
                        </a>
                    </li>
                    <li class="menu-item <?php if ($this->uri->segment(2) == "galery") {
                                                echo 'active';
                                            } ?>">
                        <a href="<?php echo base_url('admin/galery'); ?>" class="menu-link">
                            <div data-i18n="Connections">Galery</div>
                        </a>
                    </li>
                    <li class="menu-item <?php if ($this->uri->segment(2) == "agenda") {
                                                echo 'active';
                                            } ?>">
                        <a href="<?php echo base_url('admin/agenda'); ?>" class="menu-link">
                            <div data-i18n="Connections">Agenda</div>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="menu-item <?php if ($this->uri->segment(2) == "meta" || $this->uri->segment(2) == "email" || $this->uri->segment(2) == "menu" || $this->uri->segment(2) == "bank") {
                                        echo 'active open';
                                    } ?>">
                <a href="javascript:void(0);" class="menu-link menu-toggle">
                    <i class="menu-icon tf-icons bx bx-lock-open-alt"></i>
                    <div data-i18n="Authentications">Pengaturan</div>
                </a>
                <ul class="menu-sub">
                    <li class="menu-item <?php if ($this->uri->segment(2) == "meta") {
                                                echo 'active';
                                            } ?>">
                        <a href="<?php echo base_url('admin/meta'); ?>" class="menu-link">
                            <div data-i18n="Basic">Situs</div>
                        </a>
                    </li>
                    <li class="menu-item <?php if ($this->uri->segment(2) == "pengaturan") {
                                                echo 'active';
                                            } ?>">
                        <a href="<?php echo base_url('admin/pengaturan'); ?>" class="menu-link">
                            <div data-i18n="Basic">Email</div>
                        </a>
                    </li>
                    <li class="menu-item <?php if ($this->uri->segment(2) == "menu") {
                                                echo 'active';
                                            } ?>">
                        <a href="<?php echo base_url('admin/menu'); ?>" class="menu-link">
                            <div data-i18n="Basic">Menu</div>
                        </a>
                    </li>
                    <li class="menu-item <?php if ($this->uri->segment(2) == "bank") {
                                                echo 'active';
                                            } ?>">
                        <a href="<?php echo base_url('admin/bank'); ?>" class="menu-link">
                            <div data-i18n="Basic">Bank</div>
                        </a>
                    </li>
                </ul>
            </li>











            <!-- Misc -->
            <li class="menu-header small text-uppercase"><span class="menu-header-text">Misc</span></li>
            <li class="menu-item">
                <a href="#" class="menu-link">
                    <i class="menu-icon tf-icons bx bx-support"></i>
                    <div data-i18n="Support">Support</div>
                </a>
            </li>
            <li class="menu-item">
                <a href="#" class="menu-link">
                    <i class="menu-icon tf-icons bx bx-file"></i>
                    <div data-i18n="Documentation">Documentation</div>
                </a>
            </li>
    </ul>
<?php elseif ($user->role_id == 2) : ?>
    <!-- Dashboard -->
    <li class="menu-item <?php if ($this->uri->segment(2) == "dashboard") {
                                echo 'active';
                            } ?>">
        <a href="<?php echo base_url('admin/dashboard'); ?>" class="menu-link">
            <i class="menu-icon tf-icons bx bx-home-circle"></i>
            <div data-i18n="Analytics">Dashboard</div>
        </a>
    </li>

    <!-- Layouts -->
    <li class="menu-item <?php if ($this->uri->segment(2) == "pengurus_dpd" || $this->uri->segment(3) == "create") {
                                echo 'active open';
                            } ?>">
        <a href="javascript:void(0);" class="menu-link menu-toggle">
            <i class="menu-icon tf-icons bx bx-layout"></i>
            <div data-i18n="Layouts">Users</div>
        </a>

        <ul class="menu-sub">
            <li class="menu-item <?php if ($this->uri->segment(2) == "pengurus_dpd") {
                                        echo 'active';
                                    } ?>">
                <a href="<?php echo base_url('admin/pengurus_dpd'); ?>" class="menu-link">
                    <div data-i18n="Without menu">Pengurus</div>
                </a>
            </li>
            <li class="menu-item <?php if ($this->uri->segment(3) == "create") {
                                        echo 'active';
                                    } ?>">
                <a href="<?php echo base_url('admin/pengurus_dpd/create'); ?>" class="menu-link">
                    <div data-i18n="Without menu">Tambah Pengurus</div>
                </a>
            </li>


        </ul>
    </li>

    <li class="menu-item <?php if ($this->uri->segment(3) == "update" || $this->uri->segment(3) == "update_password") {
                                echo 'active open';
                            } ?>">
        <a href="javascript:void(0);" class="menu-link menu-toggle">
            <i class="menu-icon tf-icons bx bx-user"></i>
            <div data-i18n="Layouts">Profile</div>
        </a>

        <ul class="menu-sub">
            <li class="menu-item <?php if ($this->uri->segment(3) == "update") {
                                        echo 'active';
                                    } ?>">
                <a href="<?php echo base_url('admin/profile/update'); ?>" class="menu-link">
                    <div data-i18n="Without menu">Ubah Profile</div>
                </a>
            </li>
            <li class="menu-item <?php if ($this->uri->segment(3) == "update_password") {
                                        echo 'active';
                                    } ?>">
                <a href="<?php echo base_url('admin/profile/update_password'); ?>" class="menu-link">
                    <div data-i18n="Without menu">Ubah Password</div>
                </a>
            </li>


        </ul>
    </li>

<?php elseif ($user->role_id == 3) : ?>
    <!-- Dashboard -->
    <li class="menu-item <?php if ($this->uri->segment(2) == "dashboard") {
                                echo 'active';
                            } ?>">
        <a href="<?php echo base_url('admin/dashboard'); ?>" class="menu-link">
            <i class="menu-icon tf-icons bx bx-home-circle"></i>
            <div data-i18n="Analytics">Dashboard</div>
        </a>
    </li>

    <!-- Layouts -->
    <li class="menu-item <?php if ($this->uri->segment(3) == "update" || $this->uri->segment(3) == "update_password") {
                                echo 'active open';
                            } ?>">
        <a href="javascript:void(0);" class="menu-link menu-toggle">
            <i class="menu-icon tf-icons bx bx-user"></i>
            <div data-i18n="Layouts">Profile</div>
        </a>

        <ul class="menu-sub">
            <li class="menu-item <?php if ($this->uri->segment(3) == "update") {
                                        echo 'active';
                                    } ?>">
                <a href="<?php echo base_url('admin/profile/update'); ?>" class="menu-link">
                    <div data-i18n="Without menu">Ubah Profile</div>
                </a>
            </li>
            <li class="menu-item <?php if ($this->uri->segment(3) == "update_password") {
                                        echo 'active';
                                    } ?>">
                <a href="<?php echo base_url('admin/profile/update_password'); ?>" class="menu-link">
                    <div data-i18n="Without menu">Ubah Password</div>
                </a>
            </li>


        </ul>
    </li>
<?php endif; ?>
</aside>