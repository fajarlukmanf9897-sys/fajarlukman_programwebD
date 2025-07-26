<!doctype html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <title><?php echo e(config('app.name', 'Laravel')); ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-dark bg-primary shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="<?php echo e(url('/')); ?>">
                    <?php echo e(config('app.name', 'Laravel')); ?>

                </a>
                
                <div class="navbar-nav ms-auto">
                    <?php if(auth()->guard()->guest()): ?>
                        <?php if(Route::has('login')): ?>
                            <a class="nav-link" href="<?php echo e(route('login')); ?>">Login</a>
                        <?php endif; ?>
                        <?php if(Route::has('register')): ?>
                            <a class="nav-link" href="<?php echo e(route('register')); ?>">Register</a>
                        <?php endif; ?>
                    <?php else: ?>
                        <a class="nav-link" href="<?php echo e(route('messages.index')); ?>">Kotak Pesan</a>
                        <a class="nav-link" href="<?php echo e(route('messages.create')); ?>">Buat Pesan</a>
                        <a class="nav-link" href="<?php echo e(route('logout')); ?>"
                           onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            Logout (<?php echo e(Auth::user()->name); ?>)
                        </a>
                        <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" class="d-none">
                            <?php echo csrf_field(); ?>
                        </form>
                    <?php endif; ?>
                </div>
            </div>
        </nav>

        <main class="py-4">
            <?php echo $__env->yieldContent('content'); ?>
        </main>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html><?php /**PATH C:\xampp\htdocs\message-app\resources\views/layouts/app.blade.php ENDPATH**/ ?>