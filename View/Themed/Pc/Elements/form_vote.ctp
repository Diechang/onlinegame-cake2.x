<?php
	if(isset($voteId))
	{//編集時
		$submit_text			= "編集";
		$formUrl		= array(
			"controller"	=> "votes",
			"action"		=> "edit",
		);
	}
	else
	{//投稿時
		$submit_text			= "投稿";
		$formUrl		= array(
			"controller"	=> "votes",
			"action"		=> "add",
		);
	}
?>
<?php if(!empty($votable)):?>
<div class="form form-vote">
	<?php echo $this->Form->create("Vote", array(
		"url" => $formUrl,
		"inputDefaults" => array(
			"div" => false,
			"label" => false,
			"legend" => false
		)
	))?>
		<table>
			<tr class="head">
				<th>評価項目</th>
				<td class="taCenter">不満 ＜ 普通 ＞ 満足</td>
			</tr>
	<?php foreach($voteItems as $key => $voteItem):?>
			<tr>
				<th><?php echo $voteItem["ask"]?></th>
				<td class="taCenter">
						<?php echo $this->Form->input($key, array(
							"type" => "radio",
							"options" => array(
								"1" => "",
								"2" => "",
								"3" => "",
								"4" => "",
								"5" => ""),
							"before" => '<label class="rate">',
							"after" => '</label>',
							"separator" => '</label><label class="rate">',
							"default" => 3))?>
				</td>
			</tr>
	<?php endforeach;?>
			<tr class="head">
				<th colspan="2">レビューも書く（必須ではありません）</th>
			</tr>
			<tr>
				<th>投稿者名（HN）</th>
				<td>
					<?php echo $this->Form->text("poster_name", array(
						"class" => "input-text"))?><br>
					<span class="input-description">未入力の場合は「名無しさん」と表示されます</span></td>
			</tr>
			<tr>
				<th>タイトル</th>
				<td>
					<?php echo $this->Form->text("title", array(
						"class" => "input-text"))?><br>
					<span class="input-description">レビューの見出しとして使用されます</span></td>
			</tr>
			<tr>
				<th>レビュー</th>
				<td>
					<?php echo $this->Form->input("review", array(
						"class" => "input-text",
						"cols" => false,
						"rows" => 10))?>
				</td>
			</tr>
			<tr>
				<th>編集用パスワード</th>
				<td>
					<?php echo $this->Form->text("pass", array(
						"value" => "",
						"class" => "input-text input-text-s",
						"size" => 8,
						"maxLength" => 8))?>
					<span class="input-description">※2～8文字の半角英数字のみです。</span>
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
			<tr class="notes">
				<td colspan="2">
					<dl>
						<dt>注意事項</dt>
						<dd>レビューは「ゲームに対する個人的な感想」として投稿してください。<br>
						他の方のレビューに対する意見や批判はトラブルの原因となり得ます。<br>
						ご理解のほど、よろしくお願い致します。</dd>
						<dt>一度投稿したタイトルには投稿できません</dt>
						<dd>編集用パスワードを設定することで、投稿後の編集が可能です。</dd>
					</dl>
				</td>
			</tr>
			<tr class="submit">
				<td colspan="2">
					<?php echo $this->Form->hidden("title_id", array(
					"value" => $titleId))?>

					<?php echo $this->Form->button("レビュー・評価を" . $submit_text, array(
						"type" => "submit",
						"class" => "button button-submit"))?>
				</td>
			</tr>
		</table>
	<?php echo $this->Form->end()?>
</div>
<?php else:?>
	<?php if($serviceId == 1):?>
<div class="flash flash-danger">
	<div class="flash-title">現在レビュー・評価の投稿は受け付けておりません。</div>
	<div class="flash-body">サービス終了・休止中のタイトルへは投稿できません。</div>
</div>
	<?php else:?>
<div class="flash flash-info">
	<div class="flash-title">現在レビュー・評価の投稿は受け付けておりません。</div>
	<div class="flash-body">正式・テストサービスが開始されるまでお待ち下さい。</div>
</div>
	<?php endif;?>
<?php endif;?>