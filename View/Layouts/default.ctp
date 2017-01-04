<!DOCTYPE HTML>
<!--[if lt IE 7 ]><html class="ie ie6"><![endif]-->
<!--[if IE 7 ]><html class="ie ie7"><![endif]-->
<!--[if IE 8 ]><html class="ie ie8"><![endif]-->
<!--[if IE 9 ]><html class="ie ie9"><![endif]-->
<!--[if (gt IE 9)|!(IE)]><!--><html><!--<![endif]-->
<head>
<meta charset="utf-8">

<title><?php echo $this->fetch("title")?> - オンラインゲームライフ</title>
<meta name="Keywords" content="<?php echo $this->fetch("keywords")?>">
<meta name="Description" content="<?php echo $this->fetch("description")?>">

<?php echo $this->fetch("meta")?>

<?php echo $this->Meta->ogpTags()?>

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

<body<?php if(isset($body_class)):?> class="<?php echo $body_class?>"<?php endif;?>>
<?php
	echo $this->element('code_analytics');
	echo $this->element('code_fbsdk');
?>

<?php
	echo $this->element('global_header', array(), array("cache" => array("config" => "element")));
?>
	
	<aside class="pankuz">
		<ul>
			<li class="top"><a href="/">トップ</a></li>
			<?php echo $this->Common->pankuzLinks($pankuz_for_layout)?>
		</ul>
	</aside>

<?php
	//title header
	echo $this->fetch("title_header");
?>

	<!-- Contents -->
	<div class="contents">
		<div class="contents-wrap">
			<div class="contents-body">
				<!-- Main contents -->
				<div class="contents-main">
					
					<?php echo $this->Session->flash()?>

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
	echo $this->element("left_platform", array(), array("cache" => array("config" => "element")));
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
	//title nav
	echo $this->fetch("title_nav_floating");
?>
</header>

<!-- JS -->
<?php echo $this->fetch("script")?>

<?php echo $this->fetch("json_ld")?>

</body>
</html>
