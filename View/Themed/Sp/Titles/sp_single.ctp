<?php
//Title vars
$titleWithStrs = $this->Common->titleWithStrs($title["Title"]["title_official"], $title["Title"]["title_read"], $title["Title"]["title_abbr"], $title["Title"]["title_sub"]);
//Vote vars
$voteType		= (!empty($vote["Vote"]["review"]) ? "レビュー" : "評価");
$voteTitle		= (!empty($vote["Vote"]["title"])) ? "「" . h($vote["Vote"]["title"]) . "」 " : "【" . $this->Common->pointFormat($vote["Vote"]["single_avg"]) . "点】";
$posterName		= $this->Common->posterName($vote["Vote"]["poster_name"]);
$nameWithType	= $posterName . "の" . $voteType;
$postDate		= $this->Common->dateFormat($vote["Vote"]["created"], "datetime");
//set blocks
$this->assign("title", $voteTitle . $nameWithType . "(" . $postDate . ") | " . $titleWithStrs["Abbr"]);
$this->assign("keywords", $posterName . "," . $postDate . "," . $this->TitlePage->metaKeywords(str_replace("sp_", "", $this->request->params["action"]), $title["Title"]["title_official"], $title["Title"]["title_read"], $title["Title"]["title_abbr"], $title["Title"]["title_sub"]));
$this->assign("description", (!empty($vote["Vote"]["review"]) ? "" : "【" . $this->Common->pointFormat($vote["Vote"]["single_avg"]) . "点】") . $posterName . "が" . $titleWithStrs["Case"] . "に投稿した" . $voteType . "です。投稿日：" . $postDate);
//assigns
$this->assign("title_header", $this->element("title_header"));
// $this->assign("title_nav_floating", $this->element("title_nav_floating", array("title" => $title)));
//pankuz
// $this->set("pankuz_for_layout", array(
// 	array("str" => $titleWithStrs["Case"], "url" => array("action" => "index", "path" => $title["Title"]["url_str"], "ext" => "html")),
// 	(!empty($vote["Vote"]["review"]))
// 	? array("str" => "ユーザーレビュー", "url" => array("action" => "review", "path" => $title["Title"]["url_str"], "ext" => "html"))
// 	: array("str" => "評価点数", "url" => array("action" => "rating", "path" => $title["Title"]["url_str"], "ext" => "html")),
// 	$nameWithType,
// ));
//json ld
// $this->assign("json_ld", $this->JsonLd->breadCrumbList(array(
// 	array("name" => $titleWithStrs["Case"], "id" => $this->Html->url(array("action" => "index", "path" => $title["Title"]["url_str"], "ext" => "html")), true),
// 	(!empty($vote["Vote"]["review"]))
// 	? array("name" => "ユーザーレビュー", "id" => $this->Html->url(array("action" => "review", "path" => $title["Title"]["url_str"], "ext" => "html")), true)
// 	: array("name" => "評価点数", "id" => $this->Html->url(array("action" => "rating", "path" => $title["Title"]["url_str"], "ext" => "html")), true),
// 	$nameWithType,
// )));
// $this->append("json_ld", $this->JsonLd->titleReview($vote, $titleWithStrs["Case"]));
//OGP
$this->element("title_ogp", array(
	"ogpTitle" => $voteTitle . $nameWithType . "(" . $postDate . ") | " . $titleWithStrs["Abbr"],
	"ogpUrl" => $this->request->here,
	"ogpDescription" => (!empty($vote["Vote"]["review"])) ? mb_strimwidth($vote["Vote"]["review"], 0, 120, " …", "UTF-8") : $titleWithStrs["Case"] . "の評価",
));
?>

<!-- nav -->
<?php echo $this->element("title_nav")?>

<!-- review single -->
<section class="title-review-single">
	<h1><?php echo $this->Common->voteTitle($vote["Vote"])?></h1>
	<ul class="data">
		<li><i class="zmdi zmdi-account"></i> <?php echo $this->Common->posterName($vote["Vote"]["poster_name"])?></li>
		<li><i class="zmdi zmdi-time"></i> <?php echo $this->Common->dateFormat($vote["Vote"]["created"], "datetime")?></li>
