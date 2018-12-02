<?php
include('../topos/topo_utente.php');

$emailA = $_SESSION['email'];

$sql = "SELECT * FROM utente where emailUtente='$emailA'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {

      $cc = $row['ccUtente'];

    }
} else {
    echo "0 results";
}

$sql2 = "select * from associados, comprador, especialidade where associados.comprador_codComprador = comprador.codComprador and associados.utente_ccUtente = $cc and comprador.codEspecialidade = especialidade.codEspecialidade and confirmacao=0;";
$result2 = $conn->query($sql2);



?>

<meta charset="UTF-8">

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>

  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js" integrity="sha512-K1qjQ+NcF2TYO/eI3M6v8EiNYZfA95pQumfvcVrTHtwQVDG+aHRqLi/ETn2uB+1JqwYqVG3LIvdm9lj6imS/pQ==" crossorigin="anonymous"></script>
  
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
      <script src="../../assets/js/bootstrap.min.js"></script>

      <script src="../../assets/js/bootbox.min.js"></script>

<script>

function aceitarAssociacao($ccUtente,$codComprador){

  bootbox.confirm({
    message: "Tem a certeza que quer aceitar esta associação?",
    buttons: {
        confirm: {
            label: 'Sim',
            className: 'btn-success'
        },
        cancel: {
            label: 'Não',
            className: 'btn-danger'
        }
    },
    callback: function (result) {
      if(result==true){
          window.location.replace('../associacao/aceitarAssociacao.php?cc='+$ccUtente+'&cod='+$codComprador);

      }else{


      }

    }
  });

}

function rejeitarAssociacao($ccUtente,$codComprador){

  bootbox.confirm({
    message: "Tem a certeza que quer rejeitar esta associação?",
    buttons: {
        confirm: {
            label: 'Sim',
            className: 'btn-success'
        },
        cancel: {
            label: 'Não',
            className: 'btn-danger'
        }
    },
    callback: function (result) {
      if(result==true){
          window.location.replace('../associacao/rejeitarAssociacao.php?cc='+$ccUtente+'&cod='+$codComprador);

      }else{


      }

    }
  });

}

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
            <div class="main-content">
                <div class="section__content section__content--p30">


                    <div class="row">

                                    <div class="table-responsive table-responsive-data2">
<h3 class="title-5 m-b-35" style="text-align:center;">Lista de associações pendentes</h3>
<br>


<div class="rs-select2--dark rs-select2--sm rs-select2--dark2" style="float:right;padding-right:12%;">

                <form action="utente-listaAssociados.php" method="POST">
                              <button class="btn btn-primary" type="submit">
                                  <i class="fa fa-search"></i> Associados
                              </button>
                </form>

            </div>


                                                <div id="txtHint">

                                                  <?php

                                                  @session_start();

                                                  if (isset($_SESSION['msg'])) {
                                                      echo $_SESSION['msg'];
                                                      unset($_SESSION['msg']);
                                                  }
                                                  ?>

<?php





                                                  echo '


                                                  <table class="table table-data2">
                                                      <thead>
                                                          <tr>
                                                              <th></th>
                                                              <th>Nome do médico</th>
                                                              <th>CC</th>
                                                              <th>Especialidade</th>
                                                              <th></th>
                                                          </tr>
                                                      </thead>
                                                      <tbody>



                                                    <tr class="spacer"></tr>
                                                    ';

                                                    if ($result2->num_rows > 0) {
                                                        // output data of each row
                                                        while($row = $result2->fetch_assoc()) {

                                                          $nomeMedico = $row['nomeComprador'];

                                                          $ccComprador = $row['ccComprador'];

                                                          $especialidade = $row['descriEspecialidade'];

                                                          $codComprador = $row['codComprador'];

                                                          $ccUtente = $row['utente_ccUtente'];


                                                          echo '<tr class="tr-shadow">
                                                              <td></td>
                                                              <td>'.$nomeMedico.'</td>
                                                              <td>
                                                                  <span class="block-email">'.$ccComprador.'</span>
                                                              </td>
                                                              <td class="desc">'.$especialidade.'</td>

                                                              <td title="Ver mais informações">


                                                              <button class="btn btn-primary btn-sm" style="font-size:16px" title="Clique para aceitar a associação" onclick="aceitarAssociacao('.$ccUtente.','.$codComprador.')";>
                                                                  <i class="fas fa-check"></i>
                                                              </button>&nbsp

                                                              <button class="btn btn-danger btn-sm" style="font-size:16px" title="Clique para rejeitar a associação" onclick="rejeitarAssociacao('.$ccUtente.','.$codComprador.')";>
                                                                <i class="fas fa-times"></i>
                                                              </button>&nbsp

                                                              </td>
                                                          </tr>
                                                          <tr class="spacer"></tr>';
}
}
                                                        echo '</div>












                                                  </tbody>
                                                  </table>';

                                                  if ($result->num_rows == 0 || $result2->num_rows == 0) {

                                                    echo '<br>
                                                      <tr>Sem resultados!</tr>


                                                    ';


                                                  }


