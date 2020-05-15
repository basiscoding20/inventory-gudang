<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="icon" type="image/png" sizes="16x16" href="<?= base_url('assets'); ?>/img/logoicon.png">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>VALIDASI BARANG INVENTORY GUDANG</title>
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
  <!-- Bootstrap core CSS -->
  <link href="<?= base_url('assets') ?>/css/bootstrap.min.css" rel="stylesheet">
  <!-- Material Design Bootstrap -->
  <link href="<?= base_url('assets') ?>/css/mdb.min.css" rel="stylesheet">
  <!-- Your custom styles (optional) -->
  <style>
    html,
    body,
    header,
    .view {
      height: 100%;
    }
    @media (min-width: 560px) and (max-width: 740px) {
      html,
      body,
      header,
      .view {
        height: 650px;
      }
    }
    @media (min-width: 800px) and (max-width: 850px) {
      html,
      body,
      header,
      .view  {
        height: 650px;
      }
    }
  </style>
</head>

<body class="">

  <!-- Main Navigation -->
  <header>

    <!-- Intro Section -->
    <section class="view intro-2">
      <div class="mask rgba-stylish-strong h-100 d-flex">
        <div class="container">
          <div class="row">
            <div class="col-xl-4 col-lg-6 col-md-10 col-sm-12 mx-auto">

              <!-- Form with header -->
              <div class="card card-cascade narrower" style="margin-top: 44px">

                <!-- Card image -->
                <div class="view view-cascade overlay">
                  <img src="<?= base_url('assets/img/barcode/'.$barang->barcode) ?>" class="card-img-top" alt="">
                  <a>
                    <div class="mask rgba-white-slight waves-effect waves-light"></div>
                  </a>
                </div>
                <!-- Card image -->

                <!-- Card content -->
                <div class="card-body card-body-cascade">
                  <h5 class="pink-text"><i class="fas fa-archive"></i> <?= $barang->kode_barang ?></h5>
                  <!-- Title -->
                  <h4 class="card-title">Validasi Barang <?= $barang->nama_barang ?></h4>
                  <!-- Text -->
                  <p class="card-text">
                    Size : <?= $barang->size ?> <br>
                    Quantity : <?= $barang->quantity ?> <br>
                    Tanggal : <?= $barang->created_at ?> 
                  </p>

                  <form method="POST" id="form-validasi">
                    <input type="hidden" name="kode_barang" value="<?= $barang->kode_barang ?>">
                    <div class="md-form">
                      <input type="number" name="quantity" class="form-control" id="quantity">
                      <label for="quantity">Quantity</label>
                    </div>
                    <fieldset class="form-check-sm mt-0">
                      <input class="form-check-input" type="checkbox" id="checkAll" name="checkAll">
                      <label class="form-check-label checkAllLabel" for="checkAll">Pilih Semua</label>
                    </fieldset>
                  </form>
                  <a class="btn btn-unique waves-effect waves-light" id="kirimValidasi">Kirim</a>
                </div>
                <!-- Card content -->

              </div>
              <!-- Form with header -->

            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- Intro Section -->

  </header>
  <!-- Main Navigation -->

  <!-- SCRIPTS -->
  <!-- JQuery -->
  <script type="text/javascript" src="<?= base_url('assets') ?>/js/jquery-3.4.1.min.js"></script>
  <!-- Bootstrap tooltips -->
  <script type="text/javascript" src="<?= base_url('assets') ?>/js/popper.min.js"></script>
  <!-- Bootstrap core JavaScript -->
  <script type="text/javascript" src="<?= base_url('assets') ?>/js/bootstrap.min.js"></script>
  <!-- MDB core JavaScript -->
  <script type="text/javascript" src="<?= base_url('assets') ?>/js/mdb.js"></script>

  <!-- Custom scripts -->
  <script>

    new WOW().init();

  </script>

  <script type="text/javascript">
    $(document).ready(function() {

      $('[name="checkAll"]').change(function() {

            var checked = $(this).is(':checked');
               if(checked){
                $('[name="quantity"]').prop('disabled', true);
                $('[name="quantity"]').addClass('bg-light');
                $('[name="checkAll"]').val(<?= $barang->quantity ?>);
               }else{
                $('[name="quantity"]').prop('disabled', false);
                $('[name="quantity"]').removeClass('bg-light');
            }
        });

        $('#kirimValidasi').on('click', function() {
            $('#kirimValidasi').prop('disabled', true);
            $('#kirimValidasi').html('<span class="spinner-grow spinner-grow-sm" role="status" aria-hidden="true"></span><span class="sr-only">Loading...</span>');
            var kode_barang = $('[name="kode_barang"]').val();

            if ($('[name="checkAll"]').is(':checked')) {
                var quantity = $('[name="checkAll"]').val();
            }else{
                var quantity = $('[name="quantity"]').val();
            }

            $.ajax({
                url: '<?= base_url('admin/Barang/validasi_barang_masuk') ?>',
                type: 'POST',
                dataType: 'JSON',
                data: {kode_barang:kode_barang, quantity:quantity},
                success:function (response) {
                    if (response.status == 'sukses') {
                      setTimeout(function(){ 
                        window.location.href = response.redirect;
                      }, 1500);
                      toastr.success(response.message, 'Sukses', {positionClass: 'md-toast-top-right'});
                    }else{
                      setTimeout(function(){ 
                        window.location.href = response.redirect;
                      }, 1500);
                      toastr.error(response.message, 'Gagal', {positionClass: 'md-toast-top-right'});
                    }
                }
            });
          });            
    });
  </script>

</body>

</html>
