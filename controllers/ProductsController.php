<?php
include_once("../models/Product.php");
include_once("../models/Cleaner.php");

if (isset($_POST['action'])) {
	$nombre=Cleaner::cleanInput($_POST['nombre']);
	$descripcion=Cleaner::cleanInput($_POST['descripcion']);
	$precio=(int)Cleaner::cleanInput($_POST['precio']);

	$producto=new Product($nombre,$descripcion,$precio);

	if($producto->save()) {
		echo "Se guardaron correctamente los datos";
	} else {
		echo "Error al guardar los datos";
	}


	
}else{
	$productos = Product::get();
	$productos=json_encode($productos);
	echo $productos;
}