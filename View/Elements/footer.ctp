	<!-- footer -->
	<footer>
		<div class="navigations">
			<div class="navigations-body">
				<nav>
					<ul>
						<li><?php echo $this->Html->link("当サイトについて", array("controller" => "pages", "action" => "about", "ext" => "html"))?></li>
						<li><?php echo $this->Html->link("リンク集", array("controller" => "links", "path" => "index", "ext" => "html"))?></li>
						<li><?php echo $this->Html->link("サイトマップ", array("controller" => "pages", "action" => "sitemap", "ext" => "html"))?></li>
						<li><?php echo $this->Html->link("お問合せ", array("controller" => "pages", "action" => "contact", "ext" => "html"))?></li>
					</ul>
					<div class="browsers"></div>
				</nav>
				<!-- ACR rankings -->
				<div class="rankings">
					<div class="access">
						<h2>
							<span class="main">注目のオンラインゲームランキング</span>
							<span class="sub">タイトルページ別のアクセス数によるランキングです。</span>
						</h2>
						<div class="ranking"><script src="http://pranking8.ziyu.net/js/diechang.js"></script></div>
					</div>
					<div class="page">
						<h2>
							<span class="main">逆アクセスランキング</span>
							<span class="sub">当サイトへのアクセス数によるランキングです。</span>
						</h2>
						<div class="ranking"><script src="http://rranking12.ziyu.net/js/diechang.js"></script></div>
					</div>
				</div>
			</div>
		</div>
		<div class="copyright">
			<div class="copyright-body">
				<p class="text">Copyright (c) オンラインゲームライフ All rights reserved.<br>
				画像や文章の無断転載はお断り致します。<br>
				当サイトにおける一部の画像・データの著作権は各コンテンツ開発元・運営会社に帰属します。
				<a href="http://www.ziyu.net/" target="_blank"><img src="http://file.ziyu.net/rranking.gif" alt="アクセスランキング" border="0" width="35" height="11" /></a>
				<a href="http://www.ziyu.net/" target="_blank"><img src="http://pranking8.ziyu.net/img.php?diechang" alt="ブログパーツ" border="0" width="35" height="11" /></a></p>
				<div class="logo"><?php echo $this->Html->image("design/logo_footer.png", array("alt" => "オンラインゲームライフ", "width" => 230, "height" => 40));?></div>
			</div>
		</div>
	</footer>
<!-- JS -->
<script src="/js/ogl.js"></script>
<script src="/js/ogl.floatings.js"></script>

<!-- JS Social -->
<script type="text/javascript" src="http://platform.twitter.com/widgets.js"></script>
<script src="https://apis.google.com/js/platform.js" async defer>{lang: 'ja'}</script>
<script type="text/javascript" src="https://b.st-hatena.com/js/bookmark_button.js" charset="utf-8" async="async"></script>

<!-- <script type="text/javascript" src="<?php echo Configure::read("Site.url")?>ra/script.php"></script><noscript><p><img src="<?php echo Configure::read("Site.url")?>ra/track.php" alt="" width="1" height="1" /></p></noscript> -->

<?php
if (Configure::read('debug') > 0)
{
	echo $this->element('sql_dump');
	debug($this->request);
}
?>