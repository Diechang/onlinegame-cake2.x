<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xmlns:og="http://ogp.me/ns#" xmlns:fb="http://ogp.me/ns/fb#">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title><?php echo $title_for_layout ?> - <?php echo Configure::read("Site.name")?></title>
<meta name="Keywords" content="<?php echo $keywords_for_layout ?>" />
<meta name="Description" content="<?php echo $description_for_layout ?>" />
<?php echo $this->Common->metaTags($metaTags)?>

<?php echo $this->Ogp->output()?>

<meta http-equiv="Content-Script-Type" content="text/javascript" />
<meta http-equiv="Content-Style-Type" content="text/css" />
<link rel="alternate" type="application/rss+xml" title="最新オンラインゲーム" href="http://feeds.feedburner.com/dz-game/newstart" />
<link rel="alternate" type="application/rss+xml" title="新着レビュー投稿" href="http://feeds.feedburner.com/dz-game/review" />
<link rel="alternate" type="application/rss+xml" title="無料テスト情報" href="http://feeds.feedburner.com/dz-game/test" />
<link rel="alternate" type="application/rss+xml" title="新着オンラインゲーム" href="http://feeds.feedburner.com/dz-game/newgames" />
<link href="/css/common.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="/js/jquery.js"></script>
<script type="text/javascript" src="/js/lib.js"></script>
<script type="text/javascript" src="/js/hc.js"></script>

<?php echo $scripts_for_layout?>

<script type="text/javascript" src="http://apis.google.com/js/plusone.js">{lang: 'ja'}</script>
<script type="text/javascript" src="/js/analytics.js"></script>
</head>

<body>
<!-- FB SDK -->
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/ja_JP/sdk.js#xfbml=1&version=v2.3&appId=293306697370465";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>

<div id="back">
	<div id="wrap">
		<h1><?php echo $h1_for_layout ?></h1>
		<!-- Contents -->
		<div id="contents" class="clearfix">
			<p class="pankuz"<?php echo $this->RichSnippets->ns()?>><span<?php echo $this->RichSnippets->typeof("Breadcrumb")?>><a href="/" <?php echo $this->RichSnippets->rel("url")?><?php echo $this->RichSnippets->property("title")?><?php echo $this->RichSnippets->content(Configure::read("Site.name"))?>>オンラインゲームライフトップ</a></span><?php echo $this->Common->pankuz($pankuz_for_layout)?></p>
			<!-- Main -->
			<div id="main" class="clearfix">
				<!-- Center -->
				<div id="center" class="contents">
					<?php
						echo $content_for_layout;
					echo $this->element("ad_center_bottoms", array(), array("cache" => true));
					?>
				</div>
				<!-- Left -->
				<div id="left">
<?php
	echo $this->element("ad_left_tops", array(), array("cache" => true));
	echo $this->element("left_category", array(), array("cache" => true));
	echo $this->element("left_style", array(), array("cache" => true));
	echo $this->element("left_service", array(), array("cache" => true));
	echo $this->element("left_pushsite");
	echo $this->element("left_pcshop", array(), array("cache" => true));
	echo $this->element("left_feeds");
if($this->request->params["controller"] != "titles")
{
	echo $this->element("left_share");
}
	echo $this->element("left_ranking", array(), array("cache" => true));
	echo $this->element("ad_left_bottoms", array(), array("cache" => true));
?>
				</div>
			</div>
			<!-- Right -->
			<div id="right">
<?php
	echo $this->element("ad_right_tops", array(), array("cache" => true));
	echo $this->element('right_test', array(), array("cache" => true));
	echo $this->element('right_pickup', array(), array("cache" => true));
	echo $this->element('right_voted');
	echo $this->element('right_fblikebox');
	echo $this->element("ad_right_bottoms", array(), array("cache" => true));
?>

			</div>
		</div>

<?php
	echo $this->element('global_header', array(), array("cache" => true));
?>
<?php
if (Configure::read('debug') > 0)
{
	echo $this->element('sql_dump');
	debug($this->request);
}
?>
<?php
	echo $this->element('footer');
?>

	</div>
</div>
</body>
</html>
