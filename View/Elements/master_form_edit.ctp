<?php echo $this->Form->create()?>
	<h2><?php echo $str?>新規登録</h2>
	<table class="edit">
		<tr>
			<th nowrap="nowrap">ID</th>
			<td> </td>
		</tr>
		<tr>
			<th nowrap="nowrap">文字列</th>
			<td>
				<?php echo $this->Form->text("str")?>
			</td>
		</tr>
		<tr>
			<th nowrap="nowrap">パス</th>
			<td>
				<?php echo $this->Form->text("path")?>
			</td>
		</tr>
		<tr>
			<th nowrap="nowrap">ソート番号</th>
			<td>
				<?php echo $this->Form->text("sort", array("value" => count($items)+1, "maxLength" => 4, "size" => 4))?>
			</td>
		</tr>
		<tr>
			<th nowrap="nowrap">登録</th>
			<td>
				<?php echo $this->Form->submit("登録")?>
			</td>
		</tr>
	</table>
<?php echo $this->Form->end()?>