<?php
include('../topos/topo_admin.php');

$sql = "SELECT * from categorias";
$result = $conn->query($sql);


$conn->close();

?>

<meta charset="UTF-8">

<style>

#HoverTR:hover td {
    background-color: #dee1e5;
    /* or #000 */
}

/* Box styles */
.myBox {
border: none;
padding: 5px;
font: 17px/24px ;
width: 200px;
max-height: 600px;
overflow: scroll;
}

/* Scrollbar styles */
::-webkit-scrollbar {
width: 12px;
height: 12px;
}

::-webkit-scrollbar-track {
background: #f5f5f5;
border-radius: 10px;
}

::-webkit-scrollbar-thumb {
border-radius: 10px;
background: #ccc;
}

::-webkit-scrollbar-thumb:hover {
background: #999;
}

</style>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <script src="../../assets/js/bootstrap.min.js"></script>

    <script src="../../assets/js/bootbox.min.js"></script>

<script>




function procuraMed(str) {
    if (str == "") {
        document.getElementById("txtHint").innerHTML = "A lista de medicamentos será exibida aqui...";
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

function adicionaMedCat(){

  var cat = $("#dropdown-categorias option:selected").val();


  var codMedicamento = document.getElementById('guardaCodMed').value;



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
  xmlhttp.open("GET","insereMedicamentoCategoria.php?codMedicamento="+codMedicamento+"&cat="+cat,true);
  xmlhttp.send();

}




function guardaMed(codMedicamento,nomeMedicamento){

  document.getElementById('title').value = nomeMedicamento;
document.getElementById('guardaCodMed').value = codMedicamento;
document.getElementById("txtHint").innerHTML = "";






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

<?php

@session_start();

if (isset($_SESSION['msgCampo'])) {
    echo $_SESSION['msgCampo'];
    unset($_SESSION['msgCampo']);
}
?>
<script>

window.setInterval(function() {
 $(".alert").fadeTo(500, 0).slideUp(500, function(){
     $(this).remove();
 });
}, 4000);

</script>


            <div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="row" >

                      <div class="card" style="width: 80%; margin:0 auto; text-align: center;">
                        <div class="card-header">
                            <h4><strong>Associar medicamentos a categorias</strong></h4>

                            <div class="modal-header">
                              <h5 style="text-align:left;width:100%;">Categorias</h5>
                            </div>
                            <div class="modal-body">
                              <form style="text-align: left">
                                <?php
                                    echo '<select style="border-radius: 12px; background: #f8f9fa; border: 2px solid #5fbace;" id="dropdown-categorias"  >';
                                ?>
                                <?php
                                if ($result->num_rows > 0) {
                                    // output data of each row
                                    while($row = $result->fetch_assoc()) {
                                        $nomeCategoria = $row['nomeCategoria'];

                                        $idCategoria = $row['idcategoria'];

                                        if($nomeCategoria == ""){

                                            echo '<option value=1 hidden>Escolha uma categoria</option>';

                                        }else{

                                            echo '<option value='.$idCategoria.'> '.$nomeCategoria.' </option>';

                                        }
                                    }
                                } else {
                                    echo "0 results";
                                }
                                ?>

                                    </select>


                            </form>
                          </div>



                          <br style="clear: both;">

                          <div style="width:100%;height:50%;" >
                             <div class="modal-header">
                                    <h5 style="text-align:left;width:100%;">Lista de medicamentos</h5>
                                </div>
                              <div class="row">



                                <div class="modal-body">
                                  <form class="form-horizontal" method="POST" action="proc_cad_evento.php">

                                    <div class="form-group">
                                        <div class="form-group col-md-12" id="vaidarmed">
                                            <input type="text" class="form-control" name="titleMed" onfocus="this.value=''" id="title" autocomplete="off" placeholder="Nome do medicamento ou nome do genérico" required onkeyup="procuraMed(this.value)">
                                            <input type="hidden" id="guardaCodMed">
                                            <br>
                                            <p id="txtHint"></p>
                                        </div>
                                    </div>
                                  </form>
                                </div>

                              </div>
                          </div>
                        <div class="card-footer">
                          <div style="text-align: center">
                            <input type="button" value="Associar" class="btn btn-warning" id="btnHome" onclick="adicionaMedCat()";>
                          </div>
                        </div>
                      </div>
                    </div>
            </div>


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


</body>

</html>
