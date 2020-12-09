<?php
include_once '../config/config.php';
$con=new Config();
if($con ->auten()){
    //panggil fungsi
    switch(@$_GET['mod']){
        case 'pegawai':
            include_once 'controller/pegawai.php';
        break;
        case 'customer':
            include_once 'controller/customer.php';
            break;
        case 'barang':
            include_once 'controller/barang.php';
            break;
        case 'detail_pembelian':
            include_once 'controller/detail_pembelian.php';
            break;
        case 'pembelian':
            include_once 'controller/pembelian.php';
            break;
        case 'detail_penjualan':
            include_once 'controller/detail_penjualan.php';
            break;   
        case 'penjualan':
            include_once 'controller/penjualan.php';
            break;      
        default;
        include_once 'controller/home.php';
        //include_once 'controller/login.php';
    }
}else{
   include_once 'controller/login.php';
}
?>