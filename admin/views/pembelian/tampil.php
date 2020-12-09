<div class="row">
    <div class="pull-left">
        <h4>Daftar Pembelian</h4>
    </div>
    <div class="pull-right">
        <a href="index.php?mod=pembelian&page=add">
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
                <td>KODE</td><td>ID_PEGAWAI</td><td>KODE_PEMASOK</td><td>TANGGAL</td><td>TOTAL</td>
            </tr>
        </thead>
        <tbody>
            <?php if($pembelian != NULL){ 
                $no=1;
                foreach($pembelian as $row){?>
                    <tr>
                        <td><?=$no;?></td><td><?=$row['kode_pembelian']?></td><td><?=$row['id_pegawai']?></td><td><?=$row['kode_pemasok']?></td><td><?=$row['tanggal']?></td><td><?=$row['total']?></td>
                        <td>
                            <a href="index.php?mod=pembelian&page=edit&id=<?=md5($row['kode_pembelian'])?>"><i class="fa fa-pencil"></i> </a>
                            <a href="index.php?mod=pembelian&page=delete&id=<?=md5($row['kode_pembelian'])?>"><i class="fa fa-trash"></i> </a>
                        </td>
                    </tr>
               <?php $no++; }
            }?>
        </tbody>
    </table>
</div>