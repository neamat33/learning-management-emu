
<?php $__env->startSection('page-title', 'Roles Create'); ?>

<?php $__env->startSection('content'); ?>
    <div class="content-body mt-4" style="min-height: 500px">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Create Roles</h4>
                        </div>
                        <div class="card-body">
                            <div class="basic-form">
                                <?php echo Form::open(['route' => 'roles.store', 'method' => 'POST']); ?>

                                    <div class="row">
                                        <label class="col-lg-2 col-form-label" for="name">Role Name <span class="text-danger">*</span> :</label>
                                        <div class="col-lg-6">
                                            <?php echo Form::text('name', null, ['placeholder' => 'Role Name', 'class' => 'form-control']); ?>

                                        </div>

                                        <div class="col-xs-12 col-sm-12 col-md-12">
                                            <div class="col-md-12 mt-5">
                                                <label>
                                                    <input type="checkbox" id="select-all"> Select All
                                                </label>
                                            </div>
                                            <div class="form-group">
                                                <div class="row">
                                                    <?php
                                                        $groupNames = $permission->pluck('feature')->unique()->sort();
                                                    ?>
                                                    <?php $__currentLoopData = $groupNames; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $groupName): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <div class="col-md-3">
                                                            <h6 class="mt-5 mb-2" style="text-transform: capitalize"><?php echo e(str_replace('-',' - ',str_replace('_', ' ', $groupName))); ?></h6>
                                                            <?php $__currentLoopData = $permission->where('feature', $groupName); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                <label style="text-transform: capitalize">
                                                                    <?php echo e(Form::checkbox('permission[]', $value->id, false, ['class' => 'name', 'data-group' => $groupName])); ?>

                                                                    <?php echo e(str_replace('-',' - ',str_replace('_', ' ', $value->name))); ?>

                                                                </label>
                                                                <br />
                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                        </div>
                                                        <div class="col-md-2 mt-5 mb-2">
                                                            <label>
                                                                <input type="checkbox" class="group-select-all" data-group="<?php echo e($groupName); ?>"> Select Section
                                                            </label>
                                                        </div>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-xs-12 col-sm-12 col-md-12 text-end mt-3">
                                            <button type="submit" class="btn btn-primary">Submit</button>
                                        </div>
                                    </div>
                                <?php echo Form::close(); ?>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

        <script>
            // jQuery is assumed to be available

            // When the "Select All" checkbox is clicked
            $('#select-all').click(function () {
                $('input[name="permission[]"]').prop('checked', this.checked);

                // Uncheck all group-select-all checkboxes
                $('.group-select-all').prop('checked', false);
            });

            // When a group's "Select All" checkbox is clicked
            $('.group-select-all').click(function () {
                var group = $(this).data('group');
                var groupCheckboxes = $('input[name="permission[]"][data-group="' + group + '"]');
                groupCheckboxes.prop('checked', this.checked);

                // Uncheck the main "Select All" checkbox if not all group checkboxes are checked
                $('#select-all').prop('checked', groupCheckboxes.length === groupCheckboxes.filter(':checked').length);

                // Uncheck other group-select-all checkboxes
                $('.group-select-all').not(this).prop('checked', false);
            });

            // When any checkbox in a group is clicked, update the "Select All" checkbox status
            $('input[name="permission[]"]').click(function () {
                var group = $(this).data('group');
                var checkboxes = $('input[name="permission[]"][data-group="' + group + '"]');
                $('.group-select-all[data-group="' + group + '"]').prop('checked', checkboxes.length === checkboxes.filter(':checked').length);

                // Uncheck the main "Select All" checkbox if not all checkboxes are checked
                $('#select-all').prop('checked', $('input[name="permission[]"]').length === $('input[name="permission[]"]:checked').length);
            });
        </script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\xampp8.2\htdocs\learning-management-emu\resources\views/admin/roles/create.blade.php ENDPATH**/ ?>