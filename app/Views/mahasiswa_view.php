<div class="container pt-5">
    <a href="<?= base_url('/public/index.php/mahasiswa/tambahmhs');?>" class="btn btn-success mb-2">Tambah Data</a>
    <div class="card">
        <div class="card-header bg-info text-white">
            <h4 class="card-title">Data Mahasiswa</h4>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Nama Mahasiswa</th>
                            <th>NIM</th>
                            <th>Aksi</th>
                        </tr> 
                    </thead>
                    <tbody>
                        <?php $no=1; foreach($getMahasiswa as $isi){?>
                            <tr>
                                <td><?= $no;?></td>
                                <td><?= $isi['nama'];?></td>
                                <td><?= $isi['nim'];?></td>
                                <td>
                                    <a href="<?= base_url('/public/index.php/mahasiswa/editmhs/'.$isi['id_mahasiswa']);?>" 
                                    class="btn btn-success">
                                    Edit</a>
                                    <a href="<?= base_url('/public/index.php/mahasiswa/hapus/'.$isi['id_mahasiswa']);?>" 
                                    onclick="javascript:return confirm('Apakah ingin menghapus data mahasiswa ini ?')"
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