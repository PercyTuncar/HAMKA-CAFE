<?php
 
// grab recaptcha library
require_once "recaptchalib.php";
 // your secret key
$secret = "6Lea8y0UAAAAAJueFv32G9KPJz4E2Z4yU2rIJmkB";
 
// empty response
$response = null;
 
// check secret key
$reCaptcha = new ReCaptcha($secret);

// if submitted check response
if ($_POST["g-recaptcha-response"]) {
    $response = $reCaptcha->verifyResponse(
        $_SERVER["REMOTE_ADDR"],
        $_POST["g-recaptcha-response"]
    );
}
?>	
<?php
  if ($response != null && $response->success) {

$nombre = $_POST['nombre'];
$correo = $_POST['email'];
$telefono = $_POST['telefono'];
$mensaje = $_POST['mensaje'];
//	echo "<p> hola $nombre. Hemos recibido su correo electronico, em breve estaremos comunicandonos con usted <p>";
//a, asunto, mensaje, Header
$emailsend = mail ('informes@hamkacafe.com','HAMKA CAFE | Tienes un contacto', "Nombre: $nombre\rCorreo: $correo\rTelefono: $telefono\rMensaje: $mensaje",'From: '.$nombre.'<'.$correo.'>');
if ($emailsend) { 
	echo "<script language='javascript'>
window.location.href = 'http://hamkacafe.com/tablet/respuesta.html';
</script>";
      }
	else { 
		echo "<script language='javascript'>
alert('Lo sentimos, su mensaje no ha sido enviado. Es requisito obligatorio marcar la casilla de seguridad. Gracias.');
window.location.href = 'http://hamkacafe.com/tablet/contacto.html';
</script>";
	}
  } else {

echo "<script language='javascript'>
alert('Lo sentimos, su mensaje no ha sido enviado. Es requisito obligatorio marcar la casilla de seguridad. Gracias.');
window.location.href = 'http://hamkacafe.com/tablet/contacto.html';
</script>";
 } ?>
 