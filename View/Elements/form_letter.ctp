<!-- contact -->
<section class="about-contact">
	<h1 class="pageTitle">
		<span class="main">お問い合わせ</span>
		<span class="sub">当サイトへのお問い合わせは、こちらのフォームよりお願いします</span>
	</h1>

	<div class="form">
		<?php echo $this->Form->create("Letter", array("action" =>"add", "inputDefaults" => array("div" => false, "label" => false, "legend" => false)))?>
			<table>
				<tr>
					<th class="must">お名前</th>
					<td><?php echo $this->Form->input("name", array("class" => "input-text"))?></td>
				</tr>
				<tr>
					<th class="must">メールアドレス</th>
					<td><?php echo $this->Form->input("mail", array("class" => "input-text"))?></td>
				</tr>
				<tr>
					<th class="must">本文</th>
					<td><?php echo $this->Form->input("body", array("rows" => "6", "class" => "input-text"))?></td>
				</tr>
				<tr>
					<th>認証番号</th>
					<td><?php echo $this->Html->image("design/spamnum.gif", array("alt" => "スパム防止番号"))?></td>
				</tr>
				<tr>
					<th class="must">認証</th>
					<td>
						<span class="input-attention">スパム防止のため上記認証番号を半角で入力してください。</span>
						<?php echo $this->Form->text("spam_num", array(
							"class" => "input-text input-text-s",
							"size" => 4,
							"maxLength" => 4))?>
					</td>
				</tr>
				<tr class="submit">
					<td colspan="2">
						<?php echo $this->Form->button("お問合せを送信", array(
							"type" => "submit",
							"class" => "button button-submit"))?>
					</td>
				</tr>
				<tr class="notes">
					<td colspan="2">
						<dl>
							<dt>返信を保証するものではありません</dt>
							<dd>セールスのお問い合わせなどについては、お返事を控えさせていただく場合がありますのでご了承ください。</dd>
						</dl>
					</td>
				</tr>
			</table>
		<?php echo $this->Form->end()?>
	</div>
	<div class="gAds"><?php echo $this->Gads->ads468()?></div>
</section>