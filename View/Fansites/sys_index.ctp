<?php if($this->Paginator->current() == 1):?>
<?php echo $this->Form->create("Fansite", array("action" => "add", "inputDefaults" => array("div" => false, "label" => false, "legend" => false)))?>
	<h2>ファンサイト新規登録</h2>
	<table class="edit table table-bordered">
		<tr>
			<th nowrap="nowrap">ID</th>
			<td> </td>
		</tr>
		<tr>
			<th nowrap="nowrap">公開</th>
			<td>
				<?php echo $this->Form->checkbox("public", array("checked" => true))?> 公開する
			</td>
		</tr>
		<tr>
			<th nowrap="nowrap">タイトル</th>
			<td><?php echo $this->Form->select("title_id", $titles, array("value" => $title_id, "empty" => false))?></td>
		</tr>
		<tr>
			<th nowrap="nowrap">タイプ</th>
			<td>
				<?php echo $this->Form->input("type", array(
					"options" => array(
						"1" => "攻略",
						"2" => "ファン",
					)))?>
			</td>
		</tr>
		<tr>
			<th nowrap="nowrap">サイト名</th>
			<td>
				<?php echo $this->Form->text("site_name")?>
			</td>
		</tr>
		<tr>
			<th nowrap="nowrap">サイトURL</th>
			<td>
				<?php echo $this->Form->text("site_url")?>
			</td>
		</tr>
		<tr>
			<th nowrap="nowrap">リンクURL</th>
			<td>
				<?php echo $this->Form->text("link_url")?>
			</td>
		</tr>
		<tr>
			<th nowrap="nowrap">紹介文</th>
			<td>
				<?php echo $this->Form->textarea("description")?>
			</td>
		</tr>
		<tr>
			<th nowrap="nowrap">登録</th>
			<td>
				<?php echo $this->Form->submit("登録", array("class" => "btn btn-primary"))?>
			</td>
		</tr>
	</table>
<?php echo $this->Form->end()?>
<?php endif;?>

<h2>ファンサイト一覧</h2>
<?php echo $this->Form->create("Fansite", array("action" => "index", "type" => "get", "inputDefaults" => array("div" => false, "label" => false)))?>
	<?php echo $this->Form->text("w", array("size" => 10))?>
	<?php echo $this->Form->select("title_id", $titlesCount, array("value" => $title_id, "empty" => "すべて"))?>
	<?php echo $this->Form->submit("検索", array("div" => false, "class" => "btn"))?>
<?php echo $this->Form->end()?>
<?php echo $this->Form->create("Fansite", array("action" => "lump"))?>
	
	<?php echo $this->element("sys_paginate")?>

	<div class="controll">
		<input type="submit" value="一括修正" class="btn" />
	</div>
<?php echo $this->element("sys_list_fansites", array("fansites" => $fansites))?>
	<div class="controll"><input type="submit" value="一括修正" class="btn" /></div>
<?php echo $this->Form->end()?>