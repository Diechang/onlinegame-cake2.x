<?php echo $this->Form->create($model, array("action" => "lump", "sys" => true))?>
	<h2><?php echo $str?>一覧
		/ <?php echo $this->Html->link("公開", array("action" => "index", "sys" => "true"))?>
		/ <?php echo $this->Html->link("すべて", array("action" => "index", "sys" => "true", "all"))?></h2>
	<table class="list table table-bordered table-striped">
		<thead>
			<tr>
				<th nowrap="nowrap">編集</th>
				<th nowrap="nowrap">表示</th>
				<th nowrap="nowrap">NR</th>
				<th nowrap="nowrap">ID</th>
				<th nowrap="nowrap">バナー<?php if(isset($comment)):?> / コメント<?php endif;?></th>
				<?php if(isset($sort)):?><th nowrap="nowrap">ソート</th><?php endif;?>
				<th nowrap="nowrap">登録日</th>
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
				</td>
				<td class="tCenter">
					<?php echo $this->Form->checkbox($model . "." . $key . ".ad_noredirect", array("checked" => (!empty($item[$model]["ad_noredirect"]))))?>
				</td>
				<td><?php echo $item[$model]["id"]?></td>
				<td>
					<?php echo (isset($item["Title"])) ? $item["Title"]["title_official"] : $item[$model]["note"]?>
					<div class="adPreview"><?php echo $item[$model]["ad_src_image"]?></div>
					<?php if(isset($comment)) echo nl2br($item[$model]["comment"])?>
				</td>
				<?php if(isset($sort)):?><td><?php echo $this->Form->text($model . "." . $key . ".sort", array("value" => $item[$model]["sort"], "size" => 4, "maxLength" => 4))?></td><?php endif;?>
				<td><?php echo $item[$model]["created"]?></td>
				<td class="tCenter"><?php echo $this->Html->link("<i class='icon-remove icon-white'></i> 削除", array("action" => "delete", $item[$model]["id"]), array("class" => "btn btn-danger btn-small", "escape" => false), $item[$model]["id"] . " を削除しますか?")?></td>
			</tr>
<?php endforeach;?>
		</tbody>
	</table>
	<div class="controll"><?php echo $this->Form->submit("一括修正", array("class" => "btn"))?></div>
<?php echo $this->Form->end()?>