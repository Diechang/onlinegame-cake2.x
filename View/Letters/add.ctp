<?php
//contact
$this->Html->css(array('pages'), 'stylesheet', array('inline' => false));
?>
<?php echo $this->Session->flash()?>
<?php echo $this->element("form_letter")?>
<?php echo $this->Gads->ads468()?>