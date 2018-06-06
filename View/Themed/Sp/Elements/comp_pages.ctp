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
		<?php echo $this->Paginator->numbers(array("tag" => "li", "currentClass" => "current", "currentTag" => "a", "separator" => " "))?>
	</ul>
</nav>
<?php endif;?>