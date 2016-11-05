<?php if($this->Paginator->hasPrev() || $this->Paginator->hasNext()):?>
<nav class="pages">
	<div class="counts">
		<?php echo $this->Paginator->counter(array("format" => '{:start} - {:end}'))?> / <span class="total"><?php echo number_format($this->Paginator->param("count"))?></span>
	</div>
	<ul class="paging">
		<?php if($this->Paginator->hasPrev()) echo $this->Paginator->prev("≪前へ", array("tag" => "li"))?>
		<?php echo $this->Paginator->numbers(array("tag" => "li", "currentClass" => "current", "currentTag" => "a", "separator" => " "))?>
		<?php if($this->Paginator->hasNext()) echo $this->Paginator->next("次へ≫", array("tag" => "li"))?>
	</ul>
</nav>
<?php endif;?>