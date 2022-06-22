<section id="page">
    <div class="page container">
        <div class="submenu-management">
            <div class="section-title">Sub Menu</div>
            <?php if (validation_errors()) : ?>
                <div class="notif alert-danger">
                    <?= validation_errors(); ?>
                </div>
            <?php else : ?>
                <?= $this->session->flashdata('submenu'); ?>
            <?php endif; ?>
            <div class="cta btn-addsubmenu btn-primary">
                <a>Tambahkan Sub Menu</a>
            </div>
            <div class="submenu-table">
                <table class="table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Title</th>
                            <th>Menu</th>
                            <th>URL</th>
                            <th>Icon</th>
                            <th>Active</th>
                            <th>Action</th>

                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; ?>
                        <?php foreach ($subMenu as $sm) : ?>
                            <tr>
                                <td><?= $i; ?></td>
                                <td><?= $sm['title']; ?></td>
                                <td><?= $sm['menu']; ?></td>
                                <td><?= $sm['url']; ?></td>
                                <td><?= $sm['icon']; ?></td>
                                <td><?php
                                    if ($sm['is_active'] == 1) {
                                        echo 'yes';
                                    } else if ($sm['is_active'] == 0) {
                                        echo 'no';
                                    } else {
                                        echo 'undefined';
                                    } ?></td>
                                <td>
                                    <div class="btn btn-danger">
                                        <a href="<?= base_url('menu/deletesubmenu/') . $sm['id'] ?>" onclick="return confirm('Yakin ingin menghapus submenu ini?')">
                                            Delete
                                        </a>
                                    </div>
                                    <div class="btn btn-primary">
                                        <a href="<?= base_url('menu/editsubmenu/') . $sm['id'] ?>">
                                            Edit
                                        </a>
                                    </div>
                                </td>
                            </tr>
                            <?php $i++; ?>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>
<div class="modal-background modal-form modal-addsubmenu">
    <div class="modal container">
        <div class="modal-header">
            <div class="modal-header-title">
                <h1>Tambahkan Sub Menu</h1>
            </div>
        </div>
        <form action="<?= base_url('menu/submenu'); ?>" method="POST">
            <div class="modal-content">
                <div class="input-cells">
                    <input type="text" class="input-submenu" id="title" name="title" placeholder="Nama Title">
                </div>
                <div class="input-cells">
                    <select name="menu_id" id="menu_id" class="input-submenu">
                        <option value="">Select Menu</option>
                        <?php foreach ($menu as $m) : ?>
                            <option value="<?= $m['id']; ?>"><?= $m['menu']; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="input-cells">
                    <input type="text" class="input-submenu" id="url" name="url" placeholder="Nama URL">
                </div>
                <div class="input-cells">
                    <input type="text" class="input-submenu" id="icon" name="icon" placeholder="Nama icon">
                </div>
                <div class="input-checkbox">
                    <input type="checkbox" class="check-input-submenu" id="is_active" name="is_active" value="1" checked>
                    <label for="is_active" class="check-label-submenu">Active?</label>
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