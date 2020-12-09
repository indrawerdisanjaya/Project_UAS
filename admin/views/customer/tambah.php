<h4>Tambah Data</h4>
<hr>
<form action="index.php?mod=customer&page=save" method="POST">
    <div class="col-md-6">
        <div class="form-group">
            <label for="">ID</label>
            <input type="text" name="id_customer" required value="<?=(isset($_POST['id_customer']))?$_POST['id_customer']:'';?>" class="form-control">
            <input type="hidden" name="kode_customer" value="<?=(isset($_POST['kode_customer']))?$_POST['kode_customer']:'';?>" class="form-control">
            <span class="text-danger"><?=(isset($err['id_customer']))?$err['id_customer']:'';?></span>
        </div>
        <div class="form-group">
            <label for="">Nama</label>
            <input type="text" name="nama" required value="<?=(isset($_POST['nama']))?$_POST['nama']:'';?>" class="form-control">
            <span class="text-danger"><?=(isset($err['nama']))?$err['nama']:'';?></span>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="">No_Telp</label>
            <input type="number" name="no_telp" required value="<?=(isset($_POST['no_telp']))?$_POST['no_telp']:'';?>" class="form-control">
            <span class="text-danger"><?=(isset($err['no_telp']))?$err['no_telp']:'';?></span>
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary">Save</button>
        </div>
    </div>
</form>