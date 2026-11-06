<?php
session_start();


$mensaje = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {


    $nombre = trim($_POST["nombre"]);
    $usuario = trim($_POST["usuario"]);
    $password = $_POST["password"];
    $confirmar = $_POST["confirmar"];

  
    if (empty($nombre) || empty($usuario) || empty($password) || empty($confirmar)) {

        $mensaje = "Todos los campos son obligatorios.";

    }
  
    elseif (strlen($password) < 6) {

        $mensaje = "La contraseña debe tener mínimo 6 caracteres.";

    }
  
    elseif ($password != $confirmar) {

        $mensaje = "Las contraseñas no coinciden.";

    }
    else {

   
        $hash = password_hash($password, PASSWORD_DEFAULT);

        
        $_SESSION["usuario"] = $usuario;
        $_SESSION["nombre"] = $nombre;
        $_SESSION["password"] = $hash;

    
        header("Location: login.php");
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<title>Registro</title>
<link rel="stylesheet" href="estilos.css">
</head>
<body>

<div class="contenedor">

 <div class="imagen">
    <img src="registro.jpg" alt="Imagen de Registro">
</div>

    <h1>Registro de Usuario</h1>

    <form method="POST">

        <label>Nombre Completo</label>
        <input type="text" name="nombre">

        <label>Nombre de Usuario</label>
        <input type="text" name="usuario">

        <label>Contraseña</label>
        <input type="password" name="password">

        <label>Confirmar Contraseña</label>
        <input type="password" name="confirmar">

        <button type="submit">Registrar</button>

    </form>

    <?php
    if(!empty($mensaje)){
        echo "<p class='mensaje'>$mensaje</p>";
    }
    ?>

</div>

</body>
</html>