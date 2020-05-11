<body class="fixed-sn white-skin">

  <!-- Main Navigation -->
  <header>

    <!-- Sidebar navigation -->
    <div id="slide-out" class="side-nav sn-bg-4 fixed">
      <ul class="custom-scrollbar">

        <!-- Logo -->
        <li class="logo-sn waves-effect py-3">
          <div class="text-center">
            <a href="<?= base_url('assets') ?>/html/dashboards/v-2.html" target="_blank" class="pl-0"><img src="<?= base_url('assets/img/logo.png') ?>"></a>
          </div>
        </li>

        <!-- Search Form -->
        <li>
          <form class="search-form" role="search">
            <div class="md-form mt-0 waves-light">
              <input type="text" class="form-control py-2" placeholder="Search">
            </div>
          </form>
        </li>

        <!-- Side navigation links -->
        <li>
          <ul class="collapsible collapsible-accordion">

            <?php

                $main_menu = $this->db->get_where('menus', 
                                          array('sub_menu' => 0, 'level_menu' => $this->session->userdata('level')));
                foreach ($main_menu->result() as $main) {

                  $sub_menu = $this->db->get_where('menus', 
                                          array('sub_menu' => $main->id, 'level_menu' => $this->session->userdata('level')));

              if ($sub_menu->num_rows() > 0) {?>
                <li>
                  <a class="collapsible-header waves-effect arrow-r">
                    <i class="w-fa <?= $main->icon ?>"></i><?= $main->nama_menu ?><i class="fas fa-angle-down rotate-icon"></i>
                  </a>
                  <div class="collapsible-body">

                    <ul>
                      <?php foreach ($sub_menu->result() as $sub) {?>
                        <li>
                          <a href="<?= base_url($this->session->userdata('link')) ?>/<?= $sub->link ?>" class="waves-effect"><?= $sub->nama_menu ?></a>
                        </li>
                      <?php } ?>
                    </ul>
                  </div>
                </li>
              <?php } else { ?>
                <li>
                  <a href="<?= base_url($this->session->userdata('link')) ?>/<?= $main->link ?>" class="collapsible-header waves-effect"><i
                  class="w-fa <?= $main->icon ?>"></i><?= $main->nama_menu ?></a>
                </li>
              <?php }
              }
            ?>

          </ul>
        </li>
        <!-- Side navigation links -->

      </ul>
      <div class="sidenav-bg mask-strong"></div>
    </div>
    <!-- Sidebar navigation -->
