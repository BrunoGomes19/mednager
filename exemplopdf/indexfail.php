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

$cc = $_GET['cc'];

$sql = "SELECT nome from utente where ccUtente like '$cc'";
$result = $conn->query($sql);

/*if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    $nome = $row["nomeUtente"];
    }
} else {
  echo "Error";
}
/* Start to develop here. Best regards https://php-download.com/ */

//$stylesheet = file_get_contents('C:xampp/htdocs/dashboard/mednager/exemplopdf/pdftry.xls');
  
  $mpdf = new \Mpdf\Mpdf();
  $mpdf->WriteHTML("
    <img src='../../Interior/images/icon/logotipo.png'>
    <h1>mednager</h1>

    <p>Nome Completo: </p>
    <div class='form-group'>
      <label>Nome completo</label>
      <input type='text' class='form-control' value='<?php echo $nome; ?>'>
    </div>
    ");
  $mpdf->Output();

?>