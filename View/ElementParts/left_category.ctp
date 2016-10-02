<!-- genres -->
<section class="genres">
	<h1>
		<span class="main">ジャンル</span>
		<span class="sub">好きなジャンルで探す</span>
	</h1>
	<ul>
<?php foreach($leftCategories as $category):?>
		<li><?php echo $this->Html->link($category["Category"]["str"], array("controller" => "categories", "action" => "index", "path" => $category["Category"]["path"], "ext" => "html"))?></li>
<?php endforeach;?>
	</ul>
</section>
