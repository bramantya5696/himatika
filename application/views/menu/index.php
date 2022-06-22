<section id="page">
    <div class="page container">
        <div class="menu-management">
            <div class="section-title">Menu</div>
            <?php if (validation_errors()) : ?>
                <div class="notif alert-danger">
                    <?= validation_errors(); ?>
                </div>
            <?php else : ?>
                <?= $this->session->flashdata('menu'); ?>
            <?php endif; ?>
            <div class="cta btn-addmenu btn-primary">
                <a>Tambahkan Menu</a>
            </div>
            <div class="menu-table">
                <table class="table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Menu</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; ?>
                        <?php foreach ($menu as $m) : ?>
                            <tr>
                                <td><?= $i; ?></td>
                                <td><?= $m['menu']; ?></td>
                                <td>
                                    <div class="btn btn-danger">
                                        <a href="<?= base_url('menu/deletemenu/') . $m['id']; ?>" onclick="return confirm('Yakin ingin menghapus menu ini?');">
                                            Delete
                                        </a>
                                    </div>
                                </td>
                                <?php $i++; ?>
                            </tr>
                        <?php endforeach; ?>
                        <!-- <tr>
                            <td>2</td>
                            <td>Domenic</td>
                            <td>88110</td>
                            <td>dcode</td>
                        </tr>
                        <tr>
                            <td>3</td>
                            <td>Domenic</td>
                            <td>88110</td>
                            <td>
                                <div class="btn btn-alert" href="">
                                    <a href="">
                                        cell
                                    </a>
                                </div>
                                <div class="btn btn-success" href="">
                                    <a href="">
                                        cell
                                    </a>
                                </div>
                                <div class="btn btn-primary" href="">
                                    <a href="">
                                        cell
                                    </a>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>3</td>
                            <td>Domenic</td>
                            <td>88110</td>
                            <td>
                                <div class="btn btn-alert" href="">
                                    <a href="">
                                        cell
                                    </a>
                                </div>
                                <div class="btn btn-success" href="">
                                    <a href="">
                                        cell
                                    </a>
                                </div>
                                <div class="btn btn-primary" href="">
                                    <a href="">
                                        cell
                                    </a>
                                </div>
                            </td>
                        </tr> -->
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>
<div class="modal-background modal-form modal-addmenu">
    <div class="modal container">
        <div class="modal-header">
            <div class="modal-header-title">
                <h1>Tambahkan Menu</h1>
            </div>
        </div>
        <form action="<?= base_url("menu"); ?>" method="POST">
            <div class="modal-content">
                <div class="input-cells">
                    <input type="text" class="input-menuname" id="menu" name="menu" placeholder="Nama Menu">
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn confirm-btn btn-primary"><a>Tambahkan</a></button>
                <div class="btn cancel-btn btn-secondary">
                    <a>Batal</a>
                </div>
            </div>
        </form>
    </div>
</div>