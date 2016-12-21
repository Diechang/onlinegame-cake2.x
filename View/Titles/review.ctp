<?php
//Title vars
$titleWithStrs = $this->Common->titleWithStrs($title["Title"]["title_official"], $title["Title"]["title_read"], $title["Title"]["title_abbr"], $title["Title"]["title_sub"]);
//set blocks
$this->assign("title", $titleWithStrs["Abbr"] . " ユーザーレビュー");
$this->assign("keywords", $this->TitlePage->metaKeywords($this->request->params["action"], $title["Title"]["title_official"], $title["Title"]["title_read"], $title["Title"]["title_abbr"], $title["Title"]["title_sub"]));
$this->assign("description", $titleWithStrs["Sub"] . "のユーザーレビューです。プレイヤーのみなさんのレビュー（口コミ）を読んで" . $titleWithStrs["Sub"] . "の評判をチェック！");
//assigns
$this->assign("title_header", $this->element("title_header"));
$this->assign("title_nav_floating", $this->element("title_nav_floating", array("title" => $title)));
//pankuz
$this->set("pankuz_for_layout", array(array("str" => $titleWithStrs["Case"], "url" => array("action" => "index", "path" => $title["Title"]["url_str"], "ext" => "html")), "ユーザーレビュー"));
//OGP
$this->element("title_ogp", array("titleWithStrs" => $titleWithStrs));
?>
<?php echo $this->Session->flash()?>

<!-- nav -->
<?php echo $this->element("title_nav")?>

<!-- review -->
<section class="title-review">
	<h1>
		<span class="main">プレイヤーのレビュー・評価投稿一覧（<?php echo number_format($title["Titlesummary"]["vote_count_review"])?>）</span>
		<span class="sub"><?php echo $title["Title"]["title_official"]?>へのレビュー・評価</span>
	</h1>

	<?php echo $this->element("title_votes", array("votes" => $reviews, "titleData" => $title["Title"], "all" => false))?>

	<!--Official Link-->
	<?php echo $this->element("title_officiallink", array("titleWithStrs" => $titleWithStrs))?>
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
