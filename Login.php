<?php
session_start();

// Establecer la conexión con la base de datos
$servername = "localhost";
$username_db = "brayan";
$password_db = "BR200104s";
$dbname = "registros";

$conn = new mysqli($servername, $username_db, $password_db, $dbname);

// Verificar la conexión
if ($conn->connect_error) {
    die("La conexión falló: " . $conn->connect_error);
}

// Variable para el mensaje de error
$error_message = "";

// Verificar si el formulario se envió mediante POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recuperar los valores del formulario
    $username = $_POST["username"];
    $password = $_POST["password"];

    // Consultar la base de datos para obtener la información del usuario
    $sql = "SELECT id, usuario, contrasena FROM usuarios WHERE usuario = '$username'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();

        // Verificar la contraseña usando password_verify
        $stored_password = trim($row["contrasena"]);

        if (password_verify($password, $stored_password)) {
            $_SESSION["id"] = $row["id"];
            $_SESSION["username"] = $row["usuario"];
            header("Location: index.php");
            exit();
        } else {
            $error_message = "Contraseña incorrecta";
        }
    } else {
        $error_message = "Usuario no encontrado";
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Iniciar Sesión</title>
    <link rel="stylesheet" href="styles/login.css">
    <link rel="icon" href="images/logo.png" type="image/jpg">
</head>
<body>
<img src="images/login.jpg" class="background-image" alt="Background Image">
<div class="login-box">
    <img src="images/logo.png" class="avatar" alt="Avatar Image">
    <h1>Inicia sesión aquí</h1>

    <!-- Formulario con el código PHP integrado -->
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <label for="username">Usuario</label>
        <input type="text" name="username" placeholder="Ingresa tu usuario" required>

        <label for="password">Contraseña</label>
        <input type="password" name="password" placeholder="Ingresa tu contraseña" required>

        <input type="submit" value="Iniciar Sesión">
        <a href="Registrarse.php">¿No tienes una cuenta?</a>

        <!-- Mostrar mensaje de error si existe -->
        <?php if (!empty($error_message)) : ?>
    <p id="error-message" style="color: white; font-size: 13px;"><?php echo $error_message; ?></p>
    <script>
        // Después de 3000 milisegundos (3 segundos), ocultar el mensaje de error
        setTimeout(function () {
            document.getElementById("error-message").style.display = "none";
        }, 2200);
    </script>
<?php endif; ?>
    </form>
</div>
<div>
    <a class="boton_volver" href="index.php">Volver al inicio</a>
</div>
</body>
</html>