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

        <div class="card card-cascade narrower z-depth-1" id="card-table-barang-masuk">

          <!-- Card image -->
          <div class="view view-cascade gradient-card-header blue-gradient narrower py-2 mx-4 mb-3 d-flex justify-content-between align-items-center">

            <div>
              <button type="button" class="btn btn-outline-white btn-rounded btn-sm px-2"><i class="fas fa-th-large mt-0"></i></button>
              <button type="button" class="btn btn-outline-white btn-rounded btn-sm px-2"><i class="fas fa-columns mt-0"></i></button>
            </div>

            <a href="" class="white-text mx-3">Daftar Barang Gudang</a>

            <div class="button-custom">
              
            </div>

          </div>
          <!-- /Card image -->

          <div class="px-4 pb-4">

            <div class="col">

              <!-- Table -->
              <table class="table table-hover table-responsive mb-0" id="table-barang-masuk">

                <!-- Table head -->
                <thead>
                  <tr>
                    <th>Aksi</th>
                    <th class="th-lg align-middle"><a>Kode Barang</a></th>
                    <th class="th-lg align-middle"><a href="">Nama Barang</a></th>
                    <th class=" align-middle"><a href="">Jumlah</a></th>
                    <th class=" align-middle"><a href="">Ukuran</a></th>
                    <th class="th-lg align-middle"><a href="">Tanggal Masuk</a></th>
                    <th class="th-lg align-middle"><a href="">Status</a></th>
                  </tr>
                </thead>
                <!-- Table head -->

                <!-- Table body -->
                <tbody id="show-table-barang-masuk">
                <?php 
                  foreach ($barang_masuk as $pbm) {?>
                  <tr>
                    <td>
                      <button <?= $pbm->status_gudang == 4 ? 'disabled' : ''; ?> class="btn btn-sm m-0 btn-primary add-pengajuan" data-kode="<?= $pbm->kode_barang_masuk ?>" data-nama="<?= $pbm->nama_barang ?>" data-size="<?= $pbm->size ?>" data-quantity="<?= $pbm->quantity ?>"><span class="fas fa-edit" data-toggle="tooltip" data-placement="top" title="" data-original-title="Pengajuan Keluar"></span></button>
                    </td>
                    <td><?= $pbm->kode_barang_masuk ?></td>
                    <td><?= $pbm->nama_barang ?></td>
                    <td><?= $pbm->quantity ?></td>
                    <td><?= $pbm->size ?></td>
                    <td><?= date('d M Y', strtotime($pbm->created_at)) ?></td>
                    <td class="<?php if($pbm->status_gudang == 4){ echo "warning-color-dark white-text";}if($pbm->status_gudang == 1){echo "success-color-dark white-text";}else{echo "primary-color-dark white-text";} ?>"><?= $pbm->status_barang ?></td>
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


<div class="modal fade" id="add_pengajuan" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-modal="true">
  <div class="modal-dialog modal-sm cascading-modal" role="document">
    <!-- Content -->
    <div class="modal-content">

      <!-- Header -->
      <div class="modal-header mb-0 light-blue darken-3 white-text">
        <h6 class="text-left">Pengajuan Barang Keluar</h6>
        <a type="button" class="close waves-effect waves-light" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </a>
      </div>
      <!-- Body -->
      <div class="modal-body mb-0">
          <input type="hidden" name="kode_barang">
          Apakah Anda Yakin ingin mengajukan pengambilan barang ini ?
        <div class="text-center mt-2">
          <button class="btn btn-primary" id="kirimValidasi">Ya <i class="fas fa-paper-plane ml-1"></i></button>
        </div>

      </div>
    </div>
    <!-- Content -->
  </div>
</div>