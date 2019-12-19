<?php echo $this->Form->create("Fansite", array("url" => array("action" => "edit"), "inputDefaults" => array("div" => false, "label" => false, "legend" => false)))?>
	<h2>ファンサイト編集</h2>
	<table class="edit table table-bordered">
		<tr>
			<th nowrap="nowrap">ID</th>
			<td><?php echo $this->request->data["Fansite"]["id"]?><?php echo $this->Form->hidden("id")?></td>
		</tr>
		<tr>
			<th nowrap="nowrap">公開</th>
			<td>
				<?php echo $this->Form->checkbox("public", array("checked" => (!empty($this->request->data["Fansite"]["public"]))))?> 公開する
			</td>
		</tr>
		<tr>
			<th nowrap="nowrap">タイトル</th>
			<td><?php echo $this->Form->input("title_id")?></td>
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
