<div class="container pt-5">
    <a href="<?= base_url('/public/index.php/praktikum/tambah');?>" class="btn btn-success mb-2">Tambah Data</a>
    <div class="card">
        <div class="card-header bg-info text-white">
            <h4 class="card-title">Data Praktikum</h4>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Nama Praktikum</th>
                            <th>Aksi</th>
                        </tr> 
                    </thead>
                    <tbody>
                        <?php $no=1; foreach($getPraktikum as $isi){?>
                            <tr>
                                <td><?= $no;?></td>
                                <td><?= $isi['nama_praktikum'];?></td>
                                <td>
                                    <a href="<?= base_url('/public/index.php/praktikum/edit/'.$isi['id_praktikum']);?>" 
                                    class="btn btn-success">
                                    Edit</a>
                                    <a href="<?= base_url('/public/index.php/praktikum/hapus/'.$isi['id_praktikum']);?>" 
                                    onclick="javascript:return confirm('Apakah ingin menghapus praktikum ini ?')"
                                    class="btn btn-danger">
                                    Hapus</a>

                                </td>
                            </tr>
                        <?php $no++;}?>
                    </tbody>  

                </table>
            </div>
        </div>
    </div>
</div>