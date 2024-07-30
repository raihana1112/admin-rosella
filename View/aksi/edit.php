<?php
include '../../koneksi.php';
$id = $_GET['id'];
echo
"<script> var id = " . $id . "; </script>";

$nama_produk = $_POST['nama_produk'];
$keterangan = $_POST['keterangan'];
$harga = $_POST['harga'];
$tgl_inputan = date('Y m d, H:i:s');
$ekstensi_diperbolehkan  = array('png', 'jpg', 'jpeg');
$nama = $_FILES['file']['name'];
$x = explode('.', $nama);
$ekstensi = strtolower(end($x));
$ukuran  = $_FILES['file']['size'];
$file_tmp = $_FILES['file']['tmp_name'];

if ($nama != '') {
  if (in_array($ekstensi, $ekstensi_diperbolehkan) === true) {
    if ($ukuran < 5044070) {
      move_uploaded_file($file_tmp, 'file/' . $nama);
      $query = mysqli_query($koneksi, "UPDATE produk set foto='$nama', nama_produk='$nama_produk', keterangan='$keterangan', harga='$harga', tgl_inputan='$tgl_inputan' where id='$id'");
      if ($query) {

        echo
        "<script>      
            alert('Data Berhasil di Update');
            document.location.href = `../edit-produk.php?id=${id}`;
            </script>
            ";
      } else {
        echo
        "<script>      
            alert('Data Gagal di Update');
            document.location.href = `../edit-produk.php?id=${id}`;
            </script>
            ";
      }
    } else {
      echo
      "<script>    
            alert('Ukuran File terlalu besar');
            document.location.href = `../edit-produk.php?id=${id}`;
            </script>
            ";
    }
  } else {
    echo
    "<script>  
            alert('Ekstensi file yang diupload tidak diperbolehkan');
            document.location.href = `../edit-produk.php?id=${id}`;
            </script>
            ";
  }
} else {
  $query = mysqli_query($koneksi, "UPDATE produk set nama_produk='$nama_produk', keterangan='$keterangan', harga='$harga', tgl_inputan='$tgl_inputan' where id='$id'");
  if ($query) {

    echo
    "<script>      
            alert('Data Berhasil di Update');
            document.location.href = `../edit-produk.php?id=${id}`;
            </script>
            ";
  }
}


// if (in_array($ekstensi, $ekstensi_diperbolehkan) === true) {
//   if ($ukuran < 5044070) {
//     move_uploaded_file($file_tmp, 'file/' . $nama);
//     $query = mysqli_query($koneksi, "UPDATE produk set foto='$nama', nama_produk='$nama_produk', keterangan='$keterangan', harga='$harga', tgl_inputan='$tgl_inputan' where id='$id'");
//     if ($query) {

//       echo
//       "<script>      
//             alert('Data Berhasil di Update');
//             document.location.href = `../edit-produk.php?id=${id}`;
//             </script>
//             ";
//     } else {
//       echo
//       "<script>      
//             alert('Data Gagal di Update');
//             document.location.href = `../edit-produk.php?id=${id}`;
//             </script>
//             ";
//     }
//   } else {
//     echo
//     "<script>    
//             alert('Ukuran File terlalu besar');
//             document.location.href = `../edit-produk.php?id=${id}`;
//             </script>
//             ";
//   }
// } else {
//   echo
//   "<script>  
//             alert('Ekstensi file yang diupload tidak diperbolehkan');
//             document.location.href = `../edit-produk.php?id=${id}`;
//             </script>
//             ";
// }
