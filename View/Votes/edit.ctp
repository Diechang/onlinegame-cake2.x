<?php
//set blocks
$this->assign("title", $this->request->data["Title"]["title_official"] . "レビュー・評価編集");
//pankuz
$this->set("pankuz_for_layout", array(array("str" => $this->request->data["Title"]["title_official"], "url" => array("controller" => "titles", "action" => "index", "path" => $this->request->data["Title"]["url_str"], "ext" => "html")), "レビュー・評価編集"));
?>
<?php echo $this->Session->flash()?>
<?php
	echo $this->element("form_vote", array(
	"title"		=> $this->request->data["Title"]["title_official"],
	"titleId"	=> $this->request->data["Title"]["id"],
	"votable"	=> $this->request->data["Title"]["votable"],
	"voteId"	=> $this->request->data["Vote"]["id"],
))?>