
<?php $__env->startSection('content'); ?>
    <section class="pt-0">
        <div class="container">
            <div class="row">
                <!-- Main content START -->
                <div class="col-xl-12">
                    <!-- Student review START -->
                    <div class="card border bg-transparent rounded-3">
                        <!-- Header START -->
                        <div class="card-header bg-transparent border-bottom">
                            <div class="row justify-content-between align-middle">
                                <!-- Title -->
                                <div class="col-sm-6">
                                    <h3 class="card-header-title mb-2 mb-sm-0">
                                        <i class="fa fa-thumb-tack" aria-hidden="true"></i> Notice Board
                                    </h3>
                                </div>
                                <!-- Short by filter -->
                                <div class="col-sm-4">
                                    <div style="display: block;float: right">
                                        <i class="fas fa-fw fa-file-signature fs-5" aria-hidden="true"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Header END -->

                        <?php
                            // Find the most recent notice based on the 'updated_at' field
                            $latestNotice = \App\Models\NoticeBoard::orderBy('updated_at', 'desc')->first();
                            $latestNoticeId = $latestNotice ? $latestNotice->id : null;
                        ?>
                        <!-- Reviews START -->
                        <div class="card-body mt-2 mt-sm-4">
                            <?php $__currentLoopData = $notices; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $notice): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <!-- Review item START -->
                                <div class="d-sm-flex"
                                     <?php if($notice->id === $latestNoticeId): ?>
                                         style="background-color: #fff2f2;padding: 5px 5px;border-radius: 5px"
                                     <?php else: ?>
                                         style="padding: 5px 5px;border-radius: 5px"
                                    <?php endif; ?>
                                >
                                    <div>
                                        <div class="mb-3 d-sm-flex justify-content-sm-between align-items-center">
                                            <!-- Title -->
                                            <div>
                                                <h5 class="m-0">
                                                    <i class="fa fa-edit" aria-hidden="true"></i> <?php echo e($notice->subject ?? ' '); ?>

                                                </h5>
                                                <?php echo e(\Carbon\Carbon::parse($notice->updated_at)->setTimezone('Asia/Dhaka')->addHours(24)->format('d M Y h:i a')); ?>

                                            </div>
                                        </div>
                                        <p><?php echo e($notice->message ?? ' '); ?></p>
                                    </div>
                                </div>
                                <?php if(!$loop->last): ?>
                                    <hr>
                                <?php endif; ?>

                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                        <!-- Reviews END -->
                        <div class="card-footer border-top">
                            <!-- Pagination START -->
                            <div class="d-sm-flex justify-content-sm-between align-items-sm-center">
                                <!-- Content -->
                                <p class="mb-0 text-center text-sm-start">
                                    Showing <?php echo e($notices->firstItem()); ?> to <?php echo e($notices->lastItem()); ?> of <?php echo e($notices->total()); ?> entries
                                </p>
                                <!-- Pagination -->
                                <nav class="d-flex justify-content-center mb-0" aria-label="navigation">
                                    <ul class="pagination pagination-sm pagination-primary-soft my-0 py-0">
                                        <!-- Previous Page Link -->
                                        <?php if($notices->onFirstPage()): ?>
                                            <li class="page-item my-0 disabled">
                                                <span class="page-link"><i class="fas fa-angle-left"></i></span>
                                            </li>
                                        <?php else: ?>
                                            <li class="page-item my-0">
                                                <a class="page-link" href="<?php echo e($notices->previousPageUrl()); ?>" tabindex="-1">
                                                    <i class="fas fa-angle-left"></i>
                                                </a>
                                            </li>
                                        <?php endif; ?>

                                        <!-- Pagination Elements -->
                                        <?php $__currentLoopData = $notices->links()->elements[0]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $page => $url): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <?php if($page == $notices->currentPage()): ?>
                                                <li class="page-item my-0 active">
                                                    <span class="page-link"><?php echo e($page); ?></span>
                                                </li>
                                            <?php else: ?>
                                                <li class="page-item my-0">
                                                    <a class="page-link" href="<?php echo e($url); ?>"><?php echo e($page); ?></a>
                                                </li>
                                            <?php endif; ?>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                        <!-- Next Page Link -->
                                        <?php if($notices->hasMorePages()): ?>
                                            <li class="page-item my-0">
                                                <a class="page-link" href="<?php echo e($notices->nextPageUrl()); ?>">
                                                    <i class="fas fa-angle-right"></i>
                                                </a>
                                            </li>
                                        <?php else: ?>
                                            <li class="page-item my-0 disabled">
                                                <span class="page-link"><i class="fas fa-angle-right"></i></span>
                                            </li>
                                        <?php endif; ?>
                                    </ul>
                                </nav>
                            </div>
                            <!-- Pagination END -->
                        </div>
                    </div>
                    <!-- Student review END -->
                </div>
                <!-- Main content END -->
            </div><!-- Row END -->
        </div>
    </section>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\xampp8.2\htdocs\learning-management-emu\resources\views/frontend/notice.blade.php ENDPATH**/ ?>