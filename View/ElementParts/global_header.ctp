<!-- header -->
<header>
	<div class="header-body">
		<h1 class="logo"><?php echo $this->Html->image("design/logo_header.png", array("alt" => "【オンラインゲームライフ】-無料オンラインゲーム情報-", "width" => 230, "height" => 40, "url" => "/"));?></h1>
		<div class="search">
			<form action="http://www.google.co.jp/cse" id="cse-search-box" target="_blank">
				<div class="gSearch">
					<input type="hidden" name="cx" value="partner-pub-5378944923532596:hrh39ml3dzq">
					<input type="hidden" name="ie" value="UTF-8">
					<input type="text" class="gSearch-text" name="q" size="31">
					<button type="submit" class="gSearch-button" name="sa"><i class="zmdi zmdi-search zmdi-hc-2x"></i></button>
				</div>
			</form>
			<script type="text/javascript" src="http://www.google.co.jp/coop/cse/brand?form=cse-search-box&amp;lang=ja"></script>
		</div>
		<div class="shares">
			<ul>
				<!-- Facebook -->
				<li><div class="fb-like" data-href="<?php echo Configure::read("Site.url")?>" data-layout="button" data-action="like" data-show-faces="false" data-share="false"></div></li>
				<!-- Twitter -->
				<li><a href="http://twitter.com/share" class="twitter-share-button" data-url="<?php echo Configure::read("Site.url")?>" data-count="true">Tweet</a></li>
				<!-- Google+1 -->
				<li><div class="g-plusone" data-size="medium" data-annotation="none" data-href="<?php echo Configure::read("Site.url")?>"></div></li>
				<!-- Hatena -->
				<li><a href="http://b.hatena.ne.jp/entry/<?php echo Configure::read("Site.url")?>" class="hatena-bookmark-button" data-hatena-bookmark-layout="standard-noballoon" data-hatena-bookmark-lang="ja" title="このエントリーをはてなブックマークに追加"><img src="https://b.st-hatena.com/images/entry-button/button-only@2x.png" alt="このエントリーをはてなブックマークに追加" width="20" height="20" style="border: none;"></a></li>
			</ul>
		</div>
		<div class="counts">
			<ul>
				<li><i class="zmdi zmdi-gamepad"></i> タイトル数 <span class="count"><?php echo $headCountTitle?></span>件</li>
				<li><i class="zmdi zmdi-comments"></i> レビュー <span class="count"><?php echo $headCountReview?></span>件</li>
				<li><i class="zmdi zmdi-thumb-up-down"></i> 評価 <span class="count"><?php echo $headCountVote?></span>件</li>
			</ul>
		</div>
	</div>
	<!-- global navigation -->
	<nav class="gNav">
		<ul>
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
</header>
