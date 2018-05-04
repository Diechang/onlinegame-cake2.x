<ul class="list">
<?php foreach($reviews as $review): ?>
	<li>
		<h2 class="title">
			<a href="<?php echo $this->Html->url(array("controller" => "titles", "action" => "single", "path" => $review["Title"]["url_str"], "voteid" => $review["Vote"]["id"], "ext" => "html"))?>">
				<span class="rate"><?php echo $this->Common->pointFormat($review["Vote"]["single_avg"]);?><span class="unit">点</span></span>
				<?php echo $this->Common->voteTitle($review["Vote"]);?>
			</a>
		</h2>
		<div class="thumb">
			<?php echo $this->Common->titleLinkThumb(
				$this->Common->thumbName($review["Title"]["thumb_name"]),
				$this->Common->titleWithCase($review["Title"]["title_official"], $review["Title"]["title_read"]),
				$review["Title"]["url_str"], 120, "review") ?>
		</div>
		<div class="data">
			<p class="review"><?php echo (!empty($review["Vote"]["review"]))
				? mb_strimwidth(h($review["Vote"]["review"]), 0, 240, " … " . $this->Html->link("続き", array("controller" => "titles", "action" => "single", "path" => $review["Title"]["url_str"], "voteid" => $review["Vote"]["id"], "ext" => "html")))
				: "(評価投稿のみ)" ?></p>
			<div class="date"><?php echo $this->Common->dateFormat($review["Vote"]["created"])?></div>
			<?php echo $this->Common->titleLinkText($review["Title"]["title_official"], $review["Title"]["url_str"], "review")?>
		</div>
	</li>
<?php endforeach; ?>
</ul>