<style type="text/css">
	.twitter_feed_container {
		padding: 20px 0;
		background-color: #fff;
		width: 100%;
	}

	#twitter-feed .fa-twitter {
		font-size: 7em;
		color: pink;
	}

	#twitter-feed h3 {
		font-size: 2.5rem;
		color: #B1B1B1;
		border-bottom: 1px solid #eee;
		padding-bottom: 10px;
	}

	#twitter-feed h5 a {
		position: relative;
		color: pink;
	}

	#twitter-feed .nav {
		position: absolute;
		bottom: 7%;
		font-size: 2em;
		color: pink;
		opacity: 0.3;
		padding: 50px 0;
	}

	#twitter-feed .nav:hover {
		opacity: 0.7;
		cursor: pointer;
		transition: opacity .5s linear;
		 -moz-transition: opacity .5s linear;
		 -webkit-transition: opacity .5s linear;
	}

	#twitter-feed .nav.left {
		left: 0;
	}

	#twitter-feed .nav.right {
		right: 0;
	}

	.tweet {
		padding: 15px;
		color: #B1B1B1;
		font-size: 1em;
	}

	.tweet span {
		margin-top: 1em;
		display: block;
		font-style: italic;
		color: pink;
	}

</style>

<div class="container-fluid twitter_feed_container">
    <div class="row">
        <div class="col-sm-6 col-sm-offset-3 text-center" id="twitter-feed">
        	<i class="fa fa-long-arrow-left nav left"></i>
        	<i class="fa fa-long-arrow-right nav right"></i>
        	<h3>Twitter</h3>
        	<h5><a href="https://twitter.com/faithwraps">@FaithWraps</a></h5>
        	<i class="fa fa-twitter"></i>
        	<?php 
        		$counter = 1;
        		foreach($tweets as $tweet): 
        	?>
	        	<p class="tweet" data-id="<?= $counter++; ?>">
	        		<?= $tweet['message']; ?>
	        		<span><?= date('F j, Y - g:i a', strtotime($tweet['time_tweeted'])); ?></span>
	        	</p>
        	<?php endforeach; ?>
        </div>
    </div>
</div>