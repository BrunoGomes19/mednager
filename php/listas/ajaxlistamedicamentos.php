
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

    $sql="SELECT * from medicamento, especialidade, medicamentoespecialidade where medicamento.codMedicamento=medicamentoespecialidade.codMedicamento and especialidade.codEspecialidade=medicamentoespecialidade.codEspecialidade and descriMedicamento like '".$str."%'";


  }else{

    $sql="SELECT * from medicamento, especialidade, medicamentoespecialidade where medicamento.codMedicamento=medicamentoespecialidade.codMedicamento and especialidade.codEspecialidade=medicamentoespecialidade.codEspecialidade and especialidade.descriEspecialidade like '".$descriEspecialidade."'
     and descriMedicamento like '".$str."%'";

  }

  mysqli_select_db($con,"ajax_demo");
  $result = mysqli_query($con,$sql);

  echo '


  <table class="table table-data2">
      <thead>
          <tr>
              <th></th>
              <th>Nome</th>
              <th>Especialidade</th>
          </tr>
      </thead>
      <tbody>


  ';



  while($row = mysqli_fetch_array($result)) {

  $descriMedicamento = $row['descriMedicamento'];

  $descriEspecialidade = $row['descriEspecialidade'];



  echo '
    <tr class="spacer"></tr>
    <tr class="tr-shadow">
        <td>

        </td>
        <td>'.$descriMedicamento.'</td>
        <td>
            <span class="block-email">'.$descriEspecialidade.'</span>
        </td>


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
