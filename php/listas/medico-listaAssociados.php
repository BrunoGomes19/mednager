<?php
include('../topos/topo_medico.php');

$emailA = $_SESSION['email'];

$sql = "SELECT * FROM comprador where emailComprador='$emailA'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {

      $ccComprador = $row['ccComprador'];

      $LEIComprador = $row['LEIComprador'];

      if($LEIComprador == NULL){

        $LEIComprador = 1;

      }

    }
} else {
    echo "0 results";
}

$sql = "select * from comprador where LEIComprador = $LEIComprador and associacao = 2 and ccComprador = $ccComprador;";
$result2 = $conn->query($sql);

if ($result2->num_rows > 0) {
    // output data of each row
    while($row = $result2->fetch_assoc()) {

      $ccComprador = $row['ccComprador'];

      $LEIComprador = $row['LEIComprador'];

      $codComprador = $row['codComprador'];

    }
} else {
    echo "0 results";
}







?>

<meta charset="UTF-8">

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>

  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js" integrity="sha512-K1qjQ+NcF2TYO/eI3M6v8EiNYZfA95pQumfvcVrTHtwQVDG+aHRqLi/ETn2uB+1JqwYqVG3LIvdm9lj6imS/pQ==" crossorigin="anonymous"></script>

  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
      <script src="../../assets/js/bootstrap.min.js"></script>

      <script src="../../assets/js/bootbox.min.js"></script>

<script>

function removerAssociacao($codComprador){

  bootbox.confirm({
    message: "Tem a certeza que quer desassociar este coletivo?",
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
          window.location.replace('../associacao/removerAssociacaoMedico.php?cod='+$codComprador);

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
<h3 class="title-5 m-b-35" style="text-align:center;">Coletivo associado</h3>
<br>


<div class="rs-select2--dark rs-select2--sm rs-select2--dark2" style="float:right;padding-right:12%;">

                <form action="medico-listaPedidos.php" method="POST">
                              <button class="btn btn-primary" type="submit">
                                  <i class="fa fa-search"></i> Pedidos
                              </button>
                </form>

            </div>


                                                <div id="txtHint">



<?php





                                                  echo '


                                                  <table class="table table-data2">
                                                      <thead>
                                                          <tr>
                                                              <th></th>
                                                              <th>Nome</th>
                                                              <th>Email</th>
                                                              <th>LEI</th>
                                                              <th></th>
                                                          </tr>
                                                      </thead>
                                                      <tbody>



                                                    <tr class="spacer"></tr>
                                                    ';

                                                    if($result2->num_rows == 0){}else{

                                                    $sql2 = "select * from comprador where LEIComprador = $LEIComprador and codPermissao=1;";
                                                    $result3 = $conn->query($sql2);

                                                    if ($result3->num_rows > 0) {
                                                        // output data of each row
                                                        while($row = $result3->fetch_assoc()) {

                                                          $nomeAdmin = $row['nomeComprador'];

                                                          $emailAdmin = $row['emailComprador'];

                                                          $leiAdmin = $row['LEIComprador'];



                                                          echo '<tr class="tr-shadow">
                                                              <td></td>
                                                              <td>'.$nomeAdmin.'</td>
                                                              <td>
                                                                  <span class="block-email">'.$emailAdmin.'</span>
                                                              </td>
                                                              <td class="desc">'.$leiAdmin.'</td>

                                                              <td title="Ver mais informações">';



                                                              $sql77 = "select * from comprador where LEIComprador = $LEIComprador and associacao = 2 and ccComprador = $ccComprador;";
                                                              $result55 = $conn->query($sql77);

                                                              if ($result55->num_rows > 0) {
                                                                  // output data of each row
                                                                  while($row = $result55->fetch_assoc()) {

                                                                    $codComprador = $row['codComprador'];

                                                                    echo '<button class="btn btn-danger btn-sm" style="font-size:16px" title="Clique para remover a associação" onclick="removerAssociacao('.$codComprador.')";>
                                                                      <i class="fas fa-times"></i>
                                                                    </button>&nbsp';

                                                                  }
                                                              } else {
                                                                  echo "0 results";
                                                              }





                                                            echo '  </td>
                                                          </tr>
                                                          <tr class="spacer"></tr>';
}
}
}
                                                        echo '</div>












                                                  </tbody>
                                                  </table>';

                                                  if ($result->num_rows == 0 || $result2->num_rows == 0 || $result3->num_rows == 0 || $result55->num_rows == 0) {

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
