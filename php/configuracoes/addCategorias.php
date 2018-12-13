<?php
include('../topos/topo_admin.php');

$sql = "SELECT * from categorias";
$result = $conn->query($sql);


$conn->close();

?>

<meta charset="UTF-8">

<style>

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




function adicionaCat (){

    var nome = document.getElementById('nomeCampo').value;


    if(nome == "" ){



}else{

    document.getElementById('nomeCampo').value="";


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
          xmlhttp.open("GET","ajaxcategorias.php?nome="+nome,true);
          xmlhttp.send();

}
}

function procuraCateg(str) {

    if (str == "") {
        document.getElementById("txtHintCampo").innerHTML = "A lista de campos configurados por si será exibida aqui...";
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
                document.getElementById("txtHintCampo").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET","procuraCategs.php?q="+str,true);
        xmlhttp.send();
    }
}

function removerCateg($cod){

  bootbox.confirm({
    message: "Tem a certeza que quer apagar esta categoria?<br>",
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
          window.location.replace('removerCateg.php?cod='+$cod);

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

            <!-- MAIN CONTENT-->
            <div class="main-content">
              <div class="card" style="width: 80%; margin:0 auto; text-align: center;">
                <div class="card-header">
                  <h4><strong>Adicionar/ Remover categoria</strong></h4>
                  <div class="modal-header">
                    <h5 style="text-align:left;width:100%;">Nome da categoria</h5>
                  </div>
                  <div class="col-md-12" id="escolhaEsp">

                            <br>
                            <form>

                              <input class="form-control input-lg" type="text" id="nomeCampo" placeholder="Nome da categoria" required /><br>


                                <div class="rs-select2--light "><br>
                                  <div id="txtHint" ><b></b></div>
                                    <input type="button" value="Adicionar" class="btn btn-warning" id="btnHome" onclick="adicionaCat()";>
                                </div>
                            </form>
                        </div>

                        <form>
                        <br>
                        <div class="col-md-12" id="configEsp" style="display: none";>

                          <br><hr>
                          <div id="txtHint" ><b></b></div>
                          <form>
                            <h3 id="campo" class="title-5 m-b-35"></h3>

                              <input class="form-control input-lg" type="text" id="nomeCampo" placeholder="Nome do campo" required /><br>
                              <input class="form-control" type="text" id="unidadeCampo"  maxlength="20" placeholder="Unidade do campo" required /><br>
                              <br>
                              <input type="input" value="Adicionar"  id="addCampo" class="btn btn-warning" onclick="adicionaCat()">

                            </form>
                        </div>
                </div>
                 <div class="card-footer">
                  <div class="modal-header">
                              <h5 style="text-align:left;width:100%;">Lista de categorias</h5>

                          </div>
                          <div class="modal-body">


                                  <div class="form-group">
                                      <div class="form-group col-md-12" id="vaidar2">


                                          <input type="text" class="form-control" name="title" id="title" autocomplete="off" placeholder="Nome da categoria" required onkeyup="procuraCateg(this.value)">
                                          <br>
                                          <p id="txtHintCampo">A lista de categorias configuradas por si será exibida aqui...</p>
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


</body>

</html>
