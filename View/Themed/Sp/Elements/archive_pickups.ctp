<!-- pickups -->
<section class="archive-pickups">
	<h2><span class="label label-primary"><?php echo $mainStr?></span>おすすめタイトル</h2>
	<div class="slide slide-s">
<?php foreach($pickups as $pickup):?>
		<div class="slide-item">
			<a href="<?php echo $this->Common->titleLinkUrl($pickup["Title"]["url_str"])?>">
				<div class="images">
					<div class="thumb"><?php echo $this->Common->titleThumb($pickup["Title"]);?></div>
				</div>
				<div class="texts">
					<div class="title">
						<?php echo $this->Common->titleSeparatedSpan($pickup["Title"]["title_official"], $pickup["Title"]["title_read"]);?>
					</div>
					<?php echo $this->Common->starZmdi($pickup["Titlesummary"]["vote_avg_all"]);?>
				</div>
			</a>
		</div>
<?php endforeach;?>
	</ul>
</section>
