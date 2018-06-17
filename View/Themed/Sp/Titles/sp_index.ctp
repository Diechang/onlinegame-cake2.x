<?php
//Title vars
$titleWithStrs = $this->Common->titleWithStrs($title["Title"]["title_official"], $title["Title"]["title_read"], $title["Title"]["title_abbr"], $title["Title"]["title_sub"]);
//set blocks
$this->assign("title", $titleWithStrs["All"]);
$this->assign("keywords", $this->TitlePage->metaKeywords(str_replace("sp_", "", $this->request->params["action"]), $title["Title"]["title_official"], $title["Title"]["title_read"], $title["Title"]["title_abbr"], $title["Title"]["title_sub"]));
$this->assign("description", $titleWithStrs["Sub"] . "のトップページです。" . (!empty($title["Title"]["Spec"]) ? "動作環境、" : "") . (!empty($title["Title"]["video"]) ? "関連動画、" : "") . "評価点数やレビューページへもこちらからどうぞ");
//assigns
$this->assign("title_header", $this->element("title_header"));
// $this->assign("title_nav_floating", $this->element("title_nav_floating", array("title" => $title)));
//pankuz
// $this->set("pankuz_for_layout", array($titleWithStrs["Case"]));
//json ld
// $this->assign("json_ld", $this->JsonLd->breadCrumbList($titleWithStrs["Case"]));
// $this->append("json_ld", $this->JsonLd->titleRating($title, $titleWithStrs["Case"]));
//OGP
$this->element("title_ogp", array("titleWithStrs" => $titleWithStrs));
?>

<!-- nav -->
<?php echo $this->element("title_nav")?>

<!-- details -->
<?php echo $this->element("title_details", array("titleWithStrs" => $titleWithStrs, "intro" => true))?>

<!-- spec -->
<?php if(!empty($title["Spec"])):?>
<section class="title-spec">
	<h2>動作環境</h2>
	<?php echo $this->element("title_specs", array("specs" => $title["Spec"]))?>

<?php if(!empty($title["Titlesummary"]["pc_count"])):?>
	<div class="moreLink"><a href="<?php echo $this->Common->titleLinkUrl($title["Title"]["url_str"], "pc")?>"><i class="zmdi zmdi-laptop"></i> 快適動作の推奨スペックPCを探す</a></div>
<?php endif;?>
</section>
<?php endif;?>

<!-- movie -->
<?php if(!empty($title["Title"]["video"])):?>
<section class="title-movie">
	<h2>関連動画</h2>
	<?php echo $this->TitlePage->videoEmbed($title["Title"]["video"], "100%", 200)?>
	<section class="bottom">
		<!--Official Link-->
		<?php echo $this->element("title_officiallink", array("titleWithStrs" => $titleWithStrs))?>
	</section>
</section>
<?php endif;?>


<?php if(!empty($title["Titlesummary"]["package_count"])):?>
<!-- Packages -->
<section class="title-package">
	<h2>パッケージ製品</h2>
	<ul class="borderedLinks imageLinks">
	<?php foreach($title["Package"] as $package):?>
		<li>
			<a href="<?php echo $this->Common->adLinkUrl($package, "package")?>">
				<div class="images">
					<div class="banner">
						<?php echo $this->Html->image($package["ad_part_img_src"],
							array("alt" => (!empty($package["ad_part_text"])) ? $package["ad_part_text"] : ""))?>
					</div>
				</div>
				<div class="data">
					<div class="title"><?php echo $package["ad_part_text"]?></div>
					<div class="date">発売日: <?php echo $this->Common->dateFormat($package["release"], "date")?></div>
					<div class="price"><?php echo number_format($package["price"])?><span class="unit">円</span></div>
					<?php echo $this->Common->adTrackImg($package)?>
				</div>
			</a>
		</li>
	<?php endforeach;?>
	</ul>
</section>
<?php endif;?>

<!-- recommends -->
<?php echo $this->element("title_recommends", array($recommends))?>
