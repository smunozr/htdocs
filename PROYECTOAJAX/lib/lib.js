function guiLogout(datos) {
   alert(datos);
}
function cargaGui(param,div) {

    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            div.innerHTML = this.responseText;
        }

    }
    xhttp.open("POST", param, true);
    xhttp.send();
}

function comunicarServer(func,callback,param) {
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            let datos=this.responseText;
            callback(datos);
        }

    }
    xhttp.open("GET", "Api.php?func="+func, true);
    xhttp.send();
}