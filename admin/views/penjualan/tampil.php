<div class="row">
    <div class="pull-left">
        <h4>Daftar Penjualan</h4>
    </div>
    <div class="pull-right">
        <a href="index.php?mod=penjualan&page=add">
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
                <td>NO ORDER</td><td>ID_CUSTOMER</td><td>ID_PEGAWAI</td><td>TANGGAL</td><td>KETERANGAN</td><td>TOTAL</td>
            </tr>
        </thead>
        <tbody>
            <?php if($penjualan != NULL){ 
                $no=1;
                foreach($penjualan as $row){?>
                    <tr>
                        <td><?=$no;?></td><td><?=$row['no_order']?></td><td><?=$row['id_customer']?></td><td><?=$row['id_pegawai']?></td><td><?=$row['tanggal']?></td><td><?=$row['keterangan']?></td><td><?=$row['total']?></td>
                        <td>
                            <a href="index.php?mod=penjualan&page=edit&id=<?=md5($row['no_order'])?>"><i class="fa fa-pencil"></i> </a>
                            <a href="index.php?mod=penjualan&page=delete&id=<?=md5($row['no_order'])?>"><i class="fa fa-trash"></i> </a>
                        </td>
                    </tr>
               <?php $no++; }
            }?>
        </tbody>
    </table>
</div>