<?php include "./../../../utility/connector.php"?>
<?php
//Query
$output_test = '';   
$select_categorias = "select distinct categoria from productos";
$registros = mysqli_query($conexion, $select_categorias);

while($registro = mysqli_fetch_row($registros)){
    $output_test .= "<option>".$registro[0]."</option>";
}
echo $output_test;
?>