<?php if(!empty($vote["Vote"]["pass"])):?>
		<li><a href="<?php echo $this->Html->url(array("controller" => "votes", "action" => "edit", $vote["Vote"]["id"]))?>" rel="nofollow"><i class="zmdi zmdi-edit"></i></a></li>
<?php endif;?>
	</ul>
	<div class="review">
		<p><?php echo (!empty($vote["Vote"]["review"]) ? nl2br(h($vote["Vote"]["review"])) : "（評価点数のみ）")?></p>
		<?php echo $this->Gads->textResponsive();?>
	</div>
	
	<div class="rate">
		<div class="points">
			<ul>
			<?php foreach($voteItems as $key => $voteItem):?>
				<?php if($vote["Vote"][$key] > 3):?>
				<li class="good">
			<?php elseif($vote["Vote"][$key] < 3):?>
				<li class="bad">
			<?php else:?>
				<li>
			<?php endif;?>
					<div class="caption" title="<?php echo $voteItem["label"]?>"><?php echo $voteItem["abbr"]?></div>
					<div class="num"><?php echo $vote["Vote"][$key]?><span class="unit">点</span></div>
				</li>
			<?php endforeach;?>
			</ul>
		</div>
		<div class="title-comp-rate title-comp-rate-<?php echo $this->TitlePage->goodOrBad($vote["Vote"]["single_avg"])?>">
			<div class="caption">総合評価</div>
			<div class="point"><span class="num"><?php echo $this->Common->pointFormat($vote["Vote"]["single_avg"])?></span>点</div>
			<div class="icon"><i class="zmdi zmdi-thumb-<?php echo $this->TitlePage->goodOrBad($vote["Vote"]["single_avg"], array("up", "down"))?>"></i> <?php echo ucfirst($this->TitlePage->goodOrBad($vote["Vote"]["single_avg"]))?></div>
		</div>
	</div>

	<?php echo $this->element("comp_shares", array("url" => $this->Html->url(null, true) . $this->request->here))?>

	<!--Official Link-->
	<?php echo $this->element("title_officiallink", array("titleWithStrs" => $titleWithStrs))?>
</section>

<?php if(!empty($neighbors["prev"]) or !empty($neighbors["next"])):?>
<!-- review neighbors -->
<section class="title-review-neighbors">
	<?php $neighborStr = array(
		"prev" => array(
			"label" => "前",
			"icon" => "left",
		),
		"next" => array(
			"label" => "次",
			"icon" => "right",
		))?>
	<?php foreach($neighbors as $key => $neighbor):?>
	<div class="neighbor">
		<?php if(!empty($neighbor)):?>
		<a href="<?php echo $this->Html->url(array("path" => $title["Title"]["url_str"], "voteid" => $neighbor["Vote"]["id"], "ext" => "html"))?>">
			<div class="caption caption-<?php echo $this->TitlePage->goodOrBad($neighbor["Vote"]["single_avg"])?>">
				<span class="rate"><i class="zmdi zmdi-thumb-<?php echo $this->TitlePage->goodOrBad($neighbor["Vote"]["single_avg"], array("up", "down"))?>"></i> <?php echo $this->Common->pointFormat($neighbor["Vote"]["single_avg"])?>点</span>
				<i class="zmdi zmdi-arrow-<?php echo $neighborStr[$key]["icon"]?>"></i> <?php echo $neighborStr[$key]["label"]?>のレビュー
			</div>
			<div class="review">
				<h3><?php echo $this->Common->voteTitle($neighbor["Vote"])?></h3>
				<p><?php echo mb_strimwidth(h($neighbor["Vote"]["review"]), 0, 300, "...<span class='continue'>続き</span>")?></p>
			</div>
		</a>
		<ul class="data">
			<li><i class="zmdi zmdi-account"></i> <?php echo $this->Common->posterName($neighbor["Vote"]["poster_name"])?></li>
			<li><i class="zmdi zmdi-time"></i> <?php echo $this->Common->dateFormat($neighbor["Vote"]["created"], "date")?></li>
		</ul>

		<?php else:?>
			<?php echo $this->Gads->adsResponsive()?>
		<?php endif;?>
	</div>
	<?php endforeach;?>
</section>
<?php endif;?>

<!-- details -->
<?php echo $this->element("title_details", array("titleWithStrs" => $titleWithStrs, "share" => false))?>

<!-- recommends -->
<?php echo $this->element("title_recommends", array($recommends))?>