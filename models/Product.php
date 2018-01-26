<?php
require_once 'Database.php';

class Product
{
	public $name;
	public $descripcion;
	public $precio;
	public function __construct($name,$descripcion,$precio)
	{
		$this->name = $name;
		$this->descripcion=$descripcion;
		$this->precio=$precio;
	}
	public static function get()
	{
		$sql = "SELECT
				*
			   FROM
				productos";
		$db = new Database();
		if ($rows = $db->query($sql)) {
			$db->close();
			return $rows;
		}
		$db->close();
		return false;
	}

	//No es estatico porque recibe parametros
	public function save()
	{
		$sql="INSERT into 
				productos (	nombre,
							descripcion,
							precio,
							categoria_id) 
				VALUES(
							'".$this->name."',
							'".$this->descripcion."',
							$this->precio,
							1
				)";
		$db=new Database();
		if ($db->query($sql)) {
			$db->close();
			return true;
		}
		$db->close();
		return false;
	}


}
