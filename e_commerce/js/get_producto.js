import {modificarCantidad} from "./modificar_cantidad_producto_carro.js";
export function getItem(){
    let itemId = localStorage.getItem("producto_carrito_id");
    let itemCantidad = localStorage.getItem("producto_carrito_cantidad");
    let idUser = localStorage.getItem("idUser");
    console.log("Hola", itemId, itemCantidad);
    let datos_producto = {
        id: itemId,
        cantidad: itemCantidad,
        usuario: idUser
    }
    let options = {
            "method" : "POST",
            "headers" : {
            "Content-Type": "application/json; charset=utf-8"},
            "body": JSON.stringify(datos_producto)
        };

    fetch("./../includes/subpaginas/carro/mostrar_productos.php", options)
        .then((response) => {
            return response.text();
        })
        .then((data) => {
            document.getElementById("productos-en-carro").innerHTML = data;
    })
    .catch((mistake) => {
            console.log("Error Fatal:",mistake);
    });  
}