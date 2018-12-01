<?php

	if(isset($_POST['submit'])){


	$email = $_POST["email"];

	$nome = $_POST["nome"];

	$numeroOrdem = $_POST["numeroOrdem"];

	$nif = $_POST["nif"];

	$cc = $_POST["cc"];



	if(!is_numeric($numeroOrdem)){

		header("Location: admin_registomedico?rmedico=noinvalido");

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

		session_start();

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
				$findcc = false;
				$findnif = false;
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

			$sql7 = "SELECT nrOrdem from comprador";
			$result = $conn->query($sql7);

			if ($result->num_rows > 0) {
				// output data of each row
				while($row = $result->fetch_assoc()) {


					if( $row["nrOrdem"] == $numeroOrdem){

				echo "Este número de ordem já está registado." ;

					$findcc = true;

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

					$findnif = true;

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

					$findcc = true;

					}


				}
			}


			//se encontrar o email na tabela dos utentes ou compradores dar erro

			if($findemailc || $findemailu){

				header("Location: admin_registomedico.php?rmedico=email");

				exit();

			}else{
				//se já houver um cc
				if($findcc){

				header("Location: admin_registomedico.php?rmedico=no");

				exit();

			} else if($findcc){
				header("Location: admin_registomedico.php?rmedico=cc");

				exit();

			} else if ($findnif){

				header("Location: admin_registomedico.php?rmedico=nif");

				exit();

			}else{

				//INSERIR NA BD

				//gerar pass aleatoria

				$pass = "0123456789qwertyuiopasdfghjklzxcvbnm";

				$pass = str_shuffle($pass);

				$pass = substr($pass,0,6);

				$passNoChange = $pass;


		$sql = "INSERT into COMPRADOR(nrOrdem, emailComprador, passComprador, nomeComprador, sexoComprador,codPermissao, codEspecialidade, LEIComprador,estadoComprador, NIFComprador, ccComprador, emailconfirmComprador) values('$numeroOrdem','$email',md5('$pass'),'$nome',' ',2,1,'$LEIComprador',0, '$nif', '$cc',0);";

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

				header("Location: ../indexes/index-admin.php?medico=add&nome=$nome");

			 exit();



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
