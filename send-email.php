<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitizar los datos del formulario
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $message = htmlspecialchars($_POST['message']);
    
    // Tu correo electrónico donde recibirás los mensajes
    $to = "kevin.llanos@soy.econ.unicen.edu.ar"; 
    $subject = "Nuevo mensaje desde tu portfolio";
    $body = "Nombre: $name\nCorreo: $email\nMensaje:\n$message";
    $headers = "From: $email";

    // Enviar el correo
    if (mail($to, $subject, $body, $headers)) {
        echo "<h1 style='font-family: sans-serif; color: green; text-align:center; margin-top:50px;'>¡Mensaje enviado con éxito!</h1>";
        echo "<p style='text-align:center;'><a href='index.html' style='color: #ff6f61; font-weight: bold; text-decoration: none;'>Volver al sitio</a></p>";
    } else {
        echo "<h1 style='font-family: sans-serif; color: red; text-align:center; margin-top:50px;'>Hubo un error al enviar el mensaje.</h1>";
        echo "<p style='text-align:center;'><a href='index.html' style='color: #ff6f61; font-weight: bold; text-decoration: none;'>Volver al sitio</a></p>";
    }
} else {
    echo "<h1 style='font-family: sans-serif; color: #222; text-align:center; margin-top:50px;'>Acceso no permitido.</h1>";
    echo "<p style='text-align:center;'><a href='index.html' style='color: #ff6f61; font-weight: bold; text-decoration: none;'>Volver al sitio</a></p>";
}
