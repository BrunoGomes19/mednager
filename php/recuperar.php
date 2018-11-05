<?php



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
		
		$url = "http://localhost/mednager/php/resetPasswordComprador.php?token=$str&email=$email&tipo=c";
		
		echo $url;
		
		//CODIGO PHPMAILER
		
		
		require '../PHPMailerAutoload.php';
		require '../credential.php';

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
				
				header("Location: ../html/ltr/authentication-login.php?signup=ee");
				
			}

		
		//
		
		
		//mail($email,"Reset password","To reset your password, please click here: ola","From: bgomes18.1999@gmail.com\r\n");
		
		$conn->query("UPDATE comprador set tokenComprador='$str' WHERE emailComprador='$email'");
		
		//FIM DA RECUPERAÇÃO

		
		//header("Location: ../html/ltr/authentication-login.php?signup=recup");

		
	}else{
			
			if($findemailu){
		
		//RECUPERAÇÃO DE EMAIL
		
		
		$str = "0123456789qwertyuiopasdfghjklzxcvbnm";
		
		$str = str_shuffle($str);
		
		$str = substr($str,0,10);
		
		$url = "http://localhost/mednager/php/resetPasswordUtente.php?token=$str&email=$email&tipo=u";
		
		echo $url;
		
		//CODIGO PHPMAILER
		
		
		require '../PHPMailerAutoload.php';
		require '../credential.php';

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
				
				header("Location: ../html/ltr/authentication-login.php?signup=ee");
				
			}

		
		//
		
		
		//mail($email,"Recuperação de palavra-passe - mednager","To reset your password, please click here: $url","From: admin@mednager.local\r\n");
		
		$conn->query("UPDATE utente set tokenUtente='$str' WHERE emailUtente='$email'");
		
		//FIM DA RECUPERAÇÃO

		
		//header("Location: ../html/ltr/authentication-login.php?signup=recup");

		
	}else{
		
		//location a dizer que este email nao existe na bd
		
		header("Location: ../html/ltr/authentication-login.php?signup=emailnotin&recup=1");
					
			exit();
		
	}
		
	}
  

	
	$conn->close();

}else{
	
	if(!(isset($_SESSION['login_user']) && $_SESSION['login_user'] != "")){
	header('Location: ../html/ltr/authentication-login.php');
}
	}
	
?>