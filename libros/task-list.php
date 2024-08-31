<?php
    
include('database.php');

$query = "SELECT * FROM libros";
$result = mysqli_query($conexion, $query);

if(!$result){
    die('Query failed'.mysqli_error($conexion));
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
$jsonstring = json_encode($json);
echo $jsonstring;
?>