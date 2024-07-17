
<?php $__env->startSection('page-title', 'Transaction List'); ?>
<?php $__env->startSection('content'); ?>
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="py-2 mb-2"><span class="text-muted fw-light">Account /</span> Transaction </h4>

        <!-- DataTable with Buttons -->
        <div class="card">
            <div class="card-header py-3 d-flex align-items-center">
                <h6 class="m-0 font-weight-bold text-primary flex-grow-1">Transactions List</h6>
                <div class="d-flex">
                    <h6 class="font-weight-bold text-primary" style="margin-right:10px;">
                        <a href="<?php echo e(route('transactions.create')); ?>" class="btn btn-sm btn-primary ">
                            <i class="fa fa-plus"></i> Add Income
                        </a>
                    </h6>
                    <h6 class="m-0 font-weight-bold text-primary">
                        <a href="<?php echo e(route('create_transaction_exepense')); ?>" class="btn btn-sm btn-danger">
                            <i class="fa fa-plus"></i> Add Expense
                        </a>
                    </h6>
                </div>
            </div>                      
            <div class="card-datatable table-responsive pt-0">
                <table class="datatable table">
                    <thead>
                        <tr>
                            <th style="width: 5%">Sl.</th>
                            <th>Date</th>
                            <th>Transactions Type</th>
                            <th>Category</th>
                            <th>User Name</th>
                            <th>Accounts Name</th>
                            <th>Amount</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>

                    <tbody>

                        <?php $__currentLoopData = $transactions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><?php echo e(++$key); ?></td>
                                <td><?php echo e(date('d-m-Y',strtotime($item->tnx_date))); ?></td>
                                <td>
                                    <?php if($item->tnx_type_id==1): ?> 
                                        Income
                                        <?php else: ?>
                                        Expense
                                    <?php endif; ?>
                                </td>
                                <td><?php echo e($item->category.' ('.$item->sub_category.')'); ?></td>
                                <td><?php echo e($item->student_name ?? '-'); ?></td>
                                <td><?php echo e($item->account_name.'-'.$item->account_no); ?></td>
                                <td><?php echo e($item->tnx_amount); ?></td>
                                
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
                                    <?php if($item->tnx_type_id == 1): ?>
                                    <a href="<?php echo e(route('transactions.edit',$item->id)); ?>" 
                                        class="btn btn-primary btn-circle btn-sm editBtn">
                                        <i class="fas fa-edit text-white"></i>
                                    </a>
                                    <?php endif; ?>
                                    
                                </td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
            </div>
        </div>

    </div>


    <script>
        $(function() {
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

<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH I:\xampp\htdocs\ucc_coaching\resources\views/admin/transaction/list.blade.php ENDPATH**/ ?>