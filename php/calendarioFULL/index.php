<?php
include('../topos/header.php');

$email=$_SESSION['email'];

$sqlrecuperacaoc = "SELECT * from comprador where emailcomprador = '$email'";
$result = $conn->query($sqlrecuperacaoc);

if ($result->num_rows > 0) {
  while($row = $result->fetch_assoc()) {

    $linkimagem = $row['linkimagem'];

    $sexo = $row['sexoComprador'];

    $nome = $row['nomeComprador'];

		$email = $row['emailComprador'];

  	$notas = $row['notas'];

  }
}




?>


<style>

a:hover, a{

  -webkit-transition: all 0.3s ease;
    -o-transition: all 0.3s ease;
    -moz-transition: all 0.3s ease;
    transition: all 0.3s ease;


}




</style>



<!DOCTYPE html>
<html lang="en">

<meta name="viewport" content="width=device-width, initial-scale=1.0">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js" integrity="sha512-K1qjQ+NcF2TYO/eI3M6v8EiNYZfA95pQumfvcVrTHtwQVDG+aHRqLi/ETn2uB+1JqwYqVG3LIvdm9lj6imS/pQ==" crossorigin="anonymous"></script>

<style>

#a {
    -webkit-box-sizing: border-box;
    -moz-box-sizing: border-box;
    box-sizing: border-box;
    resize: none;
    width: 100%;
    height: 100%;
}

</style>

<head>
    <!-- Required meta tags-->
	<link href="../../landingPage/img/logos/redondo.png" rel="icon">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="au theme template">
    <meta name="author" content="Hau Nguyen">
    <meta name="keywords" content="au theme template">

    <!-- Title Page-->
    <title>mednager</title>



    <!-- Vendor CSS-->
    <link href="../../Interior/vendor/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet" media="all">
    <link href="../../Interior/vendor/wow/animate.css" rel="stylesheet" media="all">
    <link href="../../Interior/vendor/css-hamburgers/hamburgers.min.css" rel="stylesheet" media="all">
    <link href="../../Interior/vendor/slick/slick.css" rel="stylesheet" media="all">
    <link href="../../Interior/vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="../../Interior/vendor/perfect-scrollbar/perfect-scrollbar.css" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="../../Interior/css/theme.css" rel="stylesheet" media="all">



</head>

<body style="margin:0px;">

<?php


$sqlesp = "SELECT * from local";
$resultesp = $conn->query($sqlesp);

$sqlesp2 = "SELECT * from tipoServico";
$resultesp2 = $conn->query($sqlesp2);

$sqlesp5 = "SELECT * from local";
$resultesp5 = $conn->query($sqlesp5);

$sqlesp25 = "SELECT * from tipoServico";
$resultesp25 = $conn->query($sqlesp25);

?>

