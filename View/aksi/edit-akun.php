
<?php 
// koneksi database
include '../../koneksi.php';
$id = $_GET['id'];
// menangkap data yang di kirim dari form
$nama = $_GET['nama'];
$username = $_GET['username'];
$password = $_GET['password'];

// update data ke database
mysqli_query($koneksi,"update user set nama='$nama',username='$username',password='$password' where id='$id'");
 
// mengalihkan halaman kembali ke index.php
  echo
  "<script>
  alert('Data Berhasil Terupdate');
  document.location.href = '../settings.php';
  </script>
  ";
 
?>