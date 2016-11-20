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
<!-- about -->
<div class="money-about pageInfo">
	<h1 class="pageTitle">
		<span class="main"><?php echo $pageData["Moneycategory"]["str"]?>で稼ぐ</span>
		<span class="sub"><?php echo $pageData["Moneycategory"]["str"]?>とは</span>
	</h1>
	<div class="description">
		<?php echo $pageData["Moneycategory"]["body"]?>
	</div>
	<div class="gAds"><?php echo $this->Gads->ads468()?></div>
</div>

<!-- sites -->
<section class="money-sites">
	<h1>おすすめの<?php echo $pageData["Moneycategory"]["str"]?></h1>
	<ul class="list">
<?php foreach($monies as $money):?>
		<li>
			<h2 class="title">
				<?php echo $this->Common->official_link_text($money["Money"]["title"], $money["Money"]["ad_use"], $money["Money"]["ad_text"], $money["Money"]["official_url"])?>
			</h2>
	<?php if(!empty($money["Money"]["ad_use"]) && !empty($money["Money"]["ad_banner"])):?>
			<div class="banner"><?php echo $money["Money"]["ad_banner"]?></div>
	<?php endif;?>
			<div class="description">
				<?php echo $money["Money"]["description"]?>
			</div>
		</li>
<?php endforeach;?>
	</ul>
</section>

<!-- categories -->
<section class="money-categories">
	<h1><?php echo $pageData["Moneycategory"]["str"]?>以外に無料で稼ぐ方法</h1>
	<ul class="list">
<?php foreach($moneycategories as $category):?>
		<li>
			<h2 class="title">
				<?php echo $this->Html->link($category["Moneycategory"]["str"], array("path" => $category["Moneycategory"]["path"]))?>
			</h2>
			<div class="description">
				<p><?php echo nl2br($category["Moneycategory"]["summary"])?></p>
			</div>
		</li>
<?php endforeach;?>
	</ul>
</section>