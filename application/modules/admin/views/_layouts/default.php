<div class="wrapper">

	<?php $this->load->view('_partials/navbar'); ?>

	<?php // Left side column. contains the logo and sidebar 
	?>
	<aside class="main-sidebar">
		<section class="sidebar">
			<div class="user-panel" style="height:65px">
				<div class="pull-left info" style="left:5px">
					<p><?php echo $user->first_name; ?></p>
					<a href="panel/account"><i class="fa fa-circle text-success"></i> Online</a>
				</div>
			</div>
			<?php // (Optional) Add Search box here 
			?>
			<?php //$this->load->view('_partials/sidemenu_search'); 
			?>
			<?php $this->load->view('_partials/sidemenu'); ?>
		</section>
	</aside>

	<?php // Right side column. Contains the navbar and content of the page 
	?>
	<div class="content-wrapper">
		<section class="content-header">
			<h1><?php echo $page_title; ?></h1>
			<?php $this->load->view('_partials/breadcrumb'); ?>
		</section>
		<section class="content">
			<?php if ($this->session->flashdata('error')) {  ?>
				<div class="alert alert-danger alert-dismissible">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
					<h4><i class="icon fa fa-ban"></i> Kesalahan!</h4>
					<?php echo $this->session->flashdata('error'); ?>
				</div>
			<?php } elseif ($this->session->flashdata('success')) { ?>
				<div class="alert alert-success alert-dismissible">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
					<h4><i class="icon fa fa-check"></i> Berhasil!</h4>
					<?php echo $this->session->flashdata('success'); ?>
				</div>
			<?php } ?>
			<?php $this->load->view($inner_view); ?>
			<?php $this->load->view('_partials/back_btn'); ?>
		</section>
	</div>

	<?php // Footer 
	?>
	<?php $this->load->view('_partials/footer'); ?>

</div>