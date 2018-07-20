<?php 
	include "../connect.php";

	if (isset($_POST['submit'])) {
		$jenispekerjaan = $_POST['jenispekerjaan'];

		$query 		= "INSERT INTO jenis_pekerjaan VALUES('', '$jenispekerjaan')";

		$result 	= $conn->query($query);
		if ($result) {
			echo "<script>
						alert('Berhasil');
						window.location='".$link."/pages/jenispekerjaan.php';
						</script>";
		}else{
			echo $conn->error;
			echo "error";
		}
	} elseif (isset($_GET['hapus'])) {
		$query = "DELETE FROM jenis_pekerjaan WHERE id='".$_GET['hapus']."'";
		$set0		= "SET FOREIGN_KEY_CHECKS=0";
		$set1		= "SET FOREIGN_KEY_CHECKS=1";

		$conn->query($set0);
		$result 	= $conn->query($query);
		if ($result) {
			echo "<script>
						alert('Berhasil dihapus');
						window.location='".$link."/pages/jenispekerjaan.php';
						</script>";
			$conn->query($set1);
		}else{
			echo $conn->error;
			echo "error";
			$conn->query($set1);
		}
	} elseif (isset($_POST['update'])) {
		$id = $_POST['id'];
		$jenispekerjaan = $_POST['jenispekerjaan'];

		$query 		= "UPDATE jenis_pekerjaan SET jenispekerjaan='$jenispekerjaan' WHERE id='$id'";
		$result 	= $conn->query($query);

		if ($result) {
			echo "<script>
						alert('Berhasil Diperbaharui.');
						window.location='".$link."/pages/jenispekerjaan.php';
						</script>";
		}else{
			echo $conn->error;
			echo "error";
		}

		
	}
 ?>