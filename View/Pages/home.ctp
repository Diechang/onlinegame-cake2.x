<!-- information -->
<div class="information">
	<h1 class="siteTitle">
		<span class="caption">無料オンラインゲームの人気ランキング・レビュー</span>
		<span class="logo"><?php echo $this->Html->image("design/logo.png", array("alt" => "オンラインゲームライフ", "width" => 400));?></span>
	</h1>
	<div class="text">
		<p>【オンラインゲームライフ】-無料オンラインゲーム情報-では、無料で遊べるオンラインゲーム情報やレビューなど、オンラインゲーム好きのあなたのために、MMORPGをはじめ、アクションやスポーツなど、無料のオンラインゲームだけではなく、月額課金制の本格オンラインゲームまで幅広く紹介していきます。</p>
		<p>レビューや評価点数の投稿もドンドンお待ちしています。<br>
		あなたの投稿で面白い人気オンラインゲームランキングが出来ていきます。<br>
		まずは左のタイトル一覧から探してみてください。</p>
		<p>是非、あなた好みの面白いオンラインゲームを見つけてくださいね。</p>
		<div class="gAds"><?php echo $this->Gads->both468()?></div>
	</div>
</div>

<!-- ranking -->
<section class="ranking">
	<h1>
		<span class="main">人気オンラインゲームランキング</span>
		<span class="sub">ユーザーの評価投稿による人気オンラインゲームランキングです</span>
	</h1>
	<section class="all">
		<?php echo $this->element("loop_ranking_data", array("rankings" => $rankings))?>
	</section>

	<section class="genres">
		<h2 class="headline">ジャンル別ランキング</h2>
		<?php echo $this->element("loop_ranking_categories", array("categoryRankings" => $categoryRankings))?>

		<div class="more">
			<?php echo $this->Html->link('人気オンラインゲームランキング一覧 <i class="zmdi zmdi-chevron-right"></i>', array("controller" => "ranking", "action" => "index", "path" => "index", "ext" => "html"), array("escape" => false));?>
		</div>
	</section>
</section>

<!-- review -->
<section class="review">
	<h1>
		<span class="main">新着ユーザーレビュー</span>
		<span class="sub">オンラインゲーム選びの参考にどうぞ</span>
	</h1>
	<section class="recents">
		<?php echo $this->element("loop_review_data", array("reviews" => $recents))?>
	</section>
	<section class="waits">
		<h2 class="headline">
			<span class="main">レビュー・評価投稿募集中！</span>
			<span class="sub">まだ投稿がされていないオンラインゲームの一部です</span>
		</h2>

		<?php echo $this->element("loop_review_waits", array("waits" => $waits))?>
		<div class="more"><a href="http://feeds.feedburner.com/dz-game/review" class="feed"><i class="icon icon-feed"></i> 新着レビューをRSSで！</a></div>
	</section>
</section>

<!-- test -->
<section class="test">
	<h1>
		<span class="main">無料テスト実施中タイトル</span>
		<span class="sub">無料で新作ゲームが体験できるテストサービス実施中のタイトルです</span>
	</h1>
	<section class="current">
<?php if(empty($testCurrents)):?>
		<p class="none">現在実施中のテスト情報がありません</p>
<?php else:?>
		<ul>
	<?php foreach($testCurrents as $test):?>
			<li>
				<h2 class="title">
					<?php echo $this->Common->test_label($test["Service"]["id"]);?>
					<?php echo $this->Common->title_link_text(
						$this->Common->title_separated_span($test["Title"]["title_official"], $test["Title"]["title_read"]),
						$test["Title"]["url_str"])?>
				</h2>
				<div class="thumb">
					<?php echo $this->Common->title_link_thumb(
						$this->Common->thumb_name($test["Title"]["thumb_name"]),
						$this->Common->title_separated_case($test["Title"]["title_official"], $test["Title"]["title_read"]),
						$test["Title"]["url_str"], 120)?>
				</div>
				<div class="data">
					<p class="description"><?php echo nl2br(strip_tags($test["Title"]["description"]))?></p>
					<div class="date"><span class="fwBold">実施期間</span>：<?php echo $this->Common->date_format($test["Title"]["test_start"], "date")?> 〜 <?php echo $this->Common->date_format($test["Title"]["test_end"], "date")?></div>
				</div>
			</li>
	<?php endforeach;?>
		</ul>
