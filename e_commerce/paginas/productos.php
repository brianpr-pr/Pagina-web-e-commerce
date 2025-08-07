<?php include "./../includes/subpaginas/productos/head_productos.php"?>
<?php include "./../includes/body_pages.php"?>
<?php include "./../utility/connector.php"?>

<div id="container-general-productos">
    <div id="container-texto">
        <label>Filtro:</label>
        <select id="select-categorias">
            <option disabled selected>Selecciona una categoría</option>
            <option>Generica</option>
            <?php include "./../includes/subpaginas/productos/mostrar_categorias.php"?>
        </select>
    </div>
    <div id="container-productos"></div>

    <div id="linea-horizontal"></div>
    <div id="container-productos-vendidos">
        <div id="texto-productos-vendidos">
            <h2 id="texto-titulo-productos-vendidos">Productos más vendidos</h2>
            <p id="texto-parrafo-productos-vendidos">Descube nuestros productos más populares y entiende por 
                qué cada vez más personas confían en nosotros. Calidad, 
                diseño y funcionalidad reunidos en lo que más eligen nuestros clientes. 
                <br>!No te quedes sin probarlos!
            </p>
        </div>
        <div id="contenido-productos-vendidos">
            <div class="class-producto-vendido producto">
                <img src="./../productos/stock_uno.jpg" class="img-producto">
                <p class="nombre-producto">Nombre generico</p>
                <p class="precio-producto">11</p>    
            </div>
            <div class="class-producto-vendido producto">
                <img src="./../productos/stock_uno.jpg" class="img-producto">
                <p class="nombre-producto">Nombre generico</p>
                <p class="precio-producto">11</p>    
            </div>
        </div>
    </div>
</div>

<?php include "../includes/footer_pages.php"?>

<script type="module">
import {productosPorCategoria} from "./../js/mostrar_productos.js";
/**Me voy a ver un tutorial ahora vuelvo*/
window.addEventListener("load", async event => {
productosPorCategoria('%');
    document.getElementById("select-categorias").addEventListener("change", async event => {
        let valorSeleccion = event.target.value;
        if(valorSeleccion == 'Generica'){
            productosPorCategoria('%');
        } else{
        productosPorCategoria(event.target.value);
        }
    })
})
</script>