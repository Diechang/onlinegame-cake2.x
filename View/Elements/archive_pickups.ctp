<!-- pickups -->
<section class="archive-pickups">
	<h1 class="headline"><span class="label label-primary"><?php echo $mainStr?></span>おすすめタイトル</h1>
	<ul class="list">
<?php foreach($pickups as $pickup):?>
		<li>
			<a href="titles_index.html">
				<div class="thumb">
					<?php echo $this->Html->image($this->Common->thumb_name($pickup["Title"]["thumb_name"]),
						array("alt" => $this->Common->title_separated_case($pickup["Title"]["title_official"], $pickup["Title"]["title_read"])));?>
				</div>
				<?php echo $this->Common->star_block($pickup["Titlesummary"]["vote_avg_all"], "w", 100)?>
				<div class="title"><?php echo $this->Common->titleLinkText($pickup["Title"]["title_official"], $pickup["Title"]["url_str"])?></div>
			</a>
		</li>
<?php endforeach;?>
	</ul>
</section>
