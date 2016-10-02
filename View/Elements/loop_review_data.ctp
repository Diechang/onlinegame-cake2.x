<ul class="list">
<?php foreach($reviews as $review): ?>
	<li>
		<h2 class="title">
			<a href="<?php echo $this->Html->url(array("controller" => "titles", "action" => "single", "path" => $review["Title"]["url_str"], "voteid" => $review["Vote"]["id"], "ext" => "html"))?>">
				<span class="rate"><?php echo $this->Common->point_format($review["Vote"]["single_avg"]);?><span class="unit">点</span></span>
				<?php echo $this->Common->vote_title($review["Vote"]);?>
			</a>
		</h2>
		<div class="thumb">
			<?php echo $this->Common->title_link_thumb(
				$this->Common->thumb_name($review["Title"]["thumb_name"]),
				$this->Common->title_separated_case($review["Title"]["title_official"], $review["Title"]["title_read"]),
				$review["Title"]["url_str"], 120, "review") ?>
		</div>
		<div class="data">
			<p class="review"><?php echo (!empty($review["Vote"]["review"]))
				? mb_strimwidth(h($review["Vote"]["review"]), 0, 240, " … " . $this->Html->link("続き", array("controller" => "titles", "action" => "single", "path" => $review["Title"]["url_str"], "voteid" => $review["Vote"]["id"], "ext" => "html")))
				: "(評価投稿のみ)" ?></p>
			<div class="date"><?php echo $this->Common->date_format($review["Vote"]["created"])?></div>
			<?php echo $this->Common->title_link_text($review["Title"]["title_official"], $review["Title"]["url_str"], "review")?>
		</div>
	</li>
<?php endforeach; ?>
</ul>