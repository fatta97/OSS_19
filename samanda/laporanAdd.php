<?php

	if(empty($_SESSION['id_user'])){
		$_SESSION['err'] = '<strong>ERROR!</strong> Anda harus login terlebih dahulu.';
		header('Location: ./');
		die();
}
else{
	if(isset($_REQUEST['submit'])){
		$no_nota 		= $_REQUEST['no_nota'];
		$nama_pelanggan = $_REQUEST['txtPelanggan'];
		$nama_barang 	= $_REQUEST['nama_barang'];
		$biaya			= $_REQUEST['numBiaya'];
		$id_user 		= $_SESSION['id_user'];
		$id_barang		= $_REQUEST['id_barang'];
		$sql = mysqli_query($koneksi, "INSERT INTO transaksi(no_nota, 
								tanggal, nama_pelanggan,biaya, id_user, id_mobil)
										VALUES('$no_nota', now(), '$nama_pelanggan',
												'$nama_barang', '$biaya', '$id_user', '$id_barang')");
if($sql == true){
	header('Location: ./admin.php?hlm=transaksi');
die();
}

else{
		echo 'ERROR! Periksa penulisan querynya.';
}
}
else
{
?>
		<h2>Tambah Transaksi Baru</h2>
		<hr>
	<form method="post" action="" class="form-horizontal" role="form">
		<div class="form-group">
		<label for="no_nota" class="col-sm-2 control-label">No. Nota</label>
		<div class="col-sm-3">
<?php
	$sql = mysqli_query($koneksi, "SELECT no_nota FROM transaksi");
		echo '<input type="text" class="form-control" id="no_nota" value="';
			$no_nota = "SMD1";
				if(mysqli_num_rows($sql) == 0){
					echo $no_nota;
}
	$result = mysqli_num_rows($sql);
$counter = 0;

while(list($no_nota) = mysqli_fetch_array($sql)){
	if (++$counter == $result) {
	$no_nota++;
	echo $no_nota;
}
}
echo '"name="no_nota" placeholder="No. Nota" readonly>';
?>
</div>
</div>
<div class="form-group">
	<label for="merk" class="col-sm-2 control-label">Nama Barang</label>
	<div class="col-sm-3">
	<select name="cobMerk" class="form-control" required>
	<option value='+'>-- Pilih Barang --</option>";
<?php
$sql = mysqli_query($koneksi, "select*from barang");
while($data = mysqli_fetch_array($sql)){
echo "<option value='$data[id_barang]'>$data[nama_barang] - $data[tipe_barang]</option>";
}
?>
</select>
</div>
</div>
<div class="form-group">
	<label for="cutomer" class="col-sm-2 control-label">Nama Customer</label>
	<div class="col-sm-3">
	<input type="text" class="form-control" id="customer"
	name="txtPelanggan" placeholder="Nama pelanggan" required>
</div>
</div>

<div class="form-group">
<label for="biaya" class="col-sm-2 control-label">Harga</label>
<div class="col-sm-3">
<input type="number" class="form-control" id="numBiaya"
name="numBiaya" placeholder="Isi dengan angka" required>
</div>
</div>
<div class="form-group">
<div class="col-sm-offset-2 col-sm-10">
<button type="submit" name="submit" class="btn btnsuccess">Simpan</button>
<a href="./admin.php?hlm=transaksi" class="btn btn-danger">Batal</a>
</div>
</div>
</form>
<?php
}
}
?>
