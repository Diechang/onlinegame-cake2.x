<?php
//Title vars
$titleWithStr["Case"]	= $this->Common->title_separated_case($title["Title"]["title_official"], $title["Title"]["title_read"]);
$titleWithStr["Span"]	= $this->Common->title_separated_span($title["Title"]["title_official"], $title["Title"]["title_read"]);
$titleWithStr["Abbr"]	= $this->Common->title_with_abbr($title["Title"]["title_official"], $title["Title"]["title_read"], $title["Title"]["title_abbr"]);
$titleWithStr["Sub"]	= $this->Common->title_with_sub($title["Title"]["title_official"], $title["Title"]["title_read"], $title["Title"]["title_sub"]);
//set blocks
$this->assign("title", $this->Common->title_all($title["Title"]["title_official"], $title["Title"]["title_read"], $title["Title"]["title_abbr"], $title["Title"]["title_sub"]));
$this->assign("keywords", $this->TitlePage->meta_keywords($this->request->params["action"], $title["Title"]["title_official"], $title["Title"]["title_read"], $title["Title"]["title_abbr"], $title["Title"]["title_sub"]));
$this->assign("description", $titleWithStr["Sub"] . "のトップページです。動作環境や関連動画、" . $titleWithStr["Case"] . "の評価点数やレビューページへもこちらからどうぞ");

$this->assign("title_header", $this->element("title_header"));
//pankuz
$this->set("pankuz_for_layout", array($titleWithStr["Case"]));
//OGP
$this->element("title_ogp", array("titleWithStr" => $titleWithStr));
?>
<?php echo $this->Session->flash()?>

<?php echo $this->element("title_nav")?>

<!-- details -->
<?php echo $this->element("title_details", array("titleWithStr" => $titleWithStr, "intro" => true))?>

<!-- spec -->
<section class="title-spec">
	<h1>
		<span class="main">動作環境</span>
		<span class="sub"><?php echo $title["Title"]["title_official"]?>の動作環境/PCスペック</span>
	</h1>
	<?php echo $this->element("title_specs", array("specs" => $title["Spec"]))?>

	<?php if(!empty($title["Titlesummary"]["pc_count"])):?>
	<div class="moreLink"><?php echo $this->Html->link("快適動作の推奨スペックPCを探す", array("action" => "pc", "path" => $title["Title"]["url_str"], "ext" => "html"))?></div>
	<?php endif;?>
</section>

<!-- movie -->
<section class="title-movie">
	<h1>
		<span class="main">関連動画</span>
		<span class="sub"><?php echo $title["Title"]["title_official"]?>の公式PV/ゲーム紹介ムービー</span>
	</h1>
	<?php echo $this->TitlePage->video_embed($title["Title"]["video"])?>

	<?php echo $this->element("title_officiallink", array("link" => $this->Common->official_link_text(
		$titleWithStr["Span"],
		$title["Title"]["ad_use"], $title["Title"]["ad_text"], $title["Title"]["official_url"], $title["Title"]["service_id"], true)))?>
</section>


<?php if(!empty($title["Titlesummary"]["package_count"])):?>
<!-- Packages -->
<section class="title-package">
	<h1>
		<span class="main">パッケージ製品</span>
		<span class="sub">ダウンロード不要で特典付き(かもしれない）</span>
	</h1>
	<ul class="list">
	<?php foreach($title["Package"] as $package):?>
		<li>
			<div class="thumb">
				<?php echo $this->Common->adLinkImage($package, "package")?>
				<?php echo $this->Common->adTrackImg($package)?>
			</div>
			<div class="data">
				<div class="title"><?php echo $this->Common->adLinkText($package, "package")?></div>
				<div class="date">発売日: <?php echo $this->Common->date_format($package["release"], "date")?></div>
				<div class="price"><?php echo number_format($package["price"])?><span class="unit">円</span></div>
			</div>
			<div class="rakuten"><?php echo $this->Common->adLinkRakutenSearch($package["ad_part_text"])?></div>
		</li>
	<?php endforeach;?>
	</ul>
	<!--Official Link-->
	<?php echo $this->element("title_officiallink", array("link" => $this->Common->official_link_text(
			$titleWithStr["Span"],
			$title["Title"]["ad_use"], $title["Title"]["ad_text"], $title["Title"]["official_url"], $title["Title"]["service_id"], true)))?>
</section>
<?php endif;?>


<?php echo $this->element("title_recommends", array($recommends))?>
