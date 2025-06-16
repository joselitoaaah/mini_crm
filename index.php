<?php include 'db.php'; ?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Mini CRM</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
<h1>Clientes</h1>
<a href="add.php">Agregar nuevo cliente</a>
<table>
  <tr>
    <th>ID</th><th>Nombre</th><th>Email</th><th>Teléfono</th><th>Empresa</th><th>Acciones</th>
  </tr>
  <?php
  $result = $conn->query("SELECT * FROM clientes");
  while ($row = $result->fetch_assoc()) {
    echo "<tr>
            <td>{$row['id']}</td>
            <td>{$row['nombre']}</td>
            <td>{$row['email']}</td>
            <td>{$row['telefono']}</td>
            <td>{$row['empresa']}</td>
            <td>
              <a href='edit.php?id={$row['id']}'>Editar</a> |
              <a href='delete.php?id={$row['id']}'>Eliminar</a>
            </td>
          </tr>";
  }
  ?>
</table>
</body>
</html>
