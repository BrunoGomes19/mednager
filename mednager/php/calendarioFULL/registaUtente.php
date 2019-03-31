<?php


	$email = $_GET["email"];

	$nome = $_GET["nome"];

	$ccUtente = $_GET["cc"];

	$nif = $_GET["nif"];


	if(!is_numeric($ccUtente)){

		echo 'Número de cartão de cidadão inválido';

		exit();

	}

include('../topos/header.php');


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

				echo "Este endereço de e-mail já se encontra associado a outra conta!";
				exit();


			}else{
				//se já houver um cc
				if($findccU || $findccC){

				echo"Este número de cartão de cidadão já se encontra associado a outra conta.";
				exit();



			} else if ($findnifu || $findnifc) {

				echo"Este nif já se encontra associado a outra conta!";
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



					$sql2 = "INSERT into associados(comprador_codComprador	, utente_ccUtente,confirmacao) values('$codComprador','$ccUtente',1);";

					$query2 = mysqli_query($conn,$sql2);



					if($query2){

						$str = "0123456789qwertyuiopasdfghjklzxcvbnm";

						$str = str_shuffle($str);

						$str = substr($str,0,12);

						$url = "http://localhost/mednager/php/registos/emailConfirmUtente.php?codeEmailConfirm=$str&email=$email&tipo=u";

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

							$mail->Subject = 'Bem-vindo ao mednager!';
							$mail->Body    = 'Foi registado na plataforma mednager!<br>
							<br>As suas credenciais:
							<br>Identificação: '.$ccUtente.'
							<br>Palavra-passe: '.$passNoChange.'
							<br><br>Para entrar na plataforma clique no seguinte link:<br>'.$url;
							$mail->AltBody = '';

							if(!$mail->send()) {
								echo "b";
							}else{

									$conn->query("UPDATE utente set codeEmailConfirm='$str' WHERE emailUtente='$email'");

									echo "a";
}

			}



					}




		}

			}

		$conn->close();



	if(!(isset($_SESSION['login_user']) && $_SESSION['login_user'] != "")){
	header('Location: ../logins/authentication-login.php');

	exit();

}


?>
