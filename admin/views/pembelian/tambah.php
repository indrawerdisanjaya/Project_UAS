<h4>Tambah Data</h4>
<hr>
<form action="index.php?mod=pembelian&page=save" method="POST">
    <div class="col-md-6">
        <div class="form-group">
            <label for="">KODE</label>
            <input type="text" name="kode_pembelian" required value="<?=(isset($_POST['kode_pembelian']))?$_POST['kode_pembelian']:'';?>" class="form-control">
            <input type="hidden" name="id_pembelian" value="<?=(isset($_POST['id_pembelian']))?$_POST['id_pembelian']:'';?>" class="form-control">
            <span class="text-danger"><?=(isset($err['kode_pembelian']))?$err['kode_pembelian']:'';?></span>
        </div>
        <div class="form-group">
            <label for="">ID_PEGAWAI</label>
            <select type="text" name="id_pegawai" class="form-control"  required id="">
                <option value="">Pilih Kategori</option>
                <?php
                if($kategoripeg != NULL){
                    foreach($kategoripeg as $row){?>
                        <option <?=(isset($_POST['id_pegawai']) && $_POST['id_pegawai']==$row['id_pegawai'])?"selected":'';?> value="<?=$row['id_pegawai'];?>"> <?=$row['id_pegawai'];?></option>
                    <?php }
                }?>
            </select>
            <span class="text-danger"><?=(isset($err['id_pegawai']))?$err['id_pegawai']:'';?></span>  
        </div>
        <div class="form-group">
            <label for="">KODE_PEMASOK</label>
            <select type="text" name="kode_pemasok" class="form-control"  required id="">
                <option value="">Pilih Kategori</option>
                <?php
                if($kategoripem != NULL){
                    foreach($kategoripem as $row){?>
                        <option <?=(isset($_POST['kode_pemasok']) && $_POST['kode_pemasok']==$row['kode_pemasok'])?"selected":'';?> value="<?=$row['kode_pemasok'];?>"> <?=$row['kode_pemasok'];?></option>
                    <?php }
                }?>
            </select>
            <span class="text-danger"><?=(isset($err['kode_pemasok']))?$err['kode_pemasok']:'';?></span>  
        </div>     
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="">TANGGAL</label>
            <input type="date" name="tanggal" required value="<?=(isset($_POST['tanggal']))?$_POST['tanggal']:'';?>" class="form-control">
            <span class="text-danger"><?=(isset($err['tanggal']))?$err['tanggal']:'';?></span>
        </div>
        <div class="form-group">
            <label for="">TOTAL</label>
            <input type="number" name="total" required value="<?=(isset($_POST['total']))?$_POST['total']:'';?>" class="form-control">
            <span class="text-danger"><?=(isset($err['total']))?$err['total']:'';?></span>
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary">Save</button>
        </div>
    </div>
</form>