<?php
$con ->auten();
$conn=$con->koneksi();

switch (@$_GET['page']){
    case 'add':
        $sql="SELECT * FROM nota_pembelian ";
        $kategoripembe=$conn->query($sql);
        $sql="SELECT * FROM barang ";
        $kategoribar=$conn->query($sql);
        $content = "views/detail_pembelian/tambah.php";
        include_once 'views/template.php';
    break;
    case 'save':
        if($_SERVER['REQUEST_METHOD']=="POST"){
            if(empty($_POST['kode_pembelian'])){
                $err['kode_pembelian']="Kode Pembelian Wajib";
            }
            if(empty($_POST['kode_barang'])){
                $err['kode_barang']="Kode Barang Wajib Terisi";
            }
            if(!is_numeric($_POST['jumlah'])){
                $err['tanggal']="Jumlah Wajib Terisi";
            }
            if(!is_numeric($_POST['harga'])){
                $err['harga']="Total Wajib Angka";
            }
            if(!is_numeric($_POST['sub_total'])){
                $err['sub_total']="Total Wajib Angka";
            }
           if(!isset($err)){ 
                if(!empty($_POST['id_pembelian'])){
                    //update
                    $sql="UPDATE detail_pembelian set kode_pembelian='$_POST[kode_pembelian]',kode_barang='$_POST[kode_barang]',jumlah='$_POST[jumlah]',harga='$_POST[harga]',sub_total='$_POST[sub_total]' where md5(id_pembelian)='$_POST[id_pembelian]'";               
                }else{ 
                //save
                    $sql = "INSERT INTO detail_pembelian(kode_pembelian,kode_barang,jumlah,harga,sub_total)
                    VALUES ('$_POST[kode_pembelian]','$_POST[kode_barang]','$_POST[jumlah]','$_POST[harga]','$_POST[sub_total]')";
                }
                if($conn->query($sql)==TRUE){
                    header('Location:'.$con->site_url().'/admin/index.php?mod=detail_pembelian');
                }else{
                    $err['msg']= "ERROR: " . $sql . "<br>" . $conn ->error;
                }
            }
        }else{
            $err['msg']="Tidak diijinkan";
        }
        if(isset($err)){
            $sql="SELECT * FROM nota_pembelian ";
            $kategoripembe=$conn->query($sql);
            $sql="SELECT * FROM barang ";
            $kategoribar=$conn->query($sql);
            $content = "views/detail_pembelian/tambah.php";
            include_once 'views/template.php';
        }
    break;
    case 'edit':
        $detail_pembelian ="SELECT * FROM detail_pembelian where md5(id_pembelian)='$_GET[id]'";
        $detail_pembelian=$conn->query($detail_pembelian);
        $_POST=$detail_pembelian->fetch_assoc();
        $_POST['id_pembelian']=md5($_POST['id_pembelian']);
        $sql="SELECT * FROM nota_pembelian ";
        $kategoripembe=$conn->query($sql);
        $sql="SELECT * FROM barang ";
        $kategoribar=$conn->query($sql);
        $content = "views/detail_pembelian/tambah.php";
        include_once 'views/template.php';  
    break;
    case 'delete';
    $detail_pembelian ="DELETE FROM detail_pembelian WHERE md5(id_pembelian)='$_GET[id]'";
    $detail_pembelian=$conn->query($detail_pembelian);
    header('Location: '.$con->site_url().'/admin/index.php?mod=detail_pembelian');
    break;
    default:
    $sql = "SELECT * FROM detail_pembelian";
    $detail_pembelian=$conn ->query($sql);
    $conn->close();
    $content="views/detail_pembelian/tampil.php";
    include_once 'views/template.php';
}
?>