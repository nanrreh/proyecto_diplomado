<?php
require_once '../config/database.php';

/** Todo::switch para seleccionar que opcion se debe usar (Registro, Valvulas)*/
switch ($_REQUEST['opcion']) {
    case "create":
        $sql=" insert into tipo_cargo(nombre_cargo) 
                values('".$_REQUEST['nombre']."')";

        $consulta=mysqli_query($conexion, $sql);

        if ($consulta)
            echo 'true';
        else
            echo 'false';
        break;
    case "update":
        $sql="
                UPDATE tipo_cargo
                SET nombre_cargo = '".$_REQUEST['nombre']."'
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
                delete from tipo_cargo
                WHERE id = '".$_REQUEST['id']."'
        ";

        $consulta=mysqli_query($conexion, $sql);

        if ($consulta)
            echo 'true';
        else
            echo 'false';
        break;
    case "show":
        $sql="select * from tipo_cargo where id = '".$_REQUEST['id']."' ";

        $consulta=mysqli_query($conexion, $sql);

        echo json_encode(mysqli_fetch_assoc($consulta));
        break;
    case "admin":
        $sql="select * from tipo_cargo order by id desc";

        $consulta=mysqli_query($conexion, $sql);

        $datos = [];
        while ($fila = mysqli_fetch_assoc($consulta)) {
            $datos[] = $fila;
        }

        echo json_encode($datos);
        break;
}
