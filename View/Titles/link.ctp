<?php
//Title vars
$title_with_str = $this->Common->title_with_str($title["Title"]["title_official"], $title["Title"]["title_read"], $title["Title"]["title_abbr"], $title["Title"]["title_sub"]);
//set blocks
$this->assign("title", $title_with_str["Abbr"] . " 攻略・ファンサイトリンク集");
$this->assign("keywords", $this->TitlePage->meta_keywords($this->request->params["action"], $title["Title"]["title_official"], $title["Title"]["title_read"], $title["Title"]["title_abbr"], $title["Title"]["title_sub"]));
$this->assign("description", $title_with_str["Sub"] . "の攻略・ファンサイトリンク集です。");
//assigns
$this->assign("title_header", $this->element("title_header"));
$this->assign("title_nav_floating", $this->element("title_nav_floating", array("title" => $title)));
//pankuz
$this->set("pankuz_for_layout", array(array("str" => $title_with_str["Case"], "url" => array("action" => "index", "path" => $title["Title"]["url_str"], "ext" => "html")), "攻略・ファンサイト"));
//OGP
$this->element("title_ogp", array("title_with_str" => $title_with_str));
?>
<?php echo $this->Session->flash()?>

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
				<div class="image"><?php echo $this->Html->link($this->Html->image("http://capture.heartrails.com/200x150?" . $site["site_url"], array("width" => 200, "alt" => $site["site_name"])), $site["site_url"], array("target" => "_blank", "escape" => false))?></div>
				<div class="data">
					<h3><?php echo $this->Html->link($site["site_name"], $site["site_url"], array("target" => "_blank"))?></h3>
					<p class="description"><?php echo (!empty($site["description"])) ? nl2br(h($site["description"])) : $site["site_url"]?></p>
					<p class="report"><?php echo $this->Html->link('<i class="zmdi zmdi-info"></i> リンク切れ報告', "javascript:void(0)", array("onclick" => "if(confirm('リンク切れ報告を送信しますか？')) location.href='" . $this->Html->url(array("controller" => "fansites", "action" => "report", $site["id"])) . "'", "rel" => "nofollow", "escape" => false))?></p>
				</div>
			</li>
	<?php endforeach;?>
		</ul>
<?php else:?>
		<p class="noData"><?php echo $title_with_str["Case"]?>の攻略サイト情報が登録されていません。攻略サイト、Wikiサイト等を運営、またはご存知の方は<a href="#form">こちらから</a>ぜひご登録をお願いします。</p>
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
				<div class="image"><?php echo $this->Html->link($this->Html->image("http://capture.heartrails.com/200x150?" . $site["site_url"], array("width" => 200, "alt" => $site["site_name"])), $site["site_url"], array("target" => "_blank", "escape" => false))?></div>
				<div class="data">
					<h3><?php echo $this->Html->link($site["site_name"], $site["site_url"], array("target" => "_blank"))?></h3>
					<p class="description"><?php echo (!empty($site["description"])) ? nl2br(h($site["description"])) : $site["site_url"]?></p>
					<p class="report"><?php echo $this->Html->link('<i class="zmdi zmdi-info"></i> リンク切れ報告', "javascript:void(0)", array("onclick" => "if(confirm('リンク切れ報告を送信しますか？')) location.href='" . $this->Html->url(array("controller" => "fansites", "action" => "report", $site["id"])) . "'", "rel" => "nofollow", "escape" => false))?></p>
				</div>
			</li>
	<?php endforeach;?>
		</ul>
<?php else:?>
		<p class="noData"><?php echo $title_with_str["Case"]?>のファンサイト情報が登録されていません。ファンサイト、プレイブログ等を運営、またはご存知の方は<a href="#form">こちらから</a>ぜひご登録をお願いします。</p>
<?php endif;?>
		<?php echo $this->Html->link("攻略・ファンサイトリンク集に登録・推薦する", array("controller" => "fansites", "action" => "add", $title["Title"]["id"]), array("class" => "button button-block"))?>
	</section>
	<?php echo $this->Gads->ads468()?>
</section>

<!-- details -->
<?php echo $this->element("title_details", array("title_with_str" => $title_with_str))?>

<!-- recommends -->
<?php echo $this->element("title_recommends", array($recommends))?>