<?php
include_once("class.Database.php");
class Cafeteria
{
	public $id_art;
    public $descr_art;
    public $precio_art;
    public $fk_id_suc;
    
    
  function __construct($id_usuario)
    {
        $usuario = Database::select("SELECT id_art, 
	descr_art, 
	precio_art, 
	fk_id_suc, 
	
	FROM articulo WHERE id_usuario = $id_usuario");
        $articulo = $articulo[0];
        $this->id_art = $usuario['id_art'];
        $this->descr_art = $usuario['descr_art'];
        $this->precio_art = $usuario['precio_art'];
        $this->fk_id_suc = $usuario['fk_id_suc'];
        
       

                  
        
       
    }


     public static function altaArticulo($descr,$precio,$usuarioAlta)
    
     
    {
		try{
		
        $query = "INSERT INTO `articulo` 
	(descr_art, 
	precio_art,  
	fk_id_suc,
	`usu_alta`, 
	`usu_fec`)
	VALUES
	('$descr', 
	 '$precio',1,'$usuarioAlta',now())";
        return Database::insert($query);
        }catch (Exception $e) {
              echo 'Excepción capturada: ',  $e->getMessage(), "\n";
            }
    }
    
        public static function altaVenta($idPer,$idArt,$cantidad,$total,$usuarioAlta)
    
     
    {
		try{
		
        $query = "INSERT INTO cafeteria
	(fk_id_per, 
	fk_id_art,  
	cantidad_art,
	total_art,
	usu_alta, 
	usu_fec)
	VALUES
	($idPer, 
	 $idArt,$cantidad,$total,'$usuarioAlta',now())";
        return Database::insert($query);
        }catch (Exception $e) {
              echo 'Excepción capturada: ',  $e->getMessage(), "\n";
            }
    }
    

    
     public static function buscarVenta($fecha,$fecha2)
    {
		
		try{
			$fecha = explode("/", $fecha, 3);

    $year1 = (string)$fecha[2];

    $month1 = (string)$fecha[1];

    $day1 = (string)$fecha[0];
    $fechab1=$year1.'-'.$month1.'-'.$day1;

    $fecha2 = explode("/", $fecha2, 3);

    $year2 = (string)$fecha2[2];

    $month2 = (string)$fecha2[1];

    $day2 = (string)$fecha2[0];
    $fechab2=$year2.'-'.$month2.'-'.$day2;
        $query = "SELECT descr_art, CONCAT( nombres, ' ', apellido_paterno, ' ', apellido_materno ) AS nombre, cafeteria.cantidad_art, cafeteria.total_art, DATE_FORMAT( cafeteria.usu_fec, '%d/%m/%Y' ) AS fecventa
FROM cafeteria
JOIN articulo ON id_art = fk_id_art
JOIN persona ON id_persona = fk_id_per
WHERE DATE_FORMAT(cafeteria.usu_fec,'%Y-%m-%d') >= '$fechab1'
AND DATE_FORMAT(cafeteria.usu_fec,'%Y-%m-%d') <= '$fechab2'";
        return Database::select($query);
        }catch (Exception $e) {
              echo 'Excepción capturada: ',  $e->getMessage(), "\n";
            }
    }
    
   
    
    public static function buscarEmpleado($busqueda)
    {
		try{
        $query = "SELECT id_usuario, 
	usu_nombre, 
	usu_ape_pat, 
	usu_ape_mat, 
	usu_usuario, 
	usu_password, 
	fk_id_rol, 
	usu_fec_nac, 
	DATE_FORMAT(usu_fec_ing,'%d/%m/%Y') as usu_fec_ing, 
	usu_slrio_drio, 
	usu_fk_id_empr, 
	usu_fk_id_suc, 
	usu_fk_id_dep, 
	usu_img
	  from usuario join rol on
	  fk_id_rol=id_rol
	  join empresa on usu_fk_id_empr=id_empresa
	  join sucursal on usu_fk_id_suc=id_suc
	  join departamento on usu_fk_id_dep=id_depto
	  where usu_nombre LIKE '$busqueda%'";
        return Database::select($query);
        }catch (Exception $e) {
              echo 'Excepción capturada: ',  $e->getMessage(), "\n";
            }
    }




  function asignarFoto($foto)
    {
        $query = "UPDATE usuario SET usu_img = '$foto' WHERE id_usuario = $this->id_usuario";
        return Database::update($query);
    }
    
    function eliminaUsuario()
    {
        $query = "delete from usuario WHERE id_usuario = $this->id_usuario";
        return Database::update($query);
    }
}
   
