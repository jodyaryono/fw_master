<?php
$this->load->model('Doc_model');
 ?>

<header class="header text-center">
	<div class="container">
		<div class="branding">
			<?php echo $this->Doc_model->getSetting('LOGO'); ?>
		</div><!--//branding-->
		<div class="tagline">
			<?php echo $this->Doc_model->getSetting('TAGLINE'); ?>
		</div><!--//tagline-->

		<div class="main-search-box pt-3 pb-4 d-inline-block">
			<form class="form-inline search-form justify-content-center" action="" method="get">

				<input type="text" placeholder="Enter search terms..." name="search" class="form-control search-input">

				<button type="submit" class="btn search-btn" value="Search"><i class="fas fa-search"></i></button>

			</form>
		</div>

	</div><!--//container-->
</header><!--//header-->
<style media="screen">
.cards-section {
	padding: 30px 0;
	background: #ffffff;
}
.cards-section .intro {
    margin-bottom: 0px;
}
.landing-page .header {
    padding: 60px ;
}
</style>
