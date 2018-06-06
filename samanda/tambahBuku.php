<html>
<body>
<div id="main-wrapper">
<div id="page-wrapper">
<div class="container-fluid">
<div class="row">
<?php
if( empty( $_SESSION['id_user'] ) ){
	$_SESSION['err'] = '<strong>ERROR!</strong> Anda harus login terlebih dahulu.';
	header('Location: ./');
	die();
} 
else {
	if(isset( $_REQUEST['aksi'])){
		$aksi = $_REQUEST['aksi'];
		switch($aksi){
			case 'add':
				include 'bukuAdd.php';
				break;
			case 'edit':
				include 'bukuEdit.php';
				break;
			case 'delete':
				include 'bukuDelete.php';
				break;
		}
	} 
	else {
		echo '
		
			<div class="col-lg-6">
                        <div class="card">
                            <div class="card-title">
                                <h4>Tambah Data </h4>
								<a href="./admin.php?hlm=buku&aksi=add" class="btn btn-success btn-s pull-right">Tambah Buku</a><br>

                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th width="10%">No</th>
                                                <th width="400%">Buku</th>
                                                <th width="10%">Kategori</th>
                                                <th	width="10%">Status</th>
                                                <th	width="300%">Aksi</th>
                                            </tr>
                                        </thead>
<tbody>';

			//skrip untuk menampilkan data dari database
		 	$sql = mysqli_query($koneksi, "SELECT * FROM buku ");
		 	if(mysqli_num_rows($sql) > 0){
		 		$no = 0;
				
				 while($row = mysqli_fetch_array($sql)){
	 				$no++;
	 			echo '
				
				   <tr>
						<td>'.$no.'</td>
						<td>'.$row['judul'].'</td>
						<td>'.$row['jenis'].'</td>
				<td>';
						if($row['status'] == 1){
							echo 'Tersedia';
							}
							else{
							echo 'Disewa';
}
						echo'</td>
				<td>

					<script type="text/javascript" language="JavaScript">
					  	function konfirmasi(){
						  	tanya = confirm("Anda yakin akan menghapus Mobil ini?");
						  	if (tanya == true) return true;
						  	else return false;
						}
					</script>

					 <a href="?hlm=buku2&aksi=edit&id_buku='.$row['id_buku'].'" class="btn btn-warning btn-s">Edit</a></br>
					 <a href="?hlm=buku2&aksi=delete&submit=yes&id_buku='.$row['id_buku'].'" onclick="return konfirmasi()" class="btn btn-danger btn-s">Hapus</a>
					 </td>';
				}
			} else {
				 echo '<td colspan="8"><center><p class="add">Tidak ada data untuk ditampilkan. <u><a href="?hlm=mobil&aksi=add">Tambah Mobil baru</a></u> </p></center></td></tr>';
			}
			echo '
			 	</tbody>
			</table>
			</div>
		</div>';
	}
}
?>
</div>
</div>
</div>
</div>
    <script src="js/lib/jquery/jquery.min.js"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="js/lib/bootstrap/js/popper.min.js"></script>
    <script src="js/lib/bootstrap/js/bootstrap.min.js"></script>
    <!-- slimscrollbar scrollbar JavaScript -->
    <script src="js/jquery.slimscroll.js"></script>
    <!--Menu sidebar -->
    <script src="js/sidebarmenu.js"></script>
    <!--stickey kit -->
    <script src="js/lib/sticky-kit-master/dist/sticky-kit.min.js"></script>
    <!--Custom JavaScript -->
    <script src="js/custom.min.js"></script>
</body>
</html>