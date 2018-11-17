<?php

include_once "conexao.php";
$result_events = "SELECT id, title, color, start, end, pvpServico, nSala, observacoes, codComprador, ccUtente, codTipoServico, codLocal, codAlertaUtente, codAlertaComprador FROM servico";
$resultado_events = mysqli_query($conn, $result_events);

$eventos = array();

while ($row_events = mysqli_fetch_assoc($resultado_events)) {
    $id = $row_events['id'];
    $title = $row_events['title'];
    $color = $row_events['color'];
    $start = $row_events['start'];
    $end = $row_events['end'];
    $pvpServico = $row_events['pvpServico'];
    $nSala = $row_events['nSala'];
    $observacoes = $row_events['observacoes'];
    $codComprador = $row_events['codComprador'];
    $ccUtente = $row_events['ccUtente'];
    $codTipoServico = $row_events['codTipoServico'];
    $codLocal = $row_events['codLocal'];
    $codAlertaUtente = $row_events['codAlertaUtente'];
    $codAlertaComprador = $row_events['codAlertaComprador'];

    $eventos[] = array('id' => $id, 'title' => $title, 'color' => $color, 'start' => $start, 'end' => $end, 'pvpServico' => $pvpServico, 'nSala' => $nSala, 'observacoes' => $observacoes, 'codComprador' => $codComprador, 'ccUtente' => $ccUtente, 'codTipoServico' => $codTipoServico, 'codLocal' => $codLocal, 'codAlertaUtente' => $codAlertaUtente, 'codAlertaComprador' => $codAlertaComprador);

}

echo json_encode($eventos);
//print_r($datas);
?>

