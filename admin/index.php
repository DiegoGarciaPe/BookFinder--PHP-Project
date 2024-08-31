<?php
  require '../scripts/funciones.php';
  if(! haIniciadoSesion() || ! esAdmin() )
  {
    header('Location: index.html');
  }

  conectar();
  $usuarios = getUsuarios();
  desconectar();
?>
<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Panel de Administración</title>
    <link rel="stylesheet" href="https://bootswatch.com/3/yeti/bootstrap.min.css">
    <link rel="stylesheet" href="../libros/estilos.css">
    <?php include './menu-superior.php'; ?>
    <?php include './menu-lateral.php'; ?>
  </head>
  <body>
    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
          <h1 class="page-header">Bienvenido administrador.</h1>
          <p>Por favor seleccione una de las opciones del menú lateral izquierdo.</p>
        </div>
      </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>   
  </body>
</html>