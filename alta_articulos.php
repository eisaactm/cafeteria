<?php
include_once("class_lib2.php");
include_once("validar_admin.php");
//include_once("../includes/clases/class_lib.php");
//include_once("class.Cafeteria.php");
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

                 location.href="indxCafeteria.php";
         
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
                        "art_precio": { required: true,number:true }
                    

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
                    if(confirm("¿Desea agregar el articulo?"))
                    {
                      //  $("#boton_aceptar").attr('disabled', 'disabled');
                        /** Datos */
                     
                       var descr    = $("#art_descr").val();
                       var precio    = $("#art_precio").val();

                        $.ajax({
                            type: "POST",
                            url: "insert.php",
                            data: "descr_art="+descr+"&precio="+precio+"&tipoInsert=articulo",
                            success: function (data)
                            {
								
								if(data == 0)
                                {
                                    alert("Articulo Agregado");
                                     window.location.href = "alta_articulos.php";
                                           
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

   <div class="titulo">ARTICULOS<br>


<div class="centrar">

<form method="post" action="" id="frmInfo" name="frmInfo">
         <div class="centrar">
    <table class="frml" style="width:60%;" border="0">
         <tr>
        <td class="derecha">
        Descripción:</td> <td style="width:75%;" class="izq"><input type="text" id="art_descr" name="art_descr" size="45" maxlength="100" class="inputs" value='<?php if(isset($art_nombre)){echo $art_nombre;}?>'></td></tr>
        <tr>
           

           <tr>
           <td class="derecha">
        Precio:</td> <td style="width:75%;" class="izq"><input type="text" id="art_precio" name="art_precio" size="6" style="text-align:left" maxlength="7" class="inputs" value='<?php if(isset($art_precio)){echo $art_precio;}?>'></td></tr>
        
   </tr>
             
        
        
        </table>     <br>


</div>
    <br>
   <center>
    
    <?php
    if(isset($_GET['id']))
         {   
            echo '<input type=submit value=Actualizar class=boton>';
            
         }
         else
            echo '<input type=button value=Guardar  id="btnGuardar" onclick="submitClicked()"> <input type=button value=Regresar  id="btnGuardar" onclick="regresar()">';?>
    </center>
   </form>



</section>
        
     
        
      
 

   </body>
</html>