<meta charset="UTF-8">

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <script src="../../assets/js/bootstrap.min.js"></script>

    <script src="../../assets/js/bootbox.min.js"></script>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">

    <!--<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>-->
    <!-- NECESSARIO UTILIZAR O JQUERY COMPLETO, PODENDO USAR O DO GOOGLE-->

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>

    <link href='css/fullcalendar.min.css' rel='stylesheet'>
    <link href='css/fullcalendar.print.min.css' rel='stylesheet' media='print'>
    <link href='css/personalizado.css' rel='stylesheet'>
    <script src='js/moment.min.js'></script>
    <script src='js/fullcalendar.min.js'></script>
    <script src='locale/pt.js'></script>

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css">

    <script>

        $(document).ready(function () {

            $('#calendar').fullCalendar({
                header: {
                    left: 'prev,next today',
                    center: 'title',
                    right: 'month,agendaWeek,agendaDay,listWeek'
                },
                defaultDate: Date(),
                navLinks: true, // can click day/week names to navigate views
                editable: true,
                eventLimit: true, // allow "more" link when too many events

                //Apontar a intervenção até 1 dia de atraso
                validRange: function(nowDate) {
                  return {
                    start: nowDate.clone().add(-1, 'days'),

                  };
                },




                eventClick: function (event) {

                    $("#apagar_evento").attr("href", "proc_apagar_evento.php?id=" + event.id);

                    $('#visualizar #id').text(event.id);
                    $('#visualizar #title').text(event.title);
                    $('#visualizar #start').text(event.start.format('DD/MM/YYYY HH:mm:ss'));
                    $('#visualizar #end').text(event.end.format('DD/MM/YYYY HH:mm:ss'));

                    var currentdate = new Date();



                    var data = currentdate.getDate()+"/"+(currentdate.getMonth()+1)+"/"+currentdate.getDate()+" "+currentdate.getHours()+":"+currentdate.getMinutes()+":"+currentdate.getSeconds();
                    alert(data);

                    //25/11/2018 00:00:00
/*
                    $flag = false;

                    if(event.end.format('DD/MM/YYYY HH:mm:ss')==newDate){

                      alert(1);

                    }

                    alert(2);*/

                    $('#visualizar #pvpServico').text(event.pvpServico);
                    $('#visualizar #nSala').text(event.nSala);
                    $('#visualizar #observacoes').text(event.observacoes);
                    $('#visualizar #ccUtente').text(event.ccUtente);
                    //ver How do I get the text value of a selected option?
                    $('#visualizar #codTipoServico').text(event.descriTipoServico);
                    $('#visualizar #codLocal').text(event.descriLocal);
                    $('#visualizar #color').text(event.color);


                    //Editar

                    var editartitle = (event.title);
                    $('#title2').val(editartitle);

                    //cor por fazer

                    var editarstart = (event.start.format('DD/MM/YYYY HH:mm:ss'));
                    $('#start2').val(editarstart);

                    //alert(title);

                    var editarend = (event.end.format('DD/MM/YYYY HH:mm:ss'));
                    $('#end2').val(editarend);

                    var editarcc = (event.ccUtente);
                    $('#ccUtente2').val(editarcc);

                    var editarpvp = (event.pvpServico);
                    $('#pvpServico2').val(editarpvp);

                    var editarnsala = (event.nSala);
                    $('#nSala2').val(editarnsala);

                    var editarobservacoes = (event.observacoes);
                    $('#observacoes2').val(editarobservacoes);


                    var editarlocal = (event.descriLocal);
                    //$( "#editarLocal option:selected" ).text(editarlocal);
                    var sel = document.getElementById('editarLocal');
                    sel.selectedIndex = event.codLocal -1;


                    var descriTipoServico = (event.descriTipoServico);
                    //$( "#editarTipoServico option:selected" ).text(descriTipoServico);
                    sel = document.getElementById('editarTipoServico');
                    sel.selectedIndex = event.codTipoServico -1;

                    var color = (event.color);
                    //$( "#editarTipoServico option:selected" ).text(descriTipoServico);
                    sel = document.getElementById('color2');
                    sel.selectedIndex = event.color -1;
                    $('#color2').val(event.color);

                    document.getElementById('idServico').value=event.id;



                    $('#visualizar').modal('show');
                    return false;

                },
                eventOverlap: false,
                selectable: true,
                selectHelper: true,
                select: function (start, end) {
                    $('#cadastrar #start').val(moment(start).format('DD/MM/YYYY HH:mm:ss'));
                    $('#cadastrar #end').val(moment(end).format('DD/MM/YYYY HH:mm:ss'));
                    $('#cadastrar').modal('show');
                },

                //https://fullcalendar.io/docs/events-json-feed
                events: {
                    url: 'list_data.php',
                    cache: false
                }
            });

        });

    </script>

<!--formden.js communicates with FormDen server to validate fields and submit via AJAX -->
<script type="text/javascript" src="https://formden.com/static/cdn/formden.js"></script>

