<header class="navbar-light navbar-sticky header-static">
    <!-- Logo Nav START -->
    <nav class="navbar navbar-expand-xl">
        <div class="container-fluid px-3 px-xl-5">
            <!-- Logo START -->
            <a class="navbar-brand" href="#">
                <span class="light-mode-item navbar-brand-item" style="font-weight: bold">EMU Education</span>
                <span class="dark-mode-item navbar-brand-item" style="font-weight: bold">EMU Education</span>
                <!--				<img class="light-mode-item navbar-brand-item" src="assets/images/logo.svg" alt="logo">-->
                <!--				<img class="dark-mode-item navbar-brand-item" src="assets/images/logo-light.svg" alt="logo">-->
            </a>
            <!-- Logo END -->

            <!-- Responsive navbar toggler -->
            <button class="navbar-toggler ms-auto" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-animation">
					<span></span>
					<span></span>
					<span></span>
				</span>
            </button>

            <!-- Main navbar START -->
            <div class="navbar-collapse w-100 collapse" id="navbarCollapse" style="margin-left: 100px">
                <ul class="navbar-nav navbar-nav-scroll me-auto">

                </ul>
                <!-- Nav Main menu START -->
                <ul class="navbar-nav navbar-nav-scroll me-auto">
                    <!-- Nav item 1 Demos -->
                    <li class="nav-item ml-2" >
                        <!--						<a class="nav-link active1" href="#" style="font-weight: bold" >হোম</a>-->
                        <a href="<?php echo e(route('home.index')); ?>" class="btn btn-primary-soft" style="font-weight: bold;padding: 8px 20px">হোম</a>
                    </li>
                    <li class="nav-item" style="margin-left: 2px">
                        <a href="<?php echo e(route('frontend.course.page')); ?>" class="btn btn-primary-soft" style="font-weight: bold;padding: 8px 20px">কোর্সসমূহ</a>
                    </li>
                    <li class="nav-item" style="margin-left: 2px">
                        <a class="btn btn-primary-soft" style="font-weight: bold;padding: 8px 20px">পরীক্ষাসমূহ</a>
                    </li>
                    <li class="nav-item" style="margin-left: 2px">
                        <a class="btn btn-primary-soft" style="font-weight: bold;padding: 8px 20px">ফ্রি সার্ভিস</a>
                    </li>
                    <li class="nav-item" style="margin-left: 2px">
                        <a class="btn btn-primary-soft" style="font-weight: bold;padding: 8px 20px">নোটিশ</a>
                    </li>
                    <li class="nav-item" style="margin-left: 2px">
                        <a class="btn btn-primary-soft" style="font-weight: bold;padding: 8px 20px">ব্লগ</a>
                    </li>
                    <li class="nav-item" style="margin-left: 2px">
                        <a class="btn btn-primary-soft" style="font-weight: bold;padding: 8px 20px">বই</a>
                    </li>
                </ul>
                <!-- Nav Main menu END -->
                <!-- Nav Search START -->
                <div class="nav my-3 my-xl-0 px-4 flex-nowrap align-items-center">
                    <div class="nav-item w-100">
                        <form class="position-relative">
                            <input class="form-control pe-5 bg-transparent" type="search" placeholder="Search" aria-label="Search">
                            <button class="bg-transparent p-2 position-absolute top-50 end-0 translate-middle-y border-0 text-primary-hover text-reset" type="submit">
                                <i class="fas fa-search fs-6 "></i>
                            </button>
                        </form>
                    </div>
                </div>
                <!-- Nav Search END -->
            </div>
            <!-- Main navbar END -->
            <!-- login -->

            <!--			<div class="dropdown ms-1 ms-lg-0">-->
            <!--				<a class="avatar avatar-sm p-0" href="#" role="button" data-bs-auto-close="outside" data-bs-display="static" data-bs-toggle="dropdown" aria-expanded="false">-->
            <!--					<span class="btn btn-primary-soft" style="font-weight: bold">Login</span>-->
            <!--				</a>-->
            <!--			</div>-->
            <!-- Profile START -->
            <div class="dropdown ms-1 ms-lg-0">
                <a class="avatar avatar-sm p-0" href="#" id="profileDropdown" role="button" data-bs-auto-close="outside" data-bs-display="static" data-bs-toggle="dropdown" aria-expanded="false">
                    <img class="avatar-img rounded-circle" src="https://st2.depositphotos.com/3904951/8925/v/450/depositphotos_89250312-stock-illustration-photo-picture-web-icon-in.jpg" alt="avatar">
                </a>
                <ul class="dropdown-menu dropdown-animation dropdown-menu-end shadow pt-3" aria-labelledby="profileDropdown">
                    <!-- Profile info -->
                    <li class="px-3 mb-3">
                        <div class="d-flex align-items-center">
                            <!-- Avatar -->
                            <div class="avatar me-3">
                                <img class="avatar-img rounded-circle shadow" src="https://st2.depositphotos.com/3904951/8925/v/450/depositphotos_89250312-stock-illustration-photo-picture-web-icon-in.jpg" alt="avatar">
                            </div>
                            <div>
                                <a class="h6" href="#">S.M Shamim</a>
                                <p class="small m-0">Shamim@gmail.com</p>
                            </div>
                        </div>
                    </li>
                    <li> <hr class="dropdown-divider"></li>
                    <!-- Links -->
                    <li><a class="dropdown-item" href="<?php echo e(route('dashboard.page')); ?>"><i class="bi bi-grid-fill fa-fw me-1"></i>Dashboard</a></li>
                    <li><a class="dropdown-item" href="<?php echo e(route('profile.update')); ?>"><i class="bi bi-person fa-fw me-2"></i>Edit Profile</a></li>


                    <li><a class="dropdown-item bg-danger-soft-hover" href="#"><i class="bi bi-power fa-fw me-2"></i>Sign Out</a></li>
                    <li> <hr class="dropdown-divider"></li>
                    <!-- Dark mode switch START -->
                    <li>
                        <div class="modeswitch-wrap" id="darkModeSwitch">
                            <div class="modeswitch-item">
                                <div class="modeswitch-icon"></div>
                            </div>
                            <span>Dark mode</span>
                        </div>
                    </li>
                    <!-- Dark mode switch END -->
                </ul>
            </div>
            <!-- Profile START -->
        </div>
    </nav>
    <!-- Logo Nav END -->
</header>
<?php /**PATH E:\xampp8.2\htdocs\learning-management-emu\resources\views/frontend/layouts/header.blade.php ENDPATH**/ ?>