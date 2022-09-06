<?php 
include("../template/header.php");
include("bd.php"); //Conexion a la base de datos 

/*crear 2 archivos para producto y categoria, 
En producto crear el listado de producto y crear el formulario 
para crear un nuevo Producto, en el formulario producto habra un 
input de nombre precio imagen, select de categoria*/

$nombre=(isset($_POST['txtNombre']))?$_POST['txtNombre']:"";
$precio=(isset($_POST['txtPrecio']))?$_POST['txtPrecio']:"";
$categoria=(isset($_POST['txtCategoria']))?$_POST['txtCategoria']:"";
$imagen=(isset($_FILES['txtImagen']['name']))?$_FILES['txtImagen']['name']:"";

    $sentenciaSQL=$conexion->prepare("INSERT INTO productos (nombre, precio, categoria_id, imagen) 
    VALUES (:nombre, :precio, :categoria, :imagen);");
    $sentenciaSQL->bindParam('nombre',$nombre);
    $sentenciaSQL->bindParam('precio',$precio);
    $sentenciaSQL->bindParam('categoria',$categoria);
    $sentenciaSQL->bindParam('imagen',$imagen);
    $sentenciaSQL->execute();

$sentenciaSQL2=$conexion->prepare("SELECT * FROM categoria");
$sentenciaSQL2->execute();
$listaCategorias=$sentenciaSQL2->fetchAll(PDO::FETCH_ASSOC); 

?>
    <div class="container">
        <h1>Ingrese Un Nuevo Producto</h1>
        <div class="formulario">
            <form method="post" enctype="multipart/form-data">  

                <div class="form-group">
                    <label for="txtNombre">Nombre del Producto:</label>
                    <input type="text" class="form-control" name="txtNombre" id="txtNombre" 
                    placeholder="Ingrese Nombre">
                </div>

                <div class="form-group">
                    <label for="txtPrecio">Precio del Producto:</label>
                    <input type="number" class="form-control" name="txtPrecio" id="txtPrecio"
                    placeholder="Ingrese Precio">
                </div>

                <div class="form-group">
                    <label for="txtCategoria">Categoria</label> 
                    <select class="form-control" name="txtCategoria" id="txtCategoria" >
                        <?php foreach ($listaCategorias as $categorias) {?>
                        <option value="<?php echo $categorias['id']; ?>">
                            <?php echo $categorias['nombre'];?>
                        </option>
                        <?php }?>
                    </select>
                </div>

                <div class="form-group">
                    <label for="txtNombre">Imagen del Producto:</label>
                    <input type="file" class="form-control" name="txtImagen" id="txtImagen" 
                    placeholder="Ingrese Imagen">
                </div>
                        
                <div class="btn-group" role="group" aria-label="">
                    <button type="submit" name="accion" value="Agregar" class="btn btn-success">Agregar</button>
                </div>
            </form>
        </div>       
    </div>

<?php include("../template/footer.php"); ?>