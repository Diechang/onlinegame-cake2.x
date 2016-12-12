<?php
//set blocks
$this->assign("title", $this->Common->title_separated_case($pageData["Category"]["str"], $pageData["Category"]["str_sub"]));
$this->assign("keywords", $pageData["Category"]["str"] . ((!empty($pageData["Category"]["str_sub"])) ? "," . $pageData["Category"]["str_sub"] : "") . ",オンラインゲーム");
$this->assign("description", "【" . $this->Common->title_separated_case($pageData["Category"]["str"], $pageData["Category"]["str_sub"]) . "】オンラインゲームの一覧です。同じジャンルのオンラインゲームが探せます。");
//pankuz
$this->set("pankuz_for_layout", $pageData["Category"]["str"]);
?>

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

<!-- titles -->
<section class="archive-titles">
	<h1 class="headline"><span class="label label-primary"><?php echo $pageData["Category"]["str"]?></span>オンラインゲーム一覧</h1>

	<?php echo $this->element('loop_general_data', array("titles" => $titles))?>
</section>
