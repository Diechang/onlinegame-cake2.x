<?php
//Title vars
$titleWithStrs = $this->Common->titleWithStrs($title["Title"]["title_official"], $title["Title"]["title_read"], $title["Title"]["title_abbr"], $title["Title"]["title_sub"]);
//set blocks
$this->assign("title", "評価点数 | " . $titleWithStrs["Abbr"]);
$this->assign("keywords", $this->TitlePage->metaKeywords(str_replace("sp_", "", $this->request->params["action"]), $title["Title"]["title_official"], $title["Title"]["title_read"], $title["Title"]["title_abbr"], $title["Title"]["title_sub"]));
$this->assign("description", $titleWithStrs["Sub"] . "の評価点数です。"
							. ((!empty($title["Titlesummary"]["vote_count_vote"]) ? $title["Titlesummary"]["vote_count_vote"] . "件の評価が投稿されています。オンラインゲーム選びの参考にどうぞ！"
								: "まだ投稿がありません。" . (($title["Title"]["votable"]) ? "評価の投稿をお待ちしております！" : ""))));
//assigns
$this->assign("title_header", $this->element("title_header"));
// $this->assign("title_nav_floating", $this->element("title_nav_floating", array("title" => $title)));
//pankuz
// $this->set("pankuz_for_layout", array(array("str" => $titleWithStrs["Case"], "url" => array("action" => "index", "path" => $title["Title"]["url_str"], "ext" => "html")), "評価点数"));
//json ld
// $this->assign("json_ld", $this->JsonLd->breadCrumbList(array(
// 	array("name" => $titleWithStrs["Case"], "id" => $this->Html->url(array("action" => "index", "path" => $title["Title"]["url_str"], "ext" => "html")), true),
// 	"評価点数",
// )));
// $this->append("json_ld", $this->JsonLd->titleRating($title, $titleWithStrs["Case"]));
//OGP
$this->element("title_ogp", array("titleWithStrs" => $titleWithStrs));
?>

<!-- nav -->
<?php echo $this->element("title_nav")?>


<h1 class="title-headline">
	<span class="main">プレイヤーの評価</span>
	<span class="sub"><?php echo $title["Title"]["title_official"]?>のプレイヤー評価</span>
</h1>

<!-- rating -->
<section class="title-rating">
	<div class="counts">
		<div class="rate">
			<div class="caption">総合評価</div>
			<div class="value">
				<span class="num"><?php echo $this->Common->pointFormat($title["Titlesummary"]["vote_avg_all"], " -- ")?></span>点
			</div>
			<?php echo $this->Common->starZmdi($title["Titlesummary"]["vote_avg_all"], 125)?>
		</div>
		<div class="counts-bottom">
			<div class="count count-review">
				<div class="caption">レビュー</div>
				<div class="value"><span class="num"><?php echo number_format($title["Titlesummary"]["vote_count_review"])?></span>件</div>
			</div>
			<div class="count count-vote">
				<div class="caption">評価投稿</div>
				<div class="value"><span class="num"><?php echo number_format($title["Titlesummary"]["vote_count_vote"])?></span>件</div>
			</div>
		</div>
	</div>

	<div class="rates">
		<ul>
<?php foreach($ratings["details"] as $detKey => $detail):?>
			<li>
				<div class="caption"><?php echo $detail["label"]?></div>
				<?php echo $this->Common->starZmdi($ratings["ratings"]["vote_avg_" . $detKey])?>
				<div class="num"><?php echo $this->Common->pointFormat($ratings["ratings"]["vote_avg_" . $detKey])?>点</div>
			</li>
<?php endforeach;?>
		</ul>
	</div>

<!--Official Link-->
<?php echo $this->element("title_officiallink", array("titleWithStrs" => $titleWithStrs))?>
</section>

<?php echo $this->Gads->adsResponsive()?>

<!-- vote form -->
<section id="form" class="title-form-vote">
	<h2>レビュー・評価を投稿する</h2>
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
