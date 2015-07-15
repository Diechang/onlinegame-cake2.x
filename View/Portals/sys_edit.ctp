<?php echo $this->Form->create("Portal" , array("action" => "edit" , "inputDefaults" => array("div" => false , "label" => false , "legend" => false)))?>
	<table class="edit table table-bordered">
		<tr>
			<th nowrap="nowrap">ID</th>
			<td><?php echo $this->request->data["Portal"]["id"]?><?php echo $this->Form->hidden("id")?></td>
		</tr>
		<tr>
			<th nowrap="nowrap">公開</th>
			<td>
				<?php echo $this->Form->checkbox("public")?> 公開する
			</td>
		</tr>
		<tr>
			<th nowrap="nowrap">タイトル</th>
			<td>
				<?php echo $this->Form->input("title_official")?>
			</td>
		</tr>
		<tr>
			<th nowrap="nowrap">読み</th>
			<td>
				<?php echo $this->Form->input("title_read")?>
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
				<?php echo $this->Form->textarea("description" , array("class" => "editor"))?>
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
				<?php echo $this->request->data["Portal"]["ad_text"]?><br />
				<?php echo $this->Form->textarea("ad_text")?>
			</td>
		</tr>
		<tr>
			<th nowrap="nowrap">公式URL</th>
			<td>
				<?php echo $this->Form->input("official_url")?>
			</td>
		</tr>
		<tr>
			<th nowrap="nowrap">コピーライト</th>
			<td>
				<?php echo $this->Form->textarea("copyright")?>
			</td>
		</tr>
		<tr>
			<th nowrap="nowrap">提携タイトル</th>
			<td>
				<?php echo $this->Form->input("Title" , array(
					"multiple" => "checkbox",
				))?>
			</td>
		</tr>
		<tr>
			<th nowrap="nowrap">登録</th>
			<td>
				<?php echo $this->Form->submit("登録" , array("class" => "btn btn-primary"))?>
			</td>
		</tr>
	</table>
<?php echo $this->Form->end()?>