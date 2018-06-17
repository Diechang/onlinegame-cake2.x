<?php
//set blocks
$this->assign("title", $title["Title"]["title_official"] . "レビュー・評価投稿");
//pankuz
// $this->set("pankuz_for_layout", array(array("str" => $title["Title"]["title_official"], "url" => array("controller" => "titles", "action" => "index", "path" => $title["Title"]["url_str"], "ext" => "html")), "レビュー・評価投稿"));
?>

<section class="title-form-vote">
	<h2>レビュー・評価を投稿する</h2>
<?php
	echo $this->element("form_vote", array(
	"titleId"	=> $title["Title"]["id"],
	"serviceId"	=> $title["Title"]["service_id"],
	"votable"	=> $title["Title"]["votable"],
))?>
</section>