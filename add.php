<?php include 'db.php'; ?>
<!DOCTYPE html>
<html>
<head>
  <title>Agregar Cliente</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <div class="form-container">
    <h1>Agregar Cliente</h1>
    <form method="post">
      <label for="nombre">Nombre:</label>
      <input type="text" name="nombre" id="nombre" required>

      <label for="email">Email:</label>
      <input type="email" name="email" id="email" required>

      <label for="telefono">Teléfono:</label>
      <input type="text" name="telefono" id="telefono" required>

      <label for="empresa">Empresa:</label>
      <input type="text" name="empresa" id="empresa" required>

      <label for="descripcion">Descripción:</label>
      <textarea name="descripcion" id="descripcion" rows="4" cols="50"></textarea>

      <input type="submit" value="Guardar">
      <a href="index.php" class="btn-cancel">Cancelar</a>
    </form>
  </div>
</body>
</html>

<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $stmt = $conn->prepare("INSERT INTO clientes (nombre, email, telefono, empresa, descripcion) VALUES (?, ?, ?, ?, ?)");
  $stmt->bind_param("sssss", $_POST['nombre'], $_POST['email'], $_POST['telefono'], $_POST['empresa'], $_POST['descripcion']);
  $stmt->execute();
  header("Location: index.php");
}
?>


