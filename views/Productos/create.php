<!DOCTYPE html>
<html>
<head>
	<title>Crear producto</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/css/bootstrap.min.css" integrity="sha384-Zug+QiDoJOrZ5t4lssLdxGhVrurbmBWopoEl+M6BdEfwnCJZtKxi1KgxUyJq13dy" crossorigin="anonymous">
</head>
<body>
	<?php include("../parciales/header.php"); ?>
	<main>
		<label>Nombre:</label>
		<input type="text" id="nombre">
		<br>
		<label>Descripcion:</label>
		<br>
		<textarea id="descripcion"></textarea>
		<br>
		<label>Precio $</label>
		<input type="number" id="precio">
		<br>
		<button onclick="registrar()">Registrar</button>
	</main>
	<script type="text/javascript">
		function registrar(){
			var xhr = new XMLHttpRequest();
			var url= '../../controllers/ProductsController.php'; 
			xhr.open('POST', url, true);

			//Recuperacion de datos ingresados por el usuario
			var datos=new FormData();

			var nombre= document.querySelector("#nombre").value;
			datos.append('nombre', nombre);

			var precio= document.querySelector("#precio").value;
			datos.append('precio', precio);

			var descripcion= document.querySelector("#descripcion").value;
			datos.append('descripcion', descripcion);

			datos.append('action','create');

			xhr.addEventListener('loadend', function() {
				console.log("Listo");
				document.querySelector("#nombre").value="";
				document.querySelector("#precio").value="";
				document.querySelector("#descripcion").value="";

			});
			xhr.send(datos);
		}
	</script>
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/js/bootstrap.min.js" integrity="sha384-a5N7Y/aK3qNeh15eJKGWxsqtnX/wWdSZSKp+81YjTmS15nvnvxKHuzaWwXHDli+4" crossorigin="anonymous"></script>
</body>
</html>