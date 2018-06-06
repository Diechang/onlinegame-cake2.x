<?php
//meta
$this->Html->meta("canonical", $this->Html->url(array('controller' => 'review', 'action' => 'index'), true), array("rel" => "canonical", "type" => null, "title" => null, "inline" => false));
//set blocks
$this->assign("title", "オンラインゲームレビュー一覧 " . $this->Paginator->current() . "ページ目");
$this->assign("keywords", "レビュー,評価,オンラインゲーム");
$this->assign("description", "レビュー投稿数" . number_format($this->Paginator->param("count")) . "件！当サイトに投稿されたオンラインゲームレビュー投稿一覧の" . $this->Paginator->param("page") . "/" . $this->Paginator->param("pageCount") . "ページ目です。");
//pankuz
// $this->set("pankuz_for_layout", "レビュー投稿一覧 " . $this->Paginator->current() . "ページ目");
//json ld
// $this->assign("json_ld", $this->JsonLd->breadCrumbList("レビュー投稿一覧"));
?>

<div class="pageInfo">
	<h1 class="pageTitle">
		<span class="main">ユーザーレビュー投稿一覧</span>
		<span class="sub">オンラインゲーム選びの参考にどうぞ</span>
	</h1>
</div>
<?php echo $this->Gads->ads320();?>
<!-- review -->
<section class="review">
	<section class="recents">
		<h2><?php echo $this->Paginator->counter("{:count}件中 / {:start} - {:end}件")?></h2>
		<?php echo $this->element("loop_review_data", array("reviews" => $reviews))?>
		<?php echo $this->element("comp_pages");?>
	</section>
	<?php echo $this->Gads->adsResponsive();?>
<?php if($this->Paginator->current() == 1):?>
	<section class="waits">
		<h2>レビュー・評価投稿募集中</h2>
		<?php echo $this->element("loop_review_waits", array("waits" => $waits))?>
	</section>
<?php endif;?>
</section>
