<?php
    // session start
    if(!empty($_SESSION)){ }else{ session_start(); }
    //session
	if(!empty($_SESSION['ADMIN'])){ }else{ header('location:login.php'); }
    // panggil file
    require '../proses/panggil.php';

    // tampilkan form edit
    $idGet = strip_tags($_GET['id_lagu']);
    $hasil = $proses->tampil_data_id('tbl_lagu','id_lagu',$idGet);
?>

<!DOCTYPE HTML>
<html>
	<head>
		<title>Edit Lagu</title>
		<link rel="stylesheet" href="../assets/css/bootstrap.min.css">
		<link rel="stylesheet" href="../assets/css/font-awesome.min.css">
	</head>
    <body style="background:#586df5;">
		<div class="container">
			<br/>
            <span style="color:#fff";>Selamat Datang, <?php echo $sesi['nama_pengguna'];?></span>
			<div class="float-right">
				<a href="../musik/index.php" class="btn btn-success btn-md" style="margin-right:1pc;"><span class="fa fa-home"></span> Kembali</a>
				<a href="logout.php" class="btn btn-danger btn-md float-right"><span class="fa fa-sign-out"></span> Logout</a>
			</div>
			<br/><br/><br/>
			<div class="row">
				<div class="col-sm-3"></div>
				<div class="col-lg-6">
					<br/>
					<div class="card">
						<div class="card-header">
						<h4 class="card-title">Edit Lagu - <?php echo $hasil['judul_lagu'];?></h4>
						</div>
						<div class="card-body">
						<!-- form berfungsi mengirimkan data input
						dengan method post ke proses crud dengan paramater get aksi edit -->
							<form action="../proses/crud.php?aksi=edit_lagu" method="POST">
                <input type="hidden" value="<?php echo $hasil['id_lagu'];?>" class="form-control" name="id_lagu">

								<div class="form-group">
									<label>Judul Lagu </label>
									<input type="text" value="<?php echo $hasil['judul_lagu'];?>" class="form-control" name="judul_lagu">
								</div>
								<div class="form-group">
									<label>Penyanyi</label>
									<input type="text" value="<?php echo $hasil['penyanyi'];?>" class="form-control" name="penyanyi">
								</div>
								<div class="form-group">
									<label>Kategori Lagu</label>
									<input type="text" value="<?php echo $hasil['kategori'];?>" class="form-control" name="kategori">
								</div>
								<div class="form-group">
									<label>Tahun</label>
									<input type="number" value="<?php echo $hasil['tahun'];?>" class="form-control" name="tahun">
								</div>

								<button class="btn btn-primary btn-md" name="create"><i class="fa fa-edit"> </i> Edit Data</button>
							</form>
						</div>
					</div>
				</div>
				<div class="col-sm-3"></div>
			</div>
		</div>
	</body>
</html>
