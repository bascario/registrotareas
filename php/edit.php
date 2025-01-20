<?php
	//verificar si un nuevo dato es igual o diferente al antiguo
	function cambios($old, $new, $n)
	{
		if (!($old == $new)) {
			$n = $n . $old . ";;" . $new. ";;";
		}
		return $n;
	}
	function cambioValor($old, $new)
	{
		if (!($old == $new)) {
		return true;	
		}
	}
	function getNrec($con, $nik){
		$selectl = $con->prepare("SELECT `nombre` FROM recursos WHERE id=?");		
		$selectl->bind_param('i', $nik);	
		$selectl->execute();
		$result = $selectl->get_result();
		$row = $result->fetch_assoc();				
		$selectl->close();
		return $row['nombre'];
	}
	//consultar nombre de un departamento
	function getNdep($con, $nik){
		$selectl = $con->prepare("SELECT `nombre` FROM departamentos WHERE id=?");		
		$selectl->bind_param('i', $nik);	
		$selectl->execute();
		$result = $selectl->get_result();
		$row = $result->fetch_assoc();
		$selectl->close();
		return $row['nombre'];
	}

	//agregar los nombres de todos los recursos a selector
	function getNrecs($con, $nik){
		$sql = $con->query("SELECT id,nombre FROM recursos");
		while ($row = $sql->fetch_assoc()) {
			echo '<option value="' . $row['id'] . '"';
			if ($row['id'] == $nik) {
				echo ' selected';
			}
			echo '>' . $row['nombre'] . '</option>';
		}
		$sql->close();
	}
	//agregar los nombres de todos los departamentos a selector
	function getNdeps($con, $nik){
		$sql = $con->query("SELECT id,nombre FROM departamentos");
		while ($row = $sql->fetch_assoc()) {
			echo '<option value="' . $row['id'] . '"';
			if ($row['id'] == $nik) {
				echo ' selected';
			}
			echo '>' . $row['nombre'] . '</option>';
		}
		$sql->close();
	}
?>