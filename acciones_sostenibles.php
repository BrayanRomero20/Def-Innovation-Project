<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de Acciones Sostenibles</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            font-family: 'Poppins', sans-serif;
            text-align: center;
        }

        section {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            width: 100%;
            background: url('images/water.jpg') no-repeat;
            background-position: center;
            background-size: cover;
        }

        .form-box {
            position: relative;
            width: 600px;
            height: 650px;
            background: transparent;
            border: 2px solid rgba(255,255,255,0.5);
            border-radius: 20px;
            backdrop-filter: blur(15px);
            display: flex;
            flex-direction: column;
            justify-content: space-evenly;
            align-items: center;
        }

        h2 {
            font-size: 2em;
            color: #fff;
            text-align: center;
            text-shadow: 1px 1px 5px black;
            padding: 0px 5px;
        }

        .inputbox {
            position: relative;
            margin: 30px 0;
            width: 310px;
            border-bottom: 2px solid #fff;
        }

        .inputbox input {
            width: 100%;
            height: 50px;
            background: transparent;
            border: none;
            outline: none;
            font-size: 1em;
            padding: 0 35px 0 5px;
            color: #fff;
        }

        button {
        width: 100%;
        height: 40px;
        border-radius: 40px;
        background: #fff;
        border: none;
        box-shadow: 2px 2px 4px black;
        cursor: pointer;
        font-size: 1em;
        font-weight: 600;
        transition: transform 0.3s ease;
        }

        button:hover {
            transform: scale(1.05); 
        }

        select[name="accion_sostenible"] {
        width: 100%;
        height: 40px;
        padding: 5px;
        border: 1px solid #ccc;
        border-radius: 5px;
        box-sizing: border-box;
        font-size: 1em;
        color: black;
        background-color: #fff;
        transition: border-color 0.3s ease;
        cursor: pointer;
        margin-top: 10px;
        }

        select[name="accion_sostenible"]:focus {
            border-color: gray; /* Cambia el color del borde al enfocar el select */
            outline: none; /* Elimina el contorno predeterminado al enfocar */
        }

        .gota{
            border-radius: 50%;
            height: 33%;
            width: 60%;
            margin-bottom: 15px;
        }

        .fecha{
            font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;
            letter-spacing: 2px;
            text-shadow: 1px 1px 3px gray;
        }

        .label{
            font-family:'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            letter-spacing: 2px;
            text-shadow: 1px 1px 3px gray;
        }

        .boton_volver{
            position: absolute;
            bottom: 20px;
            right: 50px;
            text-decoration: none;
            font-size: 18px;
            font-family: Arial, Helvetica, sans-serif;
            letter-spacing: 1px;
            color: #E5E5E5;
            text-shadow: 3px 3px 3px black;
            font-weight: 700;
        }

        .boton_volver:hover{
            color: rgb(197, 197, 197);
            text-decoration: none;
        }
    </style>
</head>
<body>

<?php
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: Login.php");
    exit();
}

$servername = "localhost";
$username = "brayan";
$password = "BR200104s";
$dbname = "registros";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

$id_usuario = isset($_SESSION['id']) ? $_SESSION['id'] : null;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if ($id_usuario !== null) {
        $accion_sostenible = isset($_POST['accion_sostenible']) ? $_POST['accion_sostenible'] : null;

        $fecha_actual = date('Y-m-d');

        // Verificar si ya existe un registro para el usuario en la fecha actual
        $check_existing_sql = "SELECT * FROM acciones_diarias WHERE id_usuario = '$id_usuario' AND fecha = '$fecha_actual'";
        $existing_result = $conn->query($check_existing_sql);

        if ($existing_result->num_rows > 0) {
            $mensaje = 'Ya has registrado la acción sostenible del día de hoy.';
        } else {
            // Insertar la acción sostenible en la base de datos
            $insert_sql = "INSERT INTO acciones_diarias (id_usuario, fecha, accion_sostenible) VALUES ('$id_usuario', '$fecha_actual', '$accion_sostenible')";

            if ($conn->query($insert_sql) === TRUE) {
                $mensaje = 'Acción sostenible registrada con éxito el día ' . $fecha_actual . '.';
            } else {
                $mensaje = 'Error al registrar la acción sostenible: ' . $conn->error;
            }
        }
    } else {
        $mensaje = 'Error: Usuario no autenticado.';
    }
}
?>
<section>
    <div class="form-box">
        <h2>Selecciona el tipo de acción sostenible que realizaste hoy</h2>
        <form method="post" action="acciones_sostenibles.php">
            <p class="fecha">Fecha actual: <?php echo date('d-m-Y'); ?></p>
            <div class="inputbox">
                <img src="images/gota.jpg" class="gota"><br>
                <label class="label">Acción Sostenible</label>
                <select name="accion_sostenible">
                    <?php
                    // Definir las opciones de acciones sostenibles
                    $opciones = array(
                        'Ahorro Energético',
                        'Conservación de Plantas',
                        'Minimización de Combustible',
                        'Eficiencia Hídrica',
                        'Reciclaje Orgánico',
                        'Reciclaje Inorgánico',
                        'Donación a Entidades Ambientales'
                    );

                    // Mostrar las opciones en un menú desplegable
                    foreach ($opciones as $opcion) {
                        echo '<option value="' . $opcion . '">' . $opcion . '</option>';
                    }
                    ?>
                </select>
            </div>
            <button type="submit">Registrar</button>
        </form>

        <div id="mensaje-container">
            <?php
            // Mostrar el mensaje de éxito o error
            if (isset($mensaje)) {
                echo '<p class="' . (strpos($mensaje, 'Error') !== false ? 'error' : 'success') . '">' . $mensaje . '</p>';
            }
            ?>
        </div>
    </div>
</section>

<div>
    <a class="boton_volver" href="index.php">Volver al inicio</a>
</div>

<script>
    setTimeout(function() {
        document.getElementById("mensaje-container").style.display = "none";
    }, 3000);
</script>

</body>
</html>

<?php
// Cerrar la conexión a la base de datos
$conn->close();
?>