<?php
include("/admin/conecction.php"); // Corregir el nombre del archivo de conexión

if (isset($_POST['alta'])){
    $nombre = $_POST['cl_nombre'];
    $apellido_paterno = $_POST['cl_apellidomat'];
    $apellido_materno = $_POST['cl_apellidopa']; 
    $tel = $_POST['cl_numtelefono'];
    $correo = $_POST['cl_correo'];
    $direccion = $_POST['cl_direccion'];

    $query = "INSERT INTO clientes (cl_nombre, cl_apellidomat, cl_apellidopa, cl_numtelefono, cl_correo, cl_direccion)
              VALUES ('$nombre', '$apellido_paterno', '$apellido_materno', '$tel', '$correo', '$direccion')";

    $ejecutar = mysqli_query($conexion, $query);

    if (!$ejecutar ) {
        die ('Error en query');
    }

    header('Location: clientes.php');
}
?>