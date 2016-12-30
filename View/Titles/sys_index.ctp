<h3><?php echo $this->Html->link("タイトル新規登録", array("action" => "add"), array("class" => "btn btn-success"))?></h3>
<?php echo $this->Form->create("Title", array("url" => array("action" => "index"), "type" => "get", "inputDefaults" => array("div" => false, "label" => false)))?>
	<?php echo $this->Form->text("w", array("size" => 10, "onfocus" => "this.select()"))?>
	<?php echo $this->Form->select("category", $categories, array("empty" => "-カテゴリ-"))?>
	<?php echo $this->Form->select("service", $services, array("empty" => "-サービス-"))?>
	<?php echo $this->Form->submit("タイトル検索", array("div" => false, "class" => "btn"))?>
<?php echo $this->Form->end()?>
<?php echo $this->Form->create("Title", array("action" => "lump"))?>
	<h2>タイトル一覧</h2>
	
	<?php echo $this->element("sys_paginate")?>

	<div class="controll">
		<input type="submit" value="一括修正" class="btn" />
	</div>
<?php echo $this->element("sys_list_titles", array("titles" => $titles))?>
	<div class="controll"><input type="submit" value="一括修正" class="btn" /></div>
<?php echo $this->Form->end()?>