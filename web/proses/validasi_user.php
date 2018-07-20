<?php
session_start();
include '../connect.php';
if (isset($_POST['submit'])) {
	$username = $_POST['uname'];
	$password = md5($_POST['pswd']);
	if ($username=='' || $password=='') {
		echo "<script>
					alert('Lengkapi Username dan Password');
					window.location='".$link."';
					</script>";
	}else {
		$query = "SELECT * FROM admin WHERE email = '$username'";
		$result = $conn->query($query);
		$db_data = $result->fetch_assoc();
		if ($password == $db_data['password']){
			echo "sukses";
		    // menyimpan username dan level ke dalam session
		    $_SESSION['login'] = 1;
		    $_SESSION['nama'] = $db_data['nama'];
		    $_SESSION['username'] = $db_data['username'];
		    $_SESSION['id_user'] = $db_data['id'];
		    header('location:'.$link);
		}else {
			echo "<script>
						alert('User Tidak Ditemukan');
						window.location='".$link."';
						</script>";
		}
	}
}elseif (isset($_GET['log'])) {
	session_destroy();
    header('location:'.$link);
}

?>