<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title"> Grafik Prediksi Jumlah Penjualan Produk PT HPAI BC 4 Pekanbaru </h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <div class="chart">
                    <canvas id="lineChart" style="height:250px; min-height:250px"></canvas>
                </div>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
    <!-- /.col -->
</div>
<!-- /.row -->
<script src="<?=base_url();?>assets/plugins/jquery/jquery.min.js"></script>
<script src="<?=base_url();?>assets/plugins/chart.js/Chart.min.js"></script>
<script>
  $(function () {
    /* ChartJS
     * -------
     * Here we will create a few charts using ChartJS
     */

    
  })
  $(document).ready(function(){
    $.ajax({
      url: 'http://localhost:5000/graph',
      type: 'post',
      data: JSON.stringify({"id":<?=$id?>}),
      contentType: 'application/json;charset=UTF-8',
      dataType: 'json',
      success: function(data){
        var bulan = [];
        var qty = [];

        for (var i in data) {
            bulan.push(data[i].bulan);
            qty.push(data[i].qty);
        }

        var ticksStyle = {
            fontColor: "#495057",
            fontStyle: "bold"
        };

        var mode = "index";
        var intersect = true;

        var $visitorsChart = $('#lineChart')
        var visitorsChart  = new Chart($visitorsChart, {
            data   : {
            labels  : bulan,
            datasets: [{
                type                : 'line',
                data                : qty,
                backgroundColor     : 'transparent',
                borderColor         : '#007bff',
                pointBorderColor    : '#007bff',
                pointBackgroundColor: '#007bff',
                fill                : false
                // pointHoverBackgroundColor: '#007bff',
                // pointHoverBorderColor    : '#007bff'
            }]
            },
            options: {
            maintainAspectRatio: false,
            tooltips           : {
                mode     : mode,
                intersect: intersect
            },
            hover              : {
                mode     : mode,
                intersect: intersect
            },
            legend             : {
                display: false
            },
            scales             : {
                yAxes: [{
                // display: false,
                gridLines: {
                    display      : true,
                    lineWidth    : '4px',
                    color        : 'rgba(0, 0, 0, .2)',
                    zeroLineColor: 'transparent'
                },
                ticks    : $.extend({
                    beginAtZero : true,
                    suggestedMax: 200
                }, ticksStyle)
                }],
                xAxes: [{
                display  : true,
                gridLines: {
                    display: false
                },
                ticks    : ticksStyle
                }]
            }
            }
        })
        
      }
    });
  });
  console.log(<?=$id?>)
</script>