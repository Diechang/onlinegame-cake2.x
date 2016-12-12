<?php
//set blocks
$this->assign("title", $this->Common->title_separated_case($pageData["Style"]["str"], $pageData["Style"]["str_sub"]));
$this->assign("keywords", $pageData["Style"]["str"] .((!empty($pageData["Style"]["str_sub"])) ? "," . $pageData["Style"]["str_sub"] : "") . ",オンラインゲーム");
$this->assign("description", "【" . $this->Common->title_separated_case($pageData["Style"]["str"], $pageData["Style"]["str_sub"]) . "】オンラインゲームの一覧です。同じスタイル・プレイ環境のオンラインゲームが探せます。");
//pankuz
$this->set("pankuz_for_layout", $pageData["Style"]["str"]);
?>

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

<!-- titles -->
<section class="archive-titles">
	<h1 class="headline"><span class="label label-primary"><?php echo $pageData["Style"]["str"]?></span>オンラインゲーム一覧</h1>

	<?php echo $this->element('loop_general_data', array("titles" => $titles))?>
</section>

