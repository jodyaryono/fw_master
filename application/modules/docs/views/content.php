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
  <script defer src="<?php echo base_url('assets/docs/')?>fontawesome/js/all.js"></script>
  <!-- Global CSS -->
  <link rel="stylesheet" href="<?php echo base_url('assets/docs/')?>plugins/bootstrap/css/bootstrap.min.css">
  <!-- Plugins CSS -->
  <link rel="stylesheet" href="<?php echo base_url('assets/docs/')?>plugins/prism/prism.css">
  <link rel="stylesheet" href="<?php echo base_url('assets/docs/')?>plugins/elegant_font/css/style.css">

  <!-- Theme CSS -->
  <link id="theme-style" rel="stylesheet" href="<?php echo base_url('assets/docs/')?>css/styles.css">

</head>
<body class="body-green">
<style media="screen">
.hgt{
  height:50px;
}
@media screen and (max-width: 600px)
{
  .hgt {
    height:100px;
  }
}



</style>
  <div class="page-wrapper">
    <!-- ******Header****** -->
    <header id="header" class="header">
      <div class="container">
        <div class="hgt">

        </div>
        <div class="branding">
          <h1 class="logo">
            <a href="<?php echo base_url('docs') ?>">
              <span aria-hidden="true" class="icon_documents_alt icon"></span>
              <span style="font-size:24px;" class="text-highlight">Sistem</span><span style="font-size:24px;" class="text-bold">Dokumentasi</span>
            </a>
          </h1>
        </div><!--//branding-->
        <div class="text-center">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?php echo base_url('docs') ?>">Home</a></li>
            <?php if ($data): ?>
              <li class="breadcrumb-item active"><?php echo $data->modules ?></li>
            <?php endif; ?>
          </ol>
        </div>
        <!-- <div class="top-search-box">
        <form class="form-inline search-form justify-content-center" action="" method="get">
        <input type="text" placeholder="Search..." name="search" class="form-control search-input" style="width:600px">
        <button type="submit" class="btn search-btn" value="Search"><i class="fas fa-search"></i></button>
      </form>
    </div> -->
  </div><!--//container-->
</header><!--//header-->


<div class="doc-wrapper">

  <div class="container">
    <?php if ($data): ?>
      <div id="doc-header" class="doc-header text-center">
        <h1 class="doc-title"><i class="<?php echo $data->icon?>"></i> <?php echo $data->modules ?></h1>
        <div class="meta"><i class="far fa-clock"></i> Update Terakhir: <?php echo datetime_dsp($data->updated_datetime) ?> Oleh: <?php echo $data->first_name." ".$data->last_name ?> </div>
      </div><!--//doc-header-->
      <div class="doc-body row">

        <div class="doc-sidebar col-md-3 col-12 order-0 d-none d-md-flex ">
          <div id="doc-nav" class="doc-nav">
            <nav id="doc-menu" class="nav doc-menu flex-column sticky">
              <?php foreach ($submodul as $key => $value): ?>
                <a class="nav-link scrollto" href="#<?php echo createSlug($value->title,'_')?>-section"><?php echo $value->title?></a>
                <?php
                $this->db->where('parent',$value->id);
                $sub=$this->db->get('dokumentasi_submodul')->result();
                ?>
                <?php if ($sub): ?>
                  <nav class="doc-sub-menu nav flex-column">
                    <?php foreach ($sub as $key2 => $value2): ?>
                      <a class="nav-link scrollto" href="#<?php echo createSlug($value2->title)?>"><?php echo $value2->title ?></a>
                    <?php endforeach; ?>
                  </nav>
                <?php endif; ?>
              <?php endforeach; ?>
              <a class="nav-link scrollto" href="#header">Kembali</a>
            </nav><!--//doc-menu-->

          </div>
        </div><!--//doc-sidebar-->

        <div class="doc-content col-md-9 col-12 order-1 d-md-flex">
          <div class="content-inner">
            <?php foreach ($submodul as $key => $value): ?>
              <?php
              $this->db->where('parent',$value->id);
              $sub=$this->db->get('dokumentasi_submodul')->result();
              ?>
              <?php if ($sub): ?>
                <section id="<?php echo createSlug($value->title,'_')?>-section" class="doc-section">
                  <h2 class="section-title"><?php echo $value->title; ?></h2>
                  <?php echo $value->content; ?>
                  <?php foreach ($sub as $key2 => $value2): ?>
                    <div id="<?php echo createSlug($value2->title,'_')?>"  class="section-block">
                      <h3 class="block-title"><?php echo $value2->title; ?></h3>
                      <?php echo $value2->content; ?>
                    </div><!--//section-block-->
                  <?php endforeach; ?>
                </section><!--//doc-section-->
              <?php else: ?>
                <section id="<?php echo createSlug($value->title,'_')?>-section" class="doc-section">
                  <h2 class="section-title"><?php echo $value->title ?></h2>
                  <div class="section-block">
                    <?php echo $value->content; ?>
                  </div>
                </section><!--//doc-section-->
              <?php endif; ?>
            <?php endforeach; ?>
          </div><!--//content-inner-->
        </div><!--//doc-content-->

      </div><!--//doc-body-->
    </div><!--//container-->
  <?php else: ?>
    Dokumentasi masih kosong Isi dokumentasi terlebih dahulu
  <?php endif; ?>
</div><!--//doc-wrapper-->

</div><!--//page-wrapper-->




<!-- Main Javascript -->
<script type="text/javascript" src="<?php echo base_url('assets/docs/')?>plugins/jquery-3.4.1.min.js"></script>
<script type="text/javascript" src="<?php echo base_url('assets/docs/')?>plugins/bootstrap/js/bootstrap.min.js"></script>
<script type="text/javascript" src="<?php echo base_url('assets/docs/')?>plugins/prism/prism.js"></script>
<script type="text/javascript" src="<?php echo base_url('assets/docs/')?>plugins/jquery-scrollTo/jquery.scrollTo.min.js"></script>
<script type="text/javascript" src="<?php echo base_url('assets/docs/')?>plugins/stickyfill/dist/stickyfill.min.js"></script>
<script type="text/javascript" src="<?php echo base_url('assets/docs/')?>js/main.js"></script>

</body>
</html>
