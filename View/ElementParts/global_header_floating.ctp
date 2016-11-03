<!-- header -->
<header class="floating">
	<!-- global navigation -->
	<nav class="gNav">
		<ul>
			<li class="logo"><?php echo $this->Html->image("design/logo_header.png", array("alt" => "【オンラインゲームライフ】-無料オンラインゲーム情報-", "width" => 115, "height" => 20, "url" => "/"));?></li>
			<li>
				<?php echo $this->Html->link("人気ランキング", array("controller" => "ranking", "action" => "index", "path" => "index", "ext" => "html"))?>
				<ul>
					<li><?php echo $this->Html->link("総合", array("controller" => "ranking", "action" => "index", "path" => "index", "ext" => "html"))?></li>
<?php foreach($headerCategories as $category):?>
					<li><?php echo $this->Html->link($category["Category"]["str"], array("controller" => "ranking", "action" => "index", "path" => $category["Category"]["path"], "ext" => "html"))?></li>
<?php endforeach;?>
				</ul>
			</li>
			<li><?php echo $this->Html->link("レビュー", array("controller" => "review", "action" => "index"))?></li>
			<li><?php echo $this->Html->link("ポータルサイト", array("controller" => "portals", "action" => "index", "ext" => "html"))?></li>
			<li>
				<?php echo $this->Html->link("ゲーム代を稼ぐ", array("controller" => "monies", "action" => "index", "ext" => "html"))?>
				<ul>
<?php foreach($headerMoneycategories as $category):?>
					<li><?php echo $this->Html->link($category["Moneycategory"]["str"], array("controller" => "monies", "action" => "view", "path" => $category["Moneycategory"]["path"], "ext" => "html"))?></li>
<?php endforeach;?>
				</ul>
			</li>
			<li><?php echo $this->Html->link("ゲーム用PC", array("controller" => "pcs", "action" => "index", "ext" => "html"))?></li>
			<li><?php echo $this->Html->link("ゲームを探す", array("controller" => "search", "action" => "index", "ext" =>"html"))?></li>
			<li class="social"><?php echo $this->Html->image("design/social_twitter.png", array("alt" => "Twitter", "width" => 40, "height" => 40, "url" => "https://twitter.com/diechang1031"));?></li>
			<li class="social"><?php echo $this->Html->image("design/social_facebook.png", array("alt" => "Facebook", "width" => 40, "height" => 40, "url" => "https://www.facebook.com/onlinegame.life"));?></li>
		</ul>
	</nav>
<?php if(isset($headerTitleData)):?>
	<nav class="titles">
		<a href="titles_index.html" class="title">
			<div class="image"><img src="../img/noimage160.gif" alt="Soul of the Ultimate Nation"></div>
			<p class="official">Soul of the Ultimate Nation</p>
		</a>
		<ul>
			<li class="current"><a href="titles_index.html">概要</a></li>
			<li><a href="titles_rating.html">評価</a></li>
			<li><a href="titles_review.html">レビュー</a></li>
			<li><a href="titles_pc.html">推奨PC</a></li>
			<li><a href="titles_link.html">攻略リンク</a></li>
			<li><a href="titles_search.html">動画・ブログ</a></li>
		</ul>
	</nav>
<?php endif;?>
</header>
