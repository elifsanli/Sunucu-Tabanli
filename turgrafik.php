<?php
 $baglanti=mysqli_connect("localhost","root","","finalodev");
$sorgu=mysqli_query($baglanti,"SELECT kitapID, COUNT(*) AS sayi FROM kitapmus GROUP BY kitapID");
$data=array();
$say = 0;
$kitapID = "";

foreach($sorgu as $row){
	$kitapID = $kitapID.$row['kitapID'].",";
}	
$kitapID = rtrim($kitapID,","); 
	$sorgukitapal=mysqli_query($baglanti,"SELECT turID from kitaplar where id IN($kitapID) GROUP BY turID ");
	foreach($sorgukitapal as $list)
	{
		$turID = $list['turID'];
		$sorgutur=mysqli_query($baglanti,"SELECT * from turler where id='{$turID}'");
		foreach($sorgutur as $oku)
		{


				$turid = $oku['id'];
				$name = $baglanti->query("SELECT SUM(satismiktari) AS miktar from kitaplar where turID='{$turid}'")->fetch_object()->miktar; 
				$data[$say]["label"]=$oku['tur'];
				$data[$say]["y"] = $name;
				$say++;
			
		}
	}
	

 json_encode($data);
	
?>

























<!DOCTYPE html>



<html lang="tr">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="Elif Sanlı">
  <title>Kitap Evi Karar Destek Sistemi</title>

  
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  
  <link href="css/simple-sidebar.css" rel="stylesheet">
  <script>
window.onload = function () {
 
var chart = new CanvasJS.Chart("chartContainer", {
	animationEnabled: true,
	exportEnabled: true,
	title:{
		text: ""
	},
	subtitles: [{
		text: ""
	}],
	data: [{
		type: "pie",
		showInLegend: "true",
		legendText: "{label}",
		indexLabelFontSize: 16,
		indexLabel: "{label} - #percent%",
		yValueFormatString: "฿#,##0",
		dataPoints: <?php echo json_encode($data, JSON_NUMERIC_CHECK); ?>
	}]
});
chart.render();
 
}
</script>
<style>
.list-group-item.active
{
	color:purple!important;
}
</style>
</head>

<body>

  <div class="d-flex" id="wrapper">

    
    <div class="bg-light border-right" id="sidebar-wrapper">
      <div class="list-group list-group-flush">
		<a href="anasayfa.php" class="list-group-item list-group-item-action bg-light">Anasayfa</a>
        <a href="kitaplar.php" class="list-group-item list-group-item-action bg-light">Kitaplar</a>
        <a href="yayinevleri.php" class="list-group-item list-group-item-action bg-light">Yayınevleri</a>
        <a href="turler.php" class="list-group-item list-group-item-action bg-light">Kitap Türleri</a>
        <a href="musteriler.php" class="list-group-item list-group-item-action bg-light">Müşteriler</a>
		<a href="musterikitap.php" class="list-group-item list-group-item-action bg-light">Satılan Kitaplar</a>
		<a href="kargrafik.php" class="list-group-item list-group-item-action bg-light">Adet-Kar Grafiği</a>
		<a href="toplamkargrafik.php" class="list-group-item list-group-item-action bg-light">Toplam Kar-Toplam Adet Grafiği</a>
		<a href="turgrafik.php" class="list-group-item list-group-item-action bg-light active">En Çok Satılan Kitap Türleri</a>
		
      </div>
    </div>
    

    
    <div id="page-content-wrapper">



      <div class="container-fluid">
        <h1 class="mt-4">Kitap Satış-Tür Grafiği</h1>
		
<div>
<div id="chartContainer" style="height: 370px; width: 100%;"></div>
<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
</div>
      </div>
    </div>
    

  </div>
  

  

</body>

</html>
