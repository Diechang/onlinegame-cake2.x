<?php echo $this->Form->create("Title", array("action" => "lump"))?>
	<h2>広告付きタイトル一覧</h2>
	
	<?php echo $this->element("sys_paginate")?>
	
	<div class="controll">
		<input type="submit" value="一括修正" class="btn" />
	</div>

<table class="list table table-bordered table-striped">
	<thead>
		<tr>
			<th nowrap="nowrap">編集</th>
			<th nowrap="nowrap">公開</th>
			<th nowrap="nowrap">広告</th>
			<th nowrap="nowrap">広告テキスト</th>
			<th nowrap="nowrap">バナーS</th>
			<th nowrap="nowrap">バナーM</th>
			<th nowrap="nowrap">バナーL</th>
			<th nowrap="nowrap">タイトル</th>
			<th nowrap="nowrap">サムネ</th>
			<th nowrap="nowrap">状態</th>
			<th nowrap="nowrap">開始日</th>
			<th nowrap="nowrap">削除</th>
		</tr>
	</thead>
	<tbody>
<?php foreach($titles as $key => $title):?>
		<tr class="title_id_<?php echo $title["Title"]["id"]?>">
			<td class="tCenter" nowrap="nowrap"><?php echo $this->Html->link("編集", array("controller" => "titles", "action" => "edit", $title["Title"]["id"]), array("class" => "btn"))?></td>
			<td class="tCenter">
				<?php echo $this->Form->checkbox("Title." . $key . ".public", array("checked" => (!empty($title["Title"]["public"]))))?>
				<?php echo $this->Form->hidden("Title." . $key . ".id", array("value" => $title["Title"]["id"]))?>
			</td>
			<td class="tCenter">
				<?php echo $this->Form->checkbox("Title." . $key . ".ad_use", array("checked" => (!empty($title["Title"]["ad_use"]))))?>
			</td>
			<td><?php echo $title["Title"]["ad_text"]?></td>
			<td class="adBanner"><?php echo $title["Title"]["ad_banner_s"]?></td>
			<td class="adBanner"><?php echo $title["Title"]["ad_banner_m"]?></td>
			<td class="adBanner"><?php echo $title["Title"]["ad_banner_l"]?></td>
			<td class="title" nowrap="nowrap">
				<?php echo $title["Title"]["title_official"]?>
				<span><?php echo $title["Title"]["title_read"]?></span>
				<?php echo $this->Common->linkConf($title["Title"]["official_url"], "Link")?>
			</td>
			<td>
				<?php echo $this->Html->image($this->Common->thumbName($title["Title"]["thumb_name"]), array("width" => 40))?>
			</td>
			<td class="service" nowrap="nowrap">
				<?php echo $this->Html->link($title["Service"]["str"], array("controller" => "titles", "action" => "index", "?" => array("service" => $title["Service"]["id"])))?>
				<span><?php echo $title["Title"]["test_start"]?> - <?php echo $title["Title"]["test_end"]?></span>
			</td>
			<td nowrap="nowrap"><?php echo $title["Title"]["service_start"]?></td>
			<td class="tCenter" nowrap="nowrap"><?php echo $this->Html->link("<i class='icon-remove icon-white'></i>削除", array("controller" => "titles", "action" => "delete", $title["Title"]["id"]), array("class" => "btn btn-danger btn-small", "escape" => false), $title["Title"]["title_official"] . " を削除しますか?")?></td>
		</tr>
<?php endforeach;?>
	</tbody>
</table>

	<div class="controll"><input type="submit" value="一括修正" class="btn" /></div>
	<?php echo $this->element("sys_paginate", array("counter" => false))?>
<?php echo $this->Form->end()?>