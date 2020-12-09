<?php
$con ->auten();
$conn=$con->koneksi();

switch (@$_GET['page']){
    case 'add':
        /*$sql="SELECT * FROM kategori_pegawai ";
        $kategoripeg=$conn->query($sql);*/
        $content = "views/customer/tambah.php";
        include_once 'views/template.php';
    break;
    case 'save':
        if($_SERVER['REQUEST_METHOD']=="POST"){
            if(empty($_POST['id_customer'])){
                $err['id_customer']="ID Customer Wajib";
            }
            if(empty($_POST['nama'])){
                $err['nama']="Nama Wajib Terisi";
            }
            if(!is_numeric($_POST['no_telp'])){
                $err['no_telp']="No TELP Wajib Angka";
            }
           if(!isset($err)){ 
                if(!empty($_POST['kode_customer'])){
                    //update
                    $sql="UPDATE customer set id_customer='$_POST[id_customer]',nama='$_POST[nama]',no_telp='$_POST[no_telp]' where md5(kode_customer)='$_POST[kode_customer]'";               
                }else{ 
                //save
                    $sql = "INSERT INTO customer(id_customer,nama,no_telp)
                    VALUES ('$_POST[id_customer]','$_POST[nama]','$_POST[no_telp]')";
                }
                if($conn->query($sql)==TRUE){
                    header('Location:'.$con->site_url().'/admin/index.php?mod=customer');
                }else{
                    $err['msg']= "ERROR: " . $sql . "<br>" . $conn ->error;
                }
            }
        }else{
            $err['msg']="Tidak diijinkan";
        }
        if(isset($err)){
            /*$sql="SELECT * FROM kategori_pegawai ";
            $kategoripeg=$conn->query($sql);*/
            $content = "views/customer/tambah.php";
            include_once 'views/template.php';
        }
    break;
    case 'edit':
        $customer ="SELECT * FROM customer where md5(id_customer)='$_GET[id]'";
        $customer=$conn->query($customer);
        $_POST=$customer->fetch_assoc();
        $_POST['kode_customer']=md5($_POST['kode_customer']);
        /*$sql="SELECT * FROM kategori_pegawai ";
        $kategoripeg=$conn->query($sql);*/
        $content = "views/customer/tambah.php";
        include_once 'views/template.php';  
    break;
    case 'delete';
    $customer ="DELETE FROM customer WHERE md5(id_customer)='$_GET[id]'";
    $customer=$conn->query($customer);
    header('Location: '.$con->site_url().'/admin/index.php?mod=customer');
    break;
    default:
    $sql = "SELECT * FROM customer";
    $customer=$conn ->query($sql);
    $conn->close();
    $content="views/customer/tampil.php";
    include_once 'views/template.php';
}
?>