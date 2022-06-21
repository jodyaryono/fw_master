	<nav class="navbar navbar-expand-lg navbar-dark bg-dark static-top">
		<div class="container">
				<img class="img-size-50 mr-3 img-circle" src="http://localhost/fw_master_cp/assets/uploads/media/51ec5-framework_master_light.png" alt="" width="50">
				<span class="brand-text font-weight-light font-logo" style="color:white"><?php echo $site_name ?></span>
				&nbsp;&nbsp;
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="navbarResponsive">
				<ul class="navbar-nav ml-auto">
					<?php foreach ($menu as $parent => $parent_params): ?>

						<?php if (empty($parent_params['children'])): ?>

							<?php $active = ($current_uri==$parent_params['url'] || $ctrler==$parent); ?>
							<li <?php if ($active) echo 'class="active"'; ?>>
								<a class="nav-link" href='<?php echo $parent_params['url']; ?>'>
									<?php echo $parent_params['name']; ?>
								</a>
							</li>

						<?php else: ?>
							<?php $parent_active = ($ctrler==$parent); ?>
							<li class='nav-item dropdown <?php if ($parent_active) echo 'active'; ?>'>
								<a data-toggle='dropdown' class='nav-link dropdown-toggle' id="navbarDropdown" href='#'>
									<?php echo $parent_params['name']; ?> <span class='caret'></span>
								</a>
								  <div class="dropdown-menu" aria-labelledby="navbarDropdown">
										<?php foreach ($parent_params['children'] as $name => $url): ?>
											<a class="dropdown-item" href='<?php echo $url; ?>'><?php echo $name; ?></a>
										<?php endforeach; ?>
									</div>
							</li>

						<?php endif; ?>

					<?php endforeach; ?>
				</ul>
			</div>
		</div>
	</nav>
