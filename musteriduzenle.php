<!DOCTYPE html>
<?php 
require_once 'baglanti.php'; 
?>
<?php

if(isset($_GET["duzenle"]))
{
	$ID = $_GET["duzenle"];
	
}

 ?>
<?php
if(isset($_POST["duzenle"]))
{
	
	$duzenlenecekID = $_POST["duzenlenecek"];
	$ad = $_POST["ad"];
	$soyad = $_POST["soyad"];
	$telefon = $_POST["telefon"];
	
   $sql = "UPDATE musteriler SET ad='{$ad}',soyad='{$soyad}',telefon='{$telefon}' WHERE id='{$duzenlenecekID}'";
   
   if (mysqli_query($conn, $sql)) {
		echo '<script>';
		echo 'alert("Yeni Tür Başarılı Bir Şekilde Güncellendi");';
		echo 'window.location.href="musteriler.php";';
		echo '</script>';
   } else {
      echo "Hata: " . mysqli_error($conn);
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
        <a href="turler.php" class="list-group-item list-group-item-action bg-light">Kitap Türleri</a>
        <a href="musteriler.php" class="list-group-item list-group-item-action bg-light active">Müşteriler</a>
		<a href="musterikitap.php" class="list-group-item list-group-item-action bg-light">Satılan Kitaplar</a>
		<a href="kargrafik.php" class="list-group-item list-group-item-action bg-light">Adet-Kar Grafiği</a>
		<a href="toplamkargrafik.php" class="list-group-item list-group-item-action bg-light">Toplam Kar-Toplam Adet Grafiği</a>
		<a href="turgrafik.php" class="list-group-item list-group-item-action bg-light">En Çok Satılan Kitap Türleri</a>
      </div>
    </div>
    

    
    <div id="page-content-wrapper">



      <div class="container-fluid">
        <h1 class="mt-4">Müşteri Düzenleme Paneli</h1>
		
		<form name="ekle" method="post" action="">
		<div class="row">
			<?php 
			
$sql = "SELECT * FROM musteriler where id='{$ID}'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    
    while($row = $result->fetch_assoc()) {


		$ad = $row['ad']; 
		$soyad = $row['soyad']; 
		$telefon = $row['telefon']; 

    }
} else {
    echo "0 results";
}
			
			?>
				<div class="col-md-4">
					<h3>Adı</h3><hr></hr>
					
					
					<input type="text" name="ad" value="<?php echo $ad; ?>">
				</div>
				<div class="col-md-4">
					<h3>Soyadı</h3></h3><hr></hr>
					<input type="text" name="soyad" value="<?php echo $soyad; ?>">
				</div>
				<div class="col-md-4">
					<h3>Telefon</h3></h3><hr></hr>
					<input type="text" name="telefon" value="<?php echo $telefon; ?>">
				</div>
				<div class="clearfix"></div>
				
				<div class="col-md-4 offset-md-4">
				<br></br>
				
				<input type="hidden" value="<?php echo $ID; ?>"  name="duzenlenecek">
					<input type="submit" value="DÜZENLE"  name="duzenle">
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