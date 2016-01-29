<h3>
	<?php echo $this->Html->link("PC新規登録" , array("action" => "add") , array("class" => "btn btn-success"))?>
	<?php
		if(isset($titleAddData))
		{
			echo $this->Html->link($titleAddData["Title"]["title_official"] . "のPCを登録" , array("action" => "add" , "?" => array("title_id" => $titleAddData["Title"]["id"])) , array("class" => "btn btn-success"));
		}
	?>
</h3>
<?php echo $this->Form->create("Pc" , array("action" => "index" , "type" => "get" , "inputDefaults" => array("div" => false , "label" => false)))?>
	<?php echo $this->Form->text("w" , array("value" => $w, "size" => 10 , "onfocus" => "this.select()"))?>
	<?php echo $this->Form->select("title_id" , $titlesCount, array("value" => $title_id, "empty" => "すべて"))?>
	<?php echo $this->Form->select("pcshop_id" , $pcshops, array("value" => $pcshop_id, "empty" => "すべて"))?><br />
	<?php echo $this->Form->select("pctype_id" , $pctypes, array("value" => $pctype_id, "empty" => "すべて"))?>
	<?php echo $this->Form->select("pcgrade_id" , $pcgrades, array("value" => $pcgrade_id, "empty" => "すべて"))?>
	<?php echo $this->Form->submit("PC検索" , array("div" => false , "class" => "btn"))?>
<?php echo $this->Form->end()?>

<?php echo $this->Form->create("Pc" , array("action" => "lump"))?>
	<h2>PC一覧</h2>
	<p id="results"></p>
	<div class="controll">
		<input type="submit" value="一括修正" class="btn" />
	</div>
	<?php echo $this->element("sys_list_pcs" , array("pcs" => $pcs))?>
	<div class="controll"><input type="submit" value="一括修正" class="btn" /></div>
<?php echo $this->Form->end()?>