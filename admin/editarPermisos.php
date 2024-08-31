<?php
  require '../scripts/funciones.php';
  // Validación de la sesión como administrador:
  if(! haIniciadoSesion() || ! esAdmin() )
  {
    header('Location: index.html');
  }
  // Verificación del parámetro GET:
  if( isset($_GET['usuario']) )
    $usuario = $_GET['usuario'];
  else header('Location: index.php');
  // Captura de las categorías:
  conectar();
  $categorias = getTodasCategorias();
  $usuarios = getUsuarios();
  
?>
<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Panel de Administración</title>
    <link rel="stylesheet" href="https://bootswatch.com/3/yeti/bootstrap.min.css">
    <link rel="stylesheet" href="../libros/estilos.css">
  </head>

  <body>
    <?php include 'menu-superior.php'; ?>

    <div class="container-fluid">
      <div class="row">
        <?php include 'menu-lateral.php'; ?>
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
          <h1 class="page-header">Modificación de permisos</h1>
          <div class="row">
            <div class="col-sm-6 ">
            
            <div class="panel panel-default"  name="bolsa">
              <div class="panel-heading" name="bolsa"><h3 class="panel-title" name= "bolsa">Edición de permisos</h3></div>
              <div class="panel-body">
                <form action="../scripts/actualizar-permisos.php" method="POST">
                  <div class="form-group">
                    <label for="txtUsuario">Usuario</label>
                    <input type="text" class="form-control" name="txtUsuario" id="txtUsuario" value="<?= $usuario ?>" readonly>
                  </div>
        <?php foreach( $categorias as $categoria ): ?>
                  <div class="checkbox">
                    <label>
                      <input type="checkbox" name="categoria<?= $categoria[0] ?>" <?php if(tienePermiso($usuario, $categoria[0])) echo "checked" ?>> <?= $categoria[1] ?>
                    </label>                                          
                  </div>
        <?php 
        	endforeach; 
        	desconectar();
        ?>
                   <button type="submit" class="btn btn-info">Guardar</button>
                </form>
              </div>
            </div>
          </div>
            
        </div>

        </div>
      </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>
  </body>
</html>