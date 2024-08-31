<?php
    include('database.php');

    if(!$_POST['categoria']){
        die('Query failed.');
    }
    if(!$_POST['descripcion']){
        die('Query failed.');
    }
       if(isset($_POST['categoria'])){
        $ID_Categoria = $_POST['ID_Categoria'];
        $categoria = $_POST['categoria'];
        $descripcion = $_POST['descripcion'];
        $query = "INSERT into categorias(ID_Categoria, categoria, descripcion) VALUES ('$ID_Categoria', '$categoria', '$descripcio')";
        $result = mysqli_query($conexion, $query);
        if(!$result){
            die('Query failed.');
        }
        echo 'Categoria añadida';

        
    }
?>