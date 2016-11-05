<?php
//set blocks
$this->assign("title", $title["Title"]["title_official"] . "レビュー・評価投稿");
//pankuz
$this->set("pankuz_for_layout", array(array("str" => $title["Title"]["title_official"], "url" => array("controller" => "titles", "action" => "index", "path" => $title["Title"]["url_str"], "ext" => "html")), "レビュー・評価投稿"));
?>
<?php echo $this->Session->flash()?>
<?php
	echo $this->element("form_vote", array(
	"title"		=> $title["Title"]["title_official"],
	"titleId"	=> $title["Title"]["id"],
	"votable"	=> $title["Title"]["votable"],
))?>