<section id="page">
    <div class="page container">
        <div class="form-box">
            <div class="section-title">
                Edit Profil
            </div>
            <div class="form">
                <?= form_open_multipart('user/editprofile'); ?>
                <div class="form-group">
                    <label for="email">Email</label>
                    <div class="input-cells">
                        <input type="text" id="email" name="email" value="<?= $user['email'] ?>" readonly>
                    </div>
                </div>
                <div class="form-group">
                    <label for="name">Nama</label>
                    <div class="input-cells">
                        <input type="text" id="name" name="name" value="<?= $user['name'] ?>">
                        <?= form_error('name', '<small class="alert-danger">', '</small>'); ?>
                    </div>
                </div>
                <div class="form-group">
                    <label for="sti">STI</label>
                    <select name="sti" id="sti" class="input-option">
                        <option value="STI 52">STI 52</option>
                        <option value="STI 53">STI 53</option>
                        <option value="STI 54">STI 54</option>
                        <option value="STI 55">STI 55</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="nrp">NRP</label>
                    <div class="input-cells">
                        <input type="text" id="nrp" name="nrp" value="<?= $user['nrp'] ?>">
                    </div>
                </div>
                <button type="submit" class="btn btn-secondary">Edit</button>
                </form>
            </div>
        </div>
    </div>
</section>