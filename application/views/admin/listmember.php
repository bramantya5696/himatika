<section id="page">
    <div class="page container">
        <div class="section-title">
            List Member
        </div>
        <?= $this->session->flashdata('listmember'); ?>
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>NRP</th>
                        <th>STI</th>
                        <th>Role</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>NRP</th>
                        <th>STI</th>
                        <th>Role</th>
                        <th>Action</th>
                    </tr>
                </tfoot>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($member as $mb) : ?>
                        <tr>
                            <td><?= $i ?></td>
                            <td><?= $mb['name'] ?></td>
                            <td><?= $mb['email'] ?></td>
                            <td><?= $mb['nrp'] ?></td>
                            <td><?= $mb['sti'] ?></td>
                            <td><?= $mb['role'] ?></td>
                            <td>
                                <?php if ($mb['role_id'] != 1) : ?>
                                    <div class="btn btn-danger">
                                        <a href="<?= base_url('admin/deleteuser/') . $mb['id'] ?>" onclick="return confirm('Yakin ingin menghapus user ini?')">
                                            Hapus
                                        </a>
                                    </div>
                                    <div class="btn btn-primary">
                                        <a href="<?= base_url('admin/editmember/') . $mb['id'] ?>">
                                            Atur Member
                                        </a>
                                    </div>
                                <?php endif; ?>
                            </td>
                        </tr>
                        <?php $i++; ?>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</section>