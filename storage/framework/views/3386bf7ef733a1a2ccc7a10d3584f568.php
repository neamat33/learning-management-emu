
<?php $__env->startSection('page-title', 'Account List'); ?>
<?php $__env->startSection('content'); ?>
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="py-2 mb-2"><span class="text-muted fw-light">Accounts /</span> List</h4>
        <div class="card card-body mb-2">
            <form action="<?php echo e(route('accounts.index')); ?>">
                <div class="row">
                    <div class="form-group col-md-4">
                        <input type="text" name="account_name" class="form-control" placeholder="Account Name" value="<?php echo e(request('account_name')); ?>">
                    </div>
    
                    <div class="form-group col-md-4">
                        <input type="text" class="form-control" name="account_no" placeholder="Account Number" value="<?php echo e(request('account_no')); ?>">
                    </div>
    
                    <div class="form-group col-md-4">
                        <div class="form-group">
                            <select name="branch_id" id="" class="form-control">
                            <option value="">Select Branch</option>
                            <?php $__currentLoopData = $branches; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $branch): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($branch->id); ?>" <?php echo e(request("branch_id")==$branch->id?"SELECTED":""); ?>><?php echo e($branch->branch_name); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                    </div>

    
                </div>
                <div class="form-row mt-2">
                    <div class="form-group float-right">
                        <button class="btn btn-primary" type="submit">
                                <i class="fa fa-sliders"></i>
                                Filter
                        </button>
                        <a href="<?php echo e(route('accounts.index')); ?>" class="btn btn-info">Reset</a>
                    </div>
                </div>
            </form>
        </div>
        <!-- DataTable with Buttons -->
        <div class="card">
            <div class="card-header py-3 d-flex align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Accounts List</h6>
                <h6 class="m-0 font-weight-bold text-primary"><a href="<?php echo e(route('accounts.create')); ?>" class="btn btn-sm btn-primary"><i class="fa fa-plus"></i> Add
                    Account</a></h6>
            </div>
            <div class="card-datatable table-responsive pt-0">
                <table class="datatable table">
                    <thead>
                        <tr>
                            <th>SL.</th>
                            <th><strong> Branch</strong> </th>
                            <th>Account Name </th>
                            <th>Account No. </th>
                            <th>Opening Blance </th>
                            <th>Current Blance</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        
                        <?php $__currentLoopData = $accounts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td><?php echo e(++$key); ?></td>
                            <td><?php echo e($item->branch); ?></td>
                            <td><?php echo e($item->account_name); ?></td>
                            <td><?php echo e($item->account_no); ?></td>
                            <td><?php echo e($item->initial_blance); ?></td>
                            <td><?php echo e($item->curr_blance); ?></td>
                            <td>
                                        
                                <?php if($item->status_id == 1): ?>
                                    <span class="badge bg-success set-status" id="status_<?php echo e($item->id); ?>"
                                        onclick="setActive(<?php echo e($item->id); ?>)">Active</span>
                                <?php else: ?>
                                    <span class="badge bg-danger set-status" id="status_<?php echo e($item->id); ?>"
                                        onclick="setActive(<?php echo e($item->id); ?>)">Inactive</span>
                                <?php endif; ?>

                            </td>
                            <td><a data-id="<?php echo e($item->id); ?>" data-bs-toggle="modal" data-bs-target="#EditModal"
                                class="btn btn-primary btn-circle btn-sm editBtn">
                                <i class="fa fa-edit text-white"></i>
                            </a></td>
                        </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
                <div class="m-2 text-right">
                    <?php echo $accounts->links(); ?>

                </div>
            </div>
        </div>

    </div>
    <!-- Modal to edit record -->
       



<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH I:\xampp\htdocs\ucc_coaching\resources\views/admin/account/list.blade.php ENDPATH**/ ?>