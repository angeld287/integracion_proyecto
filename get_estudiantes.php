<?php
include "db_estudiante.php";
$data=array();
$q=mysqli_query($con,"SELECT e.id, e.nombre as nombre, apellido, matricula, telefono, direccion, c.nombre as carrera FROM estudiantes e LEFT OUTER JOIN carrera c on c.id = e.carrera");
while ($row=mysqli_fetch_object($q)){
 $data[]=$row;
}
echo json_encode($data);
?>