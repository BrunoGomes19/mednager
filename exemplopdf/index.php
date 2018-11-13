<?php 
require_once("vendor/autoload.php"); 

/* Start to develop here. Best regards https://php-download.com/ */

$cc = $_GET['cc'];

$sql = "SELECT nome from utente,subsistemas where utente.codSubsistema = subsistemas.codSubsistema and ccUtente like '$cc'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {

  $sexo = $row["sexoUtente"];

  $nome = $row["nomeUtente"];

  $emailUtente = $row["emailUtente"];

  $cc = $row["ccUtente"];

  $nrSubsistema = $row["nrSubSistema"];

  $descriSubsistema = $row["descriSubsistema"];

  $date = $row["dataNascUtente"];

  $cidade = $row["localidadeUtente"];

  $sobremim = $row["ObservacoesUtente"];

  $contacto1 = $row["contacto1Utente"];

  $contacto2 = $row["contacto2Utente"];

  $nif = $row["NIFUtente"];

  $nib = $row["NIBUtente"];

  $morada = $row["moradaUtente"];

  $cidade = $row["localidadeUtente"];

  $codigopostal = $row["codPostalUtente"];

  $sobremim = $row["ObservacoesUtente"];

  }
} else {
  echo "Error";
}
$conn->close();

$mpdf = new \Mpdf\Mpdf();
$mpdf->WriteHTML($nome);
$mpdf->Output();


?>

<html>
<!-- Jquery JS-->
    <script src="../../Interior/vendor/jquery-3.2.1.min.js"></script>
    <!-- Bootstrap JS-->
    <script src="../../Interior/vendor/bootstrap-4.1/popper.min.js"></script>
    <script src="../../Interior/vendor/bootstrap-4.1/bootstrap.min.js"></script>
    <!-- Vendor JS       -->
    <script src="../../Interior/vendor/slick/slick.min.js">
    </script>
    <script src="../../Interior/vendor/wow/wow.min.js"></script>
    <script src="../../Interior/vendor/animsition/animsition.min.js"></script>
    <script src="../../Interior/vendor/bootstrap-progressbar/bootstrap-progressbar.min.js">
    </script>
    <script src="../../Interior/vendor/counter-up/jquery.waypoints.min.js"></script>
    <script src="../../Interior/vendor/counter-up/jquery.counterup.min.js">
    </script>
    <script src="../../Interior/vendor/circle-progress/circle-progress.min.js"></script>
    <script src="../../Interior/vendor/perfect-scrollbar/perfect-scrollbar.js"></script>
    <script src="../../Interior/vendor/chartjs/Chart.bundle.min.js"></script>
    <script src="../../Interior/vendor/select2/select2.min.js">
    </script>

    <!-- Main JS-->
    <script src="../../Interior/js/main.js"></script>
</html>