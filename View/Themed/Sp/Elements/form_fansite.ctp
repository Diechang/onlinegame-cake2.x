<div class="form">
	<?php echo $this->Form->create("Fansite", array("url" => array("action" => "add", $id), "inputDefaults" => array("div" => false, "label" => false, "legend" => false)))?>
		<table>
			<tr>
				<th class="must">サイト名</th>
			</tr>
			<tr>
				<td><?php echo $this->Form->input("site_name", array("class" => "input-text"))?></td>
			</tr>
			<tr>
				<th class="must">サイトURL</th>
			</tr>
			<tr>
				<td><?php echo $this->Form->input("site_url", array("class" => "input-text"))?></td>
			</tr>
			<tr>
				<th class="must">リンク集タイプ</th>
			</tr>
			<tr>
				<td>
					<?php echo $this->Form->input("type", array(
						"options" => array(
							"1" => "攻略サイト・Wiki",
							"2" => "ファンサイト・ブログ",
						), "class" => "input-select"
					))?>
					<span class="input-description">管理人の独断と偏見によりご希望に添わない場合があります。</span>
				</td>
			</tr>
			<tr>
				<th>サイト紹介文</th>
			</tr>
			<tr>
				<td><?php echo $this->Form->input("description", array("rows" => 4, "cols" => null, "class" => "input-text"))?></td>
			</tr>
			<tr>
				<th>リンク設置URL</th>
			</tr>
			<tr>
				<td>
					<?php echo $this->Form->input("link_url", array("class" => "input-text"))?>
					<span class="input-description">自薦の場合、相互リンクしていただけるととてもありがたいです</span>
				</td>
			</tr>
			<tr>
				<th>メールアドレス</th>
			</tr>
			<tr>
				<td>
					<?php echo $this->Form->input("admin_mail", array("class" => "input-text"))?>
					<span class="input-description">相互リンクして頂ける方はメールアドレスもお願いします</span>
				</td>
			</tr>
			<tr>
				<th>当サイトへのご意見</th>
			</tr>
			<tr>
				<td>
					<?php echo $this->Form->input("message", array("maxLength" => 255, "rows" => 4, "cols" => null, "class" => "input-text"))?>
					<div class="input-description">なにかありましたら遠慮なくどうぞ（250文字まで）</div>
				</td>
			</tr>
			<tr>
				<th>認証番号</th>
			</tr>
			<tr>
				<td><?php echo $this->Html->image("design/spamnum.gif", array("alt" => "スパム防止番号"))?></td>
			</tr>
			<tr>
				<th class="must">認証</th>
			</tr>
			<tr>
				<td>
					<div class="input-attention">スパム防止のため上記認証番号を半角で入力してください。</div>
					<?php echo $this->Form->text("spam_num", array(
						"value" => "",
						"class" => "input-text",
						"maxLength" => 4))?>
				</td>
			</tr>
			<tr class="submit">
				<td colspan="2">
					<?php echo $this->Form->hidden("title_id", array(
						"value" => $title["Title"]["id"]))?>
					<?php echo $this->Form->button("サイト登録申込", array(
						"type" => "submit",
						"class" => "button button-submit button-block"))?>
				</td>
			</tr>
			<tr class="notes">
				<td colspan="2">
					<dl>
						<dt>相互リンクしていただけるサイト様へ</dt>
						<dd>
							<p>相互リンクしていただけるサイト様は上位に表示され、トップページに新着10件まで表示されます。</p>
							<p><?php echo $title["Title"]["title_official"]?>のトップページ<br>
							<input type="text" class="url" onclick="this.select()" value="<?php echo $this->Html->url(array("controller" => "titles", "action" => "index", "path" => $title["Title"]["url_str"], "ext" => "html", "sp" => false), true)?>"></p>
							<p>またはオンラインゲームライフのトップページ<br>
							<input type="text" class="url" onclick="this.select()" value="<?php echo $this->Html->url("/", true)?>"></p>
							<p>上記URLいずれかへのリンクを貼っていただけますと幸いです。</p>
						</dd>
					</dl>
				</td>
			</tr>
		</table>
	<?php echo $this->Form->end()?>
</div>
