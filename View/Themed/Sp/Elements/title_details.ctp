<!-- summary -->
<section class="title-summary">
	
<?php if(empty($intro)):?>
	<h2 class="title"><?php echo $titleWithStrs["Span"]?></h2>
<?php else:?>
	<h2>ゲームデータ</h2>
<?php endif;?>
	<section class="data">
		<div class="data-counts">
			<div class="rate">
				<div class="value">総合評価<span class="num"><?php echo $this->Common->pointFormat($title["Titlesummary"]["vote_avg_all"], " -- ")?></span>点</div>
				<?php echo $this->Common->starZmdi($title["Titlesummary"]["vote_avg_all"])?>
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
					<td><?php echo $this->Common->feeData($title["Title"]["fee_text"], $title["Title"]["fee_id"], $title["Fee"]["str"], $title["Title"]["service_id"], $title["Service"]["str"])?></td>
				</tr>
				<tr>
					<th>ジャンル</th>
					<td>
						<?php echo $this->Common->categoriesLink($title["Category"])?>
					</td>
				</tr>
				<tr>
					<th>スタイル</th>
					<td>
						<?php echo $this->Common->stylesLink($title["Style"])?>
					</td>
				</tr>
<?php if($title["Service"]["id"] == 2 || $title["Service"]["id"] == 3 || $title["Service"]["id"] == 4):?>
				<tr>
					<th><?php echo $title["Service"]["str"]?></th>
					<td>
	<?php if($title["Service"]["id"] == 2):?>
						<?php echo $this->Common->dateFormat($title["Title"]["service_start"], "date")?>
	<?php elseif($title["Service"]["id"] == 3 or $title["Service"]["id"] == 4):?>
						<?php echo $this->Common->termFormat($title["Title"]["test_start"], $title["Title"]["test_end"])?>
	<?php else:?>
	<?php endif;?>
					</td>
				</tr>
<?php endif;?>
<?php if($title["Service"]["id"] != 1):?>
				<!-- 公式サイト -->
				<tr>
					<th>公式サイト</th>
					<td>
						<?php echo $this->Common->titleJumpLink(!empty($title["Title"]["official_url_sp"]) ? $title["Title"]["official_url_sp"] : $title["Title"]["official_url"],
							$title["Title"], $title["Titlead"], "sp"
						)?>
					</td>
				</tr>
<?php endif;?>
<?php if(!empty($intro) && (!empty($title["Title"]["appdl_app_store"]) || !empty($title["Title"]["appdl_google_play"]))):?>
				<!-- アプリダウンロード -->
				<tr>
					<td colspan="2" class="taRight">
						<?php if(!empty($title["Title"]["appdl_app_store"])) echo $this->Common->titleJumpLinkImage(
							$this->Html->image("appbadge_app_store.png", array("width" => 135, "height" => 40, "alt" => "App Storeからダウンロード")),
							$title["Title"], $title["Titlead"], "ios"
						);?>
						<?php if(!empty($title["Title"]["appdl_google_play"])) echo $this->Common->titleJumpLinkImage(
							$this->Html->image("appbadge_google_play.png", array("width" => 135, "height" => 40, "alt" => "Google Playで手に入れよう")),
							$title["Title"], $title["Titlead"], "android"
						);?>
					</td>
				</tr>
<?php endif;?>
			</table>

<?php if(isset($title["Title"]["votable"]) && $title["Title"]["votable"]):?>
			<div class="actions">
				<div class="vote"><?php echo $this->Html->link("レビュー・評価投稿", array("action" => "review", "path" => $title["Title"]["url_str"], "ext" => "html", "#" => "form"), array("class" => "button button-s button-accent button-block"))?></div>
				<div class="link"><?php echo $this->Html->link("攻略リンク登録", array("controller" => "fansites", "action" => "add", $title["Title"]["id"]), array("class" => "button button-s button-info button-block"))?></div>
			</div>
<?php endif;?>
		</div>
	</section>


<?php if(!empty($intro)):?>
	<section class="intro">
		<h2>ゲーム紹介</h2>
		<div class="intro-body">
			<div class="image"><?php echo $this->Html->image($this->Common->thumbName($title["Title"]["thumb_name"]),
				array("width" => 160, "alt" => $titleWithStrs["Case"]))?></div>
			<div class="body editorDoc">
				<?php echo $title["Title"]["description"]?>
			</div>
		</div>
	</section>
<?php endif;?>
	
	<section class="bottom">
<?if(!isset($share) or $share != false):?>
		<!--Official Link-->
		<?php echo $this->element("title_officiallink", array("title" => $title, "titleWithStrs" => $titleWithStrs))?>
		<?php echo $this->element("comp_shares", array("url" => $this->Html->url(array("controller" => "titles", "action" => "index", "path" => $title["Title"]["url_str"], "ext" => "html"), true)))?>
<?php endif;?>
		<?php echo $this->Common->copyright($title["Title"]["copyright"])?>
	</section>
</section>
