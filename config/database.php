<?php

//CONEXIÓN A LA BASE DE DATOS
$hostname_db = "localhost";
$database_db = "diplomado_web";
$username_db = "root";
$password_db = "";
//Conectar a la base de datos
$conexion = mysqli_connect($hostname_db, $username_db, $password_db);
mysqli_query($conexion,"SET CHARACTER SET 'utf8'");
mysqli_query($conexion,"SET SESSION collation_connection ='utf8_unicode_ci'");
//Seleccionar la base de datos
mysqli_select_db($conexion,$database_db) or die ("Ninguna DB seleccionada");
