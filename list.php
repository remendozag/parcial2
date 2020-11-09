<?php
require_once 'config.php';
$queryResult = $pdo->query("SELECT * FROM users");
?>
<html>
<head>
    <title>Bases de Datos Listar</title>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
</head>
<body>
<div class="container">
    <h1>Listar Usuarios</h1>
    <a href="index.php">Inicio</a>
    <table class="table">
        <tr>
            <th>Nombre</th>
            <th>Correo</th>
            <th>Editar</th>
            <th>Borrar</th>
        </tr>
        <?php
        while($row = $queryResult->fetch(PDO::FETCH_ASSOC)) {
            echo '<tr>';
            echo '<td>' . $row['name'] . '</td>';
            echo '<td>' . $row['email'] . '</td>';
            echo '<td><a href="update.php?id=' . $row['id'] . '">Editar</a></td>';
            echo '<td><a href="delete.php?id=' . $row['id'] . '">Borrar</a></td>';
            echo '</tr>';
        }
        ?>
    </table>
</div>
</body>
</html>
