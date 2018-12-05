<?php

include_once "conexao.php";

session_start();

$emailUtente = $_SESSION['email'];

$sql = "SELECT * FROM utente where emailUtente = '$emailUtente'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        $ccUtente = $row['ccUtente'];
    }
}

$result_events = "SELECT * from planomedicacao,medicamento,associados,comprador,utente where planomedicacao.codMedicamento = medicamento.codMedicamento and planomedicacao.ccUtente = utente.ccUtente and planomedicacao.codComprador = comprador.codComprador and comprador.codComprador = associados.comprador_codComprador and associados.utente_ccUtente = utente.ccUtente and planomedicacao.ccUtente=$ccUtente and associados.confirmacao=1;";
$resultado_events = mysqli_query($conn, $result_events);

$eventos = array();

while ($row_events = mysqli_fetch_assoc($resultado_events)) {
    $id = $row_events['id'];
    $title = $row_events['title'];
    $color = $row_events['color'];
    $start = $row_events['start'];
    $end = $row_events['end'];
    $confirmacao = $row_events['confirmacaoplano'];

    if($end < date('Y-m-d')){

      if($confirmacao==0){

        $color = '#f73936';

      }else if($confirmacao==1){

        $color = '#28c147';

      }



    }

    $observacoes = $row_events['observacoes'];
    $codComprador = $row_events['codComprador'];

    $sql = "SELECT * FROM comprador where codComprador=$codComprador";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
            $nomeComprador = $row['nomeComprador'];
            $ccComprador = $row['ccComprador'];
        }
    }


    $ccUtente = $row_events['ccUtente'];
    $codMedicamento = $row_events['codMedicamento'];
    $nomeMedicamento = $row_events['nomeMedicamento'];


    $nomeGenerico = $row_events['nomeGenerico'];
    $dosagem = $row_events['dosagem'];
    $formaFarmaceutica = $row_events['formaFarmaceutica'];

    //$eventos[] = array('id' => $id, 'title' => $title, 'color' => $color, 'start' => $start, 'end' => $end, 'pvpServico' => $pvpServico, 'nSala' => $nSala, 'observacoes' => $observacoes, 'codComprador' => $codComprador, 'ccUtente' => $ccUtente, 'codTipoServico' => $codTipoServico, 'codLocal' => $codLocal, 'descriLocal' => $descriLocal, 'codAlertaUtente' => $codAlertaUtente, 'codAlertaComprador' => $codAlertaComprador);
    $eventos[] = array('id' => $id, 'title' => $title, 'color' => $color, 'start' => $start, 'end' => $end, 'observacoes' => $observacoes, 'codComprador' => $codComprador, 'ccUtente' => $ccUtente, 'codMedicamento' => $codMedicamento, 'nomeMedicamento' => $nomeMedicamento, 'nomeComprador' => $nomeComprador, 'ccComprador' => $ccComprador, 'confirmacao' => $confirmacao, 'nomeGenerico' => $nomeGenerico, 'dosagem' => $dosagem, 'formaFarmaceutica' => $formaFarmaceutica);

}

echo json_encode($eventos);
//print_r($datas);
?>
