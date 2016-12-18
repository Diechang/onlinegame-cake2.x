<ul class="list">
<?php foreach($categoryRankings as $categoryRanking):?>
	<?php if(!empty($categoryRanking["Ranking"])):?>
	<li>
		<h3><?php echo $this->Html->link($categoryRanking["Category"]["str"] . 'ランキング <i class="zmdi zmdi-chevron-right"></i>', array("controller" => "ranking", "action" => "index", "path" => $categoryRanking["Category"]["path"], "ext" => "html"), array("escape" => false))?></h3>
		<div class="thumb">
		<?php echo $this->Common->titleLinkThumb(
			$this->Common->thumbName($categoryRanking["Ranking"][0]["Title"]["thumb_name"]),
			$this->Common->titleWithCase($categoryRanking["Ranking"][0]["Title"]["title_official"], $categoryRanking["Ranking"][0]["Title"]["title_read"]),
			$categoryRanking["Ranking"][0]["Title"]["url_str"], 60)?>
		</div>
		<a href="<?php echo $this->Html->url(array("controller" => "titles", "action" => "index", "path" => $categoryRanking["Ranking"][0]["Title"]["url_str"], "ext" => "html"));?>" class="title">
			<?php echo $this->Common->titleSeparatedSpan($categoryRanking["Ranking"][0]["Title"]["title_official"],
				$categoryRanking["Ranking"][0]["Title"]["title_read"],
				$categoryRanking["Ranking"][0]["Title"]["url_str"])?>
		</a>
	</li>
	<?php endif;?>
<?php endforeach;?>
</ul>