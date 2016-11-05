<?php
//meta
$this->Html->meta("canonical", $this->Html->url(array('controller' => 'review', 'action' => 'index'), true), array("rel" => "canonical", "type" => null, "title" => null, "inline" => false));
//スタイル
//
$this->set("title_for_layout", "オンラインゲームレビュー一覧 " . $this->Paginator->current() . "ページ目");
$this->set("keywords_for_layout", "レビュー,評価,オンラインゲーム");
$this->set("description_for_layout", "当サイトに投稿されたオンラインゲームレビュー投稿一覧の" . $this->Paginator->current() . "ページ目です。");
$this->set("h1_for_layout", "オンラインゲームレビュー一覧" . $this->Paginator->current() . "ページ目");
$this->set("pankuz_for_layout", "レビュー投稿一覧 " . $this->Paginator->current() . "ページ目");
//paginator routing
// $this->Paginator->options(array("url" => array("controller" => "review", "action" => "index")))
?>

<!-- review -->
<section class="review">
	<h1 class="pageTitle">
		<span class="main">ユーザーレビュー投稿一覧</span>
		<span class="sub">オンラインゲーム選びの参考にどうぞ</span>
	</h1>

	<section class="recents">

<?php echo $this->element("comp_pages");?>

<?php echo $this->element("loop_review_data", array("reviews" => $reviews))?>

<?php echo $this->element("comp_pages");?>

		<div class="more"><a href="http://feeds.feedburner.com/dz-game/review" class="feed"><i class="icon icon-feed"></i> 新着レビューをRSSで！</a></div>

	</section>

<?php if($this->Paginator->current() == 1):?>
	<section class="waits">
		<h2 class="headline">
			<span class="main">レビュー・評価投稿募集中！</span>
			<span class="sub">まだ投稿がされていないオンラインゲームの一部です</span>
		</h2>

		<?php echo $this->element("loop_review_waits", array("waits" => $waits))?>
	</section>
<?php endif;?>

<div class="gAds"><?php echo $this->Gads->ads468()?></div>

</section>
