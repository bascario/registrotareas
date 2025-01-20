<?php
	
	//obtener cantidad de registros de una tabla
	function nX($con,$tabla)	{
		$sql = $con->query("SELECT COUNT(*) as n FROM $tabla");
		$id = $sql->fetch_assoc();		
		$sql->close();
		return $id['n'];
		}

?>