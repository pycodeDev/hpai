<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Edit Data Produk</h3>
            </div>
            <form action="<?= base_url();?>admin/kelola_produk/edit_data" method="post">
            <div class="card-body">
            <input type="hidden" name="id_prim" value="<?=$prd->id_prim?>">
                <div class="form-group">
                    <label for="exampleInputEmail1">Id Produk</label>
                    <input type="text" name="id_produk" class="form-control" value="<?=$prd->id_produk?>" placeholder="Id Produk" required>
                    <?= form_error('id_produk', '<small class="text-danger pl-3">','</small>'); ?>
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Nama Produk</label>
                    <input type="text" name="nama_produk" class="form-control" value="<?=$prd->nama_produk?>" placeholder="Nama Produk" required>
                    <?= form_error('nama_produk', '<small class="text-danger pl-3">','</small>'); ?>
                </div>
                <div class="form-group">
                    <label>Status</label>
                    <select class="form-control" data-dropdown-css-class="select2-danger" name="status" style="width: 100%;" required>
                        <option value=""  >Pilih Status</option>
                        <option value="Aktif" <?=$prd->status=='Aktif' ? 'selected' : ''?>>Aktif</option>
                        <option value="Tidak Aktif" <?=$prd->status=='Tidak Aktif' ? 'selected' : ''?>>Tidak Aktif</option>                  
                    </select>
                    <?= form_error('status', '<small class="text-danger pl-3">','</small>'); ?>
                </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-dark">Simpan</button> 
                <a href="<?=base_url()?>/admin/dashboard/kelola_produk" class="btn btn-danger">Kembali</a>
            </div>
            </form>
        </div>
    </div>
</div>