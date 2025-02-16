<table class="list table table-bordered table-striped">
	<thead>
		<tr>
			<th nowrap="nowrap">編集</th>
			<th nowrap="nowrap">公開</th>
			<th nowrap="nowrap">広告</th>
			<th nowrap="nowrap">ID</th>
			<th nowrap="nowrap">タイトル</th>
			<th nowrap="nowrap">サムネ</th>
			<th nowrap="nowrap">パス</th>
			<th nowrap="nowrap">プラットフォーム</th>
			<th nowrap="nowrap">カテゴリ</th>
			<th nowrap="nowrap">状態</th>
			<th nowrap="nowrap">開始日</th>
			<th nowrap="nowrap">評価</th>
			<th nowrap="nowrap">Event</th>
			<th nowrap="nowrap">Link</th>
			<th nowrap="nowrap">Spec</th>
			<th nowrap="nowrap">PC</th>
			<th nowrap="nowrap">Pac</th>
			<th nowrap="nowrap">削除</th>
		</tr>
	</thead>
	<tbody>
<?php $adPlatforms = array("PC" => "info", "SP"=> "important", "iOS" => "inverse", "Android" => "success")?>
<?php foreach($titles as $key => $title):?>
		<tr class="title_id_<?php echo $title["Title"]["id"]?>">
			<td class="tCenter" nowrap="nowrap"><?php echo $this->Html->link("編集", array("controller" => "titles", "action" => "edit", $title["Title"]["id"]), array("class" => "btn"))?></td>
			<td class="tCenter">
				<?php echo $this->Form->checkbox("Title." . $key . ".public", array("checked" => (!empty($title["Title"]["public"]))))?>
				<?php echo $this->Form->hidden("Title." . $key . ".id", array("value" => $title["Title"]["id"]))?>
			</td>
			<td class="tCenter">
<?php foreach($adPlatforms as $adPlatform => $label):?>
	<?php $lowAdPlatform = strtolower($adPlatform)?>
	<?php if(!empty($title["Titlead"]["{$lowAdPlatform}_text_src"]) || !empty($title["Titlead"]["{$lowAdPlatform}_image_src"])):?>
				<span class="label label-<?php echo ($title["Titlead"]["{$lowAdPlatform}_activation"]) ? $label : "default"?>"><?php echo $adPlatform?></span>
	<?php endif;?>
<?php endforeach;?>
			</td>
			<td class="tRight"><?php echo $title["Title"]["id"]?></td>
			<td class="title" nowrap="nowrap">
				<?php echo $title["Title"]["title_official"]?>
				<span><?php echo $title["Title"]["title_read"]?></span>
				<?php echo $this->Html->image("sys/sys_icon_fee_" . $title["Fee"]["path"] . ".gif")?>
				<?php echo (!empty($title["Title"]["video"])) ? $this->Html->image("sys/sys_icon_video.gif") : ""?>
			</td>
			<td>
				<?php echo $this->Html->image($this->Common->thumbName($title["Title"]["thumb_name"]), array("width" => 40))?>
			</td>
			<td><?php echo $this->Html->link($title["Title"]["url_str"], array("controller" => "titles", "action" => "index", "path" => $title["Title"]["url_str"], "sys" => false, "ext" => "html"), array("target" => "_blank"))?></td>
			<td class="platforms">
	<?php foreach($title["Platform"] as $platform):?>
				<?php echo $this->Html->link($platform["path"], array("controller" => "titles", "action" => "index", "?" => array("platform" => $platform["id"])))?>
	<?php endforeach;?>
			</td>
			<td class="categories">
	<?php foreach($title["Category"] as $category):?>
				<?php echo $this->Html->link($category["path"], array("controller" => "titles", "action" => "index", "?" => array("category" => $category["id"])))?>
	<?php endforeach;?>
			</td>
			<td class="service" nowrap="nowrap">
				<?php echo $this->Form->select("Title." . $key . ".service_id", $services, array("value" => $title["Title"]["service_id"], "class" => "input-medium", "empty" => false))?>
	<?php if(!empty($title["Title"]["test_start"]) || !empty($title["Title"]["test_end"])):?>
				<span><?php echo $title["Title"]["test_start"]?> - <?php echo $title["Title"]["test_end"]?></span>
	<?php endif;?>
			</td>
			<td nowrap="nowrap"><?php echo $title["Title"]["service_start"]?></td>
			<td class="<?php echo $this->Common->addClassZero(count($title["Vote"]), "tCenter")?>">
				<?php echo $this->Html->link(sprintf("%.2f", $title["Titlesummary"]["vote_avg_all"]) . "(" . count($title["Vote"]) . ")", array("controller" => "votes", "action" => "index", "?" => array("title_id" => $title["Title"]["id"])), array("class" => $this->Common->addClassZero(count($title["Vote"]))))?>
			</td>
			<td class="<?php echo $this->Common->addClassZero(count($title["Event"]), "tCenter")?>">
				<?php echo $this->Html->link(count($title["Event"]), array("controller" => "events", "action" => "index", "title_id" => $title["Title"]["id"]), array("class" => $this->Common->addClassZero(count($title["Event"]))))?>
				<?php echo $this->Html->link("＋", array("controller" => "events", "action" => "add", "title_id" => $title["Title"]["id"]), array("class" => $this->Common->addClassZero(count($title["Event"]))))?>
			</td>
			<td class="<?php echo $this->Common->addClassZero(count($title["Fansite"]), "tCenter")?>">
				<?php echo $this->Html->link(count($title["Fansite"]), array("controller" => "fansites", "action" => "index", "?" => array("title_id" => $title["Title"]["id"])), array("class" => $this->Common->addClassZero(count($title["Fansite"]))))?>
			</td>
			<td class="<?php echo $this->Common->addClassZero(count($title["Spec"]), "tCenter")?>">
				<?php echo $this->Html->link(count($title["Spec"]), array("controller" => "specs", "action" => "index", "?" => array("title_id" => $title["Title"]["id"])), array("class" => $this->Common->addClassZero(count($title["Spec"]))))?>
			</td>
			<td class="<?php echo $this->Common->addClassZero(count($title["Pc"]), "tCenter")?>" nowrap="nowrap">
				<?php echo $this->Html->link(count($title["Pc"]), array("controller" => "pcs", "action" => "index", "?" => array("title_id" => $title["Title"]["id"])), array("class" => $this->Common->addClassZero(count($title["Pc"]))))?>
				<?php echo $this->Html->link("＋", array("controller" => "pcs", "action" => "add", "?" => array("title_id" => $title["Title"]["id"])), array("class" => $this->Common->addClassZero(count($title["Pc"]))))?>
			</td>
			<td class="<?php echo $this->Common->addClassZero(count($title["Package"]), "tCenter")?>" nowrap="nowrap">
				<?php echo $this->Html->link(count($title["Package"]), array("controller" => "packages", "action" => "index", "?" => array("title_id" => $title["Title"]["id"])), array("class" => $this->Common->addClassZero(count($title["Package"]))))?>
			</td>
			<td class="tCenter" nowrap="nowrap"><?php echo $this->Html->link("<i class='icon-remove icon-white'></i>削除", array("controller" => "titles", "action" => "delete", $title["Title"]["id"]), array("class" => "btn btn-danger btn-small", "escape" => false), $title["Title"]["title_official"] . " を削除しますか?")?></td>
		</tr>
<?php endforeach;?>
	</tbody>
</table>