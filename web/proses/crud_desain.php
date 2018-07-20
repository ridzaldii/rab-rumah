<?php 
	include "../connect.php";

	if (isset($_POST['submit'])) {
		$namadesain = $_POST['namadesain'];
		$deskripsi = $_POST['deskripsi'];

		$file		= time()."-".$_FILES['gambar']['name'];
		$filetmp 		= $_FILES['gambar']['tmp_name'];

		if(move_uploaded_file($filetmp, '../images/upload/'.$file)){
			$query 		= "INSERT INTO desain VALUES('', '$namadesain', '$deskripsi', '$file')";

			$result 	= $conn->query($query);
			if ($result) {
				echo "<script>
							alert('Berhasil');
							window.location='".$link."/pages/tambahdesain.php';
							</script>";
			}else{
				echo $conn->error;
				echo "error";
			}
		} else{
			echo "erroraaa";
		}
	} elseif (isset($_GET['hapus'])) {
		$query = "DELETE FROM desain WHERE id='".$_GET['hapus']."'";
		$set0		= "SET FOREIGN_KEY_CHECKS=0";
		$set1		= "SET FOREIGN_KEY_CHECKS=1";

		$conn->query($set0);
		$result 	= $conn->query($query);
		if ($result) {
			echo "<script>
						alert('Berhasil dihapus');
						window.location='".$link."/index.php';
						</script>";
			$conn->query($set1);
		}else{
			echo $conn->error;
			echo "error";
			$conn->query($set1);
		}
	} elseif (isset($_POST['update'])) {
		$id = $_POST['id'];
		$namadesain = $_POST['namadesain'];
		$deskripsi = $_POST['deskripsi'];

		$query 		= "UPDATE desain SET namadesain='$namadesain', deskripsi='$deskripsi' WHERE id='$id'";
		$result 	= $conn->query($query);

		if ($result) {
			echo "<script>
						alert('Berhasil Diperbaharui.');
						window.location='".$link."/index.php';
						</script>";
		}else{
			echo $conn->error;
			echo "error";
		}

		
	}
 ?>