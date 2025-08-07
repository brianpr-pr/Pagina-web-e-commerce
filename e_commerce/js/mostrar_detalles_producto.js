export function mostrarProductoDetalles(){
    console.log("Que es esto:");
        if(localStorage.getItem("producto_detalles")){
            console.log(localStorage.getItem("producto_detalles"))
            /*En el archivo mostrar_productos.js he añadido un event onclick el cual modifica el valor del
            atributo "producto_detalles" para guardar el valor del id del container del producto el cual 
            halla sido clickado, este script es llamado desde la pagina productos_detalles.php
            Primero comprobamos que halla algún valor en el atributo , en caso de ser asi haremos un fetch 
            a un archivo .php del cual recuperaremos un container completo del cual mostraremos con este script alterando
            el DOM*/
            let id_producto = {
                id: localStorage.getItem("producto_detalles")
            }
            let options = {
                    "method" : "POST",
                    "headers" : {
                        "Content-Type": "application/json; charset=utf-8"
                    },
                    "body": JSON.stringify(id_producto)
                };
            fetch("./../includes/subpaginas/productos_detalles/mostrar_detalles_producto.php", options)
                .then((response) => {
                    return response.text();
                })
                .then((data) => {
                    document.getElementById("detalles-producto").innerHTML = data;
                    document.querySelectorAll(".boton-controlador-class").forEach(element => {
                        element.addEventListener("click", event => {
                            manejadorBotonesCantidad(event.target.innerHTML);
                    });

                    //Muestra el mensaje dos veces , cambiar console.log por script que pasae datos a pagina carro:
                    document.getElementById("boton-añadir-productos-carro").addEventListener("click", event => {
                        console.log("Añadir al carrito pulsado.");
                        añadirCarro(localStorage.getItem("producto_detalles"));
                    });
                })
            })
            .catch((mistake) => {
                    console.log("Error Fatal:",mistake);
            });       
        }
}

export function manejadorBotonesCantidad(idBoton){
    if(idBoton == "+"){
        document.getElementById("numero").innerText++;
    } else if(idBoton == "-" && document.getElementById("numero").innerText > 1){
        document.getElementById("numero").innerText--;
    }
}

function añadirCarro(elementoId){
    localStorage.setItem("producto_carrito_id", localStorage.getItem("producto_detalles"));
    localStorage.setItem("producto_carrito_cantidad", document.getElementById("numero").innerHTML);
}