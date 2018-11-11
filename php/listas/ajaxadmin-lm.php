
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
</head>
<body>

<?php

$q = intval($_GET['q']);

$con = mysqli_connect('localhost','admin','Sutas4Ever2018','mydb');
if (!$con) {
    die('Could not connect: ' . mysqli_error($con));
}

mysqli_select_db($con,"ajax_demo");
$sql="SELECT * FROM comprador WHERE NIFComprador like '".$q."%' and comprador.codPermissao=2 ORDER BY nomeComprador";
$result = mysqli_query($con,$sql);

echo '


<table class="table table-data2">
    <thead>
        <tr>
            <th>
                <label class="au-checkbox">
                    <input type="checkbox">
                    <span class="au-checkmark"></span>
                </label>
            </th>
            <th>Nome</th>
            <th>Cartão de cidadão</th>
            <th>NIF</th>
            <th></th>
        </tr>
    </thead>
    <tbody>


';



while($row = mysqli_fetch_array($result)) {

$nome = $row['nomeComprador'];

$cc = $row['ccComprador'];

$nif = $row['NIFComprador'];



echo '
  <tr class="spacer"></tr>
  <tr class="tr-shadow">
      <td>
          <label class="au-checkbox">
              <input type="checkbox">
              <span class="au-checkmark"></span>
          </label>
      </td>
      <td>'.$nome.'</td>
      <td>
          <span class="block-email">'.$cc.'</span>
      </td>
      <td class="desc">'.$nif.'</td>

      <td>

              <button class="btn btn-outline-primary" onclick="verperfil('.$cc.');">
                  <i class="fa fa-user"></i>&nbsp;Perfil</button>
                  <button type="button" class="btn btn-outline-danger">
                       <i class="fa fa-trash"></i>&nbsp; Remover</button>

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
