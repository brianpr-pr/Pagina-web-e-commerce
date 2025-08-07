<?php include "./../../../utility/connector.php"?>
<?php
//echo "Hola si que tal";

$data = file_get_contents(filename: "php://input");
$datosUsuarios = json_decode($data, true);
$columna = $datosUsuarios['columna'];
$idUser = $datosUsuarios['idUser'];
$newData = $datosUsuarios['newData'];


if(isset($_POST)){

    //Query
$server_response = '';   
$update_data_user = "update usuarios set $columna = '".$newData."' where usuario_id like '".$idUser."'";

mysqli_query($conexion, $update_data_user);
echo $columna.$idUser.$newData;
}
?>