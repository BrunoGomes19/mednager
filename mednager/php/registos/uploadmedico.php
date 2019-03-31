
<?php

include_once "../topos/header.php";

session_start();

$emailA = $_SESSION['email'];
$numero=0;
$sql = "SELECT * from comprador where emailComprador='$emailA'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {

			$numero = $row['ccComprador'];

    }
} else {
    echo "0 results";
}


	$msg = "";
	if(!empty($_FILES)){
		$today = date("Y-m-d H:i:s");
		$link = "";
		$n = 1;
		$utilizador = $_GET['nome'];
		for($i = 0;$i<$n;$i++){
		  $nome = "file".$i;
		  $temp = $_FILES[$nome]['tmp_name'];

		  $path_parts = pathinfo($_FILES[$nome]["name"]);
		  $extension = $path_parts['extension'];
		  //$link = "../../fotosPerfil/".$_FILES[$nome]["name"];
			$link = "../../fotosPerfil/".$numero.".".$extension;
		  if(move_uploaded_file($_FILES[$nome]['tmp_name'], $link)){
		   // $sql = "INSERT INTO utilizador(nome,linkimagem) VALUES ('".$utilizador."','".$link."')";

				//	$sql = "UPDATE utente set codSubsistema = '$Subsistema', nrSubsistema='$nrSubsistema', dataNascUtente='$date',nomeUtente = '$nomecompleto',ObservacoesUtente='$sobremim',moradaUtente='$morada',codPostalUtente='$codigopostal',localidadeUtente='$cidade',NIBUtente='$nib',NIFUtente='$nif',contacto1Utente='$contacto1',contacto2Utente='$contacto2',ccUtente='$cc',sexoUtente='$sexo' WHERE emailUtente='$email'";

				$sql = "UPDATE comprador set linkimagem='$link' where emailComprador='$emailA';";

		    if (mysqli_query($conn,$sql) === TRUE) {
		      $msg = "Fotografia atualizada com sucesso.";
		      $val = 1;
		    } else {
		      $msg .= "Error: " . $sql . "<br>" . mysqli_error($conn);
		      $val = 2;
		    }
		  } else {
		    $msg .= "".$link." NOT uploaded ...<br>";
		    $val = 3;
		  }
		}
	}
	$ir = array("val"=>$val,"msg"=>$msg);
	echo json_encode($ir);
