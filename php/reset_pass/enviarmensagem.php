<?php

	$name = $_POST['name'];
	
	$email = $_POST['email'];
	
	$subject = $_POST['subject'];
	
	$message = $_POST['message'];
	
	
	
	require '../../PHPMailerAutoload.php';
		require '../../credential.php';

			$mail = new PHPMailer;

			$mail->SMTPDebug = 4;                               // Enable verbose debug output

			$mail->SMTPOptions = array( 'ssl' => array( 'verify_peer' => false, 'verify_peer_name' => false, 'allow_self_signed' => true ) );                                     // Set mailer to use SMTP
			$mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
			$mail->SMTPAuth = true;                               // Enable SMTP authentication
			$mail->Username = EMAIL;                 // SMTP username
			$mail->Password = 'PASS';                           // SMTP password
			$mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
			$mail->Port = 587;                                    // TCP port to connect to

			$mail->setFrom(EMAIL, 'mednager - Mensagem');
			$mail->addAddress('Mednager@outlook.pt');     // Add a recipient
			
			$mail->addReplyTo(EMAIL);


			//$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
			$mail->isHTML(true);                                  // Set email format to HTML

			$mail->Subject = 'Mensagem - Contacto';
			$mail->Body    = 'Nome: '.$name.' <br> E-mail: '.$email.' <br> Assunto: '.$subject.' <br><br> Mensagem: '.$message;
			$mail->AltBody = '';

			if(!$mail->send()) {
				echo 'Message could not be sent.';
				echo 'Mailer Error: ' . $mail->ErrorInfo;
			} else {
				
				header("Location: ../indexes/index.php?signup=ee#contact");
				
			}
	
	

?>