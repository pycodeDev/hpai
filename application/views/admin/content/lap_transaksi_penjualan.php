<div class="row">
        <div class="col-12">

          <div class="card">

            <div class="card-header">
                
                <h3 class="card-title">Transaksi Penjualan</h3>
            </div>
            <!-- /.card-header -->

            <div class="card-body">

              <table id="dataTable" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Nomor</th>
                  <th>Nama Produk</th>
                  <th>Tahun</th>
                  <th>Bulan</th>
                  <th>QTY</th>
                  <th>Aksi</th>
                </tr>
                </thead>
                <tbody>
                <?php
                $no=1;
                foreach ($variable as $det):
                ?>
                <tr>
                    <td><?=$no++?></td>
                    <td><?=$det['nama_produk']?></td>
                    <td><strong><?=$det['tahun']?></strong></td>
                    <td><strong><?=$det['bulan']?></strong></td>
                    <td><strong><?=$det['QTY']?></strong></td>
                    <td>
                        <a href="<?=base_url()?>admin/dashboard/lap_transaksi_penjualan/<?=$det['id_prim']?>" class="btn btn-success <?=$det['bulan'] == 'Belum ada Transaksi' ? 'disabled': ''?>"><i class="fas fa-print"></i></a>
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