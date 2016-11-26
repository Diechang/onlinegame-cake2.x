<!-- summary -->
<section class="title-summary">
	<section class="data">
		<div class="data-counts">
			<div class="rate">
				<div class="value">総合評価<span class="num"><?php echo $this->Common->point_format($title["Titlesummary"]["vote_avg_all"], " -- ")?></span>点</div>
				<?php echo $this->Common->star_block($title["Titlesummary"]["vote_avg_all"])?>
			</div>
			<div class="count count-review">
				<div class="caption">レビュー</div>
				<div class="value"><span class="num"><?php echo number_format($title["Titlesummary"]["vote_count_review"])?></span>件</div>
			</div>
			<div class="count count-vote">
				<div class="caption">評価投稿</div>
				<div class="value"><span class="num"><?php echo number_format($title["Titlesummary"]["vote_count_vote"])?></span>件</div>
			</div>
		</div>
		<div class="data-properties">
			<table>
				<tr>
					<th>料金</th>
					<td><?php echo $this->Common->fee_data($title["Title"]["fee_text"], $title["Title"]["fee_id"], $title["Fee"]["str"], $title["Title"]["service_id"], $title["Service"]["str"])?></td>
				</tr>
				<tr>
					<th>ジャンル</th>
					<td>
						<?php echo $this->Common->categories_link($title["Category"])?>
					</td>
				</tr>
				<tr>
					<th>スタイル</th>
					<td>
						<?php echo $this->Common->styles_link($title["Style"])?>
					</td>
				</tr>
				<tr>
					<th><?php echo $title["Service"]["str"]?></th>
					<td>
<?php if($title["Service"]["id"] == 2):?>
						<?php echo $this->Common->date_format($title["Title"]["service_start"], "date")?>
<?php elseif($title["Service"]["id"] == 3 or $title["Service"]["id"] == 4):?>
						<?php echo $this->Common->term_format($title["Title"]["test_start"], $title["Title"]["test_end"])?>
<?php else:?>
<?php endif;?>
					</td>
				</tr>
			</table>

<?php if(isset($title["Title"]["votable"]) && $title["Title"]["votable"]):?>
			<div class="actions">
				<div class="vote"><?php echo $this->Html->link("レビュー・評価を投稿", array("action" => "review", "path" => $title["Title"]["url_str"], "ext" => "html", "#" => "form"), array("class" => "button button-accent button-block"))?></div>
				<div class="link"><?php echo $this->Html->link("攻略・ファンサイトを登録", array("controller" => "fansites", "action" => "add", $title["Title"]["id"]), array("class" => "button button-info button-block"))?></div>
			</div>
<?php endif;?>
		</div>
	</section>

<?php if(!empty($intro)):?>
	<section class="intro">
		<div class="intro-body">
			<h2>ゲーム紹介</h2>
			<div class="image"><?php echo $this->Html->image($this->Common->thumb_name($title["Title"]["thumb_name"]),
				array("width" => 160, "alt" => $titleWithStr["Case"]))?></div>
			<div class="body">
				<?php echo $title["Title"]["description"]?>
			</div>
		</div>
	</section>
<?php endif;?>
	
	<?php echo $this->element("title_officiallink", array("link" => $this->Common->official_link_text(
		$titleWithStr["Span"],
		$title["Title"]["ad_use"], $title["Title"]["ad_text"], $title["Title"]["official_url"], $title["Title"]["service_id"], true)))?>

	<?php echo $this->element("comp_shares", array("url" => $this->Html->url(array("controller" => "titles", "action" => "index", "path" => $title["Title"]["url_str"], "ext" => "html"), true)))?>
	<?php echo $this->Common->copyright($title["Title"]["copyright"])?>
</section>
