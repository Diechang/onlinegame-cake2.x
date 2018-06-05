<?php
//set blocks
$this->assign("title", "【オンラインゲームライフ】-無料オンラインゲームの人気ランキング・レビュー");
$this->assign("keywords", "オンラインゲーム,無料,オンライン,ゲーム,人気,ランキング,レビュー");
$this->assign("description", "掲載ゲーム数" . $countTitle . "件の無料オンラインゲーム情報サイト。ユーザーから投稿された" . $countReview . "件のレビューと、" . $countVote . "件の評価を元にした人気オンラインゲームランキングや、全" . $countFansite . "件の攻略サイトリンク集。");
?>
<!-- index slider -->
<div class="newGames">
	<h2>New Games</h2>
	<div class="slide">
<?php foreach($newGames as $newGame):?>
		<div class="slide-item">
			<a href="<?php echo $this->Common->titleLinkUrl($newGame["Title"]["url_str"]);?>">
				<div class="images">
					<div class="thumb"><?php echo $this->Common->titleThumb($newGame["Title"]);?></div>
					<?php echo $this->Common->starZmdi($newGame["Titlesummary"]["vote_avg_all"]);?>
				</div>
				<div class="texts">
					<div class="title"><?php echo $this->Common->titleSeparatedSpan($newGame["Title"]["title_official"], $newGame["Title"]["title_read"]);?></div>
					<p class="description"><?php echo strip_tags($newGame["Title"]["description"]);?></p>
				</div>
			</a>
		</div>
<?php endforeach;?>
	</div>
</div>
<!-- ranking -->
<section class="ranking">
	<h2>人気オンラインゲームランキング</h2>
	<section class="all">
		<?php echo $this->element("loop_ranking_data", array("rankings" => $rankings))?>
	</section>
	<section class="genres">
		<h3>ジャンル別ランキング</h3>
		<?php echo $this->element("loop_ranking_categories", array("categoryRankings" => $categoryRankings))?>
	</section>
	<div class="more">
		<a href="<?php echo $this->Html->url(array("controller" => "ranking", "action" => "index", "path" => "index", "ext" => "html"))?>">人気オンラインゲームランキング一覧 <i class="zmdi zmdi-chevron-right"></i></a>
	</div>
</section>
<!-- review -->
<section class="review">
	<h2>新着ユーザーレビュー</h2>
	<section class="recents">
		<?php echo $this->element("loop_review_data", array("reviews" => $recents))?>
	</section>
	<section class="waits">
		<h3>レビュー・評価投稿募集中</h3>
		<?php echo $this->element("loop_review_waits", array("waits" => $waits))?>
		<div class="more"><a href="<?php echo $this->Html->url(array("controller" => "review", "action" => "index", "ext" => "html"))?>">ユーザーレビュー一覧 <i class="zmdi zmdi-chevron-right"></i></a></div>
	</section>
</section>
<!-- test -->
<section class="test">
	<h2>無料テスト実施中タイトル</h2>
	<section class="current">
<?php if(empty($testCurrents)):?>
		<p class="none">現在実施中のテスト情報がありません</p>
<?php else:?>
		<ul class="borderedLinks imageLinks imageLinks-s">
	<?php foreach($testCurrents as $test):?>
			<li>
				<a href="<?php echo $this->Common->titleLinkUrl($test["Title"]["url_str"]);?>">
					<div class="images">
						<div class="thumb"><?php echo $this->Common->titleThumb($test["Title"], 40);?></div>
					</div>
					<div class="data">
						<div class="title">
							<?php echo $this->Common->titleSeparatedDiv($test["Title"]["title_official"], $test["Title"]["title_read"]);?>
						</div>
						<?php echo $this->Common->testLabel($test["Service"]["id"]);?>
						<span class="date"><?php echo $this->Common->dateFormat($test["Title"]["test_start"], "date")?> 〜 <?php echo $this->Common->dateFormat($test["Title"]["test_end"], "date")?></span>
					</div>
				</a>
			</li>
	<?php endforeach;?>
		</ul>
<?php endif;?>
	</section>
	<section class="future">
		<h3>もうすぐ実施予定</h3>
<?php if(empty($testFutures)):?>
		<p class="none">実施予定のテスト情報がありません</dt>
<?php else:?>
		<ul class="borderedLinks imageLinks imageLinks-s">
	<?php foreach($testFutures as $test):?>
			<li>
				<a href="<?php echo $this->Common->titleLinkUrl($test["Title"]["url_str"]);?>">
					<div class="images">
						<div class="thumb"><?php echo $this->Common->titleThumb($test["Title"], 40);?></div>
					</div>
					<div class="data">
						<div class="title">
							<?php echo $this->Common->titleSeparatedDiv($test["Title"]["title_official"], $test["Title"]["title_read"]);?>
						</div>
						<?php echo $this->Common->testLabel($test["Service"]["id"]);?>
						<span class="date"><?php echo $this->Common->dateFormat($test["Title"]["test_start"], "date")?> 〜 <?php echo $this->Common->dateFormat($test["Title"]["test_end"], "date")?></span>
					</div>
				</a>
			</li>
<?php endforeach;?>
		</ul>
<?php endif;?>
	</section>
</section>

<?php echo $this->Gads->adsResponsive();?>

<!-- news -->
<section class="news">
	<section class="title">
		<h2>新着オンラインゲーム</h2>
		<ul class="borderedLinks textLinks imageLinks imageLinks-s">
<?php foreach($newers as $newer):?>
			<li>
				<a href="<?php echo $this->Common->titleLinkUrl($newer["Title"]["url_str"]);?>">
					<div class="images">
						<div class="thumb"><?php echo $this->Common->titleThumb($newer["Title"]);?></div>
					</div>
					<div class="data">
						<?php echo $this->Common->titleSeparatedDiv($newer["Title"]["title_official"], $newer["Title"]["title_read"]);?>
					</div>
				</a>
			</li>
<?php endforeach;?>
		</ul>
	</section>
	<section class="fansite">
		<h2>新着ファンサイト</h2>
		<ul class="borderedLinks textLinks">
<?php foreach($fansites as $fansite):?>
			<li>
				<a href="<?php echo $fansite["Fansite"]["site_url"]?>" target="_blank">
					<div class="main"><?php echo $fansite["Fansite"]["site_name"]?></div>
					<div class="sub"><?php echo $fansite["Title"]["title_official"]?></div>
				</a>
			</li>
<?php endforeach;?>
		</ul>
	</section>
</section>