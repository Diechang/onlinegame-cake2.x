<?php echo $this->Form->create("Money", array("action" => "add", "inputDefaults" => array("div" => false, "label" => false, "legend" => false)))?>
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
			<td>
				<?php echo $this->Form->input("title")?>
			</td>
		</tr>
		<tr>
			<th nowrap="nowrap">URL文字列</th>
			<td>
				<?php echo $this->Form->input("url_str")?>
			</td>
		</tr>
		<tr>
			<th nowrap="nowrap">概要</th>
			<td>
				<?php echo $this->Form->textarea("description", array("class" => "editor"))?>
			</td>
		</tr>
		<tr>
			<th nowrap="nowrap">カテゴリ</th>
			<td>
				<?php echo $this->Form->input("moneycategory_id")?>
			</td>
		</tr>
		<tr>
			<th nowrap="nowrap">広告利用</th>
			<td>
				<?php echo $this->Form->checkbox("ad_use")?> 広告を利用する
			</td>
		</tr>
		<tr>
			<th nowrap="nowrap">広告テキスト</th>
			<td>
				<?php echo $this->Form->textarea("ad_text")?>
			</td>
		</tr>
		<tr>
			<th nowrap="nowrap">広告バナー</th>
			<td>
				<?php echo $this->Form->textarea("ad_banner")?>
			</td>
		</tr>
		<tr>
			<th nowrap="nowrap">公式URL</th>
			<td>
				<?php echo $this->Form->input("official_url")?>
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