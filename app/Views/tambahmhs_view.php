<div class="container p-5">
    <a href="<?= base_url('/public/index.php/mahasiswa/tambahmhs');?>" class="btn btn-secondary mb-2">Kembali</a>
    <div class="card">
        <div class="card-header bg-info text-white">
            <h4 class="card-title">Tambah Mahasiswa</h4>
        </div>
        <div class="card-body">
            <form method="post" action="<?= base_url('public/index.php/mahasiswa/addmhs');?>">
                <div class="form-group">
                    <label for="">Nama Mahasiswa</label>
                    <input type="text" name="namamhs" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="">NIM</label>
                    <input type="number" name="nim" class="form-control" required>
                </div>
                <button class="btn btn-success">Tambahkan Mahasiswa</button>
            </form>
            
        </div>
    </div>
</div>