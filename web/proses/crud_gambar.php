<?php 

	include "../connect.php";

	if (isset($_POST['tambahgambar'])) {
		$iddesain = $_POST['iddesain'];
		$namadesain = $_POST['namaruangan'];
		$deskripsi = $_POST['deskripsi'];

		$file		= time()."-".$_FILES['gambar']['name'];
		$filetmp 		= $_FILES['gambar']['tmp_name'];

		if(move_uploaded_file($filetmp, '../images/upload/'.$file)){
			$query 		= "INSERT INTO gambar VALUES('', '$iddesain', '$namadesain', '$file', '$deskripsi')";

			$result 	= $conn->query($query);
			if ($result) {
				echo "<script>
							alert('Berhasil');
							window.location='".$link."/pages/gambardesain.php?id=$iddesain';
							</script>";
			}else{
				echo $conn->error;
				echo "error";
			}
		} else{
			echo "erroraaa";
		}
	} elseif (isset($_GET['hapusg'])) {
		$query = "DELETE FROM gambar WHERE id='".$_GET['hapusg']."'";
		$set0		= "SET FOREIGN_KEY_CHECKS=0";
		$set1		= "SET FOREIGN_KEY_CHECKS=1";

		$conn->query($set0);
		$result 	= $conn->query($query);
		if ($result) {
			echo "<script>
						alert('Berhasil dihapus');
						window.location='".$link."/pages/gambardesain.php?id=".$_GET['idd']."';
						</script>";
			$conn->query($set1);
		}else{
			echo $conn->error;
			echo "error";
			$conn->query($set1);
		}
	} elseif (isset($_POST['updatedetail'])) {
		$id = $_POST['id'];
		$iddesain = $_POST['iddesain'];
		$namadesain = $_POST['namaruangan'];
		$deskripsi = $_POST['deskripsi'];

		// if (isset($_POST['gambar'])){
			$file		= time()."-".$_FILES['gambar']['name'];
			$filetmp 		= $_FILES['gambar']['tmp_name'];

			if(move_uploaded_file($filetmp, '../images/upload/'.$file)){
				$query 		= "UPDATE gambar SET namaruangan='$namadesain', gambar='$file', deskripsi='$deskripsi' WHERE id=$id";

				$result 	= $conn->query($query);
				if ($result) {
					echo "<script>
								alert('Berhasil');
								window.location='".$link."/pages/gambardesain.php?id=$iddesain';
								</script>";
				}else{
					echo $conn->error;
					echo "error";
				}
			} else{
				$query 		= "UPDATE gambar SET namaruangan='$namadesain', deskripsi='$deskripsi' WHERE id=$id";

				$result 	= $conn->query($query);
				if ($result) {
					echo "<script>
								alert('Berhasil');
								window.location='".$link."/pages/gambardesain.php?id=$iddesain';
								</script>";
				}else{
					echo $conn->error;
					echo "error";
				}
				echo "erroraaa";
			}
		// } else {
		// 	$query 		= "UPDATE gambar SET namaruangan='$namadesain', deskripsi='$deskripsi' WHERE id=$id";

		// 	$result 	= $conn->query($query);
		// 	if ($result) {
		// 		echo "<script>
		// 					alert('Berhasil');
		// 					window.location='".$link."/pages/gambardesain.php?id=$iddesain';
		// 					</script>";
		// 	}else{
		// 		echo $conn->error;
		// 		echo "error";
		// 	}
		// }
	}

 ?>