<?php
  require 'scripts/funciones.php';
  if(! haIniciadoSesion() )
  {
  	header('Location: index.html');
  }

  conectar();
  $categorias = getCategoriasPorUser();
  desconectar();
?>
<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Panel de Usuario</title>
    <link rel="stylesheet" href="https://bootswatch.com/3/yeti/bootstrap.min.css">

  </head>

  <body>

    <div class="container">
      <div class="header">
        <nav>
          <ul class="nav nav-pills pull-right">
            <li role="presentation"><a href="index.html">Inicio</a></li>
            <li role="presentation"><a href="scripts/cerrar-sesion.php">Cerrar sesión</a></li>
          </ul>
        </nav>
        <h3 class="text-muted">Libros & Co.</h3>
      </div>
      <hr>

      <div class="jumbotron">
        <h1>Bienvenido, <?= $_SESSION['email'] ?>.</h1>
        <p class="lead">Bienvenido. Desde esta sección podrás acceder a los diversos géneros de nuestro sitio web.</p>
      </div>

    	<div class="row marketing">       
  
  <?php foreach( $categorias as $fila ): ?>
  		<div class="col-lg-6">
          <h4><a href="categorias/<?= $fila[2] ?>"><?= $fila[0] ?></a></h4>
          <p><?= $fila[1] ?></p>    
        </div>
  <?php endforeach ?>

  		</div>

	<hr>
	    <footer class="footer">
	    	<p>&copy; Libros & Co. 2024</p>
	    </footer>


  </body>
</html>
