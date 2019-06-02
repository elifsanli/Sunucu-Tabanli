<!DOCTYPE html>
<?php
require_once 'baglanti.php'; ?>
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
        <h1 class="mt-4">Müşteri Yönetim Paneli </h1><a href="musterikitapekle.php" class="pull-right">Yeni Satış Ekle</a>
		<div class="row">
		<table class="table">
			<thead>
				<tr>
					<th>Müşteri</th>
					<th>Kitap</th>
				</tr>
			</thead>
			<tbody>
				
				
<?php 

$sql = "SELECT * FROM kitapmus";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    
    while($row = $result->fetch_assoc()) {
		?>
<?php
$musteriID = $row['musteriID'];
$sql2 = "SELECT * FROM musteriler where id='{$musteriID}'";
$result2 = $conn->query($sql2);

if ($result2->num_rows > 0) {
    
    while($row2 = $result2->fetch_assoc()) {

		$musteriad = $row2['ad']; 

    }
} else {
    $tur = "0 results";
}
			

 ?>
 <?php
$kitapID = $row['kitapID'];
$sql2 = "SELECT * FROM kitaplar where id='{$kitapID}'";
$result2 = $conn->query($sql2);

if ($result2->num_rows > 0) {
    
    while($row2 = $result2->fetch_assoc()) {

		$kitapadi = $row2['adi']; 

    }
} else {
    $tur = "0 results";
}
			

 ?>
		<tr>
		<td><?php echo $musteriad; ?></td>
		<td><?php echo $kitapadi; ?></td>
					</tr>
		<?php
    }
} else {
    echo "";
}

?>
				

				
			</tbody>
			<tfoot>
			
			</tfoot>
		</table>
		</div>

      </div>
    </div>
    

  </div>
  

  
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  

</body>

</html>
