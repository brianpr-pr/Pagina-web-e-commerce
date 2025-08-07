<?php include "./utility/connector.php"?>
<?php
//Query
$select_ultimos_productos = "select producto_id,nombre,descripcion,nombre_archivo from productos order by fecha_agregacion desc limit 3";
$registros = mysqli_query($conexion, $select_ultimos_productos);
$output_testing = '<div id="nuevos-productos">';
while($registro = mysqli_fetch_row($registros)){
  $output_testing .=  '<a href="./paginas/productos_detalles.php" class="class-wrapper-nuevo-producto" id="'.$registro[0].'">
        <div class="class-imagenes-nuevo-producto">
            <img class="imagen-nuevo"  src="./logos/newtag.png">
            <img class="imagen-producto"  src="./productos/'.$registro[3].'">
        </div>
            <div class="class-texto-nuevo-producto"> 
            <h4 class="titulo-nombre-producto">'.$registro[1].'</h4>
            <p class="parrafo-descripcion-producto">'.$registro[2].'</p>
            <button style="width:65px;" class="boton-comprar">Comprar</button>
        </div><a/>
    ';
}
//Echo de elementos con nombre del archivo sacado de el query
$output_testing .= '</div>';
echo $output_testing;
?>