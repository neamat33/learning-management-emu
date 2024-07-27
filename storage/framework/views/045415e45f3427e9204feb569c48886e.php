
<?php $__env->startSection('page-title', 'Add Course'); ?>
<?php $__env->startSection('content'); ?>
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="py-2 mb-2"><span class="text-muted fw-light">Academic /</span> Course</h4>

        <!-- DataTable with Buttons -->
        <div class="card">
            <div class="card-header py-3 d-flex align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Course Add</h6>
                <h6 class="m-0 font-weight-bold text-primary"><a href="<?php echo e(route('courses.index')); ?>"
                        class="btn btn-sm btn-primary"><i class="fa fa-eye"></i>&nbsp; Course List</a></h6>
            </div>
            <div class="card-body">

                <form action="<?php echo e(route('courses.store')); ?>" method="POST" enctype='multipart/form-data'>
                    <?php echo csrf_field(); ?>
                    <div class="modal-body ">
                        <div class="row">

                            <div class="form-group col-md-4">
                                <label for=""><b>Course Title </b><span class="text-danger">*</span></label>
                                <input name="course_title" id="course_title" value="<?php echo e(old('course_title')); ?>"
                                    class="form-control mt-2" required />
                                <?php if($errors->has('course_title')): ?>
                                    <span class="invalid-feedback"><?php echo e($errors->first('course_title')); ?></span>
                                <?php endif; ?>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="" class="mb-2"><b>Course Catgeory </b><span
                                        class="text-danger">*</span></label>
                                <select name="category_id" id="category_id" class="form-control" required>
                                    <option value="">Select Item</option>
                                    <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($category->id); ?>"><?php echo e($category->name); ?>

                                        </option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                            <div class="form-group col-md-4">
                                <label for=""><b>Course Price </b></label>
                                <input name="price" id="price" value="<?php echo e(old('price')); ?>"
                                    class="form-control mt-2" />
                                <?php if($errors->has('price')): ?>
                                    <span class="invalid-feedback"><?php echo e($errors->first('price')); ?></span>
                                <?php endif; ?>
                            </div>
                            <div class="form-group col-md-4 mt-2">
                                <label for=""><b>Discount Price </b><span class="text-danger">*</span></label>
                                <input name="discount_price" id="discount_price" value="<?php echo e(old('discount_price')); ?>"
                                    class="form-control mt-2" />
                                <?php if($errors->has('discount_price')): ?>
                                    <span class="invalid-feedback"><?php echo e($errors->first('discount_price')); ?></span>
                                <?php endif; ?>
                            </div>

                            <div class="form-group col-md-4 mt-2">
                                <label for=""><b>Start Date </b><span class="text-danger">*</span></label>
                                <input type="text" name="start_date" id="start_date" value="<?php echo e(date('Y-m-d')); ?>"
                                    class="form-control mt-2" />
                                <?php if($errors->has('start_date')): ?>
                                    <span class="invalid-feedback"><?php echo e($errors->first('start_date')); ?></span>
                                <?php endif; ?>
                            </div>

                            <div class="form-group col-md-4 mt-2">
                                <label for=""><b>Cover Photo </b></label>
                                <input type="file" name="image" id="image" class="form-control mt-2" />
                                <?php if($errors->has('image')): ?>
                                    <span class="invalid-feedback"><?php echo e($errors->first('image')); ?></span>
                                <?php endif; ?>
                            </div>
                            <div class="form-group col-md-4 mt-2">
                                <label for=""><b>Class Routine (Image)</b></label>
                                <input type="file" name="class_routine" id="class_routine" class="form-control mt-2" />
                                <?php if($errors->has('class_routine')): ?>
                                    <span class="invalid-feedback"><?php echo e($errors->first('class_routine')); ?></span>
                                <?php endif; ?>
                            </div>
                            <div class="form-group col-md-8 mt-2">
                                <label for=""><b>Short Video </b></label>
                                <input type="text" name="video" id="video" value="<?php echo e(old('video')); ?>"
                                    class="form-control mt-2" />
                                <?php if($errors->has('video')): ?>
                                    <span class="invalid-feedback"><?php echo e($errors->first('video')); ?></span>
                                <?php endif; ?>
                            </div>

                            <div class="form-group col-md-12 mt-2">
                                <label for=""><b>Course Description </b></label>
                                <textarea name="course_description" class="form-control mt-2" rows="2" required><?php echo e(old('course_description')); ?></textarea>
                                <?php if($errors->has('course_description')): ?>
                                    <span class="invalid-feedback"><?php echo e($errors->first('course_description')); ?></span>
                                <?php endif; ?>
                            </div>
                        </div>

                        <div class="mt-5">
                            <div class="col-md-1 mb-1" id="addrow">
                                <button type="button" class="btn btn-sm btn-primary mb-1">Add</button>
                            </div>
                            <div class="table-responsive">
                                <table class="table table-responsive-md mytable">
                                    <thead>
                                        <tr>
                                            <th style="width: 30%"><strong>Subject</strong></th>
                                            <th style="width: 30%"><strong>Instructor</strong></th>
                                            <th style="width: 40%"><strong>Lesson</strong></th>
                                        </tr>
                                    </thead>
                                    <tbody id="subjectRows">
                                        <tr class="subject-row">
                                            <td>
                                                <select name="subject[]" class="select1 form-control"
                                                    style="min-width: 100px" required>
                                                    <option value="">Select Item</option>
                                                    <?php $__currentLoopData = $subjects; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <option value="<?php echo e($val->id); ?>"><?php echo e($val->subject_name); ?>

                                                        </option>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </select>
                                            </td>
                                            <td>
                                                <select name="instructor[]" class="select1 form-control"
                                                    style="min-width: 100px" required>
                                                    <option value="">Select Item</option>
                                                    <?php $__currentLoopData = $instructors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $instructor): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <option value="<?php echo e($instructor->id); ?>"><?php echo e($instructor->name); ?>

                                                        </option>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </select>
                                            </td>
                                            <td>
                                                <div class="form-group chapter">
                                                    <div class="row">
                                                        <div class="col-10">
                                                            <button type="button"
                                                                class="btn btn-sm btn-success mt-1 add-chapter">
                                                                <i class="fa fa-plus"></i>
                                                            </button>
                                                            <input type="text" name="chapter[0][]"
                                                                class="form-control mt-1">
                                                            
                                                        </div>
                                                        
                                                    </div>
                                                </div>
                                                <div class="chapter-container"></div>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>


                        <div style="text-align:right">
                            <div class="mt-3">
                                <p id="select-alert" class="text-danger p-2"></p>
                                <button type="submit" class="btn btn-info ">Save</button>
                            </div>
                        </div>


                    </div>
                </form>

            </div>

        </div>

    </div>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('extra_js'); ?>
    <script>
        var jq = $.noConflict();
        jq(document).ready(function() {
            $("#select2").select2();
            $("#category_id").select2();
            $(".select1").select2();
            jq('#start_date').datepicker({
                dateFormat: 'yy-mm-dd', // Set the date format as DD/MM/YYYY
                changeMonth: true, // Allow changing the month
                changeYear: true, // Allow changing the year
                yearRange: '1900:+0', // Set the range of years
                // You can add more options as needed
            });
        });
    </script>

    <script>
        $(document).ready(function() {
            let subjectIndex = 1;

            $('#addrow').click(function() {
                let newRow = `
                <tr class="subject-row">
                    <td>
                        <select name="subject[]" class="select1 form-control" style="min-width: 100px" required>
                            <option value="">Select Item</option>
                            <?php $__currentLoopData = $subjects; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($val->id); ?>"><?php echo e($val->subject_name); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </td>
                    <td>
                        <select name="instructor[]" class="select1 form-control" style="min-width: 100px" required>
                            <option value="">Select Item</option>
                            <?php $__currentLoopData = $instructors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $instructor): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($instructor->id); ?>"><?php echo e($instructor->name); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </td>
                    <td>
                        <div class="form-group chapter">
                            <div class="row">
                                <div class="col-12">
                                    <div class="row">
                                        <div class="col-2">
                                            <button type="button" class="btn btn-sm btn-success mt-1 add-chapter">
                                                <span class="fa fa-plus"></span>
                                            </button>
                                         </div>   
                                        <div class="col-4">
                                            <a href="" class="btn btn-sm btn-danger mt-1 remove_parent" style="">X</a>
                                         </div>    
                                    </div>
                                </div>
                                         
                                <div class="col-10">
                                    <input type="text" name="chapter[${subjectIndex}][]" class="form-control mt-1">
                                </div>   
                            </div>
                        </div>
                        <div class="chapter-container"></div>
                    </td>
                </tr>`;
                $('#subjectRows').append(newRow);
                subjectIndex++;
            });

            $(document).on('click', '.add-chapter', function() {
                let subjectRowIndex = $(this).closest('.subject-row').index();
                let chapterInput = `
                <div class="row mt-2">
                    <div class="col-10">
                        <input type="text" name="chapter[${subjectRowIndex}][]" class="form-control">
                    </div>
                    <div class="col-2">
                        <button type="button" class="btn btn-sm btn-danger remove-chapter">
                            <span> X </span>
                        </button>
                    </div>
                </div>`;
                $(this).closest('.subject-row').find('.chapter-container').append(chapterInput);
            });

            $(document).on('click', '.remove-chapter', function() {
                $(this).closest('.row').remove();
            });

            $(document).on('click', '.remove_parent', function() {
                event.preventDefault();
                $(this).closest('.subject-row').remove();
            });
        });
    </script>
    
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\xampp8.2\htdocs\learning-management-emu\resources\views/admin/course/create.blade.php ENDPATH**/ ?>