<?=  $this->session->flashdata('message'); ?>
<div class="row">
    <div class="col-md-12">
        <div class="card ">
            <div class="card-header">
                <h3 class="card-title">Ubah Password</h3>
            </div>
                <form action="<?= base_url();?>admin/dashboard/p_conf" method="post">
                    <div class="card-body">
                        <div class="form-group">
                            <label>Password Lama</label>
                            <input type="password" name="pass_lama" class="form-control float-right" required>
                        </div>
                        <br/>
                        <div class="form-group">
                            <label>Password Baru</label>
                            <input type="password" name="pass_baru" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>Konfirmasi Password</label>
                            <input type="password" name="kon_pass" class="form-control" required>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-success">Simpan</button> 
                        <button onclick="goBack()" class="btn btn-danger">Kembali</button>
                    </div>
                </form>
        </div>
    </div>
</div>

<script>
function goBack(){
    window.history.back();
}
</script>