<!-- pickups -->
<section class="archive-pickups">
	<h1 class="headline"><span class="label label-primary"><?php echo $mainStr?></span>おすすめタイトル</h1>
	<ul class="list">
<?php foreach($pickups as $pickup):?>
		<li>
			<a href="titles_index.html">
				<div class="thumb">
					<?php echo $this->Html->image($this->Common->thumbName($pickup["Title"]["thumb_name"]),
						array("alt" => $this->Common->titleWithCase($pickup["Title"]["title_official"], $pickup["Title"]["title_read"])));?>
				</div>
				<?php echo $this->Common->starBlock($pickup["Titlesummary"]["vote_avg_all"], "w", 100)?>
				<div class="title"><?php echo $this->Common->titleLinkText($pickup["Title"]["title_official"], $pickup["Title"]["url_str"])?></div>
			</a>
		</li>
<?php endforeach;?>
	</ul>
</section>
