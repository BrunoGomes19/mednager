<?php
include('connect.php');
 
if(isset($_POST['view'])){
 
$con = mysqli_connect("localhost", "admin", "Sutas4Ever2018", "mydb");
 
if($_POST["view"] != '')
 
{
   $update_query = "UPDATE alertautente SET estadoUtente = 1 WHERE estadoUtente=0";
   mysqli_query($con, $update_query);
}
 
$query = "SELECT * FROM alertautente ORDER BY codAlertaUtente DESC LIMIT 5";
$result = mysqli_query($con, $query);
$output = '';
 
if(mysqli_num_rows($result) > 0)
{
 
while($row = mysqli_fetch_array($result))
 
{
 
  $output .= '
  <li>
  <a href="#">
  <strong>'.$row["cccUtente"].'</strong><br />
  <small><em>'.$row["descriAlertaUtente"].'</em></small>
  </a>
  </li>
 
  ';
}
}
 
else{
    $output .= '<li><a href="#" class="text-bold text-italic">No Noti Found</a></li>';
}
 
$status_query = "SELECT * FROM alertautente WHERE estadoUtente=0";
$result_query = mysqli_query($con, $status_query);
$count = mysqli_num_rows($result_query);
 
$data = array(
   'notification' => $output,
   'unseen_notification'  => $count
);
 
echo json_encode($data);
}
?>