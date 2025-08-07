<?php include "./../includes/subpaginas/productos_detalles/head_productos_detalles.php"?>
<?php include "./../includes/body_pages.php"?>
<?php include "./../utility/connector.php"?>

<div id="detalles-producto">
    <h2>a</h2>
    <div id="detalles-producto-imagen">
        <img id="producto-imagen-propiedades" src="./../productos/stock_cuatro.jpg">
    </div>
    <div id="detalles-producto-contenido">
        <div id="">
            <h1>Nombre Producto</h1>
        </div> 
        <div id="">
            <h4>Categoria del producto</h4>
        </div> 
        <div id="opiniones">
            <h5 id="">Algo de texto</h5>
            <h5 id="">Reseñas</h5>
        </div> 
        <div id="texto-descriptivo-detalles-producto">
            <p>Texto descriptiovo afdsafhdflñdsfsl
                fdfdsfsdfsñjfdsjfñjfdsjlfdjfdsafhdflñdsfslfdfdsfsd
                fsñjfdsjfñjfdsjldsafhdflñdsfslfdfdsfsdfsñjfdsjfñjfds
                jldsafhdflñdsfslfdfdsfsdfsñjfdsjfñjfdsjldsafhdflñdsfsl
                fdfdsfsdfsñjfdsjfñjfdsjldsafhdflñdsfslfdfdsfsdfsñjfdsjfñjfdsjldsafhdf
                lñdsfslfdfdsfsdfsñjfdsjfñjfdsjldsafhdflñdsfslfdfdsfsdfsñjfdsjfñjfdsjl
            </p>
        </div> 
        <div class="hrs"></div>
        <div id="cantidad-botones">
            <div id="cantida-botones-subcontainer">
                <p>Cantidad</p>
                <div id="botones-controlador">
                    <button class="boton-controlador-class"  type="button">-</button>
                    <h3 id="numero">1</h3>
                    <button  class="boton-controlador-class" type="button">+</button>
                    <h4 id="precio-producto-detalles">Precio</h4>
                </div>
            </div> 
        </div> 

        <div class="hrs"></div>

        <div id="boton-añadir-carrito">
        <button id="boton-añadir-productos-carro" type="button"><a href="">Añadir al carrito</a></button>
        </div>  

    </div>
</div>
<?php include "../includes/footer_pages.php"?>
<script type="module">
import {mostrarProductoDetalles, manejadorBotonesCantidad} from "./../js/mostrar_detalles_producto.js";
window.addEventListener("load",event => {
    console.log(localStorage.getItem("producto_carrito"));
    mostrarProductoDetalles(event.value);   
});

</script>