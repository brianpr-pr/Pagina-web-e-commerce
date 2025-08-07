export function comprobarRegistro(){if(localStorage.getItem("idUser")){
        document.getElementById("container-registrado").style.display = 'flex';
        document.getElementById("container-no-registrado").style.display = 'none';
    } else{
        document.getElementById("container-registrado").style.display = 'none';
        document.getElementById("container-no-registrado").style.display = 'flex';
    }
}