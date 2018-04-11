<?php
require 'class.phpmailer.php';
require "PHPMailerAutoload.php";
$mail = new PHPMailer();
$mail->IsSMTP(); // enable SMTP
$mail->SMTPDebug = 1; // debugging: 1 = errors and messages, 2 = messages only
$mail->SMTPAuth = true; // authentication enabled
$mail->SMTPSecure = 'ssl'; // secure transfer enabled REQUIRED for Gmail
$mail->Host = "cp-in-17.webhostbox.net";
$mail->Port = 465; // or 587
$mail->IsHTML(true);
$mail->Username = "support@stallsbook.com";
$mail->Password = "Stall@support";
$mail->SetFrom("support@stallsbook.com");
$mail->Subject = "Master";
$mail->AddAddress("jayanth49@gmail.com");
$mail->Body = 'Hi, Test Email';
$mail->send();
if(!$mail->Send()) {
	    echo "Mailer Error: " . $mail->ErrorInfo;
	     } else {
		         echo "Message has been sent";
			  }
//echo $mail;
?>
