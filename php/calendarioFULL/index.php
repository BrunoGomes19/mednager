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

<script>

function guardaCC(cc){

$('#myModal5').modal('hide');

$('#vaidar #ccUtente').val(cc);

}

function guardaCCEditar(cc){

$('#myModal5editar').modal('hide');

$('#vaidareditar #ccUtente2').val(cc);

}


function abrirModal5(){

  $('#vaidar2 #title').val("");
  txtHint.innerHTML = '';

  $('#myModal5').modal('show');

}

function abrirModal5editar(){

  $('#vaidar2Editar #title').val("");
  txtHint2.innerHTML = '';

  $('#myModal5editar').modal('show');

}

function abrirRegistoUtente(){

  document.getElementById("nome").value = "";
  document.getElementById("ccUtentee").value = "";
  document.getElementById("email").value = "";
  document.getElementById("nif").value = "";
  document.getElementById("test").innerHTML = "";


  $('#ccUtente #ccUtente').val("");
  $('#nome #nome').val("");
  $('#email #email').val("");
  $('#nif #nif').val("");
  $('#modalregistarUtente').modal('show');
}


function chamaSelect(idintervencao){
  var xmlhttp = new XMLHttpRequest();
   xmlhttp.onreadystatechange = function() {
       if (this.readyState == 4 && this.status == 200) {
           document.getElementById("selectInt").innerHTML = this.responseText;
       }
   };
   xmlhttp.open("GET", "selectIntervencao?idintervencao=" + idintervencao, true);
   xmlhttp.send();
}

function chamaSelectInputs(idintervencao){
  var xmlhttp = new XMLHttpRequest();
   xmlhttp.onreadystatechange = function() {
       if (this.readyState == 4 && this.status == 200) {
           document.getElementById("selectIntInputs").innerHTML = this.responseText;
       }
   };
   xmlhttp.open("GET", "selectIntervencaoInputs?idintervencao=" + idintervencao, true);
   xmlhttp.send();
}

</script>

  <script type="text/javascript">

    function registarUtente() {

        var nome= document.getElementById("nome").value;
        var ccUtente= document.getElementById("ccUtentee").value;
        var email= document.getElementById("email").value;
        var nif= document.getElementById("nif").value;

        if(nome == "" || ccUtente == "" || email == "" || nif =="" || !(email.includes("@"))){

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

                 if(this.responseText == "a"){

                    $('#modalregistarUtente').modal('hide');

                    $('#myModal5').modal('hide');

                    $('#myModal5editar').modal('hide');

                    window.setTimeout(function() {
                     $(".alert").fadeTo(500, 0).slideUp(500, function(){
                         $(this).remove();
                     });
                    }, 6000);

                    document.getElementById("utenteRegistado").style.display = "block";

                    $('#vaidar #ccUtente').val(ccUtente);

                    document.getElementById("utenteRegistado2").style.display = "block";

                    $('#vaidareditar #ccUtente2').val(ccUtente);

                 }else{

                   document.getElementById("test").innerHTML = this.responseText;

                 }

            }
        };
        xmlhttp.open("GET","registaUtente.php?nome="+nome+"&cc="+ccUtente+"&email="+email+"&nif="+nif,true);
        xmlhttp.send();

        }


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

function procuraUtente(str) {
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
        xmlhttp.open("GET","procuraUtente.php?q="+str,true);
        xmlhttp.send();
    }
}

