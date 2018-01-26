<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/css/bootstrap.min.css" integrity="sha384-Zug+QiDoJOrZ5t4lssLdxGhVrurbmBWopoEl+M6BdEfwnCJZtKxi1KgxUyJq13dy" crossorigin="anonymous">
  </head>
  <body>
	<main>
		<button onclick="obtenerProductos()">Hacer petición</button>
		<table id="productosLista" class="table">
			<thead>
				<tr>
					<th scope="col">#</th>
					<th scope="col">Nombre</th>
					<th scope="col">Precio</th>
					<th scope="col">Descripción</th>
				</tr>
			</thead>

		</table>
	</main>

	<script type="text/javascript">
		function obtenerProductos(){
			var xhr = new XMLHttpRequest();
			var url= '../controllers/ProductsController.php'; 
			xhr.open('GET', url, true);
			xhr.addEventListener('loadend', function() {
				productos= eval(xhr.responseText);
				productos.forEach(function(producto){
					//Creacion de filas para poner las columnas (horizontal)
					fila= document.createElement("tr");
					//Creacion de columnas id, nombre,precio y descripcion (Vertical)
					idColumna=document.createElement("td");
					idNombre=document.createElement("td");
					precio=document.createElement("td");
					descripcion=document.createElement("td");
					//Agregar contenido a la tabla que esta en la BD
					idColumna.innerHTML=producto.id;
					idNombre.innerHTML=producto.nombre;
					precio.innerHTML=producto.precio;
					descripcion.innerHTML=producto.descripcion;
					//Agregar un hijo a la fila
					fila.appendChild(idColumna);
					fila.appendChild(idNombre);
					fila.appendChild(precio);
					fila.appendChild(descripcion);

					document.querySelector("#productosLista").appendChild(fila);
				});
				

			});
			xhr.send();
		}
		
	</script>
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/js/bootstrap.min.js" integrity="sha384-a5N7Y/aK3qNeh15eJKGWxsqtnX/wWdSZSKp+81YjTmS15nvnvxKHuzaWwXHDli+4" crossorigin="anonymous"></script>
  </body>
</html>
