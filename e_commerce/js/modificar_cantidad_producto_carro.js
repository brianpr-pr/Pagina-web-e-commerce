export function modificarCantidad(idProducto,idCarro,cantidad){
    //console.log("Funciona");
    console.log(idProducto,idCarro,cantidad);

    let datos = {
        idProducto : idProducto,
        idCarro: idCarro,
        cantidad :cantidad 
    };

    let options = {
        "method" : "POST",
        "headers" : {
            "Content-Type": "application/json; charset=utf-8"
        },
        "body": JSON.stringify(datos)
    };

    fetch("./../includes/subpaginas/carro/update_cantidad_productos.php", options)
        .then((response) => {
            return response.text();
        })
        .then((data) => {
            //document.getElementById("productos-en-carro").innerHTML = data;
            console.log("Once");
        })
        .catch((mistake) => {
            console.log("Error Fatal:",mistake);
        }
    );  
}