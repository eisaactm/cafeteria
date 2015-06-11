<?php
include_once("../includes/clases/class_lib.php");
include_once("class.Cafeteria.php");
//include_once("class_lib2.php");
include_once("validar_admin.php");
extract($_POST);



    //$retl=Maestro::agregar($su);
    switch($tipoInsert)
    {
    case 'articulo':
		Cafeteria::altaArticulo($descr_art,$precio,$_SESSION['usuario']);
		echo 0;
    break;
    case 'cafeteria':
		Cafeteria::altaVenta($alu,$art,$cant,$cant*$precio,$_SESSION['usuario']);
		echo 0;
	
    

    }
    

?>
