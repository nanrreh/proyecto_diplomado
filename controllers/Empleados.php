<?php
require_once '../config/database.php';

/** Todo::switch para seleccionar que opcion se debe usar (Registro, Usuarios)*/
switch ($_REQUEST['opcion']) {
    case "create":

        if (isset($_FILES['image'])) {

            $targetDirectory = '../img/uploads/'; // The directory where you want to save the uploaded images
            $name = rand(1000, 9999).'_'.basename($_FILES['image']['name']);
            $targetFile = $targetDirectory . $name;

            if (move_uploaded_file($_FILES['image']['tmp_name'], $targetFile)) {

                $image_path = $_SERVER['HTTP_ORIGIN'] . '/img/uploads/' . $name;

                $sql = "
                    insert into empleados(nombres, apellidos, documento, fecha_nacimiento, cargo_id, path)
                    values('" . $_REQUEST['nombres'] . "','" . $_REQUEST['apellidos'] . "','" . $_REQUEST['documento'] . "','" . $_REQUEST['fecha_nacimiento'] . "','" . $_REQUEST['cargo'] . "','" . $image_path . "')
                ";

                $consulta = mysqli_query($conexion, $sql);

                if ($consulta) {
                    echo 'true';
                } else {
                    echo 'false';
                }
            } else {
                echo 'false';
            }
        }

    break;
    case "update":

        $image_path = null;
        $sql = null;

        if (isset($_FILES['image'])) {

            $targetDirectory = '../img/uploads/'; // The directory where you want to save the uploaded images
            $name = rand(1000, 9999).'_'.basename($_FILES['image']['name']);
            $targetFile = $targetDirectory . $name;

            if (move_uploaded_file($_FILES['image']['tmp_name'], $targetFile)) {

                $image_path = $_SERVER['HTTP_ORIGIN'] . '/img/uploads/' . $name;

                $sql="
                UPDATE empleados
                SET 
                    nombres = '".$_REQUEST['nombres']."', 
                    apellidos = '".$_REQUEST['apellidos']."', 
                    documento = '".$_REQUEST['documento']."',
                    fecha_nacimiento = '".$_REQUEST['fecha_nacimiento']."',
                    cargo_id = '".$_REQUEST['cargo']."',
                    path = '".$image_path."'
                WHERE id_usuario = '".$_REQUEST['id']."'
                ";
            }

        }else{
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
        }

        if ($sql != null){
            $consulta=mysqli_query($conexion, $sql);

            if ($consulta)
                echo 'true';
            else
                echo 'false';
        }else
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
                SELECT u.id_usuario, u.nombres, u.apellidos, u.documento, u.fecha_nacimiento, tc.nombre_cargo AS  cargo, u.path
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
