<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Registrarse</title>
    <link rel="stylesheet" href="styles/Registrarse.css">
    <link rel="icon" href="images/logo.png" type="image/jpg">
</head>
<body>

<img src="images/login.jpg" class="background-image" alt="Background Image">
<div class="login-box">
    <img src="images/logo.png" class="avatar" alt="Avatar Image">
    <h1>Regístrate Aquí</h1>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <label for="username">Usuario</label>
        <input type="text" name="username" placeholder="Ingresa tu usuario" required>

        <label for="password">Contraseña</label>
        <input type="password" name="password" placeholder="Ingresa tu contraseña" required>

        <input type="submit" value="Registrarse">
        <a href="login.php">Iniciar Sesión</a>
    </form>
</div>
<div>
    <a class="boton_volver" href="index.php">Volver al inicio</a>
</div>
</body>
</html>
<?php
$servername = "localhost";
$username = "brayan";
$password = "BR200104s";
$dbname = "registros";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("La conexión falló: " . $conn->connect_error);
}

$message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = mysqli_real_escape_string($conn, $_POST["username"]);
    $password = mysqli_real_escape_string($conn, $_POST["password"]);

    $check_user_query = "SELECT * FROM usuarios WHERE usuario = '$username'";
    $check_user_result = $conn->query($check_user_query);

    if ($check_user_result->num_rows > 0) {
        $message = "Error al registrar usuario: Ya existe un usuario con ese nombre.";
    } else {
        $ruta_defecto_avatar = 'images/avatar.jpg';

        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        $sql = "INSERT INTO usuarios (usuario, contrasena, avatar) VALUES ('$username', '$hashed_password', '$ruta_defecto_avatar')";

        if ($conn->query($sql) === TRUE) {
            header("Location: bienvenida.php");
            exit();
        } else {
            $message = "Error al registrar usuario: " . $conn->error;
        }
    }
}

$conn->close();

if (!empty($message)) {
    echo '<p id="error-message" style="color: white; font-size: 13px;">' . $message . '</p>';
    echo '<script>
            document.addEventListener("DOMContentLoaded", function () {
                var errorMessage = document.getElementById("error-message");
                setTimeout(function () {
                    errorMessage.style.display = "none";
                }, 2200);
            });
          </script>';
}
?>
