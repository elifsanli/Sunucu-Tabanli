<!DOCTYPE html>


<?php
require_once 'baglanti.php'; 
if(isset($_POST["ekle"]))
{
	
	$aciklama = $_POST["aciklama"];
	$sira = $_POST["sira"];
	$sql = "INSERT INTO turler (tur, sira) VALUES ('{$aciklama}', '{$sira}')";

	if ($conn->query($sql) === TRUE) {
		//echo "Yeni Tür Başarılı Bir Şekilde Eklendi";
		echo '<script>';
		echo 'alert("Yeni Tür Başarılı Bir Şekilde Eklendi");';
		echo '</script>';
	} else {
		echo "Hata: " . $sql . "<br>" . $conn->error;
	}
}

 ?>


<html lang="tr">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="Elif Sanlı">
  <title>Kitap Evi Karar Destek Sistemi</title>

  
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  
  <link href="css/simple-sidebar.css" rel="stylesheet">
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
        <a href="turler.php" class="list-group-item list-group-item-action bg-light active">Kitap Türleri</a>
        <a href="musteriler.php" class="list-group-item list-group-item-action bg-light">Müşteriler</a>
		<a href="musterikitap.php" class="list-group-item list-group-item-action bg-light">Satılan Kitaplar</a>
		<a href="kargrafik.php" class="list-group-item list-group-item-action bg-light">Adet-Kar Grafiği</a>
		<a href="toplamkargrafik.php" class="list-group-item list-group-item-action bg-light">Toplam Kar-Toplam Adet Grafiği</a>
		<a href="turgrafik.php" class="list-group-item list-group-item-action bg-light">En Çok Satılan Kitap Türleri</a>
      </div>
    </div>
    

    
    <div id="page-content-wrapper">



      <div class="container-fluid">
        <h1 class="mt-4">Kitap Türü Ekleme Paneli</h1>
		
		<form name="ekle" method="post" action="">
		<div class="row">
			
				<div class="col-md-4">
					<h3>Ekleneceği Sıra</h3><hr></hr>
					
					
					<input type="text" name="sira" value="">
				</div>
				<div class="col-md-8">
					<h3>Tür Açıklaması</h3></h3><hr></hr>
					<input type="text" name="aciklama" >
				</div>
				<div class="clearfix"></div>
				
				<div class="col-md-4 offset-md-4">
				<br></br>
					<input type="submit"  name="ekle" value="EKLE">
				</div>
					
				
			
		</div>
		</form>
      </div>
    </div>
    

  </div>
  

  
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  

</body>

</html>
