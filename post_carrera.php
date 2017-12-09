<?php
include_once('db_estudiante.php');

if($_SERVER['REQUEST_METHOD'] == "POST"){
// Get data
$nombre = isset($_POST['nombre']) ? mysql_real_escape_string($_POST['nombre']) : "dd";

// Insert data into data base
$sql = "INSERT INTO `carrera`(`nombre`) VALUES ('$nombre');";
$qur = mysqli_query($con,$sql);
if($qur){
$json = array("status" => 1, "msg" => "Done Carrera added!");
}else{
$json = array("status" => 0, "msg" => "Error adding Carrera!");
}
}else{
$json = array("status" => 0, "msg" => "Request method not accepted");
}

@mysql_close($con);

/* Output header */
header('Content-type: application/json');
echo json_encode($json);
?>