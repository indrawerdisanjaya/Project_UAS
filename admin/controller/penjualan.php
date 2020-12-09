<?php
$con ->auten();
$conn=$con->koneksi();

switch (@$_GET['page']){
    case 'add':
        $sql="SELECT * FROM customer ";
        $kategoricus=$conn->query($sql);
        $sql="SELECT * FROM pegawai ";
        $kategoripeg=$conn->query($sql);
        $content = "views/penjualan/tambah.php";
        include_once 'views/template.php';
    break;
    case 'save':
        if($_SERVER['REQUEST_METHOD']=="POST"){
            if(empty($_POST['no_order'])){
                $err['no_order']="No Order Wajib";
            }
            if(empty($_POST['id_customer'])){
                $err['id_customer']="ID Customer Wajib Terisi";
            }
            if(empty($_POST['id_pegawai'])){
                $err['id_pegawai']="ID Pegawai Wajib Terisi";
            }
            if(empty($_POST['tanggal'])){
                $err['tanggal']="Tanggal Wajib Terisi";
            }
            if(empty($_POST['keterangan'])){
                $err['keterangan']="Keterangan Wajib Terisi";
            }
            if(!is_numeric($_POST['total'])){
                $err['total']="Total Wajib Angka";
            }
           if(!isset($err)){ 
                if(!empty($_POST['id_penjualan'])){
                    //update
                    $sql="UPDATE nota_penjualan set no_order='$_POST[no_order]',id_customer='$_POST[id_customer]',id_pegawai='$_POST[id_pegawai]',tanggal='$_POST[tanggal]',keterangan='$_POST[keterangan]',total='$_POST[total]' where md5(id_penjualan)='$_POST[id_penjualan]'";               
                }else{ 
                //save
                    $sql = "INSERT INTO nota_penjualan(no_order,id_customer,id_pegawai,tanggal,keterangan,total)
                    VALUES ('$_POST[no_order]','$_POST[id_customer]','$_POST[id_pegawai]','$_POST[tanggal]','$_POST[keterangan]','$_POST[total]')";
                }
                if($conn->query($sql)==TRUE){
                    header('Location:'.$con->site_url().'/admin/index.php?mod=penjualan');
                }else{
                    $err['msg']= "ERROR: " . $sql . "<br>" . $conn ->error;
                }
            }
        }else{
            $err['msg']="Tidak diijinkan";
        }
        if(isset($err)){
            $sql="SELECT * FROM customer ";
            $kategoricus=$conn->query($sql);
            $sql="SELECT * FROM pegawai ";
            $kategoripeg=$conn->query($sql);
            $content = "views/penjualan/tambah.php";
            include_once 'views/template.php';
        }
    break;
    case 'edit':
        $penjualan ="SELECT * FROM nota_penjualan where md5(no_order)='$_GET[id]'";
        $penjualan=$conn->query($penjualan);
        $_POST=$penjualan->fetch_assoc();
        $_POST['id_penjualan']=md5($_POST['id_penjualan']);
        $sql="SELECT * FROM customer ";
        $kategoricus=$conn->query($sql);
        $sql="SELECT * FROM pegawai ";
        $kategoripeg=$conn->query($sql);
        $content = "views/penjualan/tambah.php";
        include_once 'views/template.php';  
    break;
    case 'delete';
    $penjualan ="DELETE FROM nota_penjualan WHERE md5(no_order)='$_GET[id]'";
    $penjualan=$conn->query($penjualan);
    header('Location: '.$con->site_url().'/admin/index.php?mod=penjualan');
    break;
    default:
    $sql = "SELECT * FROM nota_penjualan";
    $penjualan=$conn ->query($sql);
    $conn->close();
    $content="views/penjualan/tampil.php";
    include_once 'views/template.php';
}
?>