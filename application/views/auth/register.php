<section id="form-auth">
    <div class="form-auth register container">
        <div class="text-bold-weight-left-center">
            <h1>Register</h1>
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
            <form class="input-form register-form" action="<?= base_url("auth/register"); ?>" method="post" name="register">
                <div class="input-wrapper">
                    <div class="input-box ib-name">
                        <label class="icon" for="name"><i class="fas fa-user"></i></label>
                        <input type="text" class="input-form-name" placeholder="Nama Lengkap" id="name" name="name" value="<?= set_value("name"); ?>">
                    </div>
                    <?= form_error('name', '<small class="text-danger">', '</small>') ?>
                </div>
                <div class="input-wrapper">
                    <div class="input-box ib-email">
                        <label class="icon" for="email"><i class="fas fa-at"></i></label>
                        <input type="email" class="input-form-email" placeholder="Email Anda" id="email" name="email" value="<?= set_value("email"); ?>">
                    </div>
                    <?= form_error('email', '<small class="text-danger">', '</small>') ?>
                </div>
                <div class="input-wrapper">
                    <div class="input-box ib-password">
                        <label class="icon" for="password"><i class="fas fa-key"></i></label>
                        <input type="password" class="input-form-password" placeholder="Password" name="password" id="password">
                    </div>
                    <?= form_error('password', '<small class="text-danger">', '</small>') ?>
                </div>
                <div class="input-wrapper">
                    <div class="input-box ib-repeat-password">
                        <label class="icon" for="repeat-password"><i class="fas fa-key"></i></label>
                        <input type="password" class="input-form-repeat-password" placeholder="Ulangi Password" name="repeat-password" id="repeat-password">
                    </div>
                    <?= form_error('repeat-password', '<small class="text-danger">', '</small>') ?>
                </div>
                <div class="text-link">
                    <div class="link-register"><a href="<?= base_url('auth') ?>">Sudah memiliki akun? Silahkan login</a></div>
                </div>
                <div class="cta register-button">
                    <button type="submit" class="input-form-btn">Buat Akun</button>
                </div>
            </form>

        </div>
    </div>
</section>