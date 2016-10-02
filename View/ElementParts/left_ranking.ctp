<!-- ranking -->
<section class="ranking">
	<h1>
		<span class="main">ランキングTOP10</span>
	</h1>
	<ul>
<?php foreach($leftRankings as $rank):?>
		<li>
			<a href="<?php echo $this->Html->url(array("controller" => "titles", "action" => "index", "path" => $rank["Title"]["url_str"], "ext" => "html"));?>">
				<div class="image"><?php echo $this->Html->image($this->Common->thumb_name($rank["Title"]["thumb_name"]), array("width" => 40, "height" => "30"));?></div>
				<p class="title"><?php echo $rank["Title"]["title_official"];?></p>
			</a>
		</li>
<?php endforeach;?>
	</ul>
	<div class="more">
		<?php echo $this->Html->link('ランキング詳細 <i class="zmdi zmdi-chevron-right"></i>', array("controller" => "ranking", "action" => "index", "path" => "index", "ext" => "html"), array("escape" => false));?>
	</div>
</section>
