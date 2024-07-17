<div class="modal fade delete-modal" id="confirm-modal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">You want to delete ?</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal">
                </button>
            </div>
            <form id="delete-form" action="" method="POST">
            <?php echo csrf_field(); ?>
            <?php echo method_field('DELETE'); ?>
            <div class="modal-footer">
                <button type="button" class="btn btn-sm btn-danger light" data-bs-dismiss="modal">No. Back !</button>
                <button type="submit" class="btn btn-sm btn-primary">Yes, Delete</button>
            </div>
            </form>
        </div>
    </div>
</div><?php /**PATH I:\xampp\htdocs\ucc_coaching\resources\views/admin/layouts/delete-modal.blade.php ENDPATH**/ ?>