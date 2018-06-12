<?php if(!empty($titles)):?>
	<ul class="borderedLinks imageLinks">
	<?php foreach($titles as $title):?>
		<li>
			<a href="<?php echo $this->Common->titleLinkUrl($title["Title"]["url_str"])?>">
				<div class="images">
					<div class="thumb"><?php echo $this->Common->titleThumb($title["Title"]);?></div>
					<div class="rate">
						<div class="caption">総合評価</div>
						<div class="value">
							<span class="num"><?php echo $this->Common->pointFormat($title["Titlesummary"]["vote_avg_all"], "--")?></span>
							<span class="unit">点</span>
						</div>
					</div>
				</div>
				<div class="data">
					<div class="title">
						<?php echo $this->Common->titleSeparatedDiv($title["Title"]["title_official"], $title["Title"]["title_read"]);?>
					</div>
					<div class="platforms">
						<ul class="platformLabels">
							<?php echo $this->Common->platformsList($title["Platform"], "li")?>
						</ul>
					</div>
					<dl class="attributes">
						<dt><span class="label label-service">サービス</span></dt>
						<dd>
							<?php echo $title["Service"]["str"]?>
	<?php if($title["Service"]["id"] == 3 or $title["Service"]["id"] == 4):?>
							<?php echo $this->Common->termFormat($title["Title"]["test_start"], $title["Title"]["test_end"])?>
	<?php endif;?>
						</dd>
						<dt><span class="label label-fee">料金</span></dt>
						<dd><?php echo $title["Fee"]["str"]?></dd>
						<dt><span class="label label-genre">ジャンル</span></dt>
						<dd><?php echo $this->Common->categoriesList($title["Category"])?></dd>
					</dl>
				</div>
			</a>
		</li>
	<?php endforeach;?>
	</ul>
<?php else:?>
	<p class="noData">データがありません</p>
<?php endif;?>