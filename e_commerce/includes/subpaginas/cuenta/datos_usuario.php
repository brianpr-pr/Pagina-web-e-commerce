<?php include "./../../../utility/connector.php"?>
<?php 
$data = file_get_contents(filename: "php://input");
$datosUsuarios = json_decode($data, true);
$userId = '';

if(isset($_POST)){
    $userId = $datosUsuarios['userId'];
//Query
$server_response = '';   
$get_data_user = "select * from usuarios where usuario_id like '".$userId."'";
$registros = mysqli_query($conexion, $get_data_user);

while($registro = mysqli_fetch_row($registros)){
    $server_response = '<div id="container-registrado-elementos">
    <div id="container-img-nombre">
        <h2>Nombre de usuario:</h2>

        <img id="logo-usuario" src="./../logos/logo.jpg">
    </div>
    <div id="usuario_id" class="datos_usuario">
        <h2 id="nombre_usuario">'.$registro[0].'</h2>
    </div>
    
    <h2>Nombre</h2>
     <div id="nombre" class="datos_usuario">
        <h2 id="nombre">'.$registro[2].'</h2>
        <img class="editar-logo" src="./../logos/editar.png">
    </div>

    <h2>Apellidos</h2>
    <div id="apellidos" class="datos_usuario">
        <h2 id="apellidos">'.$registro[3].'</h2>
        <img class="editar-logo" src="./../logos/editar.png">
    </div>

    <h2>Fecha de nacimiento</h2>
     <div id="fecha_nacimiento" class="datos_usuario">
    <h2 id="fecha_nacimiento">'.$registro[5].'</h2>
    <img class="editar-logo" src="./../logos/editar.png">
    </div>
    <h2>Direccion de correo electronico</h2>
     <div id="direccion" class="datos_usuario">
    <h2 id="correo">'.$registro[4].'</h2>
    <img class="editar-logo" src="./../logos/editar.png">
     </div>
</div>';
}

echo $server_response;
}
?>