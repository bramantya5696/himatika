<section id="page">
    <div class="page container">
        <div class="section-title">
            List Artikel
        </div>
        <?= $this->session->flashdata('article'); ?>
        <div class="cta btn-primary">
            <a href="<?= base_url('admin/createarticle') ?>">Tambahkan Artikel</a>
        </div>
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Judul Artikel</th>
                        <th>Topik</th>
                        <th>Foto Utama</th>
                        <th>Publisher</th>
                        <th>Link Publisher</th>
                        <th>Tanggal Dibuat</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>No</th>
                        <th>Judul Artikel</th>
                        <th>Topik</th>
                        <th>Foto Utama</th>
                        <th>Publisher</th>
                        <th>Link Publisher</th>
                        <th>Tanggal Dibuat</th>
                        <th>Action</th>
                    </tr>
                </tfoot>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($articles as $artcs) : ?>
                        <tr>
                            <td><?= $i ?></td>
                            <td><?= $artcs['artc_title'] ?></td>
                            <td><?= $artcs['artcs_topic'] ?></td>
                            <td><?= $artcs['artc_image'] ?></td>
                            <td><?= $artcs['artc_publisher'] ?></td>
                            <td><?= $artcs['artc_publisher_link'] ?></td>
                            <td><?= date('d F Y', $artcs['artc_date_created']) ?>
                            </td>
                            <td>
                                <div class="btn btn-danger">
                                    <a href="<?= base_url('admin/deletearticle/') . $artcs['id']; ?>" onclick="return confirm('Yakin ingin menghapus artikel ini?')">
                                        Hapus
                                    </a>
                                </div>
                                <div class="btn btn-primary">
                                    <a href="<?= base_url('admin/editarticle/') . $artcs['id']; ?>">
                                        Edit Artikel
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
</section>