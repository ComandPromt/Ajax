// ejemplo4.js
function mostrarUsuario(str) {
    if (str.length == 0) {
        document.getElementById("empresa").innerHTML = "";
        document.getElementById("contacto").innerHTML = "";
        document.getElementById("direccion").innerHTML = "";
        document.getElementById("ciudad").innerHTML = "";
        document.getElementById("pais").innerHTML = "";
        return;
    } else {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {
                var xmlDoc = this.responseXML;
                document.getElementById("spnNombre").innerHTML=
                xmlDoc.getElementsByTagName("nombre")[0].childNodes[0].nodeValue;
                document.getElementById("spnApellido").innerHTML=
                xmlDoc.getElementsByTagName("apellido")[0].childNodes[0].nodeValue;
                document.getElementById("spnTrabajo").innerHTML=
                xmlDoc.getElementsByTagName("trabajo")[0].childNodes[0].nodeValue;
                document.getElementById("spnEdad").innerHTML="Edad: " +
                xmlDoc.getElementsByTagName("edad")[0].childNodes[0].nodeValue;
                document.getElementById("spnCiudad").innerHTML="<br/>De: " +
                xmlDoc.getElementsByTagName("ciudad")[0].childNodes[0].nodeValue;
            }
        };
        xmlhttp.open("GET", "ejemplo4.php?q=" + str, true);
        xmlhttp.send();
    }
}