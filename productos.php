<?php include("template/header.php"); 
include("admin/seccion/bd.php");

$sentenciaSQL=$conexion->prepare("SELECT productos.nombre_productos, categoria.nombre AS nombre_categoria,productos.precio,productos.imagen FROM productos JOIN categoria ON productos.categoria_id=categoria.id");
$sentenciaSQL->execute();
$listaProductos=$sentenciaSQL->fetchAll(PDO::FETCH_ASSOC);

?>

<div class="contenedor">
    <div class="store-wrapper">
        <h1>Escoge un Producto</h1>
        
        <div class="category_list">
            <a href="" class="category_item" category="all">Todo</a>
            <a href="" class="category_item" category="cocina">Cocina</a>
            <a href="" class="category_item" category="dormitorio" >Dormitorio</a>
            <a href="" class="category_item" category="sala">Sala</a>
            <a href="" class="category_item" category="oficina">Oficina</a>
        </div>

        <section class="product_list">
            <?php foreach($listaProductos as $productos) {?>
            <div class="product_item" category="<?php echo $productos['nombre_categoria']?>">
                <a target="_blank" href="https://api.whatsapp.com/send?phone=51944460025">
                    <img class="img-producto" src="img/Productos/<?php echo $productos['imagen']?>" alt="">
                    <p class="nombre"><?php echo $productos['nombre_productos']?></p>
                </a>
                <div class="precio">S/ <?php echo $productos['precio']?></div>               
            </div>
            <?php } ?>       
            <!-- <div class="product_item" category="sala">
                <a target="_blank" href="https://api.whatsapp.com/send?phone=51944460025">
                    <img class="img-producto" src="img/Productos/porta tv 1.20.jpg" alt="">
                    <p class="nombre">Porta tv 1.20</p>
                </a>
                <div class="precio">S/ 2,000.00</div>
            </div>

            <div class="product_item" category="dormitorio">
                <a target="_blank" href="https://api.whatsapp.com/send?phone=51944460025">
                    <img class="img-producto" src="img/Productos/velador.jpg" alt="">
                    <p class="nombre">Porta tv 1.20</p>
                </a>
                <div class="precio">S/ 700.00</div>
            </div>

            <div class="product_item" category="cocina">
                <a target="_blank" href="https://api.whatsapp.com/send?phone=51944460025">
                    <img class="img-producto" src="img/Productos/repostero 1.00.jpg" alt="">
                    <p class="nombre">Porta tv 1.20</p>
                </a>
                <div class="precio">S/ 1,500.00</div>
            </div>

            <div class="product_item" category="cocina">
                <a target="_blank" href="https://api.whatsapp.com/send?phone=51944460025">
                    <img class="img-producto" src="img/Productos/repostero 1.00.jpg" alt="">
                    <p class="nombre">Porta tv 1.20</p>
                </a>
                <div class="precio">S/ 1,500.00</div>
            </div>

            <div class="product_item" category="oficina">
                <a target="_blank" href="https://api.whatsapp.com/send?phone=51944460025">
                    <img class="img-producto" src="img/Productos/estante 1.00.jpg" alt="">   
                    <p class="nombre">Porta tv 1.20</p>
                </a>
                <div class="precio">S/ 1,000.00</div>
            </div>

            <div class="product_item" category="oficina">
                <a target="_blank" href="https://api.whatsapp.com/send?phone=51944460025">
                    <img class="img-producto" src="img/Productos/estante 1.00.jpg" alt="">   
                    <p class="nombre">Porta tv 1.20</p>
                </a>
                <div class="precio">S/ 1,000.00</div>
            </div>

            <div class="product_item" category="oficina">
                <a target="_blank" href="https://api.whatsapp.com/send?phone=51944460025">
                    <img class="img-producto" src="img/Productos/estante 1.00.jpg" alt="">   
                    <p class="nombre">Porta tv 1.20</p>
                </a>
                <div class="precio">S/ 1,000.00</div>
            </div> -->
        </section>
    </div>
</div>



<?php include("template/footer.php") ?>
