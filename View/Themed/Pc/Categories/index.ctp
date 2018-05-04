<?php
//set blocks
$this->assign("title", $this->Common->titleWithCase($pageData["Category"]["str"], $pageData["Category"]["str_sub"]) . (($this->Paginator->current() > 1) ? (" " . $this->Paginator->current() . "ページ目") : ""));
$this->assign("keywords", $pageData["Category"]["str"] . ((!empty($pageData["Category"]["str_sub"])) ? "," . $pageData["Category"]["str_sub"] : "") . ",オンラインゲーム");
$this->assign("description", "【" . $this->Common->titleWithCase($pageData["Category"]["str"], $pageData["Category"]["str_sub"]) . "】オンラインゲームの一覧です。同じジャンルのオンラインゲームが探せます。");
$this->assign("meta", $this->Meta->pagePrevNext(array('controller' => $this->request->params["controller"], 'action' => $this->request->params["action"], 'path' => $pageData["Category"]["path"], 'ext' => 'html'), $this->Paginator));
//pankuz
$this->set("pankuz_for_layout", $pageData["Category"]["str"]);
//json ld
$this->assign("json_ld", $this->JsonLd->breadCrumbList($pageData["Category"]["str"]));
?>

<?php if($this->Paginator->current() <= 1):?>
<?php
	if(!empty($pageData["Category"]["description"]))
	{
		echo $this->element('archive_about', array('pageData' => $pageData["Category"]));
	}
?>
<?php
	if(!empty($pickups))
	{
		echo $this->element('archive_pickups', array('pickups' => $pickups, "mainStr" => $pageData["Category"]["str"]));
	}
?>
<?php endif;?>

<!-- titles -->
<section class="archive-titles">
	<h1 class="headline"><span class="label label-primary"><?php echo $pageData["Category"]["str"]?></span>オンラインゲーム一覧</h1>

	<?php echo $this->element("comp_pages", array("urlOptions" => array('path' => $pageData["Category"]["path"])));?>

	<?php echo $this->element('loop_general_data', array("titles" => $titles))?>

	<?php echo $this->element("comp_pages", array("urlOptions" => array('path' => $pageData["Category"]["path"])));?>
</section>
