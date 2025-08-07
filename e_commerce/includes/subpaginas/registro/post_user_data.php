<?php include "./../../../utility/connector.php"?>
<?php
//Se cambiara por comprobación de variable local con datos de usuario
//Para los usuarios que no esten registrados

//Probar como era para recuperar valores de las variables locales con php
//que no me acuerdo:

$userId = "<script>localStorage.getItem('idUser');</script>";
var_dump($_SERVER['REQUEST_METHOD']);
if($_SERVER['REQUEST_METHOD'] == "POST"){
    echo "Hola";
    $userName = htmlspecialchars($_POST["user_name"]);
    $password = htmlspecialchars($_POST["contraseña"]);
    $name = htmlspecialchars($_POST["nombre"]);
    $surname = htmlspecialchars($_POST["apellidos"]);
    $correo = htmlspecialchars($_POST["correo"]);
    $date = htmlspecialchars($_POST["fecha_nacimiento"]);

    $nuevo_carro = 'insert into carro values("'.$userName.'x",0)';
    $nuevo_usuario = 'insert into usuarios values("'.$userName.'",'.$password.',"'.$name.'","'.$surname.'","'.$correo.'","'.$date.'","","'.$userName.'x")';
    mysqli_query($conexion, $nuevo_carro);
    mysqli_query($conexion, $nuevo_usuario);
}
header("Location: ./../../../paginas/inicio_sesion.php")
?>