<?php
include "db_estudiante.php";
if($_SERVER['REQUEST_METHOD'] == "POST"){

    $matricula = isset($_POST['matricula']) ? mysql_real_escape_string($_POST['matricula']) : "";
    $periodo = isset($_POST['periodo']) ? mysql_real_escape_string($_POST['periodo']) : "";

    $sql = "SELECT e.`nombre`, m.`m_descripcion`, p.`p_primer_nombre`, p.`p_primer_apellido`, h.periodo FROM  calificaciones.`tb_historial_academico` h 
            left outer join profesores.`tb_profesor` p ON p.`p_id` = h.`ha_codigo_profesor`
            left outer join estudiantes_integracion.`estudiantes` e ON e.`id` = h.`ha_codigo_estudiante`
            left outer join calificaciones.`tb_materia` m ON m.`m_id` = h.`ha_codigo_materia`
            where e.matricula = '$matricula' and h.periodo = '$periodo'";

    $qur = mysqli_query($con,$sql);
    if($qur){
            while ($row=mysqli_fetch_object($qur)){
                $data[]=$row;
            }
    }else{
        $data = array("status" => 0, "msg" => "Error adding user!");
    }

}else{
    $data = array("status" => 0, "msg" => "Request method not accepted");
}

@mysql_close($con);

/* Output header */
header('Content-type: application/json');
echo json_encode($data);
?>