<?php $__env->startSection('page-title', 'Notice Board'); ?>
<?php $__env->startSection('content'); ?>
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="py-2 mb-2"><span class="text-muted fw-light">Notice Board</span></h4>

        <!-- DataTable with Buttons -->
        <div class="card">
            <div class="card-header py-3 d-flex align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Instructor Add</h6>
                <h6 class="m-0 font-weight-bold text-primary"><a href="<?php echo e(route('notice.board.index')); ?>"
                                                                 class="btn btn-sm btn-primary"><i class="fa fa-eye"></i> Notice List</a></h6>
            </div>
            <div class="card-body">
                <form action="<?php echo e(route('notice.board.store')); ?>" method="POST" enctype='multipart/form-data'>
                    <?php echo csrf_field(); ?>
                    <div class="modal-body ">
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for=""><b> Subject </b><span class="text-danger">*</span></label>
                                <input name="subject" id="subject" value="<?php echo e(old('subject')); ?>" class="form-control mt-1" required>
                                <?php if($errors->has('subject')): ?>
                                    <span class="invalid-feedback"><?php echo e($errors->first('subject')); ?></span>
                                <?php endif; ?>
                            </div>
                            <div class="form-group col-md-6">
                                <label for=""><b>Status </b></label> <br>
                                <select name="status"  class="form-select mt-1" required>
                                    <option value="1">Active</option>
                                    <option value="0">InActive</option>
                                </select>
                            </div>
                            <div class="form-group col-md-12 mt-1">
                                <label for=""><b>Message Details</b></label>
                                <textarea name="message" class="form-control mt-1" rows="5" required><?php echo e(old('message')); ?></textarea>
                                <?php if($errors->has('message')): ?>
                                    <span class="invalid-feedback"><?php echo e($errors->first('message')); ?></span>
                                <?php endif; ?>
                            </div>

                            <div style="text-align:right">
                                <div class="mt-3">
                                    <p id="select-alert" class="text-danger p-2"></p>
                                    <button type="submit" class="btn btn-primary ">Save</button>
                                </div>
                            </div>

                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\xampp8.2\htdocs\learning-management-emu\resources\views/admin/notice/create.blade.php ENDPATH**/ ?>