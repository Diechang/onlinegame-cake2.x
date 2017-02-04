<?php echo $this->Form->create("Spec", array("action" => "add", "inputDefaults" => array("div" => false, "label" => false, "cols" => null, "rows" => null)))?>
	<h2>動作環境新規登録</h2>
	<table class="edit spec table table-bordered">
		<tr>
			<th nowrap="nowrap">ID</th>
			<td colspan="2"> </td>
		</tr>
		<tr>
			<th nowrap="nowrap">タイトル</th>
			<td colspan="2"><?php echo $this->Form->input("title_id")?></td>
		</tr>
		<tr>
			<th nowrap="nowrap">キャプション</th>
			<td colspan="2"><?php echo $this->Form->input("caption")?></td>
		</tr>
		<tr>
			<th nowrap="nowrap"> </th>
			<th nowrap="nowrap">必須</th>
			<th nowrap="nowrap">推奨</th>
		</tr>
		<tr>
			<th nowrap="nowrap">OS</th>
			<td>
				<?php echo $this->Form->input("os_low", array("class" => "focusSelect"))?>
			</td>
			<td>
				<?php echo $this->Form->input("os_high", array("class" => "focusSelect"))?>
			</td>
		</tr>
		<tr>
			<th nowrap="nowrap">CPU</th>
			<td>
				<?php echo $this->Form->input("cpu_low", array("class" => "focusSelect"))?>
			</td>
			<td>
				<?php echo $this->Form->input("cpu_high", array("class" => "focusSelect"))?>
			</td>
		</tr>
		<tr>
			<th nowrap="nowrap">メモリ</th>
			<td>
				<?php echo $this->Form->input("memory_low", array("class" => "focusSelect"))?>
			</td>
			<td>
				<?php echo $this->Form->input("memory_high", array("class" => "focusSelect"))?>
			</td>
		</tr>
		<tr>
			<th nowrap="nowrap">ディスク容量</th>
			<td>
				<?php echo $this->Form->input("disc_low", array("class" => "focusSelect"))?>
			</td>
			<td>
				<?php echo $this->Form->input("disc_high", array("class" => "focusSelect"))?>
			</td>
		</tr>
		<tr>
			<th nowrap="nowrap">グラフィック</th>
			<td>
				<?php echo $this->Form->input("graphic_low", array("class" => "focusSelect"))?>
			</td>
			<td>
				<?php echo $this->Form->input("graphic_high", array("class" => "focusSelect"))?>
			</td>
		</tr>
		<tr>
			<th nowrap="nowrap">サウンド</th>
			<td>
				<?php echo $this->Form->input("sound_low", array("class" => "focusSelect"))?>
			</td>
			<td>
				<?php echo $this->Form->input("sound_high", array("class" => "focusSelect"))?>
			</td>
		</tr>
		<tr>
			<th nowrap="nowrap">通信環境</th>
			<td>
				<?php echo $this->Form->input("network_low", array("class" => "focusSelect"))?>
			</td>
			<td>
				<?php echo $this->Form->input("network_high", array("class" => "focusSelect"))?>
			</td>
		</tr>
		<tr>
			<th nowrap="nowrap">ディスプレイ</th>
			<td>
				<?php echo $this->Form->input("display_low", array("class" => "focusSelect"))?>
			</td>
			<td>
				<?php echo $this->Form->input("display_high", array("class" => "focusSelect"))?>
			</td>
		</tr>
		<tr>
			<th nowrap="nowrap">DirectX</th>
			<td>
				<?php echo $this->Form->input("directx_low", array("class" => "focusSelect"))?>
			</td>
			<td>
				<?php echo $this->Form->input("directx_high", array("class" => "focusSelect"))?>
			</td>
		</tr>
		<tr>
			<th nowrap="nowrap">その他</th>
			<td>
				<?php echo $this->Form->input("other_low", array("class" => "focusSelect"))?>
			</td>
			<td>
				<?php echo $this->Form->input("other_high", array("class" => "focusSelect"))?>
			</td>
		</tr>
		<tr>
			<th nowrap="nowrap">表示順</th>
			<td colspan="2">
				<?php echo $this->Form->input("sort", array("default" => 0, "class" => "input-mini"))?>
			</td>
		</tr>
		<tr>
			<th nowrap="nowrap">登録</th>
			<td colspan="2">
				<?php echo $this->Form->submit("登録", array("class" => "btn btn-primary"))?>
			</td>
		</tr>
	</table>
<?php echo $this->Form->end()?>

<?php echo $this->Form->create("Spec", array("action" => "lump"))?>
	<h2>動作環境一覧</h2>
	<p id="results"></p>
	<div class="controll">
		<?php echo $this->Form->submit("一括修正", array("class" => "btn"))?>
		<input type="text" id="word_searcher" />
		<select id="narrow_changer" class="category" onchange="LT.narrowTitleId(this.value)">
			<option value="all" selected="selected">すべて</option>
	<?php foreach($titlesCount as $title):?>
			<option value="<?php echo $title["Title"]["id"]?>"><?php echo $title["Title"]["title_official"]?>(<?php echo count($title["Spec"])?>)</option>
	<?php endforeach;?>
		</select>
	</div>
<?php echo $this->element("sys_list_specs", array("specs" => $specs))?>
	<div class="controll"><?php echo $this->Form->submit("一括修正", array("class" => "btn"))?></div>
<?php echo $this->Form->end()?>