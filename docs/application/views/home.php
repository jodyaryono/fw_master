
<section class="cards-section text-center">
	<div class="container">
		<?php echo $this->Doc_model->getSetting('WELCOME'); ?>
		<div id="cards-wrapper" class="cards-wrapper row">

			<?php foreach ($categories as $key => $value): ?>
				<div class="item item-<?php echo $value->color; ?> col-lg-4 col-6">
					<div class="item-inner">
						<div class="icon-holder">
							<i class="icon <?php echo $value->icon; ?>"></i>
						</div><!--//icon-holder-->
						<h3 class="title"><?php echo $value->title; ?></h3>
						<p class="intro"><?php echo $value->intro; ?></p>
						<a class="link" href="<?php echo base_url($value->link); ?>"><span></span></a>
					</div><!--//item-inner-->
				</div><!--//item-->
			<?php endforeach; ?>
			
		</div><!--//cards-->
	</div><!--//container-->
</section><!--//cards-section-->
