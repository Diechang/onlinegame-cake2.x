<?php if(!isset($counter) || $counter != false):?>
<p><?php echo $this->Paginator->counter(array("format" => "<strong>%count%件中</strong> %start%件目 ～ %end%件表示"))?></p>
<?php endif;?>
<?php if($this->Paginator->hasPrev() || $this->Paginator->hasNext()):?>
<div class="pagination">
	<ul>
		<?php echo $this->Paginator->prev("≪", array('tag' => 'li'), null, array('tag' => 'li','class' => 'disabled','disabledTag' => 'a'))?>
		<?php echo $this->Paginator->numbers(array('separator' => '','currentTag' => 'a', 'currentClass' => 'active','tag' => 'li','first' => 1, 'ellipsis' => '<li class="disabled"><a>...</a></li>'))?>
		<?php echo $this->Paginator->next("≫", array('tag' => 'li','currentClass' => 'disabled'), null, array('tag' => 'li','class' => 'disabled','disabledTag' => 'a'))?>
	</ul>
</div>
<?php endif;?>