<?php
//set blocks
$this->assign("title", $pageData["Service"]["str"] . (($this->Paginator->current() > 1) ? (" " . $this->Paginator->current() . "ページ目") : ""));
$this->assign("keywords", $pageData["Service"]["str"] . ((!empty($pageData["Service"]["str_sub"])) ? "," . $pageData["Service"]["str_sub"] : "") . ",オンラインゲーム");
$this->assign("description", "【" . $pageData["Service"]["str"] . "】オンラインゲームの一覧です。サービス状態別のオンラインゲームが探せます。");
//pankuz
$this->set("pankuz_for_layout", $pageData["Service"]["str"]);
?>

<?php
	if(!empty($pageData["Service"]["description"]))
	{
		echo $this->element('archive_about', array('pageData' => $pageData["Service"]));
	}
?>

<!-- titles -->
<section class="archive-titles">
	<h1 class="headline"><span class="label label-primary"><?php echo $pageData["Service"]["str"]?></span>オンラインゲーム一覧</h1>

	<?php echo $this->element("comp_pages", array("urlOptions" => array('path' => $pageData["Service"]["path"])));?>

	<?php echo $this->element('loop_general_data', array("titles" => $titles))?>

	<?php echo $this->element("comp_pages", array("urlOptions" => array('path' => $pageData["Service"]["path"])));?>
</section>
