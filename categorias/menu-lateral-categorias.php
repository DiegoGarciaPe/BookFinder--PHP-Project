<?php
    require 'scripts/funciones.php';
    conectar();
    $categorias = getCategoriasPorUser();
    desconectar();
    
?>




<link rel="https://bootswatch.com/3/yeti/bootstrap.min.css">
<div class="col-sm-3 col-md-2 sidebar">
          <ul class="nav nav-sidebar">
            <li><a href="index.php" name="inicio">Aventuras</a></li>
            <li><a href="permisos.php" name="inicio">Ciencia Ficción</a></li>
            <li><a href="categorias.php" name="inicio">Fantasía</a></li>
            <li><a href="../libros/libros.php" name="inicio">p</a></li>
          </ul>
        </div>
        <?php foreach( $categorias as $fila ): ?>
  		<div class="col-lg-6">
          <h4><a href="categorias/<?= $fila[2] ?>"><?= $fila[0] ?></a></h4>
          <p><?= $fila[1] ?></p>    
        </div>
  <?php endforeach ?>

  		</div>