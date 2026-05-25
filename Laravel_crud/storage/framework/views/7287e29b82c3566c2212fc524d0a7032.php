<?php $__env->startSection('template_title'); ?>
    Sucursals
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="row justify-content-center">
        <div class="col-12">
            <div class="card shadow-sm border-0">
                <div class="card-header bg-white d-flex align-items-center justify-content-between">
                    <a href="<?php echo e(route('sucursals.create')); ?>" class="btn btn-primary">
                        Crear nueva sucursal
                    </a>
                </div>

                <div class="card-body">
                    <?php if($message = Session::get('success')): ?>
                        <div class="alert alert-success">
                            <?php echo e($message); ?>

                        </div>
                    <?php endif; ?>

                    <div class="table-responsive">
                        <table class="table" border="3">
                            <thead class="table-light">
                                <tr>
                                    <th style="width: 60px;"></th>
                                    <th>Ciudad</th>
                                    <th>Dirección física</th>
                                    <th>Teléfono de Contacto</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__empty_1 = true; $__currentLoopData = $sucursals; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sucursal): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                    <tr>
                                        <td><?php echo e(++$i); ?></td>
                                        <td><?php echo e($sucursal->ciudad); ?></td>
                                        <td><?php echo e($sucursal->direccion_fisica); ?></td>
                                        <td><?php echo e($sucursal->telefono_contacto); ?></td>
                                        <td class="text-center">
                                            <div class="btn-group" role="group" aria-label="Acciones">
                                                <a href="<?php echo e(route('sucursals.edit', $sucursal->id)); ?>" class="btn btn-primary">Editar</a>
                                                <form action="<?php echo e(route('sucursals.destroy', $sucursal->id)); ?>" method="POST" class="d-inline">
                                                    <?php echo csrf_field(); ?>
                                                    <?php echo method_field('DELETE'); ?>
                                                    <button type="submit" class="btn btn-sm btn-outline-danger" onclick="return confirm('¿Estás seguro de eliminar esta sucursal?')">Eliminar</button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                    <tr>
                                        <td colspan="5" class="text-center py-4">No hay sucursales registradas.</td>
                                    </tr>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="card-footer bg-white border-0">
                    <?php echo $sucursals->withQueryString()->links(); ?>

                </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\logistica-crud-laravel\resources\views/sucursal/index.blade.php ENDPATH**/ ?>