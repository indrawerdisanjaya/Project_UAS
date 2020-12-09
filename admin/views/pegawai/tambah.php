<h4>Tambah Data</h4>
<hr>
<form action="index.php?mod=pegawai&page=save" method="POST" enctype="multipart/form-data">
    <div class="col-md-6">
        <div class="form-group">
            <label for="">ID</label>
            <input type="text" name="id_pegawai" required value="<?=(isset($_POST['id_pegawai']))?$_POST['id_pegawai']:'';?>" class="form-control">
            <input type="hidden" name="kode_pegawai" value="<?=(isset($_POST['kode_pegawai']))?$_POST['kode_pegawai']:'';?>" class="form-control">
            <input type="hidden" name="photo_old" value="<?=(isset($_POST['photo']))?$_POST['photo']:'';?>">
            <span class="text-danger"><?=(isset($err['id_pegawai']))?$err['id_pegawai']:'';?></span>
        </div>
        <div class="form-group">
            <label for="">NIK</label>
            <input type="number" name="no_ktp" required value="<?=(isset($_POST['no_ktp']))?$_POST['no_ktp']:'';?>" class="form-control">
            <span class="text-danger"><?=(isset($err['no_ktp']))?$err['no_ktp']:'';?></span>
        </div>
        <div class="form-group">
            <label for="">Nama</label>
            <input type="text" name="nama" required value="<?=(isset($_POST['nama']))?$_POST['nama']:'';?>" class="form-control">
            <span class="text-danger"><?=(isset($err['nama']))?$err['nama']:'';?></span>
        </div>
    </div>
    <div class="col-md-6">
         <div class="form-group">
            <label for="">Alamat</label>
            <input type="text" name="alamat" required value="<?=(isset($_POST['alamat']))?$_POST['alamat']:'';?>" class="form-control">
            <span class="text-danger"><?=(isset($err['alamat']))?$err['alamat']:'';?></span>
        </div>
        <div class="form-group">
            <label for="">No_Telp</label>
            <input type="number" name="no_telp" required value="<?=(isset($_POST['no_telp']))?$_POST['no_telp']:'';?>" class="form-control">
            <span class="text-danger"><?=(isset($err['no_telp']))?$err['no_telp']:'';?></span>
        </div>
        <div class="form-group">
            <label for="">ID_Kategori</label>
            <select type="text" name="id_kategori_pegawai" class="form-control"  required id="">
                <option value="">Pilih Kategori</option>
                <?php
                if($kategoripeg != NULL){
                    foreach($kategoripeg as $row){?>
                        <option <?=(isset($_POST['id_kategori_pegawai']) && $_POST['id_kategori_pegawai']==$row['id_kategori_pegawai'])?"selected":'';?> value="<?=$row['id_kategori_pegawai'];?>"> <?=$row['nama_kategori'];?></option>
                    <?php }
                }?>
            </select>
            <span class="text-danger"><?=(isset($err['id_kategori_pegawai']))?$err['id_kategori_pegawai']:'';?></span>  
        </div>
        <div class="form-group">
        <label for="">Photo</label>
        <img src="../media/<?=$_POST['photo']?>"width="100">
        <input type="file" name="fileToUpload"  required value="<?=(isset($_POST['fileToUpload']))?$_POST['fileToUpload']:'';?>" class="form-control">
        <span class="text-danger"><?=(isset($err['fileToUpload']))?$err['fileToUpload']:'';?></span>
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary">Save</button>
        </div>
    </div>
</form>