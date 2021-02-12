<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-9">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-6">
                            <?php echo e(__('Dashboard')); ?>

                        </div>
                        <div class="col-6 text-right">
                            <?php if(Auth::user()->is_available): ?>
                                <form method="POST" action="<?php echo e(route('status.unavailable')); ?>">
                                    <?php echo csrf_field(); ?>
                                    <button class="btn btn-sm btn-danger mx-1">Become unavailable</button>
                                </form>
                            <?php else: ?>
                                <form method="POST" action="<?php echo e(route('status.available')); ?>">
                                    <?php echo csrf_field(); ?>
                                    <button class="btn btn-sm btn-success mx-1">Become available</button>
                                </form>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    <?php if($reservations->count()): ?>
                        <table class="table">
                        <thead class="thead-dark">
                        <tr>
                            <th scope="col">Code</th>
                            <th scope="col">Start at</th>
                            <th scope="col">Status</th>
                            <th scope="col"></th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php ($isReservationInProgress = False); ?>
                        <?php ($isReservationFirstInList = True); ?>
                        <?php $__currentLoopData = $reservations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $reservation): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <th scope="row"><?php echo e($reservation->code); ?></th>
                                <td><?php echo e($reservation->start_at); ?></td>
                                <td><?php echo e($reservation->status); ?></td>
                                <td>
                                    <div class="row float-right">
                                        <?php if($reservation->status === 'in progress'): ?>
                                            <?php ($isReservationInProgress = True); ?>
                                            <form method="POST" action="<?php echo e(route('reservation.finish', $reservation->id)); ?>">
                                                <?php echo csrf_field(); ?>
                                                <button class="btn btn-sm btn-primary mx-1">Finish</button>
                                            </form>
                                        <?php elseif($reservation->status === 'received'): ?>
                                            <?php if(!$isReservationInProgress && $isReservationFirstInList): ?>
                                                <form method="POST" action="<?php echo e(route('reservation.start', $reservation->id)); ?>">
                                                    <?php echo csrf_field(); ?>
                                                    <button class="btn btn-sm btn-success mx-1">Begin</button>
                                                </form>
                                                <?php ($isReservationFirstInList = False); ?>
                                            <?php endif; ?>
                                            <button type="button" class="btn btn-danger btn-sm mx-1" data-toggle="modal" data-target="#confirmCancellationModal-<?php echo e($reservation->code); ?>">
                                                Cancel
                                            </button>
                                            <?php echo $__env->make('reservation.include._cancel_reservation_modal', ['id' => $reservation->code, 'action' => route('reservation.cancel_by_id', $reservation->id)], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                        <?php endif; ?>
                                    </div>
                                </td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                    <?php else: ?>
                        <span>There are no reservations to show.</span>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/laravel/resources/views/user/index.blade.php ENDPATH**/ ?>