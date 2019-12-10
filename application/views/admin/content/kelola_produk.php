<!-- Alert-->
<?php if ($this->session->flashdata('success')): ?>
    <div class="toast toastrDefaultSuccess" role="alert" data-autohide="true">
        
    </div>
<?php endif; ?>
<div class="row">
        <div class="col-12">

          <div class="card">

            <div class="card-header">
           <a href="<?=base_url()?>/admin/kelola_produk/tambah_produk" class="btn btn-success float-right"><i class="fas fa-plus"></i> Tambah Data</font></a>
            
              <h3 class="card-title">Data Produk</h3>

            </div>
            <!-- /.card-header -->
            <div class="card-body">

              <table id="dataTable" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Nomor</th>
                  <th>Id Produk</th>
                  <th>Nama Produk</th>
                  <th>Status</th>
                  <th>Aksi</th>
                </tr>
                </thead>
                <tbody>
                <?php
                  $no=1;
                  foreach ($variable as $val):
                ?>
                <tr>
                  <td><?=$no++?></td>
                  <td><?=$val->id_produk?></td>
                  <td><?=$val->nama_produk?></td>
                  <td><?=$val->status?></td>
                  <td>
                    <a href="<?=base_url();?>admin/kelola_produk/edit_data/<?=$val->id_prim?>" class="btn btn-warning"><i class="fas fa-edit"></i></a>
                    <a onclick="deleteConfirm('<?= base_url('admin/kelola_produk/delete/'.$val->id_prim) ?>')" href="#!" class="btn btn-danger"><i class="fas fa-trash"></i></a>
                  </td>
                </tr>
                  <?php endforeach; ?>
              </table>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
<script>
    function deleteConfirm(url){
        $('#btn-delete-produk').attr('href', url);
        $('#deleteProdukModal').modal();
    }
</script>
