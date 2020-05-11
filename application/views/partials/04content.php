<main>

    <div class="container-fluid">

      <!-- Section: Analytical panel -->
      <section class="mt-md-4 pt-md-2 mb-5">

        <!-- Card -->
        <div class="card card-cascade narrower">

          <!-- Section: Chart -->
          <section>

            <!-- Grid row -->
            <div class="row">

              <!-- Grid column -->
              <div class="col-xl-5 col-md-12 mr-0">

                <!-- Card image -->
                <div class="view view-cascade gradient-card-header primary-color">
                  <h2 class="h2-responsive mb-0 font-weight-bold">Traffic</h2>
                </div>

                <!-- Card content -->
                <div class="card-body card-body-cascade pb-0">

                  <!-- Panel data -->
                  <div class="row card-body pt-3">

                    <!-- First column -->
                    <div class="col-md-12">

                      <!-- Date select -->
                      <p class="lead"><span class="badge primary-color p-2">Data range</span></p>
                      <select class="mdb-select md-form">
                        <option value="" disabled selected>Choose time period</option>
                        <option value="1">Today</option>
                        <option value="2">Yesterday</option>
                        <option value="3">Last 7 days</option>
                        <option value="3">Last 30 days</option>
                        <option value="3">Last week</option>
                        <option value="3">Last month</option>
                      </select>

                      <!-- Date pickers -->
                      <p class="lead pt-3 pb-2"><span class="badge primary-color p-2">Custom date</span></p>
                      <div class="d-flex justify-content-between">
                        <div class="md-form w-100 mr-2">
                          <input placeholder="Selected date" type="text" id="from" class="form-control datepicker">
                          <label for="date-picker-example">From</label>
                        </div>
                        <div class="md-form w-100 ml-2">
                          <input placeholder="Selected date" type="text" id="to" class="form-control datepicker">
                          <label for="date-picker-example">To</label>
                        </div>
                      </div>

                    </div>
                    <!-- First column -->

                  </div>
                  <!-- Panel data -->

                </div>
                <!-- Card content -->

              </div>
              <!-- Grid column -->

              <!-- Grid column -->
              <div class="col-xl-7 col-md-12 mb-4">

                <!-- Chart -->
                <div class="view view-cascade gradient-card-header primary-color">

                  <canvas id="traffic" height="170px"></canvas>

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
      <!-- Section: Analytical panel -->

      <!-- Section: data tables -->
      <section class="pb-3">

        <div class="row">

          <div class="col-xl-4 col-md-6">

            <div class="card mb-4">
              <div class="card-body">
                <h4 class="h4-responsive text-center mb-3 font-weight-bold ">
                  Visits by Browser
                </h4>
                <canvas id="doughnutChart"></canvas>
              </div>
            </div>

            <div class="card mb-md-0 mb-4">
              <div class="card-body">
                <div class="table-responsive">
                  <table class="table">
                    <thead>
                      <tr>
                        <th class="font-weight-bold "><strong>Keywords</strong></th>
                        <th class="font-weight-bold "><strong>Visits</strong></th>
                        <th class="font-weight-bold "><strong>Pages</strong></th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td>Material Design</td>
                        <td>15</td>
                        <td>307</td>
                      </tr>
                      <tr>
                        <td>Bootstrap</td>
                        <td>32</td>
                        <td>504</td>
                      </tr>
                      <tr>
                        <td>MDBootstrap</td>
                        <td>41</td>
                        <td>613</td>
                      </tr>
                      <tr>
                        <td>Frontend</td>
                        <td>14</td>
                        <td>208</td>
                      </tr>
                    </tbody>
                  </table>
                </div>
                <button
                  class="btn btn btn-flat grey lighten-3 btn-rounded waves-effect float-right font-weight-bold  btn-dash">View
                  full report</button>
              </div>
            </div>

          </div>

          <div class="col-xl-8 col-md-6">

            <div class="card mb-4">
              <div class="card-body">
                <table class="table">
                  <thead>
                    <tr>
                      <th class="font-weight-bold "><strong>Country</strong></th>
                      <th class="font-weight-bold "><strong>Visits</strong></th>
                      <th class="font-weight-bold "><strong>Pages</strong></th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td><img src="<?= base_url('assets') ?>/img/flags/us.png" class="flag"> United States</td>
                      <td>15</td>
                      <td>307</td>
                    </tr>
                    <tr>
                      <td><img src="<?= base_url('assets') ?>/img/flags/in.png" class="flag"> India</td>
                      <td>32</td>
                      <td>504</td>
                    </tr>
                    <tr>
                      <td><img src="<?= base_url('assets') ?>/img/flags/cn.png" class="flag"> China</td>
                      <td>41</td>
                      <td>613</td>
                    </tr>
                    <tr>
                      <td><img src="<?= base_url('assets') ?>/img/flags/pl.png" class="flag"> Poland</td>
                      <td>14</td>
                      <td>208</td>
                    </tr>
                    <tr>
                      <td><img src="<?= base_url('assets') ?>/img/flags/it.png" class="flag"> Italy</td>
                      <td>24</td>
                      <td>314</td>
                    </tr>
                  </tbody>
                </table>
                <button
                  class="btn btn btn-flat grey lighten-3 btn-rounded waves-effect float-right font-weight-bold  btn-dash">View
                  full report</button>
              </div>
            </div>

            <div class="card mb-0">
              <div class="card-body">
                <table class="table">
                  <thead>
                    <tr>
                      <th class="font-weight-bold "><strong>Browser</strong></th>
                      <th class="font-weight-bold "><strong>Visits</strong></th>
                      <th class="font-weight-bold "><strong>Pages</strong></th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>Google Chrome</td>
                      <td>15</td>
                      <td>307</td>
                    </tr>
                    <tr>
                      <td>Mozilla Firefox</td>
                      <td>32</td>
                      <td>504</td>
                    </tr>
                    <tr>
                      <td>Safari</td>
                      <td>41</td>
                      <td>613</td>
                    </tr>
                    <tr>
                      <td>Opera</td>
                      <td>14</td>
                      <td>208</td>
                    </tr>
                    <tr>
                      <td>Microsoft Edge</td>
                      <td>24</td>
                      <td>314</td>
                    </tr>
                  </tbody>
                </table>
                <button
                  class="btn btn btn-flat grey lighten-3 btn-rounded waves-effect font-weight-bold  float-right btn-dash">View
                  full report</button>
              </div>
            </div>

          </div>

        </div>

      </section>
      <!-- Section: data tables -->

    </div>

  </main>