?>







                                                </div>

                                                    <!--<tr class="spacer"></tr>
                                                    <tr class="tr-shadow">
                                                        <td>
                                                            <label class="au-checkbox">
                                                                <input type="checkbox">
                                                                <span class="au-checkmark"></span>
                                                            </label>
                                                        </td>
                                                        <td>Lori Lynch</td>
                                                        <td>
                                                            <span class="block-email">john@example.com</span>
                                                        </td>
                                                        <td class="desc">iPhone X 64Gb Grey</td>

                                                        <td>

                                                                <button type="button" class="btn btn-outline-primary">
                                                                    <i class="fa fa-user"></i>&nbsp;Perfil</button>
                                                                <button type="button" class="btn btn-outline-danger">
                                                                     <i class="fa fa-trash"></i>&nbsp; Remover</button>

                                                        </td>
                                                    </tr>
                                                    <tr class="spacer"></tr>-->
                                    </div>





                        </div>
                    </div>

                    <!-- Button trigger modal
<button type="button" class="btn btn-danger btn-lg" >
  Modal with multiple actions
</button>
-->
<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 id="cod">Informações da intervenção</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
        <h4 class="modal-title" id="myModalLabel"></h4>
      </div>
      <div class="modal-body">
        <div class="row m-t-30">
                            <div class="col-md-12">
                                <!-- DATA TABLE-->
                                <div class="table-responsive m-b-40">
                                <table class="table table-borderless table-data3">

                                    <tbody>
                                        <tr>
                                            <td>Descrição</td>
                                            <td id="descricao"></td>

                                        </tr>
                                        <tr>
                                            <td>Data e hora do início</td>
                                            <td id="start"></td>

                                        </tr>
                                        <tr>
                                            <td>Data e hora do fim</td>
                                            <td id="end"></td>

                                        </tr>
                                        <tr>
                                            <td>Preço</td>
                                            <td id="preco"></td>

                                        </tr>

                                        <tr>
                                            <td>Nome do médico</td>
                                            <td><a href="" id="hiperl"><p id="nomemedico"> </p></a></td>

                                        </tr>
                                        <tr>
                                            <td>Local</td>
                                            <td id="local"></td>

                                        </tr>

                                    </tbody>

                                </table>


                                <table class="a table table-borderless table-data3">

                                    <tbody>
                                        <tr>
                                            <td style="text-align:left;">Observações</td>

                                        </tr>
                                        <tr>
                                            <td style="text-align:left" id="observacoes"></td>

                                        </tr>

                                    </tbody>

                                  </table>


                                </div>
                                <!-- END DATA TABLE-->
                            </div>
                        </div>

      </div>
      <div class="modal-footer">

        <button type="button" class="btn btn-danger" data-dismiss="modal">Fechar</button>
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
    <script src="../../Interior/vendor/jquery-3.2.1.min.js"></script>
    <!-- Bootstrap JS-->
    <script src="../../Interior/vendor/bootstrap-4.1/popper.min.js"></script>
    <script src="../../Interior/vendor/bootstrap-4.1/bootstrap.min.js"></script>
    <!-- Vendor JS       -->
    <script src="../../Interior/vendor/slick/slick.min.js">
    </script>
    <script src="../../Interior/vendor/wow/wow.min.js"></script>
    <script src="../../Interior/vendor/animsition/animsition.min.js"></script>
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
<script type="text/javascript" src="https://code.jquery.com/jquery-1.11.3.min.js"></script>

<!-- Include Date Range Picker -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/js/bootstrap-datepicker.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/css/bootstrap-datepicker3.css"/>

    <script>
    $(document).ready(function(){
        var date_input=$('input[name="date"]'); //our date input has the name "date"
        var container=$('.bootstrap-iso form').length>0 ? $('.bootstrap-iso form').parent() : "body";
        date_input.datepicker({
            format: 'yyyy-mm-dd',
            container: container,
            todayHighlight: true,
            autoclose: true,
        })
    })
</script>

</body>

</html>
