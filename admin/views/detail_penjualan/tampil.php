<div class="row">
    <div class="pull-left">
        <h4>Daftar Detail Penjualan</h4>
    </div>
    <div class="pull-right">
        <a href="index.php?mod=detail_penjualan&page=add">
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
                <td>NO_ORDER</td><td>KODE_BARANG</td><td>JUMLAH</td><td>HARGA</td><td>SUBTOTAL</td>
            </tr>
        </thead>
        <tbody>
            <?php if($detail_penjualan != NULL){ 
                $no=1;
                foreach($detail_penjualan as $row){?>
                    <tr>
                        <td><?=$no;?></td><td><?=$row['no_order']?></td><td><?=$row['kode_barang']?></td><td><?=$row['jumlah']?></td>><td><?=$row['harga']?></td><td><?=$row['sub_total']?></td>
                        <td>
                            <a href="index.php?mod=detail_penjualan&page=edit&id=<?=md5($row['id_penjualan'])?>"><i class="fa fa-pencil"></i> </a>
                            <a href="index.php?mod=detail_penjualan&page=delete&id=<?=md5($row['id_penjualan'])?>"><i class="fa fa-trash"></i> </a>
                        </td>
                    </tr>
               <?php $no++; }
            }?>
        </tbody>
    </table>
</div>