<?php
session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Validacion</title>
</head>

<body>
<?php
//include_once("class_lib2.php");
include_once("../includes/clases/class_lib.php");
if(isset($_POST['usuario']) && isset ($_POST['password']))
{

                  $usuario=$_POST['usuario'];
                  $password=$_POST['password'];
        	 
        	  $valida = Persona::login($usuario, $password);
		  
		  
}

   if($valida->matricula == 'ADM15003' && $valida->password == 'uigf337a')
   {
   
       
         $_SESSION['usuario']='ADM15003';
        // $_SESSION['contrasena']=$password;
         $_SESSION['tipo'] =$valida->tipo_persona;

               
 header('Location: indxCafeteria.php');



  }    
else
{

session_destroy();
echo '<script>  
	alert("Nombre de usuario o password incorrecto, verifique por favor...");
  document.location="index.php";
	</script>';
}


?>

  
</body>
</html>



