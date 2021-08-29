<?php 
include 'clases.php';
 ?>

<?php  
	session_start();
	if (!isset($_SESSION['nombre'])) {
		header('Location: login.php');
	}elseif(isset($_SESSION['nombre'])){
		include 'model/conexion.php';
		$sentencia = $bd->query("SELECT * FROM alumno;");
		$alumnos = $sentencia->fetchAll(PDO::FETCH_OBJ);
		//print_r($alumnos);
	}else{
		echo "Error en el sistema";
	}

?>

<!DOCTYPE html>
<html lang="es">
<head>
	<title>CRUD Registro de alumnos</title>
	<meta charset="utf-8">
</head>

<body>



<div class="container">

<br>
<!-- Inicio NavBar -->
<nav>
	<ul>
        <li><a href="index.php">Inicio</a></li>
        <li><a href="ingresar.php">Agregar</a></li>
        <li><a href="#">Menu</a>
            <ul><li><a href="index.php">Inicio</a></li>
            <li><a href="ingresar.php">Agregar</a></li>
            <li><a href="Ingresar_usuario.php">Agregar Usuario</a></li>
			<li><a href="listar_usuarios.php">Usuarios</a></li>
            <li><a href="cerrar.php">Cerrar Sesion</a></li></ul>
            </li>
        
        <li><a href="cerrar.php">Salir</a></li>
    </ul>
</nav>
<!-- Final NavBar -->

<header>
	
</header>



<h3>Ingresar alumnos:</h3>
		<form method="POST" action="insertar.php">
			<table>
				<tr>
					<td>Apellido paterno: </td>
					<td><input type="text" size="80" name="txtPaterno"></td>
				</tr>
				<tr>
					<td>Apellido materno: </td>
					<td><input type="text" size="80" name="txtMaterno"></td>
				</tr>
				<tr>
					<td>Nombre: </td>
					<td><input type="text" size="80" name="txtNombre"></td>
				</tr>
				<tr>
					<td>Calficacion parcial: </td>
					<td><input type="text" name="txtParcial"></td>
				</tr>
				<tr>
					<td>Calificacion final: </td>
					<td><input type="text" name="txtFinal"></td>
				</tr>
				<input type="hidden" name="oculto" value="1">
				<tr>
					<td><input type="reset" name="" value="LIMPIAR DATOS" class="btn btn-danger"></td>
					<td><input type="submit" value="INGRESAR ALUMNO" class="btn btn-info"></td>
				</tr>
			</table>
		</form>

	<!--inicio footer -->
<br>
<?php 
include 'footer.php';
 ?>
 <!-- fin footer -- >
</div>

</body>
</html>