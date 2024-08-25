<?php $__env->startSection('page-title', 'Order List'); ?>
<?php $__env->startSection('content'); ?>
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="py-2 mb-2"><span class="text-muted fw-light">Order-</span> List</h4>
        <!-- DataTable with Buttons -->
        <div class="card">
            <div class="card-header py-3 d-flex align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Order  List</h6>
            </div>
            <div class="card-datatable table-responsive pt-0">
                <table class="datatable table">
                    <thead>
                    <tr>
                        <th>SL.</th>
                        <th>Photo</th>
                        <th>Course Name</th>
                        <th>Name</th>
                        <th>Phone Number </th>
                        <th>Total Price </th>
                        <th>Payment Type</th>
                        <th>Status</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $__currentLoopData = $orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td><?php echo e(++$key); ?></td>
                            <td><img src="<?php echo e(asset($order->course->image)); ?>" alt="" width="50" height="50"></td>
                            <td><?php echo e($order->course->course_title ?? '-'); ?></td>
                            <td><?php echo e($order->student->name); ?></td>
                            <td><?php echo e($order->student->phone_number); ?></td>
                            <td><?php echo e($order->total_price); ?></td>
                            <td>
                                <?php if($order->payment_type == 'bkash'): ?>
                                    <span>Bkash</span>
                                <?php else: ?>
                                    <span>SSL</span>
                                <?php endif; ?>
                            </td>
                            <td>
                                <?php if($order->status == 'pending'): ?>
                                    <a href="<?php echo e(route('order.confirm',$order->id)); ?>" class="badge bg-warning" title="change to confirm">Pending</a>
                                <?php else: ?>
                                    <a href="<?php echo e(route('order.pending',$order->id)); ?>" class="badge bg-success set-status"  title="change to Pending">Confirm</a>
                                <?php endif; ?>
                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
                <div class="m-2 text-right" style="float: right">
                    <?php echo $orders->links(); ?>

                </div>
            </div>
        </div>

    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('extra_js'); ?>
    <script>

    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\xampp8.2\htdocs\learning-management-emu\resources\views/admin/order/index.blade.php ENDPATH**/ ?>