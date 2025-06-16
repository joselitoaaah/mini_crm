<?php include 'db.php'; $id = $_GET['id']; ?>
<!DOCTYPE html>
<html lang="es">
<head><title>Editar Cliente</title></head>
<body>
<h1>Editar Cliente</h1>
<?php
$result = $conn->query("SELECT * FROM clientes WHERE id=$id");
$row = $result->fetch_assoc();
?>
<form method="post">
  Nombre: <input type="text" name="nombre" value="<?php echo $row['nombre']; ?>"><br>
  Email: <input type="email" name="email" value="<?php echo $row['email']; ?>"><br>
  Teléfono: <input type="text" name="telefono" value="<?php echo $row['telefono']; ?>"><br>
  Empresa: <input type="text" name="empresa" value="<?php echo $row['empresa']; ?>"><br>
  <input type="submit" value="Actualizar">
</form>
<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $stmt = $conn->prepare("UPDATE clientes SET nombre=?, email=?, telefono=?, empresa=? WHERE id=?");
  $stmt->bind_param("ssssi", $_POST['nombre'], $_POST['email'], $_POST['telefono'], $_POST['empresa'], $id);
  $stmt->execute();
  header("Location: index.php");
}
?>
</body>
</html>
