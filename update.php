<?php

include_once 'config.php';
$result = false;

if (!empty($_POST)) {
    $id = $_POST['id'];
    $newName = $_POST['name'];
    $newEmail = $_POST['email'];

    $sql = "UPDATE users SET name=:name, email=:email WHERE id=:id";
    $query = $pdo->prepare($sql);

    $result = $query->execute([
        'id' => $id,
        'name' => $newName,
        'email' => $newEmail
    ]);

    $nameValue = $newName;
    $emailValue = $newEmail;
} else {
    $id = $_GET['id'];
    $sql = "SELECT * FROM users WHERE id=:id";
    $query = $pdo->prepare($sql);

    $query->execute([
        'id' => $id
    ]);

    $row = $query->fetch(PDO::FETCH_ASSOC);
    $nameValue = $row['name'];
    $emailValue = $row['email'];
}
?>
<html>
<head>
    <title>Bases de Datos Actualizar</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
</head>
<body>
<div class="container">
    <h1>Actualizar Usuarios</h1>
    <a href="list.php">Atrás</a>
    <?php
    if ($result) {
        echo '<div class="alert alert-success">Satisfactorio!!!</div>';
    }
    ?>
    <form action="update.php" method="post">
        <label for="name">Nombre</label>
        <input type="text" name="name" id="name" value="<?php echo $nameValue; ?>">
        <br>
        <label for="email">Correo</label>
        <input type="text" name="email" id="email" value="<?php echo $emailValue; ?>">
        <br>
        <input type="hidden" name="id" value="<?php echo $id ?>">
        <input type="submit" value="Update" >
    </form>
</div>
</body>
</html>
