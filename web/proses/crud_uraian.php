<?php 
	include "../connect.php";

	if (isset($_POST['submit'])) {
		$idjenis = $_POST['idjenis'];
		$pekerjaan = $_POST['pekerjaan'];
		$volume = $_POST['volume'];
		$satuan = $_POST['satuan'];
		$iddesain = $_POST['iddesain'];

		$query 		= "INSERT INTO uraian_pekerjaan VALUES('', '$iddesain', '$pekerjaan', '$volume','$satuan','$idjenis')";

		$result 	= $conn->query($query);
		if ($result) {
			echo "<script>
						alert('Berhasil');
						window.location='".$link."/pages/detaildesain.php?id=".$iddesain."';
						</script>";
		}else{
			echo $conn->error;
			echo "error";
		}
	} elseif (isset($_GET['hapus'])) {
		$query = "DELETE FROM uraian_pekerjaan WHERE id='".$_GET['hapus']."'";
		$result 	= $conn->query($query);
		if ($result) {
			echo "<script>
						alert('Berhasil dihapus');
						window.location='".$link."/pages/detaildesain.php?id=".$_GET['idd']."';
						</script>";
		}else{
			echo $conn->error;
			echo "error";
		}
	} elseif (isset($_POST['update'])) {
		$id = $_POST['id'];
		$idjenis = $_POST['idjenis'];
		$pekerjaan = $_POST['pekerjaan'];
		$volume = $_POST['volume'];
		$satuan = $_POST['satuan'];
		$iddesain = $_POST['iddesain'];

		$query 		= "UPDATE uraian_pekerjaan SET pekerjaan='$pekerjaan', volume='$volume', satuan='$satuan' WHERE id='$id'";
		$result 	= $conn->query($query);

		if ($result) {
			echo "<script>
						alert('Berhasil Diperbaharui.');
						window.location='".$link."/pages/detaildesain.php?id=".$iddesain."';
						</script>";
		}else{
			echo $conn->error;
			echo "error";
		}

		
	}
 ?>