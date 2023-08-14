<?php
require_once '../config/database.php';

/** Todo::switch para seleccionar que opcion se debe usar (Registro, Usuarios)*/
switch ($_REQUEST['opcion']) {
    case "create":
        $sql="
        insert into empleados(nombres, apellidos, documento, fecha_nacimiento, cargo_id)
        values('".$_REQUEST['nombres']."','".$_REQUEST['apellidos']."','".$_REQUEST['documento']."','".$_REQUEST['fecha_nacimiento']."',".$_REQUEST['cargo'].")";

        $consulta=mysqli_query($conexion, $sql);

        if ($consulta)
            echo 'true';
        else
            echo 'false';
    break;
    case "update":
        $sql="
                UPDATE empleados
                SET 
                    nombres = '".$_REQUEST['nombres']."', 
                    apellidos = '".$_REQUEST['apellidos']."', 
                    documento = '".$_REQUEST['documento']."',
                    fecha_nacimiento = '".$_REQUEST['fecha_nacimiento']."',
                    cargo_id = '".$_REQUEST['cargo']."'
                WHERE id_usuario = '".$_REQUEST['id']."'
        ";

        $consulta=mysqli_query($conexion, $sql);

        if ($consulta)
            echo 'true';
        else
            echo 'false';
    break;
    case "delete":
        $sql="
                delete from empleados
                WHERE id_usuario = '".$_REQUEST['id']."'
        ";

        $consulta=mysqli_query($conexion, $sql);

        if ($consulta)
            echo 'true';
        else
            echo 'false';
    break;
    case "show":

        $sql="select * from empleados where id_usuario = '".$_REQUEST['id']."' ";

        $consulta=mysqli_query($conexion, $sql);

        echo json_encode(mysqli_fetch_assoc($consulta));
    break;
    case "admin":
        $sql="
                SELECT u.id_usuario, u.nombres, u.apellidos, u.documento, u.fecha_nacimiento, tc.nombre_cargo AS  cargo
                FROM empleados u 
                INNER JOIN tipo_cargo tc ON tc.id = u.cargo_id
                ORDER BY id_usuario DESC
        ";

        $consulta=mysqli_query($conexion, $sql);

        $datos = [];
        while ($fila = mysqli_fetch_assoc($consulta)) {
            $datos[] = $fila;
        }

        echo json_encode($datos);
    break;
}
