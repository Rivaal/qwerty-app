<?php $session = \Config\Services::session();
$level = $session->get('level'); ?>
<?= $this->extend('user/layout_user') ?>

<?= $this->section('content') ?>
<section id="content">
    <div class="content-wrap">
        <div class="container clearfix">

            <div class="accordion accordion-lg mx-auto mb-0 clearfix" style="max-width: 550px;">

                <div class="accordion-header">
                    <div class="accordion-icon">
                        <i class="accordion-closed icon-lock3"></i>
                        <i class="accordion-open icon-unlock"></i>
                    </div>
                    <div class="accordion-title">
                        Login to your Account
                    </div>
                </div>
                <div class="accordion-content clearfix">
                    <form id="login-form" name="login-form" class="row mb-0" action="#" method="post">
                        <div class="col-12 form-group">
                            <label for="login-form-username">Username:</label>
                            <input type="text" id="login-form-username" name="login-form-username" value=""
                                class="form-control" />
                        </div>

                        <div class="col-12 form-group">
                            <label for="login-form-password">Password:</label>
                            <input type="password" id="login-form-password" name="login-form-password" value=""
                                class="form-control" />
                        </div>

                        <div class="col-12 form-group">
                            <button class="button button-3d button-black m-0" id="login-form-submit"
                                name="login-form-submit" value="login">Login</button>
                            <a href="#" class="float-end">Forgot Password?</a>
                        </div>
                    </form>
                </div>

                <div class="accordion-header">
                    <div class="accordion-icon">
                        <i class="accordion-closed icon-user4"></i>
                        <i class="accordion-open icon-ok-sign"></i>
                    </div>
                    <div class="accordion-title">
                        New Signup? Register for an Account
                    </div>
                </div>
                <div class="accordion-content clearfix">
                    <form id="register-form" name="register-form" class="row mb-0" action="#" method="post">
                        <div class="col-12 form-group">
                            <label for="register-form-name">Name:</label>
                            <input type="text" id="register-form-name" name="register-form-name" value=""
                                class="form-control" />
                        </div>

                        <div class="col-12 form-group">
                            <label for="register-form-email">Email Address:</label>
                            <input type="text" id="register-form-email" name="register-form-email" value=""
                                class="form-control" />
                        </div>

                        <div class="col-12 form-group">
                            <label for="register-form-username">Choose a Username:</label>
                            <input type="text" id="register-form-username" name="register-form-username" value=""
                                class="form-control" />
                        </div>

                        <div class="col-12 form-group">
                            <label for="register-form-phone">Phone:</label>
                            <input type="text" id="register-form-phone" name="register-form-phone" value=""
                                class="form-control" />
                        </div>

                        <div class="col-12 form-group">
                            <label for="register-form-password">Choose Password:</label>
                            <input type="password" id="register-form-password" name="register-form-password" value=""
                                class="form-control" />
                        </div>

                        <div class="col-12 form-group">
                            <label for="register-form-repassword">Re-enter Password:</label>
                            <input type="password" id="register-form-repassword" name="register-form-repassword"
                                value="" class="form-control" />
                        </div>

                        <div class="col-12 form-group">
                            <button class="button button-3d button-black m-0" id="register-form-submit"
                                name="register-form-submit" value="register">Register Now</button>
                        </div>
                    </form>
                </div>

            </div>

        </div>
    </div>
</section><!-- #content end -->
<?= $this->EndSection('content') ?>