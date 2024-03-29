<div class="col-md-7 mx-auto">
    <div class="row">
        <div class="col mb-3">
            <div class="card">
                <div class="card-body">
                    <div class="e-profile">
                        <div class="row">
                            <div class="col-12 col-sm-auto mb-3">

                                <div class="img-frame">
                                    <img src="<?php echo base_url('assets/img/avatars/' . $pengurus->user_image); ?>" class="d-flex justify-content-center align-items-center rounded">
                                </div>

                            </div>
                            <div class=" col d-flex flex-column flex-sm-row justify-content-between mb-3">
                                <div class="text-center text-sm-left mb-2 mb-sm-0">
                                    <h4 class="pt-sm-2 pb-1 mb-0 text-nowrap"><?php echo $pengurus->user_name; ?></h4>
                                    <p class="mb-0"><?php echo $pengurus->jabatan_name; ?></p>
                                    <div class="text-muted"><small><?php echo $pengurus->email; ?></small></div>
                                    <div class="mt-2">
                                        <button class="btn btn-primary" type="button">
                                            <i class="fa fa-fw fa-camera"></i>
                                            <span>Change Photo</span>
                                        </button>
                                    </div>
                                </div>
                                <div class="text-center text-sm-right">
                                    <span class="badge bg-secondary"><?php echo $pengurus->user_type; ?></span>
                                    <div class="text-muted"><small>Joined 09 Dec 2017</small></div>
                                </div>
                            </div>
                        </div>
                        <ul class="nav nav-tabs">
                            <li class="nav-item"><a href="" class="active nav-link">Settings</a></li>
                        </ul>
                        <div class="tab-content pt-3">
                            <div class="tab-pane active">
                                <form class="form" novalidate="">
                                    <div class="row">
                                        <div class="col">
                                            <div class="row">
                                                <div class="col">
                                                    <div class="form-group">
                                                        <label>Full Name</label>
                                                        <input class="form-control" type="text" name="name" placeholder="John Smith" value="John Smith">
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <div class="form-group">
                                                        <label>Username</label>
                                                        <input class="form-control" type="text" name="username" placeholder="johnny.s" value="johnny.s">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col">
                                                    <div class="form-group">
                                                        <label>Email</label>
                                                        <input class="form-control" type="text" placeholder="user@example.com">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col mb-3">
                                                    <div class="form-group">
                                                        <label>About</label>
                                                        <textarea class="form-control" rows="5" placeholder="My Bio"></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12 col-sm-6 mb-3">
                                            <div class="mb-2"><b>Change Password</b></div>
                                            <div class="row">
                                                <div class="col">
                                                    <div class="form-group">
                                                        <label>Current Password</label>
                                                        <input class="form-control" type="password" placeholder="••••••">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col">
                                                    <div class="form-group">
                                                        <label>New Password</label>
                                                        <input class="form-control" type="password" placeholder="••••••">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col">
                                                    <div class="form-group">
                                                        <label>Confirm <span class="d-none d-xl-inline">Password</span></label>
                                                        <input class="form-control" type="password" placeholder="••••••">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-5 offset-sm-1 mb-3">
                                            <div class="mb-2"><b>Keeping in Touch</b></div>
                                            <div class="row">
                                                <div class="col">
                                                    <label>Email Notifications</label>
                                                    <div class="custom-controls-stacked px-2">
                                                        <div class="custom-control custom-checkbox">
                                                            <input type="checkbox" class="custom-control-input" id="notifications-blog" checked="">
                                                            <label class="custom-control-label" for="notifications-blog">Blog posts</label>
                                                        </div>
                                                        <div class="custom-control custom-checkbox">
                                                            <input type="checkbox" class="custom-control-input" id="notifications-news" checked="">
                                                            <label class="custom-control-label" for="notifications-news">Newsletter</label>
                                                        </div>
                                                        <div class="custom-control custom-checkbox">
                                                            <input type="checkbox" class="custom-control-input" id="notifications-offers" checked="">
                                                            <label class="custom-control-label" for="notifications-offers">Personal Offers</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col d-flex justify-content-end">
                                            <button class="btn btn-primary" type="submit">Save Changes</button>
                                        </div>
                                    </div>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>