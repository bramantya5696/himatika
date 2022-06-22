<section id="page">
    <div class="page container">
        <div class="form-box">
            <div class="section-title">
                Edit Sub Menu
            </div>
            <div class="form">
                <?= form_open_multipart('menu/changesubmenu'); ?>
                <div class="input-cells">
                    <input type="hidden" class="input-submenu" id="submenu_id" name="submenu_id" value="<?= $submenu_id ?>">
                </div>
                <div class="form-group">
                    <label for="title">Judul Sub Menu</label>
                    <div class="input-cells">
                        <input type="text" class="input-submenu" id="title" name="title" placeholder="Nama Title" value="<?= $selected_sm['title'] ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label for="menu_id">Menu</label>
                    <select name="menu_id" id="menu_id" class="input-submenu">
                        <?php foreach ($menu as $m) : ?>
                            <option value="<?= $m['id'] ?>"><?= $m['menu'] ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <!-- <div class="form-group">
                        <label for="jobdesc">Jabatan</label>
                        <select name="jobdesc" id="jobdesc" class="input-submenu">
                            <option value="">Select Menu</option>
                            <option value="">Select Menu</option>
                            <option value="">Select Menu</option>
                            <option value="">Select Menu</option>
                        </select>
                    </div> -->
                <div class="form-group">
                    <label for="url">URL</label>
                    <div class="input-cells">
                        <input type="text" class="input-submenu" id="url" name="url" placeholder="Nama URL" value="<?= $selected_sm['url'] ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label for="icon">Icon</label>
                    <div class="input-cells">
                        <input type="text" class="input-submenu" id="icon" name="icon" placeholder="Icon" value="<?= $selected_sm['icon'] ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label for="is_active" class="check-label-submenu">Active?</label>
                    <input type="checkbox" class="check-input-submenu" id="is_active" name="is_active" value="1" <?php if ($selected_sm['is_active'] == 1) {
                                                                                                                        echo 'checked';
                                                                                                                    } ?>>
                </div>
                <button type="submit" class="btn btn-secondary">Edit</button>
                </form>
            </div>
        </div>
    </div>
</section>