<!DOCTYPE HTML>
<!--[if lt IE 7 ]><html class="ie ie6"><![endif]-->
<!--[if IE 7 ]><html class="ie ie7"><![endif]-->
<!--[if IE 8 ]><html class="ie ie8"><![endif]-->
<!--[if IE 9 ]><html class="ie ie9"><![endif]-->
<!--[if (gt IE 9)|!(IE)]><!--><html><!--<![endif]-->
<head>
<meta charset="utf-8">

<title><?php echo $this->fetch("title")?></title>
<meta name="Keywords" content="<?php echo $this->fetch("keywords")?>">
<meta name="Description" content="<?php echo $this->fetch("description")?>">

<?php echo $this->fetch("meta")?>
<?php echo $this->Meta->ogptags()?>

<link rel="alternate" type="application/rss+xml" title="最新オンラインゲーム" href="http://feeds.feedburner.com/dz-game/newstart">
<link rel="alternate" type="application/rss+xml" title="新着レビュー投稿" href="http://feeds.feedburner.com/dz-game/review">
<link rel="alternate" type="application/rss+xml" title="無料テスト情報" href="http://feeds.feedburner.com/dz-game/test">
<link rel="alternate" type="application/rss+xml" title="新着オンラインゲーム" href="http://feeds.feedburner.com/dz-game/newgames">

<!-- CSS Libs -->
<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/material-design-iconic-font/2.2.0/css/material-design-iconic-font.min.css">

<!-- CSS -->
<link rel="stylesheet" href="/css/styles.css">
<?php echo $this->fetch("css")?>
<?php if(Configure::read('debug') > 0):?>
<link rel="stylesheet" href="/css/cake.css">
<?php endif;?>

<!-- JS Libs -->
<script src="/js/libs/modernizr-2.8.3.min.js"></script>
<script src="/js/libs/jquery-1.11.2.min.js"></script>

</head>

<body class="index">
<!-- FB SDK -->
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/ja_JP/sdk.js#xfbml=1&version=v2.3&appId=293306697370465";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>


<?php
	echo $this->element('global_header', array(), array("cache" => array("config" => "element")));
?>


	<!-- index slider -->
	<div class="newGames">
		<div class="newGames-body">
			<div class="thumbs">
				<ul>
<?php foreach($newGames as $newGame):?>
					<li>
						<?php echo $this->Common->title_link_thumb(
							$this->Common->thumb_name($newGame["Title"]["thumb_name"]),
							$this->Common->title_separated_case($newGame["Title"]["title_official"], $newGame["Title"]["title_read"]),
							$newGame["Title"]["url_str"], 120);?>
					</li>
<?php endforeach;?>
				</ul>
			</div>
			<div class="slide">
				<ul>
<?php foreach($newGames as $newGame):?>
					<li>
						<a href="<?php echo $this->Html->url(array("controller" => "titles", "action" => "index", "path" => $newGame["Title"]["url_str"], "ext" => "html"));?>">
							<div class="images">
								<div class="thumb"><?php echo $this->Html->image($this->Common->thumb_name($newGame["Title"]["thumb_name"]), array(
									"alt"	=> $this->Common->title_separated_case($newGame["Title"]["title_official"], $newGame["Title"]["title_read"]),
									"width"	=> 160));?></div>
								<?php echo $this->Common->star_block($newGame["Titlesummary"]["vote_avg_all"]);?>
							</div>
							<div class="texts">
								<p class="title"><?php echo $this->Common->title_separated_span($newGame["Title"]["title_official"], $newGame["Title"]["title_read"]);?></p>
								<p class="description"><?php echo strip_tags($newGame["Title"]["description"]);?></p>
							</div>
						</a>
					</li>
<?php endforeach;?>
				</ul>
			</div>
		</div>
	</div>


	<!-- Contents -->
	<div class="contents">
		<div class="contents-wrap">
			<div class="contents-body">
				<!-- Main contents -->
				<div class="contents-main">
					<main>
					<?php
						echo $this->fetch("content");
						echo $this->element("ad_center_bottoms", array(), array("cache" => array("config" => "element")));
					?>
					</main>
				</div>
				<!-- Side contents -->
				<div class="contents-side">
					<div class="floating">
<?php
	echo $this->element("ad_left_tops", array(), array("cache" => array("config" => "element")));
	echo $this->element("left_category", array(), array("cache" => array("config" => "element")));
	echo $this->element("left_style", array(), array("cache" => array("config" => "element")));
	echo $this->element("left_service", array(), array("cache" => array("config" => "element")));
	echo $this->element("left_pushsite");
	echo $this->element("left_pcshop", array(), array("cache" => array("config" => "element")));
	echo $this->element("left_feeds");
	// echo $this->element("left_share");
	echo $this->element("left_ranking", array(), array("cache" => array("config" => "element")));
	echo $this->element("ad_left_bottoms", array(), array("cache" => array("config" => "element")));
?>
					</div>
				</div>
			</div>

			<!-- Sub contents -->
			<div class="contents-sub">
				<div class="floating">

<?php
	echo $this->element("ad_right_tops", array(), array("cache" => array("config" => "element")));
	echo $this->element('right_test', array(), array("cache" => array("config" => "element")));
	echo $this->element('right_pickup', array(), array("cache" => array("config" => "element")));
	echo $this->element('right_voted');
	echo $this->element('right_fblikebox');
	echo $this->element("ad_right_bottoms", array(), array("cache" => array("config" => "element")));
?>
				</div>
			</div>
		</div>

	</div>

<?php
	echo $this->element('footer');
?>

<!-- header floating -->
<header class="floating">
<?php
	echo $this->element('global_header_floating', array(), array("cache" => array("config" => "element")));
?>
</header>

<!-- JS Libs -->
<script src="/js/libs/slick-1.5.0/slick.min.js"></script>
<!-- JS -->
<script src="/js/ogl.newgames.js"></script>
</body>
</html>