<?php include 'db.php'; ?>
<!DOCTYPE html>
<html lang="es">
<head><title>Agregar Cliente</title></head>
<body>
<h1>Agregar Cliente</h1>
<form method="post">
  Nombre: <input type="text" name="nombre" required><br>
  Email: <input type="email" name="email" required><br>
  Teléfono: <input type="text" name="telefono"><br>
  Empresa: <input type="text" name="empresa"><br>
  <input type="submit" value="Guardar">
</form>
<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $stmt = $conn->prepare("INSERT INTO clientes (nombre, email, telefono, empresa) VALUES (?, ?, ?, ?)");
  $stmt->bind_param("ssss", $_POST['nombre'], $_POST['email'], $_POST['telefono'], $_POST['empresa']);
  $stmt->execute();
  header("Location: index.php");
}
?>
</body>
</html>
