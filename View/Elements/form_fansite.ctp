<!--Links Form-->
<div class="content linksForm" id="linkform">
	<h2><?php echo $this->Html->image("design/titles_linkentry_title.gif", array("alt" => "攻略・ファンサイトリンク集登録フォーム"))?></h2>
	<p class="description"><?php echo $title["Title"]["title_official"]?>リンク集に登録</p>
	<div class="formMessage">
		<h3>自薦他薦は問いません。</h3>
		<p><?php echo $title["Title"]["title_official"]?>の攻略サイト、ファンサイトを運営、またはご存知の方はぜひご登録をお願いします。</p>
	</div>
<?php echo $this->Form->create("Fansite", array("url" => array("action" => "add", $id), "inputDefaults" => array("div" => false, "label" => false, "legend" => false)))?>
	<input type="hidden" name="titleId" value="xxx" />
	<table class="formTable">

		<tr>
			<th>サイト名※</th>
			<td><?php echo $this->Form->input("site_name", array("class" => "formText"))?></td>
		</tr>
		<tr>
			<th>サイトURL※</th>
			<td><?php echo $this->Form->input("site_url", array("class" => "formText"))?></td>
		</tr>

		<tr>
			<th>サイトタイプ※</th>
			<td><?php echo $this->Form->input("type", array(
					"options" => array(
						"1" => "攻略",
						"2" => "ファン",
					)
				))?><br />
			管理人の独断と偏見によりご希望に添わない場合があります。
			</td>
		</tr>
		<tr>
			<th>サイト紹介文</th>
			<td><?php echo $this->Form->input("description", array("rows" => 4, "cols" => null, "class" => "formText"))?></td>
		</tr>
		<tr>
			<th>リンク設置URL</th>
			<td><?php echo $this->Form->input("link_url", array("class" => "formText"))?><br />
			自薦の場合、相互リンクして頂けるととてもありがたいです。</td>
		</tr>
		<tr>
			<th>メールアドレス</th>

			<td><?php echo $this->Form->input("admin_mail", array("class" => "formText"))?><br />
			相互リンクして頂ける方はメールアドレスもお願いします。</td>
		</tr>
		<tr>
			<th>メッセージ<br />
				（ありましたらどうぞ）</th>
			<td><?php echo $this->Form->input("message", array("maxLength" => 255, "rows" => 4, "cols" => null, "class" => "formText"))?></td>
		</tr>
		<tr>
			<th>認証番号</th>
			<td><?php echo $this->Html->image("design/spamnum.gif", array("alt" => "スパム防止番号"))?></td>
		</tr>
		<tr>
			<th>認証※</th>
			<td><span class="attention">スパム防止のため上記認証番号を半角で入力してください。</span><br />
			<?php echo $this->Form->text("spam_num", array(
				"size" => 4,
				"maxLength" => 4))?></td>
		</tr>
		<tr>
			<th class="cRed">（※）は必須入力</th>
			<td>
				<?php echo $this->Form->hidden("title_id", array(
					"value" => $title["Title"]["id"]))?>
				<?php echo $this->Form->button("サイト登録申込", array(
					"type" => "submit",
					"class" => "button"))?></td>
		</tr>
		<tr>
			<td colspan="2" class="formMessage">
				<h3>相互リンクしていただけるサイト様へ</h3>
				<p>相互リンクしていただけるサイト様は上位に表示され、トップページに新着10件まで表示されます。</p>
				<p>
					<?php echo $title["Title"]["title_official"]?>のトップページ<br />
					<input onclick="this.select()" style="width:100%;" value="http://onlinegame.dz-life.net<?php echo $this->Html->url(array("controller" => "titles", "action" => "index", "path" => $title["Title"]["url_str"], "ext" => "html"))?>" /><br />
					または、オンライゲームライフトップページ<br />
					<input onclick="this.select()" style="width:100%;" value="http://onlinegame.dz-life.net/" /><br />
					にリンクを貼っていただけますと幸いです。
				</p>
			</td>
		</tr>
	</table>
<?php echo $this->Form->end()?>
</div>
