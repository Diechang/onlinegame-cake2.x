<?php
//Title vars
$titleWithStrs = $this->Common->titleWithStrs($title["Title"]["title_official"], $title["Title"]["title_read"], $title["Title"]["title_abbr"], $title["Title"]["title_sub"]);
//set blocks
$this->assign("title", "ユーザーレビュー | " . $titleWithStrs["Abbr"]);
$this->assign("keywords", $this->TitlePage->metaKeywords(str_replace("sp_", "", $this->request->params["action"]), $title["Title"]["title_official"], $title["Title"]["title_read"], $title["Title"]["title_abbr"], $title["Title"]["title_sub"]));
$this->assign("description", $titleWithStrs["Sub"] . "のユーザーレビューです。"
							. ((!empty($title["Titlesummary"]["vote_count_review"]) ? $title["Titlesummary"]["vote_count_review"] . "件のレビューが投稿されています。プレイヤーのみなさんのレビュー（口コミ）を読んでの評判をチェック！"
								: "まだ投稿がありません。" . ($title["Title"]["votable"] ? "レビューの投稿をお待ちしております！" : ""))));
//assigns
$this->assign("title_header", $this->element("title_header"));
// $this->assign("title_nav_floating", $this->element("title_nav_floating", array("title" => $title)));
//pankuz
// $this->set("pankuz_for_layout", array(array("str" => $titleWithStrs["Case"], "url" => array("action" => "index", "path" => $title["Title"]["url_str"], "ext" => "html")), "ユーザーレビュー"));
//json ld
// $this->assign("json_ld", $this->JsonLd->breadCrumbList(array(
// 	array("name" => $titleWithStrs["Case"], "id" => $this->Html->url(array("action" => "index", "path" => $title["Title"]["url_str"], "ext" => "html")), true),
// 	"ユーザーレビュー",
// )));
// $this->append("json_ld", $this->JsonLd->titleRating($title, $titleWithStrs["Case"]));
//OGP
$this->element("title_ogp", array("titleWithStrs" => $titleWithStrs));
?>

<!-- nav -->
<?php echo $this->element("title_nav")?>


<h1 class="title-headline">
	<span class="main">プレイヤーのレビュー・評価投稿一覧</span>
	<span class="sub"><?php echo $title["Title"]["title_official"]?>へのレビュー・評価</span>
</h1>


<!-- review -->
<section class="title-review">

	<?php echo $this->element("title_votes", array("votes" => $reviews, "titleData" => $title["Title"], "all" => false))?>

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
