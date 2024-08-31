<?php $__env->startSection('page-title', 'Update Course'); ?>
<?php $__env->startSection('content'); ?>
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="py-2 mb-2"><span class="text-muted fw-light">Academic /</span> Course</h4>
        <div class="card">
            <div class="card-header py-3 d-flex align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Course Update</h6>
                <h6 class="m-0 font-weight-bold text-primary">
                    <a href="<?php echo e(route('courses.index')); ?>" class="btn btn-sm btn-primary">
                        <i class="fa fa-eye"></i>&nbsp; Course List
                    </a>
                </h6>
            </div>
            <div class="card-body">
                <form action="<?php echo e(route('courses.update', $course->id)); ?>" method="POST" enctype='multipart/form-data'>
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('PUT'); ?>
                    <div class="modal-body">
                        <div class="row">
                            <div class="form-group col-md-4">
                                <label for=""><b>Course Title </b><span class="text-danger">*</span></label>
                                <input name="course_title" id="course_title" value="<?php echo e(old('course_title',$course->course_title)); ?>"
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
                                        <option value="<?php echo e($category->id); ?>" <?php echo e($course->category_id == $category->id ? 'selected' : 0); ?>><?php echo e($category->name); ?>

                                        </option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                            <div class="form-group col-md-4">
                                <label for=""><b>Course Price </b></label>
                                <input name="price" id="price" value="<?php echo e(old('price',$course->price)); ?>"
                                       class="form-control mt-2" />
                                <?php if($errors->has('price')): ?>
                                    <span class="invalid-feedback"><?php echo e($errors->first('price')); ?></span>
                                <?php endif; ?>
                            </div>
                            <div class="form-group col-md-4 mt-2">
                                <label for=""><b>Discount Price </b><span class="text-danger">*</span></label>
                                <input name="discount_price" id="discount_price" value="<?php echo e(old('discount_price',$course->discount_price)); ?>"
                                       class="form-control mt-2" />
                                <?php if($errors->has('discount_price')): ?>
                                    <span class="invalid-feedback"><?php echo e($errors->first('discount_price')); ?></span>
                                <?php endif; ?>
                            </div>

                            <div class="form-group col-md-4 mt-2">
                                <label for=""><b>Start Date </b><span class="text-danger">*</span></label>
                                <input type="date" name="start_date" id="start_date" value="<?php echo e($course->start_date); ?>"
                                       class="form-control mt-2" />
                                <?php if($errors->has('start_date')): ?>
                                    <span class="invalid-feedback"><?php echo e($errors->first('start_date')); ?></span>
                                <?php endif; ?>
                            </div>

                            <div class="form-group col-md-4 mt-2">
                                <label for=""><b>Cover Photo </b></label>
                                <input type="file" name="image" id="imgInp" class="form-control mt-2" />
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
                                <textarea name="course_description" class="form-control mt-2" rows="10" required><?php echo e(old('course_description',$course->course_description )); ?></textarea>
                                <?php if($errors->has('course_description')): ?>
                                    <span class="invalid-feedback"><?php echo e($errors->first('course_description')); ?></span>
                                <?php endif; ?>
                            </div>

                            <div class="form-group col-md-6 mt-2 text-center">
                                <label for=""><b>Cover Photo</b></label>
                                <div>
                                    <img id="blah" src="<?php echo e(asset($course->image)); ?>" style="height: 100px; width: 100px;margin-top: 5px">
                                </div>
                            </div>
                            <div class="form-group col-md-6 mt-2 text-center">
                                <label for=""><b>Class Routine (Image)</b></label>
                                <div>
                                    <img id="class_routine2" src="<?php echo e(asset($course->class_routine)); ?>" style="height: 100px; width: 100px;margin-top: 5px">
                                </div>
                            </div>
                        </div>
                            <!-- Subject Rows -->
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
                                        <?php $__currentLoopData = $course->items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tr class="subject-row">
                                                <td>
                                                    <select name="subject[]" class="select1 form-control" style="min-width: 100px" required>
                                                        <option value="">Select Subject</option>
                                                        <?php $__currentLoopData = $subjects; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <option value="<?php echo e($val->id); ?>" <?php echo e($val->id == $item->subject->id ? 'selected' : 0); ?>><?php echo e($val->subject_name); ?></option>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    </select>
                                                </td>
                                                <td>
                                                    <select name="instructor[]" class="select1 form-control" style="min-width: 100px" required>
                                                        <option value="">Select Teacher</option>
                                                        <?php $__currentLoopData = $instructors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $instructor): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <option value="<?php echo e($instructor->id); ?>" <?php echo e($instructor->id == $item->instructor->id ? 'selected' : 0); ?>><?php echo e($instructor->name); ?></option>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    </select>
                                                </td>
                                                <td>
                                                    <div class="form-group chapter">
                                                        <div class="row align-items-center">
                                                            <div class="col-3">
                                                                <button type="button" class="btn btn-sm btn-success mt-2 add-chapter">
                                                                    <i class="fa fa-plus"></i>
                                                                </button>
                                                            </div>
                                                        <?php $__currentLoopData = $item->chapter; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $chapterValue): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                <div class="row chapter-row mt-2">
                                                                    <div class="col-9">
                                                                        <input type="text" name="chapter[<?php echo e($item->id); ?>][<?php echo e($key); ?>][]" class="form-control mt-1" value="<?php echo e($chapterValue->chapter_name ?? ''); ?>">
                                                                    </div>
                                                                    <div class="col-3">
                                                                        <button type="button" class="btn btn-sm btn-danger remove-chapter">
                                                                            <span> X </span>
                                                                        </button>
                                                                    </div>
                                                                </div>
                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                        </div>
                                                    </div>
                                                    <div class="chapter-container"></div>
                                                </td>
                                            </tr>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <!-- Submit Button -->
                            <div style="text-align:right">
                                <div class="mt-3">
                                    <p id="select-alert" class="text-danger p-2"></p>
                                    <button type="submit" class="btn btn-info">Save</button>
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
        $(document).ready(() => {
            imgInp.onchange = evt => {
                const [file] = imgInp.files
                if (file) {
                    blah.src = URL.createObjectURL(file)
                }
            }

            class_routine.onchange = evt => {
                const [file] = class_routine.files
                if (file) {
                    class_routine2.src = URL.createObjectURL(file)
                }
            }
        });
    </script>
    <script>
        var jq = $.noConflict();
        jq(document).ready(function() {
            $("#select2").select2();
            $("#category_id").select2();
            $(".select1").select2();
            jq('#start_date').datepicker({
                dateFormat: 'yy-mm-dd',
                changeMonth: true,
                changeYear: true,
                yearRange: '1900:+0',
            });
        });

        $(document).ready(function() {
            let subjectIndex = 1;

            $('#addrow').click(function() {
                let newRow = `
            <tr class="subject-row">
                <td>
                    <select name="subject[]" class="select1 form-control" style="min-width: 100px" required>
                        <option value="">Select subject</option>
                        <?php $__currentLoopData = $subjects; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option value="<?php echo e($val->id); ?>"><?php echo e($val->subject_name); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
            </td>
            <td>
                <select name="instructor[]" class="select1 form-control" style="min-width: 100px" required>
                    <option value="">Select Teacher</option>
<?php $__currentLoopData = $instructors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $instructor): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option value="<?php echo e($instructor->id); ?>"><?php echo e($instructor->name); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
            </td>
            <td>
                <div class="form-group chapter">
                    <div class="row align-items-center">
                        <div class="col-9">
                            <input type="text" name="chapter[${subjectIndex}][]" class="form-control mt-1">
                            </div>
                            <div class="col-3 d-flex">
                                <button type="button" class="btn btn-sm btn-success mt-1 add-chapter">
                                    <span class="fa fa-plus"></span>
                                </button>
                                <button type="button" class="btn btn-sm btn-danger mt-1 remove_parent">
                                    <span> X </span>
                                </button>
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
                        <div class="row chapter-row mt-2">
                        <div class="col-9">
                            <input type="text" name="chapter[${subjectRowIndex}][]" class="form-control mt-1">
                        </div>
                        <div class="col-3">
                            <button type="button" class="btn btn-sm btn-danger remove-chapter">
                                <span> X </span>
                            </button>
                        </div>
                        </div>
                `;
                $(this).closest('.subject-row').find('.chapter-container').append(chapterInput);
            });

            // Remove a specific chapter row
            $(document).on('click', '.remove-chapter', function() {
                $(this).closest('.row').remove(); // This will only remove the chapter row clicked on
            });

            // Remove the entire subject row
            $(document).on('click', '.remove_parent', function() {
                $(this).closest('.subject-row').remove();
            });
        });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\xampp8.2\htdocs\learning-management-emu\resources\views/admin/course/edit.blade.php ENDPATH**/ ?>