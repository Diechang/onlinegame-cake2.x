<?php
//set blocks
$this->assign("title", "相互リンク登録申込");
$this->assign("keywords", "");
$this->assign("description", "");
//pankuz
// $this->set("pankuz_for_layout", array(
// 	array("str" => "相互リンク集", "url" => array("controller" => "links", "action" => "index", "path" => "index", "ext" => "html")),
// 	"登録申込",
// ));
?>

<?php echo $this->element("form_link")?>