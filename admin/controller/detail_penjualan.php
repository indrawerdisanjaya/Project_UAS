<?php
$con ->auten();
$conn=$con->koneksi();

switch (@$_GET['page']){
    case 'add':
        $sql="SELECT * FROM nota_penjualan ";
        $kategoripenju=$conn->query($sql);
        $sql="SELECT * FROM barang ";
        $kategoribar=$conn->query($sql);
        $content = "views/detail_penjualan/tambah.php";
        include_once 'views/template.php';
    break;
    case 'save':
        if($_SERVER['REQUEST_METHOD']=="POST"){
            if(empty($_POST['no_order'])){
                $err['no_order']="No Order Penjualan Wajib";
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
                if(!empty($_POST['id_penjualan'])){
                    //update
                    $sql="UPDATE detail_penjualan set no_order='$_POST[no_order]',kode_barang='$_POST[kode_barang]',jumlah='$_POST[jumlah]',harga='$_POST[harga]',sub_total='$_POST[sub_total]' where md5(id_penjualan)='$_POST[id_penjualan]'";               
                }else{ 
                //save
                    $sql = "INSERT INTO detail_penjualan(no_order,kode_barang,jumlah,harga,sub_total)
                    VALUES ('$_POST[no_order]','$_POST[kode_barang]','$_POST[jumlah]','$_POST[harga]','$_POST[sub_total]')";
                }
                if($conn->query($sql)==TRUE){
                    header('Location:'.$con->site_url().'/admin/index.php?mod=detail_penjualan');
                }else{
                    $err['msg']= "ERROR: " . $sql . "<br>" . $conn ->error;
                }
            }
        }else{
            $err['msg']="Tidak diijinkan";
        }
        if(isset($err)){
            $sql="SELECT * FROM nota_penjualan ";
            $kategoripenju=$conn->query($sql);
            $sql="SELECT * FROM barang ";
            $kategoribar=$conn->query($sql);
            $content = "views/detail_penjualan/tambah.php";
            include_once 'views/template.php';
        }
    break;
    case 'edit':
        $detail_penjualan ="SELECT * FROM detail_penjualan where md5(id_penjualan)='$_GET[id]'";
        $detail_penjualan=$conn->query($detail_penjualan);
        $_POST=$detail_penjualan->fetch_assoc();
        $_POST['id_penjualan']=md5($_POST['id_penjualan']);
        $sql="SELECT * FROM nota_penjualan ";
        $kategoripenju=$conn->query($sql);
        $sql="SELECT * FROM barang ";
        $kategoribar=$conn->query($sql);
        $content = "views/detail_penjualan/tambah.php";
        include_once 'views/template.php';  
    break;
    case 'delete';
    $detail_penjualan ="DELETE FROM detail_penjualan WHERE md5(id_penjualan)='$_GET[id]'";
    $detail_penjualan=$conn->query($detail_penjualan);
    header('Location: '.$con->site_url().'/admin/index.php?mod=detail_penjualan');
    break;
    default:
    $sql = "SELECT * FROM detail_penjualan";
    $detail_penjualan=$conn ->query($sql);
    $conn->close();
    $content="views/detail_penjualan/tampil.php";
    include_once 'views/template.php';
}
?>