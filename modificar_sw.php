<?php

//Constantes de conexión a la base de datos
define("HOST", "localhost");
define("USER", "root");
define("PASS", "");
define("DB", "farmacia_bd");

//Contendra información que sera trasladada por medio de un array a un JSON
$jsonArray = array();

//isset este comprueba si una variable esta definida
if(isset($_GET["nombre_medicamento"]) && isset($_GET["cantidad"])
&& isset($_GET["precio"]) && isset($_GET["fecha_vencimiento"]) 
&& isset($_GET["id"])){ 

    $nombre_medicamento = $_GET["nombre_medicamento"];
    $cantidad = $_GET["cantidad"];
    $precio = $_GET["precio"];
    $fecha_vencimiento = $_GET["fecha_vencimiento"];
    $fechaN = strtotime($fecha_vencimiento);
    $fechaN = date('Y/m/d', $fechaN);
    $id = $_GET["id"];

    $conexion = mysqli_connect(HOST, USER, PASS, DB);

    $modificar = "UPDATE tbl_medicamento SET nombre_medicamento = '$nombre_medicamento', 
    cantidad = $cantidad, precio = $precio, fecha_vencimiento = '$fechaN'  WHERE id = $id";

    $resultado_modificar = mysqli_query($conexion, $modificar) or die ('Error '.mysqli_error($conexion));

    $jsonArray["tbl_medicamento"] = $resultado_modificar;

    mysqli_close($conexion);

    echo json_encode($jsonArray);

}else{
    
    $resultante["id"] = "ERROR";
    $resultante["nombre_medicamento"] = "ERROR";
    $resultante["cantidad"] = "ERROR";
    $resultante["precio"] = "ERROR";
    $resultante["fecha_vencimiento"] = "ERROR";
    $jsonArray["tbl_medicamento"][]=$resultante;
    echo json_encode($jsonArray);
}

?>