<?php

include_once "conexao.php";
$result_events = "SELECT id, title, color, start, end FROM events";
$resultado_events = mysqli_query($conn, $result_events);

$eventos = array();

while ($row_events = mysqli_fetch_assoc($resultado_events)) {
    $id = $row_events['id'];
    $title = $row_events['title'];
    $color = $row_events['color'];
    $start = $row_events['start'];
    $end = $row_events['end'];

    $eventos[] = array('id' => $id, 'title' => $title, 'color' => $color, 'start' => $start, 'end' => $end);
}

echo json_encode($eventos);
//print_r($datas);
?>
