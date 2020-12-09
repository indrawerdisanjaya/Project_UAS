<div class="row">
    <div class="pull-left">
        <h4>Daftar Pegawai</h4>
    </div>
    <div class="pull-right">
        <a href="index.php?mod=pegawai&page=add">
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
                <td>ID</td><td>NIK</td><td>NAMA</td><td>Alamat</td><td>No_TELP</td><td>ID_Kategori</td><td>Action</td>
            </tr>
        </thead>
        <tbody>
            <?php if($pegawai != NULL){ 
                $no=1;
                foreach($pegawai as $row){?>
                    <tr>
                        <td><?=$no;?></td><td><?=$row['id_pegawai']?></td><td><?=$row['no_ktp'];?></td><td><?=$row['nama']?></td><td><?=$row['alamat']?></td><td><?=$row['no_telp']?></td><td><?=$row['id_kategori_pegawai']?></td>
                        <td>
                            <a href="index.php?mod=pegawai&page=edit&id=<?=md5($row['id_pegawai'])?>"><i class="fa fa-pencil"></i> </a>
                            <a href="index.php?mod=pegawai&page=delete&id=<?=md5($row['id_pegawai'])?>"><i class="fa fa-trash"></i> </a>
                        </td>
                    </tr>
               <?php $no++; }
            }?>
        </tbody>
    </table>
</div>