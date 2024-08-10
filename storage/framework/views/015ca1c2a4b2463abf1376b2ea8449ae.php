<div class="row d-sm-flex justify-sm-content-between mt-2 mt-md-0">
    <!-- Avatar -->
    <div class="col-auto">
        <div class="avatar avatar-xxl position-relative mt-n3">
            <?php if(auth('student')->user()->image): ?>
                <img class="avatar-img rounded-circle border border-white border-3 shadow" src="<?php echo e(asset(auth('student')->user()->image)); ?>" alt="">
            <?php else: ?>
                <img class="avatar-img rounded-circle border border-white border-3 shadow" src="https://st2.depositphotos.com/3904951/8925/v/450/depositphotos_89250312-stock-illustration-photo-picture-web-icon-in.jpg" alt="">
            <?php endif; ?>
            <span class="badge text-bg-success rounded-pill position-absolute top-50 start-100 translate-middle mt-4 mt-md-5 ms-n3 px-md-3">Pro</span>
        </div>
    </div>
    <!-- Profile info -->
    <div class="col d-sm-flex justify-content-between align-items-center">
        <div>
            <h1 class="my-1 fs-4"><?php echo e(auth()->user()->name ?? 'My Name'); ?></h1>
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
<?php /**PATH E:\xampp8.2\htdocs\learning-management-emu\resources\views/frontend/student/comon.blade.php ENDPATH**/ ?>