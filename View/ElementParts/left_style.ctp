<!-- styles -->
<section class="styles">
	<h2>
		<span class="main">スタイル</span>
		<span class="sub">自分に合ったゲームを探す</span>
	</h2>
	<ul>
<?php foreach($leftStyles as $style):?>
		<li><?php echo $this->Html->link($style["Style"]["str"], array("controller" => "styles", "action" => "index", "path" => $style["Style"]["path"], "ext" => "html"))?></li>
<?php endforeach;?>
	</ul>
</section>
