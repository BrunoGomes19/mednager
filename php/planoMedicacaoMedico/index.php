<?php
include('../topos/header.php');

$ccUtente = $_GET['cc'];

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

<script>

function guardaMed(codMedicamento,nomeMedicamento){

$('#myModalMed').modal('hide');

$('#vaidarMed #codMedicamento').val(codMedicamento);
$('#vaidarMed #nomeMedic').val(nomeMedicamento);



}

function guardaMedEditar(cc){

$('#myModalMededitar').modal('hide');

$('#vaidarMededitar #title2Med').val(cc);

}


function agendamento(){

  document.getElementById("agendamentoCorrente").style.display = "none";
  document.getElementById("divAgendamento").style.display = "block";


}



function abrirModalMed(){

  $('#vaidarMed #title').val("");
  txtHint.innerHTML = '';

  $('#myModalMed').modal('show');

}

function abrirModalMededitar(){

  $('#vaidarMedEditar #title').val("");
  txtHint2.innerHTML = '';

  $('#myModalMededitar').modal('show');

}


</script>

<script>

.modal.left .modal-dialog,
	.modal.right .modal-dialog {
		position: fixed;
		margin: auto;
		width: 320px;
		height: 100%;
		-webkit-transform: translate3d(0%, 0, 0);
		    -ms-transform: translate3d(0%, 0, 0);
		     -o-transform: translate3d(0%, 0, 0);
		        transform: translate3d(0%, 0, 0);
	}

	.modal.left .modal-content,
	.modal.right .modal-content {
		height: 100%;
		overflow-y: auto;
	}

	.modal.left .modal-body,
	.modal.right .modal-body {
		padding: 15px 15px 80px;
	}

/*Left*/
	.modal.left.fade .modal-dialog{
		left: -320px;
		-webkit-transition: opacity 0.3s linear, left 0.3s ease-out;
		   -moz-transition: opacity 0.3s linear, left 0.3s ease-out;
		     -o-transition: opacity 0.3s linear, left 0.3s ease-out;
		        transition: opacity 0.3s linear, left 0.3s ease-out;
	}

	.modal.left.fade.in .modal-dialog{
		left: 0;
	}

/*Right*/
	.modal.right.fade .modal-dialog {
		right: -320px;
		-webkit-transition: opacity 0.3s linear, right 0.3s ease-out;
		   -moz-transition: opacity 0.3s linear, right 0.3s ease-out;
		     -o-transition: opacity 0.3s linear, right 0.3s ease-out;
		        transition: opacity 0.3s linear, right 0.3s ease-out;
	}

	.modal.right.fade.in .modal-dialog {
		right: 0;
	}

/* ----- MODAL STYLE ----- */
	.modal-content {
		border-radius: 0;
		border: none;
	}

	.modal-header {
		border-bottom-color: #EEEEEE;
		background-color: #FAFAFA;
	}

/* ----- v CAN BE DELETED v ----- */
body {
	background-color: #78909C;
}

.demo {
	padding-top: 60px;
	padding-bottom: 110px;
}

.btn-demo {
	margin: 15px;
	padding: 10px 15px;
	border-radius: 0;
	font-size: 16px;
	background-color: #FFFFFF;
}

.btn-demo:focus {
	outline: 0;
}

.demo-footer {
	position: fixed;
	bottom: 0;
	width: 100%;
	padding: 15px;
	background-color: #212121;
	text-align: center;
}

.demo-footer > a {
	text-decoration: none;
	font-weight: bold;
	font-size: 16px;
	color: #fff;
}

</script>

<script>

function procuraMed(str) {
    if (str == "") {
        document.getElementById("txtHint").innerHTML = "A lista de utentes será exibida aqui...";
        return;
    } else {
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("txtHint").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET","procuraMed.php?q="+str,true);
        xmlhttp.send();
    }
}

function procuraMedEditar(str) {
    if (str == "") {
        document.getElementById("txtHint").innerHTML = "A lista de utentes será exibida aqui...";
        return;
    } else {
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("txtHint2").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET","procuraMedEditar.php?q="+str,true);
        xmlhttp.send();
    }
}

