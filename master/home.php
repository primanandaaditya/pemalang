<?php
    session_start();
    ob_start();
    include ('../auth.php');
?>
<!DOCTYPE html>
<html>
<head>
    <?php
    	include '../head_utama.php';
        include '../head_html.php';
        include '../config.php';

    ?>
    <title>Dashboard</title>
</head>
<body>



<?php

        //cari jumlah pemohon
            $sql = "select * from pemohon";
            $stmt = $db->query($sql);
            $jml_pemohon = $stmt->rowCount();
        
        //cari jumlah jadwal_bap
            $sql = "select * from jadwal_bap";
            $stmt = $db->query($sql);
            $jml_jadwal_bap = $stmt->rowCount();
        
        //cari jumlah proses_bap
            $sql = "select * from proses_bap";
            $stmt = $db->query($sql);
            $jml_proses_bap = $stmt->rowCount();
        
        //cari jumlah bapen
            $sql = "select * from formulir_bapen";
            $stmt = $db->query($sql);
            $jml_bapen = $stmt->rowCount();
        
        //cari jumlah sk
            $sql = "select * from formulir_sk";
            $stmt = $db->query($sql);
            $jml_sk = $stmt->rowCount();
        
        //cari jumlah sk persetujuan
            $sql = "select * from formulir_sk where id_jenis_sk=1";
            $stmt = $db->query($sql);
            $jml_sk_setuju = $stmt->rowCount();

             //cari jumlah sk penangguhan
            $sql = "select * from formulir_sk where id_jenis_sk=2";
            $stmt = $db->query($sql);
            $jml_sk_tangguh = $stmt->rowCount();

             //cari jumlah sk tolak
            $sql = "select * from formulir_sk where id_jenis_sk=2";
            $stmt = $db->query($sql);
            $jml_sk_tolak = $stmt->rowCount();

            //cari grafik pemohon
            $sql="SELECT date_format(created_date,'%M %Y') as bulan, count(id) as jumlah FROM pemohon
                  group by date_format(created_date,'%M %Y') order by created_date LIMIT 10";
            $stmt_grafik_pemohon = $db->query($sql);
            $sa=$db->query($sql);
            

            
?>


<div class="container">
  <div class="container-fluid">

<h2>Dashboard</h2>
    <div class="card-group">
        <div class="card">
          <h1 class="display-3 text-center"><?php echo number_format($jml_pemohon); ?></h1>
          <div class="card-body">
          </div>
          <div class="card-footer">
              <blockquote class="blockquote text-center">
              <small class="text-center">Total pemohon</small>
              </blockquote>
          </div>
        </div>
        <div class="card">
          <h1 class="display-3 text-center"><?php echo number_format($jml_jadwal_bap); ?></h1>
          <div class="card-body">
          </div>
          <div class="card-footer">
              <blockquote class="blockquote text-center">
              <small class="text-center">Total jadwal BAP</small>
              </blockquote>
          </div>
        </div>
        <div class="card">
          <h1 class="display-3 text-center"><?php echo number_format($jml_proses_bap); ?></h1>
          <div class="card-body">
          </div>
          <div class="card-footer">
              <blockquote class="blockquote text-center">
              <small class="text-center">Total proses BAP</small>
              </blockquote>
          </div>
        </div>
        <div class="card">
          <h1 class="display-3 text-center"><?php echo number_format($jml_bapen); ?></h1>
          <div class="card-body">
          </div>
          <div class="card-footer">
              <blockquote class="blockquote text-center">
              <small class="text-center">Total Bapen</small>
              </blockquote>
          </div>
        </div>
    </div>

    <br>

        <div class="card">
          <div class="card-header" id="headingOne">
            <h2 class="mb-0">
              <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                Grafik Jumlah Pemohon (10 bulan terakhir)
              </button>
            </h2>
          </div>

          <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
            <div class="card-body">
               <canvas id="myChart"></canvas>
            </div>
          </div>
        </div>

     

            <br>

    <div class="card-group">
      <div class="card">
        <h1 class="display-3 text-center"><?php echo number_format($jml_sk); ?></h1>
        <div class="card-body">
        </div>
        <div class="card-footer">
            <blockquote class="blockquote text-center">
            <small class="text-center">Total SK</small>
            </blockquote>
        </div>
      </div>

      <div class="card">
        <h1 class="display-3 text-center"><?php echo number_format($jml_sk_setuju); ?></h1>
        <div class="card-body">
        </div>
        <div class="card-footer">
            <blockquote class="blockquote text-center">
            <small class="text-center">Total SK Persetujuan</small>
            </blockquote>
        </div>
      </div>

   
      <div class="card">
        <h1 class="display-3 text-center"><?php echo number_format($jml_sk_tangguh); ?></h1>
        <div class="card-body">
        </div>
        <div class="card-footer">
            <blockquote class="blockquote text-center">
            <small class="text-center">Total SK Penangguhan</small>
            </blockquote>
        </div>
      </div>

      <div class="card">
        <h1 class="display-3 text-center"><?php echo number_format($jml_sk_tolak); ?></h1>
        <div class="card-body">
        </div>
        <div class="card-footer">
            <blockquote class="blockquote text-center">
            <small class="text-center">Total SK Penolakan</small>
            </blockquote>
        </div>
    </div>

      

  </div>
</div>

<script type="text/javascript">

    $(document).ready( function () {
        var ctx = document.getElementById('myChart').getContext('2d');
        var chart = new Chart(ctx, {
            // The type of chart we want to create
            type: 'line',

            // The data for our dataset
            data: {
                labels: [<?php
                  foreach($stmt_grafik_pemohon as $a){
                    echo '"' . $a['bulan'] . '",';
                  }
                  ?>],
                datasets: [{
                    label: 'Jumlah pemohon',
                    backgroundColor: 'rgb(255, 99, 132)',
                    borderColor: 'rgb(255, 99, 132)',
                    data: [<?php
                          foreach($sa as $a){
                            echo $a['jumlah'].',';
                          }
                          ?>]
                }]
            },

            // Configuration options go here
            options: {}
        });
    } );

</script>
</body>
</html>


<!------ Include the above in your HEAD tag ---------->
