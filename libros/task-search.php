<?php
    include('database.php');
    $search = $_POST['search'];
    if(!empty($search)){
        $query = "SELECT * FROM libros WHERE Nombre LIKE '$search%'";
        $result = mysqli_query($conexion, $query);
        if(!$result){
            die('Error');
        }
        $json = array();
        while($row = mysqli_fetch_array($result)){
            $json[] = array(
                'ID_Categoria' => $row['ID_Categoria'],
                'Nombre' => $row['Nombre'],
                'Autor' => $row['Autor'],
                'Año' => $row['Año']
            );
        }
        $jsonstring=json_encode($json);
        echo $jsonstring;
    }

?>