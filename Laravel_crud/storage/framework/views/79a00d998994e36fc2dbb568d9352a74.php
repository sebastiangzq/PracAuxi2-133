<div class="row padding-1 p-1">
    <div class="col-md-12">
        
        <div class="form-group mb-2 mb20">
            <label for="ciudad" class="form-label"><?php echo e(__('Ciudad')); ?></label>
            <input type="text" name="ciudad" class="form-control <?php $__errorArgs = ['ciudad'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" value="<?php echo e(old('ciudad', $sucursal?->ciudad)); ?>" id="ciudad" placeholder="Ciudad">
            <?php echo $errors->first('ciudad', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>'); ?>

        </div>
        <div class="form-group mb-2 mb20">
            <label for="direccion_fisica" class="form-label"><?php echo e(__('Direccion Fisica')); ?></label>
            <input type="text" name="direccion_fisica" class="form-control <?php $__errorArgs = ['direccion_fisica'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" value="<?php echo e(old('direccion_fisica', $sucursal?->direccion_fisica)); ?>" id="direccion_fisica" placeholder="Direccion Fisica">
            <?php echo $errors->first('direccion_fisica', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>'); ?>

        </div>
        <div class="form-group mb-2 mb20">
            <label for="telefono_contacto" class="form-label"><?php echo e(__('Telefono Contacto')); ?></label>
            <input type="text" name="telefono_contacto" class="form-control <?php $__errorArgs = ['telefono_contacto'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" value="<?php echo e(old('telefono_contacto', $sucursal?->telefono_contacto)); ?>" id="telefono_contacto" placeholder="Telefono Contacto">
            <?php echo $errors->first('telefono_contacto', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>'); ?>

        </div>

    </div>
    <div class="col-md-12 mt20 mt-2">
        <button type="submit" class="btn btn-primary"><?php echo e(__('Submit')); ?></button>
    </div>
</div><?php /**PATH C:\xampp\htdocs\logistica-crud-laravel\resources\views/sucursal/form.blade.php ENDPATH**/ ?>