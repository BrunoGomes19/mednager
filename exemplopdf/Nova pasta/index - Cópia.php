<?php 
require_once("vendor/autoload.php");

$hostname='localhost';
$user = 'admin';
$password = 'Sutas4Ever2018';
$mysql_database = 'mydb';
$conn = mysqli_connect($hostname, $user, $password,$mysql_database);

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$cc = $_GET['ccUtente'];

//era só para dar alguma coisa :)
$nomeUtente="A Tua Mãe";

$sql = "SELECT nomeUtente from utente where ccUtente like '$cc'";
$result = $conn->query($sql);

$mpdf = new \Mpdf\Mpdf();
//header
$mpdf->AddPage();
$mpdf->SetFont('Times','',12);
$mpdf->Image('../Interior/images/icon/logotipo.png', 10, 10, 60, 20);

$mpdf->WriteHTML('<h1>'.$nomeUtente.'</h1>');
$mpdf->Image('../assets/images/users/1.jpg', 30, 50, 60, 60);
$mpdf->WriteHTML('<br><h4>Data de nascimento: '.$dataNascUtente.'</h4>');
$mpdf->WriteHTML('<h4>Sexo: '.$sexoUtente.'</h4>');
$mpdf->WriteHTML('<h4>Contacto: '.$contacto1Utente.'</h4>');
$mpdf->WriteHTML('<h4>Endereço de email: '.$emailUtente.'</h4>');
$mpdf->WriteHTML('<h4>Número de CC: '.$ccUtente.'</h4>');
/*$mpdf->WriteHTML('<h4>NIF: '.$NIFUtente.'</h4>');
$mpdf->WriteHTML('<h4>NIB: '.$NIBUtente.'</h4>');
$mpdf->WriteHTML('<h4>Sistema de saúde: '.$sistema.'</h4>');
$mpdf->WriteHTML('<h4>Cartão sistema de saúde: '.$cartao.'</h4>');
$mpdf->WriteHTML('<h4>Morada: '.$moradaUtente.'</h4>');
$mpdf->WriteHTML('<h4>Cidade: '.$localidadeUtente.'</h4>');
$mpdf->WriteHTML('<h4>Código Postal: '.$codPostalUtente.'</h4>');
$mpdf->WriteHTML('<h4>Sobre mim (?): '.$ObservacoesUtente.'</h4>');*/

//footer?
$mpdf->Output();

?>