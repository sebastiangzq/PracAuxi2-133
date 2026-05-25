<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Libro - Form</title>
</head>
<body>
    <h2><?= isset($libro) ? 'Editar' : 'Nuevo'?> Libro</h2>
    <?php 
        $accion = isset($libro)
            ? site_url('libros/actualizar/'.$libro['id'])
            : site_url('libros/guardar');
    ?>

    <?= form_open($accion) ?>
    <div>
        <?php if (isset($libro)): ?>
            <label for="">Id</label>
            <input type="hidden" name="id" value="<?= $libro['id'] ?>">
            <span><?= $libro['id'] ?></span> <br>
        <?php endif; ?>

        <label for="">Titulo</label>
            <input type="text" name="titulo"
                value="<?= isset($libro) ? $libro['titulo']: set_value('titulo')?>" required> <br>
        
        <label for="">Autor</label>
            <input type="text" name="autor"
                value="<?= isset($libro) ? $libro['autor']: set_value('autor')?>" required> <br>
        
        <label for="">Isbn</label>
            <input type="number" name="isbn"
                value="<?= isset($libro) ? $libro['isbn']: set_value('isbn')?>" required> <br>

        <label for="">Estado_prestamo</label>
            <input type="text" name="estado_prestamo"
                value="<?= isset($libro) ? $libro['estado_prestamo']: set_value('estado_prestamo')?>" required> <br>
        
        <button type="submit">Guardar</button>

    </div>
    <?= form_close() ?>
</body>
</html>