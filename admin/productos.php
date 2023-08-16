<?php 
include('conecction.php');
?>

<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="admin.css">
  <link rel="apple-touch-icon" sizes="76x76" href="assets/img/logo2.png">
    <link rel="icon" type="image/png" sizes="96x96" href="assets/img/logo2.png">

  <title>Panel de Administración - Gestión de Productos</title>
  
</head>
<body>
  <div class="header">
    <h1 class="titulo">Panel de Administración</h1>
    <p class="subtitulo">Gestión de Productos</p>
  </div>

  <div class="container">
    <h2>Agregar un Producto</h2>
    <form action="#" method="POST" class="formulario">
    
      <label for="pr_nombre">Nombre:</label>
      <input type="text"  name="pr_nombre" required>

      <label for="id_producto">Producto:</label>
      <input type= "number"  name="id_producto">

      <label for="pr_CantidadExistentes">Cantidad Existentes:</label>
      <input type="text"  name="pr_CantidadExistentes" required>


      <label for="id_sucursal">Sucursal:</label>
      <input type="text"  name="id_sucursal" required>

      <label for="pr_Precio_U_Venta">Precio:</label>
      <input type="number" id="iva" name="pr_Precio_U_Venta" required>

      <label for="img">URL Imagen:</label>
      <input type="text"  name="img" required>

      <input type="submit" name="#" value="Agregar Producto">

    </form>

    <table class="table table-bordered">
        <thead>
          <tr>
            <th>ID</th>
            <th>ID-Categoria</th>
            <th>Nombre</th>
            <th>Marca</th>
            <th>Codigo Barras</th>
            <th>Precio</th>
            
          </tr>
        </thead>
        <tbody>
          
    <?php 
    $query = "SELECT * FROM productos";
    $result_clientes = mysqli_query($conexion, $query); //= $conexion->query($sql);
    while ($row = mysqli_fetch_assoc($result_clientes)){ ?> 
      
        <tr>
        <td><?php echo $row['id_producto']; ?></td>
        <td><?php echo $row['id_categoria']; ?></td>
        <td><?php echo $row['pr_Nombre']; ?></td>
        <td><?php echo $row['pr_Marca']; ?></td>
        <td><?php echo $row['pr_codigoBarras']; ?></td>
        <td> $ <?php echo $row['pr_Precio_U_Venta']; ?></td>
        
        <td>
              <a href="#?id=<?php echo $row['id_producto']?>" class="btn btn-secondary">
                Editar
              </a>
              <a href="#?id=<?php echo $row['id_producto']?>" class="btn btn-danger">
                Eliminar
              </a>
            </td>
      </tr>
        <?php }?>
        </tbody>
      </table>
    <div class="mensaje">
      <!-- Aquí puedes mostrar mensajes de éxito o error -->
      <div class="text-right">
                <a href="#" class="btn btn-success"><i class="fas fa-file-pdf">
                </i> Generar Reporte</a>
              </div>
    </div>
  </div>
</body>
</html>