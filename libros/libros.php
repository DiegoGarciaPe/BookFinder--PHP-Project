<?php
      require '../scripts/funciones.php';
      if(! haIniciadoSesion() || ! esAdmin() )
      {
        header('Location: index.html');
      }
    
      conectar();
      $libros = getLibros();
      desconectar();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administración de libros</title>
    <link rel="stylesheet" href="https://bootswatch.com/3/yeti/bootstrap.min.css">
    <link rel="stylesheet" href="estilos.css">
    <?php include '../admin/menu-superior.php'; ?>
    <?php include 'menu-lateral-libros.php'; ?>
</head>
<body>
    <div class="container-fluid">
      <div class="row">
      
        <div class="col-sm-9 col-sm-offset-3 col-md-7 col-md-offset-2 main">
          <h1 class="page-header">Libros</h1>

          <h4 class="sub-header">Todos los libros disponibles</h4>
          <div class="table-responsive">
            <table class="table table-striped">
              <thead>
                <tr>
                  <th>Categoria</th>
                  <th>Nombre</th>
                  <th>Autor</th>
                  <th>Año</th>   
                </tr>
              </thead>
              <tbody>
              <?php foreach( $libros as $libro ): ?>
                <tr>
                  <td><?= $libro[1] ?></td>
                  <td><?= $libro[2] ?></td>
                  <td><?= $libro[3] ?></td>
                  <td><?= $libro[4] ?></td>
                </tr>
                <?php endforeach ?>
              </tbody>
            </table>
            <a href="EditarLibros.html" class="btn btn-primary">Editar</a>
          </div>
        </div>
      </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
</body>
</html>