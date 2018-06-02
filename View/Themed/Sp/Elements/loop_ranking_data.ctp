<?php if(empty($rankings[0])):?>
<p class="noData">ランキングデータがありません</p>
<?php else:?>
<ul class="borderedLinks imageLinks">
	<?php foreach($rankings as $key => $rank):?>
	<?php $rank_num = $key + 1?>
	<!-- <?php echo $rank_num?> -->
	<li>
		<a href="<?php echo $this->Common->titleLinkUrl($rank["Title"]["url_str"])?>">
			<div class="images">
				<div class="num"><?php echo $rank_num ?></div>
				<div class="thumb"><?php echo $this->Common->titleThumb($rank["Title"]);?></div>
			</div>
			<div class="data">
				<div class="title"><?php echo $this->Common->titleSeparatedDiv($rank["Title"]["title_official"], $rank["Title"]["title_read"]);?></div>
				<div class="rate">
					<div class="star">
						<?php echo $this->Common->starZmdi($rank["Titlesummary"]["vote_avg_all"]);?>
					</div>
					<div class="value">
						<span class="num"><?php echo $this->Common->pointFormat($rank["Titlesummary"]["vote_avg_all"])?></span>
						<span class="unit">点</span>
					</div>
				</div>
				<div class="platforms">
					<ul class="platformLabels">
						<?php echo $this->Common->platformsList($rank["Platform"], "li")?>
					</ul>
				</div>
				<div class="genres">
					<ul class="categoryLabels">
						<?php echo $this->Common->categoriesList($rank["Category"], "li")?>
					</ul>
				</div>
			</div>
		</a>
	</li>
	<?php endforeach;?>
</ul>
<?php endif;?>