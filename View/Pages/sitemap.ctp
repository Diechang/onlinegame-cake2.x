<?php
//set blocks
$this->assign("title", "サイトマップ");
$this->assign("keywords", "サイトマップ,オンラインゲームライフ");
$this->assign("description", "オンラインゲームライフのサイトマップページ。");
//pankuz
$this->set("pankuz_for_layout", "サイトマップ");
?>
<div class="content sitemap">
	<h2>サイトマップ</h2>
	
	<h3>ランキング</h3>
	<ul>
		<li><?php echo $this->Html->link("総合", array("controller" => "ranking", "path" => "index", "ext" => "html"))?></li>
<?php foreach($categories as $category):?>
		<li><?php echo $this->Html->link($category["Category"]["str"], array("controller" => "ranking", "path" => $category["Category"]["path"], "ext" => "html"))?></li>
<?php endforeach;?>
	</ul>
	
	<h3>ジャンル別</h3>
	<ul>
<?php foreach($categories as $category):?>
		<li><?php echo $this->Html->link($category["Category"]["str"], array("controller" => "categories", "path" => $category["Category"]["path"], "ext" => "html"))?></li>
<?php endforeach;?>
	</ul>
	
	<h3>スタイル・環境別</h3>
	<ul>
<?php foreach($styles as $style):?>
		<li><?php echo $this->Html->link($style["Style"]["str"], array("controller" => "styles", "path" => $style["Style"]["path"], "ext" => "html"))?></li>
<?php endforeach;?>
	</ul>
	
	<h3>サービス状態別</h3>
	<ul>
<?php foreach($services as $service):?>
		<li><?php echo $this->Html->link($service["Service"]["str"], array("controller" => "services", "path" => $service["Service"]["path"], "ext" => "html"))?></li>
<?php endforeach;?>
	</ul>
	
	<h3>オンラインゲーム一覧</h3>
	<ul>
<?php foreach($titles as $t):?>
		<li>
			<?php echo $this->Common->titleLinkText($this->Common->titleWithCase($t["Title"]["title_official"], $t["Title"]["title_read"]), $t["Title"]["url_str"])?>
			<?php echo ($t["Service"]["id"] != 2) ? $t["Service"]["str"] : ""?>
		</li>
<?php endforeach;?>
	</ul>
	
	<h3>オンラインゲームポータル</h3>
	<ul>
		<li><?php echo $this->Html->link("オンラインゲームポータルとは", array("controller" => "portals", "action" => "index", "ext" => "html"))?></li>
<?php foreach($portals as $portal):?>
		<li><?php echo $this->Html->link($this->Common->titleWithCase($portal["Portal"]["title_official"], $portal["Portal"]["title_read"]),
									array("controller" => "portals", "action" => "view", "path" => $portal["Portal"]["url_str"], "ext" => "html"))?></li>
<?php endforeach;?>
	</ul>
	
	<h3>ゲーム用PC</h3>
	<ul>
		<li><?php echo $this->Html->link("ゲーム用PC", array("controller" => "pcs", "action" => "index", "ext" => "html"))?></li>
	</ul>
	
	<h3>ゲーム代を稼ぐ</h3>
	<ul>
		<li><?php echo $this->Html->link("無料でお小遣い稼ぎ", array("controller" => "monies", "action" => "index", "ext" => "html"))?></li>
<?php foreach($moneycategories as $moneycategory):?>
		<li><?php echo $this->Html->link($moneycategory["Moneycategory"]["str"], array("controller" => "monies", "action" => "view", "path" => $moneycategory["Moneycategory"]["path"], "ext" => "html"))?></li>
<?php endforeach;?>
	</ul>
	
	<h3>サイトメニュー</h3>
	<ul>
		<li><?php echo $this->Html->link("当サイトについて", array("controller" => "pages", "action" => "about", "ext" => "html"))?></li>
		<li><?php echo $this->Html->link("リンク集", array("controller" => "links", "path" => "index", "ext" => "html"))?></li>
		<li><?php echo $this->Html->link("サイトマップ", array("controller" => "pages", "action" => "sitemap", "ext" => "html"))?></li>
		<li><?php echo $this->Html->link("お問合せ", array("controller" => "pages", "action" => "contact", "ext" => "html"))?></li>
	</ul>
<?php echo $this->Gads->ads468()?>
</div>