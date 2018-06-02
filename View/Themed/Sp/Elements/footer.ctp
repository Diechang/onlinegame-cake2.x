	<!-- footer -->
	<footer>
		<ul class="social">	
			<li class="facebook"><?php echo $this->Html->image("design_sp/social_facebook.png", array("alt" => "Facebook", "width" => 40, "height" => 40, "url" => "//www.facebook.com/onlinegame.life"));?></li>
			<li class="twitter"><?php echo $this->Html->image("design_sp/social_twitter.png", array("alt" => "Twitter", "width" => 40, "height" => 40, "url" => "//twitter.com/diechang1031"));?></li>
		</ul>
		<nav class="about">
			<ul>
				<li><?php echo $this->Html->link("当サイトについて", array("controller" => "pages", "action" => "about", "ext" => "html"))?></li>
				<li><?php echo $this->Html->link("リンク集", array("controller" => "links", "path" => "index", "ext" => "html"))?></li>
				<li><?php echo $this->Html->link("サイトマップ", array("controller" => "pages", "action" => "sitemap", "ext" => "html"))?></li>
				<li><?php echo $this->Html->link("お問合せ", array("controller" => "pages", "action" => "contact", "ext" => "html"))?></li>
			</ul>
		</nav>
		<div class="copyright">
			<p class="image">画像や文章の無断転載はお断り致します。<br>
			当サイトにおける一部の画像・データの著作権は各コンテンツ開発元・運営会社に帰属します。
			<p class="site">Copyright (c) オンラインゲームライフ</p>
		</div>
	</footer>

<!-- JS -->
<script src="/js/oglsp.js"></script>
<script src="/js/ogl.utils.js"></script>
<script src="/js/oglsp.slide.js"></script>

<!-- JS Social -->
<script type="text/javascript" src="//platform.twitter.com/widgets.js"></script>
<script src="//apis.google.com/js/platform.js" async defer>{lang: 'ja'}</script>
<script type="text/javascript" src="//b.st-hatena.com/js/bookmark_button.js" charset="utf-8" async="async"></script>

<?php if (Configure::read('debug') > 0):?>
<div style="width: 100%; overflow: auto;">
<h2 style="margin: 0 20px; font-size:20px;">SQL dump</h2>
<?php echo $this->element('sql_dump');?>
<h2 style="margin: 0 20px; font-size:20px;">$this->request</h2>
<?php debug($this->request);?>
<h2 style="margin: 0 20px; font-size:20px;">$this->viewVars</h2>
<?php debug($this->viewVars);?>
</div>
<?php endif;?>