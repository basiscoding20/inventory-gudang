<!-- SCRIPTS -->
  <!-- JQuery -->
  <script src="<?= base_url('assets') ?>/js/jquery-3.4.1.min.js"></script>
  <!-- Bootstrap tooltips -->
  <script type="text/javascript" src="<?= base_url('assets') ?>/js/popper.min.js"></script>
  <!-- Bootstrap core JavaScript -->
  <script type="text/javascript" src="<?= base_url('assets') ?>/js/bootstrap.js"></script>
  <!-- MDB core JavaScript -->
  <script type="text/javascript" src="<?= base_url('assets') ?>/js/mdb.min.js"></script>
  <!-- Datatables -->
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
  <script type="text/javascript" src="https://cdn.datatables.net/v/bs4/jszip-2.5.0/dt-1.10.20/b-1.6.1/b-flash-1.6.1/b-html5-1.6.1/b-print-1.6.1/datatables.min.js"></script>

  <!-- Initializations -->
  <script>
    // $('footer, .card').toggleClass('dark-card-admin');
    // $('body, .navbar').toggleClass('white-skin navy-blue-skin');
    // $(this).toggleClass('white text-dark btn-outline-black');
    // $('body').toggleClass('dark-bg-admin');
    // $('h6, .card, p, td, th, i, li a, h4, input, label').not(
    //   '#slide-out i, #slide-out a, .dropdown-item i, .dropdown-item').toggleClass('text-white');
    // $('.btn-dash').toggleClass('grey blue').toggleClass('lighten-3 darken-3');
    // $('.gradient-card-header').toggleClass('white black lighten-4');
    // $('.list-panel a').toggleClass('navy-blue-bg-a text-white').toggleClass('list-group-border');

    // SideNav Initialization
    $(".button-collapse").sideNav();

    var container = document.querySelector('.custom-scrollbar');
    var ps = new PerfectScrollbar(container, {
      wheelSpeed: 2,
      wheelPropagation: true,
      minScrollbarLength: 20
    });

    // Data Picker Initialization
    $('.datepicker').pickadate();

    // Material Select Initialization
    $(document).ready(function () {
      $('.mdb-select').material_select();
    });

    // Tooltips Initialization
    $(function () {
      $('[data-toggle="tooltip"]').tooltip()
    })

  </script>
