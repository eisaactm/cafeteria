<?php
session_start();
session_destroy();
?> 
<!doctype html>

<head>

	<!-- Basics -->
	
	<meta charset="utf-8">
		<meta name="viewport" content="width=device-width,initial-scale=1.0">
	
		

	
	<title>LOGIN :: MEZE CAFETERIA  ::</title>

	<!-- CSS -->
	
	<link rel="stylesheet" href="css/reset.css">
	
	<link rel="stylesheet" href="css/styles.css">
	<link rel="stylesheet" href="css/media-queries2.css">
	<link rel="stylesheet" href="css/font-awesome.css">
	
	<link rel="shortcut icon" href="favicon.ico" />
   <script language="Javascript">

function cursor()
{
	
	document.getElementById("usuario").focus();
	
}
</script>


<!-- media queries css -->

	
</head>

	<!-- Main HTML -->
	
<body onload="cursor()">
	
	<div id="login">
	<br>
		

	CAFETERIA<br><br>
		
		<div class="log">
		
		<form action="validar.php" method="post">
	<div class="input-icon left">

		<label for="name">Usuario</label><br>
		
		<input type="name" name="usuario" id="usuario" maxlength="20" required=""><br>
		
		<label for="username">Password</label><br>
		
		
		
		<input type="password" name="password" id="password" maxlength="20" required=""><br>
		<input type="submit" value="Login">
		</form>
		</div>
		
		</div>
	
	</div>


		
	
</body>

</html>
	
	
	
	
	
		
	
