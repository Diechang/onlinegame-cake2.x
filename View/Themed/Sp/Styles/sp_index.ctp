<?php
//set blocks
$this->assign("title", $this->Common->titleWithCase($pageData["Style"]["str"], $pageData["Style"]["str_sub"]) . (($this->Paginator->current() > 1) ? (" " . $this->Paginator->current() . "ページ目") : ""));
$this->assign("keywords", $pageData["Style"]["str"] .((!empty($pageData["Style"]["str_sub"])) ? "," . $pageData["Style"]["str_sub"] : "") . ",オンラインゲーム");
$this->assign("description", "【" . $this->Common->titleWithCase($pageData["Style"]["str"], $pageData["Style"]["str_sub"]) . "】オンラインゲームの一覧です。同じスタイル・プレイ環境のオンラインゲームが探せます。");
$this->assign("meta", $this->Meta->pagePrevNext(array('controller' => $this->request->params["controller"], 'action' => $this->request->params["action"], 'path' => $pageData["Style"]["path"], 'ext' => 'html'), $this->Paginator));
//pankuz
// $this->set("pankuz_for_layout", $pageData["Style"]["str"]);
//json ld
// $this->assign("json_ld", $this->JsonLd->breadCrumbList($pageData["Style"]["str"]));
?>

<?php if($this->Paginator->current() <= 1):?>
<?php
	if(!empty($pageData["Style"]["description"]))
	{
		echo $this->element('archive_about', array('pageData' => $pageData["Style"]));
	}
?>
<?php
	if(!empty($pickups))
	{
		echo $this->element('archive_pickups', array('pickups' => $pickups, "mainStr" => $pageData["Style"]["str"]));
	}
?>
<?php endif;?>


<!-- titles -->
<section class="archive-titles">
	<h2><span class="label label-primary"><?php echo $pageData["Style"]["str"]?></span>オンラインゲーム一覧</h2>
	<nav class="pages">
		<div class="counts"><?php echo $this->Paginator->counter("{:count}件中 / {:start} - {:end}件")?></div>
	</nav>

	<?php echo $this->element('loop_general_data', array("titles" => $titles))?>

	<?php echo $this->element("comp_pages", array("urlOptions" => array('path' => $pageData["Style"]["path"])));?>
</section>
