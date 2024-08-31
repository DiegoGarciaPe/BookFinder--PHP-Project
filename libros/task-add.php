<?php
    include('database.php');

    if(!$_POST['Autor']){
        die('Query failed.');
    }
    if(!$_POST['Nombre']){
        die('Query failed.');
    }
    if(!$_POST['Año']){
        die('Query failed.');
    }
    if(isset($_POST['Nombre'])){
        $ID_Categoria = $_POST['ID_Categoria'];
        $Nombre = $_POST['Nombre'];
        $Autor = $_POST['Autor'];
        $Año = $_POST['Año'];
        $query = "INSERT into libros(ID_Categoria, Nombre, Autor, Año) VALUES ('$ID_Categoria', '$Nombre', '$Autor', '$Año')";
        $result = mysqli_query($conexion, $query);
        if(!$result){
            die('Query failed.');
        }
        echo 'Libro añadido';

        
    }
?>