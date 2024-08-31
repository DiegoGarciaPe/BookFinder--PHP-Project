<?php
    include('database.php');
    $Nombre = $_POST['Nombre'];
    $query = "SELECT * FROM libros WHERE Nombre = '$Nombre'";
    $result = mysqli_query($conexion, $query);

    if(!$result){
        die('Query failed'.mysqli_error($connection));
    }
    
    $json= array();
    while($row = mysqli_fetch_array($result)){
        $json[] = array(
            'id_libro' => $row['id_libro'],
            'ID_Categoria' => $row['ID_Categoria'],
            'Nombre' => $row['Nombre'],
            'Autor' => $row['Autor'],
            'Año' => $row['Año']
        );
    }
    $jsonstring = json_encode($json[0]);
    echo $jsonstring;
?>