<?php
//include_once("class_lib2.php");
//include_once("validar_admin.php");
include_once("../includes/clases/class_lib.php");
include_once("class.Cafeteria.php");
?>
<html>
    <head>
    <meta charset="utf-8"/>
<meta name="viewport" content="width = device-width, initial-scale=1, maximum-scale=1"/>
        <title></title>
         <link rel="stylesheet" href="css/estilos.css"/>
         
                <link rel="stylesheet" type="text/css" href="ajax/jsAut/jquery.autocomplete.css" />
         
     
             <link rel="stylesheet" href="//code.jquery.com/ui/1.11.3/themes/smoothness/jquery-ui.css">
         
   
<script src="ajax/ajax_meze_caf.js"></script>
        <script language="javascript">

          function recargar2()
        {

            alert("Sus datos se han actualizado correctamente");
            location.href="listajug.php";

        }


          function cursor()
        {

            document.frmInfo.course1.focus();

        }


            function regresar()
            {

                    location.href="indxCafeteria.php";
         
            }
            function buscar()
            {
    bsqVenta();
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

 



    

  
        





 <script>
        $(document).ready(function ()
            {
               // asignarReglasValidacion();
              // $("#frmAdeudo").tabs();
            });

            function asignarReglasValidacion()
            {
                $('#frmInfo').validate({
                    rules:
                    {
                        "course": { required: true },
                        "course1": { required: true },
                        "cantidad": { required: true,number:true }
                    

                                 },
                messages: {
                  course: " **",
                  course1:" **",
                   cantidad:" **"
         
               
                }
                })
            }
            
              function cargaComboSuc()
            {
               cmbSucursalDep();
            }

            function submitClicked()
            {
               // if($("#frmInfo").validate())
                //{
                    if(confirm("¿Desea guardar la venta?"))
                    {
                      //  $("#boton_aceptar").attr('disabled', 'disabled');
                        /** Datos */
                     
                       var idalu    = $("#idAlu").val();
                       var idart    = $("#idArt").val();
                        var cantidad    = $("#cantidad").val();
                         var precio    = $("#course_val").val();


                        $.ajax({
                            type: "POST",
                            url: "insert.php",
                            data: "alu="+idalu+"&art="+idart+"&cant="+cantidad+"&precio="+precio+"&tipoInsert=cafeteria",
                            success: function (data)
                            {
								
								
								if(data == 0)
                                {
                                    alert("Venta guardada");
                                             location.href='alta_ventas.php';
                                            
                                }
                            }
                        });
                   }
                //}
            }
        </script>
     
            
                    


    

 <script src="includes/jquery.ui.datepicker-es.js"></script>

 <script>
$(function() {
$( "#tabs" ).tabs();
});

</script>
  <script type="text/javascript" src="ajax/jsAut/jquery.js"></script>  

         <script type="text/javascript" src="ajax/jsAut/jquery.autocomplete.js"></script> 
<script type="text/javascript">
$().ready(function() {
	
	$("#course").autocomplete("get_articulos.php", {
		width: 310,
		matchContains: true,
		//mustMatch: true,
		//minChars: 0,
		//multiple: true,
		//highlight: false,
		//multipleSeparator: ",",
		selectFirst: true
	});
	
	$("#course").result(function(event, data, formatted) {
		$("#course_val").val(data[1]);
		$("#idArt").val(data[2]);
		//enviaInfoEqu();
		//busqTorneos();
	});
});

$().ready(function() {
	
	$("#course1").autocomplete("get_alumnos.php", {
		width: 310,
		matchContains: true,
		//mustMatch: true,
		//minChars: 0,
		//multiple: true,
		//highlight: false,
		//multipleSeparator: ",",
		selectFirst: true
	});
	
	$("#course1").result(function(event, data, formatted) {
		$("#idAlu").val(data[1]);
		//enviaInfoEqu();
		//busqTorneos();
	});
});
    
    </script>
  
    </head>
    
    <body onload="cursor();">
       <section id="contenedor">

   <div class="titulo">BÚSQUEDA<br>


   

<div class="centrar">

<form autocomplete="off" id="frmInfo" name="frmInfo">
   
    

	
		<table class="frml" style="width:50%;" border="0">
		<tr><td class="derecha" style="width:25%;">Fecha:</td>
			<td class="izq"><input type="text" id="datepicker" style="width:35%;"/> a <input type="text" id="datepicker2" style="width:35%;"/> 
			<input type="hidden" name="idAlu" id="idAlu" size="50" class="inputs">
			</td></tr>
		
			
				</table>
			<center><input type="button" value="Buscar" class="boton" onclick="buscar()"> <input type="button" value="Regresar" class="boton" onclick="regresar();"> </center>
	
	</form>
    
</div>
<div id="resultBsq">
</div>


</section>
        
     
        
      
 

   </body>
</html>
