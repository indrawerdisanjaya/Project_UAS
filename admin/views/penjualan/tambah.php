<h4>Tambah Data</h4>
<hr>
<form action="index.php?mod=penjualan&page=save" method="POST">
    <div class="col-md-6">
        <div class="form-group">
            <label for="">NO ORDER</label>
            <input type="text" name="no_order" required value="<?=(isset($_POST['no_order']))?$_POST['no_order']:'';?>" class="form-control">
            <input type="hidden" name="id_penjualan" value="<?=(isset($_POST['id_penjualan']))?$_POST['id_penjualan']:'';?>" class="form-control">
            <span class="text-danger"><?=(isset($err['no_order']))?$err['no_order']:'';?></span>
        </div>
        <div class="form-group">
            <label for="">ID_CUSTOMER</label>
            <select type="text" name="id_customer" class="form-control"  required id="">
                <option value="">Pilih Kategori</option>
                <?php
                if($kategoricus != NULL){
                    foreach($kategoricus as $row){?>
                        <option <?=(isset($_POST['id_customer']) && $_POST['id_customer']==$row['id_customer'])?"selected":'';?> value="<?=$row['id_customer'];?>"> <?=$row['id_customer'];?></option>
                    <?php }
                }?>
            </select>
            <span class="text-danger"><?=(isset($err['id_customer']))?$err['id_customer']:'';?></span>  
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
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="">TANGGAL</label>
            <input type="date" name="tanggal" required value="<?=(isset($_POST['tanggal']))?$_POST['tanggal']:'';?>" class="form-control">
            <span class="text-danger"><?=(isset($err['tanggal']))?$err['tanggal']:'';?></span>
        </div>
        <div class="form-group">
            <label for="">KETERANGAN</label>
            <input type="text" name="keterangan" required value="<?=(isset($_POST['keterangan']))?$_POST['keterangan']:'';?>" class="form-control">
            <span class="text-danger"><?=(isset($err['keterangan']))?$err['keterangan']:'';?></span>
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