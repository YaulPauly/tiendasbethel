<!doctype html>
<html lang="en">
    <head>
        <title>Admin</title>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link rel="stylesheet" href="css/styles.css">
        <link rel="stylesheet" href="../css/categorias.css">
    </head>

  <body>

        <?php $url="http://".$_SERVER['HTTP_HOST']."/tiendasBethel" ?>

        <nav class="navbar navbar-expand navbar-light bg-light">
            <div class="nav navbar-nav">
                <a class="nav-item nav-link" href="<?php echo $url?>/admin/index.php">Inicio</a>
                <a class="nav-item nav-link" href="<?php echo $url?>/admin/seccion/productos.php">Productos</a>
                <a class="nav-item nav-link" href="<?php echo $url?>/admin/seccion/categorias.php">Categorias</a>
                <a class="nav-item nav-link" target="_blank" href="<?php echo $url; ?>">Ver Sitio web</a>
            </div>
        </nav>







