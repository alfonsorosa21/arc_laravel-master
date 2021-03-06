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



<h1>Registro de Datos</h1>
<hr>
<table class="table table-bordered">
  
  <thead>

    <tr>
      <th>Codigo</th>
      <th>Apellido Paterno</th>
      <th>Apellido Materno</th>
      <th>Nombre</th>
      <th>Calificacion Parcial</th>
      <th>Calificacion Final</th>
      <th>Promedio</th>
      <th>Editar</th>
      <th>Eliminar</th>
    </tr>

  </thead>
<tbody>

			<?php 
				foreach ($alumnos as $dato) {
					?>
					<tr>
						<td><?php echo $dato->id_alumno; ?></td>
						<td><?php echo $dato->ap_paterno; ?></td>
						<td><?php echo $dato->ap_materno; ?></td>
						<td><?php echo $dato->nombre; ?></td>
						<td><?php echo $dato->ex_parcial; ?></td>
						<td><?php echo $dato->ex_final; ?></td>
						<td><?php echo ($dato->ex_final + $dato->ex_parcial)/2; ?></td>
						<td><a href="editar.php?id=<?php echo $dato->id_alumno; ?>" class="btn btn-info">Editar</a></td>
						<td><a href="eliminar.php?id=<?php echo $dato->id_alumno; ?>" class="btn btn-danger">Eliminar</a></td>
					</tr>
					<?php
				}
			?>
			
		</table>

	
<!--inicio footer -->
<br>
<?php 
include 'footer.php';
 ?>

<!-- fin footer -- >
</div>

</body>
</html>