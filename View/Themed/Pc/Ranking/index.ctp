<?php
//set blocks
$this->assign("title", "【" . $label . "】人気オンラインゲームランキング");
$this->assign("keywords", $label . ",人気,ランキング,オンラインゲーム");
$this->assign("description", "【" . $label . "】人気オンラインゲームランキングです。ジャンル別の人気オンラインゲームがすぐわかる！");
?>
<!-- ranking -->
<section class="ranking">
	<h1 class="pageTitle">
		<span class="main"><span class="label label-primary"><?php echo $label?></span>人気オンラインゲームランキング</span>
		<span class="sub">正式サービス、各種テスト開始から2年以内の人気オンラインゲームランキングです</span>
	</h1>
	<!-- all -->
	<section class="all">
		<?php echo $this->element("loop_ranking_data", array("rankings" => $rankings))?>
	</section>
	<!-- genres -->
	<section class="genres">
		<h2 class="headline">ジャンル別ランキング</h2>
		<?php echo $this->element("loop_ranking_categories", array("categoryRankings" => $categoryRankings))?>
	</section>
<?php if(!empty($norankings)):?>
	<!-- waits -->
	<section class="waits">
		<h2 class="headline">評価がまだ投稿されていないゲーム</h2>
		<p class="headline-description">プレイしたことがあるタイトルには是非投稿を！<br>
		あなたの投稿でランクインされます！</p>
		<ul class="list">
	<?php foreach($norankings as $norank):?>
			<li><?php echo $this->Common->titleLinkText(
					$this->Common->titleSeparatedSpan($norank["Title"]["title_official"], $norank["Title"]["title_read"]),
					$norank["Title"]["url_str"])?></li>
	<?php endforeach;?>
		</ul>
	</section>
<?php endif;?>
</section>