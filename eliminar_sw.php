<?php

define("HOST", "localhost");
define("USER", "root");
define("PASS", "");
define("BD", "farmacia_bd");

$jsonArray = array();

if(isset($_GET["id"])){
    $id = $_GET["id"];

    $conexion = mysqli_connect(HOST, USER, PASS, BD);

    $eliminar = "DELETE FROM tbl_medicamento WHERE id = $id";
    $resultado_eliminar = mysqli_query($conexion, $eliminar) or die ('Error '.mysqli_error($conexion));

    $jsonArray["tbl_medicamento"][] = $resultado_eliminar;

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
?>