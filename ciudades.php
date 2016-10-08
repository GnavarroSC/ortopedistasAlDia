<?php
	header("Content-Type: text/html;charset=UTF-8");
	include('conexionBd.php');
	mysql_query("SET NAMES 'utf8'");
	$Departamento = $_POST["departamento"];
	$strSQL = "SELECT * FROM ciudades WHERE idDepartamento='".$Departamento."' ";
    $objQuery = mysql_query($strSQL);
	while ($table = mysql_fetch_array($objQuery)) {
        echo "<option value='".$table['nombre']."'>'".$table['nombre']."'</option>";
	};
	mysql_close($objConnect);
?>
