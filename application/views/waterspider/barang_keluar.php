<main>

    <div class="container-fluid">

      <!-- Section: Basic examples -->
      <section>
        <div class="row">
          <div class="col-md mb-2">
            <div class="card px-2">
              
            </div>
          </div>

        </div>

        <div class="card card-cascade narrower z-depth-1" id="card-table-barang-keluar">

          <!-- Card image -->
          <div class="view view-cascade gradient-card-header blue-gradient narrower py-2 mx-4 mb-3 d-flex justify-content-between align-items-center">

            <div>
              <button type="button" class="btn btn-outline-white btn-rounded btn-sm px-2"><i class="fas fa-th-large mt-0"></i></button>
              <button type="button" class="btn btn-outline-white btn-rounded btn-sm px-2"><i class="fas fa-columns mt-0"></i></button>
            </div>

            <a href="" class="white-text mx-3">Daftar Barang Keluar</a>

            <div class="button-custom">
              
            </div>

          </div>
          <!-- /Card image -->

          <div class="px-4 pb-4">

            <div class="col">

              <!-- Table -->
              <table class="table table-hover table-responsive mb-0" id="table-barang-keluar">

                <!-- Table head -->
                <thead>
                  <tr>
                    <th class="th-lg align-middle"><a>Kode Barang</a></th>
                    <th class="th-lg align-middle"><a href="">Nama Barang</a></th>
                    <th class="th-lg align-middle"><a href="">Jumlah</a></th>
                    <th class="th-lg align-middle"><a href="">Ukuran</a></th>
                    <th class="th-lg align-middle"><a href="">Tanggal Keluar</a></th>
                  </tr>
                </thead>
                <!-- Table head -->

                <!-- Table body -->
                <tbody id="show-table-barang-keluar">
                <?php 
                  foreach ($barang_keluar as $pbm) {?>
                  <tr>
                    <td><?= $pbm->kode_barang_keluar ?></td>
                    <td><?= $pbm->nama_barang ?></td>
                    <td><?= $pbm->quantity ?></td>
                    <td><?= $pbm->size ?></td>
                    <td><?= date('d M Y', strtotime($pbm->created_at)) ?></td>
                  </tr>
                  <?php } ?>
                </tbody>
                <!-- Table body -->
              </table>
              <!-- Table -->
            </div>

          </div>
        </div>

      </section>
      <!-- Section: Basic examples -->

  </div>

</main>