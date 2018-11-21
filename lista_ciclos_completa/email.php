<?php
//ejemplo3.php
$dwes = new mysqli('localhost', 'dwes', 'abc123', 'dwes');
if ($dwes->connect_error) {
    die('Connect Error (' . $mysqli->connect_errno . ') '
            . $mysqli->connect_error);
}
$dwes->set_charset("utf8");
if (isset($_GET['q'])) {
    $resultado = $dwes->query('SELECT id FROM alumnos WHERE lower(email) = "' . strtolower(trim($_GET['q'])) . '"');
    if ($resultado->num_rows > 0) {
        echo "El correo ya existe";
        
    } else {
        if(!strpos($_GET['q'], '@')){
            echo "Debe contener @";
        }else{
            echo "OK";
        }
    }
} else {
    echo "";
}
?>