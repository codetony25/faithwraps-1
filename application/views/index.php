<?php if (isset($home_page)): ?>
	<header>
		<div class="maincontent">
			<h1>Welcome To FaithWraps</h1>
			<h3>Style to wrap your beliefs around</h3>
		</div>
	</header>
	<div class="randomScroll">
		<h2 class="text-center explore">Explore Our Items</h2>
		<div class="randomProducts">
			<?php foreach($products as $product): ?>
				<div>
					<a href="/products/<?= $product['id'] ;?>">
						<img src="/assets/img/products/<?= $product['image']; ?>"  />
						<h4><?= $product['name']; ?></h4>
					</a>
					<p>$<?=$product['price'];?></p>
				</div>
			<?php endforeach; ?>
		</div><!-- END OF randomProducts -->
	<?php endif; ?>  
 <?= isset($twitter_feed) ? $twitter_feed : '' ; ?>
