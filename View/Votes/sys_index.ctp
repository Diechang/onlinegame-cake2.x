<?php echo $this->Form->create("Vote", array("action" => "index", "type" => "get", "inputDefaults" => array("div" => false, "label" => false)))?>
	<?php echo $this->Form->text("w", array("size" => 10, "value" => $w))?>
	<?php echo $this->Form->select("title_id", $titlesCount, array("value" => $title_id, "empty" => "すべて"))?>
	<?php echo $this->Form->submit("検索", array("div" => false, "class" => "btn"))?>
<?php echo $this->Form->end()?>
<?php echo $this->Form->create("Vote", array("action" => "lump"))?>
	<h2>投稿一覧</h2>
	
	<?php echo $this->element("sys_paginate")?>

	<div class="controll">
		<input type="submit" value="一括修正" class="btn" />
	</div>
<?php echo $this->element("sys_list_votes", array("votes" => $votes))?>
	<div class="controll"><input type="submit" value="一括修正" class="btn" /></div>
	<?php echo $this->element("sys_paginate", array("counter" => false))?>
<?php echo $this->Form->end()?>