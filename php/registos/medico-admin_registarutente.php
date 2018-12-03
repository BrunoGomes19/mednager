<?php

	if(isset($_POST['submit'])){

	@session_start();

	$email = $_POST["email"];

	$nome = $_POST["nome"];

	$ccUtente = $_POST["ccUtente"];

	$nif = $_POST["nif"];

	$nomeEnvia = $_SESSION['login_user'];


	if(!is_numeric($ccUtente)){

		$_SESSION['msgMedicoAdminRUtente'] = '<p id="erro">Este número de cartão de cidadão é inválido!<br><br></p>';

		header("Location: medico-admin_registoutente.php");

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
				$findccU = false;
				$findccC = false;
				$findnifu = false;
				$findnifc = false;

//ver infos

$emailA = $_SESSION['email'];

$sql = "SELECT * from comprador where emailComprador like '$emailA'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
	// output data of each row
	while($row = $result->fetch_assoc()) {

	$codComprador = $row['codComprador'];

	}
}

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

			//Comparar o numero de ordem com outros where

			$sql7 = "SELECT ccUtente from utente";
			$result = $conn->query($sql7);

			if ($result->num_rows > 0) {
				// output data of each row
				while($row = $result->fetch_assoc()) {


					if( $row["ccUtente"] == $ccUtente){

						echo "Este cartão de cidadão já está registado noutro médico." ;

						$findccU = true;

					}


				}
			}

			$sql77 = "SELECT ccComprador from comprador";
			$result = $conn->query($sql77);

			if ($result->num_rows > 0) {
				// output data of each row
				while($row = $result->fetch_assoc()) {


					if( $row["ccComprador"] == $ccUtente){

						echo "Este cartão de cidadão já está registado noutro médico." ;

						$findccC = true;

					}


				}
			}

			//Comparar o email com o email dos compradores

			$sql8 = "SELECT NIFUtente from utente";
			$result = $conn->query($sql8);

			if ($result->num_rows > 0) {
				// output data of each row
				while($row = $result->fetch_assoc()) {


					if( $row["NIFUtente"] == $nif){

						echo "Este nif já existe no UTENTE" ;

						$findnifu = true;

					}


				}
			}

			$sql66 = "SELECT NIFComprador from comprador";
			$result = $conn->query($sql66);

			if ($result->num_rows > 0) {
				// output data of each row
				while($row = $result->fetch_assoc()) {


					if( $row["NIFComprador"] == $nif){

						$findnifc = true;

					}


				}
			}

			//se encontrar o email na tabela dos utentes ou compradores dar erro

			if($findemailc || $findemailu){

				$_SESSION['msgMedicoAdminRUtente'] = '<p id="erro">Este endereço de e-mail já se encontra associado a outra conta!<br><br></p>';

				header("Location: medico-admin_registoutente.php");

				exit();

			}else{
				//se já houver um cc
				if($findccU || $findccC){

				$_SESSION['msgMedicoAdminRUtente'] = '<p id="erro">Este número de cartão de cidadão já se encontra associado a outra conta.<br><br></p>';

				header("Location: medico-admin_registoutente.php");

				exit();

			} else if ($findnifu || $findnifc) {

				$_SESSION['msgMedicoAdminRUtente'] = '<p id="erro">Este nif já se encontra associado a outra conta!<br><br></p>';

				header("Location: medico-admin_registoutente.php");

				exit();

			}else{

				//INSERIR NA BD

				//gerar pass aleatoria

				$pass = "0123456789qwertyuiopasdfghjklzxcvbnm";

				$pass = str_shuffle($pass);

				$pass = substr($pass,0,6);

				$passNoChange = $pass;


		$sql = "INSERT into utente(ccUtente, emailUtente, passUtente, nomeUtente, sexoUtente,codPermissao, codSubsistema, NIFUtente, emailConfirmUtente) values('$ccUtente','$email',md5('$pass'),'$nome',' ',3,1, '$nif',0);";

		//Criar especialidade 1 - novo | O comprador só insere a sua "especialidade" após a página de registo

		$query = mysqli_query($conn,$sql);

		if($query){

			$permissao = $_SESSION['permissao'];

			if($permissao == 1){

				$str = "0123456789qwertyuiopasdfghjklzxcvbnm";

				$str = str_shuffle($str);

				$str = substr($str,0,12);

				$url = "http://localhost/mednager/php/registos/emailConfirmUtente.php?codeEmailConfirm=$str&email=$email&tipo=u";

				echo $url;

				//phpmailer

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
					<br><br>Para entrar na plataforma clique no seguinte link:<br>'.$url;
					$mail->AltBody = '';

					if(!$mail->send()) {
						echo 'Message could not be sent.';
						echo 'Mailer Error: ' . $mail->ErrorInfo;
					}

					$conn->query("UPDATE utente set codeEmailConfirm='$str' WHERE emailUtente='$email'");

					$_SESSION['msgUtenteAdd'] = '<div class="alert alert-warning alert-dismissible" data-auto-dismiss role="alert" style="background-color:#89bdf4;border-radius:8px";>
					<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					 <span style="color:white;">Obrigado por realizar o registo do utente '.$nome.' !<br>Ser-lhe-á enviado um e-mail com as credenciais.</span>
					</div>';

					header("Location: ../indexes/index-admin.php");

					exit();

			}else{

				//enviar email do medico

				if($permissao == 2){

					$sql2 = "INSERT into associados(idAssoc,comprador_codComprador	, utente_ccUtente	,confirmacao) values(NULL,'$codComprador','$ccUtente',1);";

					$query2 = mysqli_query($conn,$sql2);

					$qualAssoc = "SELECT idAssoc from associados where comprador_codComprador = $codComprador and utente_ccUtente = $ccUtente";
					$resAssoc = $conn->query($qualAssoc);

					$notif = "INSERT INTO alertautente (codAlertaUtente, descriAlertaUtente, estadoUtente, ccUtente, servico_id, planoMedicacao_id, idAssoc, dataAlertaUtente) VALUES (NULL, NULL, 0, '$ccUtente', null, null, $resAssoc, now())";
					$query = mysqli_query($conn,$notif);

					if($query2){

						$str = "0123456789qwertyuiopasdfghjklzxcvbnm";

						$str = str_shuffle($str);

						$str = substr($str,0,12);

						$url = "http://localhost/mednager/php/registos/emailConfirmUtente.php?codeEmailConfirm=$str&email=$email&tipo=u";

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

							$mail->Subject = 'Bem-vindo ao mednager!';
							$mail->Body    = $nomeEnvia.' registou a sua conta na plataforma mednager!<br>
							<br>As suas credenciais:
							<br>Identificacao: '.$ccUtente.'
							<br>Palavra-passe: '.$passNoChange.'
							<br><br>Para entrar na plataforma clique no seguinte link:<br>'.$url;
							$mail->AltBody = '';

							if(!$mail->send()) {
								echo 'Message could not be sent.';
								echo 'Mailer Error: ' . $mail->ErrorInfo;
							}

									$conn->query("UPDATE utente set codeEmailConfirm='$str' WHERE emailUtente='$email'");

				$_SESSION['msgUtenteAdd'] = '<div class="alert alert-warning alert-dismissible" data-auto-dismiss role="alert" style="background-color:#89bdf4;border-radius:8px";>
				<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				 <span style="color:white;">Obrigado por realizar o registo do utente '.$nome.' !<br>Ser-lhe-á enviado um e-mail com as credenciais.</span>
				</div>';

				header("Location: ../indexes/index-medico.php");

				exit();

			}

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

	exit();

}
	}

?>
