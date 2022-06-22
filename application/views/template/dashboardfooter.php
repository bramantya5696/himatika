<div class="modal-background modal-logout">
    <div class="modal container">
        <div class="modal-header">
            <div class="modal-header-title">
                <h1>Logout</h1>
            </div>
        </div>
        <div class="modal-content">
            <p>Apakah ingin keluar?</p>
        </div>
        <div class="modal-footer">
            <div class="btn confirm-btn btn-primary">
                <a href="<?= base_url('auth/logout'); ?>">Keluar</a>
            </div>
            <div class="btn cancel-btn btn-secondary">
                <a>Tidak</a>
            </div>
        </div>
    </div>
</div>
<section id="footer">
    <div class="footer container">
        <div class="copyright">
            <p>Copyright © <span id="year"></span> HIMATIKA ITS. All Rights Reserved</p>
        </div>
    </div>
</section>
<script src="<?= base_url('assets/HIMATIKA/dashboard/'); ?>app.js"></script>
<script src="<?= base_url('assets/HIMATIKA/dashboard/'); ?>modaladdmenu.js"></script>
<script src="<?= base_url('assets/HIMATIKA/dashboard/'); ?>modaladdsubmenu.js"></script>
<script src="<?= base_url('assets/HIMATIKA/dashboard/'); ?>addrole.js"></script>
<script src="<?= base_url('assets/') ?>vendor/jquery/jquery.min.js"></script>
<script src="<?= base_url('assets/') ?>vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Page level plugins -->
<script src="<?= base_url('assets/HIMATIKA/dashboard/') ?>datatables/jquery.dataTables.min.js"></script>
<script src="<?= base_url('assets/HIMATIKA/dashboard/') ?>datatables/dataTables.bootstrap4.min.js"></script>

<!-- Page level custom scripts -->
<script src="<?= base_url('assets/HIMATIKA/dashboard/') ?>datatables/datatables-demo.js"></script>

<script>
    $('.form-check-input-role-access').on('click', function() {
        const menuId = $(this).data('menuid');
        const roleId = $(this).data('roleid');

        $.ajax({
            url: "<?= base_url('admin/changeaccess'); ?>",
            type: 'post',
            data: {
                menuId: menuId,
                roleId: roleId
            },
            success: function() {
                document.location.href = "<?= base_url('admin/roleaccess/'); ?>" + roleId;
            }
        });

    });
</script>
</body>

</html>
