<div class="container p-5">
    <a href="<?= base_url('/public/index.php/praktikum');?>" class="btn btn-secondary mb-2">Kembali</a>
    <div class="card">
        <div class="card-header bg-info text-white">
            <h4 class="card-title">Edit Praktikum : <?= $praktikum->nama_praktikum;?></h4>
        </div>
        <div class="card-body">
            <form method="post" action="<?= base_url('/public/index.php/praktikum/update');?>">
                <div class="form-group">
                    <label for="">Nama Praktikum</label>
                    <input type="text" value="<?= $praktikum->nama_praktikum;?>" name="nama_praktikum" required class="form-control">
                </div>
                <input type="hidden" value="<?= $praktikum->id_praktikum;?>" name="id_praktikum">
                <button class="btn btn-success">Edit Data</button>
            </form>
            
        </div>
    </div>
</div>