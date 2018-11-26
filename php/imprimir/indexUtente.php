<?php 
require_once("vendor/autoload.php");

$hostname='localhost';
$user = 'admin';
$password = 'Sutas4Ever2018';
$mysql_database = 'mydb';

$conn = mysqli_connect($hostname, $user, $password,$mysql_database);

$nif = $_GET["nif"];

$sql='SELECT * FROM utente, subsistemas WHERE utente.codSubsistema=subsistemas.codSubsistema AND NIFUtente='.$nif;
$result = $conn->query($sql);

if($result->num_rows > 0){
	while($row = $result->fetch_assoc()){
		$nome = $row['nomeUtente'];
		$sexo = $row['sexoUtente'];
		$data = $row['dataNascUtente'];
		$contacto1 = $row['contacto1Utente'];
		$contacto2 = $row['contacto2Utente'];
		$email = $row['emailUtente'];
		$cc = $row['ccUtente'];
		$nif = $row['NIFUtente'];
		$nib = $row['NIBUtente'];
		$sistema = $row['descriSubsistema'];
		$morada = $row['moradaUtente'];
		$localidade = $row['localidadeUtente'];
		$codPostal = $row['codPostalUtente'];
		$obs = $row['ObservacoesUtente'];
		$imagem = $row['linkimagem'];
	}
}else{
	echo "ERROR";
}

//$cc = $_GET['ccUtente'];

//$sql = "SELECT nomeUtente from utente where ccUtente like '$cc'";
//$result = $conn->query($sql);

$mpdf = new \Mpdf\Mpdf();

//já funcionou, not anymore
//$mpdf->AddPage();
//$mpdf->SetFont('Times','',12);
//$mpdf->Image('../Interior/images/icon/logotipo.png', 10, 10, 60, 20);

$mpdf->SetHTMLHeader("<div style='text-align: right; font-weight: bold;'>
    mednager
	</div>");

$mpdf->WriteHTML('<br><h1>'.$nome.'</h1>
	
	<h4>Sexo: '.$sexo.'</h4>
	<h4>Data de Nascimento: '.$data.'</h4>
	<h4>Contacto: '.$contacto1.'</h4>
	<h4>Contacto: '.$contacto2.'</h4>
	<h4>Endereço de email: '.$email.'</h4>
	<h4>Número de CC: '.$cc.'</h4>
	<h4>NIF: '.$nif.'</h4>
	<h4>NIB: '.$nib.'</h4>
	<h4>Sistema de saúde: '.$sistema.'</h4>
	<h4>Morada: '.$morada.'</h4>
	<h4>Localidade: '.$localidade.'</h4>
	<h4>Código Postal: '.$codPostal.'</h4>
	<h4>Observações: '.$obs.'</h4>
	');
//header
//$mpdf->AddPage();
//$mpdf->SetFont('Times','',12);
//$mpdf->Image('../Interior/images/icon/logotipo.png', 10, 10, 60, 20);

//$mpdf->WriteHTML('<h1>'.$nomeUtente.'</h1>');
//$mpdf->Image('../assets/images/users/1.jpg', 30, 50, 60, 60);

$mpdf->debug = true;
$mpdf->Output();

?>