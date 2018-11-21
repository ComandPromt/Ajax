<html>

<head>
    <meta charset="utf8" />
    <script>
        function mostrarDescripcion(idCiclo) {

          if (idCiclo == "") {
                document.getElementById("pie").innerHTML = "";
                document.getElementById("pie").disabled = true;
                return;
            } else {
                if (window.XMLHttpRequest) {
                    // code for IE7+, Firefox, Chrome, Opera, Safari
                    xmlhttp = new XMLHttpRequest();
                } else {
                    // code for IE6, IE5
                    xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
                }
                xmlhttp.onreadystatechange = function () {
                    if (this.readyState == 4 && this.status == 200) {
document.getElementById("pie").innerHTML =this.responseText;
                   //     document.getElementById("selCiclos").disabled = false;
                    }
                };
              
                xmlhttp.open("GET", "ejemplo2.php?modulo=" + idCiclo, true);
                xmlhttp.send();
            }
        
/*
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



*/
alert(idComunidad);
/*
fetch('ejemplo2.php?id=' + str).then(function(response){
            //convertimos a JSON
            return response.json();
        }).then(function(descripcion){
            document.getElementById("descripcion").innerHTML= "<br/>" + descripcion.nombre;
            document.getElementById("descripcion").innerHTML+= " - " + descripcion.horas + " horas semanales.";
        });
               
                xmlhttp.open("GET", "ejemplo2.php?modulo=" + idComunidad, true);
                xmlhttp.send();
         */   
        }

        function actualizaCiclos(idCiclo) {
            if (idCiclo == "") {
                document.getElementById("selCiclos").innerHTML = "";
                document.getElementById("selCiclos").disabled = true;
                return;
            } else {
                if (window.XMLHttpRequest) {
                    // code for IE7+, Firefox, Chrome, Opera, Safari
                    xmlhttp = new XMLHttpRequest();
                } else {
                    // code for IE6, IE5
                    xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
                }
                xmlhttp.onreadystatechange = function () {
                    if (this.readyState == 4 && this.status == 200) {
document.getElementById("selCiclos").innerHTML =this.responseText;
                   //     document.getElementById("selCiclos").disabled = false;
                    }
                };
              
                xmlhttp.open("GET", "ejemplo2.php?id=" + idCiclo, true);
                xmlhttp.send();
            }
        
          //  document.getElementById("pie").innerHTML = "Desarrollo web en entorno servidor 8h";
        }
    </script>
</head>

<body>

    <form>
        <label>Ciclo</label>
        <select name="users" onchange="actualizaCiclos(this.value)">
            <?php
            $dwes = new mysqli('localhost', 'dwes', 'abc123', 'dwes');
            $resultado = $dwes->query('
            SELECT id, abreviatura FROM ciclos
     ORDER BY abreviatura ASC
            ');
        echo '<option value="">Seleccione...</option>';
        while ($provincia = $resultado->fetch_assoc()) {
            echo '<option value="' . $provincia['id'] . '">' .
             $provincia['abreviatura'] . '</option>';
        }
           ?>
        </select>
        <br/><br/>
        <div id="selCiclos"></div>
        <br/>
        <div id="pie" disabled></div>

    </form>
    <br>

</body>

</html>