<footer class="footer text-center">
		<div class="container">
			<small class="copyright">
				Designed with <i class="fas fa-heart"></i> by <a href="https://themes.3rdwavemedia.com/" target="_blank">Xiaoying Riley</a> for developers
				&copy; <strong><?php echo date('Y'); ?></strong> All rights reserved.
			</small>
				<!--/* This template is free as long as you keep the footer attribution link. If you'd like to use the template without the attribution link, you can buy the commercial license via our website: themes.3rdwavemedia.com Thank you for your support. :) */-->
				<?php if (ENVIRONMENT=='development'): ?>
					<p class="pull-right text-muted">
						Framework MAster Version: <strong><?php echo CI_BOOTSTRAP_VERSION; ?></strong>,
						CI Version: <strong><?php echo CI_VERSION; ?></strong>,
						Elapsed Time: <strong>{elapsed_time}</strong> seconds,
						Memory Usage: <strong>{memory_usage}</strong>
						MySql :<strong><?=$this->db->database?></strong>
					</p>
				<?php endif; ?>

		</div><!--//container-->
</footer><!--//footer-->
<style media="screen">
.footer {
    position: fixed;
    bottom: 0;
    width: 100%;
    height: 70px;
    background-color: #494d55;
}
.text-muted {
    color: #c3ced8!important;
}

</style>
