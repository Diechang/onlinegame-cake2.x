<?php
//Title vars
$titleWithStrs = $this->Common->titleWithStrs($title["Title"]["title_official"], $title["Title"]["title_read"], $title["Title"]["title_abbr"], $title["Title"]["title_sub"]);
//set blocks
$this->assign("title", $titleWithStrs["Abbr"] . " イベント・キャンペーン情報");
$this->assign("keywords", $this->TitlePage->metaKeywords($this->request->params["action"], $title["Title"]["title_official"], $title["Title"]["title_read"], $title["Title"]["title_abbr"], $title["Title"]["title_sub"]));
$this->assign("description", $titleWithStrs["Sub"] . "ののイベント・キャンペーン情報一覧です。");
//pankuz
$this->set("pankuz_for_layout", array(array("str" => $titleWithStrs["Case"], "url" => array("action" => "index", "path" => $title["Title"]["url_str"], "ext" => "html")), "イベント・キャンペーン"));
//OGP
$this->element("title_ogp", array("titleWithStrs" => $titleWithStrs));
?>
<?php echo $this->Session->flash()?>
<?php echo $this->element("title_head_title")?>

<?php echo $this->element("title_head_menu")?>


<?php if(empty($events)):?>
<div class="content"><p>イベントデータがありません。</p></div>
<?php endif;?>
<?php if(!empty($events["current"])):?>
<div class="content events">
	<h2><?php echo $this->Html->image("design/titles_events_title_current.gif", array("alt" => "現在開催中のイベント・キャンペーン"))?></h2>
	<p class="description"><?php echo $title["Title"]["title_official"]?>で現在開催中のイベント・キャンペーン情報です。</p>
	<ul class="eventsList">
	<?php foreach($events["current"] as $event):?>
		<li>
			<h3><?php echo $this->Html->link($event["Event"]["name"], array("controller" => "titles", "action" => "event", "path" => $title["Title"]["url_str"], "eventid" => $event["Event"]["id"], "ext" => "html"))?></h3>
			<p class="description"><?php echo $event["Event"]["summary"]?></p>
			<table class="data">
				<tr>
					<th>開催期間</th>
					<td><?php echo $this->Common->termFormat($event["Event"]["start"], $event["Event"]["end"])?></td>
				</tr>
			</table>
		</li>
	<?php endforeach;?>
	</ul>
	<p class="officialLink">
		<?php echo $this->Common->officialLinkText(
		$title["Title"]["title_official"],
		$title["Title"]["ad_use"], $title["Title"]["ad_text"], $title["Title"]["official_url"], $title["Title"]["service_id"])?>
	</p>
</div>
<?php endif;?>
<?php if(!empty($events["future"])):?>
<div class="content events">
	<h2><?php echo $this->Html->image("design/titles_events_title_future.gif", array("alt" => "開催予定のイベント"))?></h2>
	<p class="description"><?php echo $title["Title"]["title_official"]?>で予定されているイベント・キャンペーン情報です。</p>
	<ul class="eventsList">
	<?php foreach($events["future"] as $event):?>
		<li>
			<h3><?php echo $this->Html->link($event["Event"]["name"], array("controller" => "titles", "action" => "event", "path" => $title["Title"]["url_str"], "eventid" => $event["Event"]["id"], "ext" => "html"))?></h3>
			<p class="description"><?php echo $event["Event"]["summary"]?></p>
			<table class="data">
				<tr>
					<th>開催期間</th>
					<td><?php echo $this->Common->termFormat($event["Event"]["start"], $event["Event"]["end"])?></td>
				</tr>
			</table>
		</li>
	<?php endforeach;?>
	</ul>
	<p class="officialLink">
		<?php echo $this->Common->officialLinkText(
		$title["Title"]["title_official"],
		$title["Title"]["ad_use"], $title["Title"]["ad_text"], $title["Title"]["official_url"], $title["Title"]["service_id"])?>
	</p>
</div>
<?php endif;?>
<?php if(!empty($events["back"])):?>
<div class="content events">
	<h2><?php echo $this->Html->image("design/titles_events_title_back.gif", array("alt" => "終了したイベント・キャンペーン"))?></h2>
	<ul class="eventsList">
	<?php foreach($events["back"] as $event):?>
		<li>
			<h3><?php echo $this->Html->link($event["Event"]["name"], array("controller" => "titles", "action" => "event", "path" => $title["Title"]["url_str"], "eventid" => $event["Event"]["id"], "ext" => "html"))?></h3>
			<p class="description"><?php echo $event["Event"]["summary"]?></p>
			<table class="data">
				<tr>
					<th>開催期間</th>
					<td><?php echo $this->Common->termFormat($event["Event"]["start"], $event["Event"]["end"])?></td>
				</tr>
			</table>
		</li>
	<?php endforeach;?>
	</ul>
	<p class="officialLink">
		<?php echo $this->Common->officialLinkText(
		$title["Title"]["title_official"],
		$title["Title"]["ad_use"], $title["Title"]["ad_text"], $title["Title"]["official_url"], $title["Title"]["service_id"])?>
	</p>
</div>
<?php endif;?>


<?php echo $this->element("title_details", array("titleWithStrs" => $titleWithStrs))?>

<?php echo $this->element("title_share")?>

<?php echo $this->element("title_relations", array($relations))?>

<?php echo $this->element("form_fansite", array("title" => $title))?>

<?php echo $this->Common->copyright($title["Title"]["copyright"])?>
