<?php
    if( !empty( $_SESSION['id_user'] ) ){
    include "koneksi.php";
?>
<div id="main-wapper">
	<div  class="header">
	<nav class="navbar top-navbar navbar-expand-md navbar-light">
	
	<div class="navbar-header">
	<a class="navbar-brand" href="admin.php">
	<b><img src="images/usm.png" alt="homepage" class="dark-logo"  width="60" height="60"/></b>
	<b> Perpustakaan<b>
	</a>
	</div>
	</nav>
</div>

<div class="left-sidebar">
<div class="scrool-sidebar">
<nav class="sidebar-nav">
	<ul id="sidebarnav">
		<li class="nav-label">Menu</li>
		<li> <a href="./admin.php"><i class="fa fa-tachometer"></i>Beranda</a>
		<li> <a href="./admin.php?hlm=buku"><i class="fa fa-book"></i>Daftar Buku</a>
		<?php
        if( $_SESSION['level'] == 1 ){
        ?>
		<li> <a href="./admin.php?hlm=buku2"><i class="fa fa-book"></i>Tambah Buku</a>
			<?php
		}
		?>
		<li> <a href="./admin.php?hlm=pinjamBuku"><i class="fa fa-wpforms"></i>Pinjam Buku</a>
		<?php
        if( $_SESSION['level'] == 1 ){
        ?>
		<li> <a href="./admin.php?hlm=laporan" ><i class="fa fa-bell"></i>Laporan</a>
		<li> <a href="./admin.php?hlm=user" ><i class="ti-user"></i>Tambah Member</a>
		<?php
		}
		?>
		<li><a href="logout.php"><i class="fa fa-power-off"></i> Logout</a></li>
</ul>
</nav>
</div>
</div>
</div>
<?php
} else {
	header("Location: ./");
	die();
}
?>
