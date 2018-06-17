<?php
//set blocks
$this->assign("title", $this->request->data["Title"]["title_official"] . "レビュー・評価編集");
//pankuz
// $this->set("pankuz_for_layout", array(array("str" => $this->request->data["Title"]["title_official"], "url" => array("controller" => "titles", "action" => "index", "path" => $this->request->data["Title"]["url_str"], "ext" => "html")), "レビュー・評価編集"));
?>

<section class="title-form-vote">
	<h2>レビュー・評価を編集する</h2>
<?php
	echo $this->element("form_vote", array(
	"titleId"	=> $this->request->data["Title"]["id"],
	"serviceId"	=> $this->request->data["Title"]["service_id"],
	"votable"	=> $this->request->data["Title"]["votable"],
	"voteId"	=> $this->request->data["Vote"]["id"],
))?>
</section>