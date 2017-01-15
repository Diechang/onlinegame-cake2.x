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
			<th nowrap="nowrap">PC広告</th>
			<th nowrap="nowrap">スマホ広告</th>
			<th nowrap="nowrap">iOS広告</th>
			<th nowrap="nowrap">Android広告</th>
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
			<td class="tCenter" nowrap="nowrap">
				<?php echo $this->Html->link("編集", array("controller" => "titles", "action" => "edit", $title["Title"]["id"]), array("class" => "btn"))?>
				<?php echo $this->Form->hidden("Title." . $key . ".id", array("value" => $title["Title"]["id"]))?>
			</td>
			<td class="adBanner">
				<div><?php echo $title["Titlead"]["pc_text_src"]?></div>
				<div><?php echo $title["Titlead"]["pc_image_src"]?></div>
	<?php if(!empty($title["Titlead"]["pc_start"]) || !empty($title["Titlead"]["pc_end"])):?>
				<div><?php echo $title["Titlead"]["pc_start"]?> - <?php echo $title["Titlead"]["pc_end"]?></div>
	<?php endif;?>
			</td>
			<td class="adBanner">
				<div><?php echo $title["Titlead"]["sp_text_src"]?></div>
				<div><?php echo $title["Titlead"]["sp_image_src"]?></div>
	<?php if(!empty($title["Titlead"]["sp_start"]) || !empty($title["Titlead"]["sp_end"])):?>
				<div><?php echo $title["Titlead"]["sp_start"]?> - <?php echo $title["Titlead"]["sp_end"]?></div>
	<?php endif;?>
			</td>
			<td class="adBanner">
				<div><?php echo $title["Titlead"]["ios_text_src"]?></div>
				<div><?php echo $title["Titlead"]["ios_image_src"]?></div>
	<?php if(!empty($title["Titlead"]["ios_start"]) || !empty($title["Titlead"]["ios_end"])):?>
				<div><?php echo $title["Titlead"]["ios_start"]?> - <?php echo $title["Titlead"]["ios_end"]?></div>
	<?php endif;?>
			</td>
			<td class="adBanner">
				<div><?php echo $title["Titlead"]["android_text_src"]?></div>
				<div><?php echo $title["Titlead"]["android_image_src"]?></div>
	<?php if(!empty($title["Titlead"]["android_start"]) || !empty($title["Titlead"]["android_end"])):?>
				<div><?php echo $title["Titlead"]["android_start"]?> - <?php echo $title["Titlead"]["android_end"]?></div>
	<?php endif;?>
			</td>
			<td class="title" nowrap="nowrap">
				<?php echo $title["Title"]["title_official"]?>
				<span><?php echo $title["Title"]["title_read"]?></span>
				<?php echo $this->Common->linkConf($title["Title"]["official_url"], "Link")?>
			</td>
			<td>
				<?php echo $this->Html->image($this->Common->thumbName($title["Title"]["thumb_name"]), array("width" => 40))?>
			</td>
			<td class="service" nowrap="nowrap">
				<?php echo $this->Form->select("Title." . $key . ".service_id", $services, array("value" => $title["Title"]["service_id"], "class" => "input-medium", "empty" => false))?>
	<?php if(!empty($title["Title"]["test_start"]) || !empty($title["Title"]["test_end"])):?>
				<span><?php echo $title["Title"]["test_start"]?> - <?php echo $title["Title"]["test_end"]?></span>
	<?php endif;?>
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