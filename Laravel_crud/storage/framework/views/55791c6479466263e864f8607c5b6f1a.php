<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo $__env->yieldContent('template_title', 'Laravel'); ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-CmKgQXy3EAf8lu2b0OizQdrIC3Y4/6n0a2gV/taqS4zE57s7UON0o0Vr5G+FVG9E" crossorigin="anonymous">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-white border-bottom shadow-sm mb-4">
        <div class="container">
            <h2>Logistica de sucursales</h2>
        </div>
    </nav>

    <main class="container mt-4">
        <?php echo $__env->yieldContent('content'); ?>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjsdH8shV1jr9B05XY1Iwd20OJ3pru6j8z5PL6j4m5f3Je+8wE" crossorigin="anonymous"></script>
</body>
</html>
<?php /**PATH C:\xampp\htdocs\logistica-crud-laravel\resources\views/layouts/app.blade.php ENDPATH**/ ?>