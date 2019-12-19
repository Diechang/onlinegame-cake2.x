<!-- form -->
<section class="link-form" id="form">
	<h1>相互リンク集登録依頼フォーム</h1>
	<div class="form">
		<?php echo $this->Form->create("Link", array("url" => array("action" => "add"), "inputDefaults" => array("div" => false, "label" => false, "legend" => false)))?>
			<table>
				<tr>
					<th class="must">サイト名</th>
					<td><?php echo $this->Form->input("site_name", array("class" => "input-text"))?></td>
				</tr>
				<tr>
					<th class="must">サイトURL</th>
					<td><?php echo $this->Form->input("site_url", array("class" => "input-text"))?></td>
				</tr>
				<tr>
					<th class="must">リンク設置URL</th>
					<td><?php echo $this->Form->input("link_url", array("class" => "input-text"))?></td>
				</tr>
				<tr>
					<th>サイト紹介文</th>
					<td>
						<?php echo $this->Form->input("site_info", array("class" => "input-text", "rows" => 5))?>
						<span class="input-description">全角100文字まで</span>
					</td>
				</tr>
				<tr>
					<th>登録カテゴリ</th>
					<td><?php echo $this->Form->input("linkcategory_id", array("class" => "input-select"))?></td>
				</tr>
				<tr>
					<th class="must">管理者のお名前</th>
					<td><?php echo $this->Form->input("admin_name", array("class" => "input-text"))?></td>
				</tr>
				<tr>
					<th class="must">メールアドレス</th>
					<td><?php echo $this->Form->input("admin_mail", array("class" => "input-text"))?></td>
				</tr>
				<tr>
					<th>メッセージ</th>
					<td>
						<?php echo $this->Form->input("message", array("rows" => 5, "class" => "input-text"))?>
						<span class="input-description">ありましたらどうぞ</span>
					</td>
				</tr>
				<tr>
					<th>認証番号</th>
					<td><?php echo $this->Html->image("design/spamnum.gif", array("alt" => "スパム防止番号"))?></td>
				</tr>
				<tr>
					<th class="must">認証</th>
					<td>
						<div class="input-attention">スパム防止のため上記認証番号を半角で入力してください。</div>
						<?php echo $this->Form->text("spam_num", array(
							"value" => "",
							"class" => "input-text input-text-s",
							"size" => 4,
							"maxLength" => 4))?>
					</td>
				</tr>
				<tr class="submit">
					<td colspan="2">
						<?php echo $this->Form->button("相互リンク申込", array(
							"type" => "submit",
							"class" => "button button-submit"))?>
					</td>
				</tr>
				<tr class="notes">
					<td colspan="2">
						<dl>
							<dt>ご依頼内容が必ず掲載されるとは限りません</dt>
							<dd>ご依頼頂いたURLを確認し、登録内容を修正する場合があります。<br>
							また、更新の滞っているサイト様、当サイトのリンク掲載に不適切だと判断した場合はリンク掲載を中止する場合があります。</dd>
							<dt>クオリティの高いサイト様を募集しています</dt>
							<dd>当サイトでは、クオリティの高いサイト様のリンク掲載に努めています。<br>
							作りたてのサイト様や、内容の薄いサイト様など、当サイトのリンク掲載基準に達していないサイト様はリンクを掲載できない場合があります。</dd>
						</dl>
					</td>
				</tr>
			</table>
		<?php echo $this->Form->end()?>
	</div>
</section>
