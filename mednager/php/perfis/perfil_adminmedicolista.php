<?php

$cc = $_GET['cc'];

include('../topos/topo_admin.php');

$sql = "SELECT * from comprador,especialidade where especialidade.codEspecialidade = comprador.codEspecialidade and ccComprador like '$cc'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {

  $sexo = $row["sexoComprador"];

  $linkimagem = $row["linkimagem"];

//asda
  $nome = $row["nomeComprador"];

  $emailComprador = $row["emailComprador"];

  $especialidadeInt = $row["codEspecialidade"];

  $descriEspecialidade = $row["descriEspecialidade"];

  //sexo

  $date = $row["dataNascComprador"];

  $cidade = $row["localidadeComprador"];

  $sobremim = $row["formacaoCarreira"];

  $LEIComprador = $row["LEIComprador"];

  }
} else {
  echo "Error";
}

$sql55 = "select * from comprador where leiComprador=$LEIComprador and ccComprador = $cc and associacao = 2;";
$result2 = $conn->query($sql55);

if ($result2->num_rows == 0) {

  echo '<script>window.location.replace("../logins/logout.php");</script>';

  exit();

}

$conn->close();

?>

            <!-- MAIN CONTENT-->
              <link href="../../assets/css/style.css" rel="stylesheet">

            <div class="content" style="padding-top:8%;">
                        <div class="container-fluid">




                          <div class="col-md-4">
                                    <div class="card card-user">
                                        <div class="image">
                                            <img src="../../assets/images/fundo.jpg" alt="..."/>
                                        </div>
                                        <div class="content">
                                            <div class="author">
                                                 <div class="image" style="width: 50%; margin-left: auto; margin-right: auto; border-radius: 15px">


                                                      <?php

                                                        if($linkimagem == null){

                                                          echo '  <img src="../../assets/images/users/1.jpg" alt="mednager" />';

                                                        }else{

                                                          echo '<img src="'.$linkimagem.'" alt="mednager" />';

                                                        }
                                                        ?>

                                                  </div>

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










                                <div class="col-md-8">
                                    <div class="card">
                                      <div class="card-footer">
                                        <form action="

                                         <?php

                                         //Caso aceda ao perfil pela lista de médicos o voltar vai redirecionar para lá novamente

                                         //Caso aceda ao perfil pelo historico de intervenções vai redirecionar para lá novamente

                                         //Caso aceda ao perfil pelo URL em qualquer lugar vai redirecionar para o index-medico.php

                                         if(empty($_SERVER['HTTP_REFERER'])){

                                           echo "http://localhost/mednager/php/indexes/index-admin.php";

                                         }else{

                                           $last = $_SERVER['HTTP_REFERER'];

                                           if($last == 'http://localhost/mednager/php/listas/admin-lm.php'){

                                           echo $last;

                                           }else{


                                           echo $last;

                                           }

                                         }




                                          ?>



                                        " method="GET" style ='float: left; padding: 5px;'>
            																			<button type="submit" class="btn btn-primary btn-sm" style="font-size:16px">
            																					<i class="fa fa-arrow-left"></i> Voltar
            																			</button>&nbsp
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
                                                        <input type="text" class="form-control" value="<?php echo $emailComprador; ?>" readonly>
                                                    </div>
                                                  </div>
                                              </div>

                                                <div class="row">
                                                    <div class="col-md-6">
                                                      <div class="form-group">
                                                          <label>Sexo</label>
                                                          <input type="text" class="form-control" value="<?php echo $sexo; ?>" readonly>
                                                      </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                      <div class="form-group">
                                                          <label>Especialidade</label>
                                                          <input type="text" class="form-control" value="<?php echo $descriEspecialidade; ?>" readonly>
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
                                                    <div class="col-md-6">
                                                      <div class="form-group">
                                                          <label>Cidade</label>
                                                          <input type="text" class="form-control" value="<?php echo $cidade; ?>" readonly>
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
