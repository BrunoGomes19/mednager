<?php
include('../topos/topo_medico.php');

$sql = "SELECT * from especialidade";
$result = $conn->query($sql);

$sql2 = "SELECT * from categorias";
$result2 = $conn->query($sql2);

$conn->close();

?>

<meta charset="UTF-8">

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <script src="../../assets/js/bootstrap.min.js"></script>

    <script src="../../assets/js/bootbox.min.js"></script>

<script>

function escolherEspecialidade(esp,str) {

var yesEspecialidade = document.getElementById("dropdown-especialidades");

var yesCategoria = document.getElementById("dropdown-categorias");

yesEspecialidade.onchange = function(){

    $('#dropdown-categorias').find($('option')).attr('selected',false)

   document.getElementById("input1-group2").value = "";

    document.getElementById("txtHint").innerHTML = "A lista de medicamentos será exibida aqui.";

}

yesCategoria.onchange = function(){

  $('#dropdown-especialidades').find($('option')).attr('selected',false)

   document.getElementById("input1-group2").value = "";

    document.getElementById("txtHint").innerHTML = "A lista de medicamentos será exibida aqui.";

}

    var selectBox = document.getElementById("dropdown-especialidades");
    var codEspecialidade = selectBox.options[selectBox.selectedIndex].value;
    var descriEspecialidade = selectBox.options[selectBox.selectedIndex].text;

    var selectBox2 = document.getElementById("dropdown-categorias");
    var codCategoria = selectBox2.options[selectBox2.selectedIndex].value;
    var descriCategoria = selectBox2.options[selectBox2.selectedIndex].text;

    if(descriEspecialidade != "Todas as especialidades"){

      if (esp == "" || esp == undefined) {
          document.getElementById("txtHint").innerHTML = "A lista de medicamentos será exibida aqui.";
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
          xmlhttp.open("GET","ajaxlistamedicamentos.php?cod="+codEspecialidade+"&descri="+descriEspecialidade+"&str="+esp,true);
          xmlhttp.send();
      }

    }else if(descriCategoria != "Todas as categorias"){

      if (esp == "" || esp == undefined) {
          document.getElementById("txtHint").innerHTML = "A lista de medicamentos será exibida aqui.";
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
          xmlhttp.open("GET","ajaxlistamedicamentoscategorias.php?cod="+codCategoria+"&descri="+descriCategoria+"&str="+esp,true);
          xmlhttp.send();
      }

    }else{
      if (esp == "") {
          document.getElementById("txtHint").innerHTML = "A lista de medicamentos será exibida aqui.";
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
          xmlhttp.open("GET","ajaxlistamedicamentotodos.php?str="+esp,true);
          xmlhttp.send();
}

    }


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
                        <div class="col-md-12">





                            <h3 class="title-5 m-b-35" style="text-align: center">Lista de medicamentos</h3>
                                    <div class="table-data__tool">
                                        <div class="table-data__tool-left">
                                            <div class="rs-select2--light ">




                                                   <div class="input-group">

                                                        <button class="btn btn-primary" disabled>
                                                            <i class="fa fa-search"></i>
                                                        </button>

                                                        <input type="text" id="input1-group2" name="input1-group2" placeholder="Nome do medicamento" class="form-control" onkeyup="escolherEspecialidade(this.value)">
                                                    </div>



                                                <div class="dropDownSelect2"></div>
                                            </div>


                                        </div>
                                        <div class="table-data__tool-right">
<?php
                                          echo '<select id="dropdown-especialidades" style="border-radius: 12px; background: #f8f9fa; border: 2px solid #5fbace;" onchange="escolherEspecialidade();">';
?>
                                          <?php  if ($result->num_rows > 0) {
                                                // output data of each row
                                                while($row = $result->fetch_assoc()) {

                                                  $descriEspecialidade = $row['descriEspecialidade'];

                                                  $codEspecialidade = $row['codEspecialidade'];

                                                  if($descriEspecialidade == ""){

                                                    echo '<option value=1>Todas as especialidades</option>';

                                                  }else{

                                                    echo '<option value='.$codEspecialidade.'> '.$descriEspecialidade.' </option>';

                                                  }






                                                }
                                            } else {
                                                echo "0 results";
                                            }
                                            ?>

                                          </select>

                                        </div>

                                        <div class="table-data__tool-right">
<?php
                                          echo '<select id="dropdown-categorias" style="border-radius: 12px; background: #f8f9fa; border: 2px solid #5fbace;" onchange="escolherEspecialidade();">';
?>
                                          <?php  if ($result2->num_rows > 0) {
                                                // output data of each row
                                                while($row = $result2->fetch_assoc()) {

                                                  $descriCategoria = $row['nomeCategoria'];

                                                  $codCategoria = $row['idcategoria'];

                                                  if($descriCategoria == ""){

                                                    echo '<option value=1>Todas as categorias</option>';

                                                  }else{

                                                    echo '<option value='.$codCategoria.'> '.$descriCategoria.' </option>';

                                                  }






                                                }
                                            } else {
                                                echo "0 results";
                                            }
                                            ?>

                                          </select>

                                        </div>

                                        <div class="rs-select2--dark rs-select2--sm rs-select2--dark2">




                                                    </div>
                                        </div>

                                    </div>
                                    <div class="table-responsive table-responsive-data2">


                                                <div id="txtHint"><b>A lista de medicamentos será exibida aqui.</b></div>



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
            format: 'yyyy/mm/dd',
            container: container,
            todayHighlight: true,
            autoclose: true,
        })
    })
</script>

</body>

</html>
