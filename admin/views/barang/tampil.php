<div class="row">
    <div class="pull-left">
        <h4>Daftar Barang</h4>
    </div>
    <div class="pull-right">
        <a href="index.php?mod=barang&page=add">
            <button class="btn btn-primary">Add</button>
        </a>
    </div>
</div>
<div class="row">
    <table class="table">
        <thead>
            <tr>
                <td>
                    #
                </td>
                <td>KODE</td><td>NAMA</td><td>HARGA</td><td>STOK</td><td>SATUAN</td><td>KATEGORI</td>
            </tr>
        </thead>
        <tbody>
            <?php if($barang != NULL){ 
                $no=1;
                foreach($barang as $row){?>
                    <tr>
                        <td><?=$no;?></td><td><?=$row['kode_barang']?></td><td><?=$row['nama']?></td><td><?=$row['harga']?></td><td><?=$row['stok']?></td><td><?=$row['satuan']?></td><td><?=$row['id_kategori_barang']?></td>
                        <td>
                            <a href="index.php?mod=barang&page=edit&id=<?=md5($row['kode_barang'])?>"><i class="fa fa-pencil"></i> </a>
                            <a href="index.php?mod=barang&page=delete&id=<?=md5($row['kode_barang'])?>"><i class="fa fa-trash"></i> </a>
                        </td>
                    </tr>
               <?php $no++; }
            }?>
        </tbody>
    </table>
</div>