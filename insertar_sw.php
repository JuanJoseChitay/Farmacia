<?php

//variable de conexion a la BD
/*$servidor_local="localhost";//hostname//localhost ->donde va estar ubicado la informacion en este caso esta en el localhost
$db ="farmacia_bd";
$user = "root";
$pass = "";*/

define("__HOST__","localhost");
define("__USER__","root");
define("__PASS__","");
define("__DB__","farmacia_bd");




//contrendra informacion que sera traslada pro medio de un arrraty un 
$jsonArray = array();
//isset este 
if(isset($_GET["nombre_medicamento"]) 
&& isset($_GET["cantidad"]) 
&& isset($_GET["precio"])
&& isset($_GET["fecha_vencimiento"])){

$nombre_medicamento = $_GET['nombre_medicamento'];
$cantidad = $_GET['cantidad'];
$precio = $_GET['precio'];
$fecha_vencimiento= $_GET['fecha_vencimiento'];


$conexion = mysqli_connect(__HOST__,__USER__,__PASS__,__DB__);

$insertar = "INSERT INTO tbl_medicamento (nombre_medicamento, cantidad, precio, fecha_vencimiento) 
VALUES ('{$nombre_medicamento}', {$cantidad}, {$precio}, '{$fecha_vencimiento}')";

//$resultante_insertar = mysqli_quary($conexion,$insertar);
$resultado_insertar = mysqli_query($conexion,$insertar) or die('Error'.mysqli_error($conexion));

//$JsonArray = Array('data' => $insertar);

$jsonArray["tbl_medicamento"]= $resultado_insertar;
mysqli_close($conexion);
//echo json_encode($jsonArray);
//echo ;// obtiene un array y lo transmformar la infromacion que viaja es de tipo JSON
echo json_encode($jsonArray);
}

else{ 
    $resultante["nombre_medicamento"] ="ERROR";
    $resultante["precio"] ="ERROR";
    $resultante["cantidad"] ="ERROR";
    $resultante["fecha_vencimiento"] ="ERROR";
   $jsonArray["tbl_medicamento"][] =$resultante;
    echo json_encode($jsonArray);

}



/*
$id=;
$nombre_medicamento;
$cantidad =;
$precio=;
$fecha_nacimiento;

*/










?>