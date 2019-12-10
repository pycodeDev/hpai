<div class="row">
        <div class="col-12">

          <div class="card">

            <div class="card-header">
              <h3 class="card-title">Data Transaksi penjualan</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">

              <table id="dataTable" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Nomor</th>
                  <th>Nama Produk</th>
                  <th>Aksi</th>
                </tr>
                </thead>
                <tbody>
                <?php
                  $no=1;
                  foreach ($variable as $value):
                ?>
                <tr>
                  <td><?=$no++?></td>
                  <td><?=$value->nama_produk?></td>
                  <td><a href="<?=base_url()?>admin/kelola_transaksi_penjualan/detail_transaksi_penjualan/<?=$value->id_prim?>" class="btn btn-success"><i class="fas fa-eye"></i></a>
                </tr>
                <?php
                  endforeach;
                ?>
              </table>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->