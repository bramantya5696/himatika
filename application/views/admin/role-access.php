<section id="page">
    <div class="page container">
        <div class="role-access">
            <div class="section-title">Akses Role</div>
            <?= $this->session->flashdata('access-changed'); ?>
            <div class="selected-role-header">Role : <?= $role['role']; ?></div>
            <div class="role-access-table">
                <table class="table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Menu</th>
                            <th>Access</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; ?>
                        <?php foreach ($menu as $m) : ?>
                            <tr>
                                <td><?= $i; ?></td>
                                <td><?= $m['menu']; ?></td>
                                <td>
                                    <div class="menu-access">
                                        <input type="checkbox" class="form-check-input form-check-input-role-access" <?= check_access($role['id'], $m['id']); ?> data-roleid="<?= $role['id']; ?>" data-menuid="<?= $m['id']; ?>">
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