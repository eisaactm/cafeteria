<?php
include_once("class_lib2.php");
include_once("validar_admin.php");
//include_once("../includes/clases/class_lib.php");
?>
<html>
    <head>
    <meta charset="utf-8"/>
<meta name="viewport" content="width = device-width, initial-scale=1, maximum-scale=1"/>
        <title></title>
         <link rel="stylesheet" href="css/estilos.css"/>
             <link rel="stylesheet" href="//code.jquery.com/ui/1.11.3/themes/smoothness/jquery-ui.css">

<script src="../ajax/ajax_meze.js"></script>
        <script language="javascript">

          function recargar2()
        {

            alert("Sus datos se han actualizado correctamente");
            location.href="listajug.php";

        }


          function cursor()
        {

            document.frmMaestro.usr_nombres.focus();

        }


            function regresar()
            {

                  window.close();
         
            }
            function cerrar()
            {
                window.opener.location.reload();
                window.close();
            }
            
          
             function redirect(id)
          {
            document.location.href="listado_jugador.php?id="+ id +"";	
          }
          function ventana2(archivo){
coordx= screen.width ? (screen.width-550)/2 : 0;
coordy= screen.height ? (screen.height-200)/2 : 0;
coordy-=230;
window.open(archivo,'popup','width=550,height=200,top='+coordy+',left='+coordx);
} 
          </script>

                        
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>
        <script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>
        <script src="//ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script>



<script src="jquery.ui.datepicker-es.js"></script>

    

  
        




    <script type="text/javascript">
        $(document).ready(function(){
            setTimeout(function(){ $(".mensajes").fadeOut(300);}, 3000);  
        });
</script>

 <script>
        $(document).ready(function ()
            {
                asignarReglasValidacion();
              // $("#frmAdeudo").tabs();
            });

            function asignarReglasValidacion()
            {
                $('#frmInfo').validate({
                    rules:
                    {
                        "art_descr": { required: true },
                        "art_precio": { required: true }
                    

                                 },
                messages: {
                  art_descr: " **",
                  art_precio:" **"
         
               
                }
                })
            }
            
              function cargaComboSuc()
            {
               cmbSucursalDep();
            }

            function submitClicked()
            {
                if($("#frmInfo").valid())
                {
                    if(confirm("¿Desea agregar el departamento?"))
                    {
                      //  $("#boton_aceptar").attr('disabled', 'disabled');
                        /** Datos */
                     
                       var descr    = $("#art_descr").val();
                       var precio    = $("#art_precio").val();

                        $.ajax({
                            type: "POST",
                            url: "insert.php",
                            data: "fkSucursal="+sucursal+"&deptoNombre="+depto+"&tipoInsert=departamento",
                            success: function (data)
                            {
								
								if(data == 0)
                                {
                                    alert("Departamento Agregado");
                                             window.opener.location.reload();
                                             window.close();
                                }
                            }
                        });
                    }
                }
            }
        </script>
     
            
                    


    



 <script>
$(function() {
$( "#tabs" ).tabs();
});

</script>


    </head>
    
    <body onload="cursor();">
       <section id="contenedor">

 <br><center><h2>CAFETERIA</h2><img src="css/meze.png" height="180" width="140"><br><br>
  
 <section id="websites">

			<article>
				<a href="alta_articulos.php"><img src="images/articulos.png" height="110" width="110"/></a>
			<p>Articulos</p>
			</article>
			<article>
				<a href="alta_ventas.php"><img src="images/ventas.png" height="110" width="110"/></a>
			<p>Ventas</p>
			</article>
			
				<article>
				<a href="buscar_vta.php"><img src="images/buscar.png" height="110" width="110"/></a>
			<p>Buscar</p>
			</article>
			
			
			<article>
				<a href="index.php"><img src="images/salir.png" height="107" width="107"/></a>
			<p>Salir</p>
			</article>
			
			
			
		</section>

</section>
        
     
        
      
 

   </body>
</html>
