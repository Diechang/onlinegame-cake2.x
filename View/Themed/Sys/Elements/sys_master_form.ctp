<?php echo $this->Form->create($model, array("url" => array("action" => "add"), "inputDefaults" => array("div" => false, "label" => false, "legend" => false)))?>
	<h2><?php echo $str?>新規登録</h2>
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
			<th nowrap="nowrap">文字列</th>
			<td>
				<?php echo $this->Form->input("str")?>
			</td>
		</tr>
<?php if(in_array($this->request->params["controller"], array("platforms", "categories", "styles", "services"))):?>
		<tr>
			<th nowrap="nowrap">サブ文字列</th>
			<td>
				<?php echo $this->Form->input("str_sub")?>
			</td>
		</tr>
		<tr>
			<th nowrap="nowrap">概要</th>
			<td>
				<?php echo $this->Form->input("description", array("class" => "editor"))?>
			</td>
		</tr>
<?php endif;?>
		<tr>
			<th nowrap="nowrap">パス</th>
			<td>
				<?php echo $this->Form->input("path")?>
			</td>
		</tr>
		<tr>
			<th nowrap="nowrap">ソート番号</th>
			<td>
				<?php echo $this->Form->input("sort", array("value" => count($items)+1, "maxLength" => 4, "size" => 4, "class" => "input-mini"))?>
			</td>
		</tr>
<?php if(isset($titles)):?>
		<tr>
			<th nowrap="nowrap">タイトル</th>
			<td>
				<?php echo $this->Form->input("Title", array(
					"multiple" => "checkbox",
				))?>
			</td>
		</tr>
<?php endif;?>
		<tr>
			<th nowrap="nowrap">登録</th>
			<td>
				<?php echo $this->Form->submit("登録", array("class" => "btn btn-primary"))?>
			</td>
		</tr>
	</table>
<?php echo $this->Form->end()?>
