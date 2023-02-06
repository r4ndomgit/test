<div class="container p-5">
    <a href="<?= base_url('/public/index.php/mahasiswa');?>" class="btn btn-secondary mb-2">Kembali</a>
    <div class="card">
        <div class="card-header bg-info text-white">
            <h4 class="card-title">Edit Mahasiswa : <?= $mahasiswa->nama;?></h4>
        </div>
        <div class="card-body">
            <form method="post" action="<?= base_url('/public/index.php/mahasiswa/update');?>">
                <div class="form-group">
                    <label for="">Nama Mahasiswa</label>
                    <input type="text" value="<?= $mahasiswa->nama;?>" name="nama" required class="form-control">
                </div>
                <div class="form-group">
                    <label for="">NIM</label>
                    <input type="number" value="<?= $mahasiswa->nim;?>" name="nim" required class="form-control">
                </div>
                <input type="hidden" value="<?= $mahasiswa->id_mahasiswa;?>" name="id_mahasiswa">
                <button class="btn btn-success">Edit Data</button>
            </form>
            
        </div>
    </div>
</div>