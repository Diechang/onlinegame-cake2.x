<?php
//set blocks
$this->assign("body_class", "links");
if($path == "index")
{
	$this->assign("title", "相互リンク集");
	$this->assign("keywords", "相互リンク");
	$this->assign("description", "オンラインゲームライフと相互リンクしていただいているおすすめサイト集です。相互リンク依頼は専用フォームからどうぞ。");
	//pankuz
	// $this->set("pankuz_for_layout", "相互リンク集");
	//json ld
	// $this->assign("json_ld", $this->JsonLd->breadCrumbList("相互リンク集"));
}
else
{
	$this->assign("title", "【" . $label . "】相互リンク集");
	$this->assign("keywords", "相互リンク," . $label);
	$this->assign("description", "オンラインゲームライフと相互リンクしていただいている「" . $label . "」カテゴリのサイト集です。相互リンク依頼は専用フォームからどうぞ。");
	//pankuz
	// $this->set("pankuz_for_layout", array(
	// 	array(
	// 		"str" => "相互リンク集",
	// 		"url" => array("controller" => "links", "path" => "index", "ext" => "html")
	// 	),
	// 	$label,
	// ));
	//json ld
	// $this->assign("json_ld", $this->JsonLd->breadCrumbList(array(
	// 	array("name" => "相互リンク集", "id" => $this->Html->url(array("controller" => "links", "action" => "index", "path" => "index", "ext" => "html"), true)),
	// 	$label,
	// )));
}
?>

<div class="pageInfo">
	<h1 class="pageTitle">
		<span class="main"><?php if(!empty($label)):?><span class="label label-primary"><?php echo $label?></span><?php endif;?>リンク集</span>
		<span class="sub">相互リンクしていただいている<?php echo $label?>サイト集です</span>
	</h1>
	<div class="pageDescrition">
		<p>当サイトでは相互リンク集に登録していただけるサイト様を募集中です。<br>
		<a href="#form" class="inline">依頼フォーム</a>より登録をお願いします。</p>
	</div>
</div>
<?php echo $this->Gads->ads320();?>
<!-- sites -->
<section class="sites">
	<ul class="categories">
<?php if($path == "index"):?>
		<li class="current"><span>おすすめ</span></li>
<?php else:?>
		<li><?php echo $this->Html->link("おすすめ", array("controller" => "links", "path" => "index", "ext" => "html"))?></li>
<?php endif;?>
<?php foreach($linkCategories as $category):?>
	<?php if($path == $category["Linkcategory"]["path"]):?>
		<li class="current"><span><?php echo $category["Linkcategory"]["str"]?></span></li>
	<?php else:?>
		<li><?php echo $this->Html->link($category["Linkcategory"]["str"], array("controller" => "links", "path" => $category["Linkcategory"]["path"], "ext" => "html"))?></li>
	<?php endif;?>
<?php endforeach;?>
	</ul>
	
<?php if(!empty($links)):?>
	<ul class="borderedLinks textLinks imageLinks">
	<?php foreach($links as $link):?>
		<li>
			<a href="<?php echo $link["Link"]["site_url"]?>" target="_blank">
				<div class="images">
					<div class="thumb"><?php echo $this->Html->image("//capture.heartrails.com/small?" . $link["Link"]["site_url"], array("alt" => $link["Link"]["site_name"]))?></div>
				</div>
				<div class="data">
					<div class="main"><?php echo $link["Link"]["site_name"]?></div>
					<p class="description"><?php echo nl2br(h($link["Link"]["site_info"]))?></p>
				</div>
			</a>
		</li>
	<?php endforeach;?>
	</ul>
<?php endif;?>
</section>
<?php echo $this->Gads->adsResponsive()?>

<?php echo $this->element("form_link")?>