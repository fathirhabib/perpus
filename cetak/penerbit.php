<?php
session_start();
include_once "../library/inc.seslogin.php";
include_once "../library/inc.connection.php";
include_once "../library/inc.library.php";
?>
<html>
<head>
<title>:: Laporan Data Penerbit</title>
<link href="../styles/styles_cetak.css" rel="stylesheet" type="text/css">
</head>
<body>
<h2>LAPORAN DATA PENERBIT </h2>
<table class="table-list" width="800" border="0" cellspacing="1" cellpadding="2">
  <tr>
    <td width="30" align="center" bgcolor="#F5F5F5"><strong>No</strong></td>
    <td width="66" bgcolor="#F5F5F5"><strong>Kode</strong></td>
    <td width="567" bgcolor="#F5F5F5"><strong>Nama Penerbit </strong></td>
    <td width="116" align="right" bgcolor="#F5F5F5"><strong>Jumlah Buku </strong></td>
  </tr>
  <?php
	// Skrip menampilkan data Penerbit dari database
	$mySql 	= "SELECT * FROM penerbit ORDER BY kd_penerbit";
	$myQry 	= mysql_query($mySql, $koneksidb)  or die ("Query salah 1 : ".mysql_error());
	$nomor  = 0; 
	while ($myData = mysql_fetch_array($myQry)) {
		$nomor++;
		$Kode	= $myData['kd_penerbit'];
		
		// Melihat jumlah buku yang tersedia 
		$my2Sql 	= "SELECT COUNT(*) As jumlah FROM buku WHERE kd_penerbit = '$Kode'";
		$my2Qry	= mysql_query($my2Sql, $koneksidb)  or die ("Query salah 2 : ".mysql_error());
		$my2Data= mysql_fetch_array($my2Qry);
	?>
  <tr>
    <td align="center"><?php echo $nomor; ?></td>
    <td><?php echo $myData['kd_penerbit']; ?></td>
    <td><?php echo $myData['nm_penerbit']; ?></td>
    <td align="right"><?php echo format_angka($my2Data['jumlah']); ?></td>
  </tr>
  <?php } ?>
</table>
<img src="../images/btn_print.png" height="20" onClick="javascript:window.print()" />
</body>
</html>