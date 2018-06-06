<?php

if(empty($_SESSION['id_user'])){
	$_SESSION['err'] = '<strong>ERROR!</strong> Anda harus login terlebih dahulu.';
	header('Location: ./');
		die();
}
	else{
	if( isset( $_REQUEST['aksi'] )){
		$aksi = $_REQUEST['aksi'];
			switch($aksi){
				case 'add':
				include 'pinjamAdd.php';
				break;
}
}

else{
	echo '
		<div class="container">
			<h3 style="margin-bottom: -20px;">Pinjam Buku</h3>
			<a href="./admin.php?hlm=pinjamBuku&aksi=add" class="btn btn-success
			btn-s pull-right">Pinjam Buku</a>
			<br/><hr/>
			<table class="table table-bordered">

			<thead>
			<th width="20%">No</th>
			<th width="20%">Nama Peminjam</th>
			<th width="20%">Tanggal</th>
			<th width="20%">Judul Buku</th>
			<th width="20%">Jenis Buku</th>
</thead>
<tbody>';

//skrip untuk menampilkan data dari database
	$sql = mysqli_query($koneksi, "SELECT a.id_laporan,
		a.tanggal, a.nama_peminjam,b.judul,b.jenis FROM laporan a, buku b
		where a.id_buku=b.id_buku and a.id_user=$_SESSION[id_user]");
		
if(mysqli_num_rows($sql) > 0){
$no = 0;
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

else{
echo '<td colspan="8"><center><p class="add">Tidak ada data untuk
		ditampilkan. <u><a href="?hlm=pinjamBuku&aksi=add">Pinjam buku baru</a></u> </p></center></td></tr>';
}
echo '
</tbody>
</table>
</div>';
}
}
?>