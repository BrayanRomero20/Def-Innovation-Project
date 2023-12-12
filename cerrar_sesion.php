<?php
session_start();

// Destruir todas las variables de sesión
$_SESSION = array();

// Borrar la cookie de la sesión, si existe
if (isset($_COOKIE[session_name()])) {
    setcookie(session_name(), '', time() - 42000, '/');
}

// Destruir la sesión
session_destroy();

// Redirigir a la página de inicio o a donde desees después de cerrar sesión
header("Location: Index.php"); // Cambia "index.php" por la página a la que deseas redirigir
exit();
?>