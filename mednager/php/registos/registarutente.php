<?php

	if(isset($_POST['submit'])){

		@session_start();

	$email = $_POST["email"];

	$pass = $_POST["password"];

	$sexo = $_POST["sexo"];

	$nif = $_POST["nif"];

	$nome = $_POST["nome"];

	$ccUtente = $_POST["ccUtente"];

	$confirmPassword = $_POST["confirmPassword"];


	if(!is_numeric($ccUtente)){

		$_SESSION['msgRegisto'] = '<p id="erro">Este cartão de cidadão é inválido.<br><br></p>';

		header("Location: auth-reg-utente.php");

		exit();

	}

	if($pass != $confirmPassword){

		$_SESSION['msgRegisto'] = '<p id="erro">As palavra-passe não coincidem.<br><br></p>';

		header("Location: auth-reg-utente.php");

		exit();

	}else{

	include "../topos/config.php";

	$conn->set_charset("utf8");

		$findemailu = false;

		$findemailc = false;

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

			//Comparar o CC com outros utentes

			$sql7 = "SELECT ccUtente from utente";
			$result = $conn->query($sql7);

			if ($result->num_rows > 0) {
				// output data of each row
				while($row = $result->fetch_assoc()) {


					if( $row["ccUtente"] == $ccUtente){

				echo "Este cartão de cidadão já está registado noutra pessoa." ;

					$findccU = true;

					}


				}
			}

			//Comparar o CC com outros medicos

			$sql8 = "SELECT ccComprador from comprador";
			$result = $conn->query($sql8);

			if ($result->num_rows > 0) {
				// output data of each row
				while($row = $result->fetch_assoc()) {


					if( $row["ccComprador"] == $ccUtente){

				echo "Este cartão de cidadão já está registado noutra pessoa." ;

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

				header("Location: auth-reg-utente.php");

				exit();

			}else{
				//se já houver um numero de ordem
				if($findccC || $findccU){

				$_SESSION['msgRegisto'] = '<p id="erro">Este Cartão de cidadão já está associado a outra conta.<br><br></p>';

				header("Location: auth-reg-utente.php");

				exit();

			}else{

				if($findNIFC || $findNIFU){

				$_SESSION['msgRegisto'] = '<p id="erro">Este NIF já está associado a outra conta.<br><br></p>';

				header("Location: auth-reg-utente.php");

				exit();

			}else{

				//INSERIR NA BD

		$sql = "INSERT into utente(nifUtente,ccUtente, emailUtente, passUtente, nomeUtente, sexoUtente,codPermissao, codSubsistema, emailconfirmUtente) values('$nif','$ccUtente','$email',md5('$pass'),'$nome','$sexo',3,1,0);";

		//Criar especialidade 1 - novo | O comprador só insere a sua "especialidade" após a página de registo

		$query = mysqli_query($conn,$sql);

		if($query){

//Enviar email com link

		$str = "0123456789qwertyuiopasdfghjklzxcvbnm";

		$str = str_shuffle($str);

		$str = substr($str,0,12);

		$url = "http://localhost/mednager/php/registos/emailConfirmUtente.php?codeEmailConfirm=$str&email=$email&tipo=u";

		echo $url;

		//CODIGO PHPMAILER


		require '../../PHPMailerAutoload.php';
		require '../../credential.php';

			$mail = new PHPMailer;

			$mail->CharSet = "UTF-8";

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

			$mail->Subject = 'Confirmação de email';
			$mail->Body    = 'Para confirmar o email clique no seguinte link: <br>'.$url;
			$mail->AltBody = '';

			if(!$mail->send()) {
				echo 'Message could not be sent.';
				echo 'Mailer Error: ' . $mail->ErrorInfo;
			} else {

				$_SESSION['msgRegisto'] = '<div class="alert alert-warning alert-dismissible" data-auto-dismiss role="alert" style="background-color:#89bdf4;border-radius:8px";>
							  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
							   <span style="color:white;">Email enviado com sucesso!</span>
								</div>';

				header("Location: ../logins/authentication-login.php");

				$conn->query("UPDATE utente set codeEmailConfirm='$str' WHERE emailUtente='$email'");

				exit();

			}


			$_SESSION['msgRegisto'] = '<div class="alert alert-warning alert-dismissible" data-auto-dismiss role="alert" style="background-color:#89bdf4;border-radius:8px";>
			<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			 <span style="color:white;">Obrigado por efetuar o seu registo.<br>Por favor verifique o seu email para confirmar a sua conta!</span>
			</div>';

			header("Location: ../logins/authentication-login.php");

			exit();

		}else{

			$_SESSION['msgRegisto'] = '<p id="erro">Ocorreu um erro a registar o utente.<br><br></p>';

			header("Location: auth-reg-utente.php");

			exit();

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

	exit();

}
	}

?>