<?php endif;?>
	</section>
	<section class="future">
		<h2 class="headline">
			<span class="main">もうすぐ実施予定！</span>
			<span class="sub">これから実施される予定のテスト情報です</span>
		</h2>
<?php if(empty($testFutures)):?>
		<p class="none">実施予定のテスト情報がありません</dt>
<?php else:?>
		<ul>
	<?php foreach($testFutures as $test):?>
			<li>
				<div class="thumb">
					<?php echo $this->Common->title_link_thumb(
						$this->Common->thumb_name($test["Title"]["thumb_name"]),
						$this->Common->title_separated_case($test["Title"]["title_official"], $test["Title"]["title_read"]),
						$test["Title"]["url_str"], 80)?>
				</div>
				<div class="title">
					<?php echo $this->Common->title_link_text(
						$this->Common->title_separated_span($test["Title"]["title_official"], $test["Title"]["title_read"]),
						$test["Title"]["url_str"])?>
				</div>
				<div class="date">
					<?php echo $this->Common->test_label($test["Service"]["id"]);?>
					<?php echo $this->Common->date_format($test["Title"]["test_start"], "date")?> 〜 <?php echo $this->Common->date_format($test["Title"]["test_end"], "date")?>
				</div>
			</li>
	<?php endforeach;?>
		</ul>
<?php endif;?>
	</section>
</section>

<!-- search -->
<section class="search">
	<h1>
		<span class="main">オンラインゲーム検索</span>
		<span class="sub">自分好みのオンラインゲームを探そう</span>
	</h1>
	<div class="form-search">
<?php echo $this->element("search_title_form");?>
	</div>
</section>

<!-- news -->
<section class="news">
	<!-- new titles -->
	<section class="title">
		<h1>新着オンラインゲーム</h1>
		<ul>
<?php foreach($newers as $newer):?>
			<li>
				<a href="<?php echo $this->Html->url(array("controller" => "titles", "action" => "index", "path" => $newer["Title"]["url_str"], "ext" => "html"));?>">
					<div class="thumb">
						<?php echo $this->Html->image($this->Common->thumb_name($newer["Title"]["thumb_name"]),
						array("alt" => $this->Common->title_separated_case($newer["Title"]["title_official"], $newer["Title"]["title_read"]), "width" => 80));?>
					</div>
					<p>
						<?php echo $this->Common->title_separated_span($newer["Title"]["title_official"], $newer["Title"]["title_read"]);?>
					</p>
				</a>
			</li>
<?php endforeach;?>
		</ul>
	</section>
	<!-- new fansites -->
	<section class="fansite">
		<h1>新着ファンサイト</h1>
		<ul>
<?php foreach($fansites as $fansite):?>
			<li>
				<?php echo $this->Html->link($fansite["Fansite"]["site_name"], $fansite["Fansite"]["site_url"], array("class" => "site", "target" => "_blank"))?>
				<?php echo $this->Html->link($fansite["Title"]["title_official"], array("controller" => "titles", "action" => "link", "path" => $fansite["Title"]["url_str"], "ext" => "html"), array("class" => "title"))?>
			</li>
<?php endforeach;?>
		</ul>
	</section>
	<!-- new info -->
	<section class="info">
		<h1>更新履歴</h1>
		<dl>
<?php foreach($updates as $update):?>
			<dt><?php echo $this->Common->date_format($update["Update"]["created"], "date")?></dt>
			<dd><?php echo $update["Update"]["text"]?></dd>
<?php endforeach;?>
		</dl>
	</section>
</section>