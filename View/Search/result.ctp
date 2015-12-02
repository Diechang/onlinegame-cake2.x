<?php
//スタイル
$this->Html->css(array('search'), 'stylesheet', array('inline' => false));
//
$this->set("title_for_layout" , "オンラインゲーム検索結果：" . $this->Paginator->current() . "ページ目");
$this->set("keywords_for_layout" , "");
$this->set("description_for_layout" , "");
$this->set("h1_for_layout" , "オンラインゲーム検索結果：" . $this->Paginator->current() . "ページ目");
$this->set("pankuz_for_layout" , array(array("str" => "オンラインゲーム検索" , "url" => array("controller" => "search" , "action" => "index")) , "検索結果"));
?>

<!-- Search result -->
<div class="content searchResult">
	<h2>検索結果：<?php echo $this->Paginator->current()?>ページ目</h2>
<?php if(empty($titles)):?>
	<p class="noResult">検索条件に該当するタイトルが見つかりませんでした。</p>
<?php else:?>
	<p><?php echo $this->Paginator->counter(array("format" => '検索結果<span class="wBold">{:count}件中</span> {:start}件目 ～ {:end}件表示'))?></p>

	<p class="paging">
		<?php echo $this->Paginator->prev("≪前へ")?>
		<?php echo $this->Paginator->numbers()?>
		<?php echo $this->Paginator->next("次へ≫")?>
	</p>

	<table class="result">
	<?php foreach($titles as $title):?>
		<tr>
			<th colspan="7">
				<?php echo $this->Common->titleLinkText(
					$this->Common->titleWithSpan($title["Title"]["title_official"] , $title["Title"]["title_read"]),
					$title["Title"]["url_str"])?>
				</th>
		</tr>
		<tr>
			<td rowspan="2" class="thumb">
				<?php echo $this->Common->titleLinkThumb(
					$this->Common->thumbName($title["Title"]["thumb_name"]),
					$this->Common->titleWithCase($title["Title"]["title_official"] , $title["Title"]["title_read"]),
					$title["Title"]["url_str"] , 120)?>
			</td>
			<th class="rating">評価</th>
			<td class="<?php echo $this->Common->addClassZero($title["Titlesummary"]["vote_avg_all"] , "rating")?>">
				<?php echo $this->Common->titleLinkText($this->Common->pointFormat($title["Titlesummary"]["vote_avg_all"] , "--") . "点" , $title["Title"]["url_str"] , "rating")?>
			</td>
			<th class="review">レビュー</th>
			<td class="<?php echo $this->Common->addClassZero($title["Titlesummary"]["vote_count_review"] , "review")?>">
				<?php echo $this->Common->titleLinkText($title["Titlesummary"]["vote_count_review"] . "件" , $title["Title"]["url_str"] , "review")?>
			</td>
			<th class="link">リンク</th>
			<td class="<?php echo $this->Common->addClassZero($title["Titlesummary"]["fansite_count"] , "link")?>">
				<?php echo $this->Common->titleLinkText($title["Titlesummary"]["fansite_count"] . "件" , $title["Title"]["url_str"] , "link")?>
			</td>
		</tr>
		<tr>
			<td colspan="6" class="description"><?php echo mb_strimwidth(strip_tags($title["Title"]["description"]), 0, 160, " …", "UTF-8")?></td>
		</tr>
	<?php endforeach;?>
	</table>

	<p class="paging">
		<?php echo $this->Paginator->prev("≪前へ")?>
		<?php echo $this->Paginator->numbers()?>
		<?php echo $this->Paginator->next("次へ≫")?>
	</p>

<?php endif;?>
</div>


<?php echo $this->element("search_title_form")?>