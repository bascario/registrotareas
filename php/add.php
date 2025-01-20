<?php
//consultar nombre de un recurso
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
	$selectl = $con->prepare("SELECT `nombre` FROM asignaturas WHERE id=?");	
	$selectl->bind_param('i', $nik);	
	$selectl->execute();
	$result = $selectl->get_result();
	$row = $result->fetch_assoc();
	$selectl->close();
	return $row['nombre'];
}

//consultar tabla de recursos
function addRec($con){
	$sql = $con->query( "SELECT id,nombre FROM recursos");
	while ($row = $sql->fetch_assoc()) {
		echo '<option value="' . $row['id'] . '">' . $row['nombre'] . '</option>';
	}
	$sql->close();
}
//consultar tabla de departamentos
function addDep($con){
	$sql = $con->query("SELECT id,nombre FROM asignaturas");
	while ($row = $sql->fetch_assoc()) {
		echo '<option value="' . $row['id'] . '">' . $row['nombre'] . '</option>';
	}
	$sql->close();
}
?>