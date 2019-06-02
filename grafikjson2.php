<?php
header("Content-Type:application/json");
$baglanti=mysqli_connect("localhost","root","","finalodev");
$sorgu=mysqli_query($baglanti,"SELECT SUM(kar) AS kar,MAX(miktar) AS miktar FROM kar");
$data=array();
foreach($sorgu as $row){
$data[]=$row;
}	

echo json_encode($data);

?>
