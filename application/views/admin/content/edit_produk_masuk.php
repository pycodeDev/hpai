<div class="row">
    <div class="col-md-12">
        <div class="card ">
            <div class="card-header">
                <h3 class="card-title">Edit Data Produk Masuk</h3>
            </div>
                <form action="<?= base_url();?>admin/dashboard/edit_data" method="post">
                    <div class="card-body">
                        <input type="hidden" name="id_prim" value="<?=$prd->id_prim?>">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Id Produk</label>
                            <input type="text" name="id_produk" readonly value="<?=$prd->id_produk?>" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Nama Produk</label>
                            <input type="text" name="nama_produk" readonly value="<?=$prd->nama_produk?>" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Tanggal</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                <i class="far fa-calendar-alt"></i>
                                </span>
                            </div>
                            <input type="date" name="tanggal" class="form-control float-right" id="reservation" value="<?=$prd->QTY?>">
                            <?= form_error('tanggal', '<small class="text-danger pl-3">','</small>'); ?>
                        </div>
                        <br/>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Stok</label>
                            <input type="number" name="QTY" class="form-control" required  placeholder="Stok" value="<?=$prd->QTY?>">
                            <?= form_error('QTY', '<small class="text-danger pl-3">','</small>'); ?>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-dark">Simpan</button> 
                        <a  href="<?= base_url();?>admin/kelola_produk_masuk/detail_produk_masuk/<?=$prd->id_prim?>" type="submit" class="btn btn-danger">Kembali</a>
                    </div>
                </form>
        </div>
    </div>
</div>