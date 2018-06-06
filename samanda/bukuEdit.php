<?php
if(empty( $_SESSION['id_user'])){
	$_SESSION['err'] = '<strong>ERROR!</strong> Anda harus login terlebih dahulu.';
	header('Location: ./');
	die();
} 
else {
	if(isset($_REQUEST['submit'])){
		$id_buku	= $_REQUEST['id_buku'];
		$judul		= $_REQUEST['txtJudul'];
		$jenis		= $_REQUEST['txtJenis'];
		$sql = mysqli_query($koneksi, "UPDATE buku SET judul='$judul', jenis='$jenis'
										WHERE id_buku='$id_buku'");

		if($sql == true){
			header('Location: ./admin.php?hlm=buku2');
			die();
		} else {
			echo 'ERROR! Periksa penulisan querynya.';
		}
	} 
	else {
		$id_buku = $_REQUEST['id_buku'];
		$sql = mysqli_query($koneksi, "SELECT * FROM buku WHERE id_buku='$id_buku'");
		while($row = mysqli_fetch_array($sql)){

?>
<div class="container-fluid"> 
                <div class="row">
                    <div class="col-lg-6">
                        <div class="card">
                            <div class="card-title">
                                <h4>Edit Buku</h4>

                            </div>
                            <div class="card-body">
                                <div class="basic-form">
                                    <form method="post" action="" class="form-horizontal" role="form">
									<div class="form-group">
                                            <input type="hidden" class="form-control input-rounded" name="id_buku" value="<?php echo $row['id_buku'];?>">
                                        </div>
									<div class="form-group">
                                            <input type="text" class="form-control input-rounded" id="judul"  value="<?php echo $row['judul'];?>" name="txtJudul" placeholder="Judul Buku" required>
                                        </div>
                                       <div class="form-group">
                                            <input type="text" class="form-control input-rounded" id="jenis"  value="<?php echo $row['jenis'];?>" name="txtJenis" placeholder="Jenis Buku" required>
                                        </div>
										<div class="form-group">
									<div class="col-sm-offset-2 col-sm-10">
											<button type="submit" name="submit" class="btn btnsuccess">Update</button>
											<a href="./admin.php?hlm=buku2" class="btn btn-danger">Batal</a>
</div>
</div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
</div>
</div>
<?php
    }
	}
}
?>
