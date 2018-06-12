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
	
	<?php echo $this->element('loop_general_data', array("titles" => $titles))?>
	
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
