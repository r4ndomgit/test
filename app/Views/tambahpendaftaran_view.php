<div class="container p-5">
    <a href="<?= base_url('/public/index.php/pendaftaran/tambah');?>" class="btn btn-secondary mb-2">Kembali</a>
    <div class="card">
        <div class="card-header bg-info text-white">
            <h4 class="card-title">Pendaftaran Baru</h4>
        </div>
        <div class="card-body">
            <form method="post" action="<?= base_url('public/index.php/pendaftaran/add');?>">
                <div class="form-group">
                    <label for="">Nama Praktikum</label>
                    <input type="text" name="nama_praktikum" class="form-control" required>
                </div>
                <button class="btn btn-success">Daftarkan</button>
            </form>
            
        </div>
    </div>
</div>