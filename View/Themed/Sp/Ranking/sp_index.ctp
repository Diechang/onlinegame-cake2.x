<?php
//set blocks
$this->assign("title", "【" . $label . "】人気オンラインゲームランキング");
$this->assign("keywords", $label . ",人気,ランキング,オンラインゲーム");
$this->assign("description", "【" . $label . "】人気オンラインゲームランキングです。ジャンル別の人気オンラインゲームがすぐわかる！");
?>
<div class="pageInfo">
	<h1 class="pageTitle">
		<span class="main"><span class="label label-primary"><?php echo $label?></span>人気オンラインゲームランキング</span>
		<span class="sub">正式サービス、各種テスト開始から2年以内の人気オンラインゲームランキングです</span>
	</h1>
</div>
<?php echo $this->Gads->ads320();?>
<!-- ranking -->
<section class="ranking">
	<section class="all">
		<?php echo $this->element("loop_ranking_data", array("rankings" => $rankings))?>
	</section>
	<?php echo $this->Gads->adsResponsive();?>
	<!-- genres -->
	<section class="genres">
		<h2>ジャンル別ランキング</h2>
		<?php echo $this->element("loop_ranking_categories", array("categoryRankings" => $categoryRankings))?>
	</section>
<?php if(!empty($norankings)):?>
	<!-- waits -->
	<section class="waits">
		<h2>評価がまだ投稿されていないゲーム</h2>
		<ul class="borderedLinks textLinks">
<?php foreach($norankings as $key => $norank):?>
			<li>
				<a href="<?php echo $this->Common->titleLinkUrl($norank["Title"]["url_str"]);?>">
					<?php echo $this->Common->titleSeparatedDiv($norank["Title"]["title_official"], $norank["Title"]["title_read"])?>
				</a>
			</li>
<?php endforeach;?>
		</ul>
	</section>
<?PHP endif;?>
</section>
