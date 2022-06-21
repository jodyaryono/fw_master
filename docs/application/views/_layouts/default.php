<body class="<?php echo $body_class; ?>">
  <div class="page-wrapper">
    <?php $this->load->view('_partials/navbar'); ?>
    <main role="main" class="container">
      <?php $this->load->view($inner_view); ?>
    </main>
    <?php $this->load->view('_partials/footer'); ?>
  </div>
