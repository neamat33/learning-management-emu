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
                                    <a class="list-group-item" href="<?php echo e(route('course.details')); ?>"><i class="far fa-fw fa-file-alt me-2"></i>Course Resume</a>
                                    <a class="list-group-item" href="<?php echo e(route('course.quiz')); ?>"><i class="bi bi-question-diamond fa-fw me-2"></i>Quiz</a>
                                    <a class="list-group-item active" href="<?php echo e(route('profile.update')); ?>"><i class="bi bi-pencil-square fa-fw me-2"></i>Edit Profile</a>
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
                    <!-- Edit profile START -->
                    <div class="card  border rounded-3">
                        <!-- Card header -->
                        <div class="card-header bg-transparent border-bottom">
                            <h3 class="card-header-title mb-0">My Profile</h3>
                        </div>
                        <!-- Card body START -->
                        <div class="card-body">
                            <!-- Form -->
                            <form class="row g-4" action="<?php echo e(route('my.profile.update',encrypt($userInfo->id))); ?>" method="post" enctype="multipart/form-data">
                                <?php echo csrf_field(); ?>
                                <!-- Profile picture -->
                                <div class="col-12 justify-content-center align-items-center">
                                    <label class="form-label">Profile picture</label>
                                    <div class="d-flex align-items-center">
                                        <label class="position-relative me-4" for="uploadfile-1" title="Replace this pic">
                                            <!-- Avatar place holder -->
                                            <span class="avatar avatar-xl">
                                                <?php if($userInfo->image): ?>
                                                    <img id="uploadfile-1-preview" class="avatar-img rounded-circle border border-white border-3 shadow" src="<?php echo e(asset($userInfo->image)); ?>" alt="">
                                                <?php else: ?>
                                                    <img id="uploadfile-1-preview" class="avatar-img rounded-circle border border-white border-3 shadow" src="https://st2.depositphotos.com/3904951/8925/v/450/depositphotos_89250312-stock-illustration-photo-picture-web-icon-in.jpg" alt="">
                                                <?php endif; ?>
										</span>
                                            <!-- Remove btn -->
                                            <button type="button" class="uploadremove"><i class="bi bi-x text-white"></i></button>
                                        </label>
                                        <!-- Upload button -->
                                        <label class="btn btn-primary-soft mb-0" for="uploadfile-1">Change</label>
                                        <input id="uploadfile-1" name="image" class="form-control d-none" type="file" onchange="loadFile(event)">
                                    </div>
                                </div>
                                <!-- Full name -->
                                <div class="col-12">
                                    <label class="form-label">Full name</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control" name="name" value="<?php echo e($userInfo->name ?? '-'); ?>" placeholder="First name">
                                    </div>
                                </div>
                                <!-- Email id -->
                                <div class="col-md-6">
                                    <label class="form-label">Email Address</label>
                                    <input class="form-control" type="email" value="<?php echo e($userInfo->email ?? '-'); ?>"  placeholder="Email Address" disabled>
                                </div>
                                <!-- Phone number -->
                                <div class="col-md-6">
                                    <label class="form-label">Phone number</label>
                                    <input type="text" class="form-control" value="<?php echo e($userInfo->phone_number ?? '-'); ?>" placeholder="Phone number" disabled>
                                </div>
                                <!-- Location -->
                                <div class="col-md-6">
                                    <label class="form-label">Address</label>
                                    <input class="form-control" type="text" name="address" placeholder="address" value="<?php echo e($userInfo->address ?? '-'); ?>">
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Date of Birth</label>
                                    <input class="form-control" type="date" name="dob" placeholder="address" value="<?php echo e($userInfo->dob ?? '-'); ?>">
                                </div>
                                <!-- About me -->
                                <div class="col-12">
                                    <label class="form-label">About me</label>
                                    <textarea class="form-control" rows="3" name="about_me" placeholder="about me"><?php echo e($userInfo->about_me ?? '-'); ?></textarea>
                                </div>
                                <!-- Education -->
                                <div class="col-12">
                                    <label class="form-label">Education</label>
                                    <input class="form-control mb-2" type="text" name="education" placeholder="education" value="<?php echo e($userInfo->education ?? '-'); ?>">
                                </div>
                                <!-- Save button -->
                                <div class="d-sm-flex justify-content-end">
                                    <button type="submit" class="btn btn-primary mb-0">Save changes</button>
                                </div>
                            </form>
                        </div>
                        <!-- Card body END -->
                    </div>
                    <!-- Edit profile END -->
                </div>
                <!-- Main content END -->
            </div><!-- Row END -->
        </div>
    </section>
    <!-- =======================
    Page content END -->
<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\xampp8.2\htdocs\learning-management-emu\resources\views/frontend/student/profile_edit.blade.php ENDPATH**/ ?>