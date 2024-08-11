<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
    <div class="app-brand demo">
        <a href="<?php echo e(url('/')); ?>" class="app-brand-link">
            <span class="app-brand-logo demo">
                <img src="<?php echo e(asset('images')); ?>/logo.png" alt="" width="100%">
            </span>
            <span>&nbsp; EMU</span>
        </a>

        <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto">
            <i class="ti menu-toggle-icon d-none d-xl-block ti-sm align-middle"></i>
            <i class="ti ti-x d-block d-xl-none ti-sm align-middle"></i>
        </a>
    </div>

    <div class="menu-inner-shadow"></div>

    <ul class="menu-inner py-1">
        <!-- Dashboards -->
        <li class="menu-item active open">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons ti ti-smart-home"></i>
                <div data-i18n="Dashboards">Dashboards</div>

            </a>
        </li>


        <!-- Layouts -->
        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->any(['list-student'])): ?>
            <li class="menu-item">
                <a href="javascript:void(0);" class="menu-link menu-toggle">
                    <i class="menu-icon tf-icons ti ti-users"></i>
                    <div data-i18n="Students">Students</div>
                </a>

                <ul class="menu-sub">
                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('list-student')): ?>
                        <li class="menu-item">
                            <a href="<?php echo e(route('students.index')); ?>" class="menu-link">
                                <div data-i18n="Student Registration">Student Registration</div>
                            </a>
                        </li>
                    <?php endif; ?>
                </ul>
            </li>
        <?php endif; ?>
        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->any(['list-course'])): ?>
            <li class="menu-item">
                <a href="javascript:void(0);" class="menu-link menu-toggle">
                    <i class="menu-icon tf-icons ti ti-book"></i>
                    <div data-i18n="Courses">Courses</div>
                </a>

                <ul class="menu-sub">

                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('list-course')): ?>
                        <li class="menu-item">
                            <a href="<?php echo e(route('courses.index')); ?>" class="menu-link">
                                <div data-i18n="Courses">Courses</div>
                            </a>
                        </li>
                    <?php endif; ?>
                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('list-course')): ?>
                        <li class="menu-item">
                            <a href="<?php echo e(route('categories.index')); ?>" class="menu-link">
                                <div data-i18n="Course Catgeory">Course Catgeory</div>
                            </a>
                        </li>
                    <?php endif; ?>

                </ul>
            </li>
        <?php endif; ?>
        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->any(['academic'])): ?>
            <li class="menu-item">
                <a href="javascript:void(0);" class="menu-link menu-toggle">
                    <i class="menu-icon tf-icons ti ti-book"></i>
                    <div data-i18n="Academic">Academic</div>
                </a>

                <ul class="menu-sub">
                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('list-instructor')): ?>
                        <li class="menu-item">
                            <a href="<?php echo e(route('instructors.index')); ?>" class="menu-link">
                                <div data-i18n="Instructor">Instructor</div>
                            </a>
                        </li>
                    <?php endif; ?>
                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('list-class')): ?>
                        <li class="menu-item">
                            <a href="<?php echo e(route('class_settings.index')); ?>" class="menu-link">
                                <div data-i18n="Class Setup">Class Setup</div>
                            </a>
                        </li>
                    <?php endif; ?>
                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('list-branch')): ?>
                        <li class="menu-item">
                            <a href="<?php echo e(route('branch.index')); ?>" class="menu-link">
                                <div data-i18n="Branch">Branch</div>
                            </a>
                        </li>
                    <?php endif; ?>
                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('list-class')): ?>
                        <li class="menu-item">
                            <a href="<?php echo e(route('classes.index')); ?>" class="menu-link">
                                <div data-i18n="Class">Class</div>
                            </a>
                        </li>
                    <?php endif; ?>
                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('list-section')): ?>
                        <li class="menu-item">
                            <a href="<?php echo e(route('sections.index')); ?>" class="menu-link">
                                <div data-i18n="Section">Section</div>
                            </a>
                        </li>
                    <?php endif; ?>
                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('list-batch')): ?>
                        <li class="menu-item">
                            <a href="<?php echo e(route('batches.index')); ?>" class="menu-link">
                                <div data-i18n="Batch">Batch</div>
                            </a>
                        </li>
                    <?php endif; ?>
                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('list-subject')): ?>
                        <li class="menu-item">
                            <a href="<?php echo e(route('subjects.index')); ?>" class="menu-link">
                                <div data-i18n="Subject">Subject</div>
                            </a>
                        </li>
                    <?php endif; ?>
                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('list-shift')): ?>
                        <li class="menu-item">
                            <a href="<?php echo e(route('shifts.index')); ?>" class="menu-link">
                                <div data-i18n="Shift">Shift</div>
                            </a>
                        </li>
                    <?php endif; ?>
                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('list-room')): ?>
                        <li class="menu-item">
                            <a href="<?php echo e(route('rooms.index')); ?>" class="menu-link">
                                <div data-i18n="Room">Room</div>
                            </a>
                        </li>
                    <?php endif; ?>
                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('list-subject_assign')): ?>
                        <li class="menu-item">
                            <a href="<?php echo e(route('subject_assign.index')); ?>" class="menu-link">
                                <div data-i18n="Subject Assign">Subject Assign</div>
                            </a>
                        </li>
                    <?php endif; ?>

                </ul>
            </li>
        <?php endif; ?>
        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->any(['accounting'])): ?>
            <li class="menu-item">
                <a href="javascript:void(0);" class="menu-link menu-toggle">
                    <i class="menu-icon tf-icons ti ti-book"></i>
                    <div data-i18n="Accounting">Accounting</div>
                </a>

                <ul class="menu-sub">
                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('create-fees-collections')): ?>
                        <li class="menu-item">
                            <a href="<?php echo e(route('fees-collections.create')); ?>" class="menu-link">
                                <div data-i18n="Fees Collections">Fees Collections</div>
                            </a>
                        </li>
                    <?php endif; ?>
                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('list-accounts')): ?>
                        <li class="menu-item">
                            <a href="<?php echo e(route('accounts.index')); ?>" class="menu-link">
                                <div data-i18n="Accounts">Accounts</div>
                            </a>
                        </li>
                    <?php endif; ?>
                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('list-transactions')): ?>
                        <li class="menu-item">
                            <a href="<?php echo e(route('transactions.index')); ?>" class="menu-link">
                                <div data-i18n="Transactions">Transactions</div>
                            </a>
                        </li>
                    <?php endif; ?>
                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('list-transaction_category')): ?>
                        <li class="menu-item">
                            <a href="<?php echo e(route('transaction_category.index')); ?>" class="menu-link">
                                <div data-i18n="Transaction Category">Transaction Category</div>
                            </a>
                        </li>
                    <?php endif; ?>

                </ul>
            </li>
        <?php endif; ?>


        <li class="menu-header small text-uppercase pt-2">
            <span class="menu-header-text">Setting &amp; Customize</span>
        </li>
        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->any(['list-user', 'create-list'])): ?>
            <li class="menu-item">
                <a href="javascript:void(0);" class="menu-link menu-toggle">
                    <i class="menu-icon tf-icons ti ti-users"></i>
                    <div data-i18n="Users">Users</div>
                </a>
                <ul class="menu-sub">
                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->any('create-user')): ?>
                        <li class="menu-item">
                            <a href="<?php echo e(route('user.create')); ?>" class="menu-link">
                                <div data-i18n="User Create">User Create</div>
                            </a>
                        </li>
                    <?php endif; ?>
                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->any('list-user')): ?>
                        <li class="menu-item">
                            <a href="<?php echo e(route('user.index')); ?>" class="menu-link">
                                <div data-i18n="User List">User List</div>
                            </a>
                        </li>
                    <?php endif; ?>
                </ul>
            </li>
        <?php endif; ?>

        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->any(['list-role', 'create-role'])): ?>
            <li class="menu-item">
                <a href="javascript:void(0);" class="menu-link menu-toggle">
                    <i class="menu-icon tf-icons ti ti-settings"></i>
                    <div data-i18n="Roles & Permissions">Roles & Permissions</div>
                </a>
                <ul class="menu-sub">
                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('create-role')): ?>
                        <li class="menu-item">
                            <a href="<?php echo e(route('roles.create')); ?>" class="menu-link">
                                <div data-i18n="Roles Create">Roles Create</div>
                            </a>
                        </li>
                    <?php endif; ?>
                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('list-role')): ?>
                        <li class="menu-item">
                            <a href="<?php echo e(route('roles.index')); ?>" class="menu-link">
                                <div data-i18n="Roles List">Roles List</div>
                            </a>
                        </li>
                    <?php endif; ?>
                </ul>
            </li>
        <?php endif; ?>

        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('setting')): ?>
            <li class="menu-item active open">
                <a href="<?php echo e(route('setting')); ?>" class="menu-link menu-toggle">
                    <i class="menu-icon tf-icons ti ti-layout-grid"></i>
                    <div data-i18n="Setting">Setting</div>

                </a>
            </li>
        <?php endif; ?>
        <li class="menu-item">
            <a href="<?php echo e(route('contact.index')); ?>" class="menu-link">
                <div data-i18n="Contact Message">Contact Message</div>
            </a>
        </li>
        <li class="menu-item">
            <a href="<?php echo e(route('notice.board.index')); ?>" class="menu-link">
                <div data-i18n="Notice Board">Notice Board</div>
            </a>
        </li>
    </ul>
</aside>
<?php /**PATH E:\xampp8.2\htdocs\learning-management-emu\resources\views/admin/layouts/sidebar.blade.php ENDPATH**/ ?>