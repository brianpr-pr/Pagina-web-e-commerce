<?php include "./../../../utility/connector.php"?>
<?php
$data = file_get_contents(filename: "php://input");
$datosProducto = json_decode($data, true);
$productoId = $datosProducto['id'];
$cantidadProductos = $datosProducto['cantidad'];
$usuarioId = $datosProducto['usuario'];

if(isset($_POST)){
//Conseguir el carro_id perteneciente a mi usuario
$get_carro_id = "select carro_id from usuarios where usuario_id like '".$usuarioId."'";
$rows_returned= mysqli_query($conexion, $get_carro_id);
$carro_id = '';
while ($row = mysqli_fetch_row($rows_returned)){
    $carro_id = $row[0];
}

//Conseguir el precio del producto que se me ha pasado dentro del fetch
//para en caso de este no existir en la base de datos ,poder crear nuevo registro.
$get_producto_precio = "select precio from productos where producto_id like '".$productoId."'";

$column_returned = mysqli_query($conexion, $get_producto_precio);

$precio_producto = '';
while ($colmn = mysqli_fetch_row($column_returned)){
    $precio_producto = $colmn[0];
}

//Query
$cantidadOld = '';   
$productoIdEncontrado = '';
$carroIdEncontrado = '';
//$select_query = "select producto_id,carro_id,cantidad from producto_per_carro where producto_id like '".$productoId."' and carro_id in (select carro_id from usuarios where usuario_id like '".$usuarioId."')";
$select_query = "select * from producto_per_carro where producto_id like '".$productoId."' and carro_id like '".$carro_id."'";

$registros = mysqli_query($conexion, $select_query);

while($registro = mysqli_fetch_row($registros)){
    $productoIdEncontrado = $registro[0];
    $carroIdEncontrado = $registro[1];
    $cantidadOld = $registro[2];
}

//en caso de que encontremos un producto igual se realiza un update modificando la cantidad de esta
if($productoIdEncontrado and $carroIdEncontrado){
    $nuevaCantidad = $cantidadOld + $cantidadProductos;
    //actualizar datos
    $update_query = "update producto_per_carro set cantidad = '".$nuevaCantidad."' where producto_id like '".$productoIdEncontrado."' and carro_id like '".$carroIdEncontrado."'";
    mysqli_query($conexion, $update_query);
} 
//En caso de no encontrar se realiza un insert
else {
    $precio_total_carrito = ($cantidadProductos * $precio_producto);
    $insert_producto = "insert into producto_per_carro values ('".$productoId."', '".$carro_id."',$cantidadProductos,$precio_total_carrito)";
    mysqli_query($conexion, $insert_producto);
}

//Despues de realizar los updates o inserts pertinentes
//devolvemos los datos en formato html
$select_all_data = "select  a.cantidad, a.precio_total, p.nombre, p.nombre_archivo, a.producto_id from producto_per_carro  as a join productos as p
on p.producto_id = a.producto_id
where a.carro_id like '".$carro_id."'";
$server_final_response = '';
$all_data = mysqli_query($conexion, $select_all_data);
while($returned_rows = mysqli_fetch_row($all_data)){
    $server_final_response .= '<div class="item-en-carro">
            <div class="info-item">
                <img class="info-item-imagen" src="./../productos/'.$returned_rows[3].'">
                <div class="info-item-texto">
                    <h4>'.$returned_rows[2].'</h4>
                    <h5>'.$returned_rows[1].'</h5>
                </div>
            </div>
            <div class="acciones-item">
                <div class="acciones-item-cantidad">
                    <div class="acciones-item-cantidad-texto">
                        <h4 class="cantidad_items">'.$returned_rows[0].'</h4>
                    </div>
                    <div class="acciones-item-cantidad-botones">
                        <button class="sumar-restar restar" type="button">-</button>
                        <button class="sumar-restar sumar" type="button">+</button>
                    </div>
                </div>
                <div class="acciones-item-eliminar">
                    <button class="acciones-item-eliminar-boton" type="button">Eliminar</button>
                </div>
            </div>
        </div>
        <div style="margin-top:22px;" id="'.$returned_rows[4].'" class="'.$carro_id.'"></div>';
}


echo $server_final_response;
}
?>