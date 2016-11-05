<?php
//set blocks
$this->assign("title", $pageData["Moneycategory"]["str"] . "で稼ぐ！ゲーム料金を無料で稼ごう");
$this->assign("keywords", $pageData["Moneycategory"] . ",小遣い稼ぎ,無料");
$this->assign("description", $pageData["Moneycategory"]["str"] . "でゲーム料金を無料で稼ごう！管理人も登録している安心サイトのご紹介。");
//pankuz
$this->set("pankuz_for_layout", array(
	array("str" => "ゲーム代を稼ぐ", "url" => array("action" => "index", "ext" => "html")),
	$pageData["Moneycategory"]["str"]
));
?>
<div class="content">
	<h2><?php echo $pageData["Moneycategory"]["str"]?>とは？</h2>
	<?php echo $pageData["Moneycategory"]["body"]?>
	<?php echo $this->Gads->ads468()?>
</div>
<div class="content monies">
	<h2>おすすめの<?php echo $pageData["Moneycategory"]["str"]?></h2>
<?php foreach($monies as $money):?>
	<div class="item clearfix">
		<h3><?php echo $this->Common->officialLinkText($money["Money"]["title"], $money["Money"]["ad_use"], $money["Money"]["ad_text"], $money["Money"]["official_url"])?></h3>
		<?php if(!empty($money["Money"]["ad_use"]) && !empty($money["Money"]["ad_banner"])):?>
		<div class="banner"><?php echo $money["Money"]["ad_banner"]?></div>
		<?php endif;?>
		<?php echo $money["Money"]["description"]?>
	</div>
<?php endforeach;?>
</div>
<div class="content">
	<h2><?php echo $pageData["Moneycategory"]["str"]?>以外に無料で稼ぐ方法</h2>
<?php foreach($moneycategories as $category):?>
	<h3><?php echo $this->Html->link($category["Moneycategory"]["str"], array("path" => $category["Moneycategory"]["path"]))?></h3>
	<p><?php echo nl2br($category["Moneycategory"]["summary"])?></p>
<?php endforeach;?>
</div>