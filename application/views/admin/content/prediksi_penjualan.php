<div class="row" >
        <div class="col-12">

          <div class="card" id="aa">

            <div class="card-header">
           <button class="btn btn-success float-right coba" id="print"><i class="fas fa-print"></i></button>
            
              <h3 class="card-title"> Hasil Prediksi Jumlah Penjualan Produk bulan <span id="hasil"></span> </h3>

            </div>
            <!-- /.card-header -->
            <div class="card-body" >

              <table id="userTable" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Nomor</th>
                  <th>Nama Produk</th>
                  <th>Stok Produk</th>
                  <th>Prediksi Penjualan Bulan Selanjutnya</th>
                  <th>Saran Pembelian Jumlah Produk</th>
                  <th>Aksi</th>
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
                          '<td> <a href="<?=base_url();?>admin/prediksi_penjualan/grafik_prediksi/'+ data[i].id_prim +'" class="btn btn-success btn-sm"><i class="fas fa-chart-bar text-white"></i></a> </td>' +
                          '</tr>');
                
                $("#userTable tbody").append(row);
              console.log(data)
              }
              document.getElementById("hasil").innerHTML = data[0].bulan;
            },
            error: function() {
              $('#userTable tbody').html('<td colspan="7" align="center">Error</td>');
            },
          });

          $("#print").click(function(){
            var prtContent = document.getElementById("aa");
            var WinPrint = window.open('', '', 'left=0,top=0,width=800,height=900,toolbar=0,scrollbars=0,status=0');
            WinPrint.document.write(prtContent.innerHTML);
            WinPrint.document.close();
            WinPrint.focus();
            WinPrint.print();
            WinPrint.close();
            // console.log("berhasil")
          })
        });
      </script>