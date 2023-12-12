<?php
session_start();

if (!isset($_SESSION['id'])) {
    header("Location: Login.php");
    exit();
}

$user_id = $_SESSION['id'];

$servername = "localhost";
$username_db = "brayan";
$password_db = "BR200104s";
$dbname = "registros";

$conn = new mysqli($servername, $username_db, $password_db, $dbname);

if ($conn->connect_error) {
    die("La conexión falló: " . $conn->connect_error);
}

// Actualizar contraseña si se ha enviado un formulario
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["new_password"])) {
    $new_password = mysqli_real_escape_string($conn, $_POST["new_password"]);
    $hashed_password = password_hash($new_password, PASSWORD_DEFAULT);

    $update_password_sql = "UPDATE usuarios SET contrasena = '$hashed_password' WHERE id = $user_id";
    $conn->query($update_password_sql);
}

$sql = "SELECT * FROM usuarios WHERE id = $user_id";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $username = $row['usuario'];

    $avatar_filename = empty($row['avatar']) ? 'avatar.jpg' : $row['avatar'];
    $avatar_path = "images/" . $avatar_filename;
    $display_id = "723100" . $user_id;

    ?>
    <!DOCTYPE html>
<html lang="es">
<head>
    <link rel="icon" href="images/logo.png" type="image/jpg">
    <meta charset="UTF-8">
    <title>Mi Perfil</title>
    <style>
        body{
            font-family: Arial, sans-serif;
            text-align: center;
            margin: 50px;
            background: radial-gradient(circle, #217CBA, white);
            display: flex;
            justify-content: center;
        }

        h1 {
            color: black;
            font-family:'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;
            font-size: 35px;
        }

        ul {
            list-style: none;
            padding: 0;
        }

        li {
            margin: 10px 0;
            font-family:Verdana, Geneva, Tahoma, sans-serif;
            font-size: 18px;
        }

        img {
            max-width: 150px;
            border-radius: 50%;
            border-color: black solid 4px;
        }

        a {
            text-decoration: none;
            color: #DFDFDF;
            font-weight: bold;
            text-shadow: 1px 1px 1px black;
        }
        p{
            font-size: 18px;
            font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;
        }
        .cont{
            box-shadow: 7px 13px 37px #000;
            width: 45%;
            height: 80vh;
            padding-top: 100px;
            box-sizing: border-box;
            border-radius: 35px;
            background: linear-gradient(white, #005CCB);
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
    <div class="cont">
        <h1>Bienvenido a tu perfil, <?php echo $username; ?>!</h1>
        <p><b>Información del usuario:</b></p>
        <ul>
            <li><img src="images/avatar.jpg"></li>
            <li><b>Nombre de usuario: </b><?php echo $username; ?></li>
            <li><b>ID: </b><?php echo $display_id; ?></li>
        </ul>
        <p><a href="cambiar_contraseña.php">Cambiar contraseña</a></p>
    </div>
<div>
    <a class="boton_volver" href="index.php">Volver al inicio</a>
</div>
</body>
</html>
    <?php
} else {
    echo "Usuario no encontrado";
}
$conn->close();
?>