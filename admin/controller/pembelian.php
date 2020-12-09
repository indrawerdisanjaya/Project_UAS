<?php
$con ->auten();
$conn=$con->koneksi();

switch (@$_GET['page']){
    case 'add':
        $sql="SELECT * FROM pegawai ";
        $kategoripeg=$conn->query($sql);
        $sql="SELECT * FROM pemasok ";
        $kategoripem=$conn->query($sql);
        $content = "views/pembelian/tambah.php";
        include_once 'views/template.php';
    break;
    case 'save':
        if($_SERVER['REQUEST_METHOD']=="POST"){
            if(empty($_POST['kode_pembelian'])){
                $err['kode_pembelian']="Kode Pembelian Wajib";
            }
            if(empty($_POST['id_pegawai'])){
                $err['id_pegawai']="ID Pegawai Wajib Terisi";
            }
            if(empty($_POST['kode_pemasok'])){
                $err['kode_pemasok']="Kode Pemasok Wajib Terisi";
            }
            if(empty($_POST['tanggal'])){
                $err['tanggal']="Tanggal Wajib Terisi";
            }
            if(!is_numeric($_POST['total'])){
                $err['total']="Total Wajib Angka";
            }
           if(!isset($err)){ 
                if(!empty($_POST['id_pembelian'])){
                    //update
                    $sql="UPDATE nota_pembelian set kode_pembelian='$_POST[kode_pembelian]',id_pegawai='$_POST[id_pegawai]',kode_pemasok='$_POST[kode_pemasok]',tanggal='$_POST[tanggal]',total='$_POST[total]' where md5(id_pembelian)='$_POST[id_pembelian]'";               
                }else{ 
                //save
                    $sql = "INSERT INTO nota_pembelian(kode_pembelian,id_pegawai,kode_pemasok,tanggal,total)
                    VALUES ('$_POST[kode_pembelian]','$_POST[id_pegawai]','$_POST[kode_pemasok]','$_POST[tanggal]','$_POST[total]')";
                }
                if($conn->query($sql)==TRUE){
                    header('Location:'.$con->site_url().'/admin/index.php?mod=pembelian');
                }else{
                    $err['msg']= "ERROR: " . $sql . "<br>" . $conn ->error;
                }
            }
        }else{
            $err['msg']="Tidak diijinkan";
        }
        if(isset($err)){
            $sql="SELECT * FROM pegawai ";
            $kategoripeg=$conn->query($sql);
            $sql="SELECT * FROM pemasok ";
            $kategoripem=$conn->query($sql);
            $content = "views/pembelian/tambah.php";
            include_once 'views/template.php';
        }
    break;
    case 'edit':
        $pembelian ="SELECT * FROM nota_pembelian where md5(kode_pembelian)='$_GET[id]'";
        $pembelian=$conn->query($pembelian);
        $_POST=$pembelian->fetch_assoc();
        $_POST['id_pembelian']=md5($_POST['id_pembelian']);
        $sql="SELECT * FROM pegawai ";
        $kategoripeg=$conn->query($sql);
        $sql="SELECT * FROM pemasok ";
        $kategoripem=$conn->query($sql);
        $content = "views/pembelian/tambah.php";
        include_once 'views/template.php';  
    break;
    case 'delete';
    $pembelian ="DELETE FROM nota_pembelian WHERE md5(kode_pembelian)='$_GET[id]'";
    $pembelian=$conn->query($pembelian);
    header('Location: '.$con->site_url().'/admin/index.php?mod=pembelian');
    break;
    default:
    $sql = "SELECT * FROM nota_pembelian";
    $pembelian=$conn ->query($sql);
    $conn->close();
    $content="views/pembelian/tampil.php";
    include_once 'views/template.php';
}
?>