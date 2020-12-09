<!DOCTYPE html>
<html lang="en">
<!--Header judul web-->
<head>
	<meta charset="UTF-8">
	<meta name="viewpor" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Selamat Datang di Sistem Informasi POSCom</title>
    <link rel="stylesheet" type="text/css" href="../assets/style.css">
    <link href="bootstrap/css/bootstrap.css" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <!--<link rel="stylesheet" type="text/css" href="css/kus.css"/>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" type="text/css" href="../assets/style.css">
        <script type="text/javascript" src="bootstrap/js/bootstrap.js"></script>
        <script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="bootstrap/jquery.min.js"></script>-->
</head>
<body>
	<nav class="header">
		<table style="width: 100%">
			<tr>
				<td>
					<img style="margin-left: 10px" height="100" src="../media/logo.png" alt="logo toko POSCom">
				</td>
				<td>
					<p class="logo">Selamat Datang</p>
				</td>
				<td>
					<ul class="navigation">
						<li>
                        <a href="../admin/controller/logout.php">Logout</a>
					</ul>
				</td>
			</tr>
		</table>
	</nav>
	<section class="description">
		<div>
			<h1 style="text-align: center;">Sistem Informasi POSCom Swasthi Computer</h1>
		</div>
        <div class="content">
            <img class="img-rounded" src="../media/pegawai2.png" alt="logo pegawai" width="100px" height="100px" style="margin-left: 100px;" >
			<!--<a href="index.php?mod=pegawai" style ="text-align:center">Data Pegawai</a>-->
			<h2 style="text-align: center;"><a href="index.php?mod=pegawai">Data Pegawai</a></h2>
			<p style="text-align: center;">Terseda Detail Informasi tentang pegawai yang bekerja di swasthi computer</p>
            <!--<a href="index.php?mod=pegawai" class="btn btn-primary">Lihat Sekarang</a>-->      
        </div>
		<div class="content">
        <img class="img-rounded" src="../media/customer2.png" alt="logo customer" width="100px" height="100px" style="margin-left: 100px;" >
			<h2 style="text-align: center;"><a href="index.php?mod=customer">Data Customer</a></h2>
            <p style="text-align: center;">Terseda Detail Informasi tentang customer di swasthi computer</p>
            <!--<a href="index.php?mod=customer" class="btn btn-primary">Lihat Sekarang</a>-->
		</div>
		<div class="content">
        <img class="img-rounded" src="../media/barang2.png" alt="logo barang" width="100px" height="100px" style="margin-left: 100px;" >
			<h2 style="text-align: center;"><a href="index.php?mod=barang">Data Barang</a></h2>
            <p style="text-align: center;">Terseda Detail Informasi tentang barang yang tersedia di swasthi computer</p>
            <!--<a href="index.php?mod=barang" class="btn btn-primary">Lihat Sekarang</a>-->
		</div>
		<div class="content">
        <img class="img-rounded" src="../media/pembelian2.png" alt="logo pembelian" width="100px" height="100px" style="margin-left: 100px;" >
			<h2 style="text-align: center;"><a href="index.php?mod=pembelian">Data Pembelian</a></h2>
            <p style="text-align: center;">Terseda Detail Informasi tentang transaksi pembelian di swasthi computer</p>
            <!--<a href="index.php?mod=pembelian" class="btn btn-primary">Lihat Sekarang</a>-->
        </div>
        <div class="content">
        <img class="img-rounded" src="../media/penjualan2.png" alt="zainal" width="100px" height="100px" style="margin-left: 100px;" >
			<h2 style="text-align: center;"><a href="index.php?mod=penjualan">Data Penjualan</a></h2>
            <p style="text-align: center;">Terseda Detail Informasi tentang transaksi penjualan di swasthi computer</p>
            <!--<a href="index.php?mod=penjualan" class="btn btn-primary">Lihat Sekarang</a>-->
        </div>
	</section>
	<footer class="footer">
		<font color="black">Copyright by Gede Indra Werdi Sanjaya; 2020</font>
	</footer>
</body>
</html>