
<?php $__env->startSection('page-title', 'Section List'); ?>
<?php $__env->startSection('content'); ?>
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="py-2 mb-2"><span class="text-muted fw-light">Account /</span> Transaction </h4>

        <!-- DataTable with Buttons -->
        <div class="card">
            <div class="card-header py-3 d-flex align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Transaction Category List</h6>
                <h6 class="m-0 font-weight-bold text-primary"><a href="" data-bs-toggle="modal"
                        data-bs-target="#AddModal" class="btn btn-sm btn-primary"><i class="fa fa-plus"></i> Add
                        New</a></h6>
            </div>
            <div class="card-datatable table-responsive pt-0">
                <table class="datatable table">
                    <thead>
                        <tr>
                            <th style="width: 5%">Sl.</th>
                            <th>Transaction Category</th>
                            <th>Parent</th>
                            <th>Type</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>

                    <tbody>

                        <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><?php echo e(++$key); ?></td>
                                <td><?php echo e($item->tnx_name); ?></td>
                                <td><?php echo e($item->parent_name); ?></td>
                                <td>
                                    <?php if($item->tnx_type == 1): ?>
                                        Income
                                    <?php else: ?>
                                        Expense
                                    <?php endif; ?>
                                </td>
                                <td>
                                    <?php if($item->status_id == 1): ?>
                                        <span class="badge bg-success set-status" id="status_<?php echo e($item->id); ?>"
                                            onclick="setActive(<?php echo e($item->id); ?>)">Active</span>
                                    <?php else: ?>
                                        <span class="badge bg-danger set-status" id="status_<?php echo e($item->id); ?>"
                                            onclick="setActive(<?php echo e($item->id); ?>)">Inactive</span>
                                    <?php endif; ?>

                                </td>
                                <td>
                                    <a data-id="<?php echo e($item->id); ?>" data-bs-toggle="modal" data-bs-target="#EditModal"
                                        class="btn btn-primary btn-circle btn-sm editBtn">
                                        <i class="fas fa-edit text-white"></i>
                                    </a>
                                    
                                </td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
            </div>
        </div>
        <!-- Modal to add new record -->
        <div class="modal fade  mb-5" id="AddModal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Add Category</h5>
                    </div>
                    <form action="<?php echo e(route('transaction_category.store')); ?>" method="POST">
                        <?php echo csrf_field(); ?>
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="">Transaction Type</label>
                                <select class="form-control" name="tnx_type" id="tnx_type">
                                    <option value="">Select..</option>
                                    <option value="1">Income</option>
                                    <option value="2">Expense</option>

                                </select>
                            </div>
                            <div class="form-group">
                                <label for="">Name</label>
                                <input type="text" class="form-control" name="tnx_name" required>
                            </div>
                            <div class="form-group">
                                <label for="">Category</label>
                                <select class="form-control" name="parent_id" id="parent_id">

                                </select>
                            </div>

                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal to edit record -->
    <div class="modal fade  mb-5" id="EditModal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit Transaction Category</h5>
                </div>
                <form id="update-form" method="POST">
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('PUT'); ?>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="">Transaction Type</label>
                            <select class="form-control" disabled selected name="tnx_type" id="e_tnx_type">
                                <option value="">Select..</option>
                                <option value="1">Income</option>
                                <option value="2">Expense</option>

                            </select>
                        </div>
                        <div class="form-group">
                            <label for="">Name</label>
                            <input type="text" class="form-control" name="tnx_name" id="tnx_name" required>
                        </div>
                        <div class="form-group">
                            <label for="">Category</label>
                            <select class="form-control" name="parent_id" id="e_parent_id">
                                <?php $__currentLoopData = $category; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($value->id); ?>"> <?php echo e($value->tnx_name); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>

                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Update </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        $(function() {

            $(document).on('click', '.editBtn', function() {
                let id = $(this).data("id");

                $.ajax({
                    type: 'GET',
                    url: "<?php echo e(url('admin/transaction_category_edit')); ?>",
                    data: {
                        id: id
                    },
                    success: function(data) {
                        console.log(data)
                        $('#e_parent_id').val(data.parent_id);
                        $('#tnx_name').val(data.tnx_name);
                        $('#e_tnx_type').val(data.tnx_type);
                        var id = data.id;
                        // Replace this with actual dynamic ID value
                        var formActionUrl = "<?php echo e(url('admin/transaction_category/update')); ?>/" + id;
                        $('#update-form').attr('action', formActionUrl);
                    },
                });
            });

            $("#tnx_type").on('change',function(){
                let tnx_type = $(this).val();
                $.ajax({
                    type: 'GET',
                    url: "<?php echo e(url('admin/get_parent')); ?>",
                    data: {
                        'tnx_type': tnx_type,
                    },
                    success: function(data) {
                        //console.log(data)
                        $("#parent_id").html(data);
                    },
                });
            })
        })
    </script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH I:\xampp\htdocs\ucc_coaching\resources\views/admin/transaction_category/list.blade.php ENDPATH**/ ?>