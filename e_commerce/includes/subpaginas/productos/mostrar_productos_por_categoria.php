<?php include "./../../../utility/connector.php"?>
<?php
$data = file_get_contents(filename: "php://input");
$arr = json_decode($data, true);
$categoria = '';

if(isset($_POST)){
    $categoria = $arr['categoria'];
//Query
$output_test = '';   
$select_categorias = "select producto_id,nombre,precio, nombre_archivo from productos where categoria like '$categoria'";
$registros = mysqli_query($conexion, $select_categorias);

while($registro = mysqli_fetch_row($registros)){
    $output_test .= '<div id="'.$registro[0].'" class="producto"><a style="color:black;text-decoration: none;" class="link-producto" target="_blanck" href="./productos_detalles.php">
            <img src="./../productos/'.$registro[3].'" class="img-producto">
            <p class="nombre-producto">'.$registro[1].'</p>
            <p class="precio-producto">'.$registro[2].'</p>    
            </a>
        </div>';
}

echo $output_test;
} else {
    echo "Hola de nuevo.";
}
?>