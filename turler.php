<!DOCTYPE html>
<?php
require_once 'baglanti.php'; ?>
<?php

if(isset($_GET["sil"]))
{
	$silinecekID = $_GET["sil"];
   $sql = "DELETE FROM turler WHERE id = '{$silinecekID}'";
   
   if (mysqli_query($conn, $sql)) {
      $mesaj = "Veri Tablodan Başarılı Bir Şekilde Silindi.";
		echo '<script>';
		echo 'alert("'.$mesaj.'");';
		echo 'window.location.href="turler.php";';
		echo '</script>';
   } else {
      $mesaj = "Silme Hatası: ".mysqli_error($conn);
		echo '<script>';
		echo 'alert("'.$mesaj.'");';
		echo 'window.location.href="turler.php";';
		echo '</script>';
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
        <h1 class="mt-4">Kitap Türleri Yönetim Paneli </h1><a href="turekle.php" class="pull-right">Yeni Tür Ekle</a>
		<div class="row">
		<table class="table">
			<thead>
				<tr>
					<th>Sıra</th>
					<th>Tür Adı</th>
					<th>İşlemler</th>
				</tr>
			</thead>
			<tbody>
				
				
<?php 

$sql = "SELECT * FROM turler order by sira asc";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    
    while($row = $result->fetch_assoc()) {
		?>
		<tr>
		<td><?php echo $row['sira']; ?></td>
		<td><?php echo $row['tur']; ?></td>
					<td>
						<a href="turler.php?sil=<?php echo $row['id']; ?>"> <i class="fa fa-eraser"></i> Sil</a>
						<a href="turduzenle.php?duzenle=<?php echo $row['id']; ?>"> <i class="fa fa-edit"></i> Düzenle</a>
					</td>
					</tr>
		<?php
        //echo "id: " . $row["id"]. " - Name: " . $row["firstname"]. " " . $row["lastname"]. "<br>";
    }
} else {
    echo "0 results";
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
