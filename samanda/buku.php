<html>
<div id="main-wrapper">
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
			<div class="container-fluid">
                <!-- Start Page Content -->
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Daftar Buku</h4>
                               <div class="table-responsive m-t-40">
                                    <table id="example23" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Buku</th>
                                                <th>Kategori</th>
                                                <th>Status</th>
                                            </tr>
                                        </thead>
				 <tbody>';

			//skrip untuk menampilkan data dari database
		 	$sql = mysqli_query($koneksi, "SELECT id_buku, judul, jenis,status FROM buku");
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
							echo 'Dipinjam';
						}
						echo'</td>
					 </td>';
				}
			} else {
				 echo '<td colspan="8"><center><p class="add">Tidak ada data untuk ditampilkan. <u><a href="?hlm=buku&aksi=add">Tambah Buku</a></u> </p></center></td></tr>';
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


    <script src="js/lib/datatables/datatables.min.js"></script>
    <script src="js/lib/datatables/cdn.datatables.net/buttons/1.2.2/js/dataTables.buttons.min.js"></script>
    <script src="js/lib/datatables/cdn.datatables.net/buttons/1.2.2/js/buttons.flash.min.js"></script>
    <script src="js/lib/datatables/cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js"></script>
    <script src="js/lib/datatables/cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/pdfmake.min.js"></script>
    <script src="js/lib/datatables/cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/vfs_fonts.js"></script>
    <script src="js/lib/datatables/cdn.datatables.net/buttons/1.2.2/js/buttons.html5.min.js"></script>
    <script src="js/lib/datatables/cdn.datatables.net/buttons/1.2.2/js/buttons.print.min.js"></script>
    <script src="js/lib/datatables/datatables-init.js"></script>
</html>