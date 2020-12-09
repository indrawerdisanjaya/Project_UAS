<div class="row">
    <div class="pull-left">
        <h4>Daftar Customer</h4>
    </div>
    <div class="pull-right">
        <a href="index.php?mod=customer&page=add">
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
                <td>ID</td><td>NAMA</td><td>No_TELP</td>
            </tr>
        </thead>
        <tbody>
            <?php if($customer != NULL){ 
                $no=1;
                foreach($customer as $row){?>
                    <tr>
                        <td><?=$no;?></td><td><?=$row['id_customer']?></td><td><?=$row['nama']?></td><td><?=$row['no_telp']?></td>
                        <td>
                            <a href="index.php?mod=customer&page=edit&id=<?=md5($row['id_customer'])?>"><i class="fa fa-pencil"></i> </a>
                            <a href="index.php?mod=customer&page=delete&id=<?=md5($row['id_customer'])?>"><i class="fa fa-trash"></i> </a>
                        </td>
                    </tr>
               <?php $no++; }
            }?>
        </tbody>
    </table>
</div>