<section id="form-auth">
    <div class="form-auth container">
        <div class="text-bold-weight-left-center">
            <h1>Lupa Password?</h1>
        </div>

        <?= $this->session->flashdata('forgotpassword'); ?>

        <div class="form-box">
            <!-- <div class="success-notification d-none">
                    <div class="alert">
                        <p><strong>Selamat!</strong> Pesan telah terkirim</p>
                    </div>
                    <div class="close">
                        <i class="fas fa-times"></i>
                    </div>
                </div> -->
            <form class="input-form" action="<?= base_url('auth/forgotpassword'); ?>" method="post" name="forgot-password">
                <div class="input-wrapper iw-email">
                    <div class="input-box ib-email">
                        <label class="icon" for="email"><i class="fas fa-user"></i></label>
                        <input type="email" class="input-form-email" placeholder="Email Anda" id="email" name="email">
                    </div>
                    <?= form_error('email', '<small class="text-danger">', '</small>') ?>
                </div>
                <div class="text-link">
                    <div class="link-login">
                        <a href="<?= base_url('auth'); ?>">Kembali ke halaman login</a>
                    </div>
                </div>
                <div class="cta forgot-password-button">
                    <button type="submit" class="input-form-btn">Reset Password</button>
                </div>
            </form>

        </div>
    </div>
</section>