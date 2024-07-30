<?php
		include '../../koneksi.php';

      $nama_produk = $_POST['nama_produk'];
      $keterangan = $_POST['keterangan'];
      $harga = $_POST['harga'];
			$ekstensi_diperbolehkan	= array('png','jpg', 'jpeg');
			$nama = $_FILES['file']['name'];
			$x = explode('.', $nama);
			$ekstensi = strtolower(end($x));
			$ukuran	= $_FILES['file']['size'];
			$file_tmp = $_FILES['file']['tmp_name'];

			if(in_array($ekstensi, $ekstensi_diperbolehkan) === true){
				if($ukuran < 5044070){
					move_uploaded_file($file_tmp, 'file/'.$nama);
					$query = mysqli_query($koneksi,"INSERT INTO produk(foto, nama_produk, keterangan, harga) VALUES('$nama', '$nama_produk', '$keterangan', '$harga')");
					if($query){
            echo
            "<script>
            alert('Data Berhasil Ditambahkan');
            document.location.href = '../tambah-produk.php';
            </script>
            ";
					}else{
						echo
            "<script>
            alert('Data Gagal Ditambahkan');
            document.location.href = '../tambah-produk.php';
            </script>
            ";
					}
				}else{
					echo
            "<script>
            alert('Ukuran File terlalu besar');
            document.location.href = '../tambah-produk.php';
            </script>
            ";
				}
			}else{
				echo
            "<script>
            alert('Ekstensi file yang diupload tidak diperbolehkan');
            document.location.href = '../tambah-produk.php';
            </script>
            ";
			}
		
		
?>
