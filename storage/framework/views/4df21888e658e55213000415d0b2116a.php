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
                        <div class="row d-sm-flex justify-sm-content-between mt-2 mt-md-0">
                            <!-- Avatar -->
                            <div class="col-auto">
                                <div class="avatar avatar-xxl position-relative mt-n3">
                                    <img class="avatar-img rounded-circle border border-white border-3 shadow" src="https://st2.depositphotos.com/3904951/8925/v/450/depositphotos_89250312-stock-illustration-photo-picture-web-icon-in.jpg" alt="">
                                    <span class="badge text-bg-success rounded-pill position-absolute top-50 start-100 translate-middle mt-4 mt-md-5 ms-n3 px-md-3">Pro</span>
                                </div>
                            </div>
                            <!-- Profile info -->
                            <div class="col d-sm-flex justify-content-between align-items-center">
                                <div>
                                    <h1 class="my-1 fs-4">Lori Stevens</h1>
                                    <ul class="list-inline mb-0">
                                        <li class="list-inline-item me-3 mb-1 mb-sm-0">
                                            <span class="h6">255</span>
                                            <span class="text-body fw-light">points</span>
                                        </li>
                                        <li class="list-inline-item me-3 mb-1 mb-sm-0">
                                            <span class="h6">7</span>
                                            <span class="text-body fw-light">Completed courses</span>
                                        </li>
                                        <li class="list-inline-item me-3 mb-1 mb-sm-0">
                                            <span class="h6">52</span>
                                            <span class="text-body fw-light">Completed lessons</span>
                                        </li>
                                    </ul>
                                </div>
                                <!-- Button -->
                            </div>
                        </div>
                    </div>

                    <!-- Advanced filter responsive toggler START -->
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
                                    <a class="list-group-item active" href="<?php echo e(route('course.list')); ?>"><i class="bi bi-basket fa-fw me-2"></i>My Courses</a>
                                    <a class="list-group-item" href="<?php echo e(route('course.details')); ?>"><i class="far fa-fw fa-file-alt me-2"></i>Course Resume</a>
                                    <a class="list-group-item" href="<?php echo e(route('course.quiz')); ?>"><i class="bi bi-question-diamond fa-fw me-2"></i>Quiz</a>
                                    <a class="list-group-item" href="<?php echo e(route('profile.update')); ?>"><i class="bi bi-pencil-square fa-fw me-2"></i>Edit Profile</a>
                                    <a class="list-group-item text-danger bg-danger-soft-hover" href="#"><i class="fas fa-sign-out-alt fa-fw me-2"></i>Sign Out</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Responsive offcanvas body END -->
                </div>
                <!-- Left sidebar END -->

                <!-- Main content START -->
                <div class="col-xl-9">
                    <div class="card  border rounded-3">
                        <!-- Card header START -->
                        <div class="card-header bg-transparent border-bottom">
                            <h3 class="mb-0">My Courses List</h3>
                        </div>
                        <!-- Card header END -->

                        <!-- Card body START -->
                        <div class="card-body">

                            <!-- Search and select START -->
                            <div class="row g-3 align-items-center justify-content-between mb-4">
                                <!-- Content -->
                                <div class="col-md-8">
                                    <form class="rounded position-relative">
                                        <input class="form-control pe-5 bg-transparent" type="search" placeholder="Search" aria-label="Search">
                                        <button class="bg-transparent p-2 position-absolute top-50 end-0 translate-middle-y border-0 text-primary-hover text-reset" type="submit">
                                            <i class="fas fa-search fs-6 "></i>
                                        </button>
                                    </form>
                                </div>

                                <!-- Select option -->
                                <div class="col-md-3">
                                    <!-- Short by filter -->
                                    <form>
                                        <select class="form-select js-choice border-0 z-index-9 bg-transparent" aria-label=".form-select-sm">
                                            <option value="">Sort by</option>
                                            <option>Free</option>
                                            <option>Newest</option>
                                            <option>Most popular</option>
                                            <option>Most Viewed</option>
                                        </select>
                                    </form>
                                </div>
                            </div>
                            <!-- Search and select END -->

                            <!-- Course list table START -->
                            <div class="table-responsive border-0">
                                <table class="table table-dark-gray align-middle p-4 mb-0 table-hover">
                                    <!-- Table head -->
                                    <thead>
                                    <tr>
                                        <th scope="col" class="border-0 rounded-start">Course Title</th>
                                        <th scope="col" class="border-0">Total Lectures</th>
                                        <th scope="col" class="border-0 rounded-end">Action</th>
                                    </tr>
                                    </thead>

                                    <!-- Table body START -->
                                    <tbody>
                                    <!-- Table item -->
                                    <tr>
                                        <!-- Table data -->
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <!-- Image -->
                                                <div class="w-100px">
                                                    <img src="<?php echo e(asset('web')); ?>/assets/images/courses/4by3/08.jpg" class="rounded" alt="">
                                                </div>
                                                <div class="mb-0 ms-2">
                                                    <!-- Title -->
                                                    <h6 class="table-responsive-title"><a href="#">Building Scalable APIs with GraphQL</a></h6>
                                                    <!-- Info -->
                                                </div>
                                            </div>
                                        </td>

                                        <!-- Table data -->
                                        <td>56</td>
                                        <!-- Table data -->
                                        <td>
                                            <a href="#" class="btn btn-sm btn-primary-soft me-1 mb-1 mb-md-0"><i class="bi bi-play-circle me-1"></i>Continue</a>
                                        </td>
                                    </tr>

                                    <!-- Table item -->
                                    <tr>
                                        <!-- Table data -->
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <!-- Image -->
                                                <div class="w-100px">
                                                    <img src="<?php echo e(asset('web')); ?>/assets/images/courses/4by3/03.jpg" class="rounded" alt="">
                                                </div>
                                                <div class="mb-0 ms-2">
                                                    <!-- Title -->
                                                    <h6 class="table-responsive-title"><a href="#">Create a Design System in Figma</a></h6>
                                                    <!-- Info -->
                                                </div>
                                            </div>
                                        </td>

                                        <!-- Table data -->
                                        <td>42</td>
                                        <!-- Table data -->
                                        <td>
                                            <button class="btn btn-sm btn-success me-1 mb-1 mb-x;-0 disabled"><i class="bi bi-check me-1"></i>Complete</button>
                                            <a href="#" class="btn btn-sm btn-light me-1"><i class="bi bi-arrow-repeat me-1"></i>Restart</a>
                                        </td>
                                    </tr>

                                    <!-- Table item -->
                                    <tr>
                                        <!-- Table data -->
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <!-- Image -->
                                                <div class="w-100px">
                                                    <img src="<?php echo e(asset('web')); ?>/assets/images/courses/4by3/05.jpg" class="rounded" alt="">
                                                </div>
                                                <div class="mb-0 ms-2">
                                                    <!-- Title -->
                                                    <h6 class="table-responsive-title"><a href="#">The Complete Web Development in python</a></h6>
                                                </div>
                                            </div>
                                        </td>

                                        <!-- Table data -->
                                        <td>28</td>
                                        <!-- Table data -->
                                        <td>
                                            <a href="#" class="btn btn-sm btn-primary-soft me-1 mb-1 mb-md-0"><i class="bi bi-play-circle me-1"></i>Continue</a>
                                        </td>
                                    </tr>

                                    <!-- Table item -->
                                    <tr>
                                        <!-- Table data -->
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <!-- Image -->
                                                <div class="w-100px">
                                                    <img src="<?php echo e(asset('web')); ?>/assets/images/courses/4by3/01.jpg" class="rounded" alt="">
                                                </div>
                                                <div class="mb-0 ms-2">
                                                    <!-- Title -->
                                                    <h6 class="table-responsive-title"><a href="#">Digital Marketing Masterclass</a></h6>
                                                    <!-- Info -->
                                                </div>
                                            </div>
                                        </td>
                                        <!-- Table data -->
                                        <td>32</td>
                                        <!-- Table data -->
                                        <td>
                                            <a href="#" class="btn btn-sm btn-primary-soft me-1 mb-1 mb-md-0"><i class="bi bi-play-circle me-1"></i>Continue</a>
                                        </td>
                                    </tr>

                                    <!-- Table item -->
                                    <tr>
                                        <!-- Table data -->
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <!-- Image -->
                                                <div class="w-100px">
                                                    <img src="<?php echo e(asset('web')); ?>/assets/images/courses/4by3/02.jpg" class="rounded" alt="">
                                                </div>
                                                <div class="mb-0 ms-2">
                                                    <!-- Title -->
                                                    <h6 class="table-responsive-title"><a href="#">Graphic Design Masterclass</a></h6>
                                                    <!-- Info -->
                                                </div>
                                            </div>
                                        </td>
                                        <!-- Table data -->
                                        <td>16</td>
                                        <!-- Table data -->
                                        <td>
                                            <a href="#" class="btn btn-sm btn-primary-soft me-1 mb-1 mb-md-0"><i class="bi bi-play-circle me-1"></i>Continue</a>
                                        </td>
                                    </tr>
                                    </tbody>
                                    <!-- Table body END -->
                                </table>
                            </div>
                            <!-- Course list table END -->

                            <!-- Pagination START -->
                            <div class="d-sm-flex justify-content-sm-between align-items-sm-center mt-4 mt-sm-3">
                                <!-- Content -->
                                <p class="mb-0 text-center text-sm-start">Showing 1 to 8 of 20 entries</p>
                                <!-- Pagination -->
                                <nav class="d-flex justify-content-center mb-0" aria-label="navigation">
                                    <ul class="pagination pagination-sm pagination-primary-soft d-inline-block d-md-flex rounded mb-0">
                                        <li class="page-item mb-0"><a class="page-link" href="#" tabindex="-1"><i class="fas fa-angle-left"></i></a></li>
                                        <li class="page-item mb-0"><a class="page-link" href="#">1</a></li>
                                        <li class="page-item mb-0 active"><a class="page-link" href="#">2</a></li>
                                        <li class="page-item mb-0"><a class="page-link" href="#">3</a></li>
                                        <li class="page-item mb-0"><a class="page-link" href="#"><i class="fas fa-angle-right"></i></a></li>
                                    </ul>
                                </nav>
                            </div>
                            <!-- Pagination END -->
                        </div>
                        <!-- Card body START -->
                    </div>
                </div>
                <!-- Main content END -->
            </div> <!-- Row END -->
        </div>
    </section>
    <!-- =======================
    Page content END -->
<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\xampp8.2\htdocs\learning-management-emu\resources\views/frontend/student/course_list.blade.php ENDPATH**/ ?>