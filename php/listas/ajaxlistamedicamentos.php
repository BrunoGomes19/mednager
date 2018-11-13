
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
</head>
<body>

<?php



$codEspecialidade = intval($_GET['cod']);

$descriEspecialidade = $_GET['descri'];

$str = $_GET['str'];

$con = mysqli_connect('localhost','admin','Sutas4Ever2018','mydb');
if (!$con) {
    die('Could not connect: ' . mysqli_error($con));
}


  if($codEspecialidade==1){

    $sql="SELECT * from medicamento, especialidade, medicamentoespecialidade where medicamento.codMedicamento=medicamentoespecialidade.codMedicamento and especialidade.codEspecialidade=medicamentoespecialidade.codEspecialidade and nomeMedicamento like '".$str."%'";


  }else{

    $sql="SELECT * from medicamento, especialidade, medicamentoespecialidade where medicamento.codMedicamento=medicamentoespecialidade.codMedicamento and especialidade.codEspecialidade=medicamentoespecialidade.codEspecialidade and especialidade.descriEspecialidade like '".$descriEspecialidade."'
     and nomeMedicamento like '".$str."%'";

  }

  mysqli_select_db($con,"ajax_demo");
  $result = mysqli_query($con,$sql);

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

mysqli_close($con);






?>
</body>
</html>
