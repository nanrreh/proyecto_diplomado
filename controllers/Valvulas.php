<?php
require_once '../config/database.php';

/** Todo::switch para seleccionar que opcion se debe usar (Registro, Usuarios)*/
switch ($_REQUEST['opcion']) {
    case "create":
        $sql=" insert into valvulas(nombre, estado, comentario) 
                values('".$_REQUEST['nombre']."','".$_REQUEST['estado']."','".$_REQUEST['comentario']."')";

        $consulta=mysqli_query($conexion, $sql);

        if ($consulta)
            echo 'true';
        else
            echo 'false';
        break;
    case "update":
        $sql="
                UPDATE valvulas
                SET nombre = '".$_REQUEST['nombre']."', estado = '".$_REQUEST['estado']."', comentario = '".$_REQUEST['comentario']."'
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
                delete from valvulas
                WHERE id = '".$_REQUEST['id']."'
        ";

        $consulta=mysqli_query($conexion, $sql);

        if ($consulta)
            echo 'true';
        else
            echo 'false';
        break;
    case "show":
        $sql="select * from valvulas where id = '".$_REQUEST['id']."' ";

        $consulta=mysqli_query($conexion, $sql);

        echo json_encode(mysqli_fetch_assoc($consulta));
        break;
    case "admin":
        $sql="select * from valvulas order by id desc";

        $consulta=mysqli_query($conexion, $sql);

        $datos = [];
        while ($fila = mysqli_fetch_assoc($consulta)) {
            $datos[] = $fila;
        }

        echo json_encode($datos);
        break;
}
