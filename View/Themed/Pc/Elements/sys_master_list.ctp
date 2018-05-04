<?php echo $this->Form->create($model, array("action" => "lump", "sys" => true))?>
	<h2><?php echo $str?>一覧</h2>
	<table class="list tablesorter table table-bordered table-striped">
		<thead>
			<tr>
				<th nowrap="nowrap">編集</th>
				<th nowrap="nowrap">表示</th>
				<th nowrap="nowrap">ID</th>
				<th nowrap="nowrap">文字列</th>
				<th nowrap="nowrap">パス</th>
				<th nowrap="nowrap">ソート</th>
				<th nowrap="nowrap">削除</th>
			</tr>
		</thead>
		<tbody>
<?php foreach($items as $key => $item):?>
			<tr>
				<td class="tCenter">
					<?php echo $this->Html->link("編集", array("action" => "edit", $item[$model]["id"]), array("class" => "btn"))?>
					<?php echo $this->Form->hidden($model . "." . $key . ".id", array("value" => $item[$model]["id"]))?>
				</td>
				<td class="tCenter">
					<?php echo $this->Form->checkbox($model . "." . $key . ".public", array("checked" => (!empty($item[$model]["public"]))))?>
					<?php echo $this->Form->hidden($model . "." . $key . ".id", array("value" => $item[$model]["id"]))?>
				</td>
				<td><?php echo $item[$model]["id"]?></td>
				<td><?php echo $item[$model]["str"]?></td>
				<td><?php echo $item[$model]["path"]?></td>
				<td><?php echo $this->Form->text($model . "." . $key . ".sort", array("value" => $item[$model]["sort"], "size" => 4, "maxLength" => 4, "class" => "input-mini"))?></td>
				<td class="tCenter"><?php echo $this->Html->link("<i class='icon-remove icon-white'></i> 削除", array("action" => "delete", $item[$model]["id"]), array("class" => "btn btn-danger btn-small", "escape" => false), $item[$model]["str"] . " を削除しますか?")?></td>
			</tr>
<?php endforeach;?>
		</tbody>
	</table>
	<div class="controll"><?php echo $this->Form->submit("一括修正", array("class" => "btn"))?></div>
<?php echo $this->Form->end()?>