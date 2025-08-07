<?php include "./../includes/subpaginas/registro/head_registro.php"?>
<?php include "./../includes/body_pages.php"?>

<div id="container-all">
        <div id="container-registro">
                <form id="container-form" action="./../includes/subpaginas/registro/post_user_data.php" method="post">
                        <label id="" class="">Nombre de usuario</label>
                        <input required name="user_name" type="text">

                        <label id="" class="">Contraseña</label>
                        <input required name="contraseña" type="password">

                        <label id="" class="">Nombre</label>
                        <input required name="nombre" type="text">

                        <label id="" class="">Apellidos</label>
                        <input name="apellidos" type="text">

                        <label id="" class="">Dirección de correo</label>
                        <input required name="correo" type="email">

                        <label id="" required class="">Fecha de nacimiento</label>
                        <input required name="fecha_nacimiento" type="date">

                        <button id="submit" type="submit">Aqui</button>
                </form>
        </div>
</div>


<div id="secondary-container-all">
        <div id="content">
                <h2>Usted ya se ah registrado</h2>
                <h2><a href="./cuenta.php">Entrar en cuenta</a></h2>
        </div>
</div>

<?php include "./../includes/footer_pages.php"?>
<script>
        if(localStorage.getItem("idUser")){
                document.getElementById("container-all").style.display = 'none';
                document.getElementById("secondary-container-all").style.display = 'flex';
        } else{
                document.getElementById("container-all").style.display = 'flex';
                document.getElementById("secondary-container-all").style.display = 'none';
        }
</script>