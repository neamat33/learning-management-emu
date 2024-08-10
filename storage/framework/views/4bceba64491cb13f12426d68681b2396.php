<?php $__env->startSection('page-title', 'Contact Message List'); ?>
<?php $__env->startSection('content'); ?>
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="py-2 mb-2"><span class="text-muted fw-light"> </span> Contact Message</h4>
        <div class="card">
            <div class="card-header py-3 d-flex align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Contact Message List</h6>
            </div>
            <div class="card-datatable table-responsive pt-0">
                <table class="datatable table">
                    <thead>
                    <tr>
                        <th>SL.</th>
                        <th>Name</th>
                        <th>Phone Number</th>
                        <th>Email </th>
                        <th>Message</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $__currentLoopData = $contactMessage; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $message): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td><?php echo e(++$key); ?></td>
                            <td><?php echo e($message->name); ?></td>
                            <td><?php echo e($message->phone_number); ?></td>
                            <td><?php echo e($message->email); ?></td>
                            <td><?php echo e($message->message); ?></td>
                            <td>
                                <a href="<?php echo e(route('message.delete',$message->id)); ?>"
                                   class="btn btn-danger btn-circle btn-sm"><i class="fa fa-trash text-white"></i>
                                </a>
                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
                <div class="m-2 text-right">
                    <?php echo $contactMessage->links(); ?>

                </div>
            </div>
        </div>

    </div>
    <!-- Modal to edit record -->




<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\xampp8.2\htdocs\learning-management-emu\resources\views/admin/contact/index.blade.php ENDPATH**/ ?>