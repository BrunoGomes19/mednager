<?php

session_start();

//Incluir conexao com BD
include_once("conexao.php");

$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);

$ccUtente = filter_input(INPUT_GET, 'cc', FILTER_SANITIZE_NUMBER_INT);

if (!empty($id)) {
    $result_events = "DELETE FROM planomedicacao WHERE id = $id";
    $resultado_events = mysqli_query($conn, $result_events);

    //Verificar se alterou no banco de dados através "mysqli_affected_rows"
    if (mysqli_affected_rows($conn)) {
        $_SESSION['msg'] = "<div class='alert alert-primary' role='alert'>Intervenção removida com Sucesso<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>";
        header("Location: index.php?cc=$ccUtente");

        exit();

    } else {
        $_SESSION['msg'] = "<div class='alert alert-danger' role='alert'>Erro ao apagar Intervenção <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>";
        header("Location: index.php?cc=$ccUtente");

        exit();

    }
} else {
    $_SESSION['msg'] = "<div class='alert alert-danger' role='alert'>Erro ao apagar Intervenção <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>";
    header("Location: index.php?cc=$ccUtente");

    exit();

}
