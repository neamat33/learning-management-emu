
<?php $__env->startSection('page-title', 'Student Registration'); ?>
<?php $__env->startSection('content'); ?>
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="py-2 mb-2"><span class="text-muted fw-light">Academic /</span> Instructor</h4>

        <!-- DataTable with Buttons -->
        <div class="card">
            <div class="card-header py-3 d-flex align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Instructor Add</h6>
                <h6 class="m-0 font-weight-bold text-primary"><a href="<?php echo e(route('instructors.index')); ?>"
                        class="btn btn-sm btn-primary"><i class="fa fa-eye"></i> Instructor List</a></h6>
            </div>
            <div class="card-body">

                <form action="<?php echo e(route('instructors.store')); ?>" method="POST" enctype='multipart/form-data'>
                    <?php echo csrf_field(); ?>
                    <div class="modal-body ">
                        <div class="row">
                            <div class="form-group col-md-4 mt-1">
                                <label for=""><b>Branch Name </b></label> <br>
                                <select name="branch_id" id="branch_id" class="form-select mt-1">
                                    <?php $__currentLoopData = $branchs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $branch): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($branch->id); ?>"><?php echo e($branch->branch_name); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                            <div class="form-group col-md-4">
                                <label for=""><b>Instructor Name </b><span class="text-danger">*</span></label>
                                <input name="name" id="name" value="<?php echo e(old('name')); ?>"
                                    class="form-control mt-1" />
                                <?php if($errors->has('name')): ?>
                                    <span class="invalid-feedback"><?php echo e($errors->first('name')); ?></span>
                                <?php endif; ?>
                            </div>
                            
                            <div class="form-group col-md-4">
                                <label for=""><b>Mobile </b><span class="text-danger">*</span></label>
                                <input type="number" name="mobile" id="mobile" value="<?php echo e(old('mobile')); ?>"
                                    class="form-control mt-1" />
                                <?php if($errors->has('mobile')): ?>
                                    <span class="invalid-feedback"><?php echo e($errors->first('mobile')); ?></span>
                                <?php endif; ?>
                            </div>
                            <div class="form-group col-md-4">
                                <label for=""><b>Email </b></label>
                                <input type="email" name="email" id="email" value="<?php echo e(old('email')); ?>"
                                    class="form-control mt-1" />
                                <?php if($errors->has('email')): ?>
                                    <span class="invalid-feedback"><?php echo e($errors->first('email')); ?></span>
                                <?php endif; ?>
                            </div>
                            
                            <div class="form-group col-md-4 mt-1">
                                <label for=""><b>Instructor Photo </b></label>
                                <input type="file" name="photo" id="img"
                                    class="form-control mt-1" />
                                <?php if($errors->has('photo')): ?>
                                    <span class="invalid-feedback"><?php echo e($errors->first('photo')); ?></span>
                                <?php endif; ?>
                            </div>
                            
                            <div class="form-group col-md-4 mt-1">
                                <label for=""><b>Subject Name </b></label> <br>
                                <select name="subject_id" id="subject_id" class="form-select mt-1">
                                    <?php $__currentLoopData = $subjects; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subject): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($subject->id); ?>"><?php echo e($subject->subject_name); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                           
                            <div class="form-group col-md-6 mt-1">
                                <label for=""><b>Present Address </b></label>
                                <textarea name="address" class="form-control mt-1" rows="1"><?php echo e(old('address')); ?></textarea>
                                <?php if($errors->has('address')): ?>
                                    <span class="invalid-feedback"><?php echo e($errors->first('address')); ?></span>
                                <?php endif; ?>
                            </div>
                            <div class="form-group col-md-6 mt-1">
                                <label for=""><b>Education Qualification </b></label>
                                <textarea name="qualification" class="form-control mt-1" rows="1"><?php echo e(old('qualification')); ?></textarea>
                                <?php if($errors->has('qualification')): ?>
                                    <span class="invalid-feedback"><?php echo e($errors->first('qualification')); ?></span>
                                <?php endif; ?>
                            </div>
                            
                            <div style="text-align:right">
                                <div class="mt-3">
                                    <p id="select-alert" class="text-danger p-2"></p>
                                    <button type="submit" class="btn btn-primary ">Save Information</button>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                </form>

            </div>

        </div>

    </div>

    <script>
        $(function() {

            $(document).on('change', '#class_id', function() {
                let class_id = $(this).val();
                let branch_id = $("#branch_id").val();
                $.ajax({
                    type: 'GET',
                    url: "<?php echo e(url('admin/get_section')); ?>",
                    data: {
                        'class_id': class_id, 'branch_id':branch_id
                    },
                    success: function(data) {
                        //console.log(data)
                        $("#section_id").html(data);
                    },
                });
            });
        })
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\xampp8.2\htdocs\learning-management-emu\resources\views/admin/instructor/create.blade.php ENDPATH**/ ?>