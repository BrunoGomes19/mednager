<?php

include_once "conexao.php";

session_start();

$codComprador = $_SESSION['codComprador'];

$result_events = "SELECT * from planomedicacao,medicamento where planomedicacao.codMedicamento = medicamento.codMedicamento and codComprador=$codComprador;";
$resultado_events = mysqli_query($conn, $result_events);

$eventos = array();

while ($row_events = mysqli_fetch_assoc($resultado_events)) {
    $id = $row_events['id'];
    $title = $row_events['title'];
    $color = $row_events['color'];
    $start = $row_events['start'];
    $end = $row_events['end'];
    $observacoes = $row_events['observacoes'];
    $codComprador = $row_events['codComprador'];
    $ccUtente = $row_events['ccUtente'];
    $codMedicamento = $row_events['codMedicamento'];
    $nomeMedicamento = $row_events['nomeMedicamento'];

    //$eventos[] = array('id' => $id, 'title' => $title, 'color' => $color, 'start' => $start, 'end' => $end, 'pvpServico' => $pvpServico, 'nSala' => $nSala, 'observacoes' => $observacoes, 'codComprador' => $codComprador, 'ccUtente' => $ccUtente, 'codTipoServico' => $codTipoServico, 'codLocal' => $codLocal, 'descriLocal' => $descriLocal, 'codAlertaUtente' => $codAlertaUtente, 'codAlertaComprador' => $codAlertaComprador);
    $eventos[] = array('id' => $id, 'title' => $title, 'color' => $color, 'start' => $start, 'end' => $end,  'observacoes' => $observacoes, 'codComprador' => $codComprador, 'ccUtente' => $ccUtente, 'codMedicamento' => $codMedicamento, 'nomeMedicamento' => $nomeMedicamento);

}

echo json_encode($eventos);
//print_r($datas);
?>
