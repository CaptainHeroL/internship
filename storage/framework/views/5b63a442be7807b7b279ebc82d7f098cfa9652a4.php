<?php $__env->startSection('content'); ?>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Reservation information</div>
                    <div class="card-body">
                        <div class="d-flex flex-column justify-content-center bd-highlight mb-3">
                            <?php if($reservation->status === 'received'): ?>
                                <h1 class="mx-auto mb-0 display-4"><?php echo e($reservation->code); ?></h1>
                                <h5 class="mx-auto mt-0">code</h5>
                                <span class="border-bottom mb-1"></span>
                            <?php else: ?>
                                <h2 class="mx-auto mb-0">Reservation is <?php echo e($reservation->status); ?></h2>
                                <span class="border-bottom mb-1"></span>
                            <?php endif; ?>

                            <h3 class="mx-auto mb-0 mt-2"><?php echo e($reservation->user->room); ?></h3>
                            <h6 class="mx-auto mt-0">room</h6>
                            <span class="border-bottom"></span>

                            <h4 class="mx-auto mb-0 mt-2"><?php echo e($reservation->user->full_name); ?></h4>
                            <h6 class="mx-auto mt-0">specialist</h6>
                            <span class="border-bottom"></span>

                            <?php if($reservation->status === 'received'): ?>
                                <h3 class="mx-auto mb-0 mt-2"><?php echo e($reservation->time_until); ?></h3>
                                <h6 class="mx-auto mt-0">approximate time left until your visit</h6>
                                <span class="border-bottom"></span>
                            <?php endif; ?>

                            <?php if($reservation->status === 'received'): ?>
                                <div class="text-right">
                                    <button type="button" class="btn btn-danger btn-md float-right mt-4 col-xl-3 col-lg-4 col-md-5" data-toggle="modal" data-target="#confirmCancellationModal-<?php echo e($reservation->code); ?>">
                                        Cancel reservation
                                    </button>
                                </div>

                                <?php echo $__env->make('reservation.include._cancel_reservation_modal', ['id' => $reservation->code ,'action' => route('reservation.cancel_by_slug', $reservation->slug)], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/laravel/resources/views/reservation/show.blade.php ENDPATH**/ ?>