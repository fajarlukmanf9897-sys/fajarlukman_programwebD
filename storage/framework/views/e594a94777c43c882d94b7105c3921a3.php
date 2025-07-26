

<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5><?php echo e($message->subject); ?></h5>
                    <a href="<?php echo e(route('messages.index')); ?>" class="btn btn-sm btn-secondary">Kembali</a>
                </div>

                <div class="card-body">
                    <div class="mb-3">
                        <strong>Dari:</strong> <?php echo e($message->sender->name); ?> (<?php echo e($message->sender->email); ?>)<br>
                        <strong>Tanggal:</strong> <?php echo e($message->created_at->format('d/m/Y H:i:s')); ?>

                    </div>
                    
                    <hr>
                    
                    <div class="message-body">
                        <?php echo nl2br(e($message->body)); ?>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\message-app\resources\views/messages/show.blade.php ENDPATH**/ ?>