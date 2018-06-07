<?php

if(empty($_SESSION['id_user'])){
$_SESSION['err'] = '<strong>ERROR!</strong> Anda harus login
terlebih dahulu.';
header('Location: ./');
die();
}

else{
	if(isset($_REQUEST['submit'])){
		$nama_peminjam = $_REQUEST['txtPeminjam'];
		$id_user = $_SESSION['id_user'];
		$id_buku = $_REQUEST['id_buku'];
		
$sql = mysqli_query($koneksi, "INSERT INTO
		laporan(nama_peminjam, tanggal, 
		id_buku, id_user)
		VALUES('$nama_peminjam', now(),
		'$id_buku', '$id_user')");
		
if($sql == true){
header('Location: admin.php?hlm=pinjamBuku');
die();
}

else{
echo 'ERROR! Periksa penulisan querynya.';
}
}
?>

		<h2>Pinjam Buku</h2>
<hr>
		<form method="post" action="" class="form-horizontal" role="form">
		<div class="form-group">
		<label for="merk" class="col-sm-2 control-label">Pilih Buku</label>
		<div class="col-sm-3">
<select name="id_buku" class="form-control" required>
<option value='+'>-- Pilih judul Buku --</option>";
<?php
$sql = mysqli_query($koneksi, "select*from buku");
while($data = mysqli_fetch_array($sql)){
echo "<option value='$data[id_buku]'>$data[judul] - $data[jenis]</option>";
}
?>
</select>
</div>
</div>
<div class="form-group">
<label for="nama_peminjam" class="col-sm-2 control-label">Nama Peminjam</label>
<div class="col-sm-3">
<input type="text" class="form-control" id="nama_peminjam"
name="txtPeminjam" placeholder="Nama Peminjam" required>
</div>
<div class="form-group">
<div class="col-sm-offset-2 col-sm-10">
<button type="submit" name="submit" class="btn btnsuccess">Simpan</button>
<a href="./admin.php?hlm=pinjamBuku" class="btn btn-danger">Batal</a>
</div>
</div>
</form>
<?php
}
?>