<?php
    include('database.php');

    $id_libro = $_POST['id_libro'];
    $ID_Categoria = $_POST['ID_Categoria'];
    $Nombre = $_POST['Nombre'];
    $Autor = $_POST['Autor'];
    $Año = $_POST['Año'];

    $query = "UPDATE libros SET ID_Categoria = '$ID_Categoria', Nombre = '$Nombre', Autor = '$Autor', Año = '$Año' WHERE id_libro = '$id_libro'";
    $result = mysqli_query($conexion,$query);
    if(!$result){
        die('Query failed');
    }

    echo "Edición realizada";

?>  
