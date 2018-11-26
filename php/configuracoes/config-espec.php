<?php
include('../topos/topo_admin.php');

$sql = "SELECT * from especialidade";
$result = $conn->query($sql);


$conn->close();

?>

<meta charset="UTF-8">

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <script src="../../assets/js/bootstrap.min.js"></script>

    <script src="../../assets/js/bootbox.min.js"></script>

<script>

function nomeCampo(){

  var a = $("#dropdown-especialidades option:selected").text();

document.getElementById('campo').innerHTML = "Adicionar campo - "+a;

}

function registaCampo (){

  <?php




  $nomeCampo1 = filter_input(INPUT_POST, 'nomeCampo1', FILTER_SANITIZE_STRING);

  $sql = "INSERT INTO registoCampos VALUES (null, nomeCampo1, unidadeCampo, observacoesCampo);";
  if($conn->query($sql)===TRUE){
    echo "Campo adicionado com sucessp";
  } else{
    echo "Error: ". $sql . "<br>" . $conn->error;
  }

  $conn->close();

  ;

   ?>



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

                        <div class="col-md-12" id="escolhaEsp">

                            <h3 class="title-5 m-b-35">Configurações</h3>
                            <form>
                                <?php
                                    echo '<select id="dropdown-especialidades"  >';
                                ?>
                                <?php
                                if ($result->num_rows > 0) {
                                    // output data of each row
                                    while($row = $result->fetch_assoc()) {
                                        $descriEspecialidade = $row['descriEspecialidade'];

                                        $codEspecialidade = $row['codEspecialidade'];

                                        if($descriEspecialidade == ""){

                                            echo '<option value=1>Todos</option>';

                                        }else{

                                            echo '<option value='.$codEspecialidade.'> '.$descriEspecialidade.' </option>';

                                        }
                                    }
                                } else {
                                    echo "0 results";
                                }
                                ?>

                                    </select>

                                <div class="rs-select2--light ">
                                    <input type="button" value="Configurar" class="btn btn-primary" id="btnHome" onclick="nomeCampo()";>
                                </div>
                            </form>
                        </div>


                        <div class="col-md-12" id="configEsp" style="display: none";>

                          <br><hr>

                            <h3 id="campo" class="title-5 m-b-35">Adicionar campo - </h3>

                              <input class="form-control input-sm" type="text"  id="nomeCampo1" placeholder="Nome do campo"><br>
                              <input class="form-control" type="text" id="unidadeCampo"  placeholder="Unidade do campo"><br>
                              <input class="form-control input-lg" type="text"  id="observacoesCampo" placeholder="Observações do campo">
                              <br><br>
                              <input type="button" value="Adicionar"  id="addCampo" class="btn btn-warning" onclick="registaCampo()">

                            </form>
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
            format: 'yyyy/mm/dd',
            container: container,
            todayHighlight: true,
            autoclose: true,
        })
    })



    $('.btn-primary').on("click", function () {
        document.getElementById('configEsp').style.display = "block";
    });
</script>

</body>

</html>
