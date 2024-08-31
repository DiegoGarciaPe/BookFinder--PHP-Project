<?php
    
    include('database.php');

    if(isset($_POST['Nombre'])){

     $Nombre = $_POST['Nombre'];

     $query = "DELETE FROM libros WHERE Nombre = '$Nombre'";
     $result = mysqli_query($conexion, $query);
     if(!$result){
        die('Query failed.');
     }
     echo "Libro eliminado";
    }
?>