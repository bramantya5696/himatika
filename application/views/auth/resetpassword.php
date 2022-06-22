<section id="form-auth">
    <div class="form-auth container">
        <div class="text-bold-weight-left-center">
            <h1>Reset Password</h1>
        </div>
        <div class="text-email-session">
            Ubah password dari email : <?= $this->session->userdata('resetpassword') ?>
        </div>
        <div class="form-box">
            <!-- <div class="success-notification d-none">
                    <div class="alert">
                        <p><strong>Selamat!</strong> Pesan telah terkirim</p>
                    </div>
                    <div class="close">
                        <i class="fas fa-times"></i>
                    </div>
                </div> -->
            <form class="input-form" action="<?= base_url("auth/resetpassword"); ?>" method="post" name="reset-password">
                <div class="input-wrapper">
                    <div class="input-box ib-password">
                        <label class="icon" for="password"><i class="fas fa-key"></i></label>
                        <input type="password" class="input-form-password" placeholder="Masukkan password baru" name="password" id="password">
                    </div>
                    <?= form_error('password', '<small class="text-danger">', '</small>') ?>
                </div>
                <div class="input-wrapper">
                    <div class="input-box ib-repeat-password">
                        <label class="icon" for="repeat-password"><i class="fas fa-key"></i></label>
                        <input type="password" class="input-form-password" placeholder="Ulangi password baru" name="repeat-password" id="repeat-password">
                    </div>
                    <?= form_error('repeat-password', '<small class="text-danger">', '</small>') ?>
                </div>
                <div class="text-link">
                    <div class="link-register"><a href="<?= base_url('auth') ?>">Kembali ke halaman login</a></div>
                </div>
                <div class="cta">
                    <button type="submit" class="input-form-btn">Reset</button>
                </div>
            </form>

        </div>
    </div>
</section>