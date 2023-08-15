<?php
require_once '../config/database.php';

/** Todo::switch para seleccionar que opcion se debe usar (Registro, Recoleccion)*/
switch ($_REQUEST['opcion']) {
    case "create":
        $sql="
        insert into recoleccion(usuario_id, cantidad_fruta, fecha, encargado_id, valvula_id) 
        values('".$_REQUEST['recolector_id']."','".$_REQUEST['cantidad']."', Now(),'".$_REQUEST['encargado']."','".$_REQUEST['valvula']."')";

        $consulta=mysqli_query($conexion, $sql);

        if ($consulta)
            echo 'true';
        else
            echo 'false';
        break;
    case "update":
        $sql="
                UPDATE recoleccion
                SET 
                    usuario_id = '".$_REQUEST['recolector_id']."', 
                    cantidad_fruta = '".$_REQUEST['cantidad']."', 
                    encargado_id = '".$_REQUEST['encargado']."',
                    valvula_id = '".$_REQUEST['valvula']."'
                WHERE id = '".$_REQUEST['id']."'
        ";

        $consulta=mysqli_query($conexion, $sql);

        if ($consulta)
            echo 'true';
        else
            echo 'false';
        break;
    case "delete":
        $sql="
                delete from recoleccion
                WHERE id = '".$_REQUEST['id']."'
        ";

        $consulta=mysqli_query($conexion, $sql);

        if ($consulta)
            echo 'true';
        else
            echo 'false';
        break;
    case "show":
        $sql="select * from recoleccion where id = '".$_REQUEST['id']."' ";

        $consulta=mysqli_query($conexion, $sql);

        echo json_encode(mysqli_fetch_assoc($consulta));

        break;
    case "admin":
        $sql="
                SELECT r.id, CONCAT(e.nombres,' ',e.apellidos) AS recolector, r.cantidad_fruta AS cantidad, r.fecha, CONCAT(ee.nombres,' ',ee.apellidos) AS encargado, v.nombre AS valvula FROM recoleccion r
                INNER JOIN empleados e ON e.id_usuario = r.usuario_id
                INNER JOIN empleados ee ON ee.id_usuario = r.encargado_id
                INNER JOIN valvulas v ON v.id = r.valvula_id
                ORDER BY r.id DESC
        ";

        $consulta=mysqli_query($conexion, $sql);

        $datos = [];
        while ($fila = mysqli_fetch_assoc($consulta)) {
            $datos[] = $fila;
        }

        echo json_encode($datos);
        break;
}
