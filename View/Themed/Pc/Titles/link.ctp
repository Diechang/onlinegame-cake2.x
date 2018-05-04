<?php
//Title vars
$titleWithStrs = $this->Common->titleWithStrs($title["Title"]["title_official"], $title["Title"]["title_read"], $title["Title"]["title_abbr"], $title["Title"]["title_sub"]);
//set blocks
$this->assign("title", "攻略・ファンサイトリンク集 | " . $titleWithStrs["Abbr"]);
$this->assign("keywords", $this->TitlePage->metaKeywords($this->request->params["action"], $title["Title"]["title_official"], $title["Title"]["title_read"], $title["Title"]["title_abbr"], $title["Title"]["title_sub"]));
$this->assign("description", $titleWithStrs["Sub"] . "の攻略・ファンサイトリンク集です。"
							. (!empty($title["Titlesummary"]["fansite_count"]) ? $title["Titlesummary"]["fansite_count"] . "件のサイトが登録されています。" : ""));
//assigns
$this->assign("title_header", $this->element("title_header"));
$this->assign("title_nav_floating", $this->element("title_nav_floating", array("title" => $title)));
//pankuz
$this->set("pankuz_for_layout", array(array("str" => $titleWithStrs["Case"], "url" => array("action" => "index", "path" => $title["Title"]["url_str"], "ext" => "html")), "攻略・ファンサイト"));
//json ld
$this->assign("json_ld", $this->JsonLd->breadCrumbList(array(
	array("name" => $titleWithStrs["Case"], "id" => $this->Html->url(array("action" => "index", "path" => $title["Title"]["url_str"], "ext" => "html")), true),
	"攻略・ファンサイト",
)));
$this->append("json_ld", $this->JsonLd->titleRating($title, $titleWithStrs["Case"]));
//OGP
$this->element("title_ogp", array("titleWithStrs" => $titleWithStrs));
?>

<!-- nav -->
<?php echo $this->element("title_nav")?>

<!-- link  -->
<section class="title-link">
	<h1>
		<span class="main">攻略・ファンサイトリンク集</span>
		<span class="sub"><?php echo $title["Title"]["title_official"]?>のリンク集</span>
	</h1>
	<!-- caputure sites -->
	<section class="captures">
		<h2>攻略サイト・Wikiリンク集</h2>
<?php if(!empty($sites["Caps"])):?>
		<ul>
	<?php foreach($sites["Caps"] as $site):?>
			<li>
				<div class="image"><?php echo $this->Html->link($this->Html->image("https://capture.heartrails.com/200x150?" . $site["site_url"], array("width" => 200, "alt" => $site["site_name"])), $site["site_url"], array("target" => "_blank", "escape" => false))?></div>
				<div class="data">
					<h3><?php echo $this->Html->link($site["site_name"], $site["site_url"], array("target" => "_blank"))?></h3>
					<p class="description"><?php echo (!empty($site["description"])) ? nl2br(h($site["description"])) : $site["site_url"]?></p>
					<div class="report"><?php echo $this->Form->postLink('<i class="zmdi zmdi-info"></i> リンク切れ報告', array("controller" => "fansites", "action" => "report", $site["id"]), array("confirm" => "リンク切れ報告を送信しますか？", "rel" => "nofollow", "escape" => false))?></div>
				</div>
			</li>
	<?php endforeach;?>
		</ul>
<?php else:?>
		<div class="flash flash-info">
			<div class="flash-title">攻略サイト情報が登録されていません。</div>
			<div class="flash-body"><?php echo $titleWithStrs["Case"]?>の攻略サイト、Wikiサイト等を運営、またはご存知の方は<?php echo $this->Html->link("こちらから", array("controller" => "fansites", "action" => "add", $title["Title"]["id"]))?>ぜひご登録をお願いします。</div>
		</div>
<?php endif;?>
		<?php echo $this->Html->link("攻略・ファンサイトリンク集に登録・推薦する", array("controller" => "fansites", "action" => "add", $title["Title"]["id"]), array("class" => "button button-block"))?>
	</section>
	<!-- fansites -->
	<section class="fans">
		<h2>ファンサイトリンク集</h2>
<?php if(!empty($sites["Fans"])):?>
		<ul>
	<?php foreach($sites["Fans"] as $site):?>
			<li>
				<div class="image"><?php echo $this->Html->link($this->Html->image("https://capture.heartrails.com/200x150?" . $site["site_url"], array("width" => 200, "alt" => $site["site_name"])), $site["site_url"], array("target" => "_blank", "escape" => false))?></div>
				<div class="data">
					<h3><?php echo $this->Html->link($site["site_name"], $site["site_url"], array("target" => "_blank"))?></h3>
					<p class="description"><?php echo (!empty($site["description"])) ? nl2br(h($site["description"])) : $site["site_url"]?></p>
					<p class="report"><?php echo $this->Html->link('<i class="zmdi zmdi-info"></i> リンク切れ報告', "javascript:void(0)", array("onclick" => "if(confirm('リンク切れ報告を送信しますか？')) location.href='" . $this->Html->url(array("controller" => "fansites", "action" => "report", $site["id"])) . "'", "rel" => "nofollow", "escape" => false))?></p>
				</div>
			</li>
	<?php endforeach;?>
		</ul>
<?php else:?>
		<div class="flash flash-info">
			<div class="flash-title">ファンサイト情報が登録されていません。</div>
			<div class="flash-body"><?php echo $titleWithStrs["Case"]?>のファンサイト、ブログ等を運営、またはご存知の方は<?php echo $this->Html->link("こちらから", array("controller" => "fansites", "action" => "add", $title["Title"]["id"]))?>ぜひご登録をお願いします。</div>
		</div>
<?php endif;?>
		<?php echo $this->Html->link("攻略・ファンサイトリンク集に登録・推薦する", array("controller" => "fansites", "action" => "add", $title["Title"]["id"]), array("class" => "button button-block"))?>
	</section>
	<?php echo $this->Gads->ads468()?>
</section>

<!-- details -->
<?php echo $this->element("title_details", array("titleWithStrs" => $titleWithStrs))?>

<!-- recommends -->
<?php echo $this->element("title_recommends", array($recommends))?>