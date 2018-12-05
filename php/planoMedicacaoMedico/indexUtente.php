<?php
include('../topos/header.php');

$email=$_SESSION['email'];

$sqlrecuperacaoc = "SELECT * from utente where emailUtente = '$email'";
$result = $conn->query($sqlrecuperacaoc);

if ($result->num_rows > 0) {
  while($row = $result->fetch_assoc()) {

    $linkimagem = $row['linkimagem'];

    $sexo = $row['sexoUtente'];

    $nome = $row['nomeUtente'];

		$email = $row['emailUtente'];

  	$notas = $row['notas'];

    $ccUtente = $row['ccUtente'];

  }
}




?>


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
    <link href="../../Interior/css/themeProcuraUtente.css" rel="stylesheet" media="all">

    <style>
    #infosModalUtente{
        max-height: calc(100vh - 200px);
        overflow-y: auto;
    }
</style>


</head>

<body style="margin:0px;">

  <!-- Modal -->
  <div class="modal fade" id="myModal3" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
      <div class="modal-content">

        <div class="modal-body" id="infosModalUtente" style="min-height:635px;max-height: 635px;background-color:#f2f2f2;">

          <div class="card-header" style="text-align: center;background-color:#f2f2f2;">
              <h5>Informações acerca do plano de medicação</h5>
          </div>

          <div class="card">
              <div class="card-header" style="text-align:center;">
                  <strong>Para que serve o plano de medicação?</strong>
              </div>
              <div class="card-body card-block">
                  <div class="has-success form-group">
                      texto...
                      asdsa
                      dasda
                  </div>
              </div>
          </div>

          <div class="card">
              <div class="card-header" style="text-align:center;">
                  <strong>Como posso utilizar o plano de medicação?</strong>
              </div>
              <div class="card-body card-block">
                  <div class="has-success form-group">
                      texto...
                      asdsa
                      dasda
                  </div>
              </div>
          </div>

          <div class="card">
              <div class="card-header" style="text-align:center;">
                  <strong>Quanto tempo tenho para confirmar a medicação tomada?</strong>
              </div>
              <div class="card-body card-block">
                  <div class="has-success form-group">
                      texto...
                      asdsa
                      dasda
                  </div>
              </div>
          </div>

          <div class="card">
              <div class="card-header" style="text-align:center;">
                  <strong>Porque é que existem cores diferentes nos planos?</strong>
              </div>
              <div class="card-body card-block">
                  <div class="has-success form-group">
                      texto...
                      asdsa
                      dasda
                  </div>
              </div>
          </div>

          <div class="card-header" style="text-align: center;background-color:#f2f2f2;">
              <strong>Descrição das  Cores </strong>
          </div>

          <div class="card-footer" style="background-color: #f2f2f2">
            <button style="background-color:#28c147;border:0px solid;pointer-events: none;" class="btn btn-primary btn-sm">
                &nbsp &nbsp
            </button> &nbsp Medicação tomada

          </div>
          <div class="card-footer" style="background-color: #f2f2f2">
          <button style="background-color:#f73936;border:0px solid;pointer-events: none;" class="btn btn-danger btn-sm">
              &nbsp &nbsp
          </button> &nbsp Medicação não confirmada
          </div>


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
                eventLimit: true,
                eventOverlap: true,
                selectOverlap: true,




                eventClick: function (event) {

                    $("#apagar_evento").attr("href", "proc_apagar_evento.php?id=" + event.id+"&cc="+event.ccUtente);

                    $('#visualizar #id').text(event.id);
                    $('#visualizar #title').text(event.title);
                    $('#visualizar #start').text(event.start.format('DD/MM/YYYY HH:mm:ss'));
                    $('#visualizar #end').text(event.end.format('DD/MM/YYYY HH:mm:ss'));
                    $('#visualizar #observacoes').text(event.observacoes);
                    $('#visualizar #ccUtente').text(event.ccUtente);
                    $('#visualizar #codMedicamento').text(event.codMedicamento);
                    $('#visualizar #nomeMedicamento').text(event.nomeMedicamento);
                    $('#visualizar #color').text(event.color);
                    $('#visualizar #nomeComprador').text(event.nomeComprador);
                    $('#visualizar #ccComprador').text(event.ccComprador);
                    $('#visualizar #confirmacao').text(event.confirmacao);
                    $('#visualizar #nomeGenerico').text(event.nomeGenerico);
                    $('#visualizar #dosagem').text(event.dosagem);
                    $('#visualizar #formaFarmaceutica').text(event.formaFarmaceutica);

                    document.getElementById("botaoConfirmar").style.display = "block";

                    Number.prototype.padLeft = function(base,chr){
                        var  len = (String(base || 10).length - String(this).length)+1;
                        return len > 0? new Array(len).join(chr || '0')+this : this;
                    }

                    var d = new Date,
    dformat = [d.getDate().padLeft(),
              (d.getMonth()+1).padLeft(),
               d.getFullYear()].join('/');

                    if(event.end.format('DD/MM/YYYY HH:mm:ss') < dformat){

                      document.getElementById("botaoConfirmar").style.display = "none";


                    }


                    if(event.confirmacao==1){

                      document.getElementById("botaoConfirmar").style.display = "none";

                    }


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

                //https://fullcalendar.io/docs/events-json-feed
                events: {
                    url: 'list_dataUtente.php',
                    cache: false,
                }
            });

        });

    </script>

    <script>

    function confirmarMedicacao(){


      if (!confirm("Já tomou a medicação receitada pelo seu médico?")) {



        }else{

            var a = document.getElementById('id').innerHTML;

                  if (window.XMLHttpRequest) {
                      // code for IE7+, Firefox, Chrome, Opera, Safari
                      xmlhttp = new XMLHttpRequest();
                  } else {
                      // code for IE6, IE5
                      xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
                  }
                  xmlhttp.onreadystatechange = function() {
                      if (this.readyState == 4 && this.status == 200) {

                        window.location.href = 'indexUtente.php';

                      }
                  };
                  xmlhttp.open("GET","confirmacaoUtente.php?id="+a,true);
                  xmlhttp.send();

        }

    }


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
            <form action="../indexes/index-utente.php" method="GET" style ='float: left; padding: 5px'>
                      <button type="submit" class="btn btn-primary btn-sm" style="font-size:16px">
                          <i class="fa fa-arrow-left"></i> Voltar
                      </button>&nbsp
            </form>
            <form style ='float: right; padding: 5px'>
                      <button type="button" class="btn btn-primary btn-sm" style="font-size:22px" data-toggle="modal" data-target="#myModal3">
                          <i class="fas fa-info"></i>
                      </button>&nbsp
            </form>

            <div class="main-content" style="padding-top:0px;background-color:#dce0e5;padding-bottom:2%;">

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
                                      <dt class="col-sm-3">Nome do médico</dt>
                                      <dd id="nomeComprador" class="col-sm-9"></dd>
                                      <dt class="col-sm-3">CC do médico</dt>
                                      <dd id="ccComprador" class="col-sm-9"></dd>
                                      <dt class="col-sm-3">Código do medicamento</dt>
                                      <dd id="codMedicamento" class="col-sm-9"></dd>
                                      <dt class="col-sm-3">Nome do medicamento</dt>
                                      <dd id="nomeMedicamento" class="col-sm-9"></dd>

                                      <dt class="col-sm-3">Nome do genérico</dt>
                                      <dd id="nomeGenerico" class="col-sm-9"></dd>
                                      <dt class="col-sm-3">Dosagem</dt>
                                      <dd id="Dosagem" class="col-sm-9"></dd>
                                      <dt class="col-sm-3">Forma Farmacêutica</dt>
                                      <dd id="formaFarmaceutica" class="col-sm-9"></dd>

                                      <dt class="col-sm-3">Observações</dt>
                                      <dd id="observacoes" class="col-sm-9"></dd>



                                  </dl>

                                  <div id="botaoConfirmar">
                                  <button class="btn btn-large btn-primary" onclick="confirmarMedicacao();">
                                    Confirmar
                                  </button>
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
                                              <input readonly style="background-color:white;" type="text" class="form-control" name="start" id="start2" onKeyPress="DataHora(event, this)">
                                          </div>
                                      </div>
                                      <div class="form-group">
                                          <div class="form-group col-md-12">
                                              <label>Data Final</label>
                                              <input type="text" readonly style="background-color:white;" class="form-control" name="end" id="end2" onKeyPress="DataHora(event, this)">
                                          </div>
                                      </div>
                                      <div class="form-group">
                                        <div class="form-group col-md-12" id="vaidareditar">
                                            <label style="display:block;">Nome do medicamento</label>
                                            <input type="text" class="form-control" name="nomeMedicamento" id="nomeMedicamento2" placeholder="Nome do medicamento" required  style="width:91%;display:inline;background-color:white;" readonly>&nbsp

                                              <input type="hidden" class="form-control" name="codMedicamento" id="codMedicamento2">

                                            <i class="fas fa-pills" style='font-size:25px;position:relative;top:5px;' onclick='abrirModalMededitar();'></i>




                                    </div>
                                  </div>


                                            <input type="hidden" class="form-control" name="ccUtente" id="ccUtente2" placeholder="CC do utente" required  style="width:100%;display:inline" readonly>&nbsp






                                  <div class="form-group">
                                      <div class="form-group col-md-12">
                                          <label>Observações</label>
                                          <textarea class="form-control" name="observacoes" style="resize:none;" autocomplete="off" id="observacoes2" placeholder="Observações" required rows="4"></textarea>
                                      </div>
                                  </div>

                                  <div class="form-group" id="agendamentoCorrenteEditar">
                                      <div class="form-group col-md-12">

                                          <button type="button" class="form-control" onclick="agendamentoEditar();">Desejo um plano de medicação recorrente</button>
                                      </div>
                                  </div>

                                  <hr>

                                  <!-- AQUI 2 inputs, nº dias e horas  -->
                                  <div id="divAgendamentoEditar" style="display:none;">
                                  <div class="form-group">
                                      <div class="form-group col-md-12">
                                          <label>Por quantos dias deseja este plano de medicação?</label>
                                          <input type="number" min="1" max="30" class="form-control" step="1" name="dias" placeholder="Número de dias" id="dias" value="1" onKeyPress="DataHora(event, this)">
                                      </div>
                                  </div>

                                  <input type="hidden" id="ccUtente3" name="ccUtente3" value="<?php echo $ccUtente; ?>">

                                  <div class="form-group">
                                      <div class="form-group col-md-12">
                                          <label>De quantas em quantas horas deseja que este medicamento seja tomado?</label>
                                          <input type="number" min="0" max="24" class="form-control" step="1" name="horas" placeholder="Número de horas" value="0" id="horas" onKeyPress="DataHora(event, this)">
                                      </div>
                                  </div>
                                  <div class="form-group" id="agendamentoCorrenteEditar">
                                      <div class="form-group col-md-12">

                                          <button type="button" class="form-control" onclick="esconderAgendamentoEditar();">Não desejo um plano de medicação recorrente</button>
                                      </div>
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
                                          <input readonly style="background-color:white;" type="text" class="form-control" name="start" id="start" onKeyPress="DataHora(event, this)">
                                      </div>
                                  </div>
                                  <div class="form-group">
                                      <div class="form-group col-md-12">
                                          <label>Data Final</label>
                                          <input readonly style="background-color:white;" type="text" class="form-control" name="end" id="end" onKeyPress="DataHora(event, this)">
                                      </div>
                                  </div>


                                  <div class='form-group col-md-12' id='vaidarmed'>
                                      <label style='display:block;'>Medicamento</label>

                                      <input type='hidden' class='form-control' name='codMedicamento' id='codMedicamento' placeholder='Nome do medicamento' required  style='width:91%;display:inline'>

                                      <input type='text' disabled class='form-control' name='nomeMedic' id='nomeMedic' placeholder='Nome do medicamento' required  style='width:91%;display:inline;background-color:white;' readonly>&nbsp

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

                                        <button type="button" class="form-control" onclick="agendamento();">Desejo um plano de medicação recorrente</button>
                                    </div>
                                </div>

                                <hr>

                                <!-- AQUI 2 inputs, nº dias e horas  -->
                                <div id="divAgendamento" style="display:none;">
                                <div class="form-group">
                                    <div class="form-group col-md-12">
                                        <label>Por quantos dias deseja este plano de medicação?</label>
                                        <input type="number" min="1" max="30" class="form-control" step="1" name="dias" placeholder="Número de dias" id="dias" value="1" onKeyPress="DataHora(event, this)">
                                    </div>
                                </div>

                                <input type="hidden" id="ccUtente3" name="ccUtente3" value="<?php echo $ccUtente; ?>">

                                <div class="form-group">
                                    <div class="form-group col-md-12">
                                        <label>De quantas em quantas horas deseja que este medicamento seja tomado?</label>
                                        <input type="number" min="0" max="24" class="form-control" step="1" name="horas" placeholder="Número de horas" value="0" id="horas" onKeyPress="DataHora(event, this)">
                                    </div>
                                </div>
                                <div class="form-group" id="agendamentoNaoCorrente">
                                    <div class="form-group col-md-12">

                                        <button type="button" class="form-control" onclick="esconderAgendamento();">Não desejo um plano de medicação recorrente</button>
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

