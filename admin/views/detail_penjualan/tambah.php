<!DOCTYPE html>
<html>
<head>
</head>
<body>
<h4>Tambah Data</h4>
<hr>
<form action="index.php?mod=detail_penjualan&page=save" method="POST">
<div class="perhitungan">
    <div class="col-md-6">
        <div class="form-group">
            <label for="">NO_ORDER</label>
            <select type="text" name="no_order" class="form-control"  required id="">
                <option value="">Pilih Kategori</option>
                <?php
                if($kategoripenju != NULL){
                    foreach($kategoripenju as $row){?>
                        <option <?=(isset($_POST['no_order']) && $_POST['no_order']==$row['no_order'])?"selected":'';?> value="<?=$row['no_order'];?>"> <?=$row['no_order'];?></option>
                    <?php }
                }?>
            </select>
            <input type="hidden" name="id_penjualan" value="<?=(isset($_POST['id_penjualan']))?$_POST['id_penjualan']:'';?>" class="form-control">
            <span class="text-danger"><?=(isset($err['no_order']))?$err['no_order']:'';?></span>
        </div>
        <div class="form-group">
            <label for="">KODE_BARANG</label>
            <select type="text" name="kode_barang" class="form-control"  required id="">
                <option value="">Pilih Kategori</option>
                <?php
                if($kategoribar != NULL){
                    foreach($kategoribar as $row){?>
                        <option <?=(isset($_POST['kode_barang']) && $_POST['kode_barang']==$row['kode_barang'])?"selected":'';?> value="<?=$row['kode_barang'];?>"> <?=$row['kode_barang'];?></option>
                    <?php }
                }?>
            </select>
            <span class="text-danger"><?=(isset($err['kode_barang']))?$err['kode_barang']:'';?></span>  
        </div>     
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="">JUMLAH</label>
            <input type="text" name="jumlah" id="bil1"  required value="<?=(isset($_POST['jumlah']))?$_POST['jumlah']:'';?>" class="form-control">
            <span class="text-danger"><?=(isset($err['jumlah']))?$err['jumlah']:'';?></span>
        </div>
        <div class="form-group">
            <label for="">HARGA</label>
            <input type="text" name=harga id="bil2" required value="<?=(isset($_POST['harga']))?$_POST['harga']:'';?>" class="form-control">
            <span class="text-danger"><?=(isset($err['harga']))?$err['harga']:'';?></span>
        </div>
        <div class="form-group">
            <label for="">SUBTOTAL</label>
            <input type="text" name="sub_total" id="hasil" required value="<?=(isset($_POST['sub_total']))?$_POST['sub_total']:'';?>" class="form-control">
            <span class="text-danger"><?=(isset($err['sub_total']))?$err['sub_total']:'';?></span>
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary">Save</button>
        </div>
    </div>
</div>
<script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script type="text/javascript">
        $(".perhitungan").keyup(function(){
            var bil1 = parseInt($("#bil1").val())
            var bil2 = parseInt($("#bil2").val())
            var hasil = bil1 * bil2;
            $("#hasil").attr("value",hasil)
        });
    </script>
</form>
</body>
</html>