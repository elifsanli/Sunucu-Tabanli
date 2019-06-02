<!DOCTYPE html>


<?php
require_once 'baglanti.php'; 
if(isset($_POST["ekle"]))
{
	
	$musteriID = $_POST["musteriID"];
	$kitapIDs = $_POST["kitapID"];
	
	

	
	
	
	foreach($kitapIDs as $data)
	{		
		$sqld = "SELECT * FROM kitapmus where musteriID='{$musteriID}' and kitapID='{$data}'";
		$resultd = $conn->query($sqld);

		if ($resultd->num_rows > 0) {
			
			while($rowd = $resultd->fetch_assoc()) {


				   $sqlsil = "DELETE FROM kitapmus WHERE musteriID = '{$musteriID}' and kitapID='{$data}'";
				   mysqli_query($conn, $sqlsil);

			}
		}
		
		
		$sql = "INSERT INTO kitapmus (musteriID,kitapID) VALUES ('{$musteriID}', '{$data}')";
		$conn->query($sql);
		
		
		$sqlmiktarsay = "SELECT * FROM kitaplar where id='{$data}'";
		$resultmiktarsay = $conn->query($sqlmiktarsay);

		if ($resultmiktarsay->num_rows > 0) {
			
			while($rowmiktarsay = $resultmiktarsay->fetch_assoc()) {

$satismiktari = $rowmiktarsay["satismiktari"];
$satismiktari++;
				   $sqlSatisMiktari = "UPDATE kitaplar SET satismiktari='{$satismiktari}' WHERE id='{$data}'";
				   mysqli_query($conn, $sqlSatisMiktari);
				   

			}
		}
		
		$sqlsum = "SELECT SUM(satismiktari) AS miktar FROM kitaplar";
		$resultsum = $conn->query($sqlsum);

		if ($resultsum->num_rows > 0) {
			
			while($rowsum = $resultsum->fetch_assoc()) {
$satismiktaritotal = $rowsum['miktar'];
			}
		}
		
		
		$sqlkar = "SELECT * FROM kitaplar where id='{$data}'";
		$resultkar = $conn->query($sqlkar);

		if ($resultkar->num_rows > 0) {
			
			while($rowkar = $resultkar->fetch_assoc()) {

$kar = $rowkar["fiyati"]-$rowkar["alisfiyati"];
				   $sqlkartablosu = "INSERT INTO kar (kar,miktar) VALUES ('{$kar}', '{$satismiktaritotal}')";
				   mysqli_query($conn, $sqlkartablosu);
				   

			}
		}
		
		
		
		
	}
	

		echo '<script>';
		echo 'alert("Yeni Satış Başarılı Bir Şekilde Eklendi");';
		echo 'window.location.href="musterikitap.php";';
		echo '</script>';
		

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
        <a href="musteriler.php" class="list-group-item list-group-item-action bg-light">Müşteriler</a>
		<a href="musterikitap.php" class="list-group-item list-group-item-action bg-light active">Satılan Kitaplar</a>
		<a href="kargrafik.php" class="list-group-item list-group-item-action bg-light">Adet-Kar Grafiği</a>
		<a href="toplamkargrafik.php" class="list-group-item list-group-item-action bg-light">Toplam Kar-Toplam Adet Grafiği</a>
		<a href="turgrafik.php" class="list-group-item list-group-item-action bg-light">En Çok Satılan Kitap Türleri</a>
      </div>
    </div>
    

    
    <div id="page-content-wrapper">



      <div class="container-fluid">
        <h1 class="mt-4">Kitap Satışı Ekleme Paneli</h1>
		
		<form name="ekle" method="post" action="">
		<div class="row">
			
				<div class="col-md-5">
					<h3>Müşteri Seçimi</h3><hr></hr>
					<select name="musteriID">
						<option>Seçim Yapın </option>
<?php 

$sql = "SELECT * FROM musteriler";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    
    while($row = $result->fetch_assoc()) {
		?>

		<option value="<?php echo $row['id']; ?>"><?php echo $row['ad']; ?></option>

		<?php
    }
}

?>
					</select>
				</div>
				<div class="col-md-7">
					<h3>Kitap Seçimi</h3></h3><hr></hr>
<?php 

$sql = "SELECT * FROM kitaplar";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    
    while($row = $result->fetch_assoc()) {
		?>

		<input name="kitapID[]" type="checkbox" value="<?php echo $row['id']; ?>" />&nbsp;<?php echo $row['adi']; ?> <hr></hr>
		<?php
    }
}

?>
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
