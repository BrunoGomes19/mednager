<?php

	if(isset($_POST['submit'])){

	$email = $_POST["email"];

	$pass = $_POST["password"];

	$sexo = $_POST["sexo"];

	$nome = $_POST["nome"];

	$numeroOrdem = $_POST["nrOrdem"];

	$cc = $_POST["cc"];

	$nif = $_POST["nif"];

	$confirmPassword = $_POST["confirmPassword"];

	session_start();


	if(!is_numeric($numeroOrdem)){

		$_SESSION['msgRegisto'] = '<p id="erro">Este número de ordem é inválido.<br><br></p>';

		header("Location: authentication-register.php");

	}

	if($pass != $confirmPassword){

		$_SESSION['msgRegisto'] = '<p id="erro">As palavra-passe não coincidem.<br><br></p>';

		header("Location: authentication-register.php");

	}else{

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

		$findemailu = false;

		$findemailc = false;

		$findno = false;

		$findccU = false;

		$findccC = false;

		$findNIFU = false;

		$findNIFC = false;

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

			$sql7 = "SELECT nrOrdem from comprador";
			$result = $conn->query($sql7);

			if ($result->num_rows > 0) {
				// output data of each row
				while($row = $result->fetch_assoc()) {


					if( $row["nrOrdem"] == $numeroOrdem){

				echo "Este número de ordem já está registado noutro médico." ;

					$findno = true;

					}


				}
			}

			//Comparar o numero de cc com outros utente

			$sql13 = "SELECT ccUtente from utente";
			$result = $conn->query($sql13);

			if ($result->num_rows > 0) {
				// output data of each row
				while($row = $result->fetch_assoc()) {


					if( $row["ccUtente"] == $cc){

					$findccU = true;

					}


				}
			}

			//Comparar o numero de cc com outros comprador

			$sql14 = "SELECT ccComprador from comprador";
			$result = $conn->query($sql14);

			if ($result->num_rows > 0) {
				// output data of each row
				while($row = $result->fetch_assoc()) {


					if( $row["ccComprador"] == $cc){

					$findccC = true;

					}


				}
			}

			//nif
			//Comparar o nif com outros utente

			$sql13 = "SELECT NIFUtente from utente";
			$result = $conn->query($sql13);

			if ($result->num_rows > 0) {
				// output data of each row
				while($row = $result->fetch_assoc()) {


					if( $row["NIFUtente"] == $nif){

					$findNIFU = true;

					}


				}
			}

			//Comparar o nif com outros comprador

			$sql14 = "SELECT NIFComprador from comprador";
			$result = $conn->query($sql14);

			if ($result->num_rows > 0) {
				// output data of each row
				while($row = $result->fetch_assoc()) {


					if( $row["NIFComprador"] == $nif){

					$findNIFC = true;

					}


				}
			}

			//se encontrar o email na tabela dos utentes ou compradores dar erro

			if($findemailc || $findemailu){

				$_SESSION['msgRegisto'] = '<p id="erro">Este e-mail já está associado a outra conta.<br><br></p>';

				header("Location: authentication-register.php");

			}else{
				//se já houver um numero de ordem
				if($findno){

				$_SESSION['msgRegisto'] = '<p id="erro">Este número de ordem já está associado a outra conta.<br><br></p>';

				header("Location: authentication-register.php");

			}else{

				if($findccU || $findccC){

					$_SESSION['msgRegisto'] = '<p id="erro">Este cartão de cidadão já está associado a outra conta.<br><br></p>';

					header("Location: authentication-register.php");

				}else{

					if($findNIFU || $findNIFC){

						$_SESSION['msgRegisto'] = '<p id="erro">Este NIF já está associado a outra conta.<br><br></p>';

						header("Location: authentication-register.php");

					}else{

				//INSERIR NA BD

		$sql = "INSERT into comprador(NIFComprador,emailComprador,ccComprador,passComprador,nrOrdem,nomeComprador,sexoComprador,codEspecialidade,codPermissao,codAlertaComprador,estadoComprador,emailConfirmComprador) values('$nif','$email','$cc',md5('$pass'),$numeroOrdem,'$nome','$sexo',1,2,1,0,0);";

		//Criar especialidade 1 - novo | O comprador só insere a sua "especialidade" após a página de registo

		$query = mysqli_query($conn,$sql);

		if($query){

			$str = "0123456789qwertyuiopasdfghjklzxcvbnm";

			$str = str_shuffle($str);

			$str = substr($str,0,12);

			$url = "http://localhost/mednager/php/registos/emailConfirmComprador.php?codeEmailConfirm=$str&email=$email&tipo=c";

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

				$mail->Subject = 'Confirmacao de email';
				$mail->Body    = 'Para terminar a confirmacao de email clique no seguinte link: <br>'.$url;
				$mail->AltBody = '';

				if(!$mail->send()) {
					echo 'Message could not be sent.';
					echo 'Mailer Error: ' . $mail->ErrorInfo;
				} else {

					$_SESSION['msgRegisto'] = '<div class="alert alert-warning alert-dismissible" data-auto-dismiss role="alert" style="background-color:#89bdf4;border-radius:8px";>
							  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
							   <span style="color:white;">E-mail enviado com sucesso!</span>
								</div>';

					header("Location: ../logins/authentication-login.php");

				}


			//


			//mail($email,"Reset password","To reset your password, please click here: ola","From: bgomes18.1999@gmail.com\r\n");

			$conn->query("UPDATE comprador set codeEmailConfirm='$str' WHERE emailComprador='$email'");



	//Fim do email com link

			exit();

		}else{

			echo mysqli_error($conn);

			$_SESSION['msgRegisto'] = '<p id="erro">Ocorreu um erro a registar o comprador.<br><br></p>';

			header("Location: authentication-register.php");

		}

}
			}
		}

			}




		echo mysqli_error($conn);

		$conn->close();

	}

	}else{

	if(!(isset($_SESSION['login_user']) && $_SESSION['login_user'] != "")){
	header('Location: ../logins/authentication-login.php');
}
	}

?>
