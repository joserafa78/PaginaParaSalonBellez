<?php namespace App\Controllers;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
use App\Models\Email;

//require 'vendor/autoload.php';
require '../../vendor/autoload.php';

class processEmail{
//ATRIBUTOS


//METODOS
public static function enviaEmail(Email $model){
    $destinatario =$model->addres;
    $nomDestinatario=$model->name;
    $titulomsj=$model->title;
    $cuerpomsj=$model->body;
    //-----------------------
    $nombreEmpresa="GoldNail";
    $correoGmil="oficialgoldnail@gmail.com";
    $clave= "Goldnail2020";

// Instantiation and passing `true` enables exceptions
$mail = new PHPMailer();

    //Server settings
    $mail->SMTPDebug = 0;                      // Enable verbose debug output
    $mail->isSMTP();                                            // Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                    // Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
    $mail->Username   = $correoGmil;                     // SMTP username
    $mail->Password   = $clave;                               // SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
    $mail->Port       = 587;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

    //Recipients
    $mail->setFrom($correoGmil, $nombreEmpresa); //Correo Emisor
    $mail->addAddress($destinatario, $nomDestinatario);     // Destino recipient


    // Attachments
    //$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
    //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

    // Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = $titulomsj;
    $mail->Body    = $cuerpomsj;
    $mail->AltBody = 'Llamanos a los numeros....';


if ($mail->send())
{
    return "Correo Enviado a:".$destinatario;

}else{
    return false;
}
    }

}



?>
