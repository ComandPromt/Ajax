<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="tarea6.js"></script>
    <title>Document</title>
</head>
<body>
    <h2>Matrícula</h2>
    <form id="first_form" method="post" action="">
        <div>
          <label for="first_name">Nombre:</label>
          <input type="text" id="first_name" name="first_name"></input>
        </div>
        <div>
          <label for="last_name">Apellidos:</label>
          <input type="text" id="last_name" name="last_name"></input>
        </div>
        <div>
          <label for="user_email">Email:</label>
          <input type="email" id="user_email" name="user_email" onkeyup="comprobarEmail(this.value)"></input>
          <span id="errorEmail" style="color:red;"></span>
        </div>
        Ciclo:
        <select id= "users" name="users" onchange="mostrarChecks(this.value)">
            <option value="">Seleccione...</option>
            <?php 
                $dwes = new mysqli('localhost', 'dwes', 'abc123', 'dwes');
                if ($dwes->connect_error) {
                    die('Connect Error (' . $mysqli->connect_errno . ') '
                            . $mysqli->connect_error);
                }
                
                $dwes->set_charset("utf8");
                $resultado = $dwes->query('SELECT * FROM ciclos');
                foreach($resultado as $valor){
                    echo '<option value="'.$valor['id'].'">'.$valor['abreviatura'].'</option>';
                }
                $dwes->close();
            ?>
        </select>
        <div id="checks"></div>
        <div id="descripcion"></div>
        <div>
          <input id="enviar" name="enviar" type="submit" value="Enviar" disabled/>
          <?php
            try {
                //USAR UTF-8
                $opciones = array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8");
                //CONECTAR CON LA BBDD
                $dbh = new PDO('mysql:host=localhost;dbname=dwes', 'dwes', 'abc123', $opciones);
                //SI HAY ERRORES, SALIR
            } catch (PDOException $p) {
                exit("Error ".$p->getMessage()."<br />");
            }
            if (isset($_POST['enviar'])) {
                $nombre = $_POST['first_name'];
                $ape = $_POST['last_name'];
                $email = $_POST['user_email'];
                $ciclo = $_POST['users'];
                $boxes = $_POST['asignaturas'];
                try {
                    $tmt = $dbh->prepare("INSERT INTO alumnos (nombre, apellidos, email) VALUES(?,?,?)");
                    $tmt2 = $dbh->prepare("INSERT INTO alumnoCiclo (idAlumno, idCiclo) VALUES(?,?)");
                    $tmt3 = $dbh->prepare("INSERT INTO alumnoModulo (idAlumno, idModulo) VALUES(?,?)");
                    try {
                        $dbh->beginTransaction();
                        $tmt->execute( array($nombre, $ape, $email));
                        $id = $dbh->lastInsertId();
                        $tmt2->execute( array($id, $ciclo));
                        foreach($boxes as $box){
                            $tmt3->execute( array($id, $box));
                        }
                        $dbh->commit();
                    } catch(PDOExecption $e) {
                        $dbh->rollback();
                        print "Error!: " . $e->getMessage() . "</br>";
                    }
                } catch( PDOExecption $e ) {
                    print "Error!: " . $e->getMessage() . "</br>";
                } 
            }
          ?>
        </div>
    </form>
</body>
</html>