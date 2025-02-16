<?php
//set blocks
$this->assign("title", "オンラインゲーム検索結果：" . $this->Paginator->current() . "ページ目");
$this->assign("keywords", "");
$this->assign("description", "");
//pankuz
$this->set("pankuz_for_layout", array(array("str" => "オンラインゲーム検索", "url" => array("controller" => "search", "action" => "index", "ext" => "html")), "検索結果"));
//json ld
$this->assign("json_ld", $this->JsonLd->breadCrumbList(array(
	array("name" => "オンラインゲーム検索", "id" => $this->Html->url(array("controller" => "search", "action" => "index", "ext" => "html")), true),
	"検索結果",
)));
?>

<!-- Search result -->
<section class="search-result">
	<h1 class="pageTitle">
		<span class="main">オンラインゲーム検索結果</span>
		<span class="sub"><?php echo $this->Paginator->current()?>ページ目</span>
	</h1>

<?php if(empty($titles)):?>
	<div class="noData">検索条件に該当するタイトルが見つかりませんでした。</div>
<?php else:?>
	
	<?php echo $this->element("comp_pages");?>

	<ul class="list">
	<?php foreach($titles as $title):?>
		<li>
			<h2 class="title">
				<?php echo $this->Common->titleLinkText(
					$this->Common->titleSeparatedSpan($title["Title"]["title_official"], $title["Title"]["title_read"]),
					$title["Title"]["url_str"])?>
			</h2>
			<div class="images">
				<div class="thumb"><?php echo $this->Common->titleLinkThumb(
					$this->Common->thumbName($title["Title"]["thumb_name"]),
					$this->Common->titleWithCase($title["Title"]["title_official"], $title["Title"]["title_read"]),
					$title["Title"]["url_str"], 160)?>
				</div>
			</div>
			<div class="data">
				<div class="counts">
					<div class="count count-total">
						<div class="caption">総合評価</div>
						<div class="value">
							<span class="num"><?php echo $this->Common->pointFormat($title["Titlesummary"]["vote_avg_all"], "--")?></span>
							<span class="unit">点</span>
						</div>
					</div>
					<div class="count count-rate">
						<div class="caption">評価投稿</div>
						<div class="value">
							<span class="num"><?php echo $title["Titlesummary"]["vote_count_vote"]?></span>
							<span class="unit">件</span>
						</div>
					</div>
					<div class="count count-review">
						<div class="caption">レビュー</div>
						<div class="value">
							<span class="num"><?php echo $title["Titlesummary"]["vote_count_review"]?></span>
							<span class="unit">件</span>
						</div>
					</div>
					<div class="count count-link">
						<div class="caption">リンク</div>
						<div class="value">
							<span class="num"><?php echo $title["Titlesummary"]["fansite_count"]?></span>
							<span class="unit">件</span>
						</div>
					</div>
				</div>
				<div class="attributes">
					<p class="service">
						<span class="label label-service">サービス</span>
						<?php echo $title["Service"]["str"]?>
	<?php if($title["Service"]["id"] == 3 or $title["Service"]["id"] == 4):?>
						<?php echo $this->Common->termFormat($title["Title"]["test_start"], $title["Title"]["test_end"])?>
	<?php endif;?>
					</p>
					<p class="fee"><span class="label label-fee">料金</span> <?php echo $title["Fee"]["str"]?></p>
					<p class="genres"><span class="label label-genre">ジャンル</span> <?php echo $this->Common->categoriesLink($title["Category"])?></p>
				</div>
			</div>
		</li>
	<?php endforeach;?>
	</ul>
	
	<?php echo $this->element("comp_pages");?>
<?php endif;?>
</section>


<!-- search -->
<section class="search">
	<h1>
		<span class="main">オンラインゲーム検索</span>
		<span class="sub">自分好みのオンラインゲームを探そう</span>
	</h1>
	<div class="form-search">
<?php echo $this->element("search_title_form");?>
	</div>
</section>