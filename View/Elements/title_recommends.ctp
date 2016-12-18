<?php if(!empty($recommends)):?>
<!-- recommend -->
<section class="title-recommend">
	<h1>
		<span class="main">このゲームのプレイヤーにおすすめ</span>
		<span class="sub"><?php echo $title["Title"]["title_official"]?>のプレイヤーにはこちらのゲームもおすすめ</span>
	</h1>
	<ul class="list">
	<?php foreach($recommends as $recommend):?>
		<li>
			<h2 class="title">
				<?php echo $this->Common->titleLinkText(
				$this->Common->titleSeparatedSpan($recommend["Title"]["title_official"], $recommend["Title"]["title_read"]),
				$recommend["Title"]["url_str"])?>
			</h2>
			<div class="images">
				<div class="thumb">
					<?php echo $this->Common->titleLinkThumb(
						$this->Common->thumbName($recommend["Title"]["thumb_name"]),
						$this->Common->titleWithCase($recommend["Title"]["title_official"], $recommend["Title"]["title_read"]),
						$recommend["Title"]["url_str"])?>
				</div>
			</div>
			<div class="data">
				<div class="rates">
					<div class="rate">
						<div class="caption">総合評価</div>
						<div class="value">
							<span class="num"><?php echo $this->Common->pointFormat($recommend["Titlesummary"]["vote_avg_all"])?></span>
							<span class="unit">点</span>
						</div>
					</div>
					<div class="rate">
						<div class="caption">面白さ</div>
						<div class="value">
							<span class="num"><?php echo $this->Common->pointFormat($recommend["Titlesummary"]["vote_avg_item1"])?></span>
							<span class="unit">点</span>
						</div>
					</div>
					<div class="rate">
						<div class="caption">レビュー</div>
						<div class="value">
							<span class="num"><?php echo number_format($recommend["Titlesummary"]["vote_count_review"])?></span>
							<span class="unit">件</span>
						</div>
					</div>
					<div class="rate">
						<div class="caption">評価投稿</div>
						<div class="value">
							<span class="num"><?php echo number_format($recommend["Titlesummary"]["vote_count_vote"])?></span>
							<span class="unit">件</span>
						</div>
					</div>
				</div>
			</div>
		</li>
	<?php endforeach;?>
	</ul>
</section>
<?php endif;?>