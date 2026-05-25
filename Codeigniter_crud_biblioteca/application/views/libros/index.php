<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Libros</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
</head>
<body>
    <h2>Lista de libros</h2>
    <a href="<?= site_url('libros/crear') ?>">+ Nuevo Libro</a>
    <table border = 6 class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Titulo</th>
                <th>Autor</th>
                <th>ISBN</th>
                <th>Estado_prestamo</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($libros as $p): ?>
                <tr>
                    <td><?= $p['id'] ?></td>
                    <td><?= $p['titulo'] ?></td>
                    <td><?= $p['autor'] ?></td>
                    <td><?= $p['isbn'] ?></td>
                    <td><?= $p['estado_prestamo'] ?></td>
                    <td>
                        <a href="<?= site_url('libros/editar/' . $p['id']) ?>" class="btn btn-warning">Editar</a>
                        <a href="<?= site_url('libros/eliminar/' . $p['id']) ?>" class="btn btn-danger">Eliminar</a>
                    </td>
                </tr>
            <?php endforeach ?>
        </tbody>
    </table>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</body>
</html>