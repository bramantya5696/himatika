<section id="page">
    <div class="page container">
        <div class="form-box">
            <div class="section-title">
                Edit Artikel
            </div>
            <div class="form">
                <?= form_open_multipart('admin/changearticle'); ?>
                <input type="hidden" id="id" name="id" value="<?= $sel_article['id'] ?>">
                <div class="form-group">
                    <label for="artctitle">Judul Artikel</label>
                    <div class="input-cells">
                        <input type="text" id="artctitle" name="artctitle" value="<?= $sel_article['artc_title'] ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label for="artcid">Topik</label>
                    <select name="artcid" id="artcid" class="input-option">
                        <?php foreach ($article as $artc) : ?>
                            <?php if ($artc['id'] == $sel_article['artc_id']) : ?>
                                <option value="<?= $artc['id'] ?>" selected><?= $artc['artcs_topic'] ?></option>
                            <?php else : ?>
                                <option value="<?= $artc['id'] ?>"><?= $artc['artcs_topic'] ?></option>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="form-group">
                    <label>Gambar Utama</label>
                    <div class="input-cells">
                        <input type="file" id="mainimagefileedit" name="mainimagefileedit">
                        <label for="mainimagefileedit">Pilih Gambar</label>
                    </div>
                </div>
                <div class="form-group">
                    <label for="description">Deskripsi</label>
                    <div class="input-cells">
                        <textarea id="description" name="description"><?= $sel_article['artc_description'] ?></textarea>
                    </div>
                </div>
                <div class="form-group">
                    <label for="publisher">Creator</label>
                    <div class="input-cells">
                        <input type="text" id="publisher" name="publisher" value="<?= $sel_article['artc_publisher'] ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label for="publisherlink">Link Creator</label>
                    <div class="input-cells">
                        <input type="text" id="publisherlink" name="publisherlink" value="<?= $sel_article['artc_publisher_link'] ?>">
                    </div>
                </div>
                <button type="submit" class="btn btn-secondary">Edit</button>
                </form>
            </div>
        </div>
    </div>
</section>