</script>

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

  <!-- Modal -->
  <div class="modal fade" id="myModal3" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
      <div class="modal-content">

        <div class="modal-body" style="height:635px">


        </div>





      </div>
    </div>
  </div>

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
                    right: 'agendaWeek,agendaDay,listWeek'
                },
                defaultDate: Date(),
                defaultView: 'agendaWeek',
                navLinks: true, // can click day/week names to navigate views
                editable: true,
                eventLimit: true,
                eventOverlap: false,
                selectOverlap: false,
                eventDrop: function(event, delta, revertFunc) {

  if (!confirm("Deseja mesmo alterar o dia deste plano de medicação?")) {
      revertFunc();
    }else{



              if (window.XMLHttpRequest) {
                  // code for IE7+, Firefox, Chrome, Opera, Safari
                  xmlhttp = new XMLHttpRequest();
              } else {
                  // code for IE6, IE5
                  xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
              }
              xmlhttp.onreadystatechange = function() {
                  if (this.readyState == 4 && this.status == 200) {

                  }
              };
              xmlhttp.open("GET","editar_drop.php?id="+event.id+"&start="+event.start.format('YYYY/MM/DD HH:mm:ss')+"&end="+event.end.format('YYYY/MM/DD HH:mm:ss'),true);
              xmlhttp.send();

    }

  }, eventResize: function(event, delta, revertFunc) {

    if (!confirm("Deseja mesmo alterar a hora final da intervenção?")) {
      revertFunc();
    }else{


      if (window.XMLHttpRequest) {
          // code for IE7+, Firefox, Chrome, Opera, Safari
          xmlhttp = new XMLHttpRequest();
      } else {
          // code for IE6, IE5
          xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
      }
      xmlhttp.onreadystatechange = function() {
          if (this.readyState == 4 && this.status == 200) {

          }
      };
      xmlhttp.open("GET","editar_resize.php?id="+event.id+"&end="+event.end.format('YYYY/MM/DD HH:mm:ss'),true);
      xmlhttp.send();

    }

  },

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
                    $('#visualizar #observacoes').text(event.observacoes);
                    $('#visualizar #ccUtente').text(event.ccUtente);
                    $('#visualizar #codMedicamento').text(event.codMedicamento);
                    $('#visualizar #nomeMedicamento').text(event.nomeMedicamento);
                    $('#visualizar #color').text(event.color);


                    //Editar

                    var editartitle = (event.title);
                    $('#title2Med').val(editartitle);

                    //cor por fazer

                    var editarstart = (event.start.format('DD/MM/YYYY HH:mm:ss'));
                    $('#start2').val(editarstart);

                    //alert(title);

                    var editarend = (event.end.format('DD/MM/YYYY HH:mm:ss'));
                    $('#end2').val(editarend);

                    var editarcc = (event.ccUtente);
                    $('#ccUtente2').val(editarcc);

                    var editarobservacoes = (event.observacoes);
                    $('#observacoes2').val(editarobservacoes);

                    var editarcodmedicamento = (event.codMedicamento);
                    $('#codMedicamento2').val(editarcodmedicamento);

                    var nomeMedicamento = (event.nomeMedicamento);
                    $('#nomeMedicamento2').val(nomeMedicamento);

                    var color = (event.color);
                    //$( "#editarTipoServico option:selected" ).text(descriTipoServico);
                    sel = document.getElementById('color2');
                    sel.selectedIndex = event.color -1;
                    $('#color2').val(event.color);

                    document.getElementById('idServico').value=event.id;



                    $('#visualizar').modal('show');
                    return false;

                },
                eventOverlap: true,
                selectOverlap: true,
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
                    cache: false,
                }
            });

        });

    </script>

    <style>.modal {
  overflow-y:auto;
}</style>

<!--formden.js communicates with FormDen server to validate fields and submit via AJAX -->
<script type="text/javascript" src="https://formden.com/static/cdn/formden.js"></script>

<!-- Special version of Bootstrap that is isolated to content wrapped in .bootstrap-iso -->
<link rel="stylesheet" href="https://formden.com/static/cdn/bootstrap-iso.css" />

<!--Font Awesome (added because you use icons in your prepend/append)-->
<link rel="stylesheet" href="https://formden.com/static/cdn/font-awesome/4.4.0/css/font-awesome.min.css" />

