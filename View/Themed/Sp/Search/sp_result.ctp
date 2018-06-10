<?php
//set blocks
$this->assign("title", "オンラインゲーム検索結果：" . $this->Paginator->current() . "ページ目");
$this->assign("keywords", "");
$this->assign("description", "");
//pankuz
// $this->set("pankuz_for_layout", array(array("str" => "オンラインゲーム検索", "url" => array("controller" => "search", "action" => "index", "ext" => "html")), "検索結果"));
//json ld
// $this->assign("json_ld", $this->JsonLd->breadCrumbList(array(
// 	array("name" => "オンラインゲーム検索", "id" => $this->Html->url(array("controller" => "search", "action" => "index", "ext" => "html")), true),
// 	"検索結果",
// )));
?>
<div class="pageInfo">
	<h1 class="pageTitle">
		<span class="main">オンラインゲーム検索結果</span>
		<span class="sub"><?php echo $this->Paginator->current()?>ページ目</span>
	</h1>
</div>

<?php if(empty($titles)):?>
	<div class="noData">検索条件に該当するタイトルが見つかりませんでした。</div>
	<?php echo $this->Gads->ads320();?>
<?php endif;?>

<!-- titles -->
<section class="archive-titles">
	<h2><?php echo $this->Paginator->counter("{:count}件中 / {:start} - {:end}件")?></h2>
	<ul class="borderedLinks imageLinks">
<?php foreach($titles as $title):?>
		<li>
			<a href="<?php echo $this->Common->titleLinkUrl($title["Title"]["url_str"])?>">
				<div class="images">
					<div class="thumb"><?php echo $this->Common->titleThumb($title["Title"])?></div>
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
						<?php echo $this->Common->titleSeparatedDiv($title["Title"]["title_official"], $title["Title"]["title_read"])?>
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
	
	<?php echo $this->element("comp_pages");?>

</section>
<?php echo $this->Gads->adsResponsive();?>
<!-- search -->
<section class="search">
	<h2>検索条件を変更</h2>
	<div class="form-search">
<?php echo $this->element("search_title_form");?>
	</div>
</section>
