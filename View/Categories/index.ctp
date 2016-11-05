<?php
//set blocks
$this->assign("title", $this->Common->titleWithCase($pageData["Category"]["str"], $pageData["Category"]["str_sub"]));
$this->assign("keywords", $pageData["Category"]["str"] . ((!empty($pageData["Category"]["str_sub"])) ? "," . $pageData["Category"]["str_sub"] : "") . ",オンラインゲーム");
$this->assign("description", "【" . $this->Common->titleWithCase($pageData["Category"]["str"], $pageData["Category"]["str_sub"]) . "】オンラインゲームの一覧です。同じジャンルのオンラインゲームが探せます。");
//pankuz
$this->set("pankuz_for_layout", $pageData["Category"]["str"]);
?>

<?php
	if(!empty($pageData["Category"]["description"]))
	{
		echo $this->element('prop_summary', array('pageData' => $pageData["Category"]));
	}
?>

<?php
	if(!empty($pickups))
	{
		echo $this->element('prop_pickups', array('pickups' => $pickups, "mainStr" => $pageData["Category"]["str"]));
	}
?>

<div class="content titles">
	<h2>【<?php echo $pageData["Category"]["str"]?>】オンラインゲーム一覧</h2>
	<ul class="listChangeTabs">
		<li class="details"><a href="javascript:void(0)"><?php echo $this->Html->image("design/list_tabs_details_normal.gif", array("alt" => "詳細表示"))?></a></li>
		<li class="thumb"><a href="javascript:void(0)"><?php echo $this->Html->image("design/list_tabs_thumb_normal.gif", array("alt" => "画像表示"))?></a></li>
	</ul>
	<!--<ul id="titlesList" class="thumbList clearfix">-->
	<ul id="titlesList" class="detailsList clearfix">
<?php echo $this->element('loop_general_data', array("titles" => $titles))?>
	</ul>
	<ul class="listChangeTabs">
		<li class="details"><a href="javascript:void(0)"><?php echo $this->Html->image("design/list_tabs_details_normal.gif", array("alt" => "詳細表示"))?></a></li>
		<li class="thumb"><a href="javascript:void(0)"><?php echo $this->Html->image("design/list_tabs_thumb_normal.gif", array("alt" => "画像表示"))?></a></li>
	</ul>
<?php echo $this->Gads->ads468()?>
</div>
