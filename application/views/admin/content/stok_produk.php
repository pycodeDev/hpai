<div class="row">
        <div class="col-12">

          <div class="card">

            <div class="card-header">
            <a class="btn btn-success mr-2" href="kelola_produk_masuk"><i class="fas fa-plus"></i> Kelola Produk Masuk</a><a class="btn btn-success" href="kelola_transaksi_penjualan"><i class="fas fa-plus"></i> Kelola Transaksi Penjualan</a>
              

            </div>
            <!-- /.card-header -->

            <div class="card-body">
              <table id="dataTable" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Nomor</th>
                  <th>Id Produk</th>
                  <th>Nama Produk</th>
                  <th>Stok</th>
                </tr>
                </thead>
                <tbody>
                <?php
                $no=1;
                foreach ($variable as $key):
                ?>
                <tr>
                  <td><?=$no++?></td>
                  <td><?=$key->id_produk?></td>
                  <td><?=$key->nama_produk?></td>
                  <td><?=$key->stok?></td>
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