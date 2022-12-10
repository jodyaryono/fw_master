<!DOCTYPE html>
<html lang="en">
<head>
  <title>Sistem Dokumentasi</title>
  <!-- Meta -->
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="">
  <link rel="shortcut icon" href="favicon.ico">
  <link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
  <!-- FontAwesome JS -->
  <!-- <script defer src="<?php //echo base_url('assets/docs/')?>fontawesome/js/all.js"></script> -->
  <!-- <script src="https://use.fontawesome.com/releases/v5.15.3/js/all.js" data-auto-replace-svg="nest"></script> -->

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" >
  <!-- Global CSS -->
  <link rel="stylesheet" href="<?php echo base_url('assets/docs/')?>plugins/bootstrap/css/bootstrap.min.css">
  <!-- <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"> -->
  <!-- Plugins CSS -->
  <link rel="stylesheet" href="<?php echo base_url('assets/docs/')?>plugins/elegant_font/css/style.css">
  <!-- Theme CSS -->
  <link id="theme-style" rel="stylesheet" href="<?php echo base_url('assets/docs/')?>css/styles.css">

</head>

<body class="landing-page">


  <div class="page-wrapper">

    <!-- ******Header****** -->
    <header class="header text-center fixed-top">
      <div class="container">
        <div class="branding">
          <h3 class="logo">
            <br>
            <span aria-hidden="true" class="icon_documents_alt icon"></span>
            <span style="font-size:24px;" class="text-highlight">Sistem</span><span style="font-size:24px;" class="text-bold">Dokumentasi</span>
          </h3>
        </div><!--//branding-->
        <div class="tagline">
          <p>Sistem Dokumentasi Aplikasi</p>
        </div><!--//tagline-->

        <!-- <div class="main-search-box pt-3 pb-4 d-inline-block">
          <form class="form-inline search-form justify-content-center" action="" method="get">
            <input type="text" placeholder="Enter search terms..." name="search" class="form-control search-input">
            <button type="submit" class="btn search-btn" value="Search"><i class="fas fa-search"></i></button>
          </form>
        </div> -->
      </div><!--//container-->
    </header><!--//header-->

    <section class="cards-section text-center">
      <div class="container">
        <div style="height:250px">

        </div>
        <?php //var_dump($modules); ?>
        <h2 class="title"><?php echo $this->Admin_user_model->GetSettings('DOKUMENTASI_HEADER') ?></h2>
        <div class="intro">
          <p><?php echo $this->Admin_user_model->GetSettings('DOKUMENTASI_DESCRIPTION') ?></p>
        </div><!--//intro-->
        <div id="cards-wrapper" class="cards-wrapper row">

          <?php foreach ($modules as $key => $value): ?>
            <div class="item item-<?php echo $value->color_name?> col-lg-4 col-6">
              <div class="item-inner">
                <div class="icon-holder">
                  <i style="font-weight: 900;" class="icon fa <?php echo $value->icon?>"></i>
                </div><!--//icon-holder-->
                <h3 class="title"><?php echo $value->modules ?></h3>
                <p class="intro"><?php echo $value->keterangan ?></p>
                <a class="link" href="<?php echo base_url('docs/content/'.$value->id)?>"><span></span></a>
              </div><!--//item-inner-->
            </div><!--//item-->
          <?php endforeach; ?>


        </div><!--//cards-->

      </div><!--//container-->
    </section><!--//cards-section-->
  </div><!--//page-wrapper-->




  <!-- Main Javascript -->
  <script type="text/javascript" src="<?php echo base_url('assets/docs/')?>plugins/jquery-3.4.1.min.js"></script>
  <script type="text/javascript" src="<?php echo base_url('assets/docs/')?>plugins/bootstrap/js/bootstrap.min.js"></script>
  <script type="text/javascript" src="<?php echo base_url('assets/docs/')?>plugins/stickyfill/dist/stickyfill.min.js"></script>
  <script type="text/javascript" src="<?php echo base_url('assets/docs/')?>js/main.js"></script>

</body>
</html>
