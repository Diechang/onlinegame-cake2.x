<?php
//create title tag
$portal_name = $this->Common->titleWithCase($portal["Portal"]["title_official"], $portal["Portal"]["title_read"]);
//set blocks
$this->assign("title", $portal_name);
$this->assign("keywords", "オンラインゲーム,ポータルサイト," . $portal["Portal"]["title_official"]);
if(!empty($portal["Portal"]["title_read"])) $this->append("keywords", "," . $portal["Portal"]["title_read"]);
$this->assign("description", "オンラインゲームポータル【" . $portal_name . "】についてのページです。");
//pankuz
// $this->set("pankuz_for_layout", array(
// 	array("str" => "オンラインゲームポータル", "url" => array("action" => "index", "ext" => "html")),
// 	$portal_name,
// ));
//json ld
// $this->assign("json_ld", $this->JsonLd->breadCrumbList(array(
// 	array("name" => "オンラインゲームポータル", "id" => $this->Html->url(array("action" => "index", "ext" => "html")), true),
// 	$portal_name,
// )));
?>
<div class="pageInfo">
	<h1 class="pageTitle">
		<?php echo $this->Common->titleSeparatedSpan($portal["Portal"]["title_official"], $portal["Portal"]["title_read"])?>
	</h1>
</div>
<section class="portal-summary">
	<div class="description editorDoc">
		<?php echo $portal["Portal"]["description"]?>
	</div>
	<?php echo $this->element("common_officiallink", array("official_url" => $portal["Portal"]["official_url"],
			"title_official" => $portal["Portal"]["title_official"], 
			"title_read" => $portal["Portal"]["title_read"],
			"ad_use" => $portal["Portal"]["ad_use"],
			"ad_text" => $portal["Portal"]["ad_text"]))?>
	<?php echo $this->element("comp_shares", array("url" => $this->Html->url(array("controller" => "portals", "action" => "view", "path" => $portal["Portal"]["url_str"], "ext" => "html"), true)))?>
	<?php echo $this->Common->copyright($portal["Portal"]["copyright"])?>
</section>
<?php echo $this->Gads->adsResponsive();?>
<!-- titles -->
<section class="archive-titles">
	<h2><?php echo $portal["Portal"]["title_official"]?>で遊べるオンラインゲーム一覧</h2>
	<p class="headline-description clDanger">※各タイトルページから公式サイトへのリンクは<?php echo $portal["Portal"]["title_official"]?>内のコンテンツではない場合がありますのでご注意ください。</p>
	<ul class="borderedLinks imageLinks">
<?php foreach($portal["Title"] as $pTitle):?>
		<li>
			<a href="<?php echo $this->Common->titleLinkUrl($pTitle["url_str"]);?>">
				<div class="images">
					<div class="thumb"><?php echo $this->Common->titleThumb($pTitle);?></div>
					<div class="rate">
						<div class="caption">総合評価</div>
						<div class="value">
							<span class="num"><?php echo $this->Common->pointFormat($pTitle["Titlesummary"]["vote_avg_all"], "-")?></span>
							<span class="unit">点</span>
						</div>
					</div>
				</div>
				<div class="data">
					<div class="title">
						<?php echo $this->Common->titleSeparatedDiv($pTitle["title_official"], $pTitle["title_read"]);?>
					</div>
					<div class="platforms">
						<ul class="platformLabels">
							<?php echo $this->Common->platformsList($pTitle["Platform"], "li")?>
						</ul>
					</div>
					<dl class="attributes">
						<dt><span class="label label-service">サービス</span></dt>
						<dd>
							<?php if($pTitle["Service"]["id"] == 3 or $pTitle["Service"]["id"] == 4):?>
								<?php echo $this->Common->termFormat($pTitle["test_start"], $pTitle["test_end"])?>
							<?php endif;?>
						</dd>
						<dt><span class="label label-fee">料金</span></dt>
						<dd><?php echo $pTitle["Fee"]["str"]?></dd>
						<dt><span class="label label-genre">ジャンル</span></dt>
						<dd><?php echo $this->Common->categoriesList($pTitle["Category"])?></dd>
					</dl>
				</div>
			</a>
		</li>
<?php endforeach;?>
	</ul>
</section>
