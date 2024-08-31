<?php $__env->startSection('content'); ?>
    <!-- =======================
    Page Banner START -->
    <section class="py-0">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="bg-light p-4 rounded-3 position-relative overflow-hidden">

                        <!-- Svg decoration -->
                        <figure class="position-absolute top-0 end-0 mt-5">
                            <svg width="566.3px" height="353.7px" viewBox="0 0 566.3 353.7"	>
                                <path stroke="#17a2b8" fill="none" d="M525.1,4c8.1,0.7,14.9,7.2,17.9,14.8c3,7.6,3,16,2.1,24.1c-4.7,44.3-32.1,84.7-69.4,108.9 c-37.4,24.2-83.7,32.8-127.9,27.6c-32.3-3.8-63.5-14.5-95.9-16.6c-21.6-1.4-45.6,2.1-60.1,18.3c-7.7,8.5-11.8,19.6-14.8,30.7 c-7.9,29.5-9,60.8-19.7,89.5c-5.5,14.8-14,29.1-27.1,38c-15.6,10.5-35.6,12-54.2,9.5c-18.6-2.5-36.5-8.6-55-12.1"/>
                                <path stroke="#F99D2B" fill="none" d="M560.7,0.2c10,18.3,3.7,41.1-5,60.1c-11.8,25.9-28,50.3-50.2,68.2c-29,23.3-66.3,34-103.2,38.6 c-36.9,4.6-74.3,3.8-111.3,7.2c-22.3,2-45.3,5.9-63.5,19c-26.8,19.2-39,55.3-68.3,70.4c-38.2,19.6-89.7-4.9-125.6,18.8 c-22.6,15-30.7,44.2-33.3,71.2"/>
                            </svg>
                        </figure>

                        <div class="row position-relative align-items-center">

                            <!-- Content -->
                            <div class="col-md-6 px-md-5">
                                <!-- Title -->
                                <h1 class="mb-3">আমাদের অনলাইন কোর্স স্টোরে স্বাগতম!</h1>
                                <p class="mb-3">Expand knowledge by reading book Two before narrow not relied on how except moment myself Dejection assurance. </p>

                                <!-- Search -->
                                <form class="bg-body rounded p-2">
                                    <div class="input-group">
                                        <input class="form-control border-0 me-1" type="search" placeholder="Search book">
                                        <button type="button" class="btn btn-primary mb-0 rounded">Search</button>
                                    </div>
                                </form>
                            </div>

                            <!-- Image -->
                            <div class="col-md-6 text-center">
                                <img src="<?php echo e(asset('web')); ?>/assets/images/book/book-bg.svg" alt="">
                            </div>
                        </div> <!-- Row END -->
                    </div>
                </div>
            </div> <!-- Row END -->
        </div>
    </section>
    <!-- =======================
    Page Banner END -->

    <!-- =======================
    Page content START -->
    <section class="py-5">
        <div class="container">
            <div class="row">
                <!-- Main content START -->
                <div class="col-12">

                    <!-- Search option START -->
                    <div class="row mb-4 align-items-center">

                        <!-- Title -->
                        <div class="col-md-4">
                            <h5 class="mb-0">All Listed Course</h5>
                        </div>

                        <?php
                           $cources  = \App\Models\Course::where('status',1)->latest()->get();
                           $category = \App\Models\Category::where('status',1)->latest()->get();
                        ?>
                        <!-- Select option -->
                        <div class="col-md-4 mt-3 mt-xl-0">
                            <div class="border-bottom p-2 input-borderless">
                                <select class="js-choice" id="sortCourse">
                                    <?php $__currentLoopData = $cources; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $course): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($course->id); ?>"><?php echo e($course->course_title); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                        </div>

                        <!-- Select option -->
                        <div class="col-md-4 mt-3 mt-xl-0">
                            <div class="border-bottom p-2 input-borderless">
                                <select id="filterCategory" class="js-choice">
                                    <?php $__currentLoopData = $category; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($value->id); ?>"><?php echo e($value->name); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                        </div>

                    </div>
                    <!-- Search option END -->
                    <!-- Book Grid START -->
                    <div class="row g-4">
                        <?php $__currentLoopData = $allCourses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $course): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <!-- Card item START -->
                            <div class="col-sm-6 col-lg-4 col-xl-3">
                                <div class="card shadow h-100">
                                    <div class="position-relative">
                                        <!-- Image -->
                                        <img src="<?php echo e(asset($course->image)); ?>" class="card-img-top" style="height: 298px; width: 298px" alt="book image">
                                        <!-- Overlay -->
                                        <div class="card-img-overlay d-flex z-index-0 p-3">
                                            <!-- Card overlay Top -->
                                            <div class="w-100 mb-auto d-flex justify-content-end">
                                                <!-- Card format icon -->
                                                <div class="icon-md bg-dark rounded-circle fs-5">
                                                    <a href="#" class="text-white"><i class="bi bi-book"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Card body -->
                                    <div class="card-body px-3">
                                        <!-- Title -->
                                        <h5 class="card-title mb-0">
                                            <a href="<?php echo e(route('course.details.page',encrypt($course->id))); ?>" class="stretched-link"><?php echo e($course->course_title); ?></a>
                                        </h5>
                                    </div>

                                    <!-- Card footer -->
                                    <div class="card-footer pt-0 px-3">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <a href="#"><span class="h6 fw-light mb-0">View Details</span></a>
                                            <!-- Price -->
                                            <h5 class="text-success mb-0">৳ <?php echo e($course->price); ?> /-</h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Card item END -->
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                    <!-- Book Grid END -->
                    <!-- Pagination START -->
                    <div class="col-12">
                        <nav class="mt-4 d-flex justify-content-center" aria-label="navigation">
                            <ul class="pagination pagination-primary-soft d-inline-block d-md-flex rounded mb-0">
                                <?php if($allCourses->onFirstPage()): ?>
                                    <li class="page-item mb-0 disabled"><a class="page-link" href="#" tabindex="-1"><i class="fas fa-angle-double-left"></i></a></li>
                                <?php else: ?>
                                    <li class="page-item mb-0"><a class="page-link" href="<?php echo e($allCourses->previousPageUrl()); ?>" tabindex="-1"><i class="fas fa-angle-double-left"></i></a></li>
                                <?php endif; ?>
                                <?php for($page = 1; $page <= $allCourses->lastPage(); $page++): ?>
                                    <?php if($page == $allCourses->currentPage()): ?>
                                        <li class="page-item mb-0 active"><a class="page-link" href="#"><?php echo e($page); ?></a></li>
                                    <?php else: ?>
                                        <li class="page-item mb-0"><a class="page-link" href="<?php echo e($allCourses->url($page)); ?>"><?php echo e($page); ?></a></li>
                                    <?php endif; ?>
                                <?php endfor; ?>
                                <?php if($allCourses->hasMorePages()): ?>
                                    <li class="page-item mb-0"><a class="page-link" href="<?php echo e($allCourses->nextPageUrl()); ?>"><i class="fas fa-angle-double-right"></i></a></li>
                                <?php else: ?>
                                    <li class="page-item mb-0 disabled"><a class="page-link" href="#"><i class="fas fa-angle-double-right"></i></a></li>
                                <?php endif; ?>
                            </ul>
                        </nav>
                    </div>
                    <!-- Pagination END -->
                </div>
                <!-- Main content END -->
            </div><!-- Row END -->
        </div>
    </section>
    <!-- =======================
    Page content END -->

    <!-- =======================
    <?php
       $course = \App\Models\Course::limit(1)->latest()->first();
    ?>

    Action box START -->
    <section class="pt-0">
        <div class="container">
            <div class="row g-4">

                <!-- Action box item START -->
                <div class="col-lg-6">
                    <div class="bg-purple bg-opacity-10 rounded-3 p-5 h-100">

                        <!-- Content -->
                        <div class="row g-3 align-items-center">
                            <!-- Image -->
                            <div class="col-sm-5 col-lg-12 col-xl-5">
                                <img src="<?php echo e(asset($course->image)); ?>" alt="" style="height: 210px;width: 210px">
                            </div>

                            <!-- Content -->
                            <div class="col-sm-7 col-lg-12 col-xl-7">
                                <!-- Title -->
                                <h3 class="mb-2">Best selling Course of the month</h3>
                                <!-- Rating star -->
                                <ul class="list-inline mb-2">
                                    <li class="list-inline-item me-0 small"><i class="fas fa-star text-warning"></i></li>
                                    <li class="list-inline-item me-0 small"><i class="fas fa-star text-warning"></i></li>
                                    <li class="list-inline-item me-0 small"><i class="fas fa-star text-warning"></i></li>
                                    <li class="list-inline-item me-0 small"><i class="fas fa-star text-warning"></i></li>
                                    <li class="list-inline-item me-0 small"><i class="fas fa-star-half-alt text-warning"></i></li>
                                </ul>

                                <!-- Title and price -->
                                <h6 class="lead fw-bold mb-2"><?php echo e($course->course_title); ?></h6>
                                <!-- Button -->
                                <a href="#" class="btn btn-sm btn-purple mb-0">Buy now</a>
                            </div>
                        </div> <!-- Row END -->
                    </div>
                </div>
                <!-- Action box item END -->

                <!-- Action box item START -->
                <div class="col-lg-6">
                    <div class="bg-warning rounded-3 bg-opacity-15 p-5 h-100">

                        <!-- Content -->
                        <div class="row g-3 align-items-center my-auto">
                            <!-- Content -->
                            <div class="col-sm-7 col-lg-12 col-xl-7">
                                <h2 class="mb-1 fs-1">50%OFF</h2>
                                <p class="mb-3 h5 fw-light lead">Enroll now in the most popular and best-rated Courses.</p>

                            </div>

                            <!-- Image -->
                            <div class="col-sm-5 col-lg-12 col-xl-5">
                                <img src="<?php echo e(asset('web')); ?>/assets/images/element/29.svg" alt="">
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Action box item END -->
            </div>
        </div>
    </section>
    <!-- =======================
    Action box END -->
<?php $__env->stopSection(); ?>
<?php $__env->startPush('js'); ?>
    <script>
        $(document).ready(function() {
            $('#sortCourse, #filterCategory').on('change', function() {
                var sort = $('#sortCourse').val();
                var category = $('#filterCategory').val();
                alert(sort);
                alert(category);
                $.ajax({
                    url: "<?php echo e(route('courses.sort.filter')); ?>",  // Backend route
                    method: 'GET',
                    data: {
                        sort: sort,
                        category: category,
                    },
                    success: function(response) {
                        // Update the course grid with the response
                        $('.course-grid').html(response.html);
                    }
                });
            });
        });
    </script>

<?php $__env->stopPush(); ?>

<?php echo $__env->make('frontend.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\xampp8.2\htdocs\learning-management-emu\resources\views/frontend/courses.blade.php ENDPATH**/ ?>