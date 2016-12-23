<?php
//Title vars
$titleWithStrs = $this->Common->titleWithStrs($title["Title"]["title_official"], $title["Title"]["title_read"], $title["Title"]["title_abbr"], $title["Title"]["title_sub"]);
//set blocks
$this->assign("title", $titleWithStrs["Abbr"] . " 評価点数");
$this->assign("keywords", $this->TitlePage->metaKeywords($this->request->params["action"], $title["Title"]["title_official"], $title["Title"]["title_read"], $title["Title"]["title_abbr"], $title["Title"]["title_sub"]));
$this->assign("description", $titleWithStrs["Sub"] . "の評価点数です。投票期間・項目別にプレイヤーの評価を見ることができるのでオンラインゲーム選びの参考にどうぞ！");
//assigns
$this->assign("title_header", $this->element("title_header"));
$this->assign("title_nav_floating", $this->element("title_nav_floating", array("title" => $title)));
//pankuz
$this->set("pankuz_for_layout", array(array("str" => $titleWithStrs["Case"], "url" => array("action" => "index", "path" => $title["Title"]["url_str"], "ext" => "html")), "評価点数"));
//OGP
$this->element("title_ogp", array("titleWithStrs" => $titleWithStrs));
?>
<?php echo $this->Session->flash()?>

<!-- nav -->
<?php echo $this->element("title_nav")?>


<!-- rating -->
<section class="title-rating">
	<h1>
		<span class="main">プレイヤーの評価</span>
		<span class="sub"><?php echo $title["Title"]["title_official"]?>のプレイヤー評価</span>
	</h1>
	<!-- total -->
	<section class="total">
		<div class="counts">
			<div class="rate">
				<div class="caption">総合評価</div>
				<div class="value">
					<span class="num"><?php echo $this->Common->pointFormat($title["Titlesummary"]["vote_avg_all"], " -- ")?></span>点
				</div>
				<?php echo $this->Common->starBlock($title["Titlesummary"]["vote_avg_all"])?>
			</div>
			<div class="count count-review">
				<div class="caption">レビュー</div>
				<div class="value"><span class="num"><?php echo number_format($title["Titlesummary"]["vote_count_review"])?></span>件</div>
			</div>
			<div class="count count-vote">
				<div class="caption">評価投稿</div>
				<div class="value"><span class="num"><?php echo number_format($title["Titlesummary"]["vote_count_vote"])?></span>件</div>
			</div>
		</div>

		<div class="rates">
			<ul>
<?php foreach($ratings["details"] as $detKey => $detail):?>
				<li>
					<div class="caption"><?php echo $detail["label"]?></div>
					<div class="num"><?php echo $this->Common->pointFormat($ratings["ratings"]["vote_avg_" . $detKey])?>点</div>
					<?php echo $this->Common->starBlock($ratings["ratings"]["vote_avg_" . $detKey])?>
				</li>
<?php endforeach;?>
			</ul>
		</div>

		<!--Official Link-->
		<?php echo $this->element("title_officiallink", array("titleWithStrs" => $titleWithStrs))?>
	</section>

	
	<section class="separates">
		<div class="separates-wrap">
<?php foreach($ratings["details"] as $detail):?>
			<div class="separate">
				<h2><?php echo $detail["label"]?></h2>
				<ul>
	<?php for($i = 5; $i > 0 ; $i--):?>
					<li>
						<div class="graph"><div class="bar" style="width: <?php echo (($detail[$i . "pt"] == 0) ? 0 : ($detail[$i . "pt"] / $ratings["ratings"]["vote_count_vote"]) * 100)?>%;"></div></div>
						<div class="point"><?php echo $i;?>点</div>
						<div class="count"><?php echo $detail[$i . "pt"]?>件</div>
					</li>
	<?php endfor;?>
				</ul>
			</div>
<?php endforeach;?>
		</div>

		<!--Official Link-->
		<?php echo $this->element("title_officiallink", array("titleWithStrs" => $titleWithStrs))?>
	</section>
</section>

<!-- vote form -->
<section id="form" class="title-form-vote">
	<h1>
		<span class="main">レビュー・評価を投稿する</span>
		<span class="sub">みなさまの投稿がランキングに反映されます</span>
	</h1>
<?php echo $this->element("form_vote", array(
	"titleId"	=> $title["Title"]["id"],
	"serviceId"	=> $title["Title"]["service_id"],
	"votable"	=> $title["Title"]["votable"],
	"voteItems"	=> $voteItems,
))?>
</section>

<!-- details -->
<?php echo $this->element("title_details", array("titleWithStrs" => $titleWithStrs))?>

<!-- recommends -->
<?php echo $this->element("title_recommends", array($recommends))?>
