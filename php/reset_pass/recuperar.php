<?php

@session_start();

if(isset($_POST['submit'])){

	$email = $_POST["emailr"];

	$servername = "localhost";
	$username = "admin";
	$password = "Sutas4Ever2018";
	$bd = "mydb";

	$findemailu = false;

	$findemailc = false;

	// Create connection
	$conn = new mysqli($servername, $username, $password, $bd);
	// Check connection
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	}



	//Procurar se o e-mail do utente existe na bd

	$sqlrecuperacaou = "SELECT emailUtente from utente";
	$result = $conn->query($sqlrecuperacaou);

	if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) {

			if( $row["emailUtente"] == $email){

				//echo "E-mail encontrado - utente" ;

				$findemailu = true;

			}


		}
	}


	//Procurar se o e-mail do comprador existe na bd

	$sqlrecuperacaoc = "SELECT emailComprador from comprador";
	$result = $conn->query($sqlrecuperacaoc);

	if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) {

			if( $row["emailComprador"] == $email){

				//echo "E-mail encontrado - comprador" ;

				$findemailc = true;

			}


		}
	}


	if($findemailc){

		//RECUPERAÇÃO DE EMAIL


		$str = "0123456789qwertyuiopasdfghjklzxcvbnm";

		$str = str_shuffle($str);

		$str = substr($str,0,10);

		$url = "http://localhost/mednager/php/reset_pass/resetPasswordComprador.php?token=$str&email=$email&tipo=c";

		echo $url;

		//CODIGO PHPMAILER


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

			$mail->setFrom(EMAIL, 'mednager');
			$mail->addAddress($email);     // Add a recipient

			$mail->addReplyTo(EMAIL);


			//$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
			$mail->isHTML(true);                                  // Set email format to HTML

			$mail->Subject = 'Recuperacao de palavra-passe';
			$mail->Body    = 'Para recuperar a palavra-passe clique no link abaixo: <br>'.$url;
			$mail->AltBody = '';

			if(!$mail->send()) {
				echo 'Message could not be sent.';
				echo 'Mailer Error: ' . $mail->ErrorInfo;
			} else {

				$_SESSION['msgRecuperacao'] = '<div class="alert alert-warning alert-dismissible" data-auto-dismiss role="alert" style="background-color:#89bdf4;border-radius:8px";>
				<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				 <span style="color:white;">E-mail enviado com sucesso!</span>
				</div>';

				header("Location: ../logins/authentication-login.php");

			}


		//


		//mail($email,"Reset password","To reset your password, please click here: ola","From: bgomes18.1999@gmail.com\r\n");

		$conn->query("UPDATE comprador set tokenComprador='$str' WHERE emailComprador='$email'");

		$_SESSION['msgRecuperacao'] = '<div class="alert alert-warning alert-dismissible fade-show" data-auto-dismiss role="alert" style="background-color:#89bdf4;border-radius:8px";>
			<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			 <span style="color:white;">Dentro de alguns minutos receberá um e-mail para recuperar a sua palavra-passe.</span>
			</div>';

		header("Location: ../logins/authentication-login.php");


	}else{

			if($findemailu){

		//RECUPERAÇÃO DE EMAIL


		$str = "0123456789qwertyuiopasdfghjklzxcvbnm";

		$str = str_shuffle($str);

		$str = substr($str,0,10);

		$url = "http://localhost/mednager/php/reset_pass/resetPasswordUtente.php?token=$str&email=$email&tipo=u";

		echo $url;

		//CODIGO PHPMAILER


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

			$mail->setFrom(EMAIL, 'mednager');
			$mail->addAddress($email);     // Add a recipient

			$mail->addReplyTo(EMAIL);


			//$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
			$mail->isHTML(true);                                  // Set email format to HTML

			$mail->Subject = 'Recuperacao de palavra-passe';
			$mail->Body    = 'Para recuperar a palavra-passe clique no link abaixo: <br>'.$url;
			$mail->AltBody = '';

			if(!$mail->send()) {
				echo 'Message could not be sent.';
				echo 'Mailer Error: ' . $mail->ErrorInfo;
			} else {

				$_SESSION['msgRecuperacao'] = '<div class="alert alert-warning alert-dismissible" data-auto-dismiss role="alert" style="background-color:#89bdf4;border-radius:8px";>
				<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				 <span style="color:white;">E-mail enviado com sucesso!</span>
				</div>';

				header("Location: ../logins/authentication-login.php");

			}


		//


		//mail($email,"Recuperação de palavra-passe - mednager","To reset your password, please click here: $url","From: admin@mednager.local\r\n");

		$conn->query("UPDATE utente set tokenUtente='$str' WHERE emailUtente='$email'");

		//FIM DA RECUPERAÇÃO


		//header("Location: ../html/ltr/authentication-login.php?signup=recup");

		$_SESSION['msgRecuperacao'] = '<div class="alert alert-warning alert-dismissible fade-show" data-auto-dismiss role="alert" style="background-color:#89bdf4;border-radius:8px";>
			<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			 <span style="color:white;">Dentro de alguns minutos receberá um e-mail para recuperar a sua palavra-passe.</span>
			</div>';

		header("Location: ../logins/authentication-login.php");


	}else{

		//location a dizer que este email nao existe na bd

		$_SESSION['msgRecuperacao'] = '<p id="erro">Não existe nenhuma conta com este e-mail!<br><br></p>';

		header("Location: ../logins/authentication-login.php");


	}

	}



	$conn->close();

}else{

	if(!(isset($_SESSION['login_user']) && $_SESSION['login_user'] != "")){
	header('Location: ../logins/authentication-login.php');
}
	}

?>
