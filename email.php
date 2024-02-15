<?php 
$paraCorreo = "artespizarro@gmail.com";
$titulo = "Prueba de XAMPP";
$mensaje = "Esta es una prueba o test de la pagina para artespizarro!";

$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

// More headers
$headers .= 'From: <artespizarro.com>' . "\r\n";
$headers .= 'Cc: artespizarro@gmail.com' . "\r\n";

if(mail($paraCorreo, $titulo, $mensaje, $headers))
{
	echo "Enviado!";
}
else
{
	echo "No enviado!";
}
?>