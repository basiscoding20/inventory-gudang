<body class="">
  <div class="wrapper ">
    <div class="sidebar" data-color="purple" data-background-color="white" data-image="<?= base_url('assets') ?>/assets/img/sidebar-1.jpg">
      <!--
        Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

        Tip 2: you can also add an image using data-image tag
    -->
      <div class="logo"><a href="http://www.creative-tim.com" class="simple-text logo-normal">
          Creative Tim
        </a></div>
      <div class="sidebar-wrapper">
        <ul class="nav">

        <?php 
          $result = $this->db->get_where('menus', array('level_menu' => $this->session->userdata('level'), 'sub_menu' => 0));
          foreach ($result->result() as $main) {?>
               <li class="nav-item <?= $this->uri->segment(2) == $main->link ? 'active' : '' ?>">
                  <a class="nav-link" href="<?= base_url($this->session->userdata('link').'/'.$main->link) ?>">
                    <i class="material-icons"><?= $main->icon ?></i>
                    <p><?= $main->nama_menu ?></p>
                  </a>
                </li>
        <?php } ?>
                      
        </ul>
      </div>
    </div>