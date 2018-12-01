<?php

        @session_start();

        $secretKey = "6LcVvnwUAAAAAF7PR2uL8yoUWFwdqm9UTeRpSzF1";
        $responseKey = $_POST['g-recaptcha-response'];
        $userIP = $_SERVER['REMOTE_ADDR'];

        $url = "https://www.google.com/recaptcha/api/siteverify?secret=$secretKey&response=$responseKey&remoteip=$userIP";
        $response = file_get_contents($url);
        $response = json_decode($response);
        if ($response->success)
            {


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

                      $_SESSION['msgEmailEnviado'] = '<div class="alert alert-warning alert-dismissible" data-auto-dismiss role="alert" style="background-color:#70e093;border-radius:8px";>
            							  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            							   <span style="color:white;">Mensagem enviada com sucesso. Entraremos em contacto brevemente!</span>
            								</div>';
                			header("Location: ../indexes/index.php#contact");

										}




						}
        else

						{

              $_SESSION['msgVerificaRecaptcha'] = '<br><p id="erro" style="text-align:center;margin:0;">Por favor verifique se validou o recaptcha!</p>';

							header("Location: ../indexes/index.php#contact");

						}

?>
