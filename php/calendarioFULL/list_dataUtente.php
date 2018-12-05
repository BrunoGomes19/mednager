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

$result_events = "SELECT * FROM servico,local,tiposervico where local.codLocal = servico.codLocal and tiposervico.codTipoServico = servico.codTipoServico and servico.ccUtente=$ccUtente;";
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

    $sqlNomeCC = "SELECT * FROM comprador where codComprador=$codComprador";
    $resultNomeCC = $conn->query($sqlNomeCC);

    if ($resultNomeCC->num_rows > 0) {
        // output data of each row
        while($row = $resultNomeCC->fetch_assoc()) {
            $nomeComprador = $row['nomeComprador'];
            $ccComprador = $row['ccComprador'];
        }
    }

    $codTipoServico = $row_events['codTipoServico'];
    $codLocal = $row_events['codLocal'];
    $descriLocal = $row_events['descriLocal'];
    $descriTipoServico = $row_events['descriTipoServico'];

    //$eventos[] = array('id' => $id, 'title' => $title, 'color' => $color, 'start' => $start, 'end' => $end, 'pvpServico' => $pvpServico, 'nSala' => $nSala, 'observacoes' => $observacoes, 'codComprador' => $codComprador, 'ccUtente' => $ccUtente, 'codTipoServico' => $codTipoServico, 'codLocal' => $codLocal, 'descriLocal' => $descriLocal, 'codAlertaUtente' => $codAlertaUtente, 'codAlertaComprador' => $codAlertaComprador);
    $eventos[] = array('id' => $id, 'title' => $title, 'color' => $color, 'start' => $start, 'end' => $end, 'pvpServico' => $pvpServico, 'nSala' => $nSala, 'descriLocal' => $descriLocal, 'descriTipoServico' => $descriTipoServico,  'observacoes' => $observacoes, 'codComprador' => $codComprador, 'ccComprador' => $ccComprador, 'nomeComprador' => $nomeComprador , 'codTipoServico' => $codTipoServico, 'codLocal' => $codLocal);

}

echo json_encode($eventos);
//print_r($datas);
?>
