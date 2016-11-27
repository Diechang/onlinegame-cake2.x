<?php
//create title tag
$portal_name = $this->Common->title_separated_case($portal["Portal"]["title_official"], $portal["Portal"]["title_read"]);
//set blocks
$this->assign("title", $portal_name);
$this->assign("keywords", "オンラインゲーム,ポータルサイト," . $portal["Portal"]["title_official"]);
if(!empty($portal["Portal"]["title_read"])) $this->append("keywords", "," . $portal["Portal"]["title_read"]);
$this->assign("description", "オンラインゲームポータル【" . $portal_name . "】についてのページです。");
//pankuz
$this->set("pankuz_for_layout", array(
	array("str" => "オンラインゲームポータル", "url" => array("action" => "index", "ext" => "html")),
	$portal_name,
));
?>
<!-- about -->
<div class="portal-about pageInfo">
	<h1 class="pageTitle">
		<?php echo $this->Common->title_separated_span($portal["Portal"]["title_official"], $portal["Portal"]["title_read"])?>
	</h1>
	<div class="portal-summary">
		<div class="capture"><img src="http://capture.heartrails.com/200x200?<?php echo $portal["Portal"]["official_url"]?>" alt="<?php echo $portal["Portal"]["title_official"]?>" width="200"></div>
		<div class="description">
			<?php echo $portal["Portal"]["description"]?>
		</div>

		<?php echo $this->element("common_officiallink", array("link" => $this->Common->official_link_text(
							$this->Common->title_separated_span($portal["Portal"]["title_official"], $portal["Portal"]["title_read"]),
							$portal["Portal"]["ad_use"], $portal["Portal"]["ad_text"], $portal["Portal"]["official_url"])))?>

		<?php echo $this->Gads->ads468()?>
	</div>

	<?php echo $this->element("comp_shares", array("url" => $this->Html->url(array("controller" => "portals", "action" => "view", "path" => $portal["Portal"]["url_str"], "ext" => "html"), true)))?>

	<?php echo $this->Common->copyright($portal["Portal"]["copyright"])?>
</div>

<!-- sites -->
<section class="archive-titles">
	<h1 class="headline"><?php echo $portal["Portal"]["title_official"]?>で遊べるタイトル一覧</h1>
	<p class="headline-description clDanger">※各タイトルページから公式サイトへのリンクは<?php echo $portal["Portal"]["title_official"]?>内のコンテンツではない場合がありますのでご注意ください。</p>
	<ul class="list">
<?php foreach($portal["Title"] as $pTitle):?>
		<li>
			<h2 class="title">
				<?php echo $this->Common->title_link_text(
					$this->Common->title_separated_span($pTitle["title_official"], $pTitle["title_read"]),
					$pTitle["url_str"]);?>
			</h2>
			<div class="summary">
				<div class="images">
					<div class="thumb">
						<?php echo $this->Common->title_link_thumb(
							$this->Common->thumb_name($pTitle["thumb_name"]),
							$this->Common->title_separated_case($pTitle["title_official"], $pTitle["title_read"]),
							$pTitle["url_str"])?>
					</div>
				</div>
				<div class="description">
					<p><?php echo strip_tags($pTitle["description"])?></p>
				</div>
			</div>
			<div class="data">
				<div class="rates">
					<div class="rate">
						<div class="caption">総合評価</div>
						<div class="value">
							<span class="num"><?php echo $this->Common->point_format($pTitle["Titlesummary"]["vote_avg_all"], "-")?></span>
							<span class="unit">点</span>
						</div>
					</div>
				</div>
				<div class="attributes">
					<p class="service"><span class="label label-service">サービス</span> <?php echo $pTitle["Service"]["str"]?></p>
					<p class="fee"><span class="label label-fee">料金</span> <?php echo $pTitle["Fee"]["str"]?></p>
					<p class="genres"><span class="label label-genre">ジャンル</span> <?php echo $this->Common->categories_link($pTitle["Category"])?></p>
				</div>
			</div>
		</li>
<?php endforeach;?>
	</ul>
</section>

<!-- sites -->
<section class="portal-sites">
	<h1>その他オンラインゲームポータルサイト一覧</h1>
	<ul class="list">
<?php foreach($portals as $portal):?>
		<li>
			<h2 class="title">
				<a href="<?php echo $this->Html->url(array("controller" => "portals", "action" => "view", "path" => $portal["Portal"]["url_str"], "ext" => "html"))?>">
					<?php echo $this->Common->title_separated_span($portal["Portal"]["title_official"], $portal["Portal"]["title_read"])?>
				</a>
			</h2>
			<div class="images">
				<div class="thumb">
					<a href="<?php echo $this->Html->url(array("controller" => "portals", "action" => "view", "path" => $portal["Portal"]["url_str"], "ext" => "html"))?>">
						<img src="http://capture.heartrails.com/160x120?<?php echo $portal["Portal"]["official_url"]?>" alt="<?php echo $this->Common->title_separated_case($portal["Portal"]["title_official"], $portal["Portal"]["title_read"])?>">
					</a>
				</div>
			</div>
			<div class="data">
				<p class="description"><?php echo strip_tags($portal["Portal"]["description"])?></p>
				<p class="official"><span class="label label-official">公式サイト</span> <?php echo $this->Common->official_link_text($portal["Portal"]["title_official"], $portal["Portal"]["ad_use"], $portal["Portal"]["ad_text"], $portal["Portal"]["official_url"])?></p>
			</div>
		</li>
<?php endforeach;?>
	</ul>
</section>