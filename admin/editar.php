<?php 
include('conecction.php');
if  (isset($_GET['idt_clientes'])) {
    $idt_clientes = $_GET['idt_clientes'];
    $query = "SELECT * FROM t_clientes WHERE idt_clientes=$idt_clientes";
    $result = mysqli_query($conexion, $query);
    if (mysqli_num_rows($result) == 1) {
      $row = mysqli_fetch_array($result);
      $nombre = $row['nombre'];
      $apellido_paterno = $row['apellido_paterno'];
      $apellido_materno = $row['apellido_materno'];
      $tel = $row['telefono'];
      $correo = $row['correo'];
      $direccion = $row ['direccion'];
    }
  }
  
  if (isset($_POST['editar'])) {
    $idt_clientes = $_GET['idt_clientes'];
      $nombre = $row['nombre'];
      $apellido_paterno = $row['apellido_paterno'];
      $apellido_materno = $row['apellido_materno'];
      $tel = $row['telefono'];
      $correo = $row['correo'];
      $direccion = $row ['direccion'];
  
    $query = "UPDATE t_clientes set nombre = '$nombre', apellido_paterno = '$apellido_paterno', apellido_materno = '$apellido_materno, telefono = '$tel', correo = '$correo', direccion = '$direccion' WHERE idt_clientes=$idt_clientes";
    mysqli_query($conexion, $query);
    $_SESSION['message'] = 'Task Updated Successfully';
    $_SESSION['message_type'] = 'warning';
    header('Location: clientes.php');
  } 
?>
<link rel="stylesheet" href="admin.css">
<div class="container p-4">
  <div class="row">
    <div class="col-md-4 mx-auto">
      <div class="card card-body">
      <form action="editar.php?id=<?php echo $_GET['idt_clientes']; ?>" method="POST">
      <label for="nombre">Nombre:</label>
      <input type="text" name="nombre" value="<?php echo $nombre; ?>">

      <label for="apellido-paterno">Apellido Paterno:</label>
      <input type="text" name="apellido-paterno" value="<?php echo $apellido_paterno; ?>">

      <label for="apellido-materno">Apellido Materno:</label>
      <input type="text" name="apellido-materno" value="<?php echo $apellido_materno; ?>">

      <label for="dni">DNI:</label>
      <input type="text" name="dni"  value="<?php echo $apellido_materno; ?>">

      <label for="telefono">Teléfono:</label>
      <input type="tel" name="telefono"  value="<?php echo $tel; ?>">

      <label for="correo">Correo:</label>
      <input type="email" name="correo"  value="<?php echo $correo; ?>">>

      <label for="direccion">Dirección:</label>
      <textarea id="direccion" name="direccion"  value="<?php echo $direccion; ?>"></textarea>

        <input type="submit" name="editar" class="btn btn-primary"></input>
      </form>
      </div>
    </div>
  </div>
</div>