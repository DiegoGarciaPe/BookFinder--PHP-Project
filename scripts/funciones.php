<?php 
	$conexion = null;

	function conectar()
	{
		global $conexion;
		$conexion = mysqli_connect('localhost', 'root', '', 'intranet');
		mysqli_set_charset($conexion, 'utf8');
	}

	function eliminarCategoria(){
		
	}

	function getTodasCategorias()
	{
		global $conexion;
		$respuesta = mysqli_query($conexion, "SELECT * FROM categorias");
		// return $respuesta->fetch_all();
		$respuestas_array = array();
		while ($fila = $respuesta->fetch_row())
		  $respuestas_array[] = $fila;
		return $respuestas_array;		
	}

	function getCategoriasPorUser()
	{
		global $conexion;
		$respuesta = mysqli_query($conexion, "SELECT C.categoria, C.descripcion, C.ruta FROM permisos P INNER JOIN categorias C ON P.ID_Categoria = C.ID_Categoria WHERE usuario =  '".$_SESSION['usuario']."'");		
		// return $respuesta->fetch_all();
		$respuestas_array = array();
		while ($fila = $respuesta->fetch_row())
		  $respuestas_array[] = $fila;
		return $respuestas_array;
	}

	function getCategoriaPorId($id)
	{
		global $conexion;
		$respuesta = mysqli_query($conexion, "SELECT * FROM categorias WHERE ID_Categoria =  ".$id);		
		return mysqli_fetch_row($respuesta);
	}

	function getUsuarios()
	{
		global $conexion;
		$respuesta = mysqli_query($conexion, "SELECT * FROM usuarios WHERE admin<>1");		
		// return $respuesta->fetch_all();
		$respuestas_array = array();
		while ($fila = $respuesta->fetch_row())
		  $respuestas_array[] = $fila;
		return $respuestas_array;		
	}
	
	function validarLogin($usuario, $clave)
	{
		global $conexion;
		$consulta = "SELECT * FROM usuarios WHERE usuario='".$usuario."' AND clave='".$clave."'";
		$respuesta = mysqli_query($conexion, $consulta);
		
		if( $fila = mysqli_fetch_row($respuesta) )
		{
			session_start();
			$_SESSION['usuario'] = $usuario;
			$_SESSION['admin'] = $fila[2];
			return true;
		}
		return false;
	}

	function eliminarPermisos($usuario)
	{
		global $conexion;
		mysqli_query($conexion, "DELETE FROM permisos WHERE usuario='".$usuario."'");		
	}

	function eliminarUsuario($usuario){
		global $conexion;
		mysqli_query($conexion, "DELETE FROM usuarios WHERE `usuarios`.`usuario` = '".$usuario."'");
	}

	function asignarPermisos($usuario, $idCat)
	{
		global $conexion;
		mysqli_query($conexion, "INSERT INTO permisos VALUES('".$usuario."', ".$idCat.")");		
	}

	function tienePermiso($usuario, $idCat)
	{
		global $conexion;
		$result = mysqli_query($conexion, "SELECT COUNT(*) AS total FROM permisos WHERE usuario='".$usuario."' AND ID_Categoria=".$idCat);
		$row = mysqli_fetch_assoc($result);
		$numero = $row['total'];
		return $numero > 0;
	}

	function editarCategoria($id, $nombre, $descripcion, $ruta)
	{
		global $conexion;
		mysqli_query($conexion, "UPDATE categorias SET categoria='".$nombre."', descripcion='".$descripcion."', ruta='".$ruta."' WHERE ID_Categoria = ".$id);
	}

	function haIniciadoSesion()
	{
		session_start();
		return isset( $_SESSION['usuario'] );
	}

	function esAdmin()
	{
		return $_SESSION['admin'];
	}

	function desconectar()
	{
		global $conexion;
		mysqli_close($conexion);
	}


	function getLibros()
	{
		global $conexion;
		$respuesta = mysqli_query($conexion, "SELECT * FROM libros");
		// return $respuesta->fetch_all();
		$respuestas_array = array();
		while ($fila = $respuesta->fetch_row())
		  $respuestas_array[] = $fila;
		return $respuestas_array;		
	}

	function getLibrosAventuras()
	{
		global $conexion;
		$respuesta = mysqli_query($conexion, "SELECT * FROM libros WHERE ID_Categoria = '3'");
		// return $respuesta->fetch_all();
		$respuestas_array = array();
		while ($fila = $respuesta->fetch_row())
		  $respuestas_array[] = $fila;
		return $respuestas_array;		
	}

	function getLibrosCf()
	{
		global $conexion;
		$respuesta = mysqli_query($conexion, "SELECT * FROM libros WHERE ID_Categoria = '2'");
		// return $respuesta->fetch_all();
		$respuestas_array = array();
		while ($fila = $respuesta->fetch_row())
		  $respuestas_array[] = $fila;
		return $respuestas_array;		
	}

	function getLibrosFantasia()
	{
		global $conexion;
		$respuesta = mysqli_query($conexion, "SELECT * FROM libros WHERE ID_Categoria = '1'");
		// return $respuesta->fetch_all();
		$respuestas_array = array();
		while ($fila = $respuesta->fetch_row())
		  $respuestas_array[] = $fila;
		return $respuestas_array;		
	}

	function getLibrosPoliciaco()
	{
		global $conexion;
		$respuesta = mysqli_query($conexion, "SELECT * FROM libros WHERE ID_Categoria = '4'");
		// return $respuesta->fetch_all();
		$respuestas_array = array();
		while ($fila = $respuesta->fetch_row())
		  $respuestas_array[] = $fila;
		return $respuestas_array;		
	}

?>