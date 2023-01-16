<div class="col-lg-12">
    <div class="panel panel-primary">
        <div class="panel-heading">
        Tambah Data Siswa
        </div>
        <div class="panel-body">
            <?php
                if (isset($error_upload)) {
                    echo '<div class="alert alert-danger alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'.$error_upload.'</div>';
                }

            echo form_open_multipart('siswa/edit/'.$siswa->id_siswa); 
            ?>

                <div class="form-group">
                    <label>NIS</label>
                    <input class="form-control" value="<?= $siswa->nis?>" type="text" name="nis" placeholder="Nomor Induk Siswa" required>
                </div>

                <div class="form-group">
                    <label>Nama Siswa</label>
                    <input class="form-control" value="<?= $siswa->nama_siswa?>" type="text" name="nama_siswa" placeholder="Nama Lengkap Siswa" required>
                </div>
                <!-- SATU BARIS -->
                <div class="col-md-4">
                    <div class="form-group">
                        <label>Tempat Lahir</label>
                        <input class="form-control" value="<?= $siswa->tempat_lahir?>" type="text" name="tempat_lahir" placeholder="Tempat Lahir" required>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label>Tanggal Lahir</label>
                        <input class="form-control" value="<?= $siswa->tgl_lahir?>" type="date" name="tgl_lahir" placeholder="Tanggal Lahir" required>
                    </div>
                </div>
                <div class="col-md-4">   
                    <div class="form-group">
                        <label>Kelas</label>
                        <select name="kelas" class="form-control">
                            <option value="<?= $siswa->kelas?>"><?= $siswa->kelas?></option>
                            <option value="X">X</option>
                            <option value="XI">XI</option>
                            <option value="XII">XII</option>
                        </select>
                    </div>   
                </div>
                <!--END SATU BARIS -- -->
                <!-- SATU BARIS -->
                <div class="col-md-6">        
                    <div class="form-group">
                        <label>Foto Siswa Sebelumnya</label>
                        <p><img src="<?= base_url('foto_siswa/'.$siswa->foto_siswa) ?>" width="100px"></p>
                    </div>
                 </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label>Ganti Foto</label>
                        <input type="file" class="form-control" type="text" name="foto_siswa">
                    </div>
                </div>               
                <!--END SATU BARIS -- -->
                <div class="col-md-12">
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary center-block">Simpan</button>
                    </div>
                </div>
                 
            <?php
            echo form_close();
            ?>
        </div>
        </div>
    </div>

</div>