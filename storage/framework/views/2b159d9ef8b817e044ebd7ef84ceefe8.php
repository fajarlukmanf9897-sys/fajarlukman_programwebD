

<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h4>Kotak Pesan</h4>
                    <a href="<?php echo e(route('messages.create')); ?>" class="btn btn-primary">Buat Pesan Baru</a>
                </div>

                <div class="card-body">
                    <?php if(session('success')): ?>
                        <div class="alert alert-success"><?php echo e(session('success')); ?></div>
                    <?php endif; ?>

                    <?php if($messages->count() > 0): ?>
                        <?php $__currentLoopData = $messages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $message): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="card mb-3 <?php echo e($message->is_read ? '' : 'border-primary'); ?>">
                                <div class="card-body">
                                    <div class="d-flex justify-content-between">
                                        <h6 class="card-title">
                                            <?php echo e($message->subject); ?>

                                            <?php if(!$message->is_read): ?>
                                                <span class="badge bg-primary">Baru</span>
                                            <?php endif; ?>
                                        </h6>
                                        <small class="text-muted"><?php echo e($message->created_at->format('d/m/Y H:i')); ?></small>
                                    </div>
                                    <p class="card-text">
                                        <strong>Dari:</strong> <?php echo e($message->sender->name); ?><br>
                                        <?php echo e(Str::limit($message->body, 100)); ?>

                                    </p>
                                    <div class="d-flex justify-content-end">
                                        <a href="<?php echo e(route('messages.show', $message)); ?>" class="btn btn-sm btn-outline-primary me-2">Baca</a>
                                        <!--- TODO:: BUATLAH TOMBOL DELETE DISINI -->
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        
                        <?php echo e($messages->links()); ?>

                    <?php else: ?>
                        <p class="text-center">Belum ada pesan.</p>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\message-app\resources\views/messages/index.blade.php ENDPATH**/ ?>