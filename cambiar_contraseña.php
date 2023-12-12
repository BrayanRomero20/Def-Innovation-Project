<?php
session_start();

// Verificar si el usuario ha iniciado sesión
if (!isset($_SESSION['id'])) {
    // Si no ha iniciado sesión, redirige a la página de inicio de sesión
    header("Location: Login.php");
    exit();
}

// Obtener el ID de usuario de la sesión
$user_id = $_SESSION['id'];

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

// Procesar el cambio de contraseña
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recuperar los valores del formulario
    $current_password = $_POST["current_password"];
    $new_password = $_POST["new_password"];
    $confirm_password = $_POST["confirm_password"];

    // Consultar la base de datos para obtener la contraseña actual del usuario
    $sql = "SELECT contrasena FROM usuarios WHERE id = $user_id";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $stored_password = $row["contrasena"];

        // Verificar la contraseña actual
        if (password_verify($current_password, $stored_password)) {
            // Verificar que las nuevas contraseñas coincidan
            if ($new_password == $confirm_password) {
                // Hash de la nueva contraseña
                $hashed_new_password = password_hash($new_password, PASSWORD_DEFAULT);

                // Actualizar la contraseña en la base de datos
                $update_password_sql = "UPDATE usuarios SET contrasena = '$hashed_new_password' WHERE id = $user_id";
                $conn->query($update_password_sql);

                // Redirigir al perfil con un mensaje de éxito
                header("Location: perfil.php?success=1");
                exit();
            } else {
                $error_message = "Las nuevas contraseñas no coinciden.";
            }
        } else {
            $error_message = "Contraseña actual incorrecta.";
        }
    }
}

// Cerrar la conexión a la base de datos
$conn->close();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <link rel="icon" href="images/logo.png" type="image/jpg">
    <title>Cambiar Contraseña</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            background: linear-gradient(to left, white, #0062CB, white);
        }

        .form-register {
            width: 400px;
            background: #24303c;
            padding: 30px;
            margin: auto;
            margin-top: 100px;
            border-radius: 4px;
            font-family: 'calibri';
            color: white;
            box-shadow: 7px 13px 37px #000;
        }

        .form-register h1 {
            text-align: center;
            margin-bottom: 30px;
            color: white;
        }

        label {
            display: block;
            margin-bottom: 8px;
            color: white;
        }

        input {
            width: 100%;
            padding: 10px;
            border-radius: 4px;
            margin-bottom: 16px;
            border: 1px solid #1f53c5;
            font-family: 'calibri';
            font-size: 18px;
            color: white;
            background-color: #24303c;
        }

        input[type="submit"] {
            width: 100%;
            background: #1f53c5;
            border: none;
            padding: 12px;
            color: white;
            margin: 16px 0;
            font-size: 16px;
            cursor: pointer;
        }

        .error-message {
            height: 40px;
            text-align: center;
            font-size: 18px;
            line-height: 40px;
            color: white;
            background: #ff5c5c;
            margin-top: 20px;
            border-radius: 4px;
        }

        a {
            color: white;
            text-decoration: none;
        }

        a:hover {
            color: white;
            text-decoration: underline;
        }
        .boton_volver{
            position: absolute;
            bottom: 20px;
            right: 50px;
            text-decoration: none;
            font-size: 18px;
            font-family: Arial, Helvetica, sans-serif;
            letter-spacing: 1px;
            color: white;
            text-shadow: 2px 2px 2px #343434;
            font-weight: 700;
        }

        .boton_volver:hover{
            color: rgb(197, 197, 197);
            text-decoration: none;
        }
    </style>
</head>
<body>
    <div class="form-register">
        <h1>Cambiar Contraseña</h1>
        
        <!-- Formulario para cambiar la contraseña -->
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <label for="current_password">Contraseña Actual:</label>
            <input type="password" name="current_password" required>

            <label for="new_password">Nueva Contraseña:</label>
            <input type="password" name="new_password" required>

            <label for="confirm_password">Confirmar Nueva Contraseña:</label>
            <input type="password" name="confirm_password" required>

            <input type="submit" value="Cambiar Contraseña">
        </form>

        <!-- Mostrar mensaje de error si existe -->
        <?php if (isset($error_message)) : ?>
            <p class="error-message"><?php echo $error_message; ?></p>
        <?php endif; ?>
    </div>
    <div>
    <a class="boton_volver" href="index.php">Volver al inicio</a>
    </div>
</body>
</html>