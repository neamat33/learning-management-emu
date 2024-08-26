<?php $__env->startSection('page-title', 'Course List'); ?>
<?php $__env->startSection('content'); ?>
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="py-2 mb-2"><span class="text-muted fw-light">Academic /</span> Course</h4>
        <div class="card card-body mb-2">
            <form action="">
                <div class="row">
                    <div class="form-group col-md-6">
                        <input type="text" name="name" class="form-control" placeholder="Course Name" value="<?php echo e(request('name')); ?>">
                    </div>


                    <div class="form-row col-md-3">
                        <div class="form-group float-right">
                            <button class="btn btn-primary" type="submit">
                                    <i class="fa fa-sliders"></i>
                                    Filter
                            </button>
                            <a href="<?php echo e(route('courses.index')); ?>" class="btn btn-info">Reset</a>
                        </div>
                    </div>
                </div>

            </form>
        </div>
        <!-- DataTable with Buttons -->
        <div class="card">
            <div class="card-header py-3 d-flex align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Course  List</h6>
                <h6 class="m-0 font-weight-bold text-primary"><a href="<?php echo e(route('courses.create')); ?>" class="btn btn-sm btn-primary"><i class="fa fa-plus"></i> Add
                    Course </a></h6>
            </div>
            <div class="card-datatable table-responsive pt-0">
                <table class="datatable table">
                    <thead>
                        <tr>
                            <th>SL.</th>
                            <th>Photo</th>
                            <th>Course Name</th>
                            <th>Start Date</th>
                            <th>Price </th>
                            <th>Category </th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php $__currentLoopData = $courses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td><?php echo e(++$key); ?></td>
                            <td><img src="<?php echo e(asset($item->image)); ?>" alt="" width="50" height="50" style="border-radius: 5px"></td>
                            <td><?php echo e($item->course_title); ?></td>
                            <td><?php echo e($item->start_date); ?></td>
                            <td><?php echo e($item->price); ?></td>
                            <td><?php echo e($item->category->name); ?></td>
                            <td>
                                <?php if($item->status == 1): ?>
                                    <a href="<?php echo e(route('course.inactive',$item->id)); ?>" class="badge bg-success set-status"  title="change to InActive">Active</a>
                                <?php else: ?>
                                    <a href="<?php echo e(route('course.active',$item->id)); ?>" class="badge bg-danger" title="change to active">Inactive</a>
                                <?php endif; ?>
                            </td>
                            <td>
                                <a href="<?php echo e(route('courses.edit',$item->id)); ?>"
                                   class="btn btn-primary btn-circle btn-sm"><i class="fa fa-edit text-white"></i>
                                </a>
                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('delete-course')): ?>
                                <a class="btn btn-sm btn-danger" href="" data-bs-toggle="modal" data-bs-target=".delete-modal" onclick="handle(<?php echo e($item->id); ?>)"><i class="fas fa-trash"></i>
                                </a>
                                <?php endif; ?>
                            </td>

                        </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
                <div class="m-2 text-right">
                    <?php echo $courses->links(); ?>

                </div>
            </div>
        </div>

    </div>



<?php echo $__env->make('admin.layouts.delete-modal', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('extra_js'); ?>
<script>

    //Delete Code

    function handle(id) {

       var url = "<?php echo e(route('courses.destroy', 'party_id')); ?>".replace('party_id', id);

        $("#delete-form").attr('action', url);

       $("#confirm-modal").modal('show');

     }

</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\xampp8.2\htdocs\learning-management-emu\resources\views/admin/course/list.blade.php ENDPATH**/ ?>