<div class="modal right fade" id="myModal5" tabindex="-1" role="dialog" aria-labelledby="myModalLabel2">
		<div class="modal-dialog" role="document" style="padding-top:5%">
			<div class="modal-content" style="background-color:#f9f9f9;width:100%;">

        <div class="modal-header">
            <h4 class="modal-title text-center">Procurar utente</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <form class="form-horizontal" method="POST" action="proc_cad_evento.php">

                <div class="form-group">
                    <div class="form-group col-md-12" id="vaidar2">
                        <label>Nome completo</label>
                        <input type="text" class="form-control" name="title" onfocus="this.value=''" id="title" autocomplete="off" placeholder="Nome completo" required onkeyup="procuraUtente(this.value)">
                        <br>
                        <p id="txtHint">A lista de utentes será exibida aqui...</p>
                    </div>
                </div>


            </form>
        </div>

			</div><!-- modal-content -->
		</div><!-- modal-dialog -->
	</div><!-- modal -->

  <div class="modal right fade" id="myModal5editar" tabindex="-1" role="dialog" aria-labelledby="myModalLabel2">
  		<div class="modal-dialog" role="document" style="padding-top:5%">
  			<div class="modal-content" style="background-color:#f9f9f9;width:100%;">

          <div class="modal-header">
              <h4 class="modal-title text-center">Procurar utente</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
              </button>
          </div>
          <div class="modal-body">
              <form class="form-horizontal" method="POST" action="proc_cad_evento.php">

                  <div class="form-group">
                      <div class="form-group col-md-12" id="vaidar2Editar">
                          <label>Nome completo</label>
                          <input type="text" class="form-control" name="title" onfocus="this.value=''" id="title" autocomplete="off" placeholder="Nome completo" required onkeyup="procuraUtenteEditar(this.value)">
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
