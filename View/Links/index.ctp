<?php
//set blocks
if($path == "index")
{
	$this->assign("title", "相互リンク集");
	$this->assign("keywords", "相互リンク");
	$this->assign("description", "オンラインゲームライフと相互リンクしていただいているおすすめサイト集です。相互リンク依頼は専用フォームからどうぞ。");
	//pankuz
	$this->set("pankuz_for_layout", "相互リンク集");
}
else
{
	$this->assign("title", "【" . $label . "】相互リンク集");
	$this->assign("keywords", "相互リンク," . $label);
	$this->assign("description", "オンラインゲームライフと相互リンクしていただいている「" . $label . "」カテゴリのサイト集です。相互リンク依頼は専用フォームからどうぞ。");
	//pankuz
	$this->set("pankuz_for_layout", array(
		array(
			"str" => "相互リンク集",
			"url" => array("controller" => "links", "path" => "index", "ext" => "html")
		),
		$label,
	));
}
?>
<?php echo $this->Session->flash()?>
<!-- about -->
<div class="link-about pageInfo">
	<h1 class="pageTitle">
		<span class="main"><?php echo (!empty($label)) ? '<span class="label label-primary">' . $label . '</span>' : ""?></span>リンク集</span>
		<span class="sub">相互リンクしていただいているおすすめサイト集です</span>
	</h1>
	
	<p>当サイトでは相互リンク集に登録していただけるサイト様を募集中です。<br>
	<a href="#form">依頼フォーム</a>より登録をお願いします。</p>

	<ul class="categories">
	<?php if($path == "index"):?>
		<li class="current"><span>おすすめ</span></li>
	<?php else:?>
		<li><?php echo $this->Html->link("おすすめ", array("controller" => "links", "path" => "index", "ext" => "html"))?></li>
	<?php endif;?>

	<?php foreach($linkCategories as $category):?>
		<?php if($path == $category["Linkcategory"]["path"]):?>
		<li class="current"><?php echo $category["Linkcategory"]["str"]?></li>
		<?php else:?>
		<li><?php echo $this->Html->link($category["Linkcategory"]["str"], array("controller" => "links", "path" => $category["Linkcategory"]["path"], "ext" => "html"))?></li>
		<?php endif;?>
	<?php endforeach;?>
	</ul>
	<!-- sites -->
	<section class="sites">
		<ul class="list">

<?php if(!empty($links)):?>
		<ul class="linksList">
	<?php foreach($links as $link):?>
			<li>
				<div class="thumb"><?php echo $this->Html->link($this->Html->image("http://capture.heartrails.com/small?" . $link["Link"]["site_url"], array("alt" => $link["Link"]["site_name"])), $link["Link"]["site_url"], array("target" => "_blank", "escape" => false))?></div>
				<div class="title"><?php echo $this->Html->link($link["Link"]["site_name"], $link["Link"]["site_url"], array("target" => "_blank"))?></div>
				<p class="description"><?php echo nl2br(h($link["Link"]["site_info"]))?></p>
			</li>
	<?php endforeach;?>
		</ul>
<?php endif;?>
	</section>
	<div class="gAds"><?php echo $this->Gads->ads468()?></div>
</div>

<?php echo $this->element("form_link")?>