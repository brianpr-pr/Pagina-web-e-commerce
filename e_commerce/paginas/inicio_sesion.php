<?php include "./../includes/subpaginas/inicio_sesion/head_inicio_sesion.php"?>
<?php include "./../includes/body_pages.php"?>

<div id="container-all">
        <div id="container-registro">
                <form id="container-form" action="./../includes/subpaginas/inicio_sesion/get_user.php" method="post">
                        <label id="user-identification" class="">Nombre de usuario</label>
                        <input name="user_name" type="text">
        
                        <label id="" class="">Contraseña</label>
                        <input name="contraseña" type="password">

                        <button id="submit" type="submit">Aqui</button>
                </form>
        </div>
</div>

<div id="secondary-container-all">
        <div id="content">
                <h2>Usted ya ah iniciado sesión</h2>
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