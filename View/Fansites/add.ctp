<?php
//Title vars
$titleWithStrs = $this->Common->titleWithStrs($title["Title"]["title_official"], $title["Title"]["title_read"], $title["Title"]["title_abbr"], $title["Title"]["title_sub"]);
//set blocks
$this->assign("title", $titleWithStrs["Abbr"] . "攻略・ファンサイト登録");
$this->assign("keywords", "");
$this->assign("description", "");
//pankuz
$this->set("pankuz_for_layout", array(
	array("str" => $titleWithStrs["Case"], "url" => array("controller" => "titles", "action" => "index", "path" => $title["Title"]["url_str"], "ext" => "html")),
	array("str" => "攻略・ファンサイト", "url" => array("controller" => "titles", "action" => "link", "path" => $title["Title"]["url_str"], "ext" => "html")),
	"登録申込",
));
?>
<?php echo $this->Session->flash()?>

<!-- nav -->
<?php echo $this->element("title_nav")?>

<!-- add site -->
<section class="title-form-link">
	<h1>
		<span class="main">攻略・ファンサイトリンク集登録フォーム</span>
		<span class="sub"><?php echo $title["Title"]["title_official"]?>のリンク集に登録する</span>
	</h1>
	<div class="flash flash-info">
		<div class="flash-title">自薦他薦は問いません</div>
		<div class="flash-body"><?php echo $titleWithStrs["Case"]?>の攻略サイト、ファンサイトを運営、またはご存知の方はぜひご登録をお願いします。</div>
	</div>

<?php echo $this->element("form_fansite", array("title" => $title, "id" => $title["Title"]["id"]))?>

</section>

<!-- details -->
<?php echo $this->element("title_details", array("titleWithStrs" => $titleWithStrs))?>