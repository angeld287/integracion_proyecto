<?php
 header("Access-Control-Allow-Origin: *");
 $con = mysqli_connect("localhost","root","","estudiantes_integracion") or die ("could not connect database");
 
 $db = new PDO('mysql:host=localhost;dbname=estudiantes_integracion;charset=utf8mb4', 'root', '');
 $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
 
     if(!mysql_connect('localhost','root',''))
    {
        echo "error: ".mysql_error();
        exit;
    }
    if(!mysql_select_db('estudiantes_integracion'))
    {
        echo "error: ".mysql_error();
        exit;
    }
?>