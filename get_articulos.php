<?php
include_once("class_lib2.php");
include_once("validar_admin.php");
//$q = strtoupper($_GET["q"]);
//$c =$_SESSION['cancha_id'];
$q =$_GET["q"];
$q = str_replace("'"," ",$q);
 	mysql_connect("localhost","prevenla_meze","Locas123!") or die('Error de conexion al Servidor: ' . mysql_error());
	mysql_select_db("prevenla_meze") or die('Error de conexion con la BD: ' . mysql_error());

        
$sql = "select id_art,descr_art,precio_art, 
	cantidad_art,img_art from articulo where descr_art LIKE '%$q%'";

$rsd = mysql_query($sql);
while($rs = mysql_fetch_array($rsd)) {
 //= mysql_query($sql);
	$cname = $rs['descr_art'];
	//$cname = $rs['codigo_artn'];
	$artPrecio = $rs['precio_art'];
	$artImg = $rs['img_art'];
	$artId = $rs['id_art'];
	$cantArt = $rs['cantidad_art'];
	echo "$cname|$artPrecio|$artId\n";
}
