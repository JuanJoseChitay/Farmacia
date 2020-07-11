<?php

//Constantes de conexión a la base de datos

define("HOST", "localhost");
define("USER", "root");
define("PASS", "");
define("DB", "farmacia_bd");

//Contendra información que sera trasladada por medio de un array a un JSON
$jsonArray = array();

//isset este comprueba si una variable esta definida
if(isset($_GET["id"])){

    $id = $_GET["id"];

$conexion = mysqli_connect(HOST, USER, PASS, DB);

$select = "SELECT nombre_medicamento, cantidad, precio, fecha_vencimiento FROM tbl_medicamento WHERE id = $id";
$resultado_select = mysqli_query($conexion, $select) or die ("ERROR ".mysqli_error($conexion));

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
    $jsonArray["tbl_medicamento"][]=$resultante;
    echo json_encode($jsonArray);

}

}

?>