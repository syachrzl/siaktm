<div class="col-lg-12">
    <div class="panel panel-primary">
        <div class="panel-heading">
            Edit Berita Pengumuman
        </div>
        <div class="panel-body">
            <?php
            if (isset($error_upload)) {
                echo '<div class="alert alert-danger alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>' . $error_upload . '</div>';
            }

            echo form_open_multipart('pengumuman/edit/' . $pengumuman->id_pengumuman);
            ?>

            <div class="form-group">
                <label>Judul Pengumuman</label>
                <input class="form-control" value="<?= $pengumuman->judul_pengumuman ?>" type="text" name="judul_pengumuman" placeholder="Masukan Judul" required>
            </div>

            <div class="form-group">
                <label>Isi Pengumuman</label>
                <textarea class="form-control" type="text" name="isi_pengumuman" cols="30" rows="10" placeholder="Masukan isi Pengumuman" required><?= $pengumuman->isi_pengumuman ?></textarea>
            </div>
            <div class="form-group">
                <label>Tanggal Pengumuman</label>
                <input class="form-control" value="<?= $pengumuman->tgl_pengumuman ?>" type="date" name="tgl_pengumuman" placeholder="Tanggal Pengumuman" required>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary">Simpan</button>
                <button type="reset" class="btn btn-danger" onclick="return confirm('Apakah anda yakin akan mereset data?')">Reset</button>
            </div>
            <!-- -- -->
            <?php
            echo form_close();
            ?>
        </div>
    </div>
</div>

</div>