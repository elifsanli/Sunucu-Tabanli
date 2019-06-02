<?php
header("Content-Type:application/json");
$baglanti=mysqli_connect("localhost","root","","finalodev");
$sorgu=mysqli_query($baglanti,"SELECT kitapID, COUNT(*) AS sayi FROM kitapmus GROUP BY kitapID order by sayi desc");
$data=array();
foreach($sorgu as $row){
$data[]=$row;
}	

echo json_encode($data);

?>
