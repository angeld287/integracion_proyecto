<?php
include_once('db_estudiante.php');

if($_SERVER['REQUEST_METHOD'] == "POST"){
// Get data
$nombre = isset($_POST['nombre']) ? mysql_real_escape_string($_POST['nombre']) : "";
$apellido = isset($_POST['apellido']) ? mysql_real_escape_string($_POST['apellido']) : "";
$matricula = isset($_POST['matricula']) ? mysql_real_escape_string($_POST['matricula']) : "";
$correo = isset($_POST['correo']) ? mysql_real_escape_string($_POST['correo']) : "";
$telefono = isset($_POST['telefono']) ? mysql_real_escape_string($_POST['telefono']) : "";
$direccion = isset($_POST['direccion']) ? mysql_real_escape_string($_POST['direccion']) : "";
$carrera = isset($_POST['carrera']) ? mysql_real_escape_string($_POST['carrera']) : "";

// Insert data into data base
$sql = "INSERT INTO `estudiantes`(`nombre`, `apellido`, `matricula`, `correo`, `telefono`, `direccion`, `carrera`) VALUES ('$nombre','$apellido','$matricula','$correo','$telefono','$direccion','$carrera');";
$qur = mysqli_query($con,$sql);
if($qur){
$json = array("status" => 1, "msg" => "Done User added!");
}else{
$json = array("status" => 0, "msg" => "Error adding user!");
}
}else{
$json = array("status" => 0, "msg" => "Request method not accepted");
}

@mysql_close($con);

/* Output header */
header('Content-type: application/json');
echo json_encode($json);
?>