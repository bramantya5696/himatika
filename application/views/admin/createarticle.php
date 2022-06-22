<section id="page">
    <div class="page container">
        <div class="form-box">
            <div class="section-title">
                Buat Artikel
            </div>
            <?= $this->session->flashdata('createarticle'); ?>
            <div class="form">
                <?= form_open_multipart('admin/createarticle'); ?>
                <div class="form-group">
                    <label for="artctitle">Judul Artikel</label>
                    <div class="input-cells">
                        <input type="text" id="artctitle" name="artctitle">
                        <?= form_error('artctitle', '<small class="alert-danger">', '</small>'); ?>
                    </div>
                </div>
                <div class="form-group">
                    <label for="artcid">Topik</label>
                    <select name="artcid" id="artcid" class="input-option">
                        <?php foreach ($article as $artc) : ?>
                            <option value="<?= $artc['id'] ?>"><?= $artc['artcs_topic'] ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="form-group">
                    <label>Gambar Utama</label>
                    <div class="input-cells">
                        <input type="file" id="mainimagefile" name="mainimagefile">
                        <label for="mainimagefile">Pilih Gambar</label>
                    </div>
                </div>
                <div class="form-group">
                    <label for="description">Deskripsi</label>
                    <div class="input-cells">
                        <textarea id="description" name="description"></textarea>
                    </div>
                </div>
                <div class="form-group">
                    <label for="publisher">Creator</label>
                    <div class="input-cells">
                        <input type="text" id="publisher" name="publisher">
                        <?= form_error('publisher', '<small class="alert-danger">', '</small>'); ?>
                    </div>
                </div>
                <div class="form-group">
                    <label for="publisherlink">Link Creator</label>
                    <div class="input-cells">
                        <input type="text" id="publisherlink" name="publisherlink">
                    </div>
                </div>
                <button type="submit" class="btn btn-secondary">Buat</button>
                </form>
            </div>
        </div>
    </div>
</section>