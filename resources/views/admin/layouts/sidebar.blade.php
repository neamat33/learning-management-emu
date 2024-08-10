<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
    <div class="app-brand demo">
        <a href="{{ url('/') }}" class="app-brand-link">
            <span class="app-brand-logo demo">
                <img src="{{ asset('images') }}/logo.png" alt="" width="100%">
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
        @canany(['list-student'])
            <li class="menu-item">
                <a href="javascript:void(0);" class="menu-link menu-toggle">
                    <i class="menu-icon tf-icons ti ti-users"></i>
                    <div data-i18n="Students">Students</div>
                </a>

                <ul class="menu-sub">
                    @can('list-student')
                        <li class="menu-item">
                            <a href="{{ route('students.index') }}" class="menu-link">
                                <div data-i18n="Student Registration">Student Registration</div>
                            </a>
                        </li>
                    @endcan
                </ul>
            </li>
        @endcan
        @canany(['list-course'])
            <li class="menu-item">
                <a href="javascript:void(0);" class="menu-link menu-toggle">
                    <i class="menu-icon tf-icons ti ti-book"></i>
                    <div data-i18n="Courses">Courses</div>
                </a>

                <ul class="menu-sub">

                    @can('list-course')
                        <li class="menu-item">
                            <a href="{{ route('courses.index') }}" class="menu-link">
                                <div data-i18n="Courses">Courses</div>
                            </a>
                        </li>
                    @endcan
                    @can('list-course')
                        <li class="menu-item">
                            <a href="{{ route('categories.index') }}" class="menu-link">
                                <div data-i18n="Course Catgeory">Course Catgeory</div>
                            </a>
                        </li>
                    @endcan

                </ul>
            </li>
        @endcan
        @canany(['academic'])
            <li class="menu-item">
                <a href="javascript:void(0);" class="menu-link menu-toggle">
                    <i class="menu-icon tf-icons ti ti-book"></i>
                    <div data-i18n="Academic">Academic</div>
                </a>

                <ul class="menu-sub">
                    @can('list-instructor')
                        <li class="menu-item">
                            <a href="{{ route('instructors.index') }}" class="menu-link">
                                <div data-i18n="Instructor">Instructor</div>
                            </a>
                        </li>
                    @endcan
                    @can('list-class')
                        <li class="menu-item">
                            <a href="{{ route('class_settings.index') }}" class="menu-link">
                                <div data-i18n="Class Setup">Class Setup</div>
                            </a>
                        </li>
                    @endcan
                    @can('list-branch')
                        <li class="menu-item">
                            <a href="{{ route('branch.index') }}" class="menu-link">
                                <div data-i18n="Branch">Branch</div>
                            </a>
                        </li>
                    @endcan
                    @can('list-class')
                        <li class="menu-item">
                            <a href="{{ route('classes.index') }}" class="menu-link">
                                <div data-i18n="Class">Class</div>
                            </a>
                        </li>
                    @endcan
                    @can('list-section')
                        <li class="menu-item">
                            <a href="{{ route('sections.index') }}" class="menu-link">
                                <div data-i18n="Section">Section</div>
                            </a>
                        </li>
                    @endcan
                    @can('list-batch')
                        <li class="menu-item">
                            <a href="{{ route('batches.index') }}" class="menu-link">
                                <div data-i18n="Batch">Batch</div>
                            </a>
                        </li>
                    @endcan
                    @can('list-subject')
                        <li class="menu-item">
                            <a href="{{ route('subjects.index') }}" class="menu-link">
                                <div data-i18n="Subject">Subject</div>
                            </a>
                        </li>
                    @endcan
                    @can('list-shift')
                        <li class="menu-item">
                            <a href="{{ route('shifts.index') }}" class="menu-link">
                                <div data-i18n="Shift">Shift</div>
                            </a>
                        </li>
                    @endcan
                    @can('list-room')
                        <li class="menu-item">
                            <a href="{{ route('rooms.index') }}" class="menu-link">
                                <div data-i18n="Room">Room</div>
                            </a>
                        </li>
                    @endcan
                    @can('list-subject_assign')
                        <li class="menu-item">
                            <a href="{{ route('subject_assign.index') }}" class="menu-link">
                                <div data-i18n="Subject Assign">Subject Assign</div>
                            </a>
                        </li>
                    @endcan

                </ul>
            </li>
        @endcan
        @canany(['accounting'])
            <li class="menu-item">
                <a href="javascript:void(0);" class="menu-link menu-toggle">
                    <i class="menu-icon tf-icons ti ti-book"></i>
                    <div data-i18n="Accounting">Accounting</div>
                </a>

                <ul class="menu-sub">
                    @can('create-fees-collections')
                        <li class="menu-item">
                            <a href="{{ route('fees-collections.create') }}" class="menu-link">
                                <div data-i18n="Fees Collections">Fees Collections</div>
                            </a>
                        </li>
                    @endcan
                    @can('list-accounts')
                        <li class="menu-item">
                            <a href="{{ route('accounts.index') }}" class="menu-link">
                                <div data-i18n="Accounts">Accounts</div>
                            </a>
                        </li>
                    @endcan
                    @can('list-transactions')
                        <li class="menu-item">
                            <a href="{{ route('transactions.index') }}" class="menu-link">
                                <div data-i18n="Transactions">Transactions</div>
                            </a>
                        </li>
                    @endcan
                    @can('list-transaction_category')
                        <li class="menu-item">
                            <a href="{{ route('transaction_category.index') }}" class="menu-link">
                                <div data-i18n="Transaction Category">Transaction Category</div>
                            </a>
                        </li>
                    @endcan

                </ul>
            </li>
        @endcan


        <li class="menu-header small text-uppercase pt-2">
            <span class="menu-header-text">Setting &amp; Customize</span>
        </li>
        @canany(['list-user', 'create-list'])
            <li class="menu-item">
                <a href="javascript:void(0);" class="menu-link menu-toggle">
                    <i class="menu-icon tf-icons ti ti-users"></i>
                    <div data-i18n="Users">Users</div>
                </a>
                <ul class="menu-sub">
                    @canany('create-user')
                        <li class="menu-item">
                            <a href="{{ route('user.create') }}" class="menu-link">
                                <div data-i18n="User Create">User Create</div>
                            </a>
                        </li>
                    @endcan
                    @canany('list-user')
                        <li class="menu-item">
                            <a href="{{ route('user.index') }}" class="menu-link">
                                <div data-i18n="User List">User List</div>
                            </a>
                        </li>
                    @endcan
                </ul>
            </li>
        @endcan

        @canany(['list-role', 'create-role'])
            <li class="menu-item">
                <a href="javascript:void(0);" class="menu-link menu-toggle">
                    <i class="menu-icon tf-icons ti ti-settings"></i>
                    <div data-i18n="Roles & Permissions">Roles & Permissions</div>
                </a>
                <ul class="menu-sub">
                    @can('create-role')
                        <li class="menu-item">
                            <a href="{{ route('roles.create') }}" class="menu-link">
                                <div data-i18n="Roles Create">Roles Create</div>
                            </a>
                        </li>
                    @endcan
                    @can('list-role')
                        <li class="menu-item">
                            <a href="{{ route('roles.index') }}" class="menu-link">
                                <div data-i18n="Roles List">Roles List</div>
                            </a>
                        </li>
                    @endcan
                </ul>
            </li>
        @endcan

        @can('setting')
            <li class="menu-item active open">
                <a href="{{ route('setting') }}" class="menu-link menu-toggle">
                    <i class="menu-icon tf-icons ti ti-layout-grid"></i>
                    <div data-i18n="Setting">Setting</div>

                </a>
            </li>
        @endcan
        <li class="menu-item">
            <a href="{{ route('contact.index') }}" class="menu-link">
                <div data-i18n="Contact Message">Contact Message</div>
            </a>
        </li>
    </ul>
</aside>
