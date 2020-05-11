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

        <div class="card card-cascade narrower z-depth-1">

          <!-- Card image -->
          <div class="view view-cascade gradient-card-header blue-gradient narrower py-2 mx-4 mb-3 d-flex justify-content-between align-items-center">

            <div>
              <button type="button" class="btn btn-outline-white btn-rounded btn-sm px-2"><i class="fas fa-th-large mt-0"></i></button>
              <button type="button" class="btn btn-outline-white btn-rounded btn-sm px-2"><i class="fas fa-columns mt-0"></i></button>
            </div>

            <a href="" class="white-text mx-3">Daftar Pengajuan Barang Masuk</a>

            <div>
              <button type="button" class="btn btn-outline-white btn-rounded btn-sm px-2"><i class="fas fa-pencil-alt mt-0"></i></button>
              <button type="button" class="btn btn-outline-white btn-rounded btn-sm px-2"><i class="fas fa-eraser mt-0"></i></button>
              <button type="button" class="btn btn-outline-white btn-rounded btn-sm px-2"><i class="fas fa-info-circle mt-0"></i></button>
            </div>

          </div>
          <!-- /Card image -->

          <div class="px-4">

            <div class="table-responsive">

              <!-- Table -->
              <table class="table table-hover mb-0" id="table-barang-masuk">

                <!-- Table head -->
                <thead>
                  <tr>
                    <th class="th-lg"><a>Kode Barang</a></th>
                    <th class="th-lg"><a href="">Nama Barang</a></th>
                    <th class="th-lg"><a href="">Jumlah</a></th>
                    <th class="th-lg"><a href="">Ukuran</a></th>
                    <th class="th-lg"><a href="">Tanggal Masuk</a></th>
                    <th class="th-lg"><a href="">Status</a></th>
                  </tr>
                </thead>
                <!-- Table head -->

                <!-- Table body -->
                <tbody>
                <?php 
                  foreach ($pengajuan_barang_masuk as $pbm) {?>
                  <tr>
                        <td><?= $pbm->kode_barang ?></td>
                        <td><?= $pbm->nama_barang ?></td>
                        <td><?= $pbm->quantity ?></td>
                        <td><?= $pbm->size ?></td>
                        <td><?= date('d-m-y', strtotime($pbm->created_at)) ?></td>
                        <td><?= $pbm->status_barang ?></td>
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