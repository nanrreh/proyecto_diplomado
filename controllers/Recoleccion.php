<?php
require_once '../config/database.php';

/** Todo::switch para seleccionar que opcion se debe usar (Registro, Recoleccion)*/
switch ($_REQUEST['opcion']) {
    case "create":
        $sql="
        insert into recoleccion(usuario_id, cantidad_fruta, fecha, encargado_id) 
        values(".$_REQUEST['obj_recoleccion']['recolector'].",".$_REQUEST['obj_recoleccion']['cantidad'].", NOW(),".$_REQUEST['obj_recoleccion']['encargado'].")";

        $consulta=mysqli_query($conexion, $sql);

        if ($consulta)
            echo 'true';
        else
            echo 'false';
        break;
    case "update":
        echo "i es una barra";
        break;
    case "delete":
        echo "i es un pastel";
        break;
    case "show":
        $accion_nm = "SELECT CONCAT(u1.nombres,' ',u1.apellidos) AS recolector, r.cantidad_fruta, r.fecha, CONCAT(u2.nombres,' ',u2.apellidos) AS encargado FROM recoleccion r
                    INNER JOIN (SELECT * FROM usuarios WHERE cargo_id = 1) u1 ON u1.id_usuario = r.usuario_id 
                    INNER JOIN (SELECT * FROM usuarios WHERE cargo_id = 2) u2 ON u2.id_usuario = r.encargado_id";

        $consulta=mysqli_query($conexion,$accion_nm);

        $datos = [];
        while ($fila = mysqli_fetch_assoc($consulta)) {
            $datos[] = $fila;
        }

        echo json_encode($datos);

        break;
}
