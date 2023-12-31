<?php 
include('conecction.php');

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "SELECT * FROM clientes WHERE id_cliente=$id";
    $result = mysqli_query($conexion, $query);

    if ($result) {
        $row = mysqli_fetch_array($result);
        $nombre = $row['cl_nombre'];
        $apellido_paterno = $row['cl_apellidomat'];
        $apellido_materno = $row['cl_apellidopa'];
        $tel = $row['cl_numtelefono'];
        $correo = $row['cl_correo'];
        $direccion = $row['cl_direccion'];
    }
}

if (isset($_POST['editar'])) {
    $id = $_GET['id'];
    $nombre = $_POST['cl_nombre'];
    $apellido_paterno = $_POST['cl_apellidomat'];
    $apellido_materno = $_POST['cl_apellidopa'];
    $tel = $_POST['cl_numtelefono'];
    $correo = $_POST['cl_correo'];
    $direccion = $_POST['cl_direccion'];

    $query = "UPDATE clientes SET cl_nombre = '$nombre', cl_apellidomat = '$apellido_paterno', cl_apellidopa = '$apellido_materno', cl_numtelefono = '$tel', cl_correo = '$correo', cl_direccion = '$direccion' WHERE id_cliente=$id";
    
    $ejecutar = mysqli_query($conexion, $query);
    if (!$ejecutar) {
        die ('Error en query');
    }
    
    header('Location: clientes.php');
} 
?>

<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="admin.css">
    <link rel="apple-touch-icon" sizes="76x76" href="assets/img/logo2.png">
    <link rel="icon" type="image/png" sizes="96x96" href="assets/img/logo2.png">
    <title>Editar Cliente</title>
</head>
<body>
    <div class="container p-4">
        <div class="row">
            <div class="col-md-4 mx-auto">
                <div class="card card-body">
                    <form action="editar.php?id=<?php echo $_GET['id']; ?>" method="POST" class="formulario">
                        <label for="cl_nombre">Nombre:</label>
                        <input type="text" name="cl_nombre" value="<?php echo $nombre; ?>" required>

                        <label for="cl_apellidomat">Apellido Paterno:</label>
                        <input type="text" name="cl_apellidomat" value="<?php echo $apellido_paterno; ?>" required>

                        <label for="cl_apellidopa">Apellido Materno:</label>
                        <input type="text" name="cl_apellidopa" value="<?php echo $apellido_materno; ?>" required>


                        <label for="cl_numtelefono">Teléfono:</label>
                        <input type="tel" name="cl_numtelefono" value="<?php echo $tel; ?>">

                        <label for="cl_correo">Correo:</label>
                        <input type="email" name="cl_correo" value="<?php echo $correo; ?>">

                        <label for="cl_direccion">Dirección:</label>
                        <input type="text" id="direccion" name="cl_direccion" value="<?php echo $direccion; ?>">

                        <input type="submit" name="editar" class="btn btn-primary" style="margin-top: 10px">
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>