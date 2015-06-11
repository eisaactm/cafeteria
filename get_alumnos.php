<?php
include_once("class_lib2.php");
include_once("validar_admin.php");
//$q = strtoupper($_GET["q"]);
//$c =$_SESSION['cancha_id'];
$q =$_GET["q"];
$q = str_replace("'"," ",$q);
 	mysql_connect("localhost","prevenla_meze","Locas123!") or die('Error de conexion al Servidor: ' . mysql_error());
	mysql_select_db("prevenla_meze") or die('Error de conexion con la BD: ' . mysql_error());

        
$sql = "select id_persona,CONCAT(nombres, ' ', apellido_paterno, ' ', apellido_materno ) AS nombre 
	from persona where nombres LIKE '%$q%' or apellido_paterno like '%$q%' or apellido_materno like '%$q%'";

$rsd = mysql_query($sql);
while($rs = mysql_fetch_array($rsd)) {
 //= mysql_query($sql);
	$cname = $rs['nombre'];
	$idPer = $rs['id_persona'];
	//$cname = $rs['codigo_artn'];
	echo "$cname|$idPer\n";
}

