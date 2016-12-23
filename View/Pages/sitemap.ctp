<?php
//set blocks
$this->assign("title", "サイトマップ");
$this->assign("keywords", "サイトマップ,オンラインゲームライフ");
$this->assign("description", "オンラインゲームライフのサイトマップページ。");
//pankuz
$this->set("pankuz_for_layout", "サイトマップ");
//json ld
$this->assign("json_ld", $this->JsonLd->breadCrumbList("サイトマップ"));
?>

<!-- sitemap -->
<section class="about-sitemap">
	<h1 class="pageTitle">サイトマップ</h1>
	<section>
		<h2 class="headline">人気オンラインゲームランキング</h2>
		<ul>
			<li><?php echo $this->Html->link("総合", array("controller" => "ranking", "path" => "index", "ext" => "html"))?></li>
	<?php foreach($categories as $category):?>
			<li><?php echo $this->Html->link($category["Category"]["str"], array("controller" => "ranking", "path" => $category["Category"]["path"], "ext" => "html"))?></li>
	<?php endforeach;?>
		</ul>
	</section>
	<section>
		<h2 class="headline">ジャンル別オンラインゲーム</h2>
		<ul>
	<?php foreach($categories as $category):?>
			<li><?php echo $this->Html->link($category["Category"]["str"], array("controller" => "categories", "path" => $category["Category"]["path"], "ext" => "html"))?></li>
	<?php endforeach;?>
		</ul>
	</section>
	<section>
		<h2 class="headline">スタイル・環境別オンラインゲーム</h2>
		<ul>
	<?php foreach($styles as $style):?>
			<li><?php echo $this->Html->link($style["Style"]["str"], array("controller" => "styles", "path" => $style["Style"]["path"], "ext" => "html"))?></li>
	<?php endforeach;?>
		</ul>
	</section>
	<section>
		<h2 class="headline">サービス状態別オンラインゲーム</h2>
		<ul>
	<?php foreach($services as $service):?>
			<li><?php echo $this->Html->link($service["Service"]["str"], array("controller" => "services", "path" => $service["Service"]["path"], "ext" => "html"))?></li>
	<?php endforeach;?>
		</ul>
	</section>
	<section>
		<h2 class="headline">オンラインゲーム一覧</h2>
		<ul class="titles">
	<?php foreach($titles as $t):?>
			<li>
				<?php echo $this->Common->titleLinkText($this->Common->titleSeparatedSpan($t["Title"]["title_official"], $t["Title"]["title_read"]), $t["Title"]["url_str"])?>
				<?php echo ($t["Service"]["id"] != 2) ? $t["Service"]["str"] : ""?>
			</li>
	<?php endforeach;?>
		</ul>
	</section>
	<section>
		<h2 class="headline">オンラインゲームポータル</h2>
		<ul class="titles">
			<li><?php echo $this->Html->link("オンラインゲームポータルとは", array("controller" => "portals", "action" => "index", "ext" => "html"))?></li>
	<?php foreach($portals as $portal):?>
			<li><?php echo $this->Html->link($this->Common->titleSeparatedSpan($portal["Portal"]["title_official"], $portal["Portal"]["title_read"]),
										array("controller" => "portals", "action" => "view", "path" => $portal["Portal"]["url_str"], "ext" => "html"), array("escape" => false))?></li>
	<?php endforeach;?>
		</ul>
	</section>
	<section>
		<h2 class="headline">ゲーム用PC</h2>
		<ul>
			<li><?php echo $this->Html->link("ゲーム用PC", array("controller" => "pcs", "action" => "index", "ext" => "html"))?></li>
		</ul>
	</section>
	<section>
		<h2 class="headline">ゲーム代を稼ぐ</h2>
		<ul>
			<li><?php echo $this->Html->link("無料でお小遣い稼ぎ", array("controller" => "monies", "action" => "index", "ext" => "html"))?></li>
	<?php foreach($moneycategories as $moneycategory):?>
			<li><?php echo $this->Html->link($moneycategory["Moneycategory"]["str"], array("controller" => "monies", "action" => "view", "path" => $moneycategory["Moneycategory"]["path"], "ext" => "html"))?></li>
	<?php endforeach;?>
		</ul>
	</section>
	<section>
		<h2 class="headline">サイトメニュー</h2>
		<ul>
			<li><?php echo $this->Html->link("当サイトについて", array("controller" => "pages", "action" => "about", "ext" => "html"))?></li>
			<li><?php echo $this->Html->link("リンク集", array("controller" => "links", "path" => "index", "ext" => "html"))?></li>
			<li><?php echo $this->Html->link("サイトマップ", array("controller" => "pages", "action" => "sitemap", "ext" => "html"))?></li>
			<li><?php echo $this->Html->link("お問合せ", array("controller" => "pages", "action" => "contact", "ext" => "html"))?></li>
		</ul>
	</section>
	<?php echo $this->Gads->ads468()?>
</section>