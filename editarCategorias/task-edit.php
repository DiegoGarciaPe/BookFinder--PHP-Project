<?php
    include('database.php');

    $ID_Categoria = $_POST['ID_Categoria'];
    $categoria = $_POST['categoria'];
    $descripcion = $_POST['descripcion'];

    $query = "UPDATE categorias SET ID_Categoria = '$ID_Categoria', categoria = '$categoria', descripcion = '$descripcion' WHERE ID_Categoria = '$ID_Categoria'";
    $result = mysqli_query($conexion,$query);
    if(!$result){
        die('Query failed');
    }

    echo "Edición realizada";

?>  
