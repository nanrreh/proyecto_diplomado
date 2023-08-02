<?php
require_once '../config/database.php';

/** Todo::switch para seleccionar que opcion se debe usar (Registro, Usuarios)*/
switch ($_REQUEST['opcion']) {
    case "create":
        $sql=" insert into valvulas(nombre) values('".$_REQUEST['obj_valvula']['nombre']."')";

        $consulta=mysqli_query($conexion, $sql);

        if ($consulta)
            echo 'Válvula creada';
        else
            echo 'Error en la creación de la válvula';
        break;
    case "update":
        echo "i es una barra";
        break;
    case "delete":
        echo "i es un pastel";
        break;
    case "show":
        $sql="select nombre from valvulas";

        $consulta=mysqli_query($conexion, $sql);

        $datos = [];
        while ($fila = mysqli_fetch_assoc($consulta)) {
            $datos[] = $fila;
        }

        echo json_encode($datos);
        break;
}
