<?php
if(empty( $_SESSION['id_user'])){
	$_SESSION['err'] = '<strong>ERROR!</strong> Anda harus login terlebih dahulu.';
	header('Location: ./');
	die();
} 
else {
	if(isset($_REQUEST['submit'])){
        $idJur = $_REQUEST['idJur'];
		$kodeJur = $_REQUEST['textKode'];
		$namaJur = $_REQUEST['textNama'];

		$sql = mysqli_query($koneksi, "UPDATE jurusan SET kodeJur='$kodeJur', namaJur='$namaJur' WHERE idJur='$idJur'");

		if($sql == true){
			header('Location: ./admin.php?hlm=jurusan');
			die();
		} else {
			echo 'ERROR! Periksa penulisan querynya.';
		}
	} 
	else {
		$idJur = $_REQUEST['idJur'];
		$sql = mysqli_query($koneksi, "SELECT * FROM jurusan WHERE idJur='$idJur'");
		while($row = mysqli_fetch_array($sql)){

?>

<h2>Edit Jurusan</h2>
<hr>

<form method="post" action="" class="form-horizontal" role="form">
	<div class="form-group">
        <input type="hidden" name="idJur" value="<?php echo $row['idJur']; ?>">
		<label for="username" class="col-sm-2 control-label">Kode Jurusan</label>
		<div class="col-sm-3">
			<input type="text" class="form-control" value="<?php echo $row['kodeJur']; ?>" name="textKode">
		</div>
	</div>
	<div class="form-group">
		<label for="nama" class="col-sm-2 control-label">Nama Jurusan</label>
		<div class="col-sm-4">
			<input type="text" class="form-control"  value="<?php echo $row['namaJur']; ?>"name="textNama">
		</div>
	</div>
	<div class="form-group">
		<div class="col-sm-offset-2 col-sm-10">
			<button type="submit" name="submit" class="btn btn-success">Simpan</button>
			<a href="./admin.php?hlm=jurusan" class="btn btn-danger">Batal</a>
		</div>
	</div>
</form>
<?php
    }
	}
}
?>
