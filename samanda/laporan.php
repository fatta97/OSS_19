<?php

if(empty($_SESSION['id_user'])){
$_SESSION['err'] = '<strong>ERROR!</strong> Anda harus login
terlebih dahulu.';
header('Location: ./');
die();
}

else{
		if(isset($_REQUEST['submit'])){
		$submit = $_REQUEST['submit'];
		$tgl1 = $_REQUEST['tgl1'];
		$tgl2 = $_REQUEST['tgl2'];
		$sql = mysqli_query($koneksi, "select a.nama_peminjam, a.tanggal,
						b.judul, b.jenis from laporan a, buku b where
						a.id_buku=b.id_buku and a.tanggal BETWEEN '$tgl1' AND '$tgl2'");
						
						
if(mysqli_num_rows($sql) > 0){
$no = 0;
echo '<h2>Rekap Laporan Pendapatan <small>
		'.$tgl1.' sampai '.$tgl2.'</small></h2><hr>
		
<div class="col-sm-1">
<a href="?hlm=laporan" id="tombol" class="btn btn-info pullleft">
<span class="glyphicon glyphicon-chevron-left" ariahidden="true">
</span> Kembali</a><br/><br/><br/>
<button id="tombol" onclick="window.print()" class="btn btnwarning">
<span class="glyphicon glyphicon-print" ariahidden="true"></span> Cetak</button>
</div>


<div class="col-sm-11">
	<table class="table table-bordered">
		<thead>
		<tr class="info">
		<th width="5%">No</th>
		<th width="20%">Nama Peminjam</th>
		<th width="10%">Tanggal</th>
		<th width="15%">Judul Buku</th>
		<th width="10%">Jenis Buku</th>
		</tr>
	</thead>
<tbody>';

while($row = mysqli_fetch_array($sql)){
$no++;
echo '
		<tr>
			<td>'.$no.'</td>
			<td>'.$row['nama_peminjam'].'</td>
			<td>'.date("d M Y", strtotime($row['tanggal'])).'</td>
			<td>'.$row['judul'].'</td>
			<td>'.$row['jenis'].'</td>';
} 
}

echo '
</tbody>
</table>

	<div class="col-sm-6"><table class="table table-bordered">';
		echo '<tr class="info"><th><h4>Jumlah Data</h4></th></tr>';
		
$sql = mysqli_query($koneksi, "SELECT count(nama_peminjam)
				FROM laporan WHERE tanggal BETWEEN '$tgl1' AND '$tgl2'");
				
list($nama) = mysqli_fetch_array($sql);{
echo '<tr><td><span class="pull-right"><h4><b>'.$nama.'
data</b></h4></span></td></tr>'
; }
echo '
</table>
</div>
</div>
</div>
</div>';
}

else{
	echo '<h2>Data Peminjam (<small>
					'.date('d-m-Y').'</small>)</h2><hr>';
?>

<div class="well well-sm noprint">
	<form class="form-inline" role="form" method="post" action="">
<div class="form-group">
	<label class="sr-only" for="tgl1">Mulai</label>
	<input type="date" class="form-control" id="tgl1" name="tgl1"required>
</div>
<div class="form-group">
	<label class="sr-only" for="tgl2">Hingga</label>
	<input type="date" class="form-control" id="tgl2" name="tgl2"required>
</div>
	<button type="submit" name="submit" class="btn btnsuccess">Tampilkan</button>
</form>
</div>

<?php
} }
?>