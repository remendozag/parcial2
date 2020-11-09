<?php
require_once 'config.php';
$result = false;

if (!empty($_POST)) {
    $name = $_POST['name'];
    $email = $_POST['email'];

    $password = md5($_POST['password']);

    // Validate

    $sql = "INSERT INTO users(name, email, password) VALUES (:name, :email, :password)";
    $query = $pdo->prepare($sql);

    $result = $query->execute([
        'name' => $name,
        'email' => $email,
        'password' => $password
    ]);
}

?>

<html>
<head>
    <title>Bases de Datos Agregar</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
</head>
<body>
<div class="container">
    <h1>Agregar Usuario</h1>
    <a href="index.php">Inicio</a>
    <?php
        if ($result) {
            echo '<div class="alert alert-success">Satisfactorio!!!</div>';
        }
    ?>
    <form action="add.php" method="post">
        <label for="name">Nombre</label>
        <input type="text" name="name" id="name">
        <br>
        <label for="email">Correo</label>
        <input type="text" name="email" id="email">
        <br>
        <label for="password">Clave</label>
        <input type="password" name="password" id="password">
        <br>
        <input type="submit" value="Guardar" >
    </form>
</div>
</body>
</html>
