<?php echo $this->Form->create("Pcshop", array("action" => "add", "inputDefaults" => array("div" => false, "label" => false, "cols" => null, "rows" => null)))?>
	<h2>ショップ新規登録</h2>
	<table class="edit spec table table-bordered">
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
			<th nowrap="nowrap">ショップ名</th>
			<td><?php echo $this->Form->input("shop_name")?></td>
		</tr>
		<tr>
			<th nowrap="nowrap">URL文字列</th>
			<td><?php echo $this->Form->input("url_str")?></td>
		</tr>
		<tr>
			<th nowrap="nowrap">ショップURL</th>
			<td><?php echo $this->Form->input("shop_url")?></td>
		</tr>
		<tr>
			<th nowrap="nowrap">広告利用</th>
			<td><?php echo $this->Form->input("ad_use")?> 広告を利用する</td>
		</tr>
		<tr>
			<th nowrap="nowrap">テキスト広告</th>
			<td><?php echo $this->Form->input("ad_text", array("class" => "adField focusSelect", "rows" => 4))?></td>
		</tr>
		<tr>
			<th nowrap="nowrap">登録</th>
			<td>
				<?php echo $this->Form->submit("登録", array("class" => "btn btn-primary"))?>
			</td>
		</tr>
	</table>
<?php echo $this->Form->end()?>

<?php echo $this->Form->create("Pcshop", array("action" => "lump"))?>
	<h2>ショップ一覧</h2>
	<p id="results"></p>
	<div class="controll">
		<?php echo $this->Form->submit("一括修正", array("class" => "btn"))?>
	</div>
<?php echo $this->element("sys_list_pcshops", array("pcshops" => $pcshops))?>
	<div class="controll"><?php echo $this->Form->submit("一括修正", array("class" => "btn"))?></div>
<?php echo $this->Form->end()?>