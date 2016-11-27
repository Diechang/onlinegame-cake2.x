<?php
//Title vars
$title_with_str = $this->Common->title_with_str($title["Title"]["title_official"], $title["Title"]["title_read"], $title["Title"]["title_abbr"], $title["Title"]["title_sub"]);
//set blocks
$this->assign("title", $title_with_str["All"]);
$this->assign("keywords", $this->TitlePage->meta_keywords($this->request->params["action"], $title["Title"]["title_official"], $title["Title"]["title_read"], $title["Title"]["title_abbr"], $title["Title"]["title_sub"]));
$this->assign("description", $title_with_str["Sub"] . "のトップページです。動作環境や関連動画、" . $title_with_str["Case"] . "の評価点数やレビューページへもこちらからどうぞ");
//assigns
$this->assign("title_header", $this->element("title_header"));
$this->assign("title_nav_floating", $this->element("title_nav_floating", array("title" => $title)));
//pankuz
$this->set("pankuz_for_layout", array($title_with_str["Case"]));
//OGP
$this->element("title_ogp", array("title_with_str" => $title_with_str));
?>
<?php echo $this->Session->flash()?>

<!-- nav -->
<?php echo $this->element("title_nav")?>

<!-- details -->
<?php echo $this->element("title_details", array("title_with_str" => $title_with_str, "intro" => true))?>

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
	<!--Official Link-->
	<?php echo $this->element("title_officiallink", array("title_with_str" => $title_with_str))?>
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
				<?php echo $this->Common->ad_link_image($package, "package")?>
				<?php echo $this->Common->ad_track_img($package)?>
			</div>
			<div class="data">
				<div class="title"><?php echo $this->Common->ad_link_text($package, "package")?></div>
				<div class="date">発売日: <?php echo $this->Common->date_format($package["release"], "date")?></div>
				<div class="price"><?php echo number_format($package["price"])?><span class="unit">円</span></div>
			</div>
			<div class="rakuten"><?php echo $this->Common->ad_link_rakuten_search($package["ad_part_text"])?></div>
		</li>
	<?php endforeach;?>
	</ul>
	<!--Official Link-->
	<?php echo $this->element("title_officiallink", array("title_with_str" => $title_with_str))?>
</section>
<?php endif;?>

<!-- recommends -->
<?php echo $this->element("title_recommends", array($recommends))?>
