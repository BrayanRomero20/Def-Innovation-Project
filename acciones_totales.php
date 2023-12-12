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

// Modificar la consulta para obtener la cantidad de acciones agrupadas por fecha
$sql = "SELECT acciones_diarias.fecha, COUNT(*) as total_acciones, GROUP_CONCAT(usuarios.usuario) as usuarios
        FROM acciones_diarias 
        INNER JOIN usuarios ON acciones_diarias.id_usuario = usuarios.id
        GROUP BY acciones_diarias.fecha
        ORDER BY acciones_diarias.fecha DESC";

// Ejecutar la consulta
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Acciones Totales</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 20px;
            position: relative;
        }

        #volver-inicio {
        position: fixed;
        bottom: 20px;
        left: 20px;
        background-color: #007bff;
        color: #fff;
        padding: 10px 15px;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        }

        h2 {
            color: #333;
        }

        .accion {
            background-color: #fff;
            padding: 10px;
            margin: 10px 0;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        .fecha {
            font-weight: bold;
            color: #333;
        }

        .total {
            color: #007bff;
        }

        .usuarios {
            font-style: italic;
            color: #777;
        }
    </style>
</head>
<body>
    <h2>Acciones Totales</h2>

    <?php
    // Verificar si hay resultados
    if ($result->num_rows > 0) {
        // Mostrar las acciones agrupadas por fecha en un bucle
        while ($row = $result->fetch_assoc()) {
            // Acciones agrupadas por fecha
            $fecha_accion = $row['fecha'];
            $total_acciones = $row['total_acciones'];
            $usuarios = $row['usuarios'];

            // Mostrar las acciones agrupadas por fecha con estilo
            echo '<div class="accion">';
            echo '<span class="fecha">' . $fecha_accion . '</span> - <span class="total">' . $total_acciones . ' acciones</span>';
            echo '<p class="usuarios">Realizado por: ' . $usuarios . '</p>';
            echo '</div>';
        }
    } else {
        echo "No hay acciones registradas.";
    }

    // Cerrar la conexión a la base de datos
    $conn->close();
    ?>
    <button id="volver-inicio" onclick="window.location.href='index.php'">Volver al inicio</button>
</body>
</body>
</html>