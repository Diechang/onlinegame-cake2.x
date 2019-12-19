<?php echo $this->Form->create("Link", array("url" => array("action" => "edit"), "inputDefaults" => array("div" => false, "label" => false, "legend" => false)))?>
	<h2>相互リンク編集</h2>
	<table class="edit table table-bordered">
		<tr>
			<th nowrap="nowrap">ID</th>
			<td><?php echo $this->request->data["Link"]["id"]?><?php echo $this->Form->hidden("id")?></td>
		</tr>
		<tr>
			<th nowrap="nowrap">公開</th>
			<td>
				<?php echo $this->Form->input("public")?> 公開する
			</td>
		</tr>
		<tr>
			<th nowrap="nowrap">おすすめ</th>
			<td>
				<?php echo $this->Form->input("pickup")?> おすすめサイト
			</td>
		</tr>
		<tr>
			<th nowrap="nowrap">サイト名</th>
			<td>
				<?php echo $this->Form->input("site_name")?>
			</td>
		</tr>
		<tr>
			<th nowrap="nowrap">サイトURL</th>
			<td>
				<?php echo $this->Form->input("site_url")?>
			</td>
		</tr>
		<tr>
			<th nowrap="nowrap">リンクURL</th>
			<td>
				<?php echo $this->Form->input("link_url")?>
			</td>
		</tr>
		<tr>
			<th nowrap="nowrap">紹介文</th>
			<td>
				<?php echo $this->Form->input("site_info")?>
			</td>
		</tr>
		<tr>
			<th nowrap="nowrap">カテゴリ</th>
			<td>
				<?php echo $this->Form->input("linkcategory_id")?>
			</td>
		</tr>
		<tr>
			<th nowrap="nowrap">管理者名</th>
			<td>
				<?php echo $this->Form->input("admin_name")?>
			</td>
		</tr>
		<tr>
			<th nowrap="nowrap">管理者メール</th>
			<td>
				<?php echo $this->Form->input("admin_mail")?>
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
