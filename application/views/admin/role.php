<section id="page">
    <div class="page container">
        <div class="role">
            <div class="section-title">Role</div>
            <?php if (validation_errors()) : ?>
                <div class="notif alert-danger">
                    <?= validation_errors(); ?>
                </div>
            <?php else : ?>
                <?= $this->session->flashdata('role'); ?>
            <?php endif; ?>
            <div class="cta btn-addrole btn-primary">
                <a>Tambahkan Role</a>
            </div>
            <div class="role-table">
                <table class="table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Role</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; ?>
                        <?php foreach ($role as $r) : ?>
                            <tr>
                                <td><?= $i; ?></td>
                                <td><?= $r['role']; ?></td>
                                <td>
                                    <div class="btn btn-danger">
                                        <a href="<?= base_url('admin/deleterole/') . $r['id']; ?>" onclick="return confirm('yakin?');">
                                            Delete
                                        </a>
                                    </div>
                                    <div class="btn btn-primary">
                                        <a href="<?= base_url('admin/roleaccess/') . $r['id']; ?>">
                                            Access
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
<div class="modal-background modal-form modal-addrole">
    <div class="modal container">
        <div class="modal-header">
            <div class="modal-header-title">
                <h1>Tambahkan Role</h1>
            </div>
        </div>
        <form action="<?= base_url('admin/role'); ?>" method="POST">
            <div class="modal-content">
                <div class="input-cells">
                    <input type="text" class="input-role" id="role" name="role" placeholder="Nama Role">
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