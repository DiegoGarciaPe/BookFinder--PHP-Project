<?php
    include('database.php');
    $categoria = $_POST['categoria'];
    $query = "SELECT * FROM categorias WHERE categoria = '$categoria'";
    $result = mysqli_query($conexion, $query);

    if(!$result){
        die('Query failed'.mysqli_error($connection));
    }
    
    $json= array();
    while($row = mysqli_fetch_array($result)){
        $json[] = array(
            'ID_Categoria' => $row['ID_Categoria'],
            'categoria' => $row['categoria'],
            'descripcion' => $row['descripcion'],
        );
    }
    $jsonstring = json_encode($json[0]);
    echo $jsonstring;
?>