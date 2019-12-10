<!-- Alert-->
<?php if ($this->session->flashdata('success')): ?>
    <div class="toast toastrDefaultSuccess" role="alert" data-autohide="true">
        
    </div>
<?php endif; ?>
<div class="row">
        <div class="col-12">

          <div class="card">

            <div class="card-header">
            <a href="<?=base_url()?>admin/dashboard/lap_produk"><button class="btn btn-success float-right"><i class="fas fa-print"></i></button></a>
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
                  <!-- <th>Aksi</th> -->
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
                  <!-- <td>
                    <a href="#!" class="btn btn-success"><i class="fas fa-print"></i></a>
                  </td> -->
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