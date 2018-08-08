<?php 
	include "../connect.php";

	if (isset($_GET['submit'])) {
		$id_des = $_GET['submit'];
		$ket = $_GET['ket'];
		$sat = $_GET['sat'];
		$vol = $_GET['vol'];
		$hrg = $_GET['bia'];

		$query 		= "INSERT INTO sub_pekerjaan VALUES('', '$id_des', '$ket', '$sat', '$vol', '$hrg')";

		$result 	= $conn->query($query);
		if ($result) {
			echo "<script>
						alert('Berhasil');
						window.location='".$link."/pages/detaildesain.php?id=".$_GET['idd']."';
						</script>";
		}else{
			echo $conn->error;
			echo "error";
		}
	} elseif (isset($_GET['hapus'])) {
		$query = "DELETE FROM sub_pekerjaan WHERE id=".$_GET['hapus'];
		$set0		= "SET FOREIGN_KEY_CHECKS=0";
		$set1		= "SET FOREIGN_KEY_CHECKS=1";

		// $conn->query($set0);
		$result 	= $conn->query($query);
		if ($result) {
			echo "<script>
						alert('Berhasil dihapus');
						window.location='".$link."/pages/detaildesain.php?id=".$_GET['idd']."';
						</script>";
			// $conn->query($set1);
		}else{
			echo $conn->error;
			echo "error";
			// $conn->query($set1);
		}
	} elseif (isset($_POST['update'])) {
		$id_des = $_POST['idd'];
		$id = $_POST['id'];
		$ket = $_POST['ket'];
		$sat = $_POST['satuan'];
		$vol = $_POST['volume'];
		$hrg = $_POST['biaya'];

		$query 		= "UPDATE sub_pekerjaan SET keterangan='$ket', satuan='$sat', volume='$vol', biaya='$hrg' WHERE id='$id'";
		$result 	= $conn->query($query);

		if ($result) {
			echo "<script>
						alert('Berhasil Diperbaharui.');
						window.location='".$link."/pages/detaildesain.php?id=".$id_des."';
						</script>";
		}else{
			echo $conn->error;
			echo "error";
		}

		
	}  
 ?>