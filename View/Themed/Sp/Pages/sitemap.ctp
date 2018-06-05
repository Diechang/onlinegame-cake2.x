<?php
//set blocks
$this->assign("title", "サイトマップ");
$this->assign("keywords", "サイトマップ,オンラインゲームライフ");
$this->assign("description", "オンラインゲームライフのサイトマップページ。");
//pankuz
// $this->set("pankuz_for_layout", "サイトマップ");
//json ld
// $this->assign("json_ld", $this->JsonLd->breadCrumbList("サイトマップ"));
?>

<div class="pageInfo">
	<h1 class="pageTitle">サイトマップ</h1>
</div>
<!-- sitemap -->
<section class="about-sitemap">
	<section>
		<h2>人気オンラインゲームランキング</h2>
		<ul>
			<li><?php echo $this->Html->link("総合", array("controller" => "ranking", "path" => "index", "ext" => "html"))?></li>
	<?php foreach($categories as $category):?>
			<li><?php echo $this->Html->link($category["Category"]["str"], array("controller" => "ranking", "path" => $category["Category"]["path"], "ext" => "html"))?></li>
	<?php endforeach;?>
		</ul>
	</section>
	<section>
		<h2>ジャンル別オンラインゲーム</h2>
		<ul>
	<?php foreach($categories as $category):?>
			<li><?php echo $this->Html->link($category["Category"]["str"], array("controller" => "categories", "path" => $category["Category"]["path"], "ext" => "html"))?></li>
	<?php endforeach;?>
		</ul>
	</section>
	<section>
		<h2>スタイル・環境別オンラインゲーム</h2>
		<ul>
	<?php foreach($styles as $style):?>
			<li><?php echo $this->Html->link($style["Style"]["str"], array("controller" => "styles", "path" => $style["Style"]["path"], "ext" => "html"))?></li>
	<?php endforeach;?>
		</ul>
	</section>
	<section>
		<h2>サービス状態別オンラインゲーム</h2>
		<ul>
	<?php foreach($services as $service):?>
			<li><?php echo $this->Html->link($service["Service"]["str"], array("controller" => "services", "path" => $service["Service"]["path"], "ext" => "html"))?></li>
	<?php endforeach;?>
		</ul>
	</section>
	<section>
		<h2>ゲーム用PC</h2>
		<ul>
			<li><?php echo $this->Html->link("ゲーム用PC", array("controller" => "pcs", "action" => "index", "ext" => "html"))?></li>
		</ul>
	</section>
	<section>
		<h2>ゲーム代を稼ぐ</h2>
		<ul>
			<li><?php echo $this->Html->link("無料でお小遣い稼ぎ", array("controller" => "monies", "action" => "index", "ext" => "html"))?></li>
	<?php foreach($moneycategories as $moneycategory):?>
			<li><?php echo $this->Html->link($moneycategory["Moneycategory"]["str"], array("controller" => "monies", "action" => "view", "path" => $moneycategory["Moneycategory"]["path"], "ext" => "html"))?></li>
	<?php endforeach;?>
		</ul>
	</section>
	<section>
		<h2>サイトメニュー</h2>
		<ul>
			<li><?php echo $this->Html->link("当サイトについて", array("controller" => "pages", "action" => "about", "ext" => "html"))?></li>
			<li><?php echo $this->Html->link("リンク集", array("controller" => "links", "path" => "index", "ext" => "html"))?></li>
			<li><?php echo $this->Html->link("サイトマップ", array("controller" => "pages", "action" => "sitemap", "ext" => "html"))?></li>
			<li><?php echo $this->Html->link("お問合せ", array("controller" => "pages", "action" => "contact", "ext" => "html"))?></li>
		</ul>
	</section>
</section>
