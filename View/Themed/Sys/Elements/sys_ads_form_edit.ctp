<?php echo $this->Form->create($model, array("url" => array("action" => "edit"), "inputDefaults" => array("div" => false, "label" => false, "legend" => false)))?>
	<h2><?php echo $str?>編集</h2>
	<table class="edit table table-bordered">
		<tr>
			<th nowrap="nowrap">ID</th>
			<td><?php echo $this->request->data[$model]["id"]?><?php echo $this->Form->hidden("id")?></td>
		</tr>
		<tr>
			<th nowrap="nowrap">公開</th>
			<td>
				<?php echo $this->Form->checkbox("public")?> 公開する
			</td>
		</tr>
		<tr>
			<th nowrap="nowrap">広告ソース</th>
			<td>
				<div class="adBanner adPreview"><?php echo $this->request->data[$model]["ad_src_image"]?></div>
				<?php echo $this->Form->textarea("ad_src_image", array("class" => "adBanner focusSelect"))?>
				<div><input type="button" onclick="ET.getAdBanner()" value="GetAdBanner" class="btn btn-info btn-small" /></div>
			</td>
		</tr>
		<tr>
			<th nowrap="nowrap">リダイレクト</th>
			<td>
				<?php echo $this->Form->checkbox("ad_noredirect")?> しない
			</td>
		</tr>
		<tr>
			<th nowrap="nowrap">URL</th>
			<td>
				<?php echo $this->Form->input("ad_part_url", array("class" => "adPartUrl"))?>
			</td>
		</tr>
		<tr>
			<th nowrap="nowrap">画像src</th>
			<td>
				<?php echo $this->Form->input("ad_part_img_src", array("class" => "adPartImg"))?>
			</td>
		</tr>
<?php if(isset($titles)):?>
		<tr>
			<th nowrap="nowrap">タイトルID</th>
			<td>
				<?php echo $this->Form->input("title_id", array("empty" => true))?>
			</td>
		</tr>
<?php endif;?>
<?php if(isset($comment)):?>
		<tr>
			<th nowrap="nowrap">コメント</th>
			<td>
				<?php echo $this->Form->input("comment")?>
			</td>
		</tr>
<?php endif;?>
<?php if(isset($sort)):?>
		<tr>
			<th nowrap="nowrap">ソート番号</th>
			<td>
				<?php echo $this->Form->input("sort")?>
			</td>
		</tr>
<?php endif;?>
		<tr>
			<th nowrap="nowrap">備考</th>
			<td>
				<?php echo $this->Form->input("note")?>
			</td>
		</tr>
		<tr>
			<th nowrap="nowrap">登録</th>
			<td>
				<?php echo $this->Form->submit("登録", array("class" => "btn"))?>
			</td>
		</tr>
	</table>
<?php echo $this->Form->end()?>
