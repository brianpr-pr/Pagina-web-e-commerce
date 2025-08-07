<?php include "./includes/head_index.php";?>
<?php include "./includes/body_index.php";?>
<div id="bienvenida-menu">
    <div class="sub-elementos-bienvenida"  id="bienvenida-imagen">
        <img style="width:100%; height:100%;" 
        id="furgoneta-ikaros" 
        src="./logos/furgoneta.png"
    >
    </div>

    <div class="sub-elementos-bienvenida" id="bienvenida-mensaje">
            <h2>Bienvenido a IKARO!</h2>
            <p> En nuestra pagina web encontrara multitud
                de productos para satisfacer todas sus necesidades
                al mejor precio, todos nuestros vendedores están certificados
            </p>
            <button>Comprar</button>
    </div>
</div>

<div id="container-nuevos">
    <div id="nuevos-titulo">
        <h1>Nuevos productos</h1>
        <h4>Acaban de llegar</h4>
    </div> 
<!--
    Codigo para mostrar de manera dinamica contenido de los 3 
    ultimos productos insertados en la base de datos
-->
<?php include "./includes/index/mostrar_nuevos_productos.php";?>
</div>


<?php include "./includes/footer.php";?>

<script type="module">
import {setEventClick} from "./js/mostrar_productos.js";
//console.log(document.querySelector(".class-wrapper-nuevo-producto"));
window.addEventListener("load", event => {
    setEventClick(document.querySelectorAll(".class-wrapper-nuevo-producto"));
})
</script>