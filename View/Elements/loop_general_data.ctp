	<ul class="list">
<?php foreach($titles as $title):?>
		<li>
			<h2 class="title">
				<?php echo $this->Common->title_link_text(
					$this->Common->title_separated_span($title["Title"]["title_official"], $title["Title"]["title_read"]),
					$title["Title"]["url_str"]);?>
			</h2>
			<div class="summary">
				<div class="images">
					<div class="thumb">
						<?php echo $this->Common->title_link_thumb(
							$this->Common->thumb_name($title["Title"]["thumb_name"]),
							$this->Common->title_separated_case($title["Title"]["title_official"], $title["Title"]["title_read"]),
							$title["Title"]["url_str"])?>
					</div>
				</div>
				<div class="description">
					<p><?php echo strip_tags($title["Title"]["description"])?></p>
				</div>
			</div>
			<div class="data">
				<div class="rates">
					<div class="rate">
						<div class="caption">総合評価</div>
						<div class="value">
							<span class="num"><?php echo $this->Common->point_format($title["Titlesummary"]["vote_avg_all"], "-")?></span>
							<span class="unit">点</span>
						</div>
					</div>
				</div>
				<div class="attributes">
					<p class="service"><span class="label label-service">サービス</span> <?php echo $title["Service"]["str"]?></p>
					<p class="fee"><span class="label label-fee">料金</span> <?php echo $title["Fee"]["str"]?></p>
					<p class="genres"><span class="label label-genre">ジャンル</span> <?php echo $this->Common->categories_link($title["Category"])?></p>
				</div>
			</div>
		</li>
<?php endforeach;?>
	</ul>