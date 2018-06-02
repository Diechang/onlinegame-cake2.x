<!DOCTYPE HTML><html>
<head>
<meta charset="utf-8">

<title><?php echo $this->fetch("title")?> - オンラインゲームライフ</title>
<meta name="Keywords" content="<?php echo $this->fetch("keywords")?>">
<meta name="Description" content="<?php echo $this->fetch("description")?>">
<meta name="viewport" content="width=device-width,initial-scale=1">

<?php echo $this->fetch("meta")?>

<?php echo $this->Meta->ogpTags()?>

<link rel="alternate" type="application/rss+xml" title="最新オンラインゲーム" href="https://feeds.feedburner.com/dz-game/newstart">
<link rel="alternate" type="application/rss+xml" title="新着レビュー投稿" href="https://feeds.feedburner.com/dz-game/review">
<link rel="alternate" type="application/rss+xml" title="無料テスト情報" href="https://feeds.feedburner.com/dz-game/test">
<link rel="alternate" type="application/rss+xml" title="新着オンラインゲーム" href="https://feeds.feedburner.com/dz-game/newgames">

<!-- CSS Libs -->
<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/material-design-iconic-font/2.2.0/css/material-design-iconic-font.min.css">

<!-- CSS -->
<link rel="stylesheet" href="/css/styles_sp.css">
<?php echo $this->fetch("css")?>
<?php if(Configure::read('debug') > 0):?>
<link rel="stylesheet" href="/css/cake.css">
<?php endif;?>

<!-- JS Libs -->
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>

</head>

<body<?php if(isset($body_class)):?> class="<?php echo $body_class?>"<?php endif;?>>
<?php
	echo $this->element('code_analytics');
	echo $this->element('code_fbsdk');
?>

<?php
	echo $this->element('global_header', array(), array("cache" => array("config" => "element_sp")));
?>

	<!-- Contents -->
	<div class="contents">
		<?php echo $this->Session->flash()?>
		
		<?php
			echo $this->fetch("content");
		?>
	</div>

<?php
	echo $this->element('footer');
?>

<!-- JS -->
<?php echo $this->fetch("script")?>
<!-- JSON-LD -->
<?php echo $this->fetch("json_ld")?>

</body>
</html>
