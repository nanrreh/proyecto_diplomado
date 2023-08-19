<?php
require_once '../config/database.php';

/** Todo::switch para seleccionar que opcion se debe usar (Registro, Usuarios)*/
switch ($_REQUEST['opcion']) {
    case "promedio":
        $sql = "
           SELECT concat(`nombres`, ' ', `apellidos`, ': ' , r.cantidad_fruta, ' ', 'Kg' ) as 'nombre_completo'
           FROM empleados e
           INNER JOIN recoleccion r ON r.usuario_id = e.id_usuario
           WHERE  r.cantidad_fruta < 20 
           ORDER BY r.cantidad_fruta asc
            LIMIT 7 
        ";

        $consulta = mysqli_query($conexion, $sql);

        $datos = [];
        while ($fila = mysqli_fetch_assoc($consulta)) {
            $datos[] = $fila;
        }

        echo json_encode($datos);


        break;
    case "mejores":
        $sql = " 
            SELECT 
                   concat(`nombres`, ' ', `apellidos` ) as 'nombre_completo',
                   concat(r.cantidad_fruta, ' ', 'Kg' ) as 'cantidad',
                   e.path
            FROM empleados e
            INNER JOIN recoleccion r ON r.usuario_id = e.id_usuario
            ORDER BY r.cantidad_fruta DESC
            LIMIT 3
        ";

        $consulta = mysqli_query($conexion, $sql);

        $datos = [];
        while ($fila = mysqli_fetch_assoc($consulta)) {
            $datos[] = $fila;
        }

        echo json_encode($datos);
        break;
    case "best":
        $sql="
                SELECT 
                   concat(`nombres`, ' ', `apellidos` ) as 'nombre_completo',
                   e.path
            FROM empleados e
            INNER JOIN recoleccion r ON r.usuario_id = e.id_usuario
            ORDER BY r.cantidad_fruta DESC
            LIMIT 1
";

        $consulta=mysqli_query($conexion, $sql);

        echo json_encode(mysqli_fetch_assoc($consulta));
        break;

}
