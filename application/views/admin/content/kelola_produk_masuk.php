<div class="row">
        <div class="col-12">

          <div class="card">

            <div class="card-header">
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
                  <th>Aksi</th>
                </tr>
                </thead>
                <tbody>
                <?php
                  $no =1;
                  foreach ($prd as $val):
                ?>
                <tr>
                  <td><?=$no++?></td>
                  <td><?=$val->id_produk?></td>
                  <td><?=$val->nama_produk?></td>
                  <td><a href="<?= site_url('admin/kelola_produk_masuk/detail_produk_masuk/'.$val->id_prim) ?>"><button class="btn btn-success"><i class="fas fa-eye"></i></button></a>
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