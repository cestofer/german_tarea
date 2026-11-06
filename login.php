<?php
session_start();
$mensaje = "";


if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $usuario = trim($_POST["usuario"]);
    $password = $_POST["password"];

    if (isset($_SESSION["usuario"])) {

        if ($usuario == $_SESSION["usuario"]) {

            if (password_verify($password, $_SESSION["password"])) {

                $mensaje = "Bienvenido al sistema, " . $_SESSION["nombre"];

            } else {

                $mensaje = "Contraseña incorrecta.";

            }

        } else {

            $mensaje = "Usuario no encontrado.";

        }

    } else {

        $mensaje = "Primero debes registrar un usuario.";

    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Inicio de Sesión</title>

<link rel="stylesheet" href="estilos.css">
</head>
<body>

<div class="contenedor">

    <!-- Imagen para login -->
    <div class="imagen">
        <img src="imagenes/login.jpg" alt="Imagen Login">
    </div>

    <div class="formulario">

        <h1>Iniciar Sesión</h1>

        <form method="POST">

            <label>Usuario</label>
            <input type="text" name="usuario">

            <label>Contraseña</label>
            <input type="password" name="password">

            <button type="submit">Ingresar</button>

        </form>

        <?php
        // Mostrar resultado del acceso
        if (!empty($mensaje)) {
            echo "<p class='mensaje'>$mensaje</p>";
        }
        ?>

    </div>

</div>

</body>
</html>