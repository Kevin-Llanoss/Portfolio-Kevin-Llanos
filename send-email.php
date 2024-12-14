<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitizar los datos del formulario
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $message = htmlspecialchars($_POST['message']);
    
    // Tu correo electrónico donde recibirás los mensajes
    $to = "kevin.llanos@soy.econ.unicen.edu.ar"; // 
    $subject = "Nuevo mensaje de tu portfolio";
    $body = "Nombre: $name\nCorreo: $email\nMensaje:\n$message";
    $headers = "From: $email";

    // Enviar el correo
    if (mail($to, $subject, $body, $headers)) {
        echo "<h1>Mensaje enviado con éxito.</h1>";
    } else {
        echo "<h1>Hubo un error al enviar el mensaje.</h1>";
    }
} else {
    echo "<h1>Acceso no permitido.</h1>";
}
?>
