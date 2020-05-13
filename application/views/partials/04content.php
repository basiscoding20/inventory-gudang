 <!-- Main layout -->
  <main>

    <div class="container-fluid">

      <!-- Section: Intro -->
      <section class="mt-md-4 pt-md-2 mb-5 pb-4">

        <!-- Grid row -->
        <div class="row">

          <!-- Grid column -->
          <div class="col-xl-3 col-md-6 mb-xl-0 mb-4">

            <!-- Card -->
            <div class="card card-cascade cascading-admin-card">

              <!-- Card Data -->
              <div class="admin-up">
                <i class="far fa-money-bill-alt primary-color mr-3 z-depth-2"></i>
                <div class="data">
                  <p class="text-uppercase">barang masuk</p>
                  <h4 class="font-weight-bold dark-grey-text">2000$</h4>
                </div>
              </div>

            </div>
            <!-- Card -->

          </div>
          <!-- Grid column -->

          <!-- Grid column -->
          <div class="col-xl-3 col-md-6 mb-xl-0 mb-4">

            <!-- Card -->
            <div class="card card-cascade cascading-admin-card">

              <!-- Card Data -->
              <div class="admin-up">
                <i class="fas fa-chart-line warning-color mr-3 z-depth-2"></i>
                <div class="data">
                  <p class="text-uppercase">barang keluar</p>
                  <h4 class="font-weight-bold dark-grey-text">200</h4>
                </div>
              </div>

            </div>
            <!-- Card -->

          </div>
          <!-- Grid column -->

          <!-- Grid column -->
          <div class="col-xl-3 col-md-6 mb-md-0 mb-4">

            <!-- Card -->
            <div class="card card-cascade cascading-admin-card">

              <!-- Card Data -->
              <div class="admin-up">
                <i class="fas fa-chart-pie light-blue lighten-1 mr-3 z-depth-2"></i>
                <div class="data">
                  <p class="text-uppercase">pengajuan <span class="badge badge-warning d-block">barang masuk</span></p>
                  <h4 class="font-weight-bold dark-grey-text">20000</h4>
                </div>
              </div>

            </div>
            <!-- Card -->

          </div>
          <!-- Grid column -->

          <!-- Grid column -->
          <div class="col-xl-3 col-md-6 mb-0">

            <!-- Card -->
            <div class="card card-cascade cascading-admin-card">

              <!-- Card Data -->
              <div class="admin-up">
                <i class="fas fa-chart-bar red accent-2 mr-3 z-depth-2"></i>
                <div class="data">
                  <p class="text-uppercase">pengajuan <span class="badge badge-warning d-block">barang keluar</span></p>
                  <h4 class="font-weight-bold dark-grey-text">2000</h4>
                </div>
              </div>

            </div>
            <!-- Card -->

          </div>
          <!-- Grid column -->

        </div>
        <!-- Grid row -->

      </section>
      <!-- Section: Intro -->

      <!-- Section: Main panel -->
      <section class="mb-5">

        <!-- Card -->
        <div class="card card-cascade narrower">

          <!-- Section: Chart -->
          <section>

            <!-- Grid row -->
            <div class="row">

              <!-- Grid column -->
              <div class="col-md mb-4 pb-2">

                <!-- Chart -->
                <div class="view view-cascade gradient-card-header blue-gradient">

                  <canvas id="barang-masuk" height="175"></canvas>

                </div>

              </div>
              <!-- Grid column -->

              <!-- Grid column -->
              <div class="col-md mb-4 pb-2">

                <!-- Chart -->
                <div class="view view-cascade gradient-card-header peach-gradient">

                  <canvas id="barang-keluar" height="175"></canvas>

                </div>

              </div>
              <!-- Grid column -->

            </div>
            <!-- Grid row -->

          </section>
          <!-- Section: Chart -->

          
        </div>
        <!-- Card -->

      </section>
      <!-- Section: Main panel -->

     
    </div>

  </main>
  <!-- Main layout -->