<!-- Inline CSS based on choices in "Settings" tab -->
<style>.bootstrap-iso .formden_header h2, .bootstrap-iso .formden_header p, .bootstrap-iso form{font-family: Arial, Helvetica, sans-serif; color: black}.bootstrap-iso form button, .bootstrap-iso form button:hover{color: white !important;} .asteriskField{color: red;}</style>


            <!-- MAIN CONTENT-->
            <form action="../indexes/index-medico.php" method="GET" style ='float: left; padding: 5px'>
                      <button type="submit" class="btn btn-primary btn-sm" style="font-size:16px">
                          <i class="fa fa-arrow-left"></i> Voltar
                      </button>&nbsp
            </form>
            <form style ='float: right; padding: 5px'>
                      <button type="button" class="btn btn-primary btn-sm" style="font-size:22px" data-toggle="modal" data-target="#myModal3">
                          <i class="fas fa-info"></i>
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
                              <h4 class="modal-title text-center">Dados do plano de medicação</h4>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                              </button>
                          </div>
                          <div class="modal-body">
                              <div class="visualizar">
                                  <dl class="row">
                                      <dt class="col-sm-3">ID do plano</dt>
                                      <dd id="id" class="col-sm-9"></dd>
                                      <dt class="col-sm-3">Título</dt>
                                      <dd id="title" class="col-sm-9"></dd>
                                      <dt class="col-sm-3">Início</dt>
                                      <dd id="start" class="col-sm-9"></dd>
                                      <dt class="col-sm-3">Fim</dt>
                                      <dd id="end" class="col-sm-9"></dd>
                                      <dt class="col-sm-3">Observações</dt>
                                      <dd id="observacoes" class="col-sm-9"></dd>
                                      <dt class="col-sm-3">CC Utente</dt>
                                      <dd id="ccUtente" class="col-sm-9"></dd>
                                      <dt class="col-sm-3">Código do medicamento</dt>
                                      <dd id="codMedicamento" class="col-sm-9"></dd>
                                      <dt class="col-sm-3">Nome do medicamento</dt>
                                      <dd id="nomeMedicamento" class="col-sm-9"></dd>

                                  </dl>
                                  <div style="display:block" id="tempo">
                                  <button class="btn btn-canc-vis btn-secondary">Editar</button>
                                  <a href="" id="apagar_evento" class="btn btn-danger" role="button">Apagar</a>
                                </div>
                              </div>
                              <div class="form">
                                  <form method="POST" action="proc_edit_evento.php">
                                      <div class="form-group">
                                          <div class="form-group col-md-12">
                                              <label>Título</label>
                                              <input type="text" class="form-control" name="title" id="title2Med" autocomplete="off" placeholder="Título da intervenção">
                                          </div>
                                      </div>
                                      <div class="form-group">
                                          <div class="form-group col-md-12">
                                              <label>Cor</label>
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
                                        <div class="form-group col-md-12" id="vaidareditar">
                                            <label style="display:block;">Nome do medicamento</label>
                                            <input type="text" class="form-control" name="nomeMedicamento" id="nomeMedicamento2" placeholder="Nome do medicamento" required  style="width:91%;display:inline" readonly>&nbsp

                                            <i class="fas fa-pills" style='font-size:25px;position:relative;top:5px;' onclick='abrirModalMededitar();'></i>




                                    </div>
                                  </div>
                                      <div class="form-group">
                                        <div class="form-group col-md-12" id="vaidareditar">
                                            <label style="display:block;">CC Utente</label>
                                            <input type="number" class="form-control" name="ccUtente" id="ccUtente2" placeholder="CC do utente" required  style="width:100%;display:inline" readonly>&nbsp




                                    </div>
                                  </div>

                                  <div class="form-group">
                                      <div class="form-group col-md-12">
                                          <label>Observações</label>
                                          <textarea class="form-control" name="observacoes" style="resize:none;" autocomplete="off" id="observacoes2" placeholder="Observações" required rows="4"></textarea>
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


