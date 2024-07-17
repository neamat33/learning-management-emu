
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
                            <td><img src="<?php echo e(asset($item->image)); ?>" alt="" width="80" height="80"></td>
                            <td><?php echo e($item->course_title); ?></td>
                            <td><?php echo e($item->start_date); ?></td>
                            <td><?php echo e($item->price); ?></td>
                            <td><?php echo e($item->category->name); ?></td>
                            <td>
                                        
                                <?php if($item->status == 1): ?>
                                    <span class="badge bg-success set-status" id="status_<?php echo e($item->id); ?>"
                                        onclick="setActive(<?php echo e($item->id); ?>)">Active</span>
                                <?php else: ?>
                                    <span class="badge bg-danger set-status" id="status_<?php echo e($item->id); ?>"
                                        onclick="setActive(<?php echo e($item->id); ?>)">Inactive</span>
                                <?php endif; ?>

                            </td>
                            <td><a href="<?php echo e(route('courses.edit',$item->id)); ?>" 
                                class="btn btn-primary btn-circle btn-sm"><i class="fa fa-edit text-white"></i>
                            </a></td>
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
    <!-- Modal to edit record -->
       



<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH I:\xampp\htdocs\ucc_coaching\resources\views/admin/course/list.blade.php ENDPATH**/ ?>