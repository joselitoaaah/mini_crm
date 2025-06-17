<?php include 'db.php'; $id = $_GET['id']; ?>
<!DOCTYPE html>
<html>
<head>
  <title>Editar Cliente</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <div class="form-container">
    <h1>Editar Cliente</h1>
    <?php
    $result = $conn->query("SELECT * FROM clientes WHERE id=$id");
    $row = $result->fetch_assoc();
    ?>
    <form method="post">
      <label for="nombre">Nombre:</label>
      <input type="text" name="nombre" id="nombre" value="<?php echo $row['nombre']; ?>" required>

      <label for="email">Email:</label>
      <input type="email" name="email" id="email" value="<?php echo $row['email']; ?>" required>

      <label for="telefono">Teléfono:</label>
      <input type="text" name="telefono" id="telefono" value="<?php echo $row['telefono']; ?>" required>

      <label for="empresa">Empresa:</label>
      <input type="text" name="empresa" id="empresa" value="<?php echo $row['empresa']; ?>" required>

      <label for="descripcion">Descripción:</label>
      <textarea name="descripcion" id="descripcion" rows="4" cols="50"><?php echo $row['descripcion']; ?></textarea>
      <label for="calificacion">Calificación:</label>
      <select name="calificacion" id="calificacion">
  <?php
  for ($i = 1; $i <= 5; $i++) {
    $selected = $i == $row['calificacion'] ? "selected" : "";
    echo "<option value='$i' $selected>" . str_repeat("⭐", $i) . "</option>";
  }
  ?>
</select>

      <input type="submit" value="Actualizar">
      <a href="index.php" class="btn-cancel">Cancelar</a>
    </form>
  </div>
</body>
</html>

<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  if (!preg_match('/^[0-9]+$/', $_POST['telefono'])) {
    echo "<p style='color:red;'>El teléfono solo debe contener números.</p>";
    exit;
}
  $stmt = $conn->prepare("UPDATE clientes SET nombre=?, email=?, telefono=?, empresa=?, descripcion=?, calificacion=? WHERE id=?");
  $stmt->bind_param("ssssssi", $_POST['nombre'], $_POST['email'], $_POST['telefono'], $_POST['empresa'], $_POST['descripcion'], $_POST['calificacion'], $id);
  $stmt->execute();
  header("Location: index.php");
}

?>
