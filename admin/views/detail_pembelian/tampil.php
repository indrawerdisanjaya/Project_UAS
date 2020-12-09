<div class="row">
    <div class="pull-left">
        <h4>Daftar Detail Pembelian</h4>
    </div>
    <div class="pull-right">
        <a href="index.php?mod=detail_pembelian&page=add">
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
                <td>KODE</td><td>KODE_BARANG</td><td>JUMLAH</td><td>HARGA</td><td>SUBTOTAL</td>
            </tr>
        </thead>
        <tbody>
            <?php if($detail_pembelian != NULL){ 
                $no=1;
                foreach($detail_pembelian as $row){?>
                    <tr>
                        <td><?=$no;?></td><td><?=$row['kode_pembelian']?></td><td><?=$row['kode_barang']?></td><td><?=$row['jumlah']?></td><td><?=$row['harga']?></td><td><?=$row['sub_total']?></td>
                        <td>
                            <a href="index.php?mod=detail_pembelian&page=edit&id=<?=md5($row['id_pembelian'])?>"><i class="fa fa-pencil"></i> </a>
                            <a href="index.php?mod=detail_pembelian&page=delete&id=<?=md5($row['id_pembelian'])?>"><i class="fa fa-trash"></i> </a>
                        </td>
                    </tr>
               <?php $no++; }
            }?>
        </tbody>
    </table>
</div>