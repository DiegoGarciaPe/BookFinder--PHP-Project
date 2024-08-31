<?php
    
include('database.php');

$query = "SELECT * FROM categorias";
$result = mysqli_query($conexion, $query);

if(!$result){
    die('Query failed'.mysqli_error($conexion));
}

$json= array();
while($row = mysqli_fetch_array($result)){
    $json[] = array(
        'ID_Categoria' => $row['ID_Categoria'],
        'categoria' => $row['categoria'],
        'descripcion' => $row['descripcion']
    );
}
$jsonstring = json_encode($json);
echo $jsonstring;
?>