<?php
//ejemplo3.php
$dwes = new mysqli('localhost', 'dwes', 'abc123', 'dwes');
if ($dwes->connect_error) {
    die('Connect Error (' . $mysqli->connect_errno . ') '
            . $mysqli->connect_error);
}
$dwes->set_charset("utf8");
if (isset($_GET['dato']) && isset($_GET['valor'])) {
    $error = null;
    if ($_GET['dato'] == 'email') {
        if (!strpos($_GET['valor'],"@")) {
            $error = "El correo electrónico no tiene @";
        } else {
            $resultado = $dwes->query('SELECT id FROM users WHERE lower(email) = "' . strtolower(trim($_GET['valor'])) . '"');
            if ($resultado->num_rows > 0) {
                $error = "El correo ya existe";
            }
        }
    } elseif ($_GET['dato'] == 'usuario') {
        $resultado = $dwes->query('SELECT id FROM users WHERE lower(username) = "' . strtolower(trim($_GET['valor'])) . '"');
        if ($resultado->num_rows > 0) {
            $error = "El usuario ya existe";
        }
    }
    if ($error) {
        echo $error;
    } else {
        echo "OK";
    }
}
?>