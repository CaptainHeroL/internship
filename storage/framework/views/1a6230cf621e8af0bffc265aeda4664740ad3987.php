<div class="modal fade" id="confirmCancellationModal-<?php echo e($id); ?>" tabindex="-1" role="dialog" aria-labelledby="confirmCancellationModalLabel-<?php echo e($id); ?>" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title" id="confirmCancellationModalLabel-<?php echo e($id); ?>">Are you sure?</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <h5>Are you sure you want to cancel the reservation <b><?php echo e($id); ?></b>?<br> This process cannot be undone.</h5>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-lg btn-secondary" data-dismiss="modal">No</button>
                <form method="POST" action="<?php echo e($action); ?>">
                    <?php echo csrf_field(); ?>
                    <button class="btn btn-danger btn-lg float-right">Yes</button>
                </form>
            </div>
        </div>
    </div>
</div>
<?php /**PATH /var/www/html/laravel/resources/views/reservation/include/_cancel_reservation_modal.blade.php ENDPATH**/ ?>