<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="icon" type="image/png" sizes="16x16" href="<?= base_url('assets'); ?>/img/logoicon.png">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>SISTEM INVENTORY GUDANG</title>
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

<body class="login-page">

  <!-- Main Navigation -->
  <header>

    <!-- Intro Section -->
    <section class="view intro-2">
      <div class="mask rgba-stylish-strong h-100 d-flex justify-content-center align-items-center">
        <div class="container">
          <div class="row">
            <div class="col-xl-5 col-lg-6 col-md-10 col-sm-12 mx-auto mt-5">

              <!-- Form with header -->
              <div class="card wow fadeIn" data-wow-delay="0.3s">
                <div class="card-body">

                  <!-- Header -->
                  <div class="form-header purple-gradient">
                    <h3 class="font-weight-500 my-2 py-1"><i class="fas fa-user"></i> Log in:</h3>
                  </div>
                  <form id="form-login" method="post">
                    
                    <!-- Body -->
                    <div class="md-form">
                      <i class="fas fa-user prefix white-text"></i>
                      <input type="text" id="orangeForm-name" class="form-control" name="username">
                      <label for="orangeForm-name">Username</label>
                    </div>

                    <div class="md-form">
                      <i class="fas fa-lock prefix white-text"></i>
                      <input type="password" id="orangeForm-pass" class="form-control" name="password">
                      <label for="orangeForm-pass">Password</label>
                    </div>

                    <div class="text-center">
                      <button id="btn-login" type="submit" class="btn purple-gradient btn-lg">Sign In</button>
                      <hr class="mt-4">
                      <div class="inline-ul text-center d-flex justify-content-center">
                        <a class="p-2 m-2 fa-lg tw-ic"><i class="fab fa-twitter white-text"></i></a>
                        <a class="p-2 m-2 fa-lg li-ic"><i class="fab fa-linkedin-in white-text"> </i></a>
                        <a class="p-2 m-2 fa-lg ins-ic"><i class="fab fa-instagram white-text"> </i></a>
                      </div>
                    </div>

                  </form>

                </div>
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

      $('#form-login').submit(function() {
        var username = $('[name="username"]').val().trim();
        var password = $('[name="password"]').val().trim();
        $.ajax({
          url: '<?= base_url('login/masuk') ?>',
          type: 'POST',
          dataType:'json',
          data: {username:username, password:password},
          success:function(response) {
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
       return false; 
        
      });
    });
  </script>

</body>

</html>
