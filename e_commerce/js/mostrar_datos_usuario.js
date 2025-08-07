export function mostrarDatos(){
    let obj = {
        userId : localStorage.getItem("idUser")
    }
    console.log(obj.userId);

    let options = {
        "method" : "POST",
        "headers" : {
            "Content-Type": "application/json; charset=utf-8"
        },
        "body": JSON.stringify(obj)
    };

    fetch("./../includes/subpaginas/cuenta/datos_usuario.php", options)
        .then((response) => {
            return response.text();
        })
        .then((data) => {
            let botonClick = '';
            //console.log(data);
            document.getElementById("container-registrado").innerHTML = data;
            [...document.querySelectorAll(".editar-logo")].forEach(element => {
                element.addEventListener("click", event => {
                    editarDatoUsuario(event.target);
                    botonClick  = event.target;
                });
            });
            //console.log("Elemento:", document.getElementById("close-botton"));
            document.getElementById("close-botton").addEventListener("click", event => {
                escapePopUp();
            });

            document.getElementById("guardar-cambios").addEventListener("click", event => {
                realizarCambios(botonClick.parentElement.id, document.getElementById("datos-sobrescribir").value);
            });
        })
        .catch((mistake) => {
            console.log("Error Fatal:",mistake);
        }
    ); 
}

function editarDatoUsuario(elementoSeleccionado){
    console.log(elementoSeleccionado.parentElement.innerHTML);
    document.getElementById("container-registrado").style.filter = "blur(8px)";
    document.getElementById("elemento-modificar").style.display = "flex";
}

function escapePopUp(){
    document.getElementById("container-registrado").style.filter = "blur(0px)";
    document.getElementById("elemento-modificar").style.display = "none";
}

function realizarCambios(columna, inputText){
    //console.log(columna);
    let datoModificar = {
        columna: columna,
        idUser: localStorage.getItem("idUser"),
        newData: inputText
    }

    console.log(datoModificar.columna);

    let opciones = {
        "method" : "POST",
        "headers" : {
            "Content-Type": "application/json; charset=utf-8"
        },
        "body": JSON.stringify(datoModificar)
    };
fetch("./../includes/subpaginas/cuenta/update_datos_usuario.php", opciones)
    .then((response) => {
        return response.text();
    })
    .then((data) => {
        console.log(data);
})
            .catch((mistake) => {
                    console.log("Error Fatal:",mistake);
            });
}