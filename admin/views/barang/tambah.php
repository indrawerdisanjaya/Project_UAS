<h4>Tambah Data</h4>
<hr>
<form action="index.php?mod=barang&page=save" method="POST">
    <div class="col-md-6">
        <div class="form-group">
            <label for="">KODE</label>
            <input type="text" name="kode_barang" required value="<?=(isset($_POST['kode_barang']))?$_POST['kode_barang']:'';?>" class="form-control">
            <input type="hidden" name="id_barang" value="<?=(isset($_POST['id_barang']))?$_POST['id_barang']:'';?>" class="form-control">
            <span class="text-danger"><?=(isset($err['kode_barang']))?$err['kode_barang']:'';?></span>
        </div>
        <div class="form-group">
            <label for="">NAMA</label>
            <input type="text" name="nama" required value="<?=(isset($_POST['nama']))?$_POST['nama']:'';?>" class="form-control">
            <span class="text-danger"><?=(isset($err['nama']))?$err['nama']:'';?></span>
        </div>
        <div class="form-group">
            <label for="">HARGA</label>
            <input type="number" name="harga" required value="<?=(isset($_POST['harga']))?$_POST['harga']:'';?>" class="form-control">
            <span class="text-danger"><?=(isset($err['harga']))?$err['harga']:'';?></span>
        </div>        
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="">STOK</label>
            <input type="number" name="stok" required value="<?=(isset($_POST['stok']))?$_POST['stok']:'';?>" class="form-control">
            <span class="text-danger"><?=(isset($err['stok']))?$err['stok']:'';?></span>
        </div> 
        <div class="form-group">
            <label for="">SATUAN</label>
            <input type="text" name="satuan" required value="<?=(isset($_POST['satuan']))?$_POST['satuan']:'';?>" class="form-control">
            <span class="text-danger"><?=(isset($err['satuan']))?$err['satuan']:'';?></span>
        </div>
        <div class="form-group">
            <label for="">KATEGORI</label>
            <select type="text" name="id_kategori_barang" class="form-control"  required id="">
                <option value="">Pilih Kategori</option>
                <?php
                if($kategoribar != NULL){
                    foreach($kategoribar as $row){?>
                        <option <?=(isset($_POST['id_kategori_barang']) && $_POST['id_kategori_barang']==$row['id_kategori_barang'])?"selected":'';?> value="<?=$row['id_kategori_barang'];?>"> <?=$row['nama_kategori'];?></option>
                    <?php }
                }?>
            </select>
            <span class="text-danger"><?=(isset($err['id_kategori_barang']))?$err['id_kategori_barang']:'';?></span>  
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary">Save</button>
        </div>
    </div>
</form>