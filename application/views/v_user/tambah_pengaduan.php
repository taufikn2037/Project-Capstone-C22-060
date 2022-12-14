<div class="card">
    <div class="card-body">

        <?= form_open_multipart('user/tambah_pengaduan'); ?>
        <div class="form-group">
            <label for="isi_laporan">Isi Laporan</label>
            <textarea class="form-control" name="isi_laporan" id="isi_laporan" rows="5"></textarea>
        </div>
        <div class="form-group">
            <label for="foto">Foto</label>
            <input type="file" class="form-control-file border border-secondary rounded" name="foto" id="foto">
        </div>
        <button type="reset" value="reset" class="btn btn-danger">Reset</button>
        <a href="javascript:history.back()" class="btn btn-warning">Kembali</a>
        <button type="submit" value="submit" class="btn btn-primary">Simpan</button>
        <?php form_close(); ?>
    </div>
</div>