<?php if (isset($home_page)): ?>
	<header class="banner">
		<div class="banner-display-wrapper">
			<div class="banner-display">
				<h1>Welcome To FaithWraps</h1>
				<h3>Style to wrap your beliefs around</h3>
			</div>
		</div>
	</header>
	<?= $mason_grid; ?>
	<?php endif; ?>  
 <?= isset($twitter_feed) ? $twitter_feed : '' ; ?>
