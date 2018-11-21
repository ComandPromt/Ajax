<?php
header('Content-Type: application/json'); // Esta línea indica que la respuesta es JSON
header("Cache-Control: no-cache, must-revalidate"); // Esta línea ayuda a que la respuesta no se incluya en caché
// Fecha caducada
header("Expires: Mon, 26 Jul 1997 05:00:00 GMT"); // Esta línea ayuda a que la respuesta no se incluya en caché

$dwes = new mysqli('localhost', 'dwes', 'abc123', 'dwes');
if ($dwes->connect_error) {
    die('Connect Error (' . $mysqli->connect_errno . ') '
            . $mysqli->connect_error);
}
$dwes->set_charset("utf8");
if (isset($_GET['id'])) {
    $resultado = $dwes->query('SELECT * FROM modulos WHERE id_ciclo = ' . $_GET['id']);
    echo "<span onmouseout=\"quitarDescripcion()\">";
    while ($modulo = $resultado->fetch_assoc()){
        echo "<span onmouseover=\"mostrarDescripcion(".$modulo['id'].")\"><input id=\"".$modulo['id_ciclo']."\" name=\"asignaturas[]\"  type=\"checkbox\" value=\"".$modulo['id']."\">".$modulo['abreviatura']."</span>";
    }
    echo "</span>";
} else {
    echo "";
}
?>