<!-- Special version of Bootstrap that is isolated to content wrapped in .bootstrap-iso -->
<link rel="stylesheet" href="https://formden.com/static/cdn/bootstrap-iso.css" />

<!--Font Awesome (added because you use icons in your prepend/append)-->
<link rel="stylesheet" href="https://formden.com/static/cdn/font-awesome/4.4.0/css/font-awesome.min.css" />

<!-- Inline CSS based on choices in "Settings" tab -->
<style>.bootstrap-iso .formden_header h2, .bootstrap-iso .formden_header p, .bootstrap-iso form{font-family: Arial, Helvetica, sans-serif; color: black}.bootstrap-iso form button, .bootstrap-iso form button:hover{color: white !important;} .asteriskField{color: red;}</style>


            <!-- MAIN CONTENT-->
            <form action="../indexes/index-medico.php" method="GET" style ='float: left; padding: 5px;'>
                      <button type="submit" class="btn btn-primary btn-sm" style="font-size:16px">
                          <i class="fa fa-arrow-left"></i> Voltar
                      </button>&nbsp
            </form>
            <div class="main-content" style="padding-top:0px;background-color:#dce0e5;">

              <div class="container"><br>
                  <?php
                  if (isset($_SESSION['msg'])) {
                      echo $_SESSION['msg'];
                      unset($_SESSION['msg']);
                  }
                  ?>
                  <div id='calendar' style="background-color:#f9fafc;border-radius: 15px;padding-left:5px;padding-right:5px;"></div>
              </div>


              <div class="modal fade" id="visualizar" tabindex="-1" role="dialog">
                  <div class="modal-dialog modal-lg" role="document">
                      <div class="modal-content">
                          <div class="modal-header">
                              <h4 class="modal-title text-center">Dados da intervenção</h4>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                              </button>
                          </div>
                          <div class="modal-body">
                              <div class="visualizar">
                                  <dl class="row">
                                      <dt class="col-sm-3">ID da intervenção</dt>
                                      <dd id="id" class="col-sm-9"></dd>
                                      <dt class="col-sm-3">Título</dt>
                                      <dd id="title" class="col-sm-9"></dd>
                                      <dt class="col-sm-3">Início</dt>
                                      <dd id="start" class="col-sm-9"></dd>
                                      <dt class="col-sm-3">Fim</dt>
                                      <dd id="end" class="col-sm-9"></dd>
                                      <dt class="col-sm-3">Preço (€)</dt>
                                      <dd id="pvpServico" class="col-sm-9"></dd>
                                      <dt class="col-sm-3">Sala</dt>
                                      <dd id="nSala" class="col-sm-9"></dd>
                                      <dt class="col-sm-3">Observações</dt>
                                      <dd id="observacoes" class="col-sm-9"></dd>
                                      <dt class="col-sm-3">CC Utente</dt>
                                      <dd id="ccUtente" class="col-sm-9"></dd>
                                      <dt class="col-sm-3">Tipo de intervenção</dt>
                                      <dd id="codTipoServico" class="col-sm-9"></dd>
                                      <dt class="col-sm-3">Local</dt>
                                      <dd id="codLocal" class="col-sm-9"></dd>

                                  </dl>
                                  <!--Talvez de shit-->
                                  <button class="btn btn-canc-vis btn-secondary">Editar</button>
                                  <a href="" id="apagar_evento" class="btn btn-danger" role="button">Apagar</a>

                              </div>
                              <div class="form">
                                  <form method="POST" action="proc_edit_evento.php">
                                      <div class="form-group">
                                          <div class="form-group col-md-12">
                                              <label>Título</label>
                                              <input type="text" class="form-control" name="title" id="title2" autocomplete="off" placeholder="Título da intervenção">
                                          </div>
                                      </div>
                                      <div class="form-group">
                                          <div class="form-group col-md-12">
                                              <label>Cor2</label>
                                              <select name="color" class="form-control" id="color2">
                                                  <option style="color:#5fbace;" value="#5fbace">Mednager</option>
                                                  <option style="color:#FFD700;" value="#FFD700">Amarelo</option>
                                                  <option style="color:#0071C5;" value="#0071c5">Azul Turquesa</option>
                                                  <option style="color:#FF4500;" value="#FF4500">Laranja</option>
                                                  <option style="color:#ff8080;" value="#ff8080">Rosa</option>
                                                  <option style="color:#4dff4d;" value="#4dff4d"> Alface</option>
                                                  <option style="color:#b366ff;" value="#b366ff">Roxo</option>
                                                  <option style="color:#adad85;" value="#adad85">Cinzento</option>
                                                  <option style="color:#228B22;" value="#228B22">Verde</option>
                                                  <option style="color:#ff1a1a;" value="#ff1a1a">Vermelho</option>
                                              </select>
                                          </div>
                                      </div>



                                      <div class="form-group">
                                          <div class="form-group col-md-12">
                                              <label>Data Inicial</label>
                                              <input type="text" class="form-control" name="start" id="start2" onKeyPress="DataHora(event, this)">
                                          </div>
                                      </div>
                                      <div class="form-group">
                                          <div class="form-group col-md-12">
                                              <label>Data Final</label>
                                              <input type="text" class="form-control" name="end" id="end2" onKeyPress="DataHora(event, this)">
                                          </div>
                                      </div>

                                      <div class="form-group">
                                      <div class="form-group col-md-12">
                                          <label>CC Utente</label>
                                          <input type="number" class="form-control" name="ccUtente" id="ccUtente2" placeholder="CC do utente">
                                      </div>
                                  </div>
                                  <div class="form-group">
                                      <div class="form-group col-md-12">
                                          <label>Preço (€)</label>
                                          <input type="decimal" min="0" step="any" class="form-control" name="pvpServico" id="pvpServico2" placeholder="Preço da intervenção (€)">
                                      </div>
                                  </div>
                                  <div class="form-group">
                                      <div class="form-group col-md-12">
                                          <label>Sala</label>
                                          <input type="number" class="form-control" name="nSala" id="nSala2" placeholder="Sala">
                                      </div>
                                  </div>
                                  <div class="form-group">
                                      <div class="form-group col-md-12">
                                          <label>Observações</label>
                                          <input type="text" class="form-control" name="observacoes" autocomplete="off" id="observacoes2" placeholder="Observações">
                                      </div>
                                  </div>





                                  <div class="form-group">
                                      <div class="form-group col-md-12">
                                          <label>Tipo de intervenção</label>
                                          <select name="editarTipoServico" class="form-control" id="editarTipoServico">
                                            <?php

                                          //  echo '  <option selected hidden value="">Selecione</option>';

                                            if ($resultesp25->num_rows > 0) {
                                              // output data of each row
                                              while($row = $resultesp25->fetch_assoc()) {

                                                $id = $row['codTipoServico'];

                                                $title = $row['descriTipoServico'];

                                                    echo '<option value="'.$id.'">'.  $title .'</option>';

                                              }
                                            }

                                             ?>
                                          </select>
                                      </div>
                                  </div>

                                  <div class="form-group">
                                      <div class="form-group col-md-12">
                                          <label>Local</label>
                                          <select name="editarLocal" class="form-control" id="editarLocal">
                                            <?php


                                            //  echo '  <option selected hidden value="">Selecione</option>';

                                            if ($resultesp5->num_rows > 0) {
                                              // output data of each row
                                              while($row = $resultesp5->fetch_assoc()) {

                                                $codLocal = $row['codLocal'];

                                                $descriLocal = $row['descriLocal'];



                                                    echo '<option value="'.$codLocal.'">'.  $descriLocal .'</option>';


                                              }
                                            }


                                             ?>

                                          </select>
                                      </div>
                                  </div>


                                      <input type="hidden" name="idServico" id="idServico" value="0">
                                      <div class="form-group col-md-12">
                                          <button type="button" class="btn btn-canc-edit btn-danger">Cancelar</button>
                                          <button type="submit" class="btn btn-info">Guardar Alterações</button>

                                      </div>
                                  </form>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>

              <div class="modal fade" id="cadastrar" tabindex="-1" role="dialog">
                  <div class="modal-dialog modal-lg" role="document">
                      <div class="modal-content">
                          <div class="modal-header">
                              <h4 class="modal-title text-center">Registar intervenção</h4>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                              </button>
                          </div>
                          <div class="modal-body">
                              <form class="form-horizontal" method="POST" action="proc_cad_evento.php">

                                  <div class="form-group">
                                      <div class="form-group col-md-12">
                                          <label>Título</label>
                                          <input type="text" class="form-control" name="title" id="title" autocomplete="off" placeholder="Título da intervenção" required>
                                      </div>
                                  </div>

                                  <div class="form-group">
                                      <div class="form-group col-md-12">
                                          <label>Cor</label>
                                          <select name="color" class="form-control" id="color">
                                              <option style="color:#5fbace;" value="#5fbace">Mednager</option>
                                              <option style="color:#FFD700;" value="#FFD700">Amarelo</option>
                                              <option style="color:#0071C5;" value="#0071c5">Azul Turquesa</option>
                                              <option style="color:#FF4500;" value="#FF4500">Laranja</option>
                                              <option style="color:#ff8080;" value="#ff8080">Rosa</option>
                                              <option style="color:#4dff4d;" value="#4dff4d">Alface</option>
                                              <option style="color:#b366ff;" value="#b366ff">Roxo</option>
                                              <option style="color:#adad85;" value="#adad85">Cinzento</option>
                                              <option style="color:#228B22;" value="#228B22">Verde</option>
                                              <option style="color:#ff1a1a;" value="#ff1a1a">Vermelho</option>
                                          </select>
                                      </div>
                                  </div>
                                  <div class="form-group">
                                      <div class="form-group col-md-12">
                                          <label>Data Inicial</label>
                                          <input type="text" class="form-control" name="start" id="start" onKeyPress="DataHora(event, this)">
                                      </div>
                                  </div>
                                  <div class="form-group">
                                      <div class="form-group col-md-12">
                                          <label>Data Final</label>
                                          <input type="text" class="form-control" name="end" id="end" onKeyPress="DataHora(event, this)">
                                      </div>
                                  </div>
                                  <div class="form-group">
                                      <div class="form-group col-md-12">
                                          <label>CC Utente</label>
                                          <input type="number" class="form-control" name="ccUtente" id="ccUtente" placeholder="CC do utente" required>
                                      </div>
                                  </div>
                                  <div class="form-group">
                                      <div class="form-group col-md-12">
                                          <label>Preço (€)</label>
                                          <input type="decimal" min="0" step="any" class="form-control" name="pvpServico" id="pvpServico" placeholder="Preço da intervenção (€)" required>
                                      </div>
                                  </div>
                                  <div class="form-group">
                                      <div class="form-group col-md-12">
                                          <label>Sala</label>
                                          <input type="number" class="form-control" name="nSala" id="nSala" placeholder="Sala" required>
                                      </div>
                                  </div>
                                  <div class="form-group">
                                      <div class="form-group col-md-12">
                                          <label>Observações</label>
                                          <input type="text" class="form-control" name="observacoes"  autocomplete="off" id="observacoes" placeholder="Observações" required>
                                      </div>
                                  </div>

                                  <div class="form-group">
                                      <div class="form-group col-md-12">
                                        <label>Intervenção</label>
                                        <select name="codTipoServico" id="codTipoServico" class="form-control" required>
                                          <?php

                                          echo '  <option selected hidden value="">Selecione</option>';

                                          if ($resultesp2->num_rows > 0) {
                                            // output data of each row
                                            while($row = $resultesp2->fetch_assoc()) {

                                              $id = $row['codTipoServico'];

                                              $title = $row['descriTipoServico'];

                                                  echo '<option value="'.$id.'">'.  $title .'</option>';

                                            }
                                          }

                                           ?>

                                         </select>
                                      </div>
                                  </div>

                                  <div class="form-group">
                                      <div class="form-group col-md-12">
                                        <label>Local</label>
                                        <select name="codLocal" id="codLocals" class="form-control" required>
                                          <?php


                                            echo '  <option selected hidden value="">Selecione</option>';

                                          if ($resultesp->num_rows > 0) {
                                            // output data of each row
                                            while($row = $resultesp->fetch_assoc()) {

                                              $codLocal = $row['codLocal'];

                                              $descriLocal = $row['descriLocal'];

                                                  echo '<option value="'.$codLocal.'">'.  $descriLocal .'</option>';


                                            }
                                          }


                                           ?>




                                            </select>
                                      </div>
                                  </div>


                                  <div class="form-group">
                                      <div class="col-sm-offset-2 col-sm-10">
                                          <button type="submit" class="btn btn-info">Registar</button>
                                      </div>
                                  </div>
                              </form>
                          </div>
                      </div>
                  </div>
              </div>

                </div>
            </div>
            <!-- END MAIN CONTENT-->
            <!-- END PAGE CONTAINER-->
        </div>

    </div>

    <!-- Jquery JS-->

    <!-- Bootstrap JS-->
    <script src="../../Interior/vendor/bootstrap-4.1/popper.min.js"></script>
    <script src="../../Interior/vendor/bootstrap-4.1/bootstrap.min.js"></script>
    <!-- Vendor JS       -->
    <script src="../../Interior/vendor/slick/slick.min.js">
    </script>
    <script src="../../Interior/vendor/wow/wow.min.js"></script>
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


