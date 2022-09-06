<?php 
include("template/header.php");
include("seccion/bd.php");

$nombre=(isset($_POST['txtNombre']))?$_POST['txtNombre']:"";
$precio=(isset($_POST['txtPrecio']))?$_POST['txtPrecio']:"";
$categoria=(isset($_POST['txtCategoria']))?$_POST['txtCategoria']:"";
$imagen=(isset($_FILES['txtImagen']['name']))?$_FILES['txtImagen']['name']:"";

$sentenciaSQL=$conexion->prepare("SELECT productos.nombre_productos, categoria.nombre AS nombre_categoria,productos.precio,productos.imagen FROM productos JOIN categoria ON productos.categoria_id=categoria.id");
$sentenciaSQL->execute();
$listaProductos=$sentenciaSQL->fetchAll(PDO::FETCH_ASSOC);

?>

<h2> Productos Ingresados </h2>    
    <div class="container-table">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Precio</th>
                    <th>Categoria</th>
                    <th>Imagen</th>
                    <th>Acciones</th>
                </tr>
            </thead> 
            <tbody>
                <?php foreach($listaProductos as $productos) {?>
                <tr> 
                    <td><?php echo $productos['nombre_productos']?></td>
                    <td><?php echo $productos['precio']?></td>
                    <td><?php echo $productos['nombre_categoria']?></td>
                    <td><?php echo $productos['imagen']?></td>
                    <td>Seleccionar | Borrar</td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>

<?php include("template/footer.php"); ?>