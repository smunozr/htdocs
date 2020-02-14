function guiLogout(datos) {
   alert(datos);

}

function guilogger(datos) {
    parser = new DOMParser();
    objXML=parser.parseFromString(datos, "text/xml");
    resp=objXML.getElementsByTagName("status")[0].textContent
    if(resp=="OK"){
        document.getElementById("central").innerHTML="";
    }
}

function guiSelect(datos){
    ObjJson=JSON.parse(datos);
    console.log(JSON.stringify(ObjJson))
    let contenedor=document.getElementById("central")
    let table=document.createElement("table")
    let row=document.createElement("tr")
    let col=document.createElement("td")



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
    let url_params="";
    if(param!=null) {
        for (key of Object.keys(param)) {
            url_params += "&" + key + "=" + param[key];
        }
    }
    let xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            let datos=this.responseText;
            callback(datos);
        }
    }
    let url = "api.php?func="+func+url_params
    xhttp.open("GET", url, true);
    xhttp.send();
}