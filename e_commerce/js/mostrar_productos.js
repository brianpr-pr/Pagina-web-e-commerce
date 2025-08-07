/**Me voy a ver un tutorial ahora vuelvo */
export function productosPorCategoria(categoria_selected){

let seleccion = {
    categoria: categoria_selected
}
let options = {
        "method" : "POST",
        "headers" : {
            "Content-Type": "application/json; charset=utf-8"
        },
        "body": JSON.stringify(seleccion)
    };
fetch("./../includes/subpaginas/productos/mostrar_productos_por_categoria.php", options)
    .then((response) => {
        return response.text();
    }).then((data) => {
        document.getElementById("container-productos").innerHTML = data;
        let numeroDeContenedores = document.getElementById("container-productos").children.length;
        if(numeroDeContenedores > 0){
            let numeroFilasGrid = Math.ceil( numeroDeContenedores/4);
            
            document.getElementById("container-productos").style.gridTemplateRows = `repeat(${numeroFilasGrid},250px)`;
            
            //llamada a otro metodo para agregarle un event listener:
            setEventClick([...document.getElementById("container-productos").children]);

        } 
        else{
            document.getElementById("container-productos").style.gridTemplateRows = `repeat(0,0px)`;
            document.getElementById("container-productos").style.gridTemplateColumns = `repeat(0,0px)`;
        }

    }).catch((mistake) => {
        console.log(mistake);
    });


}

export function setEventClick(arrElements){
    //console.log("Si funciona", arrElements);
    arrElements.forEach(element => {
        console.log(element);
        element.addEventListener("click", event => {
            //Falta guardar id en variable local para accederla desde el otro archivo php
        console.log("Click", element);  
        localStorage.setItem("producto_detalles", element.id);
        console.log("Final prueba:" , localStorage.getItem("producto_detalles"));
        });
    });
}