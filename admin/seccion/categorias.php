<?php 
include("../template/header.php"); 
include("bd.php"); //Conexion a la base de datos 


$id=(isset($_POST['categoriaID']))?$_POST['categoriaID']:"";
$nombre2=(isset($_POST['nombreCategoria']))?$_POST['nombreCategoria']:"";

    $sentenciaSQL2=$conexion->prepare("INSERT INTO categoria (id, nombre) VALUES (:id, :nombre);");
    $sentenciaSQL2->bindParam('id',$id);
    $sentenciaSQL2->bindParam('nombre',$nombre2);
    $sentenciaSQL2->execute();

$sentenciaSQL2=$conexion->prepare("SELECT * FROM categoria");
$sentenciaSQL2->execute();
$listaCategorias=$sentenciaSQL2->fetchAll(PDO::FETCH_ASSOC); // el metodo fetchAll recupera todos los registros para poder mostrarlos en la variable listaCategorias
//Esto puede realizarlo con el PDO::FETCH_ASSOC ya que genera una asociacion con los datos que vienen de la tabla y los nuevos registros(para que se mantenga actualizado)

?>



    <div class="container">
        <h1>Ingrese Una Nueva Categoria</h1>
        <div class="formulario">
            <form  method="post" enctype="multipart/form-data">  

                <div class = "form-group">
                    <label for="categoriaID">ID</label>
                    <input type="number" class="form-control" name="categoriaID" id="categoriaID"  placeholder="Id">
                </div>
                <div class="form-group">
                    <label for="nombreCategoria">Categoria:</label>
                    <input type="text" class="form-control" name="nombreCategoria" id="nombreCategoria" placeholder="Categoria">
                </div>
                       
                <div class="btn-group" role="group" aria-label="">
                    <button type="submit" name="accion" value="Agregar" class="btn btn-success">Agregar</button>
                </div>
            </form>
        </div>       
    
        <h2> Categorias Ingresadas </h2>    
        <div class="container-table">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Acciones</th>
                    </tr>
                </thead> 
                <tbody>
                    <?php foreach($listaCategorias as $categorias) {?>
                    <tr> 
                        <td><?php echo $categorias['id']?></td>
                        <td><?php echo $categorias['nombre']?></td>
                        <td>Seleccionar | Borrar</td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>

<?php include("../template/footer.php"); ?>