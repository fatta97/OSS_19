<?php
if(empty($_SESSION['id_user'])){
	$_SESSION['err'] = '<strong>ERROR!</strong> Anda harus login terlebih dahulu.';
	header('Location: ./');
	die();
} 
else {
	if(isset($_REQUEST['submit'])){
		$judul		= $_REQUEST['txtJudul'];
		$jenis		= $_REQUEST['txtJenis'];


		$sql = mysqli_query($koneksi, "INSERT INTO buku(judul,jenis,status)
				VALUES('$judul', '$jenis','1')");

		if($sql == true){
			header('Location: ./admin.php?hlm=buku2');
			die();
		} else {
			echo 'ERROR! Periksa penulisan querynya.';
		}
	} else {
?>
<h2>Tambah Buku</h2>
<hr>
<form method="post" action="" class="form-horizontal" role="form">

	<div class="form-group">
		<label for="a" class="col-sm-2 control-label">Judul</label>
		<div class="col-sm-3">
			<input type="text" class="form-control" name="txtJudul" placeholder="Masukan Judul Buku" required>
		</div>
	</div>
		
	<div class="form-group">
		<label for="a" class="col-sm-2 control-label">Jenis</label>
		<div class="col-sm-3">
			<input type="text" class="form-control" name="txtJenis" placeholder="Masukan Jenis" required>
		</div>
	</div>
	<div class="form-group">
		<div class="col-sm-offset-2 col-sm-10">
			<button type="submit" name="submit" class="btn btn-success">Simpan</button>
			<a href="./admin.php?hlm=buku2" class="btn btn-danger">Batal</a>
		</div>
	</div>
</form>
<?php
	}
}
?>
