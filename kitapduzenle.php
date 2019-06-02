<!DOCTYPE html>


<?php
require_once 'baglanti.php'; 
if(isset($_POST["duzenle"]))
{
	$duzenlenecekID = $_POST["duzenlenecek"];
	$adi = $_POST["adi"];
	$alisfiyati = $_POST["alisfiyati"];
	$fiyati = $_POST["fiyati"];
	$satismiktari = 0;
	$turID = $_POST["turID"];
	$yayineviID = $_POST["yayineviID"];

   $sql = "UPDATE kitaplar SET adi='{$adi}',alisfiyati='{$alisfiyati}',fiyati='{$fiyati}',satismiktari='{$satismiktari}',turID='{$turID}',yayineviID='{$yayineviID}' WHERE id='{$duzenlenecekID}'";
   
   if (mysqli_query($conn, $sql)) {
		echo '<script>';
		echo 'alert("Kitap Başarılı Bir Şekilde Güncellendi");';
		echo 'window.location.href="kitaplar.php";';
		echo '</script>';
   } else {
      echo "Hata: " . mysqli_error($conn);
   }
}

 ?>
 <?php

if(isset($_GET["duzenle"]))
{
	$ID = $_GET["duzenle"];
	
}

 ?>


<html lang="tr">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="Elif Sanlı">
  <title>Kitap Evi Karar Destek Sistemi</title>

  <!-- Bootstrap core CSS -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom styles for this template -->
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
        <a href="kitaplar.php" class="list-group-item list-group-item-action bg-light active">Kitaplar</a>
        <a href="yayinevleri.php" class="list-group-item list-group-item-action bg-light">Yayınevleri</a>
        <a href="turler.php" class="list-group-item list-group-item-action bg-light">Kitap Türleri</a>
        <a href="musteriler.php" class="list-group-item list-group-item-action bg-light">Müşteriler</a>
		<a href="musterikitap.php" class="list-group-item list-group-item-action bg-light">Satılan Kitaplar</a>
		<a href="kargrafik.php" class="list-group-item list-group-item-action bg-light">Adet-Kar Grafiği</a>
		<a href="toplamkargrafik.php" class="list-group-item list-group-item-action bg-light">Toplam Kar-Toplam Adet Grafiği</a>
		<a href="turgrafik.php" class="list-group-item list-group-item-action bg-light">En Çok Satılan Kitap Türleri</a>
      </div>
    </div>
    

    
    <div id="page-content-wrapper">



      <div class="container-fluid">
        <h1 class="mt-4">Kitap Düzenleme Paneli</h1>
			<?php 
			
$sql = "SELECT * FROM kitaplar where id='{$ID}'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    
    while($row = $result->fetch_assoc()) {


		$adi = $row['adi']; 
		$alisfiyati = $row['alisfiyati']; 
		$fiyati = $row['fiyati']; 
		$satismiktari = $row['satismiktari']; 
		$turID = $row['turID']; 
		$yayineviID = $row['yayineviID']; 

    }
} else {
    echo "0 results";
}
			
			?>
		<form name="ekle" method="post" action="">
		<div class="row">
			

				<div class="col-md-12">
					<h3>Kitap Adı</h3></h3><hr></hr>
					<input type="text" name="adi" value="<?php echo $adi; ?>">
				</div>
				<div class="clearfix"></div>
				<div class="col-md-12">
					<h3>Alış Fiyatı</h3></h3><hr></hr>
					<input type="text" name="alisfiyati" value="<?php echo $alisfiyati; ?>">
				</div>
				<div class="clearfix"></div>
				<div class="col-md-12">
					<h3>Fiyatı</h3></h3><hr></hr>
					<input type="text" name="fiyati" value="<?php echo $fiyati; ?>">
				</div>
				<div class="clearfix"></div>
				<div class="col-md-12">
					<h3>Kitap Türü</h3></h3><hr></hr>
					<select name="turID">
						<option>Seçim Yapın </option>
<?php 

$sql = "SELECT * FROM turler order by sira asc";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    
    while($row = $result->fetch_assoc()) {
		?>

		<option <?php if($row['id'] == $turID){ echo "selected"; } ?> value="<?php echo $row['id']; ?>"><?php echo $row['tur']; ?></option>

		<?php
    }
}

?>
					</select>
				</div>
				<div class="clearfix"></div>
				<div class="col-md-12">
					<h3>Yayınevleri</h3></h3><hr></hr>
					<select name="yayineviID">
						<option>Seçim Yapın </option>
<?php 

$sql = "SELECT * FROM yayinevi order by sira asc";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    
    while($row = $result->fetch_assoc()) {
		?>

		<option <?php if($row['id'] == $yayineviID){ echo "selected"; } ?> value="<?php echo $row['id']; ?>"><?php echo $row['yayinevi']; ?></option>

		<?php
    }
}

?>
					</select>
				</div>
				<div class="clearfix"></div>
				<div class="col-md-4 offset-md-4">
				<br></br>
				<input type="hidden" value="<?php echo $ID; ?>"  name="duzenlenecek">
					<input type="submit"  name="duzenle" value="DÜZENLE">
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
