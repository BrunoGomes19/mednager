<?php

include('../topos/header.php');

$codComprador = $_GET['cod'];

$ccUtente = $_GET['cc'];

$sql = "SELECT * FROM utente where ccUtente = $ccUtente";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {

      $nomeUtente = $row['nomeUtente'];

      $sexoUtente = $row['sexoUtente'];

    }
}

$sql = "INSERT into associados(idAssoc,comprador_codComprador,utente_ccUtente,confirmacao) values(NULL,'$codComprador','$ccUtente',0);";
$query = mysqli_query($conn,$sql);


$qualAssoc = "SELECT idAssoc from associados where comprador_codComprador = $codComprador and utente_ccUtente = $ccUtente";
$resAssoc = $conn->query($qualAssoc);

$notif = "INSERT INTO alertautente (codAlertaUtente, descriAlertaUtente, estadoUtente, ccUtente, servico_id, planoMedicacao_id, idAssoc, dataAlertaUtente) VALUES (NULL, NULL, 0, '$ccUtente', null, null, $resAssoc, now())";
$query = mysqli_query($conn,$notif);

if($query){

  $_SESSION['msgAssociacao'] = '<script>

  if("'.$sexoUtente.'"=="Feminino"){

    bootbox.alert("Associação com a utente '.$nomeUtente.' pendente!");

  }else if("'.$sexoUtente.'"=="Masculino"){

    bootbox.alert("Associação com o utente '.$nomeUtente.' pendente!");

  }else{

    bootbox.alert("Associação com o utente '.$nomeUtente.' pendente!");

  }


  </script>';

  header("Location: ../listas/medico-lu.php");

  exit();
}

?>
