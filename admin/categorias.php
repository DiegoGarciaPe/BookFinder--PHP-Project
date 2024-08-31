<?php
  require '../scripts/funciones.php';
  if(! haIniciadoSesion() || ! esAdmin() )
  {
    header('Location: ../index.html');
  }

  conectar();
  $categorias = getTodasCategorias();
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
  </head>
  <body>
    <?php include 'menu-superior.php'; ?>

    <div class="container-fluid">
      <div class="row">
        <?php include 'menu-lateral.php'; ?>
        <div class="col-sm-9 col-sm-offset-3 col-md-7 col-md-offset-2 main">
          <h1 class="page-header">Categorías</h1>

          <h4 class="sub-header">Si quiere editar las categorías haga click en el botón inferior.</h4>
          <div class="table-responsive">
            <table class="table table-striped">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>Categoría</th>
                  <th>Descripción</th>
                </tr>
              </thead>
              <tbody>
        <?php foreach( $categorias as $categoria ): ?>
                <tr>
                  <td><?= $categoria[0] ?></td>
                  <td><?= $categoria[1] ?></td>
                  <td><?= $categoria[2] ?></td>
                </tr>
        <?php endforeach ?>
              </tbody>
            </table>
            <a href="../editarCategorias/editarCategorias.html" class="btn btn-primary">Editar</a>
          </div>
        </div>
      </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>
  </body>
</html>