<?php

	if(isset($_POST['submit'])){

		@session_start();


	$email = $_POST["email"];

	$nome = $_POST["nome"];

	$numeroOrdem = $_POST["numeroOrdem"];

	$nif = $_POST["nif"];

	$cc = $_POST["cc"];



	if(!is_numeric($numeroOrdem)){

		$_SESSION['msgAdminRegistaMedico'] = '<p id="erro">Este número de ordem é inválido!<br><br></p>';

		header("Location: admin_registomedico.php");

		exit();

	}

	include "../topos/header.php";



			$emailA = $_SESSION['email'];

			$nomeEnvia = $_SESSION['login_user'];

			$sql = "SELECT * from comprador where emailComprador like '$emailA'";
			$result = $conn->query($sql);

			if ($result->num_rows > 0) {
			  // output data of each row
			  while($row = $result->fetch_assoc()) {

			  $LEIComprador = $row['LEIComprador'];

			  }
			}


				$findemailc = false;
				$findemailu = false;
				$findccC = false;
				$findccU = false;
				$findnifC = false;
				$findnifU = false;
				$findno = false;


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

				echo "Este número de ordem já está registado." ;

					$findno = true;

					}


				}
			}


			$sql8 = "SELECT NIFComprador from comprador";
			$result = $conn->query($sql8);

			if ($result->num_rows > 0) {
				// output data of each row
				while($row = $result->fetch_assoc()) {


					if( $row["NIFComprador"] == $nif){

				echo "Este NIF já está registado." ;

					$findnifC = true;

					}


				}
			}

			$sql81 = "SELECT NIFUtente from utente";
			$result = $conn->query($sql81);

			if ($result->num_rows > 0) {
				// output data of each row
				while($row = $result->fetch_assoc()) {


					if( $row["NIFUtente"] == $nif){

				echo "Este NIF já está registado." ;

					$findnifU = true;

					}


				}
			}

			$sql9 = "SELECT ccComprador from comprador";
			$result = $conn->query($sql9);

			if ($result->num_rows > 0) {
				// output data of each row
				while($row = $result->fetch_assoc()) {


					if( $row["ccComprador"] == $cc){

				echo "Este Cartão de cidadão  já está registado." ;

					$findccC = true;

					}


				}
			}

			$sql9 = "SELECT ccUtente from utente";
			$result = $conn->query($sql9);

			if ($result->num_rows > 0) {
				// output data of each row
				while($row = $result->fetch_assoc()) {


					if( $row["ccUtente"] == $cc){

				echo "Este Cartão de cidadão  já está registado." ;

					$findccU = true;

					}


				}
			}


			//se encontrar o email na tabela dos utentes ou compradores dar erro

			if($findemailc || $findemailu){

				$_SESSION['msgAdminRegistaMedico'] = '<p id="erro">Este endereço de e-mail já se encontra associado a outra conta!<br><br></p>';

				header("Location: admin_registomedico.php");

				exit();

			}else{
				//se já houver um cc
				if($findno){

				$_SESSION['msgAdminRegistaMedico'] = '<p id="erro">Este número de ordem já se encontra associado a outra conta.<br><br></p>';

				header("Location: admin_registomedico.php");

				exit();

			} else if($findccC || $findccU){

				$_SESSION['msgAdminRegistaMedico'] = '<p id="erro">Este Cartão de cidadão já se encontra associado a outra conta!<br><br></p>';

				header("Location: admin_registomedico.php");

				exit();

			} else if ($findnifC || $findnifU){

				$_SESSION['msgAdminRegistaMedico'] = '<p id="erro">Este NIF já se encontra associado a outra conta!<br><br></p>';

				header("Location: admin_registomedico.php");

				exit();

			}else{

				//INSERIR NA BD

				//gerar pass aleatoria

				$pass = "0123456789qwertyuiopasdfghjklzxcvbnm";

				$pass = str_shuffle($pass);

				$pass = substr($pass,0,6);

				$passNoChange = $pass;


		$sql = "INSERT into COMPRADOR(nrOrdem, emailComprador, passComprador, nomeComprador, sexoComprador,codPermissao, codEspecialidade, LEIComprador,estadoComprador, NIFComprador, ccComprador, emailconfirmComprador,associacao) values('$numeroOrdem','$email',md5('$pass'),'$nome',' ',2,1,'$LEIComprador',0, '$nif', '$cc',0,2);";

		//Criar especialidade 1 - novo | O comprador só insere a sua "especialidade" após a página de registo

		$query = mysqli_query($conn,$sql);

		if($query){

			$str = "0123456789qwertyuiopasdfghjklzxcvbnm";

			$str = str_shuffle($str);

			$str = substr($str,0,12);

			$url = "http://localhost/mednager/php/registos/emailConfirmComprador.php?codeEmailConfirm=$str&email=$email&tipo=c";

			echo $url;

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
					<br>Identificacao: '.$email.'
					<br>Palavra-passe: '.$passNoChange.'
					<br><br>Para entrar na plataforma clique no seguinte link:<br>'.$url;
					$mail->AltBody = '';

					if(!$mail->send()) {
						echo 'Message could not be sent.';
						echo 'Mailer Error: ' . $mail->ErrorInfo;
					}

					$conn->query("UPDATE comprador set codeEmailConfirm='$str' WHERE emailComprador='$email'");

			 $_SESSION['msgUtenteAdd'] = '<div class="alert alert-warning alert-dismissible" data-auto-dismiss role="alert" style="background-color:#89bdf4;border-radius:8px";>
			 <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<span style="color:white;">Obrigado por realizar o registo do médico '.$nome.'!<br>Ser-lhe-á enviado um e-mail com as credenciais.</span>
			 </div>';

			 header("Location: ../indexes/index-admin.php");

			 exit();



		}else{

			$_SESSION['msgAdminRegistaMedico'] = '<p id="erro">Ocorreu um erro no registo do médico!<br><br></p>';

			header("Location: admin_registomedico.php");

			exit();

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
