<?php $__env->startSection('content'); ?>
    <!-- =======================
Page Banner START -->
    <section class="pt-0"  style="background-color: #F5F7F9">
        <div class="container-fluid px-0">
            <div class="card bg-blue h-100px h-md-200px rounded-0" style="background:url(<?php echo e(asset('web')); ?>/assets/images/pattern/04.png) no-repeat center center; background-size:cover;">
            </div>
        </div>
        <div class="container mt-n4">
            <div class="row">
                <div class="col-12">
                    <div class="card bg-transparent card-body pb-0 px-0 mt-2 mt-sm-0">
                       <?php echo $__env->make('frontend.student.comon', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    </div>
                    <!-- Divider -->
                    <hr class="d-xl-none">
                    <div class="col-12 col-xl-3 d-flex justify-content-between align-items-center">
                        <a class="h6 mb-0 fw-bold d-xl-none" href="#">Menu</a>
                        <button class="btn btn-primary d-xl-none" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasSidebar" aria-controls="offcanvasSidebar">
                            <i class="fas fa-sliders-h"></i>
                        </button>
                    </div>
                    <!-- Advanced filter responsive toggler END -->
                </div>
            </div>
        </div>
    </section>
    <!-- =======================
    Page Banner END -->
    <!-- =======================
    Page content START -->
    <section class="pt-0"  style="background-color: #F5F7F9">
        <div class="container">
            <div class="row">
                <!-- Left sidebar START -->
                <div class="col-xl-3">
                    <!-- Responsive offcanvas body START -->
                    <div class="offcanvas-xl offcanvas-end" tabindex="-1" id="offcanvasSidebar" aria-labelledby="offcanvasSidebarLabel">
                        <!-- Offcanvas header -->
                        <div class="offcanvas-header bg-light">
                            <h5 class="offcanvas-title" id="offcanvasNavbarLabel">My profile</h5>
                            <button  type="button" class="btn-close" data-bs-dismiss="offcanvas" data-bs-target="#offcanvasSidebar" aria-label="Close"></button>
                        </div>
                        <!-- Offcanvas body -->
                        <div class="offcanvas-body p-3 p-xl-0">
                            <div class="bg-dark border rounded-3 pb-0 p-3 w-100">
                                <!-- Dashboard menu -->
                                <div class="list-group list-group-dark list-group-borderless">
                                    <a class="list-group-item" href="<?php echo e(route('dashboard.page')); ?>"><i class="bi bi-ui-checks-grid fa-fw me-2"></i>Dashboard</a>
                                    <a class="list-group-item" href="<?php echo e(route('course.list')); ?>"><i class="bi bi-basket fa-fw me-2"></i>My Courses</a>
                                    <a class="list-group-item active" href="<?php echo e(route('course.details')); ?>"><i class="far fa-fw fa-file-alt me-2"></i>Course Resume</a>
                                    <a class="list-group-item" href="<?php echo e(route('course.quiz')); ?>"><i class="bi bi-question-diamond fa-fw me-2"></i>Quiz</a>
                                    <a class="list-group-item" href="<?php echo e(route('profile.update')); ?>"><i class="bi bi-pencil-square fa-fw me-2"></i>Edit Profile</a>
                                    <a class="list-group-item text-danger bg-danger-soft-hover" href="<?php echo e(route('student.logout')); ?>" onclick="event.preventDefault();document.getElementById('logout-form').submit();"><i class="fas fa-sign-out-alt fa-fw me-2"></i>Sign Out</a>
                                    <form id="logout-form" action="<?php echo e(route('student.logout')); ?>" method="POST" class="d-none">
                                        <?php echo csrf_field(); ?>
                                    </form>

                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Responsive offcanvas body END -->
                </div>
                <!-- Left sidebar END -->

                <!-- Main content START -->
                <div class="col-xl-9">

                    <!-- Course item START -->
                    <div class="card border">
                        <div class="card-header border-bottom">
                            <!-- Card START -->
                            <div class="card">
                                <div class="row g-0">
                                    <div class="col-md-3">
                                        <img src="<?php echo e(asset('web')); ?>/assets/images/courses/4by3/01.jpg" class="rounded-2" alt="Card image">
                                    </div>
                                    <div class="col-md-9">
                                        <div class="card-body">
                                            <!-- Title -->
                                            <h3 class="card-title"><a href="#">The Complete Digital Marketing Course - 12 Courses in 1</a></h3>

                                            <!-- Info -->
                                            <ul class="list-inline mb-2">
                                                <li class="list-inline-item h6 fw-light mb-1 mb-sm-0"><i class="far fa-clock text-danger me-2"></i>6h 56m</li>
                                                <li class="list-inline-item h6 fw-light mb-1 mb-sm-0"><i class="fas fa-table text-orange me-2"></i>82 lectures</li>
                                                <li class="list-inline-item h6 fw-light"><i class="fas fa-signal text-success me-2"></i>Beginner</li>
                                            </ul>

                                            <!-- button -->
                                            <a href="#" class="btn btn-primary-soft btn-sm mb-0">Resume course</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Card END -->
                        </div>
                        <div class="card-body">
                            <!-- Title -->
                            <h5>Course Curriculum</h5>
                            <!-- Accordion START -->
                            <div class="accordion accordion-icon accordion-bg-light" id="accordionExample2">
                                <!-- Item -->
                                <div class="accordion-item mb-3">
                                    <h6 class="accordion-header font-base" id="heading-2">
                                        <a class="accordion-button fw-bold collapsed rounded d-block pe-4" href="#collapse-2" data-bs-toggle="collapse" data-bs-target="#collapse-2" aria-expanded="false" aria-controls="collapse-2">
                                            <span class="mb-0">Customer Life cycle</span>
                                            <span class="small d-block mt-1">(3 Lectures)</span>
                                        </a>
                                    </h6>
                                    <div id="collapse-2" class="accordion-collapse collapse" aria-labelledby="heading-2" data-bs-parent="#accordionExample2">
                                        <!-- Accordion body START -->
                                        <div class="accordion-body mt-3">
                                            <div class="vstack gap-3">
                                                <!-- Course lecture -->
                                                <div>
                                                    <div class="d-flex justify-content-between align-items-center">
                                                        <div class="position-relative d-flex align-items-center">
                                                            <a href="#" class="btn btn-danger-soft btn-round btn-sm mb-0 stretched-link position-static">
                                                                <i class="fas fa-play me-0"></i>
                                                            </a>
                                                            <span class="d-inline-block text-truncate ms-2 mb-0 h6 fw-light w-sm-400px">Introduction</span>
                                                        </div>
                                                    </div>
                                                    <hr class="mb-0">
                                                </div>

                                                <!-- Course lecture -->
                                                <div>
                                                    <div class="d-flex justify-content-between align-items-center">
                                                        <div class="position-relative d-flex align-items-center">
                                                            <a href="#" class="btn btn-danger-soft btn-round btn-sm mb-0 stretched-link position-static">
                                                                <i class="fas fa-play me-0"></i>
                                                            </a>
                                                            <span class="d-inline-block text-truncate ms-2 mb-0 h6 fw-light w-150px w-sm-400px"> What is Digital Marketing What is Digital Marketing</span>
                                                        </div>
                                                    </div>
                                                    <hr class="mb-0">
                                                </div>
                                                <!-- Course lecture -->
                                                <div class="d-flex justify-content-between align-items-center">
                                                    <div class="position-relative d-flex align-items-center">
                                                        <a href="#" class="btn btn-light btn-round btn-sm mb-0 stretched-link position-static" data-bs-toggle="modal" data-bs-target="#coursePremium">
                                                            <i class="bi bi-lock-fill"></i>
                                                        </a>
                                                        <span class="d-inline-block text-truncate ms-2 mb-0 h6 fw-light w-150px w-sm-400px">Type of Digital Marketing</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Accordion body END -->
                                    </div>
                                </div>
                                <div class="accordion-item mb-3">
                                    <h6 class="accordion-header font-base" id="heading-3">
                                        <a class="accordion-button fw-bold collapsed rounded d-block pe-4" href="#collapse-3" data-bs-toggle="collapse" data-bs-target="#collapse-3" aria-expanded="false" aria-controls="collapse-3">
                                            <span class="mb-0">Customer Life cycle</span>
                                            <span class="small d-block mt-1">(3 Lectures)</span>
                                        </a>
                                    </h6>
                                    <div id="collapse-3" class="accordion-collapse collapse" aria-labelledby="heading-3" data-bs-parent="#accordionExample2">
                                        <!-- Accordion body START -->
                                        <div class="accordion-body mt-3">
                                            <div class="vstack gap-3">
                                                <div>
                                                    <div class="d-flex justify-content-between align-items-center">
                                                        <div class="position-relative d-flex align-items-center">
                                                            <a href="#" class="btn btn-danger-soft btn-round btn-sm mb-0 stretched-link position-static">
                                                                <i class="fas fa-play me-0"></i>
                                                            </a>
                                                            <span class="d-inline-block text-truncate ms-2 mb-0 h6 fw-light w-sm-400px">Introduction</span>
                                                        </div>
                                                    </div>
                                                    <hr class="mb-0">
                                                </div>

                                                <!-- Course lecture -->
                                                <div>
                                                    <div class="d-flex justify-content-between align-items-center">
                                                        <div class="position-relative d-flex align-items-center">
                                                            <a href="#" class="btn btn-danger-soft btn-round btn-sm mb-0 stretched-link position-static">
                                                                <i class="fas fa-play me-0"></i>
                                                            </a>
                                                            <span class="d-inline-block text-truncate ms-2 mb-0 h6 fw-light w-150px w-sm-400px"> What is Digital Marketing What is Digital Marketing</span>
                                                        </div>
                                                    </div>
                                                    <hr class="mb-0">
                                                </div>

                                                <!-- Course lecture -->
                                                <div class="d-flex justify-content-between align-items-center">
                                                    <div class="position-relative d-flex align-items-center">
                                                        <a href="#" class="btn btn-light btn-round btn-sm mb-0 stretched-link position-static" data-bs-toggle="modal" data-bs-target="#coursePremium">
                                                            <i class="bi bi-lock-fill"></i>
                                                        </a>
                                                        <span class="d-inline-block text-truncate ms-2 mb-0 h6 fw-light w-150px w-sm-400px">Type of Digital Marketing</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Accordion body END -->
                                    </div>
                                </div>

                            </div>
                            <!-- Accordion END -->
                        </div>
                    </div>
                    <!-- Course item END -->

                    <!-- Course item START -->
                    <div class="card border mt-4">
                        <div class="card-header border-bottom">
                            <!-- Card START -->
                            <div class="card">
                                <div class="row g-0">
                                    <div class="col-md-3">
                                        <img src="<?php echo e(asset('web')); ?>/assets/images/courses/4by3/08.jpg" class="rounded-2" alt="Card image">
                                    </div>
                                    <div class="col-md-9">
                                        <div class="card-body">
                                            <!-- Title -->
                                            <h3 class="card-title"><a href="#">Sketch from A to Z: for app designer</a></h3>

                                            <!-- Info -->
                                            <ul class="list-inline mb-2">
                                                <li class="list-inline-item h6 fw-light mb-1 mb-sm-0"><i class="far fa-clock text-danger me-2"></i>8h 56m</li>
                                                <li class="list-inline-item h6 fw-light mb-1 mb-sm-0"><i class="fas fa-table text-orange me-2"></i>65 lectures</li>
                                                <li class="list-inline-item h6 fw-light"><i class="fas fa-signal text-success me-2"></i>All level</li>
                                            </ul>
                                            <!-- Button -->
                                            <a href="#" class="btn btn-primary-soft btn-sm mb-0">Resume course</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Card END -->
                        </div>

                        <div class="card-body">

                            <!-- Title -->
                            <h5>Course Curriculum</h5>

                            <!-- Accordion START -->
                            <div class="accordion accordion-icon accordion-bg-light" id="accordionExample4">
                                <!-- Item -->
                                <div class="accordion-item mb-3">
                                    <h6 class="accordion-header font-base" id="heading-1-4">
                                        <a class="accordion-button fw-bold collapsed rounded d-block pe-4" href="#collapse-1-4" data-bs-toggle="collapse" data-bs-target="#collapse-1-4" aria-expanded="false" aria-controls="collapse-1-4">
                                            <span class="mb-0">YouTube Marketing</span>
                                            <span class="small d-block mt-1">(5 Lectures)</span>
                                        </a>
                                    </h6>
                                    <div id="collapse-1-4" class="accordion-collapse collapse" aria-labelledby="heading-1-4" data-bs-parent="#accordionExample4">
                                        <!-- Accordion body START -->
                                        <div class="accordion-body mt-3">
                                            <div class="vstack gap-3">
                                                <!-- Course lecture -->
                                                <div>
                                                    <div class="d-flex justify-content-between align-items-center">
                                                        <div class="position-relative d-flex align-items-center">
                                                            <a href="#" class="btn btn-danger-soft btn-round btn-sm mb-0 stretched-link position-static">
                                                                <i class="fas fa-play me-0"></i>
                                                            </a>
                                                            <span class="d-inline-block text-truncate ms-2 mb-0 h6 fw-light w-150px w-sm-400px">Video Flow</span>
                                                        </div>
                                                    </div>
                                                    <hr class="mb-0">
                                                </div>

                                                <!-- Course lecture -->
                                                <div>
                                                    <div class="d-flex justify-content-between align-items-center">
                                                        <div class="position-relative d-flex align-items-center">
                                                            <a href="#" class="btn btn-danger-soft btn-round btn-sm mb-0 stretched-link position-static">
                                                                <i class="fas fa-play me-0"></i>
                                                            </a>
                                                            <span class="d-inline-block text-truncate ms-2 mb-0 h6 fw-light w-150px w-sm-400px">Webmaster Tool</span>
                                                        </div>
                                                    </div>
                                                    <hr class="mb-0">
                                                </div>

                                                <!-- Course lecture -->
                                                <div>
                                                    <div class="d-flex justify-content-between align-items-center">
                                                        <div class="position-relative d-flex align-items-center">
                                                            <a href="#" class="btn btn-danger-soft btn-round btn-sm mb-0 stretched-link position-static">
                                                                <i class="fas fa-play me-0"></i>
                                                            </a>
                                                            <span class="d-inline-block text-truncate ms-2 mb-0 h6 fw-light w-150px w-sm-400px">Featured Contents on Channel</span>
                                                        </div>
                                                    </div>
                                                    <hr class="mb-0">
                                                </div>

                                                <!-- Course lecture -->
                                                <div>
                                                    <div class="d-flex justify-content-between align-items-center">
                                                        <div class="position-relative d-flex align-items-center">
                                                            <a href="#" class="btn btn-light btn-round btn-sm mb-0 stretched-link position-static" data-bs-toggle="modal" data-bs-target="#coursePremium">
                                                                <i class="bi bi-lock-fill"></i>
                                                            </a>
                                                            <span class="d-inline-block text-truncate ms-2 mb-0 h6 fw-light w-150px w-sm-400px">Managing Comments</span>
                                                        </div>
                                                    </div>
                                                    <hr class="mb-0">
                                                </div>

                                                <!-- Course lecture -->
                                                <div class="d-flex justify-content-between align-items-center">
                                                    <div class="position-relative d-flex align-items-center">
                                                        <a href="#" class="btn btn-light btn-round btn-sm mb-0 stretched-link position-static" data-bs-toggle="modal" data-bs-target="#coursePremium">
                                                            <i class="bi bi-lock-fill"></i>
                                                        </a>
                                                        <span class="d-inline-block text-truncate ms-2 mb-0 h6 fw-light w-150px w-sm-400px">Channel Analytics</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Accordion body END -->
                                    </div>
                                </div>

                            </div>
                            <!-- Accordion END -->
                        </div>
                    </div>
                    <!-- Course item END -->
                </div>
                <!-- Main content END -->
            </div> <!-- Row END -->
        </div>
    </section>
    <!-- =======================
    Page content END -->
<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\xampp8.2\htdocs\learning-management-emu\resources\views/frontend/student/course_details.blade.php ENDPATH**/ ?>