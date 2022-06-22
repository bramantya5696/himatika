<section id="page">
    <div class="page container">
        <div class="form-box">
            <div class="section-title">
                Edit Member
            </div>
            <p>Name : <?= $member['name']; ?></p>
            <div class="form">
                <?= form_open_multipart('admin/setmember'); ?>
                <input type="hidden" id="id" name="id" value="<?= $member['id'] ?>">
                <div class="form-group">
                    <label for="role-id">Role</label>
                    <select name="role-id" id="role-id" class="input-option">
                        <?php foreach ($role as $r) : ?>
                            <?php if ($r['id'] == $member['role_id']) : ?>
                                <option value="<?= $r['id'] ?>" selected><?= $r['role'] ?></option>
                            <?php else : ?>
                                <option value="<?= $r['id'] ?>"><?= $r['role'] ?></option>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </select>
                </div>
                <button type="submit" class="btn btn-secondary">Edit</button>
                </form>
            </div>
        </div>
    </div>
</section>