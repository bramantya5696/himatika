<section id="page">
    <div class="page container">
        <div class="form-box">
            <div class="section-title">
                Ubah Password
            </div>
            <?= $this->session->flashdata('notif-changepassword'); ?>
            <div class="form">
                <form action="<?= base_url('user/changepassword'); ?>" method="POST">
                    <div class="form-group">
                        <label for="current-password">Password saat ini</label>
                        <div class="input-cells">
                            <input type="password" id="current-password" name="current-password">
                            <?= form_error('current-password', '<small class="alert-danger">', '</small>'); ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="new-password">Password baru</label>
                        <div class="input-cells">
                            <input type="password" id="new-password" name="new-password">
                            <?= form_error('new-password', '<small class="alert-danger">', '</small>'); ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="repeat-password">Ulangi password</label>
                        <div class="input-cells">
                            <input type="password" id="repeat-password" name="repeat-password">
                            <?= form_error('repeat-password', '<small class="alert-danger">', '</small>'); ?>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-secondary">Ubah Password</button>
                </form>
            </div>
        </div>
    </div>
</section>