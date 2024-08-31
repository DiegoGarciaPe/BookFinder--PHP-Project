<?php
    
    include('database.php');

    if(isset($_POST['categoria'])){

     $categoria = $_POST['categoria'];

     $query = "DELETE FROM categorias WHERE categoria = '$categoria'";
     $result = mysqli_query($conexion, $query);
     if(!$result){
        die('Query failed.');
     }
     echo "Categoria eliminada";
    }
?>