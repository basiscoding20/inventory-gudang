 <script>
  var bulan = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktpber', 'November', 'Desember']
  // Masuk chart
    $.ajax({
      url: '<?= base_url('admin/dashboard/get_jumlah') ?>',
      type: 'POST',
      dataType: 'JSON',
      success:function (data) {
        $.each(data, function(barang_masuk) {
          var label = [];
          var value = [];
          for (var i in data.barang_masuk) {
            value.push(data.barang_masuk[i].jumlah_barang_masuk);
            label.push(bulan[data.barang_masuk[i].daftar_bulan]);
          };
          var ctxL = document.getElementById("barang-masuk").getContext('2d');
          var myLineChart = new Chart(ctxL, {
            type: 'line',
            data: {
              labels: label,
              datasets: [{
                label: "Persentase Barang Masuk Tahun "+new Date().getFullYear(),
                fillColor: "#fff",
                backgroundColor: 'rgba(255, 255, 255, .3)',
                borderColor: 'rgba(255, 255, 255)',
                data: value,
              }]
            },
            options: {
              legend: {
                labels: {
                  fontColor: "#fff",
                }
              },
              scales: {
                xAxes: [{
                  gridLines: {
                    display: true,
                    color: "rgba(255,255,255,.25)"
                  },
                  ticks: {
                    fontColor: "#fff",
                  },
                }],
                yAxes: [{
                  display: true,
                  gridLines: {
                    display: true,
                    color: "rgba(255,255,255,.25)"
                  },
                  ticks: {
                    fontColor: "#fff",
                  },
                }],
              }
            }
          });
        });
      }
    });
    
      
   // Keluar chart
     $.ajax({
      url: '<?= base_url('admin/dashboard/get_jumlah') ?>',
      type: 'POST',
      dataType: 'JSON',
      success:function (data) {
        $.each(data, function(barang_keluar) {
          var label = [];
          var value = [];
          for (var i in data.barang_keluar) {
            value.push(data.barang_keluar[i].jumlah_barang_keluar);
            label.push(bulan[data.barang_keluar[i].daftar_bulan]);
          };
          var ctxL = document.getElementById("barang-keluar").getContext('2d');
          var myLineChart = new Chart(ctxL, {
            type: 'line',
            data: {
              labels: label,
              datasets: [{
                label: "Persentase Barang Keluar Tahun "+new Date().getFullYear(),
                fillColor: "#fff",
                backgroundColor: 'rgba(255, 255, 255, .3)',
                borderColor: 'rgba(255, 255, 255)',
                data: value,
              }]
            },
            options: {
              legend: {
                labels: {
                  fontColor: "#fff",
                }
              },
              scales: {
                xAxes: [{
                  gridLines: {
                    display: true,
                    color: "rgba(255,255,255,.25)"
                  },
                  ticks: {
                    fontColor: "#fff",
                  },
                }],
                yAxes: [{
                  display: true,
                  gridLines: {
                    display: true,
                    color: "rgba(255,255,255,.25)"
                  },
                  ticks: {
                    fontColor: "#fff",
                  },
                }],
              }
            }
          });
        });
      }
    });
  </script>
</body>
</html>