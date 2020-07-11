<?php

//Constantes para la conexión
define("HOST", "localhost");
define("USER", "root");
define("PASS", "");
define("BD", "farmacia_bd");

$jsonArray = array();

if(isset($_GET["nombre_medicamento"])){

    $nombre_medicamento = $_GET["nombre_medicamento"];

    $conexion = mysqli_connect(HOST, USER, PASS, BD);

    $consulta_select = "SELECT nombre_medicamento, cantidad, precio, fecha_vencimiento
    FROM tbl_medicamento WHERE nombre_medicamento LIKE '%$nombre_medicamento%'";

    $resultado_select = mysqli_query($conexion, $consulta_select) or die ("ERROR".mysqli_error($conexion));

    if($resultado_select == true){
        $registro = mysqli_fetch_array($resultado_select);
        $jsonArray["tbl_medicamento"][] = $registro;
        echo json_encode($jsonArray);
        mysqli_close($conexion);
    }else{

        $resultante["id"] = "ERROR";
        $resultante["nombre_medicamento"] = "ERROR";
        $resultante["cantidad"] = "ERROR";
        $resultante["precio"] = "ERROR";
        $resultante["fecha_vencimiento"] = "ERROR";
        $jsonArray["tbl_medicamento"][] = $resultante;
        echo json_encode($jsonArray);

    }

}else{

}

?>