<div class="container-fluid twitter_feed_container">
	<div class="row">
		<div class="col-sm-6 col-sm-offset-3 text-center" id="twitter-feed">
			<i class="fa fa-long-arrow-left nav prev"></i>
			<i class="fa fa-long-arrow-right nav next"></i>
			<h3>Twitter</h3>
			<h5><a href="https://twitter.com/faithwraps">@FaithWraps</a></h5>
			<i class="fa fa-twitter"></i>
			<div class="tweets">
				<?php 
				$counter = 1;
				foreach($tweets as $tweet): 
					?>
				<p class="tweet" data-id="<?= $counter++; ?>">
					<?= $tweet['message']; ?>
					<span><a href="https://twitter.com/FaithWraps/status/<?=$tweet['tweet_id'];?>" target="_blank"><?= date('F j, Y - g:i a', strtotime($tweet['time_tweeted'])); ?></a></span>
				</p>
			<?php endforeach; ?>
		</div>
	</div>
</div>
</div>
