<?php $__env->startSection('content'); ?>
    <!-- =======================
Page content START -->
    <section class="pt-5">
        <div class="container">
                <div class="row g-4 g-sm-5">
                    <!-- Main content START -->
                    <div class="col-xl-12 mb-4 mb-sm-0">
                        <!-- Personal info START -->
                        <div class="card card-body shadow p-4">
                            <div style="text-align: center">
                                <div>
                                    <img src="<?php echo e(asset('web/green.jpg')); ?>" style="height: 200px;width: 200px" />
                                </div>
                                <h5 class="mb-0">Your Order has been successful! Please wait for course permission..</h5>
                                <h5>Or</h5>
                                <h6>Contact: 01631025895</h6>
                            </div>
                            <!-- Title -->
                            <!-- Form END -->
                        </div>
                        <!-- Personal info END -->
                    </div>
                    <!-- Main content END -->
                </div><!-- Row END -->
            </form>
        </div>
    </section>
    <!-- =======================
    Page content END -->
<?php $__env->stopSection(); ?>
<?php $__env->startPush('js'); ?>

<?php $__env->stopPush(); ?>


<?php echo $__env->make('frontend.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\xampp8.2\htdocs\learning-management-emu\resources\views/frontend/success.blade.php ENDPATH**/ ?>