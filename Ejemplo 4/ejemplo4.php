<?php
header('Content-Type: text/xml'); 
header("Cache-Control: no-cache, must-revalidate"); 
header("Expires: Mon, 26 Jul 1997 05:00:00 GMT"); 

$dwes = new mysqli('localhost', 'dwes', 'abc123', 'dwes');
if ($dwes->connect_error) {
    die('Connect Error (' . $mysqli->connect_errno . ') '
            . $mysqli->connect_error);
}

if(isset($_GET['q'])){
$dwes->set_charset("utf8");

$resultado = $dwes->query('SELECT * FROM familyguy WHERE id = ' . $_GET['q']);
echo '<?xml version="1.0" encoding="ISO-8859-1"?>
<persona>';
while ($persona = $resultado->fetch_assoc()){
    echo "<nombre>" . $persona['nombre'] . "</nombre>";
    echo "<apellido>" . $persona['apellido'] . "</apellido>";
    echo "<edad>" . $persona['edad'] . "</edad>";
    echo "<ciudad>" . $persona['ciudad'] . "</ciudad>";
    echo "<trabajo>" . $persona['trabajo'] . "</trabajo>";
}
echo "</persona>";

$dwes->close();
}
?>