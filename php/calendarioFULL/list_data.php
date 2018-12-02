<?php

include_once "conexao.php";

session_start();

$codComprador = $_SESSION['codComprador'];

$result_events = "SELECT * FROM servico,local,tiposervico where local.codLocal = servico.codLocal and tiposervico.codTipoServico = servico.codTipoServico and codComprador=$codComprador;";
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
    $descriLocal = $row_events['descriLocal'];
    $descriTipoServico = $row_events['descriTipoServico'];

    //$eventos[] = array('id' => $id, 'title' => $title, 'color' => $color, 'start' => $start, 'end' => $end, 'pvpServico' => $pvpServico, 'nSala' => $nSala, 'observacoes' => $observacoes, 'codComprador' => $codComprador, 'ccUtente' => $ccUtente, 'codTipoServico' => $codTipoServico, 'codLocal' => $codLocal, 'descriLocal' => $descriLocal, 'codAlertaUtente' => $codAlertaUtente, 'codAlertaComprador' => $codAlertaComprador);
    $eventos[] = array('id' => $id, 'title' => $title, 'color' => $color, 'start' => $start, 'end' => $end, 'pvpServico' => $pvpServico, 'nSala' => $nSala, 'descriLocal' => $descriLocal, 'descriTipoServico' => $descriTipoServico,  'observacoes' => $observacoes, 'codComprador' => $codComprador, 'ccUtente' => $ccUtente, 'codTipoServico' => $codTipoServico, 'codLocal' => $codLocal);

}

echo json_encode($eventos);
//print_r($datas);
?>
