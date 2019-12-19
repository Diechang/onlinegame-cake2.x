<h3><?php echo $this->Html->link("ポータル新規登録", array("action" => "add"), array("class" => "btn btn-success"))?></a></h3>
<?php echo $this->Form->create("Portal", array("url" => array("action" => "lump")))?>
	<h2>ポータル一覧</h2>
	<p id="results"></p>
	<div class="controll">
		<?php echo $this->Form->submit("一括修正", array("class" => "btn"))?>
		<input type="text" id="word_searcher" />
	</div>
	<table class="list tablesorter table table-bordered table-striped">
		<thead>
			<tr>
				<th nowrap="nowrap">編集</th>
				<th nowrap="nowrap">公開</th>
				<th nowrap="nowrap">広告</th>
				<th nowrap="nowrap">ID</th>
				<th nowrap="nowrap">タイトル</th>
				<th nowrap="nowrap">パス</th>
				<th nowrap="nowrap">削除</th>
			</tr>
		</thead>
		<tbody>
	<?php foreach($portals as $key => $portal):?>
			<tr>
				<td class="tCenter"><?php echo $this->Html->link("編集", array("action" => "edit", $portal["Portal"]["id"]), array("class" => "btn"))?></td>
				<td class="tCenter">
					<?php echo $this->Form->checkbox("Portal." . $key . ".public", array("checked" => (!empty($portal["Portal"]["public"]))))?>
					<?php echo $this->Form->hidden("Portal." . $key . ".id", array("value" => $portal["Portal"]["id"]))?>
				</td>
				<td class="tCenter">
					<?php echo $this->Form->checkbox("Portal." . $key . ".ad_use", array("checked" => (!empty($portal["Portal"]["ad_use"]))))?>
				</td>
				<td class="tRight"><?php echo $portal["Portal"]["id"]?></td>
				<td class="title" nowrap="nowrap"><?php echo $portal["Portal"]["title_official"]?><br /><?php echo $portal["Portal"]["title_read"]?></td>
				<td><?php echo $this->Html->link($portal["Portal"]["url_str"], array("action" => "view", "path" => $portal["Portal"]["url_str"], "sys" => false, "ext" => "html"), array("target" => "_blank"))?></td>
				<td class="tCenter"><?php echo $this->Html->link("<i class='icon-remove icon-white'></i>削除", array("action" => "delete", $portal["Portal"]["id"]), array("class" => "btn btn-danger btn-small", "escape" => false), $portal["Portal"]["id"] . " を削除しますか?")?></td>
			</tr>
	<?php endforeach;?>
		</tbody>
	</table>
	<div class="controll"><?php echo $this->Form->submit("一括修正", array("class" => "btn"))?></div>
<?php echo $this->Form->end()?>
