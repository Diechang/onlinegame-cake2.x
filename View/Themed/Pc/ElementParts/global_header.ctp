<!-- header -->
<header>
	<div class="header-body">
		<h1 class="logo"><?php echo $this->Html->image("design/logo_header.png", array("alt" => "【オンラインゲームライフ】-無料オンラインゲーム情報-", "width" => 230, "height" => 40, "url" => "/"));?></h1>
		<div class="search">
			<?php echo $this->Form->create(false, array(
				"url" => array("controller" => "search", "action" => "gsearch"),
				"type" => "get",
				"class" => "search-form",
				"inputDefaults" => array(
					"label" => false,
					"div" => false
				)
			))?>
				<div class="search-inputs">
					<?php echo $this->Form->input("q", array(
						"type" => "text",
						"class" => "search-text",
						"size" => "31",
						"placeholder" => "キーワード検索",
					))?>
					<?php echo $this->Form->button('<i class="zmdi zmdi-search zmdi-hc-2x"></i>', array(
						"type" => "submit",
						"class" => "search-button"
					))?>
				</div>
			<?php echo $this->Form->end()?>
		</div>
		<div class="shares">
			<ul>
				<!-- Facebook -->
				<li><div class="fb-like" data-href="<?php echo $this->Html->url("/", true)?>" data-layout="button" data-action="like" data-show-faces="false" data-share="false"></div></li>
				<!-- Twitter -->
				<li><a href="https://twitter.com/share" class="twitter-share-button" data-url="<?php echo $this->Html->url("/", true)?>" data-count="true">Tweet</a></li>
				<!-- Google+1 -->
				<li><div class="g-plusone" data-size="medium" data-annotation="none" data-href="<?php echo $this->Html->url("/", true)?>"></div></li>
				<!-- Hatena -->
				<li><a href="https://b.hatena.ne.jp/entry/<?php echo $this->Html->url("/", true)?>" class="hatena-bookmark-button" data-hatena-bookmark-layout="standard-noballoon" data-hatena-bookmark-lang="ja" title="このエントリーをはてなブックマークに追加"><img src="https://b.st-hatena.com/images/entry-button/button-only@2x.png" alt="このエントリーをはてなブックマークに追加" width="20" height="20" style="border: none;"></a></li>
			</ul>
		</div>
		<div class="counts">
			<ul>
				<li><i class="zmdi zmdi-gamepad"></i> タイトル数 <span class="count"><?php echo number_format($headCountTitle)?></span>件</li>
				<li><i class="zmdi zmdi-comments"></i> レビュー <span class="count"><?php echo number_format($headCountReview)?></span>件</li>
				<li><i class="zmdi zmdi-thumb-up-down"></i> 評価 <span class="count"><?php echo number_format($headCountVote)?></span>件</li>
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
