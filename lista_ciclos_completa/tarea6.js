function mostrarChecks(idCiclo) {
    if (idCiclo == "") {
        document.getElementById("checks").innerHTML = "";
        document.getElementById("checks").disabled = true;
        return;
    } else {
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("checks").innerHTML = this.responseText;
                document.getElementById("checks").disabled = false;
            }
        };
        xmlhttp.open("GET","checks.php?id="+idCiclo,true);
        xmlhttp.send();
    }
}

function mostrarDescripcion(str) {
    if (str.length == 0) {
        document.getElementById("descripcion").innerHTML = "";
        return;
    } else{
        fetch('descripcion.php?id=' + str).then(function(response){
            //convertimos a JSON
            return response.json();
        }).then(function(descripcion){
            document.getElementById("descripcion").innerHTML= "<br/>" + descripcion.nombre;
            document.getElementById("descripcion").innerHTML+= " - " + descripcion.horas + " horas semanales.";
        });
    }
}

function quitarDescripcion() {
    document.getElementById("descripcion").innerHTML = "";
}

function comprobarEmail(str) {
    if (str.length == 0) {
        document.getElementById("errorEmail").innerHTML = "";
        document.getElementById("enviar").disabled = true;
        return;
    } else {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                if (this.responseText != "OK") {
                    document.getElementById("errorEmail").innerHTML = this.responseText;
                    document.getElementById("enviar").disabled = true;
                }else{
                    document.getElementById("errorEmail").innerHTML = "";
                    document.getElementById("enviar").disabled = false;
                }
            }
        };
        xmlhttp.open("GET", "email.php?q=" + str, true);
        xmlhttp.send();
    }
}