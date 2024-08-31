<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://bootswatch.com/3/yeti/bootstrap.min.css">
</head>
<body>
<?php
    require '../scripts/funciones.php';
    if(! haIniciadoSesion() || ! esAdmin() )
  {
    header('Location: ../index.html');
  }

  conectar();

  if(isset($_POST['eliminar'])){
    $id = $_POST['eliminar'];

    $sql = "DELETE FROM categorias WHERE ID_Categoria = $id";

    if($conexion->query($sql) === true){
        //echo '<div><form action=""><input type="checkbox">'.$texto.'</form></div>';
    }else{
        die("Error al actualizar datos: " . $conexion->error);
    } 
}

  $sql = "SELECT * FROM categorias";
  $resultado = $conexion->query($sql);

  if($resultado->num_rows > 0){
      while($row = $resultado->fetch_assoc()){
          ?>
          <div>
              <form method="POST" id="form<?php echo $row['ID_Categoria']; ?>" action="">
                  <input name ="completar" value="<?php echo $row['ID_Categoria']; ?>" id="<?php echo $row['ID_Categoria']; ?>" type="checkbox" onchange="completarPendiente(this)"><?php echo $row['categoria'];?>
              </form>
              <form method="POST" id="eliminar<?php echo $row['ID_Categoria']; ?>" action="categorias.php">
                  <input type="hidden" name="eliminar" value="<?php echo $row['ID_Categoria']; ?>"  />
                  <input type="submit" value="eliminar">
              </form>
          </div>
          <?php
                    
                }
            }

            $conexion->close();

        ?>

</body>
</html>
