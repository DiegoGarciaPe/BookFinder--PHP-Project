<?php
      require '../scripts/funciones.php';
      if(! haIniciadoSesion())
      {
        header('Location: index.html');
      }
    
      conectar();
      $libros = getLibrosCf();
      desconectar();
?>
<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sección de Curiosidades</title>
    <link rel="stylesheet" href="https://bootswatch.com/3/yeti/bootstrap.min.css">
    <style>
    body { padding-top: 50px; }
    .starter-template { padding: 40px 15px; text-align: center; }
    </style>
  </head>
  <body>
    <?php include 'menu-superior-categorias.php'; ?>
    <div class="container">
      <div class="starter-template">
        <h1>Libros de Ciencia Ficción</h1>
        <p class="lead">Una lista con todos los libros de Ciencia Ficción de nuestra base de datos</p>
        <hr>
      </div> 
      <table class="table table-striped">
              <thead>
                <tr>
                  <th>Nombre</th>
                  <th>Autor</th>
                  <th>Año</th>   
                </tr>
              </thead>
              <tbody>
              <?php foreach( $libros as $libro ): ?>
                <tr>
                  <td><?= $libro[2] ?></td>
                  <td><?= $libro[3] ?></td>
                  <td><?= $libro[4] ?></td>
                </tr>
                <?php endforeach ?>
              </tbody>
            </table>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>
  </body>
</html>