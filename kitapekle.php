<!DOCTYPE html>


<?php
require_once 'baglanti.php'; 
if(isset($_POST["ekle"]))
{
	
	$adi = $_POST["adi"];
	$alisfiyati = $_POST["alisfiyati"];
	$fiyati = $_POST["fiyati"];
	$satismiktari = 0;
	$turID = $_POST["turID"];
	$yayineviID = $_POST["yayineviID"];

	$sql = "INSERT INTO kitaplar (adi,alisfiyati,fiyati,satismiktari,turID,yayineviID) VALUES ('{$adi}','{$alisfiyati}','{$fiyati}','{$satismiktari}','{$turID}','{$yayineviID}')";

	if ($conn->query($sql) === TRUE) {
		echo '<script>';
		echo 'alert("Yeni Kitap Başarılı Bir Şekilde Eklendi");';
		echo 'window.location.href="kitaplar.php";';
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
        <h1 class="mt-4">Kitap Ekleme Paneli</h1>
		
		<form name="ekle" method="post" action="">
		<div class="row">
			

				<div class="col-md-12">
					<h3>Kitap Adı</h3></h3><hr></hr>
					<input type="text" name="adi" >
				</div>
				<div class="clearfix"></div>
				<div class="col-md-12">
					<h3>Alış Fiyatı</h3></h3><hr></hr>
					<input type="text" name="alisfiyati" >
				</div>
				<div class="clearfix"></div>
				<div class="col-md-12">
					<h3>Fiyatı</h3></h3><hr></hr>
					<input type="text" name="fiyati" >
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

		<option value="<?php echo $row['id']; ?>"><?php echo $row['tur']; ?></option>

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

		<option value="<?php echo $row['id']; ?>"><?php echo $row['yayinevi']; ?></option>

		<?php
    }
}

?>
					</select>
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