<!-- CADASTRAR NR MEDS-->
              <div class="modal fade" id="cadastrar" tabindex="-1" role="dialog">
                  <div class="modal-dialog modal-lg" role="document">
                      <div class="modal-content">
                          <div class="modal-header">
                              <h4 class="modal-title text-center">Registar plano de medicação</h4>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                              </button>
                          </div>
                          <div class="modal-body">
                            <form class="form-horizontal" method="POST" action="proc_cad_evento.php">

                                  <div class="form-group">
                                      <div class="form-group col-md-12">
                                          <label>Título</label>
                                          <input type="text" class="form-control" name="title" id="title" autocomplete="off" placeholder="Título do plano de medicação" required>
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


                                  <div class='form-group col-md-12' id='vaidarmed'>
                                      <label style='display:block;'>Medicamento</label>

                                      <input type='hidden' class='form-control' name='codMedicamento' id='codMedicamento' placeholder='Nome do medicamento' required  style='width:91%;display:inline'>

                                      <input type='text' class='form-control' name='nomeMedic' id='nomeMedic' placeholder='Nome do medicamento' required  style='width:91%;display:inline' readonly>&nbsp

                                    <i class="fas fa-pills" style='font-size:25px;position:relative;top:5px;' onclick='abrirModalMed();'></i>
                                  </div>


                                <div class='form-group'>
                                    <div class='form-group col-md-12'>
                                        <label>Observações</label>
                                        <textarea class='form-control' name='observacoes' style='resize:none;' autocomplete='off' id='observacoes' placeholder='Observações' required rows='4'></textarea>

                                    </div>
                                </div>

                                <div class="form-group" id="agendamentoCorrente">
                                    <div class="form-group col-md-12">

                                        <button type="button" class="form-control" onclick="agendamento();">Caso deseja um agendamento corrente clique aqui</button>
                                    </div>
                                </div>

                                <hr>

                                <!-- AQUI 2 inputs, nº dias e horas  -->
                                <div id="divAgendamento" style="display:none;">
                                <div class="form-group">
                                    <div class="form-group col-md-12">
                                        <label>Por quantos dias deseja este plano de medicação?</label>
                                        <input type="number" min="1" class="form-control" name="dias" placeholder="Número de dias" id="dias" value="0" onKeyPress="DataHora(event, this)">
                                    </div>
                                </div>

                                <input type="hidden" id="ccUtente3" name="ccUtente3" value="<?php echo $ccUtente; ?>">

                                <div class="form-group">
                                    <div class="form-group col-md-12">
                                        <label>A cada quantas horas deseja que este medicamento seja tomado?</label>
                                        <input type="number" min="1" class="form-control" name="horas" placeholder="Número de horas" value="0" id="horas" onKeyPress="DataHora(event, this)">
                                    </div>
                                </div>
                              </div>

                                <!-- FIM 2 inputs-->
                                <div class="col-sm-offset-2 col-sm-10" style="text-align:right;float:right;">
                                    <button type="submit" class="btn btn-info">Registar</button>
                                </div>
                              </form>
                            </div>






                      </div>


              </div>

        </div>






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

<div class="modal right fade" id="myModalMed" tabindex="-1" role="dialog" aria-labelledby="myModalLabel2">
		<div class="modal-dialog" role="document" style="padding-top:5%;max-width:60%">
			<div class="modal-content" style="background-color:#f9f9f9;width:100%;">

        <div class="modal-header">
            <h4 class="modal-title text-center">Procurar medicamento</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <form class="form-horizontal" method="POST" action="proc_cad_evento.php">

                <div class="form-group">
                    <div class="form-group col-md-12" id="vaidarmed">
                        <label>Nome do medicamento</label>
                        <input type="text" class="form-control" name="titleMed" onfocus="this.value=''" id="title" autocomplete="off" placeholder="Nome do medicamento ou nome do genérico" required onkeyup="procuraMed(this.value)">
                        <br>
                        <p id="txtHint">A lista de medicamentos será exibida aqui...</p>
                    </div>
                </div>


            </form>
        </div>

			</div><!-- modal-content -->
		</div><!-- modal-dialog -->
	</div><!-- modal -->

  <div class="modal right fade" id="myModalMededitar" tabindex="-1" role="dialog" aria-labelledby="myModalLabel2">
  		<div class="modal-dialog" role="document" style="padding-top:5%;max-width:60%">
  			<div class="modal-content" style="background-color:#f9f9f9;width:100%;">

          <div class="modal-header">
              <h4 class="modal-title text-center">Procurar medicamento</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
              </button>
          </div>
          <div class="modal-body">
              <form class="form-horizontal" method="POST" action="proc_cad_evento.php">

                  <div class="form-group">
                      <div class="form-group col-md-12" id="vaidarMedEditar">
                          <label>Nome do medicamento</label>
                          <input type="text" class="form-control" name="title" onfocus="this.value=''" id="title" autocomplete="off" placeholder="Nome do medicamento ou nome do genérico" required onkeyup="procuraMedEditar(this.value)">
                          <br>
                          <p id="txtHint2">A lista de utentes será exibida aqui...</p>
                      </div>
                  </div>


              </form>
          </div>

  			</div><!-- modal-content -->
  		</div><!-- modal-dialog -->
  	</div><!-- modal -->




</body>

</html>
