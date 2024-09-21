<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recoger datos del formulario
    $nombre = htmlspecialchars($_POST['name']);
    $correo = htmlspecialchars($_POST['email']);
    $telefono = htmlspecialchars($_POST['contact']);

    // Dirección de correo a la que se enviará el mensaje
    $para = "icead42@gmail.com"; 
    $asunto = "Nuevo mensaje de $nombre";
    $cuerpo = "Nombre: $nombre\nCorreo: $correo\nTeléfono: $telefono\n";

    // Cabeceras del correo
    $cabeceras = "From: $correo\r\n";
    $cabeceras .= "Reply-To: $correo\r\n";
    $cabeceras .= "X-Mailer: PHP/" . phpversion();

    // Enviar el correo
    if (mail($para, $asunto, $cuerpo, $cabeceras)) {
        echo "<script>alert('El mensaje se ha enviado correctamente.'); window.location.href = 'contacto.html';</script>";
    } else {
        echo "<script>alert('Hubo un problema al enviar el mensaje. Inténtalo de nuevo.'); window.location.href = 'contacto.html';</script>";
    }
}
?>
