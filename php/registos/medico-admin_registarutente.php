<?php

	if(isset($_POST['submit'])){

	$email = $_POST["email"];

	$nome = $_POST["nome"];

	$ccUtente = $_POST["ccUtente"];

	session_start();

	$nomeEnvia = $_SESSION['login_user'];


	if(!is_numeric($ccUtente)){

		header("Location: medico-admin_registoutente.php?rutente=ccinvalido");

			exit();

	}

	$servername = "localhost";
	$username = "admin";
	$password = "Sutas4Ever2018";
	$bd = "mydb";

	// Create connection
	$conn = new mysqli($servername, $username, $password, $bd);
	// Check connection
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	}


				$findemailc = false;
				$findemailu = false;
				$findcc = false;

		//Comparar o email com o email dos utentes

			$sql5 = "SELECT emailUtente from utente";
			$result = $conn->query($sql5);

			if ($result->num_rows > 0) {
				// output data of each row
				while($row = $result->fetch_assoc()) {


					if( $row["emailUtente"] == $email){

				echo "Este e-mail já existe no UTENTE" ;

				$findemailu = true;

					}


				}
			}


			//Comparar o email com o email dos compradores

			$sql6 = "SELECT * from comprador";
			$result = $conn->query($sql6);

			if ($result->num_rows > 0) {
				// output data of each row
				while($row = $result->fetch_assoc()) {


					if( $row["emailComprador"] == $email){





					echo "Este e-mail já existe no COMPRADOR" ;

					$findemailc = true;

					}


				}
			}

			//Comparar o numero de ordem com outros

			$sql7 = "SELECT ccUtente from utente";
			$result = $conn->query($sql7);

			if ($result->num_rows > 0) {
				// output data of each row
				while($row = $result->fetch_assoc()) {


					if( $row["ccUtente"] == $ccUtente){

				echo "Este cartão de cidadão já está registado noutro médico." ;

					$findcc = true;

					}


				}
			}


			//se encontrar o email na tabela dos utentes ou compradores dar erro

			if($findemailc || $findemailu){

				header("Location: medico-admin_registoutente?rutente=email");

				exit();

			}else{
				//se já houver um cc
				if($findcc){

				header("Location: medico-admin_registoutente?rutente=cc");

				exit();

			}else{

				//INSERIR NA BD

				//gerar pass aleatoria

				$pass = "0123456789qwertyuiopasdfghjklzxcvbnm";

				$pass = str_shuffle($pass);

				$pass = substr($pass,0,6);

				$passNoChange = $pass;


		$sql = "INSERT into utente(ccUtente, emailUtente, passUtente, nomeUtente, sexoUtente,codPermissao,codAlertaUtente, codSubsistema) values('$ccUtente','$email',md5('$pass'),'$nome',' ',3,1,1);";

		//Criar especialidade 1 - novo | O comprador só insere a sua "especialidade" após a página de registo

		$query = mysqli_query($conn,$sql);

		if($query){

			$permissao = $_SESSION['permissao'];

			if($permissao == 1){

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

					$mail->Subject = 'Bem-vindo ao mednager!';
					$mail->Body    = $nomeEnvia.' registou a sua conta na plataforma mednager!<br>
					<br>As suas credenciais:
					<br>Identificacao: '.$ccUtente.'
					<br>Palavra-passe: '.$passNoChange.'
					<br><br>Para entrar na plataforma clique no seguinte link: localhost/mednager/php/logins/authentication-login.php';
					$mail->AltBody = '';

					if(!$mail->send()) {
						echo 'Message could not be sent.';
						echo 'Mailer Error: ' . $mail->ErrorInfo;
					}

				header("Location: ../indexes/index-admin.php?utente=add&nome=$nome");

			 exit();

			}else{

				//enviar email do medico

				if($permissao == 2){

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

						$mail->Subject = 'Bem-vindo ao mednager!';
						$mail->Body    = $nomeEnvia.' registou a sua conta na plataforma mednager!<br>
						<br>As suas credenciais:
						<br>Identificacao: '.$ccUtente.'
						<br>Palavra-passe: '.$passNoChange.'
						<br><br>Para entrar na plataforma clique no seguinte link: localhost/mednager/php/logins/authentication-login.php';
						$mail->AltBody = '';

						if(!$mail->send()) {
							echo 'Message could not be sent.';
							echo 'Mailer Error: ' . $mail->ErrorInfo;
						}

			header("Location: ../indexes/index-medico.php?utente=add&nome=$nome");

			exit();
		}

}

		}else{



		}

			}

			}




		echo mysqli_error($conn);

		$conn->close();



	}else{

	if(!(isset($_SESSION['login_user']) && $_SESSION['login_user'] != "")){
	header('Location: ../logins/authentication-login.php');
}
	}

?>
