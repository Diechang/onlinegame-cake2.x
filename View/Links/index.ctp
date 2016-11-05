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
<div class="content links">
	<h2><?php echo (!empty($label)) ? "【" . $label . "】" : ""?>相互リンク集</h2>

	<p>
		<?php if($path == "index"):?>
		<strong class="cBlue">おすすめ</strong>
		<?php else:?>
		<?php echo $this->Html->link("おすすめ", array("controller" => "links", "path" => "index", "ext" => "html"))?>
		<?php endif;?>

		<?php foreach($linkCategories as $category):?>
		<?php if($path == $category["Linkcategory"]["path"]):?>
		<strong class="cBlue"><?php echo $category["Linkcategory"]["str"]?></strong>
		<?php else:?>
		<?php echo $this->Html->link($category["Linkcategory"]["str"], array("controller" => "links", "path" => $category["Linkcategory"]["path"], "ext" => "html"))?>
		<?php endif;?>
		<?php endforeach;?>
	</p>
	<p><a href="#entry" class="wBold">≫リンク集に新規登録</a><br />
	当サイトでは相互リンク集に登録していただけるサイト様を募集中です。<br />
	下の依頼フォームより登録をお願いします。</p>
<?php if(!empty($links)):?>
	<ul class="linksList">
	<?php foreach($links as $link):?>
		<li class="clearfix">
			<h3><?php echo $this->Html->link($link["Link"]["site_name"], $link["Link"]["site_url"], array("target" => "_blank"))?></h3>
			<div class="thumb"><?php echo $this->Html->link($this->Html->image("http://capture.heartrails.com/small?" . $link["Link"]["site_url"], array("width" => 120, "alt" => $link["Link"]["site_name"])), $link["Link"]["site_url"], array("target" => "_blank", "escape" => false))?></div>
			<p class="description"><?php echo nl2br(h($link["Link"]["site_info"]))?></p>
		</li>
	<?php endforeach;?>
	</ul>
	<p class="tRight wBold"><a href="#entry">≫リンク集に新規登録</a></p>
<?php endif;?>
<?php echo $this->Gads->ads468()?>
</div>

<?php echo $this->element("form_link")?>