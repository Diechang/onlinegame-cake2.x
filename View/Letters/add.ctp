<?php
//set blocks
$this->assign("title", "お問合せ");
$this->assign("keywords", "お問合せ");
$this->assign("description", "オンラインゲームライフへのお問い合わせはこちらからお願いします。");
//pankuz
$this->set("pankuz_for_layout", "お問合せ");
?>
<?php echo $this->Session->flash()?>
<?php echo $this->element("form_letter")?>