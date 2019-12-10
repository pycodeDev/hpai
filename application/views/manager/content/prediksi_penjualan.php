<div class="row">
        <div class="col-12">

          <div class="card">

            <div class="card-header">
           <a href="#"><button class="btn btn-success float-right"><i class="fas fa-print"></i></button></a>
            
              <h3 class="card-title"> Hasil Prediksi Jumlah Penjualan Produk </h3>

            </div>
            <!-- /.card-header -->
            <div class="card-body">

              <table id="a" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Nomor</th>
                  <th>Nama Produk</th>
                  <th>Stok Produk</th>
                  <th>Prediksi Penjualan Bulan Selanjutnya</th>
                  <th>Saran Pembelian Jumlah Produk</th>
                  <th>Bulan Prediksi</th>
                </tr>
                </thead>
                <tbody>
                </tbody>
              </table>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
      <script src="<?=base_url();?>assets/plugins/jquery/jquery.min.js"></script>
<script type="text/javascript">
  $(document).ready(function(){
    $.ajax({
      url: 'http://localhost:5000/',
      type: 'get',
      dataType: 'json',
      success: function(data){
        var len = data.length;
        var no = 1;
        for (var i= 0; i < len; i++) {
          var no = no++;

          var row = $('<tr>' +
                    '<td>' + no++ + '</td>' +
                    '<td>' + data[i].nama_produk + '</td>' +
                    '<td>' + data[i].stok_produk + '</td>' +
                    '<td>' + data[i].prediksi + '</td>' +
                    '<td>' + data[i].saran + '</td>' +
                    '<td>' + data[i].bulan + '</td>');
          
          $("#a tbody").append(row);
          $(".odd").hide();
        console.log(data)
        }
      },
      error: function() {
        $('#a tbody').html('<td colspan="5" align="center">Error</td>');
      },
    });
  });
</script>