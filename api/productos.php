<?php

$host="localhost";
$bd="sitio";
$usuario="root";
$contrasenia="";

try {
    $conexion=new PDO("mysql:host=$host;dbname=$bd",$usuario,$contrasenia); //PDO realiza una conexion con la base de datos
    
} catch (Exception $ex) {
    echo $ex->getMessage(); //getMessage sirve para mostrar el mensaje de error que se produjo
}


$data = json_decode(file_get_contents("php://input"), true);
//parse_str($decoded_input, $putdata);

//header('Content-type: application/json');
//echo json_encode( $decoded_input );
//print_r($data);
//print_r($_SERVER);

switch ($_SERVER["REQUEST_METHOD"]) {
    case 'GET':
        $productosDb=$conexion->query("select * from productos");
        //echo json_encode($productos);
        //var_dump($productos);//Devaguea la variable, mostrara informacion de la variable.
        $productos=[];
        foreach ($productosDb as $row) {
            $productos[]=$row;
        }
        header('Content-type: application/json');
        echo json_encode($productos);
        break;

    case 'POST':
        $nombre=$data['nombre'];
        $precio=$data['precio'];
        $category=$data['category'];
        $imagen=$data['imagen'];
        
        //$sentenciaSQL=$conexion->prepare("INSERT INTO libros (Nombre, Imagen) VALUES ($nombre, $imagen)"); 
        //$sentenciaSQL->execute();

        $stmt= $conexion->prepare("INSERT INTO productos ( Nombre, precio, category, Imagen) VALUES (?,?,?,?)");
        $stmt->execute([$nombre, $precio, $category, $imagen]);
        
        header('Content-type: application/json');
        echo json_encode( ["Mensaje"=>"Insertado correctamente"] );
        break;
    case 'PUT':
        # code...
        break;

    
    default:
        header('Content-type: application/json');
        echo json_encode( ["Mensaje"=>"Accion invalida"] );
        break;
}

?>