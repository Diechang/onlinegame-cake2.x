<?php
//Title vars
$titleWithStrs = $this->Common->titleWithStrs($title["Title"]["title_official"], $title["Title"]["title_read"], $title["Title"]["title_abbr"], $title["Title"]["title_sub"]);
//set blocks
$this->assign("title", $event["Event"]["name"] . " | " . $titleWithStrs["Abbr"]);
$this->assign("keywords", $event["Event"]["name"] . "," . $this->TitlePage->metaKeywords($this->request->params["action"], $title["Title"]["title_official"], $title["Title"]["title_read"], $title["Title"]["title_abbr"], $title["Title"]["title_sub"]));
$this->assign("description", $event["Event"]["summary"]);
//pankuz
$this->set("pankuz_for_layout", array(
	array("str" => $titleWithStrs["Case"], "url" => array("action" => "index", "path" => $title["Title"]["url_str"], "ext" => "html")),
	array("str" => "イベント・キャンペーン", "url" => array("action" => "events", "path" => $title["Title"]["url_str"], "ext" => "html")),
	$event["Event"]["name"],
));
//OGP
$this->element("title_ogp", array(
	"ogpTitle" => $this->viewVars["title_for_layout"],
	"ogpUrl" => $this->request->here,
	"ogpDescription" => mb_strimwidth($event["Event"]["summary"], 0, 120, " …", "UTF-8"),
));
?>
<?php echo $this->Session->flash()?>
<?php echo $this->element("title_head_title")?>

<?php echo $this->element("title_head_menu")?>


<!--Event-->
<div class="content event">
	<h2><?php echo $event["Event"]["name"]?></h2>
	<table class="data">
		<tr>
			<th>開催期間</th>
			<td><?php echo $this->Common->termFormat($event["Event"]["start"], $event["Event"]["end"])?></td>
		</tr>
	</table>
<?php if(empty($event["Event"]["details"])):?>
	<div class="summary">
		<p><?php echo $event["Event"]["summary"]?></p>
	</div>
<?php endif;?>
<?php if(!empty($event["Event"]["details"])):?>
	<div class="details">
		<?php echo $event["Event"]["details"]?>
	</div>
<?php endif;?>
<?php if(!empty($event["Event"]["press"])):?>
	<div class="press">
		<h3>以下プレスリリースより</h3>
		<blockquote><?php echo nl2br($event["Event"]["press"])?></blockquote>
	</div>
<?php endif;?>
	<p><?php echo $this->Gads->text336()?></p>
<?php if(!empty($event["Event"]["copyright"])):?>
	<div class="copyright">
		<p><?php echo nl2br($event["Event"]["copyright"])?></p>
	</div>
<?php endif;?>

<?php echo $this->element("title_share_single")?>

	<div class="officialLinkFrame">
		<p class="officialLink">
			<?php echo $this->Common->officialLinkText(
			$title["Title"]["title_official"],
			$title["Title"]["ad_use"], $title["Title"]["ad_text"], $title["Title"]["official_url"], $title["Title"]["service_id"])?>
		</p>
	</div>
</div>
<!--Events others-->
<div class="content events">
	<h2><?php echo $this->Html->image("design/titles_events_title_list.gif", array("alt" => "イベント一覧"))?></h2>
	<p class="description"><?php echo $title["Title"]["title_official"]?>のイベント・キャンペーン情報一覧です。</p>
	<ul class="eventsList">
	<?php foreach($events as $event):?>
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


<?php echo $this->element("title_details", array("titleWithStrs" => $titleWithStrs))?>

<?php //echo $this->element("title_share")?>

<?php echo $this->element("title_relations", array($relations))?>

<?php echo $this->Common->copyright($title["Title"]["copyright"])?>
