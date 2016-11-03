<?php if(!empty($rankings[0])):?>
<ul class="list">
<?php foreach($rankings as $key => $rank):?>
<?php if(is_numeric($key)):?>
<?php $rankNum = $key + 1?>
	<!-- <?php echo $rankNum?> -->
	<li class="no<?php echo $rankNum;?>">

		<h2 class="title">
			<a href="<?php echo $this->Html->url(array("controller" => "titles", "action" => "index", "path" => $rank["Title"]["url_str"], "ext" => "html"));?>">
				<span class="num"><?php echo $rankNum;?></span>
				<?php echo $this->Common->title_separated_span($rank["Title"]["title_official"], $rank["Title"]["title_read"], $rank["Title"]["url_str"]);?>
			</a>
		</h2>
		<div class="images">
			<div class="thumb">
				<?php echo $this->Common->titleLinkThumb(
					$this->Common->thumbName($rank["Title"]["thumb_name"]),
					$this->Common->titleWithCase($rank["Title"]["title_official"], $rank["Title"]["title_read"]),
					$rank["Title"]["url_str"], ($rankNum == 1) ? 160 : 120)?>
			</div>
<?php if($rankNum == 1):?>
			<?php echo $this->Common->star_block($rank["Titlesummary"]["vote_avg_all"]);?>
<?php endif;?>
		</div>

		<div class="data">
<?php if($rankNum == 1):?>
			<div class="description"><?php echo $rank["Title"]["description"]?></div>
<?php endif;?>
			<div class="rates">
				<div class="rate">
					<div class="caption">総合評価</div>
					<div class="value">
						<span class="num"><?php echo $this->Common->point_format($rank["Titlesummary"]["vote_avg_all"])?></span>
						<span class="unit">点</span>
					</div>
				</div>
				<div class="rate">
					<div class="caption">面白さ</div>
					<div class="value">
						<span class="num"><?php echo $this->Common->point_format($rank["Titlesummary"]["vote_avg_item1"])?></span>
						<span class="unit">点</span>
					</div>
				</div>
				<div class="rate">
					<div class="caption">レビュー</div>
					<div class="value">
						<span class="num"><?php echo $rank["Titlesummary"]["vote_count_review"];?></span>
						<span class="unit">件</span>
					</div>
				</div>
				<div class="rate">
					<div class="caption">評価投稿</div>
					<div class="value">
						<span class="num"><?php echo $rank["Titlesummary"]["vote_count_vote"];?></span>
						<span class="unit">件</span>
					</div>
				</div>
			</div>

			<div class="official">
				<span class="label label-official">公式サイト</span>
				<?php echo $this->Common->official_link_text($rank["Title"]["title_official"], $rank["Title"]["ad_use"], $rank["Title"]["ad_text"], $rank["Title"]["official_url"], $rank["Title"]["service_id"])?>
			</div>
		</div>
	</li>
<?php endif;?>
<?php endforeach;?>
</ul>
<?php else:?>
	<p class="noData">ランキングデータがありません</p>
<?php endif;?>