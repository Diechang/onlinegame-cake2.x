<?php echo $this->Form->create("Event" , array("action" => "edit" , "inputDefaults" => array("div" => false , "label" => false , "monthNames" => false , "dateFormat" => "YMD" , "timeFormat" => "24" , "minYear" => 1990 , "maxYear" => date("Y") + 2)))?>
	<h2>イベント編集</h2>
	<table class="edit event table table-bordered">
		<tr>
			<th nowrap="nowrap">ID</th>
			<td><?php echo $this->request->data["Event"]["id"]?><?php echo $this->Form->hidden("id")?></td>
		</tr>
		<tr>
			<th nowrap="nowrap">公開</th>
			<td>
				<?php echo $this->Form->checkbox("public")?> 公開する
			</td>
		</tr>
		<tr>
			<th nowrap="nowrap">タイトル</th>
<?php if(isset($withTitle)):?>
			<td><?php echo $this->Form->input("title_id")?></td>
<?php else:?>
			<td><?php echo $this->Form->input("title_id" , array("empty" => true))?></td>
<?php endif;?>
		</tr>
		<tr>
			<th nowrap="nowrap">イベントタイトル</th>
			<td><?php echo $this->Form->input("name" , array("class" => "wide"))?></td>
		</tr>
		<tr>
			<th nowrap="nowrap">イベント概要</th>
			<td><?php echo $this->Form->input("summary" , array("class" => "wide"))?></td>
		</tr>
		<tr>
			<th nowrap="nowrap">イベント詳細</th>
			<td><?php echo $this->Form->input("details" , array("class" => "editor"))?></td>
		</tr>
		<tr>
			<th nowrap="nowrap">プレスリリース</th>
			<td><?php echo $this->Form->input("press" , array("class" => "wide"))?></td>
		</tr>
		<tr>
			<th nowrap="nowrap">コピーライト</th>
			<td><?php echo $this->Form->input("copyright" , array("class" => "wide"))?></td>
		</tr>
		<tr>
			<th nowrap="nowrap">開始日</th>
			<td>
				<?php echo $this->Form->input("start" , array("empty" => true , "class" => "input-mini"))?>
			</td>
		</tr>
		<tr>
			<th nowrap="nowrap">終了日</th>
			<td>
				<?php echo $this->Form->input("end" , array("empty" => true , "class" => "input-mini"))?>
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