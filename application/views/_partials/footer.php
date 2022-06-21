<div style="height:70px;">	</div>
<div class="footer">
	<div class="container">
		<?php if (ENVIRONMENT=='development'): ?>
			<p class="pull-right text-muted">
				Framework MAster Version: <strong><?php echo CI_BOOTSTRAP_VERSION; ?></strong>,
				CI Version: <strong><?php echo CI_VERSION; ?></strong>,
				Elapsed Time: <strong>{elapsed_time}</strong> seconds,
				Memory Usage: <strong>{memory_usage}</strong>
				MySql :<strong><?=$this->db->database?></strong>
			</p>
		<?php endif; ?>
		<p class="text-muted">&copy; <strong><?php echo date('Y'); ?></strong> All rights reserved.</p>
	</div>
</div>

<style media="screen">
.footer {
    position: fixed;
    bottom: 0;
    width: 100%;
    height: 60px;
    line-height: 60px;
    background-color: #111213;
}
.text-muted {
    color: #c3ced8!important;
}

</style>
