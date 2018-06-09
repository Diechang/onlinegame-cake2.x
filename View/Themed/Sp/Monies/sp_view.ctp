<?php
//set blocks
$this->assign("title", $pageData["Moneycategory"]["str"] . "で稼ぐ！ゲーム料金を無料で稼ごう");
$this->assign("keywords", $pageData["Moneycategory"]["str"] . ",小遣い稼ぎ,無料");
$this->assign("description", $pageData["Moneycategory"]["str"] . "でゲーム料金を無料で稼ごう！管理人も登録している安心サイトのご紹介。");
//pankuz
// $this->set("pankuz_for_layout", array(
// 	array("str" => "ゲーム代を稼ぐ", "url" => array("action" => "index", "ext" => "html")),
// 	$pageData["Moneycategory"]["str"]
// ));
//json ld
// $this->assign("json_ld", $this->JsonLd->breadCrumbList(array(
// 	array("name" => "ゲーム代を稼ぐ", "id" => $this->Html->url(array("action" => "index", "ext" => "html"), true)),
// 	$pageData["Moneycategory"]["str"]
// )));
?>
<div class="pageInfo">
	<h1 class="pageTitle">
		<span class="main"><?php echo $pageData["Moneycategory"]["str"]?>で稼ぐ</span>
		<span class="sub"><?php echo $pageData["Moneycategory"]["str"]?>とは</span>
	</h1>
	<div class="pageDescription editorDoc">
	<?php echo $pageData["Moneycategory"]["body"]?>
	</div>
</div>
<?php echo $this->Gads->ads320();?>
<!-- sites -->
<section class="money-sites">
	<h2>おすすめの<?php echo $pageData["Moneycategory"]["str"]?></h2>
	<ul class="list">
<?php foreach($monies as $money):?>
		<li>
	<?php if(!empty($money["Money"]["ad_use"]) && !empty($money["Money"]["ad_banner"])):?>
			<div class="banner"><?php echo $money["Money"]["ad_banner"]?></div>
	<?php endif;?>
			<div class="title">
				<?php echo $this->Common->officialLinkText($money["Money"]["title"], $money["Money"]["ad_use"], $money["Money"]["ad_text"], $money["Money"]["official_url"])?>
			</div>
			<div class="description editorDoc">
				<?php echo $money["Money"]["description"]?>
			</div>
		</li>
<?php endforeach;?>
	</ul>
</section>
<?php echo $this->Gads->adsResponsive();?>
<!-- categories -->
<section class="money-categories">
	<h2><?php echo $pageData["Moneycategory"]["str"]?>以外に無料で稼ぐ方法</h2>
	<ul class="borderedLinks textLinks">
<?php foreach($moneycategories as $category):?>
		<li>
			<a href="<?php echo $this->Html->url(array("path" => $category["Moneycategory"]["path"]))?>">
				<div class="main"><?php echo $category["Moneycategory"]["str"]?>で稼ぐ</div>
				<div class="description editorDoc">
					<p><?php echo nl2br($category["Moneycategory"]["summary"])?></p>
				</div>
			</a>
		</li>
<?php endforeach;?>
	</ul>
</section>
