<!-- ejemplo2.html -->
<html>

<head>
    <meta charset="utf8" />
    <script>
        function actualizaProvincias(idComunidad) {
            if (idComunidad == "") {
                document.getElementById("selProvincia").innerHTML = "";
                document.getElementById("selProvincia").disabled = true;
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
                        document.getElementById("selProvincia").innerHTML = this.responseText;
                        document.getElementById("selProvincia").disabled = false;
                    }
                };
                xmlhttp.open("GET", "ejemplo2.php?id=" + idComunidad, true);
                xmlhttp.send();
            }
        }
        function actualizaMunicipios(idMunicipio) {
            if (idMunicipio == "") {
                document.getElementById("selMunicipios").innerHTML = "";
                document.getElementById("selMunicipios").disabled = true;
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
                        document.getElementById("selMunicipios").innerHTML = this.responseText;
                        document.getElementById("selMunicipios").disabled = false;
                    }
                };
                xmlhttp.open("GET", "ejemplo2.php?idm=" + idMunicipio, true);
                xmlhttp.send();
            }
        }
    </script>
</head>

<body>

    <form>
        <label>Comunidad</label>
        <select name="users" onchange="actualizaProvincias(this.value)">
            <?php
            $dwes = new mysqli('localhost', 'dwes', 'abc123', 'prueba');
            $resultado = $dwes->query('
            SELECT id, comunidad FROM comunidades
     ORDER BY comunidad ASC
            ');
        echo '<option value="">Seleccione...</option>';
        while ($provincia = $resultado->fetch_assoc()) {
            echo '<option value="' . $provincia['id'] . '">' . $provincia['comunidad'] . '</option>';
        }
           ?>
        </select>
        <label>Provincia</label>
        <select id="selProvincia" onchange="actualizaMunicipios(this.value)" disabled>
        </select>
        <label>Municipios</label>
        <select id="selMunicipios" disabled>
        </select>
    </form>
    <br>

</body>

</html>