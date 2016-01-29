<?php echo $this->Form->create("Package" , array("action" => "add" , "inputDefaults" => array("div" => false , "label" => false , "monthNames" => false , "dateFormat" => "YMD" , "minYear" => 1990 , "maxYear" => date("Y") + 2)))?>
	<h2>パッケージ新規登録</h2>
	<table class="edit table table-bordered">
		<tr>
			<th nowrap="nowrap">ID</th>
			<td> </td>
		</tr>
		<tr>
			<th nowrap="nowrap">公開</th>
			<td>
				<?php echo $this->Form->checkbox("public" , array("checked" => true))?> 公開する
			</td>
		</tr>
		<tr>
			<th nowrap="nowrap">タイトルID</th>
			<td><?php echo $this->Form->input("title_id")?></td>
		</tr>
		<tr>
			<th nowrap="nowrap">広告テキスト</th>
			<td>
				<div class="adText"></div>
				<?php echo $this->Form->textarea("ad_src_text" , array("class" => "adText focusSelect"))?>
				<div><input type="button" onclick="ET.getAdText()" value="GetAdText" class="btn btn-info" /></div>
			</td>
		</tr>
		<tr>
			<th nowrap="nowrap">広告イメージ</th>
			<td>
				<div class="adImage"></div>
				<?php echo $this->Form->textarea("ad_src_image" , array("class" => "adImage focusSelect"))?>
				<div><input type="button" onclick="ET.getAdImage()" value="GetAdText" class="btn btn-info" /></div>
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
				<?php echo $this->Form->input("ad_part_url" , array("class" => "adPartUrl"))?>
			</td>
		</tr>
		<tr>
			<th nowrap="nowrap">パッケージ名</th>
			<td><?php echo $this->Form->input("ad_part_text" , array("class" => "adPartText"))?></td>
		</tr>
		<tr>
			<th nowrap="nowrap">画像src</th>
			<td>
				<?php echo $this->Form->input("ad_part_img_src" , array("class" => "adPartImg"))?>
			</td>
		</tr>
		<tr>
			<th nowrap="nowrap">カウントsrc</th>
			<td>
				<?php echo $this->Form->input("ad_part_track_src" , array("class" => "adPartTrack"))?>
			</td>
		</tr>
		<tr>
			<th nowrap="nowrap">価格</th>
			<td>
				<?php echo $this->Form->input("price")?>
			</td>
		</tr>
		<tr>
			<th nowrap="nowrap">発売日</th>
			<td>
				<?php echo $this->Form->input("release" , array("empty" => true , "class" => "input-mini"))?>
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

<h2>パッケージ一覧</h2>
<?php echo $this->Form->create("Package" , array("action" => "index" , "type" => "get" , "inputDefaults" => array("div" => false , "label" => false)))?>
	<?php echo $this->Form->text("w" , array("size" => 10))?>
	<?php echo $this->Form->select("title_id", $titlesCount, array("value" => $title_id, "empty" => "すべて"))?>
	<?php echo $this->Form->submit("検索" , array("div" => false , "class" => "btn"))?>
<?php echo $this->Form->end()?>
<?php echo $this->Form->create("Package" , array("action" => "lump"))?>
	<p id="results"></p>
	<div class="controll">
		<input type="submit" value="一括修正" class="btn" />
		<input type="text" id="word_searcher" />
	</div>
<?php echo $this->element("sys_list_packages" , array("packages" => $packages))?>
	<div class="controll"><input type="submit" value="一括修正" class="btn" /></div>
<?php echo $this->Form->end()?>