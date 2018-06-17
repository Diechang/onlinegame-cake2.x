<?php
//set blocks
$this->assign("title", $pageData["Service"]["str"] . (($this->Paginator->current() > 1) ? (" " . $this->Paginator->current() . "ページ目") : ""));
$this->assign("keywords", $pageData["Service"]["str"] . ((!empty($pageData["Service"]["str_sub"])) ? "," . $pageData["Service"]["str_sub"] : "") . ",オンラインゲーム");
$this->assign("description", "【" . $pageData["Service"]["str"] . "】オンラインゲームの一覧です。サービス状態別のオンラインゲームが探せます。");
$this->assign("meta", $this->Meta->pagePrevNext(array('controller' => $this->request->params["controller"], 'action' => $this->request->params["action"], 'path' => $pageData["Service"]["path"], 'ext' => 'html'), $this->Paginator));
//pankuz
// $this->set("pankuz_for_layout", $pageData["Service"]["str"]);
//json ld
// $this->assign("json_ld", $this->JsonLd->breadCrumbList($pageData["Service"]["str"]));
?>

<?php if($this->Paginator->current() <= 1):?>
<?php
	if(!empty($pageData["Service"]["description"]))
	{
		echo $this->element('archive_about', array('pageData' => $pageData["Service"]));
	}
?>
<?php
	if(!empty($pickups))
	{
		echo $this->element('archive_pickups', array('pickups' => $pickups, "mainStr" => $pageData["Service"]["str"]));
	}
?>
<?php echo $this->Gads->ads320();?>
<?php endif;?>


<!-- titles -->
<section class="archive-titles">
	<h2><span class="label label-primary"><?php echo $pageData["Service"]["str"]?></span>オンラインゲーム一覧</h2>
	<nav class="pages">
		<div class="counts"><?php echo $this->Paginator->counter("{:count}件中 / {:start} - {:end}件")?></div>
	</nav>

	<?php echo $this->element('loop_general_data', array("titles" => $titles))?>

	<?php echo $this->element("comp_pages", array("urlOptions" => array('path' => $pageData["Service"]["path"])));?>
</section>
