<?php
include_once('class.phpmailer.php');
//require('phpmailer/class.smtp.php');
require_once ('class.smtp.php');
require_once('PHPMailerAutoload.php');

class Email
{
	
	function Sendemail($subject,$text,$reciver)
	{
      $mail= new PHPMailer();
	  try{
	  $mail->SMTPDegbag=0;
	  $mail->isSMTP();
	  $mail->Host ="SMTP HOST";
	  $mail->SMTPAuth = TRUE;
	  $mail->Username = "SMTP username";
	  $mail->Password = "SMTP Password";
	  $mail->SMTPSecure = 'tls';
	  $mail->Port = "SMTP port";
	  $mail->IsHTML(true);
	  $mail->SetFrom("FROM EMAIL","FROM NAME");
	  $mail->AddAddress($reciver);
	  $mail->Subject=$subject;
	  $mail->Body=$text;
	  return $mail->send();
	}
	catch(PDOexception $e)
	{
		return false;
	}
}

}

















?>