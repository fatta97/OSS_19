<?php
    //memulai session
    session_start();
    //jika ada session, maka akan diarahkan ke halaman dashboard admin
    if(isset($_SESSION['id_user'])){
        //mengarahkan ke halaman dashboard admin
        header("Location:./admin.php");
        die();
    }
    //mengincludekan koneksi database
    include "koneksi.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="Samanda Motor" content="">
    <meta name="Fatta Wijaya" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="images/usm.png">
    <title>Perpustakaan Usm</title>
    <!-- Bootstrap Core CSS -->
    <link href="css/lib/bootstrap/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="css/helper.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:** -->
    <!--[if lt IE 9]>
    <script src="https:**oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https:**oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
</head>

<body class="fix-header fix-sidebar">
    <!-- Preloader - style you can find in spinners.css -->
    <div class="preloader">
        <svg class="circular" viewBox="25 25 50 50">
			<circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10" /> </svg>
    </div>
    <!-- Main wrapper  -->
    <div id="main-wrapper">
	<?php
    //apabila tombol login di klik akan menjalankan skript dibawah ini
	if( isset( $_REQUEST['login'] ) ){
        //mendeklarasikan data yang akan dimasukkan ke dalam database
		$username = $_REQUEST['username'];
		$password = $_REQUEST['password'];
        //skript query ke insert data ke dalam database
		$sql = mysqli_query($koneksi, "SELECT id_user, username, nama, level FROM user WHERE username='$username' AND password=MD5('$password')");
        //jika skript query benar maka akan membuat session
		if( $sql){
			list($id_user, $username, $nama, $level) = mysqli_fetch_array($sql);
            //membuat session
            $_SESSION['id_user'] = $id_user;
			$_SESSION['username'] = $username;
			$_SESSION['nama'] = $nama;
			$_SESSION['level'] = $level;

			header("Location: ./admin.php");
			die();
		} else {
			$_SESSION['err'] = '<strong>ERROR!</strong> Username dan Password tidak ditemukan.';
			header('Location: ./');
			die();
		}
	} else {
	?>

        <div class="unix-login">
            <div class="container-fluid">
                <div class="row justify-content-center">
                    <div class="col-lg-4">
                        <div class="login-content card">
                            <div class="login-form">
                                <h4>Perpustakaan USM</h4>
								<h4><img src="images/usm.png" alt="homepage" class="dark-logo"  width="60" height="60"/></h4>
                                <form class="form-signin" method="post" action="" role="form">
								<?php
									if(isset($_SESSION['err'])){
										$err = $_SESSION['err'];
										echo '<div class="alert alert-warning alert-message">'.$err.'</div>';
										unset($_SESSION['err']);
										}
									?>
                                    <div class="form-group">
                                      
                                        <input type="text" name="username" class="form-control" placeholder="Username">
                                    </div>
                                    <div class="form-group">
                                        
                                        <input type="password" name="password" class="form-control" placeholder="Password">
                                    </div>
                                    
                                    <button type="submit" class="btn btn-primary btn-flat m-b-30 m-t-30" name="login">Login</button>
                                </form>
								<?php
	}
      ?>                      </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <!-- End Wrapper -->
    <!-- All Jquery -->
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