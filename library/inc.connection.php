<?php
# Konek ke Web Server Lokal
$myHost	= "localhost";
$myUser	= "root";
$myPass	= "";
$myDbs	= "perpustakaandb"; // nama database  

# Konek ke Web Server Lokal
$koneksidb	= mysql_connect($myHost, $myUser, $myPass);
if (! $koneksidb) {
  echo "Koneksi MySQL gagal, periksa Host/ User/ Password-nya  !";
}

# Memilih database pd MySQL Server
mysql_select_db($myDbs) or die ("Database <b>$myDbs</b> tidak ditemukan !");
?>