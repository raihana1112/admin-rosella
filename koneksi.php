
<?php 
$koneksi = mysqli_connect("localhost","root","","rosella_aceh");
 
// Check connection
if (mysqli_connect_errno()){
	echo "Koneksi database gagal : " . mysqli_connect_error();
}
 
?>