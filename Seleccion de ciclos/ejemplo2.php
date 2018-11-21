<?php

$dwes = new mysqli('localhost', 'dwes', 'abc123', 'dwes');

if ($dwes->connect_error) {
    die('Connect Error (' . $mysqli->connect_errno . ') '
        . $mysqli->connect_error);
}

$dwes->set_charset("utf8");

if (isset($_GET['id'])) {
    $resultado = $dwes->query('
    SELECT id,abreviatura FROM modulos WHERE id_ciclo=' . $_GET['id'] . '
      ORDER BY abreviatura ASC');

    while ($ciclo = $resultado->fetch_assoc()) {
        echo '<input type="checkbox"
        value="'.$ciclo['id'].'"
        onmouseover="mostrarDescripcion('.$ciclo['id'].');">' . $ciclo['abreviatura']. '</input>';
    }
}

if (isset($_GET['modulo'])) {

    $resultado = $dwes->query('
    SELECT nombre,horas FROM modulos WHERE id='.$_GET['modulo']);
    while ($modulo = $resultado->fetch_assoc()) {
        echo $modulo['nombre'].' ('.$modulo['horas'].' horas)';
    }
}
