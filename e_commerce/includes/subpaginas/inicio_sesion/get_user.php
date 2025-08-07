<?php include "./../../../utility/connector.php"?>
<?php include "./../../../includes/subpaginas/inicio_sesion/head_get_user.php"?>
<?php include "./body_get_user.php"?>


<?php 
$userName = htmlspecialchars($_POST["user_name"]);
$password = htmlspecialchars($_POST["contraseña"]);
$get_user = 'select usuario_id, contraseña from usuarios where usuario_id like "'.$userName.'" and contraseña like "'.$password.'"';
$registros =  mysqli_query($conexion, $get_user);
$idUser;

while($registro = mysqli_fetch_row($registros)){
    $idUser = $registro[0];
}

if($idUser){
    echo "<script>
        localStorage.setItem('idUser', " . json_encode($idUser) . ");
    </script>";
    echo "<h2>Usted se ha registrado con exito</h2><a href='./../../../paginas/cuenta.php'>Entrar a mi cuenta<a/>";
}
else{
    echo "<h2>Usted NO se ha registrado con exito</h2>";
}



?>



<?php include "./footer_get_user.php"?>
