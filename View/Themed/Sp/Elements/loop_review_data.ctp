<ul class="borderedLinks textLinks imageLinks">
<?php foreach($reviews as $review): ?>
	<li>
		<a href="<?php echo $this->Html->url(array("controller" => "titles", "action" => "single", "path" => $review["Title"]["url_str"], "voteid" => $review["Vote"]["id"], "ext" => "html"))?>">
			<div class="images">
				<div class="thumb"><?php echo $this->Common->titleThumb($review["Title"])?></div>
				<div class="rate"><?php echo $this->Common->pointFormat($review["Vote"]["single_avg"]);?><span class="unit">点</span></div>
			</div>
			<div class="data">
				<div class="main"><?php echo $this->Common->voteTitle($review["Vote"]);?></div>
				<p class="review"><?php echo (!empty($review["Vote"]["review"]))
				? mb_strimwidth(h($review["Vote"]["review"]), 0, 120, ' … <span class="continue">続き</span>')
				: "(評価投稿のみ)" ?></p>
				<div class="date"><?php echo $this->Common->dateFormat($review["Vote"]["created"])?></div>
				<div class="official"><?php echo $review["Title"]["title_official"]?></div>
			</div>
		</a>
	</li>
<?php endforeach; ?>
</ul>