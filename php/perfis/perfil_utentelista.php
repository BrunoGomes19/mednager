
<?php

$cc = $_GET['cc'];

include('../topos/topo_medico.php');

$emailA = $_SESSION['email'];

$sql = "SELECT * from utente where ccUtente like '$cc'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {

  $sexo = $row["sexoUtente"];

  $nome = $row["nomeUtente"];

  $emailUtente = $row['emailUtente'];

  $cc = $row["ccUtente"];

  $nrSubsistema = $row["nrSubSistema"];

  $Subsistema = $row["codSubsistema"];

  if($Subsistema==1){

    $Subsistema="";

  }else{

    if($Subsistema==2){

    $Subsistema="ADSE";

  }else{

    if($Subsistema==3){

    $Subsistema="Medis";

  }else{

    $Subsistema="";

  }

  }

  }

  $date = $row["dataNascUtente"];

  $cidade = $row["localidadeUtente"];

  $sobremim = $row["ObservacoesUtente"];

  $contacto1 = $row["contacto1Utente"];

  $contacto2 = $row["contacto2Utente"];

  $nif = $row["NIFUtente"];

  $nib = $row["NIBUtente"];

  $morada = $row["moradaUtente"];

  $cidade = $row["localidadeUtente"];

  $codigopostal = $row["codPostalUtente"];

  $sobremim = $row["ObservacoesUtente"];

  }
} else {
  echo "Error";
}

$sql = "SELECT * from comprador where emailComprador='$emailA'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {

      $codComprador = $row['codComprador'];

    }
} else {
    echo "0 results";
}

$conn->close();

?>

<?php






 ?>

            <!-- MAIN CONTENT-->

            <link href="../../assets/css/style.css" rel="stylesheet">

            <div class="content" style="padding-top:8%;">
                        <div class="container-fluid">

                                <div class="col-md-8">
                                    <div class="card">
                                      <div class="card-footer">
                                        <form action="


                                        <?php

                                        if($codComprador==1){
                                          echo '../listas/admin-lu.php';
                                        }elseif ($codComprador==2) {
                                          echo '../listas/medico-lu.php';
                                        }

                                         ?>


                                        " method="GET" style ='float: left; padding: 5px;'>
            																			<button type="submit" class="btn btn-primary btn-sm" style="font-size:16px">
            																					<i class="fa fa-arrow-left"></i> Voltar
            																			</button>&nbsp
                                        </form>
                                         </form>
            																	</div>
                                        <div class="content">
                                            <form>
                                              <div class="row">
                                                  <div class="col-md-6">
                                                      <div class="form-group">
                                                          <label>Nome completo</label>
                                                          <input type="text" class="form-control" value="<?php echo $nome; ?>" readonly>
                                                      </div>
                                                  </div>
                                                  <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Endereço de e-mail</label>
                                                        <input type="text" class="form-control" value="<?php echo $emailUtente; ?>" readonly>
                                                    </div>
                                                  </div>
                                              </div>

                                                <div class="row">
                                                    <div class="col-md-6">
                                                      <div class="form-group">
                                                          <label>Número CC</label>
                                                          <input type="text" class="form-control" value="<?php echo $cc; ?>" readonly>
                                                      </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                      <div class="form-group">
                                                          <label>Sexo</label>
                                                          <input type="text" class="form-control" value="<?php echo $sexo; ?>" readonly>
                                                      </div>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-md-6">
                                                      <div class="form-group">
                                                          <label>Data de nascimento</label>
                                                          <input type="text" class="form-control" value="<?php echo $date; ?>" readonly>
                                                      </div>
                                                    </div>

                                                </div>

                                                <div class="row">
                                                    <div class="col-md-6">
                                                      <div class="form-group">
                                                          <label>Contacto 1</label>
                                                          <input type="text" class="form-control" value="<?php echo $contacto1; ?>" readonly>
                                                      </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                      <div class="form-group">
                                                          <label>Contacto 2</label>
                                                          <input type="text" class="form-control" value="<?php echo $contacto2; ?>" readonly>
                                                      </div>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-md-6">
                                                      <div class="form-group">
                                                          <label>Número de identificação fiscal (NIF)</label>
                                                          <input type="text" class="form-control" value="<?php echo $nif; ?>" readonly>
                                                      </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                      <div class="form-group">
                                                          <label>Número de Identificação Bancária (NIB)</label>
                                                          <input type="text" class="form-control" value="<?php echo $nib; ?>" readonly>
                                                      </div>
                                                    </div>
                                                </div>


                                                <div class="row">
                                                    <div class="col-md-6">
                                                      <div class="form-group">
                                                          <label>Sistema de saúde</label>
                                                          <input type="text" class="form-control" value="<?php echo $Subsistema; ?>" readonly>
                                                      </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                      <div class="form-group">
                                                          <label>Número do cartão do sistema de saúde</label>
                                                          <input type="text" class="form-control" value="<?php echo $nrSubsistema; ?>" readonly>
                                                      </div>
                                                    </div>
                                                </div>


                                                    <div class="row">
                                                <div class="col-md-12">
                                                  <div class="form-group">
                                                      <label>Morada</label>
                                                      <input type="text" class="form-control" value="<?php echo $morada; ?>" readonly>
                                                  </div>
                                                </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-md-6">
                                                      <div class="form-group">
                                                          <label>Cidade</label>
                                                          <input type="text" class="form-control" value="<?php echo $cidade; ?>" readonly>
                                                      </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                      <div class="form-group">
                                                          <label>Código postal</label>
                                                          <input type="text" class="form-control" value="<?php echo $codigopostal; ?>" readonly>
                                                      </div>
                                                    </div>
                                                </div>


                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label>Sobre mim</label>
                                                            <textarea rows="5" class="form-control" readonly><?php echo $sobremim; ?></textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="clearfix"></div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="card card-user">
                                        <div class="image">
                                            <img src="https://ununsplash.imgix.net/photo-1431578500526-4d9613015464?fit=crop&fm=jpg&h=300&q=75&w=400" alt="..."/>
                                        </div>
                                        <div class="content">
                                            <div class="author">
                                                 <a href="#">
                                                <img class="avatar border-gray" src="../../assets/images/users/1.jpg" alt="..."/>

                                                  <h4 class="title"><?php echo $nome; ?><br />
                                                     <br>
                                                  </h4>
                                                </a>
                                            </div>
                                            <p class="description text-center"> <?php echo $sobremim; ?>
                                            </p>
                                        </div>
                                        <hr>

                                    </div>
                                </div>



                    </div>



            	</div>

            <!-- END MAIN CONTENT-->
            <!-- END PAGE CONTAINER-->


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

</body>

</html>
<!-- end document-->
