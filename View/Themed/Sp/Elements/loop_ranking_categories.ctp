<ul class="borderedLinks imageLinks imageLinks-s">
<?php foreach($categoryRankings as $categoryRanking):?>
	<?php if(!empty($categoryRanking["Ranking"])):?>
	<li>
		<a href="<?php echo $this->Html->url(array("controller" => "ranking", "action" => "index", "path" => $categoryRanking["Category"]["path"], "ext" => "html"))?>">
			<div class="images">
				<div class="thumb"><?php echo $this->Common->titleThumb($categoryRanking["Ranking"][0]["Title"], 40)?></div>
			</div>
			<div class="data">
				<div class="title"><?php echo $categoryRanking["Category"]["str"]?>ランキング <i class="zmdi zmdi-chevron-right"></i></div>
			</div>
		</a>
	</li>
	<?php endif;?>
<?php endforeach;?>
</ul>