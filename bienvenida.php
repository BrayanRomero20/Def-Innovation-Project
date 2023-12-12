<?php
session_start();

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro exitoso</title>
    <link rel="icon" href="images/logo.png" type="image/jpg">
</head>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Registro Exitoso</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #f4f4f4;
      text-align: center;
      margin: 0;
      padding: 0;
      height: 100vh;
      display: flex;
      flex-direction: column;
      align-items: center;
      justify-content: start;
    }

    .success-message {
      background-color: #4CAF50;
      color: #fff;
      font-family:'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;
      height: 50px;
      width: 160px;
      text-shadow: 1px 1px 1px rgb(72, 72, 72);
      font-size: 16px;
      border-radius: 10px;
      box-sizing: border-box;
    }

    .check-symbol {
      width: 250px;
      height: 250px;
      margin-bottom: 20px;
      margin-top: 20px;
    }

    .boton_volver{
    position: absolute;
    bottom: 20px;
    right: 50px;
    text-decoration: none;
    font-size: 18px;
    font-family: Arial, Helvetica, sans-serif;
    letter-spacing: 1px;
    color: black;
    text-shadow: 1px 1px 1px gray;
    font-weight: 700;
    }

    .boton_volver:hover{
    color: gray;
    }
  </style>
</head>
<body>
  <img class="check-symbol" src="images/registroexitoso.jpg" alt="Símbolo de check">
  <div class="success-message">
    <p>¡Registro exitoso!</p>
  </div>
  <div>
    <a class="boton_volver" href="index.php">Volver al inicio</a>
</div>
</body>
</html>