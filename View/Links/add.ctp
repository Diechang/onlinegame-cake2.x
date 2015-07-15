<?php
//スタイル
$this->Html->css(array('links'), 'stylesheet', array('inline' => false));
?>
<?php echo $this->Session->flash()?>
<?php echo $this->element("form_link")?>