<?php 
require('bdd_funciones.php');
$alias=crearalias();
        foreach ($_POST as $cargo) {
          	votar($cargo,alias_id($alias));
        } 

session_start();
echo "<script>alert('Datos ingresados')</script>";
require 'phpmailer/PHPMailerAutoload.php';
 
$mail = new PHPMailer;
 
$mail->isSMTP();
$mail->Host = 'smtp.gmail.com';
$mail->Port = 465;
$mail->SMTPAuth = true;
$mail->Username = 'administrador@gmail.com';
$mail->Password = '******';
$mail->SMTPSecure = 'ssl';
$mail->SMTPDebug  = 0;
$mail->From = 'administrador@gmail.com';
$mail->FromName = 'Administrador';
$mail->addAddress($_SESSION['correo'], $_SESSION['cuenta']);
 
$mail->addReplyTo('administrador@gmail.com', '******');
 
$mail->WordWrap = 50;
$mail->isHTML(true);

$mail->Subject = 'Voto registrado exitosamente';
$mail->Body    = 'Felicidades'.$_SESSION['cuenta'].'tu voto se ha registrado exitosamente para verificarlo	puedes buscar en la tabla de votos con el alias'.$alias;;
//Esta línea la he tenido que comentar
if(!$mail->send()) {
   echo 'El mensaje no pudo enviarse.';
   echo 'Mailer Error: ' . $mail->ErrorInfo;
   exit;
}
 echo "<script>alert('Mensaje Enviado')</script>";
 almacenar_correo(1);
 header('location:admin_graficos.php');
 ?>

 