function procuraUtenteEditar(str) {
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
        xmlhttp.open("GET","procuraUtenteEditar.php?q="+str,true);
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


#HoverTR:hover td {
    background-color: #dee1e5; /* or #000 */
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

#infosModalMedico{
    max-height: calc(100vh - 200px);
    overflow-y: auto;
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



</head>

<body style="margin:0px;">

  <!-- Modal -->
  <div class="modal fade" id="myModal3" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
      <div class="modal-content">

        <div class="modal-body" id="infosModalMedico" style="max-height: 635px;background-color:#f2f2f2;">
          <div class="card-header" style="text-align: center;background-color:#f2f2f2;">
              <h5>Informações acerca da agenda</h5>
          </div>

          <div class="card">
              <div class="card-header" style="text-align:center;">
                  <strong>Para que serve a agenda?</strong>
              </div>
              <div class="card-body card-block">
                  <div class="has-success form-group">
                      A agenda serve para ter a sua rotina profissional organizada de forma simples: todas as suas intervenções para o dia, semana ou mês estão à distância de um clique em forma de calendário ou lista. Pode criar planificações de consultas, cirurgias, exames, entre outros bem como editá-los ou removê-los. Aceda onde quer que esteja.
                  </div>
              </div>
          </div>

          <div class="card">
              <div class="card-header" style="text-align:center;">
                  <strong>Como posso utilizar a agenda?</strong>
              </div>
              <div class="card-body card-block">
                  <div class="has-success form-group">
                      Cada bloco contém informações importantes sobre a intervenção bem como a possibilidade de editar ou eliminar o plano. Pode também arrastar para dias diferentes ou alterar o tempo da intervenção reajustando a altura do bloco.
                  </div>
              </div>
          </div>


          <div class="card">
              <div class="card-header" style="text-align:center;">
                  <strong>Quanto tempo tenho para criar uma intervenção?</strong>
              </div>
              <div class="card-body card-block">
                  <div class="has-success form-group">
                      Tem 24h para criar uma intervenção (desde a hora atual até 24h antes).
                  </div>
              </div>
          </div>

          <div class="card">
              <div class="card-header" style="text-align:center;">
                  <strong>Quanto tempo tenho para editar uma intervenção?</strong>
              </div>
              <div class="card-body card-block">
                  <div class="has-success form-group">
                      Tem 24h para editar uma intervenção (desde a hora atual até 24h antes).
                  </div>
              </div>
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

$codComprador = $_SESSION["codComprador"];
$lei = "SELECT LEIComprador,associacao from comprador where codComprador = $codComprador";
$resultlei = $conn->query("$lei");

if ($resultlei->num_rows > 0) {
    // output data of each row
    while($row = $resultlei->fetch_assoc()) {
        $leiMed = $row["LEIComprador"];

        $associacao = $row["associacao"];

        if($leiMed != null){

          if($associacao==2){

        $leiadmin = "SELECT codComprador from comprador where LEIComprador = $leiMed and codPermissao = 1";
        $resultlei2 = $conn->query("$leiadmin");

        if ($resultlei2->num_rows > 0) {
            // output data of each row
            while($row = $resultlei2->fetch_assoc()) {

                $codCompLei = $row["codComprador"];
                $sqlcampo = "SELECT DISTINCT codRegistoCampos, nomeCampo, unidadeCampo, codEspecialidade, codComprador from registoCampos where codEspecialidade =(SELECT distinct codEspecialidade from comprador where emailComprador = '".$email."' ) and codComprador = $codCompLei";
                $resultcampo = $conn->query($sqlcampo);
            }
        } else {
            echo "0 results";
        }
      }
      }
    }
} else {
    echo "0 results";
}



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
                eventLimit: true,
                eventOverlap: false,
                selectOverlap: false,
                eventDrop: function(event, delta, revertFunc) {

    if (!confirm("Deseja mesmo alterar o dia da intervenção?")) {
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

                    window.location.href = 'index.php'

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
            window.location.href = 'index.php'
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

                          Number.prototype.padLeft = function(base,chr){
                           var  len = (String(base || 10).length - String(this).length)+1;
                           return len > 0? new Array(len).join(chr || '0')+this : this;
                       }

                    var d = new Date;

                     d.setHours(d.getHours() - 1);

                        dformat = [d.getDate().padLeft(),
                                   (d.getMonth()+1).padLeft(),
                                   d.getFullYear()].join('/') +' ' +
                                  [d.getHours().padLeft(),
                                   d.getMinutes().padLeft(),
                                   d.getSeconds().padLeft()].join(':');

                                   document.getElementById("tempo").style.display = "block";


                                   if(event.end.format('DD/MM/YYYY HH:mm:ss')<dformat){

                                     document.getElementById("tempo").style.display = "none";


                                   }


                    $('#visualizar #pvpServico').text(event.pvpServico);
                    $('#visualizar #nSala').text(event.nSala);
                    $('#visualizar #observacoes').text(event.observacoes);
                    $('#visualizar #ccUtente').text(event.ccUtente);
                    //ver How do I get the text value of a selected option?
                    $('#visualizar #codTipoServico').text(event.descriTipoServico);
                    $('#visualizar #codLocal').text(event.descriLocal);
                    $('#visualizar #color').text(event.color);
                    chamaSelect(event.id);
                    chamaSelectInputs(event.id);

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

            <div class="main-content" style="padding-top:0px;background-color:#dce0e5;padding-bottom:2%;">

              <div class="container"><br>
                  <?php
                  if (isset($_SESSION['msg'])) {
                      echo $_SESSION['msg'];
                      unset($_SESSION['msg']);
                  }
                  ?>
                  <div id='calendar' style="background-color:#f9fafc;border-radius: 15px;padding-left:5px;padding-right:5px;padding-bottom:10px;"></div>
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
                          <div class="alert alert-warning alert-dismissible" data-auto-dismiss role="alert" id="utenteRegistado2" style="background-color:#89bdf4;border-radius:8px;display:none;";>
                         <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                          <span style="color:white;">Utente registado com sucesso</span>
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

                                      <div id="selectInt">
                                      </div>



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
                                              <input type="text" class="form-control" name="title" id="title2" autocomplete="off" placeholder="Título da intervenção">
                                          </div>
                                      </div>
                                      <div class="form-group">
                                          <div class="form-group col-md-12">
                                              <label>Cor</label>
                                              <select name="color" class="form-control" id="color2">
                                                <option style="color:#5fbace;" value="#5fbace">Mednager</option>
                                                <option style="color:#e6e600;" value="#e6e600">Mostarda</option>
                                                <option style="color:#0071C5;" value="#0071c5">Azul Turquesa</option>
                                                <option style="color:#FF4500;" value="#FF4500">Laranja</option>
                                                <option style="color:#ff8080;" value="#ff8080">Rosa</option>
                                                <option style="color:#77b300;" value="#77b300">Tropa</option>
                                                <option style="color:#b366ff;" value="#b366ff">Roxo</option>
                                                <option style="color:#adad85;" value="#adad85">Cinzento</option>
                                                <option style="color:#ffcc66;" value="#ffcc66">Pêssego</option>
                                                <option style="color:#ccff33;" value="#ccff33">Lima</option>
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
                                            <label style="display:block;">CC Utente</label>
                                            <input type="number" class="form-control" name="ccUtente" id="ccUtente2" placeholder="CC do utente" required readonly style="width:91%;display:inline;background-color:white;">&nbsp

                                            <i class="fas fa-user-plus" style="font-size:25px;position:relative;top:5px;" onclick="abrirModal5editar();"></i>




                                    </div>
                                  </div>
                                  <div class="form-group">
                                      <div class="form-group col-md-12">
                                          <label>Preço (€)</label>
                                          <input type="number" min="0" step="0.01" class="form-control" name="pvpServico" id="pvpServico2" placeholder="Preço da intervenção (€)">
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
                                          <textarea class="form-control" name="observacoes" style="resize:none;" autocomplete="off" id="observacoes2" placeholder="Observações"  rows="4"></textarea>
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

                                  <!-- DINAMICO-->
                                  <div id="selectIntInputs"></div>

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
                          <div class="alert alert-warning alert-dismissible" data-auto-dismiss role="alert" id="utenteRegistado" style="background-color:#89bdf4;border-radius:8px;display:none;";>
                         <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                          <span style="color:white;">Utente registado com sucesso</span>
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
                                            <option style="color:#e6e600;" value="#e6e600">Mostarda</option>
                                            <option style="color:#0071C5;" value="#0071c5">Azul Turquesa</option>
                                            <option style="color:#FF4500;" value="#FF4500">Laranja</option>
                                            <option style="color:#ff8080;" value="#ff8080">Rosa</option>
                                            <option style="color:#77b300;" value="#77b300">Tropa</option>
                                            <option style="color:#b366ff;" value="#b366ff">Roxo</option>
                                            <option style="color:#adad85;" value="#adad85">Cinzento</option>
                                            <option style="color:#ffcc66;" value="#ffcc66">Pêssego</option>
                                            <option style="color:#ccff33;" value="#ccff33">Lima</option>
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

                                          <div class="form-group col-md-12" id="vaidar">
                                              <label style="display:block;">CC Utente</label>
                                              <input type="number" class="form-control" name="ccUtente" id="ccUtente" placeholder="CC do utente" required readonly style="background-color: white;width:91%;display:inline">&nbsp

                                              <i class="fas fa-user-plus" style="font-size:25px;position:relative;top:5px;" onclick="abrirModal5();"></i>




                                      </div>
                                  </div>
                                  <div class="form-group">
                                      <div class="form-group col-md-12">
                                          <label>Preço (€)</label>
                                          <input type="number" min="0" step="0.01" class="form-control" name="pvpServico" id="pvpServico" placeholder="Preço da intervenção (€)" required>
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
                                          <textarea class="form-control" name="observacoes" style="resize:none;" autocomplete="off" id="observacoes" placeholder="Observações"  rows="4"></textarea>

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

                                  <?php



                                   ?>

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



                                  <!-- DINAMICO-->
                                  <?php
                                    $a = 0;
                                  if($leiMed != null){
                                    if($associacao==2){
                                  if ($resultcampo->num_rows > 0) {
                                    // output data of each row
                                    while($row = $resultcampo->fetch_assoc()) {

                                      $nomeCampo = $row['nomeCampo'];

                                      $codRegistoCampo = $row['codRegistoCampos'];

                                      $unidadeCampo = $row['unidadeCampo'];

                                      $a++;

                                        echo "<div class='form-group'>
                                            <div class='form-group col-md-12'>
                                                <label>".$nomeCampo." ";

                                                 if($unidadeCampo==""){

                                                 }else{

                                                   echo " ($unidadeCampo)";

                                                 }

                                                   echo "</label>
                                                <input type='text' class='form-control' name='extra$a' placeholder='$nomeCampo' >
                                                <input type='hidden' name='cod$a' value='".$codRegistoCampo."'>
                                            </div>
                                        </div>";

                                    }

                                    $sqlq = "SELECT DISTINCT *, count(*) as quantidade from registoCampos where codEspecialidade =(SELECT distinct codEspecialidade from comprador where emailComprador = '".$email."' ) and codComprador = $codCompLei ";
                                      $resultq = $conn->query($sqlq);

                                      if ($resultq->num_rows > 0) {
                                          // output data of each row
                                          while($row = $resultq->fetch_assoc()) {

                                            $quantidade = $row['quantidade'];

                                            echo "<input type='hidden' name='quantidade' value='$quantidade'>";

                                            echo "<div class='form-group'>
                                                <div class='form-group col-md-12'>



                                                </div>
                                            </div>";

                                          }
                                      }

                                  }
                                }
                                }
                                  ?>





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
                      <h6 style="text-align: right; color: #5fbace; font-weight:bold;float:right;display:inline" onclick="abrirRegistoUtente()"> + Registar utente</h6>
                      <br>
                        <label style="display:block">Nome completo</label>
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
                        <h6 style="text-align: right; color: #5fbace; font-weight:bold;float:right;display:inline" onclick="abrirRegistoUtente()"> + Registar utente</h6>
                        <br>
                          <label style="display:block">Nome completo</label>
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

    <div class="modal right fade" id="modalregistarUtente" tabindex="-1" role="dialog" aria-labelledby="myModalLabel2">
    <div class="modal-dialog" role="document" style="padding-top:5%">
      <div class="modal-content" style="background-color:#f9f9f9;width:100%;">

        <div class="modal-header">
            <h4 class="modal-title text-center">Registar utente</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">

              <form onsubmit="myFunction(); return false;">

                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text text-black" id="basic-addon1"><i class="fas fa-user"></i></span>
                    </div>
                    <input type="text" class="form-control form-control-lg" placeholder="Nome completo" aria-label="nomeUtente" aria-describedby="basic-addon1" required name="nome"  id="nome">
                </div>

                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text text-black" id="basic-addon1"><i class="fas fa-address-card"></i></span>
                    </div>
                    <input type="text" class="form-control form-control-lg" placeholder="Cartão de cidadão" aria-label="ccUtente" aria-describedby="basic-addon1" required name="ccUtente" id="ccUtentee">
                </div>




                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text text-black" id="basic-addon2"><i class="fas fa-at"></i></span>
                    </div>
                    <input type="email" class="form-control form-control-lg" placeholder="E-mail" aria-label="email" aria-describedby="basic-addon1" required name="email"  id="email">
                </div>


                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text text-black" id="basic-addon1"><i class="fas fa-id-card"></i></span>
                    </div>
                    <input type="text" class="form-control form-control-lg" placeholder="NIF" aria-label="NIFUtente" aria-describedby="basic-addon1" required name="nif" id="nif">
                </div>
                <p id="test"></p>

                <input id="esconderModal" type="hidden"></input>

                <?php

                @session_start();

                if (isset($_SESSION['msg'])) {
                    echo $_SESSION['msg'];
                    unset($_SESSION['msg']);
                }

                ?>

                <div class="row border-top border-secondary">
                    <div class="col-12">
                        <div class="form-group">
                            <div class="p-t-20">
                                <input class="btn btn-block btn-info" type="submit" value="Registar" onclick="registarUtente();"></input>
                            </div>
                        </div>
                    </div>
                </div>

              </form>

        </div>

        <script>

        function myFunction(){



        }

        </script>

      </div><!-- modal-content -->
    </div><!-- modal-dialog -->
  </div><!-- modal -->






</body>

</html>
