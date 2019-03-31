
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
</head>
<body>

<?php

$codCategoria = intval($_GET['cod']);

$descriCategoria = $_GET['descri'];

$str = $_GET['str'];


function tirarAcentos($str){
    return preg_replace(array("/(á|à|ã|â|ä)/","/(Á|À|Ã|Â|Ä)/","/(é|è|ê|ë)/","/(É|È|Ê|Ë)/","/(í|ì|î|ï)/","/(Í|Ì|Î|Ï)/","/(ó|ò|õ|ô|ö)/","/(Ó|Ò|Õ|Ô|Ö)/","/(ú|ù|û|ü)/","/(Ú|Ù|Û|Ü)/","/(ñ)/","/(Ñ)/"),explode(" ","a A e E i I o O u U n N"),$str);
}

$find = false;

$str = tirarAcentos($str);

include "../topos/header.php";

$codComprador = $_SESSION['codComprador'];

$permissao = $_SESSION['permissao'];


  if($codCategoria==1){

    $sql="SELECT * from medicamento where nomeMedicamento like '".$str."%' limit 50";

    mysqli_select_db($conn,"ajax_demo");
    $result = mysqli_query($conn,$sql);

    if ($result->num_rows == 0) {

      $sql="SELECT * from medicamento where nomeGenerico like '".$str."%' limit 50";

       mysqli_select_db($conn,"ajax_demo");
       $result = mysqli_query($conn,$sql);

    }

  }else{

  if($permissao==2){

    $sql = "SELECT * FROM comprador where codComprador = $codComprador";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {

          $LEIMedico = $row['LEIComprador'];

        }

            $sqlAdmin = "SELECT * FROM comprador where LEIComprador = '$LEIMedico' and codPermissao = 1";
            $resultAdmin = $conn->query($sqlAdmin);

            $find = true;

            if ($resultAdmin->num_rows > 0) {
                // output data of each row
                while($row = $resultAdmin->fetch_assoc()) {
                    $codCompradorAdmin = $row['codComprador'];
                }

                $sql="SELECT * from medicamento, categorias, medicamentocategoria, comprador where comprador.associacao = 2 and medicamento.codMedicamento = medicamentocategoria.codMedicamento and medicamentocategoria.idcategoria = categorias.idcategoria and categorias.nomeCategoria like '".$descriCategoria."'
                 and medicamentocategoria.codComprador = $codCompradorAdmin and nomeMedicamento like '".$str."%' group by medicamento.codMedicamento limit 50";

                 mysqli_select_db($conn,"ajax_demo");
                 $result = mysqli_query($conn,$sql);

                 if ($result->num_rows == 0) {

                   $sql="SELECT * from medicamento, categorias, medicamentocategoria, comprador where comprador.associacao = 2 and medicamento.codMedicamento = medicamentocategoria.codMedicamento and medicamentocategoria.idcategoria = categorias.idcategoria and categorias.nomeCategoria like '".$descriCategoria."'
                    and medicamentocategoria.codComprador = $codCompradorAdmin and nomeGenerico like '".$str."%' group by medicamento.codMedicamento limit 50";

                    mysqli_select_db($conn,"ajax_demo");
                    $result = mysqli_query($conn,$sql);

                 }



            }



    } else {
        echo "Sem resultados...";
    }

  }else{

    $sql="SELECT * from medicamento, categorias, medicamentocategoria where medicamento.codMedicamento = medicamentocategoria.codMedicamento and medicamentocategoria.idcategoria = categorias.idcategoria and categorias.nomeCategoria like '".$descriCategoria."'
     and medicamentocategoria.codComprador = $codComprador and nomeMedicamento like '".$str."%' limit 50";

     mysqli_select_db($conn,"ajax_demo");
     $result = mysqli_query($conn,$sql);

     if ($result->num_rows == 0) {

       $sql="SELECT * from medicamento, categorias, medicamentocategoria where medicamento.codMedicamento = medicamentocategoria.codMedicamento and medicamentocategoria.idcategoria = categorias.idcategoria and categorias.nomeCategoria like '".$descriCategoria."'
        and medicamentocategoria.codComprador = $codComprador and nomeGenerico like '".$str."%' limit 50";

        mysqli_select_db($conn,"ajax_demo");
        $result = mysqli_query($conn,$sql);

     }
   }
  }



  echo '


  <table class="table table-data2">
      <thead>
          <tr>
              <th>Nome genérico</th>
              <th>Nome do medicamento</th>
              <th>Forma farmacêutica</th>
              <th>Dosagem</th>
              <th style="width:2px">Genérico</th>
              <th>Titular de AIM</th>
          </tr>
      </thead>
      <tbody>


  ';



  while($row = mysqli_fetch_array($result)) {

  $nomeGenerico = $row['nomeGenerico'];

  $nomeMedicamento = $row['nomeMedicamento'];

  $formaFarmaceutica = $row['formaFarmaceutica'];

  $dosagem = $row['dosagem'];

  $generico = $row['generico'];

  $titularAIM = $row['titularAIM'];

  echo '
    <tr class="spacer"></tr>
    <tr class="tr-shadow">
        <td>'.$nomeGenerico.'</td>
        <td>'.$nomeMedicamento.'</td>
        <td>'.$formaFarmaceutica.'</td>
        <td>'.$dosagem.'</td>
        <td style="width:2px">'.$generico.'</td>
        <td>'.$titularAIM.'</td>


        </td>
    </tr>
    <tr class="spacer"></tr>
  ';
  }




  echo '

  </div>






  </tbody>
  </table>

  ';


  if ($result->num_rows == 0) {

    echo '<br>
      <tr>Sem resultados!</tr>


    ';

  }

  if($find){

    if ($resultAdmin->num_rows == 0) {

      echo '<br>
        <tr>Sem resultados!</tr>


      ';

    }

  }



mysqli_close($conn);






?>
</body>
</html>
