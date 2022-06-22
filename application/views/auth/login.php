<section id="form-auth">
    <div class="form-auth login container">
        <div class="text-bold-weight-left-center">
            <h1>Login</h1>
        </div>

        <?= $this->session->flashdata('reset-password-success'); ?>
        <?= $this->session->flashdata('message'); ?>

        <div class="form-box">
            <!-- <div class="success-notification d-none">
                    <div class="alert">
                        <p><strong>Selamat!</strong> Pesan telah terkirim</p>
                    </div>
                    <div class="close">
                        <i class="fas fa-times"></i>
                    </div>
                </div> -->
            <form class="input-form login-form" action="<?= base_url('auth'); ?>" method="post" name="login">
                <div class="input-wrapper iw-email">
                    <div class="input-box ib-email">
                        <label class="icon" for="email"><i class="fas fa-user"></i></label>
                        <input type="email" class="input-form-email" placeholder="Email Anda" id="email" name="email" value="<?= set_value('email'); ?>">
                    </div>
                    <?= form_error('email', '<small class="text-danger">', '</small>') ?>
                </div>
                <div class="input-wrapper iw-password">
                    <div class="input-box ib-password">
                        <label class="icon" for="password"><i class="fas fa-key"></i></label>
                        <input type="password" class="input-form-password" placeholder="Password" id="password" name="password">
                    </div>
                    <?= form_error('password', '<small class="text-danger">', '</small>') ?>
                </div>
                <div class="text-link">
                    <div class="link-forgot-password">
                        <a href="<?= base_url('auth/forgotpassword'); ?> ">Lupa Password?</a>
                    </div>
                    <div class="link-register"><a href="<?= base_url("auth/register"); ?>">Register akun</a></div>
                </div>
                <div class="cta login-button">
                    <button type="submit" class="input-form-btn">Login</button>
                </div>
            </form>

        </div>
    </div>
</section>