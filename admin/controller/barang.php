<?php
$con ->auten();
$conn=$con->koneksi();

switch (@$_GET['page']){
    case 'add':
        $sql="SELECT * FROM kategori_barang ";
        $kategoribar=$conn->query($sql);
        $content = "views/barang/tambah.php";
        include_once 'views/template.php';
    break;
    case 'save':
        if($_SERVER['REQUEST_METHOD']=="POST"){
            if(empty($_POST['kode_barang'])){
                $err['kode_barang']="Kode Barang Wajib";
            }
            if(empty($_POST['nama'])){
                $err['nama']="Nama Wajib Terisi";
            }
            if(!is_numeric($_POST['harga'])){
                $err['harga']="Harga Wajib Angka";
            }
            if(!is_numeric($_POST['stok'])){
                $err['stok']="Stok Wajib Angka";
            }
            if(empty($_POST['satuan'])){
                $err['satuan']="Satuan Wajib Terisi";
            }
            if(empty($_POST['id_kategori_barang'])){
                $err['id_kategori_barang']="ID Kategori Wajib Terisi";
            }
           if(!isset($err)){ 
                if(!empty($_POST['id_barang'])){
                    //update
                    $sql="UPDATE barang set kode_barang='$_POST[kode_barang]',nama='$_POST[nama]',harga='$_POST[harga]',stok='$_POST[stok]',satuan='$_POST[satuan]',id_kategori_barang='$_POST[id_kategori_barang]' where md5(id_barang)='$_POST[id_barang]'";               
                }else{ 
                //save
                    $sql = "INSERT INTO barang(kode_barang,nama,harga,stok,satuan,id_kategori_barang)
                    VALUES ('$_POST[kode_barang]','$_POST[nama]','$_POST[harga]','$_POST[stok]','$_POST[satuan]','$_POST[id_kategori_barang]')";
                }
                if($conn->query($sql)==TRUE){
                    header('Location:'.$con->site_url().'/admin/index.php?mod=barang');
                }else{
                    $err['msg']= "ERROR: " . $sql . "<br>" . $conn ->error;
                }
            }
        }else{
            $err['msg']="Tidak diijinkan";
        }
        if(isset($err)){
            $sql="SELECT * FROM kategori_barang ";
            $kategoribar=$conn->query($sql);
            $content = "views/barang/tambah.php";
            include_once 'views/template.php';
        }
    break;
    case 'edit':
        $barang ="SELECT * FROM barang where md5(kode_barang)='$_GET[id]'";
        $barang=$conn->query($barang);
        $_POST=$barang->fetch_assoc();
        $_POST['id_barang']=md5($_POST['id_barang']);
        $sql="SELECT * FROM kategori_barang";
        $kategoribar=$conn->query($sql);
        $content = "views/barang/tambah.php";
        include_once 'views/template.php';  
    break;
    case 'delete';
    $barang ="DELETE FROM barang WHERE md5(kode_barang)='$_GET[id]'";
    $barang=$conn->query($barang);
    header('Location: '.$con->site_url().'/admin/index.php?mod=barang');
    break;
    default:
    $sql = "SELECT * FROM barang";
    $barang=$conn ->query($sql);
    $conn->close();
    $content="views/barang/tampil.php";
    include_once 'views/template.php';
}
?>