<?php
if(empty($_SESSION['id_user'])){
	$_SESSION['err'] = '<strong>ERROR!</strong> Anda harus login terlebih dahulu.';
	header('Location: ./');
	die();
} 
else{
if(isset($_REQUEST['submit'])){
    $idJur = $_REQUEST['idJur'];
    $sql = mysqli_query($koneksi, "DELETE FROM jurusan WHERE idJur='$idJur'");
		if($sql == true){
			header("Location: ./admin.php?hlm=jurusan");
			die();
		}
    }
}
?>
