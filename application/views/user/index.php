<section id="page">
    <div class="page container">
        <div class="section-title">
            Profil
        </div>
        <?= $this->session->flashdata('profil'); ?>
        <div class="box">
            <div class="box-left">
                <div class="image">
                    <img src="<?= base_url('assets/himatika/') ?>image/pngegg.png" alt="">
                </div>
            </div>
            <div class="box-right">
                <div class="description">
                    <ul>
                        <li>Nama : <?= $user['name']; ?></li>
                        <li>Email : <?= $user['email']; ?></li>
                        <li>NRP : <?= $user['nrp']; ?></li>
                        <li>STI : <?= $user['sti']; ?></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>