<div class="row">
        <div class="col-12">

          <div class="card">

            <div class="card-header">
                
                <h3 class="card-title">Stok Produk</h3>
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
                  <th>Aksi</th>
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
                    <td>
                        <a href="<?=base_url()?>admin/dashboard/lap_stok_produk/<?=$key->id_prim?>" class="btn btn-success"><i class="fas fa-print"></i></a>
                    </td>
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