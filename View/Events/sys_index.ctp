<h3>
	<?php echo $this->Html->link("イベント新規登録", array("action" => "add"), array("class" => "btn btn-success"))?>
	<?php
		if(isset($titleAddData))
		{
			echo $this->Html->link($titleAddData["Title"]["title_official"] . "のイベントを登録", array("action" => "add", "?" => array("title_id" => $titleAddData["Title"]["id"])), array("class" => "btn btn-success"));
		}
	?>
</h3>
<?php echo $this->Form->create("Event", array("action" => "index", "type" => "get", "inputDefaults" => array("div" => false, "label" => false)))?>
	<?php echo $this->Form->text("w", array("size" => 10, "onfocus" => "this.select()"))?>
	<?php echo $this->Form->select("title_id", $titlesCount, array("value" => $title_id, "empty" => "すべて"))?>
	<?php echo $this->Form->submit("イベント検索", array("div" => false, "class" => "btn"))?>
<?php echo $this->Form->end()?>

<?php echo $this->Form->create("Event", array("action" => "lump"))?>
	<h2>イベント一覧</h2>
	<p id="results"></p>
	<div class="controll">
		<input type="submit" value="一括修正" class="btn" />
	</div>
	<?php echo $this->element("sys_list_events", array("events" => $events))?>
	<div class="controll"><input type="submit" value="一括修正" class="btn" /></div>
<?php echo $this->Form->end()?>