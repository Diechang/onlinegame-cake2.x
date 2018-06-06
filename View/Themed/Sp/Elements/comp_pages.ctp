<?php if($this->Paginator->hasPrev() || $this->Paginator->hasNext()):?>
<?php
// options
if(isset($urlOptions))
{
	$this->Paginator->options(array(
		"url" => array_merge(array('controller' => $this->request->params["controller"], 'action' => $this->request->params["action"], 'ext' => 'html'), $urlOptions)
	));
}
?>
<nav class="pages">
	<ul class="paging">
		<?php if($this->Paginator->hasPrev()) echo $this->Paginator->prev("≪前へ", array("tag" => "li"))?>
		<?php echo $this->Paginator->numbers(array("tag" => "li", "currentClass" => "current", "currentTag" => "a", "separator" => " "))?>
		<?php if($this->Paginator->hasNext()) echo $this->Paginator->next("次へ≫", array("tag" => "li"))?>
	</ul>
</nav>
<?php endif;?>