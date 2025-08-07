<?php include "./../includes/subpaginas/cuenta/head_cuenta.php"?>
<?php include "./../includes/body_pages.php"?>

<div id="container-registrado">
    <div id="container-registrado-elementos">
        <div id="container-img-nombre">
            <h2 class="datos_usuario">Nombre de usuario:</h2>
            <img id="logo-usuario" src="./../logos/logo.jpg">
        </div>
        <h2  id="nombre_usuario" class="datos_usuario">*</h2>
        <h2>Nombre</h2>
        <h2 id="nombre" class="datos_usuario">*</h2>
        <h2>Apellidos</h2>
        <h2 id="apellidos" class="datos_usuario">*</h2>
        <h2>Fecha de nacimiento</h2>
        <h2 id="fecha_nacimiento" class="datos_usuario">*</h2>
        <h2>Direccion de correo electronico</h2>
        <h2 id="correo" class="datos_usuario">*</h2>
    </div>
</div>

<div id="container-no-registrado">
    <div id="elementos-no-registrado">
        <h2>Usted no ha iniciado sesión</h2>
        <a href="./inicio_sesion.php">Iniciar sesión</a>
        <h2>En caso de no tener una cuenta</h2>
        <a href="./registro.php">Registrarse</a>
    </div>
</div>


<div id="elemento-modificar">
    <div id="titulo-salida">
        <h2 id="titular">Realiza los cambios</span></h2>
        <img id="close-botton" src="./../logos/close.png">
    </div>
    <input id="datos-sobrescribir" type="text">
    <button id="guardar-cambios" type="submit">Guardar cambios</button>
</div>


<?php include "./../includes/footer_pages.php"?>
<script type="module">
    import {comprobarRegistro} from "./../js/comprobacion_registro.js";
    import {mostrarDatos} from "./../js/mostrar_datos_usuario.js";
    window.addEventListener("load", event => {
        comprobarRegistro();
        mostrarDatos();
    });
</script>