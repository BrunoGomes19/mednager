<?php 
require_once("vendor/autoload.php"); 

  $servername='localhost';
  $username = 'admin';
  $password = 'Sutas4Ever2018';
  $bd = 'mydb';
  $conn = mysqli_connect($servername, $username, $password, $bd);

  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }
//$cc = $_GET['cc'];

$sql = "SELECT nome from utente where ccUtente like '$cc'";
//$result = $conn->query($sql);

if ($result->num_rows > 0) {
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
  <img src='../../Interior/images/icon/logotipo.png'><h1>mednager</h1>

  <table>
    <thead>
      <tr>
        <th> cod </th>
        <th> nome </th>
        <th> cc </th>
    </thead>
    <tbody>
        <tr>
          <td> $cod </td>
          <td> <?php $nome ?> </td>
          <td> $cc </td>
        </tr>
      </tbody>
    </table>
    <br>
  <div class='form-group'>
    <label>Nome completo</label>
    <input type='text' class='form-control' value='<?php echo $nome; ?>'>
  </div>

  ");
$mpdf->Output();


?>