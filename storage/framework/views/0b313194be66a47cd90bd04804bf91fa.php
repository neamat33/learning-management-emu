<?php $__env->startSection('page-title', 'Notice List'); ?>
<?php $__env->startSection('content'); ?>
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="py-2 mb-2"><span class="text-muted fw-light"> Notice List</span></h4>
        <div class="card">
            <div class="card-header py-3 d-flex align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Notice List</h6>
                <h6 class="m-0 font-weight-bold text-primary"><a href="<?php echo e(route('notice.board.create')); ?>" class="btn btn-sm btn-primary"><i class="fa fa-plus"></i> Add Notice</a></h6>
            </div>
            <div class="card-datatable table-responsive pt-0">
                <table class="datatable table">
                    <thead>
                    <tr>
                        <th>SL.</th>
                        <th>Subject</th>
                        <th>Notice Message</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>

                    <?php $__currentLoopData = $allNotice; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $notice): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td><?php echo e(++$key); ?></td>
                            <td><?php echo e($notice->subject); ?></td>
                            <td width="50%"><?php echo e($notice->message); ?></td>
                            <td>
                                <?php if($notice->status == 1): ?>
                                    <span class="badge bg-success set-status">Active</span>
                                <?php else: ?>
                                    <span class="badge bg-danger set-status">Inactive</span>
                                <?php endif; ?>
                            </td>
                            <td>
                                <a href="<?php echo e(route('notice.board.edit',$notice->id)); ?>"
                                   class="btn btn-primary btn-circle btn-sm"><i class="fa fa-edit text-white"></i>
                                </a>
                                <a href="<?php echo e(route('notice.board.delete',$notice->id)); ?>"
                                   class="btn btn-primary btn-circle btn-sm"><i class="fa fa-trash text-white"></i>
                                </a>
                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
                <div class="m-2 text-right">
                    <?php echo $allNotice->links(); ?>

                </div>
            </div>
        </div>

    </div>
    <!-- Modal to edit record -->
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\xampp8.2\htdocs\learning-management-emu\resources\views/admin/notice/index.blade.php ENDPATH**/ ?>