<!-- Extra JavaScript/CSS added manually in "Settings" tab -->
<!-- Include jQuery -->

<!-- Include Date Range Picker -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/js/bootstrap-datepicker.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/css/bootstrap-datepicker3.css"/>


<script>
    //Mascara para o campo data e hora
    function DataHora(evento, objeto) {
        var keypress = (window.event) ? event.keyCode : evento.which;
        campo = eval(objeto);
        if (campo.value == '00/00/0000 00:00:00') {
            campo.value = ""
        }

        caracteres = '0123456789';
        separacao1 = '/';
        separacao2 = ' ';
        separacao3 = ':';
        conjunto1 = 2;
        conjunto2 = 5;
        conjunto3 = 10;
        conjunto4 = 13;
        conjunto5 = 16;
        if ((caracteres.search(String.fromCharCode(keypress)) != -1) && campo.value.length < (19)) {
            if (campo.value.length == conjunto1)
                campo.value = campo.value + separacao1;
            else if (campo.value.length == conjunto2)
                campo.value = campo.value + separacao1;
            else if (campo.value.length == conjunto3)
                campo.value = campo.value + separacao2;
            else if (campo.value.length == conjunto4)
                campo.value = campo.value + separacao3;
            else if (campo.value.length == conjunto5)
                campo.value = campo.value + separacao3;
        } else {
            event.returnValue = false;
        }
    }


    $('.btn-canc-vis').on("click", function () {
        $('.form').slideToggle();
        $('.visualizar').slideToggle();
    });
    $('.btn-canc-edit').on("click", function () {
        $('.visualizar').slideToggle();
        $('.form').slideToggle();
    });
</script>

<script>

window.setTimeout(function() {
 $(".alert").fadeTo(500, 0).slideUp(500, function(){
     $(this).remove();
 });
}, 6000);

</script>


</body>

</html>
