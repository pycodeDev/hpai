<div class="row">
  <div class="col-12">
    <div class="card">
      <div class="card-header">
        <a href="<?=base_url();?>admin/kelola_produk_masuk/tambah_produk_masuk/<?=$det_prd->id_prim?>" class="btn btn-success float-right"><i class="fas fa-plus"></i> Tambah Data</a>         
        <h3 class="card-title">Data Produk Masuk</h3></br>
      </div>
            <!-- /.card-header -->
      <div class="card-body">
        <h3 class="card-title">Id Produk: <b><?=$det_prd->id_produk?></b></h3></br>
        <h4 class="card-title">Nama Produk: <b><?=$det_prd->nama_produk?></b></h4><br/>
            
        <table id="dataTable" class="table table-bordered table-striped">
          <thead>
          <tr>
            <th>Nomor</th>
            <th>Tahun</th>
            <th>Bulan</th>
            <th>QTY</th>
            <th>Aksi</th>
          </tr>
          </thead>
          <tbody>
          <?php
          $no=1;
          if (sizeof($det) == 0 ) {?>

            <tr>
              <td colspan="5">Tidak Ada Isi</td>
            </tr>
          <?php
          }else{
          for ($i=0; $i < sizeof($det); $i++) { 
          ?>
            <tr>
              <td><?=$no++?></td>
              <td><?=$det[$i]['tahun']?></td>
              <td><?=$det[$i]['bulan']?></td>
              <td><?=$det[$i]['QTY']?></td>
              <td>
              <!-- <a href="<?=base_url();?>admin/kelola_produk_masuk/edit_data/<?=$det[$i]['id_produk_masuk']?>">
                <button class="btn btn-info"><i class="fas fa-edit"></i></button>
              </a> -->
              <a href="<?=base_url()?>admin/kelola_produk_masuk/delete/<?=$det[$i]['id_prim']?>/<?=$det[$i]['id_produk_masuk']?>">
                <button class="btn btn-danger"><i class="fas fa-trash"></i></button>
              </a>
            </tr>
          <?php
          }
        }
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