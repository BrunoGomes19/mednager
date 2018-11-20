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

//$cc = $_GET['ccUtente'];

//era só para dar alguma coisa :)
$nomeUtente="A Tua Mãe";

//$sql = "SELECT nomeUtente from utente where ccUtente like '$cc'";
//$result = $conn->query($sql);

$mpdf = new \Mpdf\Mpdf();

$mpdf->WriteHTML('ola', \Mpdf\HTMLParserMode::DEFAULT_MODE, true, true);
//header
//$mpdf->AddPage();
//$mpdf->SetFont('Times','',12);
//$mpdf->Image('../Interior/images/icon/logotipo.png', 10, 10, 60, 20);

//$mpdf->WriteHTML('<h1>'.$nomeUtente.'</h1>');
//$mpdf->Image('../assets/images/users/1.jpg', 30, 50, 60, 60);

//footer?
$mpdf->Output();

?>