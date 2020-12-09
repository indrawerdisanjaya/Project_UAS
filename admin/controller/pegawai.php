<?php
$con ->auten();
$conn=$con->koneksi();
switch (@$_GET['page']){
    case 'add':
        $sql="SELECT * FROM kategori_pegawai ";
        $kategoripeg=$conn->query($sql);
        $content = "views/pegawai/tambah.php";
        include_once 'views/template.php';
    break;
    case 'save':
        if($_SERVER['REQUEST_METHOD']=="POST"){
            if(empty($_POST['id_pegawai'])){
                $err['id_pegawai']="ID Pegawai Wajib";
            }
            if(!is_numeric($_POST['no_ktp'])){
                $err['no_ktp']="NIK Wajib Angka";
            }
            if(empty($_POST['nama'])){
                $err['nama']="Nama Wajib Terisi";
            }
            if(empty($_POST['alamat'])){
                $err['alamat']="Alamat Wajib Terisi";
            }
            if(!is_numeric($_POST['no_telp'])){
                $err['no_telp']="No TELP Wajib Angka";
            }
            if(empty($_POST['id_kategori_pegawai'])){
                $err['id_kategori_pegawai']="ID Kategori Wajib Terisi";
            }
                    //photo cek
                    $target_dir = "../media/";
                    $photo = basename($_FILES["fileToUpload"]["name"]);
                    $target_file = $target_dir . $photo;
                    $uploadOk = 1;
                    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
        
                    // Check if image file is a actual image or fake image
                    if(isset($_POST["submit"])) {
                        $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
                    if($check !== false) {
                        echo "File is an image - " . $check["mime"] . ".";
                        $uploadOk = 1;
                    } else {
                        echo "File is not an image.";
                        $uploadOk = 0;
                    }
                    }
        
                    // Check if file already exists
                    if (file_exists($target_file)) {
                        echo "Sorry, file already exists.";
                        $uploadOk = 0;
                    }
        
                    // Check file size
                    if ($_FILES["fileToUpload"]["size"] > 500000) {
                        echo "Sorry, your file is too large.";
                        $uploadOk = 0;
                    }
        
                    // Allow certain file formats
                    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
                        && $imageFileType != "gif" ) {
                        $err['fileToUpload']="Photo tidak sesuai";
                        echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
                        $uploadOk = 0;
                    }
        
                    // Check if $uploadOk is set to 0 by an error
                    /*if ($uploadOk == 0) {
                         echo "Sorry, your file was not uploaded.";
                    // if everything is ok, try to upload file
                    } else {*/
                    if ($uploadOk ==1){
                        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
                           // echo "The file ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " has been uploaded.";
                            $_POST['photo'] = $photo;
                            if(isset($_POST['photo_old']) && $_POST['photo_old']!=''){
                                unlink($target_dir.$_POST['photo_old']);
                            }
                    } else {
                        echo "Sorry, there was an error uploading your file.";
                    }
                    }
    }
           if(!isset($err)){ 
                if(!empty($_POST['kode_pegawai'])){
                    //update
                    if(isset($_POST['photo'])){
                        $sql="UPDATE pegawai set id_pegawai='$_POST[id_pegawai]',no_ktp='$_POST[no_ktp]', nama='$_POST[nama]',alamat='$_POST[alamat]',
                         no_telp='$_POST[no_telp]',id_kategori_pegawai='$_POST[id_kategori_pegawai]',photo='$_POST[photo]' where md5(kode_pegawai)='$_POST[kode_pegawai]'";
                    }else{
                        $sql="UPDATE pegawai set id_pegawai='$_POST[id_pegawai]',no_ktp='$_POST[no_ktp]', nama='$_POST[nama]',alamat='$_POST[alamat]',
                         no_telp='$_POST[no_telp]',id_kategori_pegawai='$_POST[id_kategori_pegawai]' where md5(kode_pegawai)='$_POST[kode_pegawai]'";  
                    }
                }else{ 
                     //save
                     if(isset($_POST['photo'])){
                         $sql = "INSERT INTO pegawai(id_pegawai,no_ktp,nama,alamat,no_telp,id_kategori_pegawai,photo)
                         VALUES ('$_POST[id_pegawai]','$_POST[no_ktp]','$_POST[nama]','$_POST[alamat]','$_POST[no_telp]','$_POST[id_kategori_pegawai]','$_POST[photo]')";
                    }else{
                        $sql = "INSERT INTO pegawai(id_pegawai,no_ktp,nama,alamat,no_telp,id_kategori_pegawai)
                         VALUES ('$_POST[id_pegawai]','$_POST[no_ktp]','$_POST[nama]','$_POST[alamat]','$_POST[no_telp]','$_POST[id_kategori_pegawai]')";
                     }
                    if($conn->query($sql)==TRUE){
                    header('Location:'.$con->site_url().'/admin/index.php?mod=pegawai');
                    }else{
                        $err['msg']= "ERROR: " . $sql . "<br>" . $conn ->error;
                }
            }
            if($conn->query($sql)==TRUE){
                header('Location:'.$con->site_url().'/admin/index.php?mod=pegawai'); 
            }else{
                $err['msg']="Tidak diijinkan";
            }
        if(isset($err)){
            $sql="SELECT * FROM kategori_pegawai ";
            $kategoripeg=$conn->query($sql);
            $content = "views/pegawai/tambah.php";
            include_once 'views/template.php';
        }
    }
    break;
    case 'edit':
        $pegawai ="SELECT * FROM pegawai where md5(id_pegawai)='$_GET[id]'";
        $pegawai=$conn->query($pegawai);
        $_POST=$pegawai->fetch_assoc();
        $_POST['kode_pegawai']=md5($_POST['kode_pegawai']);
        $sql="SELECT * FROM kategori_pegawai ";
        $kategoripeg=$conn->query($sql);
        $content = "views/pegawai/tambah.php";
        include_once 'views/template.php';  
    break;
    case 'delete';
    $pegawai ="DELETE FROM pegawai WHERE md5(id_pegawai)='$_GET[id]'";
    $pegawai=$conn->query($pegawai);
    header('Location: '.$con->site_url().'/admin/index.php?mod=pegawai');
    break;
    default:
    $sql = "SELECT * FROM pegawai";
    $pegawai=$conn ->query($sql);
    $conn->close();
    $content="views/pegawai/tampil.php";
    include_once 'views/template.php';
}
?>