<!-- CK EDITOR  -->
<script src="<?php echo base_url('ckeditor/ckeditor.js')?>"></script>
<link rel="stylesheet" href="css/samples.css">
<link rel="stylesheet" href="toolbarconfigurator/lib/codemirror/neo.css">
<div class="col-lg-12">
    <div class="panel panel-primary">
        <div class="panel-heading">
        Tambah Berita
        </div>
        <div class="panel-body">
            <?php
                if (isset($error_upload)) {
                    echo '<div class="alert alert-danger alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'.$error_upload.'</div>';
                }
                
                echo validation_errors('<div class="alert alert-warning alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>','</div>');
                
            echo form_open_multipart('berita/add');
            ?>

                <div class="form-group">
                    <label>Judul Berita</label>
                    <input class="form-control" type="text" name="judul_berita" placeholder="Masukan Judul" required>
                </div>
                <div class="form-group">
                    <label>Isi Berita</label>
                    <textarea name="isi_berita" required></textarea>
                </div>
                <div class="form-group">
                    <label>Gambar Berita</label>
                    <input type="file" class="form-control" type="text" name="gambar_berita"  required>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <button type="reset" class="btn btn-danger" onclick="return confirm('Apakah anda yakin akan mereset data?')">Reset</button>
                </div>
            <?php
            echo form_close();
            ?>
        </div>
        </div>
    </div>
</div>
<script>
    CKEDITOR.replace('isi_berita')
</script>