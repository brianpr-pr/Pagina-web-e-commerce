<?php include "./../../../utility/connector.php"?>
<?php
$data = file_get_contents(filename: "php://input");
$arr = json_decode($data, true);
$id = '';

if(isset($_POST)){
    $id = $arr['id'];
//Query
$output = '';   
$select_producto = "select * from productos where producto_id like '$id'";

$registros = mysqli_query($conexion, $select_producto);

while($registro = mysqli_fetch_row($registros)){
    $output .= '<div id="detalles-producto-imagen">
        <img id="producto-imagen-propiedades" src="./../productos/'.$registro[6].'">
    </div>
    <div id="detalles-producto-contenido">
        <div id="">
            <h1>'.$registro[1].'</h1>
        </div> 
        <div id="">
            <h4>'.$registro[4].'</h4>
        </div> 
        <div id="opiniones">
            <h5 id="">Fecha: </h5>
            <h5 id="">'.$registro[5].'</h5>
        </div> 
        <div id="texto-descriptivo-detalles-producto">
            <p>'.$registro[2].'</p>
        </div> 
        <div class="hrs"></div>
        <div id="cantidad-botones">
            <div id="cantida-botones-subcontainer">
                <p>Cantidad</p>
                <div id="botones-controlador">
                    <button id="menos" class="boton-controlador-class"  type="button">-</button>
                    <h3 id="numero">1</h3>
                    <button id="mas" class="boton-controlador-class" type="button">+</button>
                    <h4 id="precio-producto-detalles">'.$registro[3].'</h4>
                </div>
            </div> 
        </div> 

        <div class="hrs"></div>

        <div id="boton-añadir-carrito">
            <button id="boton-añadir-productos-carro" type="button"><a href="./../paginas/carro.php">Añadir al carrito</a></button>
        </div>  
    </div>';
}

echo $output;

} else {
    echo "Hola de nuevo.";
}
?>